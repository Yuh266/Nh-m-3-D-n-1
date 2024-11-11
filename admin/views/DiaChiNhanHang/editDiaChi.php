<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<div class="col-md-12"> <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <!-- Hiển thị thông báo thêm thành công  -->
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Sửa thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-".$title_url ?>" class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])):?>
                <div class="alert alert-danger w-100" role="alert">
                    Sửa thất bại. 
                </div>
            <?php endif ?>
        </div> <!--end::Header--> <!--begin::Form-->
        <form method="POST" action="<?= BASE_URL_ADMIN . "/?act=sua-".$title_url ?>"  > <!--begin::Body-->
            <div class="card-body">
                <input type="text" name="id" value="<?= $_SESSION['dia_chi']['id']??"" ?>" hidden >
                <div class="row">
                    <div class="col-md-6"> <label for="validationCustom04" class="form-label">Email tài khoản</label> 
                        <select name="id_tai_khoan" class="form-select" id="validationCustom04" >
                            <?php foreach ($listTaiKhoan as $key => $TaiKhoan):?>
                                <option <?= isset($_SESSION['dia_chi']['id_tai_khoan'])?($TaiKhoan['id']==$_SESSION['dia_chi']['id_tai_khoan']?"selected":""):"" ?> value="<?= $TaiKhoan['id'] ?>" ><?= $TaiKhoan['email'] . " - id: ".$TaiKhoan['id'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="form-text text-danger">
                            <?= $_SESSION['error']['id_tai_khoan']??"" ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Tên người nhận</label> 
                        <input value="<?= $_SESSION['dia_chi']['ten_nguoi_nhan']??"" ?>" name="ten_nguoi_nhan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['ten_nguoi_nhan']??"" ?>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">SĐT người nhận</label> 
                        <input value="<?= $_SESSION['dia_chi']['sdt_nguoi_nhan']??"" ?>" name="sdt_nguoi_nhan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['sdt_nguoi_nhan']??"" ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ người nhận</label> 
                        <input value="<?= $_SESSION['dia_chi']['dia_chi_nguoi_nhan']??"" ?>" name="dia_chi_nguoi_nhan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['dia_chi_nguoi_nhan']??"" ?>
                        </div>
                    </div>
                </div>
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> 
                <button type="submit" class="btn btn-primary">Sửa</button> 
                <button type="reset" class="btn btn-primary">Nhập lại</button> 
            </div> <!--end::Footer-->
        </form> <!--end::Form-->
    </div> <!--end::Quick Example--> <!--begin::Input Group-->
    <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-".$title_url ?>"><button class="btn btn-success">Danh sách</button></a>
    <a href="<?= BASE_URL_ADMIN . "/?act=form-them-".$title_url ?>"><button class="btn btn-success">Thêm</button></a>
    
</div>


<?php include './views/layout/footer.php' ?>
