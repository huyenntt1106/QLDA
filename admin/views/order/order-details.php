<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="py-3 mb-4 d-flex flex-wrap justify-content-between align-items-center">
            <span class="fs-3 fw-bold">Chi tiết đơn hàng</span>
            <a href="?act=order-list" class="btn btn-secondary float-end" type="button">
                <i class="bx bx-arrow-back me-1"></i>
                Quay lại
            </a>
        </div>

        <!-- Order Details Table -->
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <span class="badge bg-label-primary">
                            Mã đơn:
                            #<?= $item['order_id'] ?>
                        </span>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-5">Sản phẩm</th>
                                    <th class="col-1">Giá niêm yết</th>
                                    <th class="col-1">Chiết khấu</th>
                                    <th class="col-1">Giá bán</th>
                                    <th class="col-1">Số lượng</th>
                                    <th class="col-1 text-end">Tổng</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom">

                                <?php $shipping = 0;
                                $subtotal = 0;
                                $total = 0; ?>
                                <?php foreach ($products as $item) : ?>
                                    <?php
                                    $basePrice  = $item['price'];
                                    $discount   = $item['discount'] / 100;
                                    $sale       = $basePrice * (1 - $discount);
                                    $totalPrice = $sale * $item['quantity'];
                                    $subtotal  += $totalPrice;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="<?= PATH_UPLOAD . $item['color_thumbnail'] ?>" width="80px">
                                                <div class="">
                                                    <p class="m-0 fw-semibold"><?= $item['product_name'] ?></p>
                                                    <span><?= $item['color_name'] ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                             <?= number_format($basePrice, 0, '.', ',') ?> VNĐ
                                        </td>
                                        <td class="text-center">
                                            <?= $item['discount'] ?>%
                                        </td>
                                        <td>
                                             <?= number_format($sale, 0, '.', ',') ?> VNĐ
                                        </td>
                                        <td class="text-center">
                                            <?= $item['quantity'] ?>
                                        </td>
                                        <td class="text-end">
                                         <?= number_format($totalPrice, 0, '.', ',') ?> VNĐ
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end align-items-center m-4">
                        <div class="order-calculations">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100">Tạm tính:</span>
                                <span class="text-heading"> <?= number_format($subtotal, 0, '.', ',') ?> VNĐ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100">Vận chuyển:</span>
                                <?php $shipping = calculateShippingCost($item['city'] ?? ''); ?>
                                <span class="text-heading"> <?= number_format($shipping, 0, '.', ',') ?> VNĐ</span>
                            </div>
                            <div class="d-flex justify-content-between fs-5">
                                <h5 class="w-px-100 mb-0">Tổng tiền: </h5>
                                <h5 class="mb-0"><?= number_format($subtotal + $shipping, 0, '.', ',') ?> VNĐ</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Ghi chú:</h4>
                        <p class="fs-5"><?= $item['note']=='' ? 'Trống' : $item['note'] ?></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title m-0">Khách hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-4">
                            <?php
                            $defaultAvatar = 'https://www.gravatar.com/avatar/0?d=mp&f=y';
                            $avatar = !empty($item['avatar']) ? PATH_UPLOAD . $item['avatar'] : $defaultAvatar;
                            ?>
                            <img src="<?=  $avatar ?>" class="rounded-circle me-2" width="50px">
                            <div class="d-flex flex-column">
                                <h4 class="mb-0">
                                    <?= $item['customer_name'] ?>
                                </h4>
                                <span class="text-secondary">Mã khách hàng:
                                    <?= $item['customer_id'] ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title m-0">Thông tin liên hệ</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            <i class="bx bx-envelope fs-3 me-0 me-sm-1"></i>
                            <span class="fs-5"><?= $item['email'] ?></span>
                        </p>
                        <p class="mb-0">
                            <i class="bx bx-phone fs-3 me-0 me-sm-1"></i>
                            <span class="fs-5"><?= $item['phone'] ?></span>
                        </p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title m-0">Địa chỉ giao hàng</h4>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            <i class="bx bx-navigation fs-3 me-0 me-sm-1"></i>
                            <span class="fs-5">
                                <?php $formatAddress = $item['address'] . ', ' . $item['ward'] . ', ' . $item['district'] . ', ' . $item['city'] ?>
                                <?= $formatAddress = ($formatAddress == ', , , ') ? '' : $formatAddress ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Order Details Table -->

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>