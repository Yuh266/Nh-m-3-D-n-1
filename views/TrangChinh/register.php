<?php include './views/layout/header.php' ?>
<section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Đăng kí</h2>
                            <span> <a href="index.php">Trang chủ</a> - Đăng kí</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="section-register padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Đăng kí</h2>
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
                    <div class="cr-register" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="form-logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </div>
                        <form class="cr-content-form" enctype="multipart/form-data" method="post" action="<?= BASE_URL."?act=form-register"?>" >
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Tên người dùng*</label>
                                        <input type="text" name="ho_ten" placeholder="Nhập tên người dùng" class="cr-form-control">
                                        <div class="form-text text-danger"><?= $_SESSION['error']['ho_ten'] ?? "" ?></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Mật khẩu*</label>
                                        <input type="password" name="mat_khau" placeholder="Nhập mật khẩu" class="cr-form-control">
                                        <div class="form-text text-danger"><?= $_SESSION['error']['mat_khau'] ?? "" ?></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email"  name="email" placeholder="Nhập Email" class="cr-form-control">
                                        <div class="form-text text-danger"><?= $_SESSION['error']['email'] ?? "" ?></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại*</label>
                                        <input type="text" name="so_dien_thoai" placeholder="Nhập số điện thoại" class="cr-form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ*</label>
                                        <input type="text" name="dia_chi" placeholder="Nhập địa chỉ" class="cr-form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Ảnh đại điện*</label>
                                        <input type="file" name="file_anh" placeholder="Ảnh đại diện" class="cr-form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Giới tính*</label>
                                        <select class="cr-form-control"  name="gioi_tinh" aria-label="Default select example">
                                            <option selected value="3">Chọn giới tính của bạn</option>
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                            <option value="2">Khác</option>
                                        </select>
                                    </div>
                                </div>
                               
                            
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="date" name="ngay_sinh" placeholder="Nhập ngày sinh" class="cr-form-control">
                                    </div>
                                </div>
                                <div class="cr-register-buttons">
                                    <button type="submit" class="cr-button">Đăng kí</button>
                                    <a href="<?= BASE_URL."?act=login"?>" class="link">
                                        Đã có tài khoản?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include './views/layout/footer.php' ?>