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
                            <!-- Phần xử lí link_nav  -->
                            <h2>Kết quả tìm kiếm cho "<?= $keyword ?>"</h2>
                            <span> <a href="index.html">Trang chủ</a> - Tìm kiếm sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop -->
    <section class="section-shop padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Categories</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <form class="price-range-slider" action="<?= BASE_URL ?>" method="GET" >
                <input type="text" name="act" value="tim-kiem" hidden >
                <input type="text" name="keyword" value="<?= $keyword ?>" hidden >
                <div class="cr-shop-sideview">
                        <div class="cr-shop-categories">
                            <h4 class="cr-shop-sub-title">Danh mục</h4>
                            <div class="cr-checkbox">
                                <?php foreach ($list_danh_muc as $key => $value):?>
                                <div>
                                    <input type="checkbox" name="id[]" value="<?= $value['id']?>" <?php 
                                        //  var_dump($_GET['id[]']);die();
                                        if (isset($_GET['id'])) {
                                            // var_dump($_GET['id[]']);die();
                                            foreach ($_GET['id'] as $key => $id) {
                                                echo $value['id']==$id?"checked":""; 
                                            }
                                        }
                                    ?>  >
                                    <label><?= $value['ten_danh_muc'] ?></label>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="cr-shop-price">
                            <h4 class="cr-shop-sub-title">Giá tiền</h4>
                                <div class=" d-flex align-items-center gap-3 mt-3">
                                    <input class="form-control" type="number" name="minPrice" value="<?= $_GET['minPrice']??""  ?>" > 
                                    <p>đến</p>
                                    <input class="form-control" type="number" name="maxPrice" value="<?= $_GET['maxPrice']??""  ?>"  >
                                </div>
                                <div class="m-auto mt-3">
                                    <button type="submit" class="cr-button">Lọc</button>
                                </div>
                        </div>
                    </form>

                    </div>
                </div>
                <div class="col-lg-9 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                    <div class="row">
                        <div class="col-12">
                            <div class="cr-shop-bredekamp">
                                <div class="cr-toggle">
                                    <a href="javascript:void(0)" class="gridCol active-grid">
                                        <i class="ri-grid-line"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="gridRow">
                                        <i class="ri-list-check-2"></i>
                                    </a>
                                </div>
                                <div class="center-content">
                                    <span>Kết quả cho tìm kiếm của bạn</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-100 mb-minus-24">
                    <?php if(isset($list_san_pham)): ?>
                    <?php foreach ($list_san_pham as $key => $value): ?>
                        <div class="mix vegetable col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="<?= BASE_URL . $value['hinh_anh'] ?>" alt="<?= $value['ten_san_pham'] ?> ">
                                    </div>
                                   
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        
                                    </div>
                                    <a href="?act=san-pham-chi-tiet&id_san_pham=<?= $value['id']?>" class="title"> <?= $value['ten_san_pham'] ?> </a>
                                    <p class="cr-price"><span class="new-price"><?= number_format($value['gia_khuyen_mai']) . "đ" ?></span> <span class="old-price"><?= number_format($value['gia_san_pham']) . "đ" ?></span></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?> 
                    </div>
                    <?php else: ?>
                        <div class="mix col-12 cr-product-box mb-24">
                            <p>Không có sản phẩm nào như tìm kiếm.</p>
                        </div>
                    <?php endif ?>
                    
                </div>
            </div>
        </div>
    </section>
</main>

<?php include './views/layout/footer.php' ?>
