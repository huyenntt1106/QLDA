<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Quản lý bình luận
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" name="search" placeholder="Tìm đánh giá">
                </div>
                <div class="col"></div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-2">Sản phẩm</th>
                            <th class="col-2">Người bình luận</th>
                            <th class="col-4">Bình luận</th>
                            <th class="col-1">Trạng thái</th>
                            <th class="col-2">Ngày</th>
                            <th class="col-1">
                                <span class="float-end">
                                    Hoạt động
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <?php foreach ($reviews as $review) {
                        extract($review);
                    } ?>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($reviews as $review) : ?>
                            <tr>
                                <!-- Product -->
                                <td>
                                    <div class="d-flex justify-content-start align-items-center customer-name">
                                        <div class="avatar-wrapper">
                                            <div class="me-2 rounded-2 bg-label-secondary">
                                                <img src="<?= PATH_UPLOAD . $review['product_thumbnail'] ?>" width="100px" class="rounded-2">
                                            </div>
                                        </div>
                                        <span class="fw-medium text-nowrap"><?= $review['product_name'] ?></span>
                                    </div>
                                </td>

                                <!-- Reviewer -->
                                <td>
                                    <div class="d-flex justify-content-start align-items-center customer-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar me-2">
                                                <?php
                                                $defaultAvatar = 'https://www.gravatar.com/avatar/0?d=mp&f=y';
                                                $avatar = !empty($review['customer_avatar']) ? PATH_UPLOAD . $review['customer_avatar'] : $defaultAvatar;
                                                ?>
                                                <img src="<?= $avatar ?>" alt="Avatar" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="">
                                                <span class="fw-medium"><?= $review['customer_name'] ?></span>
                                            </a>
                                            <small class="text-muted text-nowrap"><?= $review['customer_email'] ?></small>
                                        </div>
                                    </div>
                                </td>

                                <!-- Review -->
                                <td>
                                    <p class="text-warning m-0">
                                        <?php
                                        $rating = $review['rating'];
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<i class="fa-solid fa-star"></i>';
                                            } else {
                                                echo '<i class="fa-regular fa-star"></i>';
                                            }
                                        }
                                        ?>
                                    </p>
                                    <span><?= $review['review_text'] ?></span>
                                </td>
                                <td>
                                    <span class="badge <?= ($review['review_status'] == 0) ? 'bg-label-warning' : (($review['review_status'] == 1) ? 'bg-label-success' : 'bg-label-danger') ?>">
                                        <?= ($review['review_status'] == 0) ? 'Chờ' : 'Đã đăng' ?>
                                    </span>
                                </td>
                                <td><?= $review['review_date'] ?></td>
                                <td class="text-nowrap">
                                    <div class="float-end">
                                        <button onclick="openModalUpdateStatus(<?= $review['review_id'] ?>, 1, 'review', 'Đăng bình luận?', 'Bình luận này sẽ được đăng lên!')" class="btn btn-success p-2">
                                            <i class="bx bx-upload"></i>
                                        </button>
                                        <button onclick="openModalDelete(<?= $review['review_id'] ?>, 'delete-review')" class="btn btn-danger p-2">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>