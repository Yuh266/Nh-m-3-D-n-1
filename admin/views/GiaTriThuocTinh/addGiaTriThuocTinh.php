<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<div class="col-md-12"> <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <!-- <div class="card-title"> -->
            <!-- Hiển thị thông báo thêm thành công  -->
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Thêm thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-".$title_url ?>" class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])):?>
                <div class="alert alert-danger w-100" role="alert">
                    Thêm thất bại. 
                </div>
            <?php endif ?>
            <?php deleteAlertSession(); ?>
            <!-- </div> -->
        </div> <!--end::Header--> <!--begin::Form-->
        <form method="POST" action="<?= BASE_URL_ADMIN . "/?act=them-".$title_url ?>"  > <!--begin::Body-->
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-4 "> 
                        <label for="exampleInputEmail1" class="form-label">Danh mục sản phẩm</label> 
                        <select class="form-select" name="id_thuoc_tinh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <option value=""  hidden>Chọn thuộc tính sản phẩm</option>
                            <?php foreach($list_thuoc_tinh as $thuoc_tinh): ?>
                                <option value="<?=$thuoc_tinh['id']?>"><?=$thuoc_tinh['ten_thuoc_tinh'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3 col-md-8"> 
                        <label for="exampleInputEmail1" class="form-label">Tên trạng thái</label> 
                        <input value="<?= $_SESSION['gia_tri']['gia_tri']??"" ?>" name="gia_tri" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['gia_tri']??"" ?>
                        </div>
                    </div>
                </div>
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> 
                <button type="submit" class="btn btn-primary">Thêm</button> 
                <button type="reset" class="btn btn-primary">Nhập lại</button> 
            </div> <!--end::Footer-->
        </form> <!--end::Form-->

    </div> <!--end::Quick Example--> <!--begin::Input Group-->
    <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-".$title_url ?>"><button class="btn btn-success">Danh sách</button></a>

</div>



<?php include './views/layout/footer.php' ?>
