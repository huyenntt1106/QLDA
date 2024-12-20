<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4 fs-3 fw-bold">
            Danh sách sản phẩm
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" id="searchInput" placeholder="Tìm kiếm sản phẩm">
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="?act=product-bin" class="btn btn-outline-dark" type="button">
                            <i class="bx bx-trash me-1"></i>
                            Thùng rác
                        </a>
                        <a href="?act=create-product" class="btn btn-info" type="button">
                            <i class="bx bx-plus me-1"></i>
                            Tạo sản phẩm
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-2">Danh mục</th>
                            <th class="col-3">Tên</th>
                            <th class="col-1">Giá niêm yết</th>
                            <th class="col-1">Chiết khấu</th>
                            <th class="col-1">Tồn kho</th>
                            <th class="col-2 text-center">Ảnh</th>
                            <th class="col-1">Trạng thái</th>
                            <th class="col-1">
                                <span class="float-end">
                                    Hoạt động
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($list as $item) :
                            if ($item['status'] == 1) :
                        ?>
                                <tr>
                                    <td><?= $item['c_name'] ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td class="text-center"><?= number_format($item['price'], 0, '.', ',') ?></td>
                                    <td class="text-center"><?= $item['discount'] ?>%</td>
                                    <td class="text-center"><?= number_format($item['instock'], 0, '.', ',') ?></td>
                                    <td class="text-center">
                                        <a href="?act=add-gallery&id=<?= $item['id'] ?>" class="img-link d-block position-relative">
                                            <div class="ovl position-absolute top-50 start-50 translate-middle">
                                                <i class="bx bx-plus-circle position-absolute top-50 start-50 translate-middle fs-3"></i>
                                            </div>
                                            <img src="<?= PATH_UPLOAD . $item['thumbnail'] ?>" width="100px" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge bg-label-success">
                                            <?php
                                            if ($item['status'] == 1) {
                                                echo 'Active';
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="float-end">
                                            <a href="?act=update-product&id=<?= $item['id'] ?>" class="btn btn-primary p-2">
                                                <i class="bx bx-edit-alt"></i>
                                            </a>
                                            <button onclick="openModalUpdateStatus(<?= $item['id'] ?>, 0, 'product', 'Chuyển vào thùng rác?', 'Bạn có thể tìm thấy sản phẩm trong thùng rác')" class="btn btn-danger p-2">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                            <a href="?act=add-color-product&id=<?= $item['id'] ?>" class="btn btn-dark p-2">
                                                <i class="bx bx-brush"></i>
                                            </a>
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