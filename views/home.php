<section id="intro">
    <div class="grid wide">
        <div class="grid-home">
            <?php foreach (array_slice($listBanner, 0, 4) as $banner) : ?>
                <?php
                $gridClass = 'grid-' . $banner['grid'];
                ?>
                <div class="featured <?= $gridClass ?>">
                    <a href="?act=category-menu&id=<?= $banner['id_category'] ?>" class="home__featured-link">
                        <div class="overlay-img"></div>
                        <img src="<?= BASE_URL . $banner['image'] ?>" alt="" class="home__featured-img">
                        <p class="home__featured-title fs-2"><?= $banner['title'] ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="product">
    <div class="grid wide">
        <h2 class="page-title fs-1">Sản Phẩm Đề Xuất</h2>
        <div class="grid-products">
            <marquee scrollamount="10">Big sale</marquee>

            <?php foreach ($topDiscounts as $product) : ?>
                <?php
                $basePrice = $product['price'];
                $discount  = $product['discount'];
                // Tính toán giá sau khi được giảm giá
                $sale = $basePrice - ($basePrice * $discount / 100);
                ?>
                <div class="product__item">
                    <div onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="product__item-wrapper-img" style="min-height: 300px;">
                        <?php if ($product['discount'] != 0) : ?>
                            <span id="discount-stick" class="shadow fs-4 position-absolute">
                                –<?= $product['discount'] ?>%
                            </span>
                        <?php endif; ?>
                        <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="" class="product__item-img">
                    </div>
                    <div class="product__item-btn-overlay">
                        <button onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="btn btn-outline-danger px-4 fs-3">Xem</button>
                    </div>
                    <div class="product__item-details w-100">
                        <h4 class="product__item-name fs-3" style="text-shadow: 1px 1px 0px #fff, -1px -1px 0px #fff, 1px -1px 0px #fff, -1px 1px 0px #fff;">
                            <?= $product['name'] ?>
                        </h4>
                        <p class="product__item-price fs-3">
                            <?php if ($sale == $basePrice) : ?>
                                <span> <?= number_format($basePrice, 0, '.', ',') ?> VNĐ</span>
                            <?php else : ?>
                                <span class="text-secondary fw-light text-decoration-line-through"> <?= number_format($basePrice, 0, '.', ',') ?> VNĐ</span>
                                <span> <?= number_format($sale, 0, '.', ',') ?> VNĐ</span>
                            <?php endif; ?>
                            <span class="float-end fs-5 text-secondary"><i class="fa-regular fa-eye me-2"></i><?= $product['view'] ?></span>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<section class="banner">
    <div class="grid wide">
        <div class="banner-container">
            <?php $banner = end($listBanner); ?>
            <div class="banner__text-side">
                <h2 class="banner__text-title fs-1">
                    <?= $banner['title'] ?>
                </h2>
                <p class="banner__text-subtitle fs-3">
                    <?= $banner['description'] ?>
                </p>
                <a href="?act=category-menu&id=<?= $banner['id_category'] ?>" class="banner-btn">Mua Ngay</a>
            </div>
            <div class="banner__img-side">
                <img src="<?= BASE_URL . $banner['image'] ?>" alt="" class="banner-img">
            </div>
        </div>
    </div>
</section>

<section class="carousel">
    <div class="grid wide">
        <h2 class="page-title fs-1">Sản Phẩm Nổi Bật</h2>

        <div class="carousel-container">
            <div class="carousel-slider" id="slider">

                <?php foreach ($topViews as $product) : ?>
                    <?php
                    $basePrice = $product['price'];
                    $discount  = $product['discount'];
                    // Tính toán giá sau khi được giảm giá
                    $sale = $basePrice - ($basePrice * $discount / 100);
                    ?>
                    <div class="product__item">
                        <div onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="product__item-wrapper-img" style="min-height: 220px;">
                            <?php if ($product['discount'] != 0) : ?>
                                <span id="discount-stick" class="shadow fs-5 position-absolute">
                                    –<?= $product['discount'] ?>%
                                </span>
                            <?php endif; ?>
                            <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="" class="product__item-img">
                        </div>
                        <div class="product__item-btn-overlay">
                            <button onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="btn btn-outline-danger px-4 fs-4">Xem</button>
                        </div>
                        <div class="product__item-details w-100">
                            <h4 class="product__item-name fs-4" style="text-shadow: 1px 1px 0px #fff, -1px -1px 0px #fff, 1px -1px 0px #fff, -1px 1px 0px #fff;"><?= $product['name'] ?></h4>
                            <p class="product__item-price fs-3">
                                <?php if ($sale == $basePrice) : ?>
                                    <span><?= number_format($basePrice, 0, '.', ',') ?>  VNĐ</span>
                                <?php else : ?>
                                    <span class="text-secondary fw-light text-decoration-line-through"><?= number_format($basePrice, 0, '.', ',') ?></span>
                                    <span><?= number_format($sale, 0, '.', ',') ?>  VNĐ</span>
                                <?php endif; ?>
                                <span class="float-end fs-5 text-secondary"><i class="fa-regular fa-eye me-2"></i><?= $product['view'] ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="carousel-controls">
                <div class="carousel-btn-prev"></div>
                <div class="carousel-btn-next"></div>
            </div>
        </div>
    </div>
</section>