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

    <!-- Hero slider -->
    <section class="section-hero padding-b-100 next">
        <div class="cr-slider swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($list_slide_show as $key => $value): ?>
                    <div class="swiper-slide">
                        <div class="cr-hero-banner" style='
                                                        width: 100%;
                                                        background-image: url("<?= BASE_URL . $value['link_anh'] ?>");
                                                        background-repeat: no-repeat;
                                                        background-size: cover;
                                                        background-position: center;
                                                    '>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-left-side-contain slider-animation">
                                            <!-- <h5><span>100%</span> Organic Vegetables</h5> -->
                                            <h1><?= $value['tieu_de'] ?></h1>
                                            <p><?= $value['mo_ta'] ?></p>
                                            <div class="cr-last-buttons">
                                                <a href="<?= $value['link_chuyen_huong'] ?>" class="cr-button">
                                                    Đến ngay
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Categories -->
    <section class="section-categories padding-b-100">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-4 col-12 mb-24">
                    <div class="cr-categories">
                        <ul class="nav row nav-tabs justify-content-start" id="myTab" role="tablist">

                            <?php foreach ($list_danh_muc as $key => $value): ?>
                                <li class="nav-item col-6 col-md-3" role="presentation">
                                    <a href="<?= BASE_URL . "/?act=tim-kiem&keyword=" . $value['ten_danh_muc'] ?>">
                                        <button class="nav-link active center-categories-inner  " id="cake_milk-tab"
                                            data-bs-toggle="tab" data-bs-target="#cake_milk" type="button" role="tab"
                                            aria-controls="cake_milk" aria-selected="true">
                                            <?= $value['ten_danh_muc'] ?>
                                            <!-- <span>(65 items)</span> -->
                                        </button>
                                    </a>
                                </li>

                            <?php endforeach ?>
                            <li class="nav-item col-6 col-md-3 " role="presentation">
                                <a class="center-categories-inner cr-view-more" href="shop-left-sidebar.html">
                                    Xem Thêm
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-12 mb-24">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="cake_milk" role="tabpanel"
                            aria-labelledby="cake_milk-tab">
                            <div class="row mb-minus-24">
                                <div class="col-6  cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>30
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <!-- <h5>Cây</h5> -->
                                            </div>
                                            <div class="categories-button">
                                                <a href="<?= BASE_URL . '?act=tim-kiem' ?>" class="cr-button">Mua ngay</a>
                                            </div>
                                        </div>
                                        <img style=" height: 600px; "
                                            src="https://i.pinimg.com/736x/97/89/2b/97892bf8ce2325698b12f801b594343f.jpg"
                                            alt="categories-3">
                                    </div>
                                </div>
                                <div class="col-6 cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>20
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <!-- <h5>Cây để bàn</h5> -->
                                            </div>
                                            <div class="categories-button">
                                                <a href="<?= BASE_URL . '?act=tim-kiem' ?>" class="cr-button">Mua ngay</a>
                                            </div>
                                        </div>
                                        <img style=" height: 600px; "
                                            src="https://i.pinimg.com/736x/66/9b/b9/669bb983cf23757f4200c5bb747bf1f8.jpg"
                                            alt="categories-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sản phẩm hot -->
    <section class="section-popular margin-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30">
                        <div class="cr-banner">
                            <h2>Sản phẩm yêu thích</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-twocolumns-product">
                        <?php foreach ($list_san_pham_hot as $key => $value): ?>
                            <?php if ($value['trang_thai'] == 1): ?>
                            <div class="mix col-xxl-3 col-xl-3 col-6 cr-product-box mb-24">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="<?= BASE_URL . $value['hinh_anh'] ?>"
                                                alt="<?= $value['ten_san_pham'] ?> ">
                                        </div>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <!-- <a href="shop-left-sidebar.html"><?= $value['ten_danh_muc'] ?></a> -->
                                            <!-- <div class="cr-star">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-line"></i>
                                                <p>(4.5)</p>
                                            </div> -->

                                        </div>
                                        <a href="?act=san-pham-chi-tiet&id_san_pham=<?= $value['id'] ?>" class="title">
                                            <?= $value['ten_san_pham'] ?> </a>
                                        <p class="cr-price"><span
                                                class="new-price"><?= number_format($value['gia_khuyen_mai'], 0, ',', '.') . " vnđ" ?></span>
                                            <span
                                                class="old-price"><?= number_format($value['gia_san_pham'], 0, ',', '.') . " vnđ" ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular product -->
    <section class="section-popular-product-shape padding-b-100">
        <div class="container" data-aos="fade-up" data-aos-duration="2000">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30">
                        <div class="cr-banner">
                            <h2>Gợi ý cho bạn</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
                <!-- Navbar lọc bên sản phẩm nổi bật  -->
                <div class="col-xl-3 col-lg-4 col-12 mb-24">
                    <div class="row mb-minus-24 sticky">
                        <div class="col-lg-12 col-sm-6 col-6 cr-product-box mb-24">
                            <div class="cr-product-tabs">
                                <ul>
                                    <li class="active" data-filter="all">Tất cả</li>
                                    <?php foreach ($list_danh_muc as $key => $value):?>
                                    <li data-filter=".dm<?= $value['id'] ?>"><?= $value['ten_danh_muc'] ?></li>
                                    
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-12 mb-24">
                    <div class="row mb-minus-24">
                        <!-- Begin Thẻ sản phẩm  -->
                        <?php foreach ($list_san_pham_hot as $key => $value): ?>
                            <?php if ($value['trang_thai'] == 1): ?>
                            <div class="mix <?= 'dm'.$value['id_danh_muc'] ?> col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="<?= BASE_URL . $value['hinh_anh'] ?>"
                                                alt="<?= $value['ten_san_pham'] ?> ">
                                        </div>
                                       
                                    </div>
                                    <div class="cr-product-details">
                                        <a href="<?= BASE_URL . "?act=san-pham-chi-tiet&id_san_pham=".$value['id'] ?>" class="title"> <?= $value['ten_san_pham'] ?>
                                        </a>
                                        <p class="cr-price"><span
                                                class="new-price"><?= number_format($value['gia_khuyen_mai'], 0, ',', '.') . " vnđ"?></span>
                                            <span
                                                class="old-price"><?= number_format($value['gia_san_pham'], 0, ',', '.') . " vnđ" ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach ?>
                        <!-- End Thẻ sản phẩm  -->
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-services padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-services-border" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-service-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-red-packet-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Đóng gói sản phẩm</h4>
                                            <p>Đóng gói sản phẩm cẩn thận đảm bảo chất lượng sản phẩm đến khách hàng.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-customer-service-2-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Hỗ trợ 24/7</h4>
                                            <p>Giải đáp mọi thắc mặc của khách hàng mọi lúc mọi nơi.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-truck-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Giao hàng nhanh</h4>
                                            <p>Hỗ trợ giao hàng đến khắp các tỉnh thành của Việt Nam.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-money-dollar-box-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Thanh toán an toàn</h4>
                                            <p>Hỗ trợ khách hàng qua nhiều phương thức thanh toán đa dạng.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</main>
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
<script src="<?= BASE_URL ?>assets/js/script.js"></script>
<script>
    document.querySelectorAll('.cr-shopping-bag').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.dataset.id; // Lấy ID sản phẩm từ data attribute

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ product_id: productId }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Sản phẩm đã được thêm vào giỏ hàng');
                        // Cập nhật giao diện giỏ hàng nếu cần
                    } else {
                        alert('Không thể thêm sản phẩm vào giỏ hàng');
                    }
                });
        });
    });

</script>

<?php include './views/layout/footer.php' ?>