<?php include './views/layout/header.php' ?>

<main>
    <!-- Mobile menu -->
    <div class="cr-sidebar-overlay"></div>
    <div id="cr_mobile_menu" class="cr-side-cart cr-mobile-menu">
        <div class="cr-menu-title">
            <span class="menu-title">My Menu</span>
            <button type="button" class="cr-close">×</button>
        </div>
        <div class="cr-menu-inner">
            <div class="cr-menu-content">
                <ul>
                    <li class="dropdown drop-list">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">Category</a>
                        <ul class="sub-menu">
                            <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                            <li><a href="shop-right-sidebar.html">Shop Right sidebar</a></li>
                            <li><a href="shop-full-width.html">Full Width</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">product</a>
                        <ul class="sub-menu">
                            <li><a href="product-left-sidebar.html">product Left sidebar</a></li>
                            <li><a href="product-right-sidebar.html">product Right sidebar</a></li>
                            <li><a href="product-full-width.html">Product Full Width </a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="track-order.html">Track Order</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="policy.html">Policy</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                            <li><a href="blog-full-width.html">Full Width</a></li>
                            <li><a href="blog-detail-left-sidebar.html">Detail Left Sidebar</a></li>
                            <li><a href="blog-detail-right-sidebar.html">Detail Right Sidebar</a></li>
                            <li><a href="blog-detail-full-width.html">Detail Full Width</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)">Element</a>
                        <ul class="sub-menu">
                            <li><a href="elements-products.html">Products</a></li>
                            <li><a href="elements-typography.html">Typography</a></li>
                            <li><a href="elements-buttons.html">Buttons</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

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
                    <div class="cr-sidebar-wrap cr-checkout-pay-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Phương thức thanh toán</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-pay">
                                    <div class="cr-pay-desc">Vui lòng chọn phương thức thanh toán của bạn.</div>
                                    <form action="#" class="payment-options">
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay1" name="radio-group" checked>
                                                <label for="pay1">Thanh toán khi nhận hàng</label>
                                            </span>
                                        </span>
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay2" name="radio-group">
                                                <label for="pay2">UPI</label>
                                            </span>
                                        </span>
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay3" name="radio-group">
                                                <label for="pay3">Thanh toán ngân hàng</label>
                                            </span>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-check-pay-img-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-check-pay-img-inner">
                                    <div class="cr-check-pay-img">
                                        <img src="assets/img/banner/payment.png" alt="payment">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
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