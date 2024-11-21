<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>

<div class="col-md-12">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Thêm thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-tai-khoan" ?>" class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])): ?>
                <div class="alert alert-danger w-100" role="alert">
                    Thêm thất bại.
                </div>
            <?php endif ?>
            <?php deleteAlertSession(); ?>
        </div>
        
        <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . "/?act=them-tai-khoan" ?>">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="ho_ten" class="form-label">Họ tên</label>
                        <input value="<?= $_SESSION['tai_khoan']['ho_ten'] ?? "" ?>" name="ho_ten" type="text" class="form-control" id="ho_ten">
                        <div class="form-text text-danger"><?= $_SESSION['error']['ho_ten'] ?? "" ?></div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                        <input value="<?= $_SESSION['tai_khoan']['so_dien_thoai'] ?? "" ?>" name="so_dien_thoai" type="text" class="form-control" id="so_dien_thoai">
                        <div class="form-text text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?? "" ?></div>
                    </div>
                </div>

               

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input value="<?= $_SESSION['tai_khoan']['email'] ?? "" ?>" name="email" type="text" class="form-control" id="email">
                        <div class="form-text text-danger"><?= $_SESSION['error']['email'] ?? "" ?></div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="mat_khau" class="form-label">Mật khẩu</label>
                        <input value="<?= $_SESSION['tai_khoan']['mat_khau'] ?? "" ?>" name="mat_khau" type="text" class="form-control" id="mat_khau">
                        <div class="form-text text-danger"><?= $_SESSION['error']['mat_khau'] ?? "" ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex">
                    <label>Trạng thái:</label>
                 
                        <div class="form-check mx-3">
                            <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['trang_thai']) && $_SESSION['tai_khoan']['trang_thai'] == 1 ? "checked" : "" ?> type="radio" name="trang_thai" value="1">
                            <label class="form-check-label">Kích Hoạt</label>
                        </div>
                    
                        <div class="form-check mx-3">
                            <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['trang_thai']) && $_SESSION['tai_khoan']['trang_thai'] == 0 ? "checked" : "" ?> type="radio" name="trang_thai" value="0">
                            <label class="form-check-label">Vô hiệu</label>
                        </div>
                    
                    <div class="form-text text-danger"><?= $_SESSION['error']['trang_thai'] ?? "" ?></div>
                    </div>
                
                     <div class="col-md-6 d-flex">
                        <label>Chức vụ:</label>
                        <div class="form-check mx-3">
                            <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['chuc_vu']) && $_SESSION['tai_khoan']['chuc_vu'] == 1 ? "checked" : "" ?> type="radio" name="chuc_vu" value="1">
                            <label class="form-check-label">Quản trị</label>
                        </div>
                        <div class="form-check mx-3">
                            <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['chuc_vu']) && $_SESSION['tai_khoan']['chuc_vu'] == 2 ? "checked" : "" ?> type="radio" name="chuc_vu" value="2">
                            <label class="form-check-label">Khách hàng</label>
                        </div>
                        <div class="form-check mx-3">
                            <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['chuc_vu']) && $_SESSION['tai_khoan']['chuc_vu'] == 3 ? "checked" : "" ?> type="radio" name="chuc_vu" value="3">
                            <label class="form-check-label">Nhân viên</label>
                        </div>
                        <div class="form-text text-danger"><?= $_SESSION['error']['chuc_vu'] ?? "" ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                        <input value="<?= $_SESSION['tai_khoan']['ngay_sinh'] ?? "" ?>" name="ngay_sinh" type="date" class="form-control" id="ngay_sinh">
                        <div class="form-text text-danger"><?= $_SESSION['error']['ngay_sinh'] ?? "" ?></div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="dia_chi" class="form-label">Địa chỉ</label>
                        <input value="<?= $_SESSION['tai_khoan']['dia_chi'] ?? "" ?>" name="dia_chi" type="text" class="form-control" id="dia_chi">
                        <div class="form-text text-danger"><?= $_SESSION['error']['dia_chi'] ?? "" ?></div>
                    </div>
                </div>
                     
                    <div class="col-md-6 d-flex">
                         <label>Giới tính:</label>
                        <div class="form-check mx-3">
                        <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['gioi_tinh']) && $_SESSION['tai_khoan']['gioi_tinh'] == 1 ? "checked" : "" ?> type="radio" name="gioi_tinh" value="1">
                        <label class="form-check-label">Nam</label>
                         </div>
                        <div class="form-check mx-3">
                        <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['gioi_tinh']) && $_SESSION['tai_khoan']['gioi_tinh'] == 0 ? "checked" : "" ?> type="radio" name="gioi_tinh" value="0">
                        <label class="form-check-label">Nữ</label>
                        </div>
                        <div class="form-check mx-3">
                        <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['gioi_tinh']) && $_SESSION['tai_khoan']['gioi_tinh'] == 2 ? "checked" : "" ?> type="radio" name="gioi_tinh" value="2">
                        <label class="form-check-label">Khác</label>
                        </div>
                    </div>
                     <div class="form-text text-danger"><?= $_SESSION['error']['gioi_tinh'] ?? "" ?></div>
                     <div class="mb-3 col-md-12">
                        <label for="file_anh" class="form-label">Ảnh đại diện</label>
                        <input name="file_anh" type="file" class="form-control" id="file_anh">
                     </div>
                       
                     
                </div>
               
          

            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Thêm</button> 
                <button type="reset" class="btn btn-primary">Nhập lại</button> 
            </div> <!--end::Footer-->
        </form> <!--end::Form-->

    </div> <!--end::Quick Example--> <!--begin::Input Group-->
    <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-tai-khoan" ?>"><button class="btn btn-success">Trang danh sách</button></a>

</div>



<?php include './views/layout/footer.php' ?>