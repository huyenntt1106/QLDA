<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Sản phẩm đã xóa
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" id="searchInput" placeholder="Tìm kiếm sản phẩm">
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="?act=product-list" class="btn btn-secondary" type="button">
                            <i class="bx bx-arrow-back me-1"></i>
                            Quay lại
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-2">Danh mục</th>
                            <th class="col-2">Tên</th>
                            <th class="col-1">Giá niêm yết</th>
                            <th class="col-1">Chiết khấu</th>
                            <th class="col-1">Tồn kho</th>
                            <th class="col-3 text-center">Ảnh</th>
                            <th class="col-1 text-center">Trạng thái</th>
                            <th class="col-1">
                                <span class="float-end">
                                    Hoạt động
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($list as $item) :
                            if ($item['status'] == 0) :
                        ?>
                                <tr>
                                    <td><?= $item['c_name'] ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td class="text-center"><?= $item['price'] ?></td>
                                    <td class="text-center"><?= $item['discount'] ?>%</td>
                                    <td class="text-center"><?= $item['instock'] ?></td>
                                    <td class="text-center">
                                        <img src="<?= PATH_UPLOAD . $item['thumbnail'] ?>" width="100px" alt="">
                                    </td>
                                    <td>
                                        <span class="badge bg-label-secondary">
                                            <?php
                                            if ($item['status'] == 0) {
                                                echo 'Inactive';
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="float-end">
                                            <button onclick="openModalUpdateStatus(<?= $item['id'] ?>, 1, 'product', 'Khôi phục?', '')" class="btn btn-success p-2">
                                                Khôi phục
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            endif;
                        endforeach ?>
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