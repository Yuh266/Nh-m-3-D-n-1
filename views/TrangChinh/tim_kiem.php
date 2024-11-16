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
                            <h2>Shop</h2>
                            <span> <a href="index.html">Home</a> - Shop</span>
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
                    <div class="cr-shop-sideview">
                        <div class="cr-shop-categories">
                            <h4 class="cr-shop-sub-title">Category</h4>
                            <div class="cr-checkbox">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="drinks">
                                    <label for="drinks">Juice & Drinks</label>
                                    <span>[20]</span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="drinks1">
                                    <label for="drinks1">Dairy & Milk</label>
                                    <span>[54]</span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="drinks2">
                                    <label for="drinks2">Snack & Spice</label>
                                    <span>[64]</span>
                                </div>
                            </div>
                        </div>
                        <div class="cr-shop-price">
                            <h4 class="cr-shop-sub-title">Price</h4>
                            <div class="price-range-slider">
                                <div id="slider-range" class="range-bar"></div>
                                <p class="range-value">
                                    <label>Price :</label>
                                    <input type="text" id="amount" placeholder="'" readonly>
                                </p>
                                <button type="button" class="cr-button">Filter</button>
                            </div>
                        </div>
                        <div class="cr-shop-color">
                            <h4 class="cr-shop-sub-title">Colors</h4>
                            <div class="cr-checkbox">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="blue">
                                    <label for="blue">Blue</label>
                                    <span class="blue"></span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="yellow">
                                    <label for="yellow">Yellow</label>
                                    <span class="yellow"></span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="red">
                                    <label for="red">Red</label>
                                    <span class="red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="cr-shop-weight">
                            <h4 class="cr-shop-sub-title">Weight</h4>
                            <div class="cr-checkbox">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="2kg">
                                    <label for="2kg">2kg Pack</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="20kg">
                                    <label for="20kg">20kg Pack</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="30kg">
                                    <label for="30kg">30kg pack</label>
                                </div>
                            </div>
                        </div>
                        <div class="cr-shop-tags">
                            <h4 class="cr-shop-sub-title">Tages</h4>
                            <div class="cr-shop-tags-inner">
                                <ul class="cr-tags">
                                    <li><a href="javascript:void(0)">Vegetables</a></li>
                                    <li><a href="javascript:void(0)">juice</a></li>
                                    <li><a href="javascript:void(0)">Food</a></li>
                                    <li><a href="javascript:void(0)">Dry Fruits</a></li>
                                    <li><a href="javascript:void(0)">Vegetables</a></li>
                                    <li><a href="javascript:void(0)">juice</a></li>
                                </ul>
                            </div>
                        </div>
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
                                    <span>We found 29 items for you!</span>
                                </div>
                                <div class="cr-select">
                                    <label>Sort By :</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Featured</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                        <option value="5">Five</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-100 mb-minus-24">
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/1.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Vegetables</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Fresh organic villa farm lomon
                                        500gm pack</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/9.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Best snakes with hazel nut pack
                                        200gm</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$145</span> <span
                                            class="old-price">$150</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/2.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Fruits</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Fresh organic apple 1kg simla
                                        marming</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/3.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Fruits</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(3.2)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Organic fresh venila farm
                                        watermelon 5kg</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$50.30</span> <span
                                            class="old-price">$72.60</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/10.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Sweet crunchy nut mix 250gm
                                        pack</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/17.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Bakery</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Delicious white baked fresh bread
                                        and toast</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$20</span> <span
                                            class="old-price">$22.10</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/13.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Bakery</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Delicious white baked fresh bread
                                        and toast</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$20</span> <span
                                            class="old-price">$22.10</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/11.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Bakery</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Delicious white baked fresh bread
                                        and toast</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$20</span> <span
                                            class="old-price">$22.10</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/12.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Bakery</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Delicious white baked fresh bread
                                        and toast</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$20</span> <span
                                            class="old-price">$22.10</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/1.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Vegetables</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Fresh organic villa farm lomon
                                        500gm pack</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/9.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Best snakes with hazel nut pack
                                        200gm</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$145</span> <span
                                            class="old-price">$150</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/2.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Fruits</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Fresh organic apple 1kg simla
                                        marming</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="..." class="cr-pagination">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">1</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include './views/layout/footer.php' ?>
