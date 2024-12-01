<?php
include './views/layout/header.php';
?>
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
                        <a href="index.php">Home</a>
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
                            <h2>Thông tin tài khoản</h2>
                            <span> <a href="index.php">Trang chủ</a> - Thông tin tài khoản</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login -->
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">
            <div class="row">
            <?php if (isset($_SESSION['alert_success_tk_client'])):  unset($_SESSION['alert_success_tk_client']);?>
                <div class="alert alert-success w-100" role="alert">
                Thông tin tài khoản đã được cập nhật thành công!
                </div>
                
            <?php elseif (isset($_SESSION['alert_error_tk_client'])):
                 unset($_SESSION['alert_error_tk_client']);?>
                <div class="alert alert-danger w-100" role="alert">
                   Cập nhật thất bại!
                </div>
            <?php endif ?>
                <form enctype="multipart/form-data" action="<?= BASE_URL . "?act=form-tai-khoan" ?>" method="post" autocomplete="off">
                    <!-- Sidebar Area Start -->

                    <div class="cr-checkout-leftside col-lg-12 col-md-12 m-t-991">
                        <!-- checkout content Start -->
                        <div class="cr-checkout-content">
                            <div class="cr-checkout-inner">

                                <div class="cr-checkout-wrap">
                                    <div class="cr-checkout-block cr-check-bill">
                                        <h2 class="cr-checkout-title">Thông tin tài khoản</h2>
                                        <p>Quản lý thông tin hồ sơ</p>
                                        <div class="cr-bl-block-content">
                                            <hr>
                                            <div class="cr-check-bill-form mb-minus-24">
                                                <div class="row">

                                                    <div class="col-md-7 border-end pe-3">
                                                        <input type="text" name="id" value="<?= $_SESSION['client_user']['id'] ?? "" ?>" hidden>
                                                        <input type="text" name="old_image" value="<?= $_SESSION['client_user']['anh_dai_dien'] ?? "" ?>" hidden>
                                                        <span class="cr-bill-wrap ">

                                                            <label>Tên người dùng</label>
                                                            <input type="text" name="ho_ten" 
                                                                  value="<?= 
                                                                  isset($_SESSION['tai_khoan_error']['ho_ten']) ? $_SESSION['tai_khoan_error']['ho_ten'] : ($_SESSION['client_user']['ho_ten'] ?? "") ?>"
                                                                    class="form-control">

                                                                <div class="form-text text-danger">
                                                                    <?php
                                                                    if (isset($_SESSION['error_update_tk_client']['ho_ten'])) {
                                                                        echo $_SESSION['error_update_tk_client']['ho_ten'];  // Hiển thị thông báo lỗi
                                                                        unset($_SESSION['error_update_tk_client']['ho_ten']);  //// Xóa lỗi sau khi đã hiển thị
                                                                        unset($_SESSION['tai_khoan_error']['ho_ten']); // xóa sessin loi
                                                                    }
                                                                    ?>
                                                                </div>
                                                                                                                                </span>

                                                        <span class="cr-bill-wrap">
                                                            <label>Email</label>
                                                            <input type="text" name="email" value="<?= isset($_SESSION['tai_khoan_error']['email']) ? $_SESSION['tai_khoan_error']['email'] : ($_SESSION['client_user']['email'] ?? "") ?>" class="form-control">
                                                            <div class="form-text text-danger"><?

                                                                                                if (isset($_SESSION['error_update_tk_client']['email'])) {
                                                                                                    echo $_SESSION['error_update_tk_client']['email'];
                                                                                                    unset($_SESSION['error_update_tk_client']['email']);
                                                                                                    unset($_SESSION['tai_khoan_error']['email']);
                                                                                                }



                                                                                                ?></div>
                                                        </span>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="cr-bill-wrap">
                                                                    <label>Số điện thoại</label>
                                                                    <input type="text" name="so_dien_thoai" value="<?= isset($_SESSION['tai_khoan_error']['so_dien_thoai']) ? $_SESSION['tai_khoan_error']['so_dien_thoai'] : ($_SESSION['client_user']['so_dien_thoai'] ?? "") ?>" class="form-control">
                                                                    <div class="form-text text-danger"><?

                                                                                                        if (isset($_SESSION['error_update_tk_client']['so_dien_thoai'])) {
                                                                                                            echo $_SESSION['error_update_tk_client']['so_dien_thoai'];
                                                                                                            unset($_SESSION['error_update_tk_client']['so_dien_thoai']);
                                                                                                            unset($_SESSION['tai_khoan_error']['so_dien_thoai']) ;
                                                                                                        }



                                                                                                        ?></div>
                                                                </span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3 cr-bill-wrap">
                                                                    <label for="gioi_tinh" class="form-label">Giới tính</label>
                                                                    <select class="form-select" id="gioi_tinh" name="gioi_tinh" >
                                                                        <option value="1" <?= ($_SESSION['client_user']['gioi_tinh'] == 1) ? 'selected' : '' ?>>Nam</option>
                                                                        <option value="0" <?= ($_SESSION['client_user']['gioi_tinh'] == 0) ? 'selected' : '' ?>>Nữ</option>
                                                                        <option value="2" <?= ($_SESSION['client_user']['gioi_tinh'] == 2) ? 'selected' : '' ?>>Khác</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="cr-bill-wrap">
                                                                    <label>Địa chỉ*</label>
                                                                    <input type="text" name="dia_chi" value="<?= isset($_SESSION['tai_khoan_error']['dia_chi']) ? $_SESSION['tai_khoan_error']['dia_chi'] : ($_SESSION['client_user']['dia_chi'] ?? "") ?>" class="form-control">
                                                                    <div class="form-text text-danger"><?

                                                                                                        if (isset($_SESSION['error_update_tk_client']['dia_chi'])) {
                                                                                                            echo $_SESSION['error_update_tk_client']['dia_chi'];
                                                                                                            unset($_SESSION['error_update_tk_client']['dia_chi']);
                                                                                                            unset($_SESSION['tai_khoan_error']['dia_chi']);
                                                                                                        }



                                                                                                        ?></div>
                                                                </span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="cr-bill-wrap">
                                                                    <label>Ngày sinh*</label>
                                                                    <input type="date" name="ngay_sinh" value="<?= $_SESSION['client_user']['ngay_sinh'] ?>" class="form-control">
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <a href="<?= BASE_URL . "?act=doi_mat_khau" ?>" class="text-primary">Đổi mật khẩu</a>
                                                        </div>



                                                    </div>

                                                    <div class="col-md-5 d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="cr-image-upload">
                                                            <img id="previewImage" 
                                                                src="<?= BASE_URL . ($_SESSION['client_user']['anh_dai_dien'] ?? 'assets/images/default_user.jpg') ?>" 
                                                                width="150px" height="150px" 
                                                                class="user-image rounded-circle shadow" 
                                                                alt="user_image">
                                                            
                                                            <div class="mt-2">
                                                                <label style="padding: 16px 8px;" for="file_anh" class="btn btn-light btn--m btn--inline text-center">Chọn Ảnh</label>
                                                                <input type="file" name="file_anh" id="file_anh" class="d-none">
                                                                <p id="filePath" class="mt-2 text-warning">Chưa có ảnh nào được chọn</p> <!-- Hiển thị đường dẫn -->
                                                            </div>
                                                            <p class="mt-2 text-muted">Dung lượng file tối đa là 1 MB<br />Định dạng: .JPEG, .PNG</p>
                                                        </div>
                                                    </div>
                                                </div>
                                               

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <span class="cr-check-order-btn">
                                    <button type="submit" class="cr-button mt-30">Lưu thay đổi</button>

                                </span>
                            </div>

                        </div>
                        <!--cart content End -->
                    </div>
                </form>

            </div>
        </div>
    </section>
</main>
<script>
    // console.log("JavaScript đã được tải");
    document.getElementById('file_anh').addEventListener('change', function(event) {
    const file = event.target.files[0]; // Lấy file ảnh được chọn
    const filePathElement = document.getElementById('filePath'); // Vị trí để hiển thị đường dẫn file

    if (file) {
        filePathElement.textContent = `Đường dẫn ảnh: ${file.name}`; // Hiển thị tên file
    } else {
        filePathElement.textContent = "Chưa có ảnh nào được chọn"; // Nếu không chọn ảnh
    }
});
</script>
<?php include './views/layout/footer.php' ?>