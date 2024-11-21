<!-- Footer -->
<footer class="footer padding-t-100 bg-off-white">
    <div class="container">
        <div class="row footer-top padding-b-100">
            <div class="col-xl-4 col-lg-6 col-sm-12 col-12 cr-footer-border">
                <div class="cr-footer-logo">
                    <div class="image">
                        <img src="assets/img/logo/logo.png" alt="logo" class="logo">
                        <img src="assets/img/logo/dark-logo.png" alt="logo" class="dark-logo">
                    </div>
                    <p>Carrot is the biggest market of grocery products. Get your daily needs from our store.</p>
                </div>
                <div class="cr-footer">
                    <h4 class="cr-sub-title cr-title-hidden">
                        Contact us
                        <span class="cr-heading-res"></span>
                    </h4>
                    <ul class="cr-footer-links cr-footer-dropdown">
                        <li class="location-icon">
                            51 Green St.Huntington ohaio beach ontario, NY 11746 KY 4783, USA.
                        </li>
                        <li class="mail-icon">
                            <a href="javascript:void(0)">example@email.com</a>
                        </li>
                        <li class="phone-icon">
                            <a href="javascript:void(0)"> +91 123 4567890</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                <div class="cr-footer">
                    <h4 class="cr-sub-title">
                        Liên hệ
                        <span class="cr-heading-res"></span>
                    </h4>
                    <ul class="cr-footer-links cr-footer-dropdown">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="track-order.html">Delivery Information</a></li>
                        <li><a href="policy.html">Privacy Policy</a></li>
                        <li><a href="terms.html">Terms & Conditions</a></li>
                        <li><a href="contact-us.html">contact Us</a></li>
                        <li><a href="faq.html">Support Center</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                <div class="cr-footer">
                    <h4 class="cr-sub-title">
                        Danh mục
                        <span class="cr-heading-res"></span>
                    </h4>
                    <ul class="cr-footer-links cr-footer-dropdown">
                        <?php foreach ($list_danh_muc as $key => $value): ?>
                            <li><a
                                    href="<?= BASE_URL . "/?act=tim-kiem&keyword=" . $value['ten_danh_muc'] ?> "><?= $value['ten_danh_muc'] ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-sm-12 col-12 cr-footer-border">
                <div class="cr-footer cr-newsletter">
                    <h4 class="cr-sub-title">
                        Subscribe Our Newsletter
                        <span class="cr-heading-res"></span>
                    </h4>
                    <div class="cr-footer-links cr-footer-dropdown">
                        <form class="cr-search-footer">
                            <input class="search-input" type="text" placeholder="Search here...">
                            <a href="javascript:void(0)" class="search-btn">
                                <i class="ri-send-plane-fill"></i>
                            </a>
                        </form>
                    </div>
                    <div class="cr-social-media">
                        <span><a href="javascript:void(0)"><i class="ri-facebook-line"></i></a></span>
                        <span><a href="javascript:void(0)"><i class="ri-twitter-x-line"></i></a></span>
                        <span><a href="javascript:void(0)"><i class="ri-dribbble-line"></i></a></span>
                        <span><a href="javascript:void(0)"><i class="ri-instagram-line"></i></a></span>
                    </div>
                    <div class="cr-payment">
                        <div class="cr-insta-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#" class="cr-payment-image">
                                        <img src="assets/img/insta/1.jpg" alt="insta">
                                        <div class="payment-overlay"></div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#" class="cr-payment-image">
                                        <img src="assets/img/insta/2.jpg" alt="insta">
                                        <div class="payment-overlay"></div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#" class="cr-payment-image">
                                        <img src="assets/img/insta/3.jpg" alt="insta">
                                        <div class="payment-overlay"></div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#" class="cr-payment-image">
                                        <img src="assets/img/insta/4.jpg" alt="insta">
                                        <div class="payment-overlay"></div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#" class="cr-payment-image">
                                        <img src="assets/img/insta/5.jpg" alt="insta">
                                        <div class="payment-overlay"></div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#" class="cr-payment-image">
                                        <img src="assets/img/insta/6.jpg" alt="insta">
                                        <div class="payment-overlay"></div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#" class="cr-payment-image">
                                        <img src="assets/img/insta/7.jpg" alt="insta">
                                        <div class="payment-overlay"></div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#" class="cr-payment-image">
                                        <img src="assets/img/insta/8.jpg" alt="insta">
                                        <div class="payment-overlay"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cr-last-footer">
            <p>&copy; <span id="copyright_year"></span> <a href="index.html">Plant Haven</a>, All rights reserved.</p>
        </div>
    </div>
</footer>

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
            <button type="button" class="cr-close-model btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- Cart -->
<div class="cr-cart-overlay"></div>
<div class="cr-cart-view">
    <div class="cr-cart-inner">
        <div class="cr-cart-top">
            <div class="cr-cart-title">
                <h6>Giỏ hàng của bạn</h6>
                <button type="button" class="close-cart">×</button>
            </div>
            <?php if (isset($_SESSION['user']['id'])) { ?>
                <ul class="crcart-pro-items">
                    <!-- <li>
                            <a href="product-left-sidebar.html" class="crside_pro_img"><img src="assets/img/product/4.jpg"
                                    alt="product-1"></a>
                            <div class="cr-pro-content">
                                <a href="product-left-sidebar.html" class="cart_pro_title">Cây Kim Tiền</a>
                                <span class="cart-price"><span>350,000 VNĐ</span> x 1 cây</span>
                                <div class="cr-cart-qty">
                                    <div class="cart-qty-plus-minus">
                                        <button type="button" class="plus">+</button>
                                        <input type="text" placeholder="." value="1" minlength="1" maxlength="20"
                                            class="quantity">
                                        <button type="button" class="minus">-</button>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" class="remove">×</a>
                            </div>
                        </li> -->
                    <?php foreach ($chi_tiet_gio_hangs as $key => $chi_tiet_gio_hang): ?>
                        <li>
                            <a href="?act=san-pham-chi-tiet&id_san_pham=<?= $chi_tiet_gio_hang['id'] ?>">
                                <img class="crside_pro_img" src="<?= $chi_tiet_gio_hang['hinh_anh'] ?>" alt=""
                                    class="cr-cart-img" style="width:80px">
                            </a>
                            <div class="cr-pro-content">
                                <a href="product-left-sidebar.html"
                                    class="cart_pro_title"><?= $chi_tiet_gio_hang['ten_san_pham'] ?></a>
                                <span
                                    class="cart-price"><span><?= number_format($chi_tiet_gio_hang['gia_san_pham'], 0, ',', '.') ?></span>
                                    x <?= $chi_tiet_gio_hang['so_luong'] ?> cây</span>
                                <div class="cr-cart-qty">
                                    <div class="cart-qty-plus-minus">
                                        <button type="button" class="plus" data-id="<?= $chi_tiet_gio_hang['id'] ?>">+</button>
                                        <input type="text" value="<?= $chi_tiet_gio_hang['so_luong'] ?>" class="quantity"
                                            data-id="<?= $chi_tiet_gio_hang['id'] ?>" readonly>
                                        <button type="button" class="minus" data-id="<?= $chi_tiet_gio_hang['id'] ?>">-</button>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" class="remove">×</a>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="cr-cart-bottom">
                <div class="cart-sub-total">
                    <table class="table cart-table">
                        <tbody>
                            <?php
                            $tam_tinh = 0;
                            foreach ($chi_tiet_gio_hangs as $key => $chi_tiet_gio_hang):
                                $tam_tinh += (float) $chi_tiet_gio_hang['thanh_tien'];
                            endforeach;
                            $vat = $tam_tinh * 0.1;
                            $tong_cong = $tam_tinh + $vat;
                            ?>
                            <tr>
                                <td class="text-left">Tạm tính :</td>
                                <td class="text-right"><?= number_format($tam_tinh, 0, ',', '.') ?> VNĐ</td>
                            </tr>
                            <tr>
                                <td class="text-left">VAT (10%) :</td>
                                <td class="text-right"><?= number_format($vat, 0, ',', '.') ?> VNĐ</td>
                            </tr>
                            <tr>
                                <td class="text-left">Tổng cộng :</td>
                                <td class="text-right primary-color"><?= number_format($tong_cong, 0, ',', '.') ?> VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart_btn">
                    <a href="?act=gio-hang-chi-tiet&id_gio_hang=<?= $gio_hang['id'] ?>" class="cr-button">Xem giỏ hàng</a>
                    <a href="checkout.html" class="cr-btn-secondary">Thanh toán</a>
                </div>
            </div>
        <?php } else { ?>
            <!-- <h4>Vui lòng đăng nhập để sử dụng chức năng này</h4> -->
            <div class="alert alert-info">Bạn cần<a href="?act=login" class="text-primary"> đăng nhập </a>để sử dụng chức
                năng này</div>
            <!-- <button class="container">Đăng nhập</button> -->
        <?php } ?>
    </div>
</div>

<!-- Side-tool
    <div class="cr-tool-overlay"></div>
    <div class="cr-tool">
        <div class="cr-tool-btn">
            <a href="javascript:void(0)" class="btn-cr-tool result-placeholder">
                <i class="ri-settings-line"></i>
            </a>
            <div class="color-variant">
                <div class="cr-bar-title">
                    <h6>Tools</h6>
                    <a href="javascript:void(0)" class="close-tools">
                        <i class="ri-close-line"></i>
                    </a>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>Select Color</h2>
                    </div>
                    <ul class="cr-color">
                        <li class="colors c1 active-colors">
                        </li>
                        <li class="colors c2">
                        </li>
                        <li class="colors c3">
                        </li>
                        <li class="colors c4">
                        </li>
                        <li class="colors c5">
                        </li>
                        <li class="colors c6">
                        </li>
                        <li class="colors c7">
                        </li>
                        <li class="colors c8">
                        </li>
                        <li class="colors c9">
                        </li>
                        <li class="colors c10">
                        </li>
                    </ul>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>Dark mode</h2>
                    </div>
                    <ul class="dark-mode">
                        <li class="dark">
                        </li>
                        <li class="white active-dark-mode">
                        </li>
                    </ul>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>RTL mode</h2>
                    </div>
                    <ul class="rtl-mode">
                        <li class="rtl">
                            <img src="assets/img/tool/rtl.png" alt="rtl">
                        </li>
                        <li class="ltr active-rtl-mode">
                            <img src="assets/img/tool/ltr.png" alt="ltr">
                        </li>
                    </ul>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>Backgrounds</h2>
                    </div>
                    <ul class="bg-panel">
                        <li class="bg-1">
                            <img src="assets/img/shape/bg-shape-1.png" alt="bg-shape-1">
                        </li>
                        <li class="bg-2">
                            <img src="assets/img/shape/bg-shape-2.png" alt="bg-shape-2">
                        </li>
                        <li class="bg-3">
                            <img src="assets/img/shape/bg-shape-3.png" alt="bg-shape-3">
                        </li>
                        <li class="bg-4">
                            <img src="assets/img/shape/bg-shape-4.png" alt="bg-shape-4">
                        </li>
                        <li class="bg-5">
                            <img src="assets/img/shape/bg-shape-5.png" alt="bg-shape-5">
                        </li>
                        <li class="bg-6 active-bg-panel">
                            <img src="assets/img/shape/bg-shape-6.png" alt="bg-shape-6">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

<!-- Vendor Custom -->
<script src="assets/js/vendor/jquery-3.6.4.min.js"></script>
<script src="assets/js/vendor/jquery.zoom.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/vendor/mixitup.min.js"></script>

<script src="assets/js/vendor/range-slider.js"></script>
<script src="assets/js/vendor/aos.min.js"></script>
<script src="assets/js/vendor/swiper-bundle.min.js"></script>
<script src="assets/js/vendor/slick.min.js"></script>

<!-- Main Custom -->
<script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:30:08 GMT -->

</html>