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
                <div class="col-lg-2 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                </div>
                <div class="col-lg-8 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
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
                                        <?php if(!empty($gia_tri_bien_the)):?>
                                        <?php foreach ($san_pham_bien_the as $key => $value):?>
                                        <div class="slider-banner-image">
                                                <div class="zoom-image-hover">
                                                <img src="<?= BASE_URL . $value['hinh_anh'] ?>" alt="" class="product-image" >                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                            
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
                                        <?php endif ?>
                                        <?php if(!empty($gia_tri_bien_the)):?>
                                        <?php foreach ($san_pham_bien_the as $key => $value):?>
                                        <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                <img src="<?= BASE_URL . $value['hinh_anh'] ?>" alt="" class="product-image" >
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php foreach ($danh_sach_anh as $key => $value): ?>
                                            <div class="thumbnail-image"><div class="thumbImg">
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
                                        <li><label>Loại cây <span>:</span></label><?= $sanphan_ct['ten_san_pham'] ?></li>
                                        <li><label>Chế độ chăm sóc <span>:</span></label>Dễ chăm sóc</li>
                                        <!-- <li><label>Kích thước <span>:</span></label>Cao 15 cm</li> -->
                                        <!-- <li><label>Đặc điểm <span>:</span></label>Lọc không khí, Phù hợp nội thất</li> -->
                                        <!-- <li><label>Thông tin khác <span>:</span></label>Không cần nhiều ánh sáng, Tặng kèm chậu</li> -->
                                        <li><label>Số lượng <span>:</span></label>Còn <?= $sanphan_ct['so_luong']?> cây</li>
                                    </ul>
                                </div>
                                <div class="cr-product-price">
                                    <span class="new-price"><?= number_format($sanphan_ct['gia_khuyen_mai'])." vnđ"  ?></span>
                                    <span class="old-price"><?= number_format($sanphan_ct['gia_san_pham'])." vnđ"  ?></span>
                                </div>
                                <?php if(!empty($gia_tri_bien_the)): ?>
                                    <?php foreach ($thuoc_tinh as $value):?>
                                <div class="cr-size-weight">

                                    <div class="cr-kg">
                                        <ul>
                                        <?php foreach ($gia_tri_bien_the as $key => $value):?>
                                            <form action="<?= BASE_URL . "?act=san-pham-chi-tiet&id_san_pham=".$id ?>" method="post">
                                                <input name="id_bien_the" value="<?= $value['id'] ?>" type="text" hidden >
                                                <button class="btn p-0 m-0" type="submit" ><li 
                                                <?php if (isset($id_bien_the)){  
                                                   echo $id_bien_the==$value['id']? "class='active-color'" : "" ;
                                                } ?> ><?= $value['gia_tri'] ?></li></button>
                                            </form>
                                            <?php endforeach ?>
                                            <!-- class="active-color" -->
                                        </ul>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <?php endif ?>
                                <form method="POST" action="<?= BASE_URL . "/?act=form-dia-chi-nhan-hang" ?>">
                                    <div class="cr-add-card">
                                    <input type="text" value="<?= $sanphan_ct['id']  ?>" hidden name="id[]"  >
                                    <input type="text" value="<?= $id_bien_the??"" ?>" hidden name="id_bien_the[]" >
                                        <div class="cr-qty-main">
                                            <input name="so_luong[]" type="text" placeholder="." value="1" minlength="1" maxlength="20"
                                                class="quantity" style="width: 80px">
                                            <button type="button" id="add" class="plus" style="width: 40px; height: 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 18px;">+</button>
                                            <button type="button" id="sub" class="minus" style="width: 40px; height: 20px; background-color: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 18px;">-</button>
                                        </div>
                                        <div class="cr-add-button d-flex">
                                        <?php 
                                                $text ="";
                                                if (isset($id_bien_the)) {
                                                    $text = "&id_bien_the=".$id_bien_the ;                                            
                                                } 
                                            ?>
                                            <button type="button" class="cr-button text-white me-4 cr-shopping-bag"><a href="?act=them-gio-hang&id_gio_hang=<?= $gio_hang['id'] ?>&id_san_pham=<?= $sanphan_ct['id'].$text ?>">Thêm giỏ hàng</a></button>
                                            
                                            <button type="submit" name="btn_submit" class="cr-button text-white cr-shopping-bag">Mua ngay</button>

                                        </div>
                                        <!-- <div class="cr-card-icon">
                                            <a href="javascript:void(0)" class="wishlist">
                                                <i class="ri-heart-line"></i>
                                            </a>
                                            <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><div class="cr-paking-delivery">
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
                                <button class="nav-link" id="comment-tab" data-bs-toggle="tab" data-bs-target="#comment"
                                    type="button" role="tab" aria-controls="comment"
                                    aria-selected="false">Bình luận</button>
                            </li>
                           
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Mô tả -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p><?= $sanphan_ct['mo_ta']?></p>
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
                                            <li><label>Loại cây <span>:</span></label><?= $sanphan_ct['ten_san_pham'] ?></li>
                                            <li><label>Kích thước <span>:</span></label> Cao 10-15 cm</li><li><label>Màu sắc <span>:</span></label> Xanh lá cây</li>
                                            <li><label>Điều kiện sống <span>:</span></label> Ánh sáng vừa, không cần tưới nhiều</li>
                                            <li><label>Đặc tính <span>:</span></label> Lọc không khí, dễ chăm sóc</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Bình luận -->
                            <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                            <div class="cr-tab-content-from">
                                    <?php foreach ($chi_tiet_binh_luans as $key=>$value): ?>
                                    <div class="post">
                                        <div class="content">
                                            <img src="<?= BASE_URL . $value['anh_dai_dien']?>" alt="not image">
                                            <div class="details">
                                                <span class="date"><?= $value['ngay_dang']?></span>
                                                <span class="name"><?= $value['ho_ten']?></span>
                                            </div>
                                        </div>
                                        <p><?= $value['noi_dung']?></p>
                                    </div>
                                    <?php endforeach; ?>
                                    <h4 class="heading">Viết bình luận</h4>
                                    <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL . "/?act=them-binh-luan" ?>">
                                        
                                        <div class="cr-ratting-input form-submit">
                                            <input type="hidden" name="id_san_pham" value="<?= $sanphan_ct['id'] ?>" id="" >
                                            <textarea name="binh_luan" placeholder="Nhập nhận xét của bạn"></textarea>
       
                                            <button class="cr-button" type="submit" value="Submit">Gửi bình luận</button>
                                        </div>
                                    </form>
                                </div>
                            
                        </div>
                    </div>
                    
                </div>
                                <div class="cr-paking-delivery">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                  <h5 class="heading">Đánh giá</h5>
                                </li>
                                </ul><div class="tab-content" id="myTabContent">
                                    <!-- Đánh giá -->
                                    <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        <div class="cr-tab-content-from">
                                            <?php foreach ($list_danh_gias as $key => $value): ?>
                                            <div class="post">
                                                <div class="content">
                                                    <img src="<?= BASE_URL . $value['anh_dai_dien'] ?>" alt="not image">
                                                    <div class="details">
                                                        <span class="date"><?= $value['ngay_danh_gia'] ?></span>
                                                        <span class="name"><?= $value['ho_ten'] ?></span>
                                                    </div>
                                                    <div class="cr-t-review-rating">
                                                        <?php
                                                        $rating = $value['danh_gia']; 
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= $rating) {
                                                                echo '<i style="margin-right: 5px;"  class=" ri-star-s-fill rated "></i>'; 
                                                            } else {
                                                                echo '<i style="margin-right: 5px;" class=" ri-star-s-line"></i>'; 
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <p><?= $value['noi_dung'] ?></p>
                                            </div>
                                            <?php endforeach; ?>
                                            <h4 class="heading">Viết đánh giá</h4>
                                           
                                            <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL . "?act=them-danh-gia" ?>">
                                           
                                                <div class="cr-ratting-input form-submit">
                                                    <input type="hidden" name="id_san_pham" value="<?=$sanphan_ct['id'] ?>">
                                                    <div class="cr-ratting-star">
                                                        <span>Đánh giá của bạn :</span><div class="cr-t-review-rating-2" >
                                                        <i class="ri-star-s-line" data-value="1"></i>
                                                        <i class="ri-star-s-line" data-value="2"></i>
                                                        <i class="ri-star-s-line" data-value="3"></i>
                                                        <i class="ri-star-s-line" data-value="4"></i>
                                                        <i class="ri-star-s-line" data-value="5"></i>
                                                        </div>
                                                        <input type="hidden" name="danh_gia" id="rating_value" value="">
                                                    </div>
                                                    <textarea name="noi_dung" placeholder="Nhập đánh giá của bạn"></textarea>
                                                    <button class="cr-button" type="submit" value="Submit">Gửi đánh giá</button>
                                                </div>
                                            </form>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                <div class="col-lg-2 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
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
                                        <div class="cr-image-inner zoom-image-hover"><img src="<?= BASE_URL . $value['hinh_anh'] ?>"
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
    <!-- Model -->
    <!-- <div class="modal fade quickview-modal" id="quickview" aria-hidden="true" tabindex="-1"><div class="modal-dialog modal-dialog-centered cr-modal-dialog">
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
                                    <div class="cr-qty-main"><input type="text" placeholder="1" value="1" minlength="1" maxlength="20" class="quantity">
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
<script>
const stars = document.querySelectorAll('.cr-t-review-rating-2 i');
const ratingInput = document.getElementById('rating_value');

// Lặp qua từng sao và thêm sự kiện click
stars.forEach(star => {
    star.addEventListener('click', function() {
        // Kiểm tra xem sao đã được đánh giá chưa
        if (star.classList.contains('rated')) return;  // Nếu sao đã đánh giá, không thay đổi gì

        const rating = parseInt(this.getAttribute('data-value')); // Lấy giá trị sao người dùng chọn

        // Cập nhật giao diện sao
        stars.forEach(star => {
            if (parseInt(star.getAttribute('data-value')) <= rating) {
                star.classList.remove('ri-star-s-line');
                star.classList.add('ri-star-s-fill');  // Sao đầy
            } else {
                star.classList.remove('ri-star-s-fill');
                star.classList.add('ri-star-s-line');  // Sao rỗng
            }
        });

        // Lưu giá trị vào trường ẩn để gửi khi submit form
        ratingInput.value = rating;
    });
});

// Đánh dấu sao đã đánh giá khi trang được tải
const ratedStars = document.querySelectorAll('.cr-t-review-rating-2 i.rated');
ratedStars.forEach(star => {
    star.classList.remove('ri-star-s-line');
    star.classList.add('ri-star-s-fill');  // Hiển thị sao đầy cho những sao đã đánh giá
});
</script>
<?php include './views/layout/footer.php' ?>