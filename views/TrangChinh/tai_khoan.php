<?php
include './views/layout/header.php';
?>
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
                        <a href="index.php">Home</a>
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
                            <h2>Thông tin tài khoản</h2>
                            <span> <a href="index.php">Trang chủ</a> - Thông tin tài khoản</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login -->
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->

                <div class="cr-checkout-leftside col-lg-12 col-md-12 m-t-991">
                    <!-- checkout content Start -->
                    <div class="cr-checkout-content">
                        <div class="cr-checkout-inner">

                            <div class="cr-checkout-wrap">
                                <div class="cr-checkout-block cr-check-bill">
                                    <h2 class="cr-checkout-title">Thông tin tài khoản</h2>
                                    <p>Quản lý thông tin hồ sơ</p>

                                    <div class="cr-bl-block-content">
                                        <hr>
                                        <div class="cr-check-bill-form mb-minus-24">
                                            <div class="row">
                                                <div class="col-md-7 border-end pe-3">
                                                    <form enctype="multipart/form-data" action="<?= BASE_URL . "?act=tai_khoan" ?>" method="post">

                                                        <span class="cr-bill-wrap ">
                                                            <label>Tên người dùng</label>
                                                            <input type="text" name="ho_ten" value="<?= $_SESSION['user']['ho_ten'] ?>" required>
                                                        </span>

                                                        <span class="cr-bill-wrap ">
                                                            <label>Email*</label>
                                                            <input type="text" name="email" value="<?= $_SESSION['user']['email'] ?>" required>
                                                        </span>
                                                        <span class="cr-bill-wrap cr-bill-half ">
                                                            <label>Số điện thoại</label>
                                                            <input type="text" name="so_dien_thoai" value="<?= $_SESSION['user']['so_dien_thoai'] ?>">
                                                        </span>
                                                        <div class="mb-3 cr-bill-wrap cr-bill-half">
                                                            <label for="gioi_tinh" class="form-label">Giới tính</label>
                                                            <select class="form-select" id="gioi_tinh" name="gioi_tinh" required>
                                                                <option value="1" <?= ($_SESSION['user']['gioi_tinh'] == 1) ? 'selected' : '' ?>>Nam</option>
                                                                <option value="0" <?= ($_SESSION['user']['gioi_tinh'] == 0) ? 'selected' : '' ?>>Nữ</option>
                                                                <option value="2" <?= ($_SESSION['user']['gioi_tinh'] == 2) ? 'selected' : '' ?>>Khác</option>
                                                            </select>
                                                        </div>

                                                        <span class="cr-bill-wrap cr-bill-half ">
                                                            <label>Địa chỉ*</label>
                                                            <input type="text" name="dia_chi" value="<?= $_SESSION['user']['dia_chi'] ?>">
                                                        </span>
                                                        <span class="cr-bill-wrap cr-bill-half ">
                                                            <label>Ngày sinh*</label>
                                                            <input type="date" name="ngay_sinh" value="<?= $_SESSION['user']['ngay_sinh'] ?>">
                                                        </span>
                                                    </form>
                                                </div>

                                                <div class="col-md-5 d-flex flex-column align-items-center justify-content-center text-center">

                                                    <div>
                                                        <img src="<?= BASE_URL . $_SESSION['user']['anh_dai_dien'] ?>" width="150px" height="150px" class="user-image rounded-circle shadow" alt="user_image"> <br>
                                                        <button type="file" name="file_anh" class="btn btn-light btn--m btn--inline  mt-2 ">Chọn Ảnh</button>
                                                        <p class="mt-2">Dung lượng file tối đa là 1 MB<br />Định dạng: .JPEG, .PNG</p>
                                                    </div>


                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <span class="cr-check-order-btn">

                                <a class="cr-button mt-30" href="#">Lưu thay đổi</a>
                            </span>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>


            </div>
        </div>
    </section>
</main>

<?php include './views/layout/footer.php' ?>