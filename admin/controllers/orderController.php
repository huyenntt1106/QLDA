<?php

function orderList() {
    $titleBar = 'Đơn hàng';
    $view     = 'order/order-list';
    $orders   = getOrders('tbl_orders');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function orderDetails($orderId) {
    $titleBar = 'Chi tiết đơn hàng';
    $view     = 'order/order-details';
    $products = getOrderDetails($orderId);

    foreach ($products as $item) {
        extract($item);
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateOrder($orderId) {
    $status   = selectOne('tbl_orders', $orderId);
    $show     = getOrderDetails($orderId);

    if (empty($show)) {
        page404();
    }

    foreach ($show as $item) {
        extract($item);
    }

    $titleBar = 'Cập nhập đơn hàng';
    $view     = 'order/update';

    if (isset($_POST['btnUpdatePayment'])) {
        $selectedPayment = $_POST['paymentValue'] ?? null;

        if (empty($selectedPayment) || !is_numeric($selectedPayment) || $selectedPayment < 0 || $selectedPayment > 2) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedPayment == 0 && $status['delivery_status'] == 2) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedPayment == 1 && $status['delivery_status'] == 3) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedPayment == 2 && $status['delivery_status'] == 0) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedPayment == 2 && $status['delivery_status'] == 1) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedPayment == 1 && $status['payment_status'] == 2) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } else {
            update('tbl_orders', $orderId, ['payment_status' => $selectedPayment]);
            $_SESSION["success"] = '';
        }
        header('Location: ?act=update-order&id=' . $orderId);
        exit();
    }

    if (isset($_POST['btnUpdateDelivery'])) {
        $selectedDelivery = $_POST['deliveryValue'];

        if (empty($selectedDelivery) || !is_numeric($selectedDelivery) || $selectedDelivery < 0 || $selectedDelivery > 3) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedDelivery == 0 && $status['payment_status'] == 2) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedDelivery == 1 && $status['payment_status'] == 2) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedDelivery == 2 && $status['payment_status'] == 0) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedDelivery == 2 && $status['payment_status'] == 2) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedDelivery == 0 && $status['delivery_status'] == 2) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedDelivery == 1 && $status['delivery_status'] == 2) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } elseif ($selectedDelivery == 1 && $status['delivery_status'] == 3) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        }  elseif ($selectedDelivery == 2 && $status['delivery_status'] == 3) {
            $_SESSION["error"] = '';
            header('Location: ?act=update-order&id=' . $orderId);
            exit();
        } else {
            // Update the delivery status in the database
            update('tbl_orders', $orderId, ['delivery_status' => $selectedDelivery]);
            $_SESSION["success"] = '';
        }
        header('Location: ?act=update-order&id=' . $orderId);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}