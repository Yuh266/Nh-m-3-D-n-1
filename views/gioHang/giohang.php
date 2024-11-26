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
                            <h2>Giỏ hàng hàng</h2>
                            <span> <a href="index.html">Trang chủ</a> / Giỏ hàng</span>
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
                            <h2>Giỏ hàng</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Kiểm tra các sản phẩm cây cảnh bạn đã chọn và hoàn tất đơn hàng.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="row">
                        <form action="<?= BASE_URL . "?act=form-dia-chi-nhan-hang" ?>" method="POST">
                                <div class="cr-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Sản phẩm</th>
                                                <th>Giá</th>
                                                <th class="text-center">Số lượng</th>
                                                <th>Tổng cộng</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($chi_tiet_gio_hang2s as $key => $chi_tiet_gio_hang): ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="id_gio_hang[]"
                                                            value="<?= $chi_tiet_gio_hang['id'] ?>">
                                                    </td>
                                                    <td class="cr-cart-name">
                                                        <a href="javascript:void(0)">
                                                            <img src="<?= BASE_URL. $chi_tiet_gio_hang['hinh_anh'] ?>" alt=""
                                                                class="cr-cart-img">
                                                            <h5><?= $chi_tiet_gio_hang['ten_san_pham']." => ".$chi_tiet_gio_hang['gia_tri'] ?></h5>
                                                        </a>
                                                    </td>
                                                    <td class="cr-cart-price">
                                                        <span
                                                            class="text-center"><?= $chi_tiet_gio_hang['gia_khuyen_mai'] ?></span>
                                                    </td>
                                                    <td class="cr-cart-qty">
                                                        <div class="cart-qty-plus-minus">
                                                            <button type="button" class="plus"
                                                                data-id="<?= $chi_tiet_gio_hang['id'] ?>">+</button>
                                                            <input type="text" value="<?= $chi_tiet_gio_hang['so_luong'] ?>"
                                                                class="quantity" data-id="<?= $chi_tiet_gio_hang['id'] ?>"
                                                                readonly>
                                                            <button type="button" class="minus"
                                                                data-id="<?= $chi_tiet_gio_hang['id'] ?>">-</button>
                                                        </div>
                                                    </td>
                                                    <td class="cr-cart-subtotal"><?= $chi_tiet_gio_hang['thanh_tien'] ?></td>
                                                    <td class="cr-cart-remove">
                                                    <a href="<?= BASE_URL . "?act=xoa-gio-hang&id_gio_hang=" . $chi_tiet_gio_hang['id'] ?>" onclick="return confirm('Bạn có đồng ý xóa hay không')">
                                                        <button type="button" class="btn btn-danger">Xóa</button></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>

                                            <?php foreach ($chi_tiet_gio_hangs as $key => $chi_tiet_gio_hang): ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="id_gio_hang[]"
                                                            value="<?= $chi_tiet_gio_hang['id'] ?>">
                                                    </td>
                                                    <td class="cr-cart-name">
                                                        <a href="javascript:void(0)">
                                                            <img src="<?= $chi_tiet_gio_hang['hinh_anh'] ?>" alt=""
                                                                class="cr-cart-img">
                                                        </a>
                                                    </td>
                                                    <td class="cr-cart-price">
                                                        <span
                                                            class="text-center"><?= $chi_tiet_gio_hang['gia_khuyen_mai'] ?></span>
                                                    </td>
                                                    <td class="cr-cart-qty">
                                                        <div class="cart-qty-plus-minus">
                                                            <a href="<?= BASE_URL . "?act=tang-so-luong&id_gio_hang=" . $chi_tiet_gio_hang['id'] ?>">
                                                                <button type="button" >+</button>
                                                            </a>
                                                            <input type="text" value="<?= $chi_tiet_gio_hang['so_luong'] ?>" 
                                                                class="quantity" data-id="<?= $chi_tiet_gio_hang['id'] ?>" readonly>
                                                            <a href="<?= BASE_URL . "?act=giam-so-luong&id_gio_hang=" . $chi_tiet_gio_hang['id'] ?>">
                                                                <button type="button" >-</button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="cr-cart-subtotal"><?= $chi_tiet_gio_hang['thanh_tien'] ?></td>
                                                    <td class="cr-cart-remove">
                                                    <a href="<?= BASE_URL . "?act=xoa-gio-hang&id_gio_hang=" . $chi_tiet_gio_hang['id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')">
                                                        <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-cart-update-bottom">
                                            <a href="javascript:void(0)" class="cr-links">Tiếp tục mua sắm</a>
                                            <button type="submit" class="cr-button">
                                                Thanh toán
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Modal Xác Nhận Xóa -->
                            <!-- <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn sẽ không thể khôi phục lại nội dung đã xóa.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <a href="#" id="modalLink"><button type="button" class="btn btn-primary"
                                                    onclick="showToast()">Xác nhận xóa</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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
                            <h2>Sản Phẩm Cây Cảnh Nổi Bật</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Khám phá những loại cây cảnh đẹp, dễ chăm sóc và phù hợp với mọi không gian sống của bạn.
                                Mang thiên nhiên gần gũi hơn với cuộc sống hàng ngày.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-popular-product">
                        <?php foreach ($list_san_pham_hot as $key => $value): ?>
                            <div class="slick-slide">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="<?= BASE_URL . $value['hinh_anh'] ?>"
                                                alt="<?= $value['ten_san_pham'] ?> ">
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
                                                <i class="ri-star-line"></i>
                                                <p>(4.5)</p>
                                            </div>
                                        </div>
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


    <!-- Tab to top -->
    <a href="#Top" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-line"></i>
        <div class="back-to-top-wrap">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </a>

    <!-- Model -->
    <div class="modal fade quickview-modal" id="quickview" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered cr-modal-dialog">
            <div class="modal-content">
                <button type="button" class="cr-close-model btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="zoom-image-hover modal-border-image">
                                <img src="assets/img/product/tab-1.jpg" alt="product-tab-2" class="product-image">
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="cr-size-and-weight-contain">
                                <h2 class="heading">Peach Seeds Of Change Oraganic Quinoa, Brown fruit</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1900s,</p>
                            </div>
                            <div class="cr-size-and-weight">
                                <div class="cr-review-star">
                                    <div class="cr-star">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <p>( 75 Review )</p>
                                </div>
                                <div class="cr-product-price">
                                    <span class="new-price">$120.25</span>
                                    <span class="old-price">$123.25</span>
                                </div>
                                <div class="cr-size-weight">
                                    <h5><span>Size</span>/<span>Weight</span> :</h5>
                                    <div class="cr-kg">
                                        <ul>
                                            <li class="active-color">500gm</li>
                                            <li>1kg</li>
                                            <li>2kg</li>
                                            <li>5kg</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cr-add-card">
                                    <div class="cr-qty-main">
                                        <input type="text" placeholder="." value="1" minlength="1" maxlength="20"
                                            class="quantity">
                                        <button type="button" id="add_model" class="plus">+</button>
                                        <button type="button" id="sub_model" class="minus">-</button>
                                    </div>
                                    <div class="cr-add-button">
                                        <button type="button" class="cr-button">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
<script src="<?= BASE_URL ?>assets/js/script.js"></script>

<?php include './views/layout/footer.php' ?>

<!-- // Kiểm tra phát hiện thông báo đã xóa  -->
<?php if (isset($_SESSION["alert_delete_success"])): ?>
    <script>showToast()</script>
    <?php unset($_SESSION["alert_delete_success"]); ?>
<?php endif ?>