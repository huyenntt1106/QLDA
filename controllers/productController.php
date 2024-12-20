<?php

function searchProduct() {
    $titleBar     = 'Tìm kiếm';
    $view         = 'product/search';
    $listProducts = getStatusActive('tbl_products');

    if (isset($_POST['btnSearch'])) {
        $kw = $_POST["keyword"];
        $_SESSION["search_keyword"] = $kw;
    } elseif (isset($_SESSION["search_keyword"])) {
        // Retrieve the search keyword from session if it exists
        $kw = $_SESSION["search_keyword"];
    } else {
        // Default keyword or no keyword
        $kw = '';
        header('Location: ?act=categories');
        exit;
    }

    if (!empty($kw)) {
        $searchResults = searchProductsByName($kw);
        $listProducts = $searchResults;
    }

    usort($listProducts, function ($a, $b) {
        return $b['discount'] - $a['discount'];
    });

    require_once PATH_VIEW . 'layouts/master.php';
}

function noSearchResult() {
    require_once PATH_VIEW . 'product/no-search-result.php';
}

function productDetail($id) {
    $js       = BASE_URL . 'assets/js/slider.js';
    $titleBar = 'Trang sản phẩm';
    $view     = 'product/detail';
    $item     = selectOne('tbl_products', $id);
    $gallery  = getEntitiesProduct('tbl_gallery', $id);
    $colors   = getEntitiesProduct('tbl_colors', $id);
    $reviews  = getReviewsByProductId('tbl_reviews', $id);
    
    $limitedReviews = array_slice($reviews, 0, 3);

    // Tăng lượt view cho sản phẩm
    updateProductView($id);

    $basePrice      = $item['price'];
    $discount  = $item['discount'];
    // Tính toán giá sau khi được giảm giá
    $sale = $basePrice - ($basePrice * $discount / 100);
    $cate = $item['id_category'];
    $sameCate = getProductsByCategoryId($cate);

    // Loại bỏ sản phẩm hiện tại khỏi mảng
    foreach ($sameCate as $key => $product) {
        if ($product['id'] == $id) {
            unset($sameCate[$key]);
        }
    }

    usort($sameCate, function ($a, $b) {
        return $b['discount'] - $a['discount'];
    });

    sendReview($id);

    require_once PATH_VIEW . 'layouts/master.php';
}

function sendReview($id) {
    if(isset($_POST['btnSendReview'])) {
        // kiểm tra xem đăng nhập chưa
        if (isset($_SESSION["user"])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $data = [
                'id_product'  => $id ?? null,
                'id_customer' => $_SESSION["user"]['id'] ?? null,
                'rating'      => $_POST['rating'] ?? null,
                'review_text' => $_POST['textarea'] ?? null,
                'review_date' => date('Y-m-d'),
            ];

            // Validate
            $errors = validateReview($data);
            if (!empty($errors)) {
                $_SESSION["review-error"] = 'Lỗi khi xử lý yêu cầu!';
                header('Location: ?act=product-detail&id=' . $id);
                exit();
            } else {
                // Kiểm tra xem khách hàng đã mua sản phẩm chưa
                if (checkCustomerHasPurchased($data['id_customer'], $id)) {
                    insert('tbl_reviews', $data);
                    $_SESSION["review-success"]='Phản hồi của bạn đã được nhận! Cảm ơn rất nhiều! ❤️️';
                } else {
                    $_SESSION["review-error"] = 'Bạn phải mua sản phẩm này trước để phản hồi.';
                    header('Location: ?act=product-detail&id=' . $id);
                    exit();
                }
            }
        } else {
            $_SESSION["login-first"] = 'Please Log in First! 😊';
        }
    }
}

function calculateAverageRating($reviews) {
    $totalStars = 0;
    $totalReviews = count($reviews);
    // Tính tổng số sao của tất cả các đánh giá
    foreach ($reviews as $review) {
        $totalStars += $review['rating'];
    }
    // Tránh chia cho 0
    if ($totalReviews > 0) {
        // Tính trung bình số sao
        $averageRating = $totalStars / $totalReviews;
        return round($averageRating, 1); // làm tròn đến một chữ số thập phân
    } else {
        return 0; // Nếu không có đánh giá, trả về 0
    }
}

function validateReview($data) {
    $errors = [];

    // Validate text
    if (empty($data['review_text']) || strlen($data['review_text']) < 2 || strlen($data['review_text']) > 50) {
        $errors['text'] = 'Text must be between 2 and 50 characters.';
    }

    // Validate rating
    if (!isset($data['rating'])) {
        $errors['rating'] = 'Please select a rating.';
    }
    return $errors;
}