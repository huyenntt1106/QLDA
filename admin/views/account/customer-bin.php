<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4 fs-3 fw-bold">
            Tài khoản đã xóa
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" id="searchInput" placeholder="Tìm kiếm">
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="?act=customer-list" class="btn btn-secondary" type="button">
                            <i class="bx bx-arrow-back me-0 me-sm-1"></i>
                            Quay lại
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-2">Tên</th>
                            <th class="col-3">Email</th>
                            <th class="col-3">Địa chỉ</th>
                            <th class="col-2">SĐT</th>
                            <th class="col-1">Trạng thái</th>
                            <th class="col-1">
                                <span class="float-end">
                                    Hoạt động
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        <?php foreach ($list as $item) : ?>
                            <tr>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['city'] ?? 'Empty' ?></td>
                                <td><?= $item['phone'] ?? 'Empty' ?></td>
                                <td>
                                    <span class="badge bg-label-secondary">
                                        <?php
                                        if ($item['status'] == 0) {
                                            echo 'Blocked';
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="float-end">
                                        <button onclick="openModalUpdateStatus(<?= $item['id'] ?>, 1, 'customer', 'Khôi phục tài khoản?', '')" class="btn btn-success p-2">
                                            Khôi phục
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>