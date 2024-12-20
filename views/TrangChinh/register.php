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
                            <img src="assets/img/logo/logo2.png" width="180px" height="150px" alt="logo">
                        </div>
                        <form class="cr-content-form" enctype="multipart/form-data" method="post" action="<?= BASE_URL."?act=form-register"?>" autocomplete="off" >
                            <div class="row">
                                <!-- <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Tên người dùng*</label>
                                        <input type="text" name="ho_ten" placeholder="Nhập tên người dùng" class="cr-form-control">
                                        <div class="form-text text-danger"><?php 
                                                if(isset($_SESSION['error_register']['ho_ten'])){
                                                echo $_SESSION['error_register']['ho_ten'];
                                                unset($_SESSION['error_register']['ho_ten']);
                                                }
                                        ?></div>
                                    </div>
                                </div> -->
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="text"  name="email" placeholder="Nhập Email" class="cr-form-control" value="<?= $_SESSION['tai_khoan_error_register']['email']?? ""?>" >
                                        <div class="form-text text-danger"><?php 
                                                if(isset($_SESSION['error_register']['email'])){
                                                echo $_SESSION['error_register']['email'];
                                                unset($_SESSION['error_register']['email']);
                                                }
                                        ?></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Mật khẩu*</label>
                                        <input type="password" name="mat_khau" placeholder="Nhập mật khẩu" class="cr-form-control">
                                        <div class="form-text text-danger"><?php 
                                                if(isset($_SESSION['error_register']['mat_khau'])){
                                                echo $_SESSION['error_register']['mat_khau'];
                                                unset($_SESSION['error_register']['mat_khau']);
                                                }
                                        ?></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu*</label>
                                        <input type="password" name="mat_khau_nhap_lai" placeholder="Nhập lại mật khẩu" class="cr-form-control">
                                        <div class="form-text text-danger"><?php 
                                                if(isset($_SESSION['error_register']['mat_khau_nhap_lai'])){
                                                echo $_SESSION['error_register']['mat_khau_nhap_lai'];
                                                unset($_SESSION['error_register']['mat_khau_nhap_lai']);
                                                }
                                        ?></div>
                                    </div>
                                </div>
                               
                                <!-- <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại*</label>
                                        <input type="text" name="so_dien_thoai" placeholder="Nhập số điện thoại" class="cr-form-control">
                                        <div class="form-text text-danger"><?php 
                                                if(isset($_SESSION['error_register']['so_dien_thoai'])){
                                                echo $_SESSION['error_register']['so_dien_thoai'];
                                                unset($_SESSION['error_register']['so_dien_thoai']);
                                                }
                                        ?></div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ*</label>
                                        <input type="text" name="dia_chi" placeholder="Nhập địa chỉ" class="cr-form-control">
                                        <div class="form-text text-danger"><?php 
                                                if(isset($_SESSION['error_register']['dia_chi'])){
                                                echo $_SESSION['error_register']['dia_chi'];
                                                unset($_SESSION['error_register']['dia_chi']);
                                                }
                                        ?></div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-12">
                                    <div class="form-group">
                                        <label>Ảnh đại điện*</label>
                                        <input type="file" name="file_anh"  class="cr-form-control">
                                        <div class="form-text text-danger"><?php 
                                                if(isset($_SESSION['error_register']['file_anh'])){
                                                echo $_SESSION['error_register']['file_anh'];
                                                unset($_SESSION['error_register']['file_anh']);
                                                }
                                        ?></div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Giới tính*</label>
                                        <select class="cr-form-control"  name="gioi_tinh" aria-label="Default select example">
                                            <option selected value="3">Chọn giới tính của bạn</option>
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                            <option value="2">Khác</option>
                                        </select>
                                    </div>
                                </div> -->                    
<!--                             
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh*</label>
                                        <input type="date" name="ngay_sinh" placeholder="Nhập ngày sinh" class="cr-form-control">
                                    </div>
                                </div> -->
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