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
                            <span> <a href="<?= BASE_URL ?>">Trang chủ</a> / <a href="<?= BASE_URL ."/?act=don-hang" ?>">Đơn hàng</a> / Chi tiết đơn hàng </span>
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
                            <form action="#">
                                <div>
                                <div class="container my-4">
                                    <h2 class="text-center text-primary">Chi Tiết Đơn Hàng</h2>
                                    <ul class="list-group">
                                        <?php foreach ($list_don_hang as $key => $value): ?>
                                        <!-- Đơn hàng 1 -->
                                        <ul class="list-group">
                                            <h5 class="list-group-item mb-1 text-primary">Đơn hàng HH<?= $value['id_don_hang'] ?></h5>
                                            <li class="list-group-item  mb-1"><strong>Khách hàng: </strong> <?= $value['ho_ten'] ?></li>
                                            <li class="list-group-item  mb-1"><strong>Ngày đặt: </strong><?= $value['ngay_dat'] ?></li>
                                            <li class="list-group-item mb-1 text-danger" ><strong>Trạng thái: </strong><?= $value['ten_trang_thai'] ?></li>
                                            <?php foreach ($list_don_hang as $key => $value): ?>
                                                <li class="list-group-item mb-1"> <img style="width: 100px; " src="<?= BASE_URL . $value['hinh_anh'] ?>" alt="<?= $value['ten_san_pham'] ?>"> <?= $value['ten_san_pham'] ?></li>
                                                <li class="list-group-item mb-1"><strong>Mô tả: </strong> <?= $value['mo_ta'] ?></li>
                                            <ul class="list-group-item"><strong>Số lượng:</strong> <?= $value['so_luong'] ?> | <strong>Giá:</strong> <?= $value['gia_khuyen_mai'] ?> VND | <strong>Tổng:</strong> <?= $value['thanh_tien'] ?> VND</ul>
                                            <?php endforeach ?>
                                            <ul class="list-group-item"><strong class="text-danger" >Tổng tiền:</strong> <?= $value['tong_tien'] ?> VND<strong></strong>
                                        </ul>
                                        <ul class="list-group">
                                            <h5 class="list-group-item mb-1 text-primary">Thông tin nhận hàng </h5>
                                            <li class="list-group-item mb-1"><strong>Tên người nhận: </strong> <?= $value['ten_nguoi_nhan'] ?></li>
                                            <li class="list-group-item mb-1"><strong>Số điện thoại: </strong><?= $value['sdt_nguoi_nhan'] ?></li>
                                            <li class="list-group-item mb-1"><strong>Địa chỉ: </strong> <?= $value['dia_chi_nguoi_nhan'] ?></li>
                                            <li class="list-group-item mb-1"><strong>Ghi chú: </strong> <?= $value['ghi_chu'] ?></li>
                                        </u>
                                    
                                        <?php break ; ?>
                                        <?php endforeach ?>
                                    </u>
                                </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-cart-update-bottom mb-4">
                                            <a href="<?= BASE_URL ?>" class="cr-links">Tiếp tục mua sắm</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include "./views/layout/footer.php" ?>