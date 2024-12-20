<?php

function categoryList() {
    $titleBar = 'Danh mục';
    $view     = 'category/category-list';
    $list     = getStatusActive('tbl_categories');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryBin() {
    $titleBar = 'Danh mục';
    $view     = 'category/category-bin';
    $list     = getStatusInactive('tbl_categories');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function createCategory() {
    $titleBar = 'Danh mục';
    $view     = 'category/category-create';
    
    if (isset($_POST['btnPublish'])) {
        $data = [
            "name" => $_POST["categoryName"] ?? null,
        ];

        // Validate
        $errors = validateCreateCategory($data);
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["data"]   = $data ;
            header('Location: ?act=create-category');
            exit();
        }

        insert('tbl_categories', $data);
        $_SESSION["success"]='';
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateCategory($id) {
    $show = selectOne('tbl_categories', $id);

    if (empty($show)) {
        page404();
    }

    $titleBar = 'Danh mục';
    $view     = 'category/category-update';
    
    if (isset($_POST['btnSave'])) {
        $data = [
            "name" => $_POST["categoryName"] ?? null,
        ];

        // Validate
        $errors = validateUpdateCategory($id, $data);
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            header('Location: ?act=update-category&id=' . $id);
            exit();
        } else {
            update('tbl_categories', $id, $data);
            $_SESSION["success"]='';
        }

        header('Location: ?act=category-list');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateStatusCategory($id, $value) {
    updateStatus('tbl_categories', $id, $value);
    if ($value == 1) {
        header('Location: ?act=category-bin');
    } else {
        header('Location: ?act=category-list');
    }
    $_SESSION["success"]='';
    exit();
}

function deleteCategory($id) {
    deleteOne('tbl_categories', $id);
    $_SESSION["success"]='';
    header('Location: ?act=category-bin');
    exit();
}

function validateCreateCategory($data) {
    $errors = [];
    if (empty($data['name'])) {
        $errors['categoryName'] = 'This field is required.';
    } elseif (strlen($data['name']) > 50) {
        $errors['categoryName'] = 'Please enter between 1 and 50 characters.';
    } elseif (!checkUniqueCreateCategory($data['name'])) {
        $errors[] = 'The entered data is a duplicate.';
    }
    return $errors;
}

function validateUpdateCategory($id, $data) {
    $errors = [];
    if (empty($data['name'])) {
        $errors['categoryName'] = 'This field is required.';
    } elseif (strlen($data['name']) > 50) {
        $errors['categoryName'] = 'Please enter between 1 and 50 characters.';
    } elseif (!checkUniqueUpdateCategory($id, $data['name'])) {
        $errors[] = 'The entered data is a duplicate.';
    }
    return $errors;
}