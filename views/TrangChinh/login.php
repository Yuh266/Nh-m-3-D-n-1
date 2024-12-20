
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
                            <h2>Đăng nhập</h2>
                            <span> <a href="index.php">Trang chủ</a> - Đăng nhập</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login -->
    <section class="section-login padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Đăng nhập</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cr-login" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="form-logo">
                            <img src="assets/img/logo/logo2.png" width="180px" height="150px" alt="logo">
                        </div>                    
                        <form   class="cr-content-form" method="POST" action="<?= BASE_URL."?act=form-login"?>"  >
                            <div class="form-group">
                                <label>Email*</label>
                                <input type="email" placeholder="Nhập Email" class="cr-form-control" name="email" value="<?= $_COOKIE['email'] ?? '' ?>"  >
                                <div class="form-text text-danger"><?
                                
                                if(isset ($_SESSION['error_client_login']['email']) ) {
                                    echo $_SESSION['error_client_login']['email'];
                                    unset($_SESSION['error_client_login']['email']);

                                }
                                
                                
                                ?></div>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu*</label>
                                <input type="password" placeholder="Nhập mật khẩu" class="cr-form-control" name="mat_khau" value="<?= $_COOKIE['mat_khau'] ?? '' ?>">
                                <div class="form-text text-danger"><?
                                
                                if(isset ($_SESSION['error_client_login']['mat_khau']) ) {
                                    echo $_SESSION['error_client_login']['mat_khau'];
                                    unset($_SESSION['error_client_login']['mat_khau']);

                                }
                                
                                
                                
                                ?></div>
                            </div>
                            <div class="form-text text-danger mb-5">
                            <?php 
                            if(isset($_SESSION['check-false'])){
                              echo $_SESSION['check-false'];
                              unset($_SESSION['check-false']);
                            }
                              ?>
                            </div>
                            <div class="remember">
                                <span class="form-group custom">
                                    <input type="checkbox" id="ghi_nho" name="ghi_nho" <?= isset($_COOKIE['email']) ? 'checked' : '' ?>>
                                    <label for="ghi_nho">Ghi nhớ tôi</label>
                                </span>
                                <a class="link" href="forgot.html">Quên mật khẩu?</a>
                            </div><br>
                            <div class="login-buttons">
                                <button type="submit" class="cr-button">Đăng nhập</button>
                           
                                <a href="<?= BASE_URL . "?act=register" ?>" class="link">
                                     Đăng kí?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include './views/layout/footer.php' ?>

