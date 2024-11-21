<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:29:37 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
    <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
    <meta name="author" content="ashishmaraviya">

    <title>Carrot - Multipurpose eCommerce HTML Template</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/img/logo/favicon.png">

    <!-- Icon CSS -->
    <link rel="stylesheet" href="assets/css/vendor/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/vendor/remixicon.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="assets/css/vendor/animate.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/aos.min.css">
    <link rel="stylesheet" href="assets/css/vendor/range-slider.css">
    <link rel="stylesheet" href="assets/css/vendor/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery.slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="body-bg-6">

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-header">
                        <a href="<?= BASE_URL ?>" class="cr-logo">
                            <img src="assets/img/logo/logo.png"  alt="logo" class="logo">
                            <img src="assets/img/logo/dark-logo.png" alt="logo" class="dark-logo">
                        </a>
                        <form action="<?= BASE_URL?>" method="GET" class="cr-search">
                            <input type="text" name="act" value="tim-kiem" hidden >
                            <input class="search-input" name="keyword" type="text" placeholder="Tìm kiếm sản phẩm...">
                            <!-- <input type="text" name="hhuy" > -->
                            <button type="submit" href="javascript:void(0)" class="search-btn border-0">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>
                        <div class="cr-right-bar">
                            <ul class="navbar-nav">
                                <?php if (isset($_SESSION['client_user'])): ?>
                                    <li class="nav-item dropdown ">
                                        <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                            <i class=""></i>
                                            <img src="<?= BASE_URL. $_SESSION['client_user']['anh_dai_dien'] ?>" width="30px" height="22px" class="user-image rounded-circle shadow"  alt="user_image">
                                            <span style="padding-left: 15px;"><?= $_SESSION['client_user']['ho_ten'] ?></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="<?= BASE_URL . "?act=don-hang"  ?> ">Đơn hàng của tôi</a>
                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="<?=BASE_URL . "?act=tai_khoan" ?>"> Thông tin tài khoản</a>
                                                <a class="dropdown-item" href="<?=BASE_URL . "?act=logout"  ?> ">Đăng xuất</a>

                                            </li>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                            <i class="ri-user-3-line"></i>
                                            <span>Tài Khoản</span>
                                        </a>
                                        <ul class="dropdown-menu">

                                            <li>
                                                <a class="dropdown-item" href="<?= BASE_URL . "?act=register" ?>">Đăng ký</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?= BASE_URL . "?act=login" ?>">Đăng nhập</a>
                                            </li>


                                        </ul>
                                    </li>
                                <?php endif; ?>

                            </ul>
                            <!-- <a href="wishlist.html" class="cr-right-bar-item">
                                <i class="ri-heart-3-line"></i>
                                <span>Wishlist</span>
                            </a> -->
                            <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                                <i class="ri-shopping-cart-line"></i>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cr-fix" id="cr-main-menu-desk">
            <div class="container">
                <div class="cr-menu-list">
                    <div class="cr-category-icon-block">
                        <div class="cr-category-menu">
                            <div class="cr-category-toggle">
                                <i class="ri-menu-2-line"></i>
                            </div>
                        </div>
                        <div class="cr-cat-dropdown">
                            <div class="cr-cat-block">
                                <div class="cr-cat-tab">
                                    <div class="cr-tab-list nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="true">
                                            Cây văn phòng</button>
                                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="false" tabindex="-1">
                                            Cây nội thất</button>
                                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-messages" type="button" role="tab"
                                            aria-controls="v-pills-messages" aria-selected="false" tabindex="-1">
                                            Cây ngoài trời</button>
                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-settings" type="button" role="tab"
                                            aria-controls="v-pills-settings" aria-selected="false" tabindex="-1">
                                            Cây treo tường</button>
                                        <a class="nav-link" href="shop-left-sidebar.html">
                                            Xem tất cả </a>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <!-- Cây văn phòng -->
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Cây xanh phổ biến</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cây Kim Tiền</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Lưỡi Hổ</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Phú Quý</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Bàng Singapore</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Trầu Bà</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Cây nhỏ để bàn</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cây Xương Rồng</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Sen Đá</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Hồng Môn</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Cau Tiểu Trâm</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Ngũ Gia Bì</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Cây nội thất -->
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                            aria-labelledby="v-pills-profile-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Cây trồng trong nhà</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cây Cọ Nhật</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Monstera</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Lan Ý</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Thiết Mộc Lan</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Dương Xỉ</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Cây hợp phong thủy</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cây Kim Ngân</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Đuôi Công</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Vạn Lộc</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Đại Phú Gia</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Phát Tài</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Cây ngoài trời -->
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Cây trang trí sân vườn</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cây Hoa Giấy</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Sứ Thái</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Tre Cảnh</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Dừa Cảnh</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Lộc Vừng</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Cây leo</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cây Hoa Thiên Lý</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Cẩm Tú Cầu</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Trầu Bà Leo</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Hoa Hồng Leo</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Hoa Mai Hoàng Yến</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Cây treo tường -->
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                            aria-labelledby="v-pills-settings-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Cây treo tường</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cây Dây Nhện</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Ráng Ổ Phụng</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Trầu Bà Xanh</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Lan Tim</a></li>
                                                        <li><a href="shop-left-sidebar.html">Cây Ngọc Ngân</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Chậu treo</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Chậu Treo Sứ</a></li>
                                                        <li><a href="shop-left-sidebar.html">Chậu Treo Nhựa</a></li>
                                                        <li><a href="shop-left-sidebar.html">Chậu Treo Kim Loại</a></li>
                                                        <li><a href="shop-left-sidebar.html">Giá Treo Cây</a></li>
                                                        <li><a href="shop-left-sidebar.html">Kệ Treo Cây Cảnh</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg">
                        <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                            <i class="ri-menu-3-line"></i>
                        </a>
                        <div class="cr-header-buttons">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="register.php">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.php">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="login.php">Login</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="wishlist.html" class="cr-right-bar-item">
                                <i class="ri-heart-line"></i>
                            </a>
                            <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                                <i class="ri-shopping-cart-line"></i>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>">
                                        Trang Chủ
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Danh mục
                                    </a>
                                    <ul class="dropdown-menu">
                                    <?php foreach ($list_danh_muc as $key => $value):?>
                                        <li>
                                            <a class="dropdown-item" href="<?= BASE_URL ."/?act=tim-kiem&keyword=".$value['ten_danh_muc'] ?>"><?= $value['ten_danh_muc']?></a>
                                        </li>

                                    <?php endforeach ?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Sản phẩm
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="product-left-sidebar.html">product
                                                Left
                                                sidebar </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="product-right-sidebar.html">product
                                                Right
                                                sidebar </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="product-full-width.html">Product
                                                Full
                                                Width
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Pages
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="about.html">About Us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="contact-us.html">Contact Us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="cart.html">Cart</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.php">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="track-order.html">Track Order</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="faq.html">Faq</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="login.php">Login</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="register.php">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="policy.html">Policy</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="cr-calling">
                        <i class="ri-phone-line"></i>
                        <a href="javascript:void(0)">(+84) 987654321</a>
                    </div>
                </div>
            </div>
        </div>
    </header>