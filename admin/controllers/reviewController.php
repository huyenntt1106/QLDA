<?php

function manageReviews() {
    $titleBar = 'Quản lý bình luận';
    $view     = 'review/manage-reviews';

    $reviews = getReviews();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateStatusReview($id, $value) {
    updateStatus('tbl_reviews', $id, $value);
    header('Location: ?act=manage-reviews');
    $_SESSION["success"]='';
    exit();
}

function deleteReview($id) {
    deleteOne('tbl_reviews', $id);
    $_SESSION["success"]='';
    header('Location: ?act=manage-reviews');
    exit();
}