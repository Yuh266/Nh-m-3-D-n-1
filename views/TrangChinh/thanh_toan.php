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
                <div class="cr-checkout-rightside col-lg-12 col-md-12">
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
                                                            class="new-price"><?= number_format($value['gia_khuyen_mai'])."đ" ?></span> <span
                                                            class="old-price"><?= number_format($value['gia_san_pham'])."đ" ?></span></p>
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
                    <div class="cr-sidebar-wrap cr-checkout-pay-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Phương thức thanh toán</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class=" cr-checkout-pay">
                                    <div class=" cr-pay-desc">Vui lòng chọn phương thức thanh toán của bạn.</div>
                                        <div class="row">
                                        <span class="col-4 cr-pay-option">
                                            <form class="payment-options" method="POST" action="<?= BASE_URL . "?act=xu-li-thanh-toan" ?>">
                                                <input type="text" name="id_don_hang" hidden value="<?= $id_don_hang ?>" >
                                                <input class="btn btn-success m-4" type="submit"  value="Thanh toán khi nhận hàng" >
                                            </form> 
                                        </span>
                                        <span class="col-4 cr-pay-option">
                                                <form class="payment-options" enctype="application/x-www-form-urlencoded" method="POST" action="<?= BASE_URL . "?act=xu-li-thanh-toan-momo" ?>">
                                                    <input type="text" name="id_don_hang" hidden value="<?= $id_don_hang ?>" >
                                                    <input type="text" name="tong_tien" value="<?= $tong_tien ?>" hidden >
                                                    <input class="btn btn-success m-4" type="submit" name="momo" value="Thanh toán momo mã QR" >
                                                </form> 
                                        </span>
                                        <span class="col-4 cr-pay-option">
                                            <form class="payment-options" enctype="application/x-www-form-urlencoded" method="POST" action="<?= BASE_URL . "?act=xu-li-thanh-toan-momo-atm" ?>">
                                                <input type="text" name="id_don_hang" hidden value="<?= $id_don_hang ?>" >
                                                <input type="text" name="tong_tien" value="<?= $tong_tien ?>" hidden >
                                                <input class="btn btn-success m-4" type="submit" name="momo" value="Thanh toán momo ATM" >
                                            </form> 
                                        </span>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Checkout section End -->
</main>

<?php include './views/layout/footer.php' ?>