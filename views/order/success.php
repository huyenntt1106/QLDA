<!-- Style button-->
<style>
    body {
        margin: 0;
        height: 100vh;
        overflow: hidden;
    }

    .pulse {
        --color: #32cd1e;
        --hover: #32cd1e;
    }

    .pulse:hover,
    .pulse:focus {
        animation: pulse 1s;
        box-shadow: 0 0 0 2em transparent;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 var(--hover);
        }
    }

    .pulse {
        background: none;
        border: 2px solid;
        font: inherit;
        padding: 1em 2em;
        color: var(--color);
        transition: 0.25s;
    }

    .pulse:hover,
    .pulse:focus {
        border-color: #000;
        color: #000;
    }
</style>

<div class="d-flex text-center p-5">
    <div class="m-auto d-flex flex-column gap-5" style="width: 500px;">
        <img src="<?= BASE_URL ?>assets/images/thankyou.png" alt="" class="thankyou-img">
        <p style="font-size: 5rem;">Cảm Ơn !</p>
        <p class="fs-2">Chúc mừng! 🍻 Đơn hàng của bạn đã được đặt thành công.</p>
        <a href="?act=home-page" class="pulse fs-3 fw-bold">Trang chủ</a>
    </div>
</div>

<div class="firework"></div>
<div class="firework"></div>
<div class="firework"></div>