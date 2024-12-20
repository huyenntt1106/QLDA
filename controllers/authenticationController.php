<?php

// Cấu hình SendMail
use PHPMailer\PHPMailer\PHPMailer;

function login() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Đăng nhập';
    $view     = 'authentication/login';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the submit button is pressed
        if (isset($_POST['btnLogin'])) {
            $data = [
                'email'    => $_POST["fieldEmail"]?? null,
                'password' => $_POST["fieldPassword"]?? null,
            ];

            // Validate
            $errors = validateLogin($data);
            if (!empty($errors)) {
                // Nếu có lỗi, lưu lỗi và dữ liệu vào session
                $_SESSION["errors"] = $errors;
                $_SESSION["data"]   = $data;
                header('Location: ?act=login');
                exit();
            } else {
                // Nếu không có lỗi, tiến hành kiểm tra đăng nhập
                $loginResult = checkLogin($data['email'], $data['password']);
                if ($loginResult === 'blocked') {
                    // Nếu tài khoản bị khóa
                    $_SESSION["login-blocked"] = 'Rất tiếc! 🚫 Tài khoản của bạn đã bị chặn!';
                    header('Location: ?act=login');
                    exit();
                } elseif ($loginResult === 'unverified') {
                    // Nếu tài khoản chưa được xác minh
                    $_SESSION["login-unverified"] = 'Rất tiếc! 🙊 Vui lòng xác minh email xủa bạn. 📧';
                    header('Location: ?act=login');
                    exit();
                } elseif (!$loginResult) {
                    // Nếu thông tin đăng nhập không chính xác
                    $_SESSION["errors"]['fieldEmail'] = 'Sai email hoặc mật khẩu. 🤔';
                    header('Location: ?act=login');
                    exit();
                } else {
                    // Đăng nhập thành công
                    $_SESSION["user"] = $loginResult;
                    $_SESSION["login-success"] = "Chúc mừng! 🎉 Đăng nhập thành công, hãy bắt đầu mua sắm! 🚀🔥";
                    header('Location: ' . BASE_URL);
                    exit();
                }
            }
        }
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function logout() {
    if (!empty($_SESSION["user"])) {
        unset($_SESSION["user"]);
    }
    header('Location: ?act=login');
    exit();
}

function register() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Đăng ký';
    $view     = 'authentication/register';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the submit button is pressed
        if (isset($_POST['btnRegister'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $data = [
                'registration_date' => date('Y-m-d'),
                'name'              => $_POST["fieldName"] ?? null,
                'email'             => $_POST["fieldEmail"]?? null,
                'password'          => $_POST["fieldPassword"]?? null,
                'token'             => bin2hex(random_bytes(30)),
            ];

            // Validate
            $errors = validateRegister($data);
            if (!empty($errors)) {
                $_SESSION["errors"] = $errors;
                $_SESSION["data"]   = $data ;
                header('Location: ?act=register');
                exit();
            }

            insert('tbl_accounts', $data);
            
            if (sendEmailVerification('Vui lòng kiểm tra liên kết dưới đây để xác minh tài khoản.', 'verify-email', $data['token'], $data['email'])) {
                header('Location: ?act=waiting-page');
                exit();
            } else {
                $_SESSION["send-failed"] = 'Vui lòng thử lại sau.';
                header('Location: ?act=register');
                exit();
            }
    
        }
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function sendEmailVerification($subject, $act, $token, $email) {
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL;
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom(EMAIL);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = '
                <h2>Vui lòng nhấp vào liên kết bên dưới để xác minh địa chỉ email của bạn.</h2>
                <h3>
                    <a href="'.BASE_URL.'?act=' . $act . '&token=' . $token . '">👉 Bấm vào đây để xác minh!</a>
                </h3>
                ';
    return $mail->send() ? true : false;
}

function waitingPage() {
    require_once PATH_VIEW . 'authentication/waiting-page.php';
}

function verifyEmail($token) {
    getLastByToken('tbl_accounts', $token);
    if (updateTokenOptions('tbl_accounts', $token, 'status', 1)) {
        header('Location: ?act=verified');
        exit();
    }
}

function verified() {
    require_once PATH_VIEW . 'authentication/verified-page.php';
}

function sendEmailResetPassword($subject, $act, $email) {
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $token = getEmail($email)['token'];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL;
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom(EMAIL);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = '
                <h2>Vui lòng ấn vào link dưới đây để đặt lại mật khẩu.</h2>
                <h3>
                    <a href="'.BASE_URL.'?act=' . $act . '&token=' . $token . '">👉 Bấm vào đây để đặt lại mật khẩu!</a>
                </h3>
                ';
    return $mail->send() ? true : false;
}

function forgotPassword() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Quên mật khẩu';
    $view     = 'authentication/forgot-password';

    if (isset($_POST['btnRecover'])) {

        if (sendEmailResetPassword('Reset Password', 'reset-password', $_POST["email"])) {
            $_SESSION["email"] = '';
        }
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function resetPassword($token) {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Đặt lại mật khẩu';
    $view     = 'authentication/reset-password';

    if (isset($_POST['btnReset'])) {
        $pw  = $_POST["fieldPassword"];
        $cpw = $_POST["fieldConfirm"];

        if ($pw === $cpw) {
            if (updatePassword($token, $cpw)) {
                updateTokenOptions('tbl_accounts', $token, 'token', bin2hex(random_bytes(30)));
                $_SESSION['password-changed'] = 'Cập nhập mật khẩu thành công!';
            }
        } else {
            $_SESSION['not-match'] = 'Mật khẩu không trùng khớp';
        }
        header('Location: ?act=login');
        exit();
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function validateLogin($data) {
    $errors = [];
    // Kiểm tra trường email
    if (empty($data['email'])) {
        $errors['fieldEmail'] = 'Vui lòng nhập email';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['fieldEmail'] = 'Định dạng email không hợp lệ';
    }

    // Kiểm tra trường mật khẩu
    if (empty($data['password'])) {
        $errors['fieldPassword'] = 'Vui lòng nhập mật khẩu';
    }

    return $errors;
}

function validateRegister($data) {
    $errors = [];
    // Kiểm tra trường tên
    if (empty($data['name'])) {
        $errors['fieldName'] = 'Đây là trường bắt buộc';
    } elseif (strlen($data['name']) < 2 || strlen($data['name']) > 40) {
        $errors['fieldName'] = 'Tên phải từ 2 đến 40 kí tự';
    }

    // Kiểm tra trường email
    if (empty($data['email'])) {
        $errors['fieldEmail'] = 'Vui lòng nhập email.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['fieldEmail'] = 'Định dạng email không hợp lệ';
    } elseif (!checkUniqueEmail($data['email'])) {
        $errors['fieldEmail'] = 'Email này đã được đăng ký trước đó.';
    }

    // Kiểm tra trường mật khẩu
    if (empty($data['password'])) {
        $errors['fieldPassword'] = 'Vui lòng nhập mật khẩu';
    }
    
    // Kiểm tra trường xác nhận mật khẩu
    if (empty($_POST["fieldConfirm"])) {
        $errors['fieldConfirm'] = 'Vui lòng xác nhận mật khẩu';
    } elseif ($data['password'] !== $_POST["fieldConfirm"]) {
        $errors['fieldConfirm'] = 'Mật khẩu không trùng khớp';
    }
    
    return $errors;
}