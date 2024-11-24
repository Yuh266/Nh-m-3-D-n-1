<?php include './views/layout/header.php' ?>

<main>
    

    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Thanh toán</h2>
                            <span> <a href="<?= BASE_URL ?>">Trang chủ</a> - Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkout section -->
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">

            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="cr-checkout-rightside col-lg-4 col-md-12">
                    <div class="cr-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Bản tóm tắt</h3>
                            </div>
                            <div class="cr-sb-block-content">

                                <div class="cr-checkout-pro">
                                    <?php foreach ($array_san_pham as $key => $value): ?>
                                        <div class="col-sm-12 mb-6">
                                            <div class="cr-product-inner">
                                                <div class="cr-pro-image-outer">
                                                    <div class="cr-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <img class="main-image" src="<?= $value['hinh_anh'] ?>"
                                                                alt="Product">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cr-pro-content cr-product-details">
                                                    <h5 class="cr-pro-title"><a
                                                            href="<?= BASE_URL . "?act=san-pham-chi-tiet&id_san_pham=" . $value['id'] ?>"><?= $value['ten_san_pham'] ?></a>
                                                        x <?= $value['so_luong'] ?></h5>
                                                    <p class="cr-price"><span
                                                            class="new-price"><?= $value['gia_khuyen_mai'] ?></span> <span
                                                            class="old-price"><?= $value['gia_san_pham'] ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $tong_tien += $value['gia_khuyen_mai'] * $value['so_luong'] ?>
                                    <?php endforeach ?>
                                    <div class="col-sm-12 mb-0">
                                        <div class="cr-product-inner">
                                        </div>
                                    </div>
                                </div>
                                <div class="cr-checkout-summary">
                                    <div>
                                        <span class="text-left">Thành tiền:</span>
                                        <span class="text-right"><?= number_format($tong_tien) . "đ" ?></span>
                                    </div>
                                    <div>
                                        <span class="text-left">Phí vận chuyển:</span>
                                        <span class="text-right">Miễn phí</span>
                                    </div>
                                    <div class="cr-checkout-summary-total">
                                        <span class="text-left">Tổng tiền:</span>
                                        <span class="text-right"><?= number_format($tong_tien) . "đ" ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
                   
                   
                </div>
                <div class="cr-checkout-leftside col-lg-8 col-md-12 m-t-991">
                    <form enctype="multipart/form-data" action="<?= BASE_URL . "?act=thanh-toan" ?>" method="POST">
                        <!-- checkout content Start -->
                        <input type="text" name="tong_tien" value="<?= $tong_tien ?>" hidden>
                        <?php foreach ($id as $key => $value): ?>
                            <input type="text" name="id[]" value="<?= $value ?>" hidden>
                            <input type="text" name="so_luong[]" hidden value="<?= $so_luong[$key] ?>">
                        <?php endforeach ?>
                        <div class="cr-checkout-content">
                            <div class="cr-checkout-inner">
                                <div class="cr-checkout-wrap">
                                    <div class="cr-checkout-block cr-check-bill">
                                        <div class="cr-check-subtitle">Ghi chú</div>
                                        <div class="input-group mb-3 ">
                                            <textarea class="form-control" name="ghi_chu"></textarea>
                                        </div>
                                        <div class="cr-bl-block-content">
                                            <div class="cr-check-subtitle">Địa chỉ nhận hàng</div>
                                            <div class="input-group mb-3 ">
                                                <select class="form-select" name="id_dia_chi_nhan_hang">
                                                    <?php foreach ($list_dia_chi_nhan_hang as $key => $value): ?>
                                                        <option value="<?= $value['id'] ?>">
                                                            <?= $value['ten_nguoi_nhan'] . " -- " . $value['sdt_nguoi_nhan'] . " -- " . $value['dia_chi_nguoi_nhan'] ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <span class="">
                                                <div class="text-danger ms-3 mb-4">
                                                    <?= $_SESSION['error']['id_dia_chi_nhan_hang'] ?? "" ?>
                                                </div>
                                            </span>
                                            <span class="cr-check-order-btn">
                                                <button class="cr-button mt-30" name="btn_old" type="submit">Xác
                                                    nhận</button>
                                            </span>
                                            <div class="cr-check-bill-form mb-minus-24 mt-4">
                                                <h3 class="cr-checkout-title">Giao hàng đến địa chỉ mới</h3>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Tên người nhận</label>
                                                    <input type="text" value="<?= $_SESSION['dia_chi']['ten_nguoi_nhan']??"" ?>" name="ten_nguoi_nhan"
                                                        placeholder="Nhập tên của bạn">
                                                </span>
                                                <span class="">
                                                    <div class="text-danger ms-3 mb-4">
                                                        <?= $_SESSION['error']['ten_nguoi_nhan'] ?? "" ?>
                                                    </div>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Số điện thoại người nhận</label>
                                                    <input type="text" value="<?= $_SESSION['dia_chi']['sdt_nguoi_nhan']??"" ?>" name="sdt_nguoi_nhan"
                                                        placeholder="Số điện thoại">
                                                </span>
                                                <span class="">
                                                    <div class="text-danger ms-3 mb-4">
                                                        <?= $_SESSION['error']['sdt_nguoi_nhan'] ?? "" ?>
                                                    </div>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half w-100">
                                                    <label>Địa chỉ người nhận</label>
                                                    <input type="text" value="<?= $_SESSION['dia_chi']['dia_chi_nguoi_nhan']??"" ?>" name="dia_chi_nguoi_nhan"
                                                        placeholder="Địa chỉ nhận hàng">
                                                </span>
                                                <span class="">
                                                    <div class="text-danger ms-3 mb-4">
                                                        <?= $_SESSION['error']['dia_chi_nguoi_nhan'] ?? "" ?>
                                                    </div>
                                                </span>
                                                <span class="cr-check-order-btn my-3">
                                                    <button class="cr-button m-30" name="btn_new" type="submit">Xác
                                                        nhận</button>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--cart content End -->
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- Checkout section End -->
</main>

<?php include './views/layout/footer.php' ?>