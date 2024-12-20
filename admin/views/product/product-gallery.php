<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="py-3 mb-4 d-flex justify-content-between align-items-center">
            <span class="fs-3 fw-bold">Tùy chỉnh thư viện sản phẩm</span>
            <div class="float-end">
                <a href="?act=product-list" class="btn btn-secondary" type="button">
                    <i class="bx bx-arrow-back me-1"></i>
                    Quay lại
                </a>
                <a href="?act=add-color-product&id=<?= $product['id'] ?>" class="btn btn-dark p-2">
                    <i class="bx bx-brush me-1"></i>
                    Thêm phân loại
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-dark">
                            <?= $product['name'] ?>
                        </h4>
                        <div class="mx-auto" style="max-width: 400px;"><img src="<?= PATH_UPLOAD . $product['thumbnail'] ?>" class="w-100"></div>
                    </div>
                    <div class="card-body row">
                        <?php $i = 0; ?>
                        <?php foreach ($gallery as $item) : ?>
                            <div class="col-md-4 mb-4 position-relative">
                                <a href="?act=delete-image&id=<?= $item['id'] ?>&product=<?= $_GET["id"] ?>" class="img-link d-block position-relative">
                                    <div class="ovl position-absolute top-50 start-50 translate-middle">
                                        <i class="bx bx-x-circle text-danger position-absolute top-50 start-50 translate-middle fs-2"></i>
                                    </div>
                                    <img src="<?= PATH_UPLOAD . $item['url'] ?>" width="100%" height="100%" class="img-thumbnail shadow-lg">
                                </a>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Phương tiện truyền thông</h5>
                        </div>

                        <?php if ($i < 3) : ?>
                            <div class="card-body">
                                <label class="form-label" for="product-gallery">Thư viện sản phẩm</label>
                                <input type="file" name="productGallery" class="form-control" id="product-gallery">
                                <!-- Show errors -->
                                <?php if (isset($_SESSION["errors"]["productGallery"])) : ?>
                                    <span class="bg-label-danger">
                                        <?= $_SESSION["errors"]["productGallery"] ?>
                                    </span>
                                <?php endif; ?>
                                <?php unset($_SESSION["errors"]); ?>
                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <button type="reset" class="btn btn-outline-secondary me-2">Làm mới</button>
                                    <button class="btn btn-primary" type="submit" name="btnAddGallery">
                                        <i class="bx bx-upload me-1"></i>
                                        Thêm vào thư viện sản phẩm
                                    </button>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if ($i == 3) : ?>
                            <div class="card-body">
                                <span class="bg-label-danger">Đã đạt ảnh tối đa, vui lòng xóa bớt ảnh.</span>
                            </div>
                        <?php endif ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>