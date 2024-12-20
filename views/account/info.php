<section id="intro">
    <div class="grid wide pt-5">
        <div class="d-flex align-items-center" style="line-height: 18px;">
            <i class="fa-solid fa-angle-left fs-3"></i>
            <span onclick="goHome()" class="header__navbar-menu-link fs-3">Trang chủ</span>
        </div>

        <h1 class="text-center mt-3 pt-5">
            Chi tiết tài khoản
        </h1>
        <div class="account-container">
            <aside class="account__navigation">
                <a href="?act=setting-info&id=<?= $customer['id'] ?>" class="account__navigation-link active">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Chi tiết tài khoản</span>
                </a>
                <a href="?act=order-history&id=<?= $customer['id'] ?>" class="account__navigation-link">
                    <i class="fa-solid fa-dolly"></i>
                    <span>Lịch sử đơn hàng</span>
                </a>
                <a href="setting-password" class="account__navigation-link">
                    <i class="fa-solid fa-key"></i>
                    <span>Password</span>
                </a>
                <a href="?act=logout" class="account__navigation-link">
                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.68113 10.86H6.70132V2.91386H9.68113V4.99972H10.9393V2.26824C10.9393 1.93715 10.6744 1.67228 10.3433 1.67228H6.70132V0.430692C6.70132 0.116157 6.38679 -0.0824967 6.10536 0.0333846L1.05625 2.30135C0.774825 2.43378 0.576172 2.71521 0.576172 3.02974V10.7607C0.576172 11.0752 0.758271 11.3566 1.05625 11.4891L6.10536 13.757C6.38679 13.8895 6.70132 13.6743 6.70132 13.3597V12.1181H10.3433C10.6744 12.1181 10.9393 11.8533 10.9393 11.5222V8.77414H9.68113V10.86Z" fill="black"></path>
                        <path d="M16.1542 6.57244L13.1413 4.12238C12.8764 3.90717 12.4626 4.08927 12.4626 4.45347V5.8606H7.89354C7.69489 5.8606 7.5459 6.02614 7.5459 6.20824V7.59882C7.5459 7.79747 7.71144 7.94646 7.89354 7.94646H12.4626V9.35359C12.4626 9.70123 12.8764 9.89989 13.1413 9.68468L16.1542 7.21806C16.3529 7.05252 16.3529 6.73798 16.1542 6.57244Z" fill="black"></path>
                    </svg>
                    <span>Đăng xuất</span>
                </a>
            </aside>

            <form action="" class="row w-100 d-flex flex-sm-row flex-column-reverse pt-4" method="post" enctype="multipart/form-data">
                <div class="col-12 col-sm-8">
                    <div class="form__group">
                        <label class="fw-semibold" for="username">Tên </label>
                        <input type="username" id="username" name="username" autocomplete="username" value="<?= isset($customer['name']) ? $customer['name'] : ''; ?>">
                        <!-- Show errors -->
                        <?php if (isset($_SESSION["errors"]["username"])) : ?>
                            <p class="fw-semibold text-danger pt-1">
                                <?= $_SESSION["errors"]["username"] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="form__group">
                        <label class="fw-semibold" for="email">Email</label>
                        <input type="email" id="email" name="email" autocomplete="email" value="<?= isset($customer['email']) ? $customer['email'] : ''; ?>">
                        <!-- Show errors -->
                        <?php if (isset($_SESSION["errors"]["email"])) : ?>
                            <p class="fw-semibold text-danger pt-1">
                                <?= $_SESSION["errors"]["email"] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="form__group">
                        <label class="fw-semibold" for="phone">SĐT</label>
                        <input type="tel" id="phone" name="phone" autocomplete="phone" value="<?= isset($customer['phone']) ? $customer['phone'] : ''; ?>">
                        <!-- Show errors -->
                        <?php if (isset($_SESSION["errors"]["phone"])) : ?>
                            <p class="fw-semibold text-danger pt-1">
                                <?= $_SESSION["errors"]["phone"] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="form__group">
                        <div class="d-flex flex-column flex-lg-row gap-4">
                            <select id="city">
                                <option value="" selected>Tỉnh / Thành phố</option>
                            </select>
                            <input type="hidden" id="selectedCityValue" name="city" value="">
                            <select id="district">
                                <option value="" selected>Huyện</option>
                            </select>
                            <input type="hidden" id="selectedDistrictValue" name="district" value="">
                            <select id="ward">
                                <option value="" selected>Phường</option>
                            </select>
                            <input type="hidden" id="selectedWardValue" name="ward" value="">
                        </div>
                        <!-- Show errors -->
                        <?php if (isset($_SESSION["errors"]["city"])) : ?>
                            <p class="fw-semibold text-danger pt-1">
                                <?= $_SESSION["errors"]["city"] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="form__group">
                        <label class="fw-semibold" for="address">Địa chỉ chi tiết</label>
                        <input type="text" id="address" name="address" autocomplete="address" value="<?= isset($customer['address']) ? $customer['address'] : ''; ?>">
                        <!-- Show errors -->
                        <?php if (isset($_SESSION["errors"]["address"])) : ?>
                            <p class="fw-semibold text-danger pt-1">
                                <?= $_SESSION["errors"]["address"] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="form__group">
                        <h4 class="fw-semibold">Ngày đăng ký:
                            <span class="fw-bold"><?= isset($customer['registration_date']) ? $customer['registration_date'] : ''; ?></span>
                        </h4>
                    </div>
                    <div class="form__group">
                        <h4 class="fw-semibold">Trạng thái:
                            <?php
                            $statuses = [
                                0 => ['Blocked', 'text-bg-danger'],
                                1 => ['Active', 'text-bg-success'],
                                2 => ['Unverified', 'text-bg-secondary'],
                            ];

                            $status     = isset($customer['status']) ? $customer['status'] : '';
                            $statusText = isset($statuses[$status]) ? $statuses[$status][0] : '';
                            $className  = isset($statuses[$status]) ? $statuses[$status][1] : 'text-bg-dark';
                            ?>
                            <span class="fs-4 fw-semibold rounded px-2 py-1 <?= $className ?>">
                                <?= $statusText ?>
                            </span>
                        </h4>
                    </div>
                    <button type="submit" name="btnSaveInfo" class="btn btn-danger fs-3 fw-semibold w-100 mt-5">
                        <i class="fa-regular fa-floppy-disk me-2"></i>
                        Lưu
                    </button>
                </div>

                <div class="col-12 col-sm-4 mb-5">
                    <div class="col-12 m-auto mb-5 text-center">
                        <div class="avt m-auto" style="width: 150px; height: 150px;">
                            <?php
                            $defaultAvatar = 'https://i.stack.imgur.com/l60Hf.png';
                            $avatar = !empty($customer['avatar']) ? BASE_URL . $customer['avatar'] : $defaultAvatar;
                            ?>
                            <img id="avatarPreview" src="<?= $avatar ?>" class="avt-img rounded-circle h-100 object-fit-cover" alt="avatar">
                        </div>
                        <!-- Show errors -->
                        <?php if (isset($_SESSION["errors"]["avatar"])) : ?>
                            <p class="fw-semibold text-danger  pt-3">
                                <?= $_SESSION["errors"]["avatar"] ?>
                            </p>
                        <?php endif; ?>
                        <?php unset($_SESSION["errors"]); ?>
                        <?php unset($_SESSION["data"]); ?>
                        <label for="upload" class="btn btn-outline-secondary fs-4 mt-4"><i class="fa-regular fa-image me-2"></i>Chọn ảnh</label>
                        <input type="file" id="upload" name="avatar" hidden>
                        <input type="hidden" name="img-current" value="<?= $customer['avatar'] ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    document.getElementById('upload').addEventListener('change', function() {
        var file = this.files[0];
        if (file && file.type.startsWith('image/')) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }

    function bindSelectChangeEvent(selectElement, hiddenInputElement) {
        selectElement.addEventListener("change", function() {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            hiddenInputElement.value = selectedOption.innerText;
        });
    }

    citis.addEventListener("change", function() {
        updateSelectedValue(citis, selectedCityValue);
    });

    districts.addEventListener("change", function() {
        updateSelectedValue(districts, selectedDistrictValue);
    });

    wards.addEventListener("change", function() {
        updateSelectedValue(wards, selectedWardValue);
    });

    function updateSelectedValue(selectElement, hiddenInput) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var selectedOptionText = selectedOption.innerText;
        hiddenInput.value = selectedOptionText;
    }
</script>