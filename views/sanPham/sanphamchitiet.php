<?php include './views/layout/header.php' ?>

<main>
    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Sản phẩm</h2>
                            <span> <a href="<?= BASE_URL . "./" ?>">Trang chủ</a> - Sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product -->
    <section class="section-product padding-t-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-shop-sideview">
                        <div class="cr-shop-categories">
                            <h4 class="cr-shop-sub-title">Danh mục</h4>
                            <div class="cr-checkbox">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="office-plants">
                                    <label for="office-plants">Cây văn phòng</label>
                                    <span>[15]</span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="indoor-plants">
                                    <label for="indoor-plants">Cây nội thất</label>
                                    <span>[22]</span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="outdoor-plants">
                                    <label for="outdoor-plants">Cây ngoài trời</label>
                                    <span>[30]</span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="hanging-plants">
                                    <label for="hanging-plants">Cây treo tường</label>
                                    <span>[8]</span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="fruit-trees">
                                    <label for="fruit-trees">Cây ăn quả</label>
                                    <span>[20]</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="cr-shop-price">
                            <h4 class="cr-shop-sub-title">Khoảng giá</h4>
                            <div class="price-range-slider">
                                <div id="slider-range" class="range-bar"></div>
                                <p class="range-value">
                                    <label>Giá :</label>
                                    <input type="text" id="amount" placeholder="0 VNĐ - 5,000,000 VNĐ" readonly>
                                </p>
                                <button type="button" class="cr-button">Lọc</button>
                            </div>
                        </div>
                        
                        <div class="cr-shop-color">
                            <h4 class="cr-shop-sub-title">Màu sắc lá</h4>
                            <div class="cr-checkbox">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="green-leaf">
                                    <label for="green-leaf">Xanh lá</label>
                                    <span class="green"></span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="red-leaf">
                                    <label for="red-leaf">Đỏ</label>
                                    <span class="red"></span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="yellow-leaf">
                                    <label for="yellow-leaf">Vàng</label>
                                    <span class="yellow"></span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="variegated-leaf">
                                    <label for="variegated-leaf">Lá loang màu</label>
                                    <span class="mixed"></span>
                                </div>
                            </div>
                        </div>

                        <div class="cr-shop-weight">
                            <h4 class="cr-shop-sub-title">Kích thước cây</h4>
                            <div class="cr-checkbox">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="small-size">
                                    <label for="small-size">Nhỏ (dưới 50cm)</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="medium-size">
                                    <label for="medium-size">Trung bình (50cm - 1m)</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="large-size">
                                    <label for="large-size">Lớn (trên 1m)</label>
                                </div>
                            </div>
                        </div>
                        <div class="cr-shop-tags">
                            <h4 class="cr-shop-sub-title">Tags</h4>
                            <div class="cr-shop-tags-inner">
                                <ul class="cr-tags">
                                    <li><a href="javascript:void(0)">Cây văn phòng</a></li>
                                    <li><a href="javascript:void(0)">Cây nội thất</a></li>
                                    <li><a href="javascript:void(0)">Cây ngoài trời</a></li>
                                    <li><a href="javascript:void(0)">Cây treo tường</a></li>
                                    <li><a href="javascript:void(0)">Cây bonsai</a></li>
                                    <li><a href="javascript:void(0)">Chậu cây</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                    <div class="row mb-minus-24">
                        <div class="col-md-6 col-12 mb-24">
                            <div class="vehicle-detail-banner banner-content clearfix">
                                <div class="banner-slider">
                                    <div class="slider slider-for">
                                        <div class="slider-banner-image">
                                                <div class="zoom-image-hover">
                                                <img src="<?= BASE_URL . $sanphan_ct['hinh_anh'] ?>" alt="" class="product-image" >
                                            </div>
                                        </div>
                                        <?php foreach ($danh_sach_anh as $key => $value): ?>
                                            <div class="slider-banner-image">
                                                <div class="zoom-image-hover">
                                                     <img src="<?= BASE_URL . $value['link_anh'] ?>" alt="<?= $key + 1 ?>">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="slider slider-nav thumb-image">
                                        <div class="thumbnail-image">
                                            <div class="thumbImg">
                                                <img src="<?= BASE_URL . $sanphan_ct['hinh_anh'] ?>" alt="">
                                            </div>
                                        </div>
                                        <?php foreach ($danh_sach_anh as $key => $value): ?>
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="<?= BASE_URL . $value['link_anh'] ?>" alt="<?= $key + 1 ?>">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-24">
                            <div class="cr-size-and-weight-contain">
                                <h2 class="heading"><?= $sanphan_ct['ten_san_pham'] ?></h2>
                                <p><?= $sanphan_ct['mo_ta'] ?></p>
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
                                    <p>( 75 đánh giá )</p>
                                </div>
                                <div class="list">
                                    <ul>
                                        <li><label>Thương hiệu <span>:</span></label>GreenGarden Co</li>
                                        <li><label>Loại cây <span>:</span></label>Sen đá</li>
                                        <li><label>Chế độ chăm sóc <span>:</span></label>Dễ chăm sóc</li>
                                        <li><label>Kích thước <span>:</span></label>Cao 15 cm</li>
                                        <li><label>Đặc điểm <span>:</span></label>Lọc không khí, Phù hợp nội thất</li>
                                        <li><label>Thông tin khác <span>:</span></label>Không cần nhiều ánh sáng, Tặng kèm chậu</li>
                                        <li><label>Số lượng <span>:</span></label>1 cây</li>
                                    </ul>
                                </div>
                                <div class="cr-product-price">
                                    <span class="new-price"><?= number_format($sanphan_ct['gia_khuyen_mai'])." vnđ"  ?></span>
                                    <span class="old-price"><?= number_format($sanphan_ct['gia_san_pham'])." vnđ"  ?></span>
                                </div>
                                <div class="cr-size-weight">
                                    <h5><span>Kích thước và</span>
                                    <span>trọng lượng</span> :</h5>
                                    <div class="cr-kg">
                                        <ul>
                                            <li class="active-color">Nhỏ (10cm)</li>
                                            <li>Trung bình (20cm)</li>
                                            <li>Lớn (30cm)</li>
                                            <li>Rất lớn (50cm)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cr-add-card">
                                    <div class="cr-qty-main">
                                        <input type="text" placeholder="." value="1" minlength="1" maxlength="20"
                                            class="quantity" style="width: 80px">
                                        <button type="button" id="add" class="plus" style="width: 40px; height: 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 18px;">+</button>
                                        <button type="button" id="sub" class="minus" style="width: 40px; height: 20px; background-color: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 18px;">-</button>
                                    </div>
                                    <div class="cr-add-button">
                                        <button type="button" class="cr-button cr-shopping-bag">Thêm vào giỏ hàng</button>
                                    </div>
                                    <div class="cr-card-icon">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cr-paking-delivery">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                    aria-selected="true">Mô tả</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="additional-tab" data-bs-toggle="tab"
                                    data-bs-target="#additional" type="button" role="tab" aria-controls="additional"
                                    aria-selected="false">Thông tin bổ sung</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                    type="button" role="tab" aria-controls="review"
                                    aria-selected="false">Đánh giá</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Mô tả -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p>Cây sen đá là loại cây cảnh nhỏ gọn, thích hợp để trang trí bàn làm việc, kệ sách hoặc góc học tập. 
                                        Cây có khả năng chịu hạn tốt, không cần tưới nước nhiều và rất dễ chăm sóc.</p>
                                    </div>
                                    <h4 class="heading">Quy cách đóng gói & Giao hàng</h4>
                                    <div class="cr-description">
                                        <p>Cây được đóng gói cẩn thận trong hộp bảo vệ, tránh hư hỏng trong quá trình vận chuyển. 
                                        Giao hàng toàn quốc trong vòng 3-5 ngày làm việc.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Thông tin bổ sung -->
                            <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                                <div class="cr-tab-content">
                                    <div class="list">
                                        <ul>
                                            <li><label>Loại cây <span>:</span></label> Sen đá</li>
                                            <li><label>Kích thước <span>:</span></label> Cao 10-15 cm</li>
                                            <li><label>Màu sắc <span>:</span></label> Xanh lá cây</li>
                                            <li><label>Điều kiện sống <span>:</span></label> Ánh sáng vừa, không cần tưới nhiều</li>
                                            <li><label>Đặc tính <span>:</span></label> Lọc không khí, dễ chăm sóc</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Đánh giá -->
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="cr-tab-content-from">
                                    <div class="post">
                                        <div class="content">
                                            <img src="assets/img/review/1.jpg" alt="review">
                                            <div class="details">
                                                <span class="date">15 Tháng 10, 2024</span>
                                                <span class="name">Nguyễn Thảo</span>
                                            </div>
                                            <div class="cr-t-review-rating">
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                            </div>
                                        </div>
                                        <p>Cây sen đá rất đẹp, được gói kỹ càng khi giao đến. Rất hài lòng!</p>
                                    </div>

                                    <h4 class="heading">Viết đánh giá</h4>
                                    <form action="javascript:void(0)">
                                        <div class="cr-ratting-star">
                                            <span>Đánh giá của bạn :</span>
                                            <div class="cr-t-review-rating">
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-line"></i>
                                                <i class="ri-star-s-line"></i>
                                                <i class="ri-star-s-line"></i>
                                            </div>
                                        </div>
                                        <div class="cr-ratting-input">
                                            <input name="your-name" placeholder="Họ tên" type="text">
                                        </div>
                                        <div class="cr-ratting-input">
                                            <input name="your-email" placeholder="Email*" type="email" required="">
                                        </div>
                                        <div class="cr-ratting-input form-submit">
                                            <textarea name="your-commemt" placeholder="Nhập nhận xét của bạn"></textarea>
                                            <button class="cr-button" type="submit" value="Submit">Gửi đánh giá</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular products -->
    <section class="section-popular-products padding-tb-100" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
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
    <!-- <a href="#Top" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-line"></i>
        <div class="back-to-top-wrap">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
            </svg>
        </div>
    </a> -->

    <!-- Model -->
    <!-- <div class="modal fade quickview-modal" id="quickview" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered cr-modal-dialog">
            <div class="modal-content">
                <button type="button" class="cr-close-model btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="zoom-image-hover modal-border-image">
                                <img src="assets/img/product/tree-1.jpg" alt="beautiful-plant" class="product-image">
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="cr-size-and-weight-contain">
                                <h2 class="heading">Cây Sen Đá Xanh Lá</h2>
                                <p>Cây sen đá là loại cây cảnh nhỏ gọn, mang lại không gian xanh mát và gần gũi với thiên nhiên. 
                                Đặc biệt dễ chăm sóc, phù hợp để trang trí bàn làm việc hoặc góc học tập.</p>
                            </div>
                            <div class="cr-size-and-weight">
                                <div class="cr-review-star">
                                    <div class="cr-star">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <p>( 50 đánh giá )</p>
                                </div>
                                <div class="cr-product-price">
                                    <span class="new-price">120.000₫</span>
                                    <span class="old-price">150.000₫</span>
                                </div>
                                <div class="cr-size-weight">
                                    <h5><span>Kích thước</span>/<span>Trọng lượng</span> :</h5>
                                    <div class="cr-kg">
                                        <ul>
                                            <li class="active-color">Nhỏ (10cm)</li>
                                            <li>Trung bình (15cm)</li>
                                            <li>Lớn (20cm)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cr-add-card">
                                    <div class="cr-qty-main">
                                        <input type="text" placeholder="1" value="1" minlength="1" maxlength="20" class="quantity">
                                        <button type="button" id="add_model" class="plus">+</button>
                                        <button type="button" id="sub_model" class="minus">-</button>
                                    </div>
                                    <div class="cr-add-button">
                                        <button type="button" class="cr-button cr-shopping-bag">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</main>
 
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
<script src="<?= BASE_URL ?>assets/js/script.js"></script>

<?php include './views/layout/footer.php' ?>