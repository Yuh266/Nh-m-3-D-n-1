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