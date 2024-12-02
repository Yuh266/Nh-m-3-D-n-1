<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<div class="col-md-12"> <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <!-- Hiển thị thông báo thêm thành công  -->
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Sửa thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-tai-khoan" ?>" class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])): 
                    unset($_SESSION['alert_error']); ?>
                <div class="alert alert-danger w-100" role="alert">
                   Sửa thất bại. 
                </div>
            <?php endif ?>
        </div> <!--end::Header--> <!--begin::Form-->
        <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . "/?act=sua-tai-khoan" ?>"  > <!--begin::Body-->
            <div class="card-body">
                
                <input type="text" name="id" value="<?= $_SESSION['tai_khoan']['id']??"" ?>" hidden >
                <input type="text" name="old_image" value="<?= $_SESSION['tai_khoan']['anh_dai_dien']??"" ?>" hidden >
                <div class="row">
                    <div class="mb-3 col-md-6 "> 
                        <label for="exampleInputEmail1" class="form-label">Họ tên</label> 
                        <input value="<?= $_SESSION['tai_khoan']['ho_ten']??"" ?>" name="ho_ten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['ho_ten']??"" ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label> 
                        <input value="<?= $_SESSION['tai_khoan']['so_dien_thoai']??"" ?>" name="so_dien_thoai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['so_dien_thoai']??"" ?>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Email</label> 
                        <input value="<?= $_SESSION['tai_khoan']['email']??"" ?>" name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['email']??"" ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Nhập mật khẩu mới</label> 
                        <input value="<?= $_SESSION['tai_khoan']['mat_khau']??"" ?>" name="mat_khau" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['mat_khau']??"" ?>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                <div class="col-md-6 d-flex">
                        <label for="">Giới tính :</label>
                        <div class="form-check mx-3 mb-3 ">
                            <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['gioi_tinh'])?($_SESSION['tai_khoan']['gioi_tinh']==1?"checked":""):"" ?> type="radio" name="gioi_tinh" value="1" > 
                            <label class="form-check-label" for="gridRadios1">Nam</label> 
                        </div>
                        <div class="form-check mx-3 mb-3 ">
                            <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['gioi_tinh'])?($_SESSION['tai_khoan']['gioi_tinh']==0?"checked":""):"" ?> type="radio" name="gioi_tinh" value="0" > 
                            <label class="form-check-label" for="gridRadios1">Nữ</label> 
                        </div>
                        <div class="form-check mx-3 mb-3 ">
                            <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['gioi_tinh'])?($_SESSION['tai_khoan']['gioi_tinh']==2?"checked":""):"" ?> type="radio" name="gioi_tinh" value="2" > 
                            <label class="form-check-label" for="gridRadios1">Khác</label> 
                        </div>
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['gioi_tinh']??"" ?>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                    <label for="">Chức vụ :</label>
                    <div class="form-check mx-3 mb-3 ">
                        <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['chuc_vu'])?($_SESSION['tai_khoan']['chuc_vu']==1?"checked":""):"" ?> type="radio" name="chuc_vu" value="1" > 
                        <label class="form-check-label" for="gridRadios1">Quản trị</label> 
                    </div>
                    <div class="form-check mx-3 mb-3 ">
                        <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['chuc_vu'])?($_SESSION['tai_khoan']['chuc_vu']==2?"checked":""):"" ?> type="radio" name="chuc_vu" value="2" > 
                        <label class="form-check-label" for="gridRadios1">Thành viên</label> 
                    </div>
                    <div class="form-check mx-3 mb-3 ">
                        <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['chuc_vu'])?($_SESSION['tai_khoan']['chuc_vu']==3?"checked":""):"" ?> type="radio" name="chuc_vu" value="3" > 
                        <label class="form-check-label" for="gridRadios1">Nhân viên</label> 
                    </div>
                    <div id="emailHelp" class="form-text text-danger">
                        <?= $_SESSION['error']['chuc_vu']??"" ?>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Ngày sinh</label> 
                        <input value="<?= $_SESSION['tai_khoan']['ngay_sinh']??"" ?>" name="ngay_sinh" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['ngay_sinh']??"" ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label> 
                        <input value="<?= $_SESSION['tai_khoan']['dia_chi']??"" ?>" name="dia_chi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['dia_chi']??"" ?>
                        </div>
                    </div>
                    <div class=" d-flex">
                    <label for="">Trạng thái :</label>
                    <div class="form-check mx-3 mb-3 ">
                        <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['trang_thai'])?($_SESSION['tai_khoan']['trang_thai']==1?"checked":""):"" ?> type="radio" name="trang_thai" value="1" > 
                        <label class="form-check-label" for="gridRadios1">Kích hoạt</label> 
                    </div>
                    <div class="form-check mx-3 mb-3 ">
                        <input class="form-check-input" <?= isset($_SESSION['tai_khoan']['trang_thai'])?($_SESSION['tai_khoan']['trang_thai']==0?"checked":""):"" ?> type="radio" name="trang_thai" value="0" > 
                        <label class="form-check-label" for="gridRadios1">Vô hiệu</label> 
                    </div>
                    <div id="emailHelp" class="form-text text-danger">
                        <?= $_SESSION['error']['trang_thai']??"" ?>
                    </div>
                    </div>
                </div>
                
                    

                <div class="input-group mb-3 col-md-6"> 
                    <input name="file_anh" type="file" class="form-control" id="inputGroupFile02"> 
                    <label class="input-group-text" for="inputGroupFile02">Ảnh</label> 
                </div>
                
                <!-- <div class="mb-3 form-check"> <input type="checkbox" class="form-check-input" id="exampleCheck1"> <label class="form-check-label" for="exampleCheck1">Check me out</label> </div> -->
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> 
                <button type="submit" class="btn btn-primary">Sửa</button> 
                <button type="reset" class="btn btn-primary">Nhập lại</button> 
            </div> <!--end::Footer-->
        </form> <!--end::Form-->
    </div> <!--end::Quick Example--> <!--begin::Input Group-->
    <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-tai-khoan" ?>"><button class="btn btn-success">Trang danh sách</button></a>
    
</div>


<?php include './views/layout/footer.php' ?>
