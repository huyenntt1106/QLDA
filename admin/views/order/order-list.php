<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4 fs-3 fw-bold">
            Danh sách đơn hàng
        </h4>

        <!-- Order List Widget -->
        <div class="card mb-4">
            <div class="card-widget-separator-wrapper">
                <div class="card-body card-widget-separator">
                    <?php 
                    $pendingPaymentCount = 0;
                    $completedCount = 0;
                    $refundedCount = 0;
                    $failedCount = 0;
                    foreach ($orders as $item) {
                        if ($item['payment_status'] == 0) {
                            $pendingPaymentCount++;
                        }
                        if ($item['payment_status'] == 1 && $item['delivery_status'] == 2) {
                            $completedCount++;
                        }
                        if ($item['payment_status'] == 2) {
                            $refundedCount++;
                        }
                        if ($item['delivery_status'] == 3) {
                            $failedCount++;
                        }
                    }
                    ?>
                    <div class="row gy-4 gy-sm-1">
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                <div>
                                    <h3 class="mb-2"><?= $pendingPaymentCount ?></h3>
                                    <p class="mb-0">Chờ thanh toán</p>
                                </div>
                                <div class="avatar me-sm-4">
                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class="bx bx-calendar bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-4">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                <div>
                                    <h3 class="mb-2"><?= $completedCount ?></h3>
                                    <p class="mb-0">Hoàn thành</p>
                                </div>
                                <div class="avatar me-lg-4">
                                    <span class="avatar-initial rounded bg-label-success">
                                        <i class="bx bx-check-double bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                                <div>
                                    <h3 class="mb-2"><?= $refundedCount ?></h3>
                                    <p class="mb-0">Hoàn tiền</p>
                                </div>
                                <div class="avatar me-sm-4">
                                    <span class="avatar-initial rounded bg-label-secondary">
                                        <i class="bx bx-wallet bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h3 class="mb-2"><?= $failedCount ?></h3>
                                    <p class="mb-0">Hủy</p>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-danger">
                                        <i class="bx bx-error-alt bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Order List Widget -->

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" id="searchInput" placeholder="Tìm kiếm khách hàng">
                </div>
                <div class="col"></div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-3">
                                Ngày đặt
                                <select id="sortDatetime" class="border">
                                    <option value="newest" selected>Mới nhất</option>
                                    <option value="oldest">Cũ nhất</option>
                                </select>
                            </th>
                            <th class="col-2">Khách hàng</th>
                            <th class="col-2">
                                Thanh toán
                                <select id="sortPayment" class="border">
                                    <option selected>Sắp xếp</option>
                                    <option value="unpaid">Chưa thanh toán</option>
                                    <option value="paid">Đã thanh toán</option>
                                    <option value="refunded">Hoàn tiền</option>
                                </select>
                            </th>
                            <th class="col-2">
                                Vận chuyển
                                <select id="sortDelivery" class="border">
                                    <option selected>Sắp xếp</option>
                                    <option value="pending">Chờ</option>
                                    <option value="in transit">Đang giao</option>
                                    <option value="delivered">Đã giao</option>
                                    <option value="failed">Không thành công</option>
                                </select>
                            </th>
                            <th class="col-2">
                                Phương thức thanh toán
                                <select id="sortMethod" class="border">
                                    <option selected>Sắp xếp</option>
                                    <option value="cash">Tiền mặt</option>
                                    <option value="online">Online</option>
                                </select>
                            </th>

                            <th class="col-1">
                                <span class="float-end">
                                    Hoạt động
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        <?php foreach ($orders as $item) : ?>
                            <tr>
                                <td>
                                    <span class="orderDate"><?= $item['date'] ?></span>
                                </td>
                                <td><?= $item['customer_name'] ?></td>
                                <td>
                                    <span class="fw-semibold <?= ($item['payment_status'] == 0) ? 'text-warning' : (($item['payment_status'] == 1) ? 'text-success' : 'text-secondary') ?>">
                                        <?= ($item['payment_status'] == 0) ? 'Chưa thanh toán' : (($item['payment_status'] == 1) ? 'Đã thanh toán' : 'Hoàn tiền') ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge <?= ($item['delivery_status'] == 0) ? 'bg-label-warning' : (($item['delivery_status'] == 1) ? 'bg-label-primary' : (($item['delivery_status'] == 2) ? 'bg-label-success' : 'bg-label-danger')) ?>">
                                        <?= ($item['delivery_status'] == 0) ? 'Chờ' : (($item['delivery_status'] == 1) ? 'Đang giao' : (($item['delivery_status'] == 2) ? 'Đã giao' : 'Không thành công')) ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge <?= ($item['method'] == 0) ? 'bg-label-info' : 'bg-label-primary' ?>">
                                        <?= ($item['method'] == 0) ? 'Tiền mặt' : 'Thanh toán online' ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="float-end">
                                        <a href="?act=update-order&id=<?= $item['id'] ?>" class="btn btn-primary p-2">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <a href="?act=order-details&id=<?= $item['id'] ?>" class="btn btn-success p-2">
                                            <i class="bx bx-show"></i>
                                        </a>
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

<script>
    document.getElementById("sortDatetime").addEventListener("change", function() {
        var selectedValue = this.value;
        var tableRows = Array.from(document.querySelectorAll(".table tbody tr"));

        tableRows.sort(function(rowA, rowB) {
            // Lấy thời gian từ thẻ span có class là 'orderDate'
            var datetimeA = new Date(rowA.querySelector('.orderDate').textContent.trim()).getTime();
            var datetimeB = new Date(rowB.querySelector('.orderDate').textContent.trim()).getTime();

            if (selectedValue === "newest") {
                return datetimeB - datetimeA;
            } else if (selectedValue === "oldest") {
                return datetimeA - datetimeB;
            } else {
                return 0;
            }
        });

        var tableBody = document.querySelector(".table tbody");
        tableBody.innerHTML = "";

        tableRows.forEach(function(row) {
            tableBody.appendChild(row);
        });
    });

    document.getElementById("sortPayment").addEventListener("change", function() {
        var selectedValue = this.value;
        var tableRows = Array.from(document.querySelectorAll(".table tbody tr"));

        tableRows.sort(function(rowA, rowB) {
            var paymentStatusA = rowA.cells[2].textContent.trim().toLowerCase();
            var paymentStatusB = rowB.cells[2].textContent.trim().toLowerCase();

            var paymentOrder = {
                "unpaid": 0,
                "paid": 1,
                "refunded": 2,
            };

            if (paymentStatusA === selectedValue && paymentStatusB !== selectedValue) {
                return -1;
            } else if (paymentStatusA !== selectedValue && paymentStatusB === selectedValue) {
                return 1;
            } else {
                return paymentOrder[paymentStatusA] - paymentOrder[paymentStatusB];
            }
        });

        var tableBody = document.querySelector(".table tbody");
        tableBody.innerHTML = "";

        tableRows.forEach(function(row) {
            tableBody.appendChild(row);
        });
    });

    document.getElementById("sortDelivery").addEventListener("change", function() {
        var selectedValue = this.value;
        var tableRows = Array.from(document.querySelectorAll(".table tbody tr"));

        tableRows.sort(function(rowA, rowB) {
            var deliveryStatusA = rowA.cells[3].textContent.trim().toLowerCase();
            var deliveryStatusB = rowB.cells[3].textContent.trim().toLowerCase();

            var deliveryOrder = {
                "pending": 0,
                "in transit": 1,
                "delivered": 2,
                "failed": 3
            };

            if (deliveryStatusA === selectedValue && deliveryStatusB !== selectedValue) {
                return -1; // Hiển thị hàng có trạng thái đã chọn lên đầu
            } else if (deliveryStatusA !== selectedValue && deliveryStatusB === selectedValue) {
                return 1; // Hiển thị hàng có trạng thái đã chọn lên đầu
            } else {
                // Sắp xếp các hàng còn lại theo thứ tự ưu tiên của trạng thái giao hàng
                return deliveryOrder[deliveryStatusA] - deliveryOrder[deliveryStatusB];
            }
        });

        var tableBody = document.querySelector(".table tbody");
        tableBody.innerHTML = "";

        tableRows.forEach(function(row) {
            tableBody.appendChild(row);
        });
    });

    document.getElementById("sortMethod").addEventListener("change", function() {
        var selectedValue = this.value;
        var tableRows = Array.from(document.querySelectorAll(".table tbody tr"));

        tableRows.sort(function(rowA, rowB) {
            var paymentMethodA = rowA.cells[4].textContent.trim().toLowerCase();
            var paymentMethodB = rowB.cells[4].textContent.trim().toLowerCase();

            var paymentOrder = {
                "cash on delivery": 0,
                "online payment": 1
            };

            if (selectedValue === "cash") {
                return paymentOrder[paymentMethodA] - paymentOrder[paymentMethodB];
            } else if (selectedValue === "online") {
                return paymentOrder[paymentMethodB] - paymentOrder[paymentMethodA];
            } else {
                return 0;
            }
        });

        var tableBody = document.querySelector(".table tbody");
        tableBody.innerHTML = "";

        tableRows.forEach(function(row) {
            tableBody.appendChild(row);
        });
    });
</script>

<script>
    var style = document.createElement('style');
    style.textContent = `
                        .highlight {
                            background-color: yellow;
                            font-weight: bold;
                        }
                        `;
    document.head.appendChild(style);

    // Lắng nghe sự kiện input trên ô tìm kiếm
    document.getElementById("searchInput").addEventListener("input", function() {
        var searchTerm = this.value.trim().toLowerCase(); // Lấy giá trị từ ô tìm kiếm và chuyển về chữ thường, loại bỏ các khoảng trắng thừa
        var tableRows = document.querySelectorAll(".table tbody tr");

        tableRows.forEach(function(row) {
            var productName = row.querySelector("td:nth-child(2)").textContent.toLowerCase(); // Lấy tên sản phẩm và chuyển về chữ thường
            var matchIndex = productName.indexOf(searchTerm); // Tìm vị trí của từ khóa tìm kiếm trong tên sản phẩm

            if (matchIndex !== -1) {
                var textContent = row.querySelector("td:nth-child(2)").textContent;
                var highlightedText = textContent.substring(0, matchIndex) + "<span class='highlight'>" + textContent.substring(matchIndex, matchIndex + searchTerm.length) + "</span>" + textContent.substring(matchIndex + searchTerm.length);
                row.querySelector("td:nth-child(2)").innerHTML = highlightedText;
                row.style.display = ""; // Hiển thị hàng nếu có từ khóa tìm kiếm
            } else {
                row.style.display = "none"; // Ẩn hàng nếu không có từ khóa tìm kiếm
            }
        });
    });
</script>