<?php
// Kiểm tra xem có thông báo thành công từ session không?
if (isset($_SESSION["success"])) {
    // Hiển thị toast
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".toastSuccess").classList.add("show");
                setTimeout(function() {
                    document.querySelector(".toastSuccess").classList.remove("show");
                }, 5000);
            });
        </script>';

    // Xóa thông báo thành công từ session
    unset($_SESSION["success"]);
}
if (isset($_SESSION["error"])) {
    // Hiển thị toast
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".toastError").classList.add("show");
                setTimeout(function() {
                    document.querySelector(".toastError").classList.remove("show");
                }, 5000);
            });
        </script>';

    // Xóa thông báo thành công từ session
    unset($_SESSION["error"]);
}
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="?act=dashboard" class="app-brand-link">
        <span class="app-brand-logo">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#4CAF50" width="40px" height="40px" viewBox="0 0 32 32">
        <!-- Ly trà -->
        <path d="M6 10h20c1.1 0 2 .9 2 2v6c0 3.31-2.69 6-6 6H10c-3.31 0-6-2.69-6-6v-6c0-1.1.9-2 2-2z" />
        <!-- Quai cầm của ly trà -->
        <path d="M26 12c1.1 0 2 .9 2 2v4c0 1.1-.9 2-2 2h-1v-8h1z" />
        <!-- Dòng hơi nước -->
        <path d="M12 5c0-1 1-2 2-2s2 1 2 2c0 1.5-2 2-2 2s-2-.5-2-2zm6 0c0-1 1-2 2-2s2 1 2 2c0 1.5-2 2-2 2s-2-.5-2-2z" />
    </svg>
</span>
            <span class="app-brand-text fs-2 menu-text fw-bold">QUẢN TRỊ</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item py-1">
            <a href="?act=dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <span>Tổng quan</span>
            </a>
        </li>

        <!-- Categories -->
        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <span>Danh mục</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="?act=banner-list" class="menu-link">
                        <span>Banner</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?act=create-category" class="menu-link">
                        <span>Thêm danh mục</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?act=category-list" class="menu-link">
                        <span>Danh sách danh mục</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Products -->
        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <span>Sản phẩm</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="?act=create-product" class="menu-link">
                        <span>Thêm sản phẩm</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?act=product-list" class="menu-link">
                        <span>Danh sách sản phẩm</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Accounts -->
        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <span>Tài khoản</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="?act=admin-list" class="menu-link">
                        <span>Quản trị viên</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?act=customer-list" class="menu-link">
                        <span>Khách hàng</span>
                    </a>
                </li>
            </ul>
        </li>


        <!-- Order -->
        <li class="menu-item py-1">
            <a href="?act=order-list" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <span>Đơn hàng</span>
            </a>
        </li>

        <!-- Reviews -->
        <li class="menu-item py-1">
            <a href="?act=manage-reviews" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-dots"></i>
                <span>Bình luận</span>
            </a>
        </li>
    </ul>
</aside>