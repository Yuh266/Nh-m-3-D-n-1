<?php include "./views/layout/header.php" ?>

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
                            <h2>Đơn Hàng</h2>
                            <span> <a href="<?= BASE_URL ?>">Trang chủ</a> / Đơn hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart -->
    <section class="section-cart padding-t-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Cart</h2>
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
                    <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="row">
                                <?php if (isset($_SESSION['alert_success'])):?>
                                    <div class="alert-success alert"><?=$_SESSION['alert_success']?></div>
                                <?php endif ?>
                                <?php if (isset($_SESSION['alert_error'])):?>
                                    <div class="alert-danger alert"><?=$_SESSION['alert_error']?></div>
                                <?php endif ?>

                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Mã ĐH</th>
                                                <th>Đơn hàng</th>
                                                <th>Trạng thái đơn hàng</th>
                                                <!-- <th class="text-center">Số lượng</th> -->
                                                <th>Thành tiền</th>
                                                <th>Ngày đặt</th>
                                                <th>Xem chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list_don_hang as $key => $value): ?>
                                                <tr >
                                                    <td><?= $value['id_don_hang'] ?></td>
                                                    <td class="cr-cart-name">
                                                        <a
                                                            href="<?= BASE_URL . "/?act=san-pham-chi-tiet&id_san_pham=" . $value['id_san_pham'] ?>">
                                                            <img style="width: 100px; "
                                                                src="<?= BASE_URL . $value['hinh_anh'] ?>" alt="product-1"
                                                                class="cr-cart-img">
                                                            <?= $value['ten_san_pham'] ?>
                                                        </a>
                                                    </td>
                                                    <td class="cr-cart-price">
                                                        <span><?= $value['ten_trang_thai'] ?></span>
                                                    </td>
                                                    <td><?= number_format($value['tong_tien']) ?></td>
                                                    <td><?= $value['ngay_dat'] ?></td>
                                                    <td>
                                                        <?php if ($value['id_trang_thai'] ==1):?>
                                                            <a onclick="return confirm('Bạn chắc chắn muốn hủy chứ?') " href="<?= BASE_URL . "?act=huy-don-hang&id_don_hang=".$value['id_don_hang'] ?>">
                                                                <button class="btn btn-danger">Hủy đơn</button>
                                                            </a> 
                                                            
                                                            <form action="<?= BASE_URL . "/?act=form-thanh-toan" ?>" method="post">
                                                                <input type="text" name="id_don_hang" value="<?= $value['id_don_hang'] ?>" hidden >
                                                                <button type="submit" name="btn_thanh_toan" class="btn btn-success">Thanh toán</button>
                                                            </form>
                                                        <?php  endif ?>
                                                        <?php if ($value['id_trang_thai'] ==4):?>
                                                            <a href="<?= BASE_URL . "?act=san-pham-chi-tiet&id_san_pham=".$value['id_san_pham'] ?>">
                                                                <button class="btn btn-primary">Đánh giá</button>
                                                            </a>
                                                        <?php  endif ?>
                                                        <a href="<?= BASE_URL . "/?act=chi-tiet-don-hang&id=".$value['id_don_hang'] ?>">
                                                            <button type="submit" class="btn btn-primary">Xem</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-cart-update-bottom">
                                            <a href="<?= BASE_URL ?>" class="cr-links">Tiếp tục mua sắm</a>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular products -->
    <section class="section-popular-products padding-tb-100" data-aos="fade-up" data-aos-duration="2000"
        data-aos-delay="400">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30">
                        <div class="cr-banner">
                            <h2>Gợi Ý Cho Bạn</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-popular-product">
                        <?php foreach ($list_san_pham as $key => $value): ?>
                            <div class="slick-slide">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="<?= BASE_URL . $value['hinh_anh'] ?>"
                                                alt="<?= $value['ten_san_pham'] ?> ">
                                        </div>
                                        
                                    </div>
                                    <div class="cr-product-details">
                                        <a href="?act=san-pham-chi-tiet&id_san_pham=<?= $value['id'] ?>" class="title">
                                            <?= $value['ten_san_pham'] ?> </a>
                                        <p class="cr-price"><span
                                                class="new-price"><?= number_format($value['gia_khuyen_mai']) . "đ" ?></span>
                                            <span
                                                class="old-price"><?= number_format($value['gia_san_pham']) . "đ" ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php include "./views/layout/footer.php" ?>