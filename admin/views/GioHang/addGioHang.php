<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>

<div class="col-md-12">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Thêm thành công. <a href="<?= BASE_URL_ADMIN . "/?act=gio-hang" ?>" class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])): ?>
                <div class="alert alert-danger w-100" role="alert">
                    Thêm thất bại.
                </div>
            <?php endif ?>
            <?php deleteAlertSession(); ?>
        </div>
        
        <form method="POST"  action="<?= BASE_URL_ADMIN . "/?act=them-gio-hang" ?>">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Id Tài Khoản</label>
                        <select name="id_tai_khoan" class="form-select" id="validationCustom04" >
                            <option name="id_tai_khoan" value="">Chọn...</option>
                            <?php foreach ($listTaiKhoan as $key => $TaiKhoan):?>
                                <option value="<?= $TaiKhoan['id'] ?>"><?= "id: ".$TaiKhoan['id'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="form-text text-danger">
                            <?= $_SESSION['error']['id_tai_khoan']??"" ?>
                        </div>
               </div>
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