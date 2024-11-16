<?php include './views/layout/header.php' ?>
<section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Register</h2>
                            <span> <a href="index.php">Home</a> - Register</span>
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
                            <h2>Register</h2>
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
                        <form class="cr-content-form" method="post" action="<?= BASE_URL."?act=form-register"?>" >
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>User Name*</label>
                                        <input type="text" name="ho_ten" placeholder="Enter Your User Name" class="cr-form-control">
                                        <div class="form-text text-danger"><?= $_SESSION['error']['ho_ten'] ?? "" ?></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Password*</label>
                                        <input type="password" name="mat_khau" placeholder="Enter Your Password" class="cr-form-control">
                                        <div class="form-text text-danger"><?= $_SESSION['error']['mat_khau'] ?? "" ?></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email"  name="email" placeholder="Enter Your email" class="cr-form-control">
                                        <div class="form-text text-danger"><?= $_SESSION['error']['email'] ?? "" ?></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number*</label>
                                        <input type="text" name="so_dien_thoai" placeholder="Enter Your Phone Number" class="cr-form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Address*</label>
                                        <input type="text" name="dia_chi" placeholder="Address" class="cr-form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Sex*</label>
                                        <select class="cr-form-control"  name="gioi_tinh" aria-label="Default select example">
                                            <option selected value="3">Choose your sex</option>
                                            <option value="1">Male</option>
                                            <option value="0">Female</option>
                                            <option value="2">Other</option>
                                        </select>
                                    </div>
                                </div>
                               
                            
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="ngay_sinh" placeholder="Enter Your Date" class="cr-form-control">
                                    </div>
                                </div>
                                <div class="cr-register-buttons">
                                    <button type="submit" class="cr-button">Signup</button>
                                    <a href="<?= BASE_URL."?act=form-login"?>" class="link">
                                        Have an account?
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