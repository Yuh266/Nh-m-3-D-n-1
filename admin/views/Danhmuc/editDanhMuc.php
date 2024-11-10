<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<div class="col-md-12"> <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <!-- Hiển thị thông báo sửa thành công  -->
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Sửa thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-danh-muc" ?>" class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])):?>
                <div class="alert alert-danger w-100" role="alert">
                    Sửa thất bại. 
                </div>
            <?php endif ?>
            <div class="card-title"></div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . "/?act=sua-danh-muc" ?>"  > <!--begin::Body-->
            <div class="card-body">
                <input type="text" name="id" value="<?= $danhMuc['id'] ?>" hidden >
                <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <input value="<?= isset($_SESSION['danh_muc']) ? $_SESSION['danh_muc']['ten_danh_muc'] : $danhMuc['ten_danh_muc'] ?>" name="ten_danh_muc" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">
                        <p class="text-danger"><?= $_SESSION['error']['ten_danh_muc'] ?? "" ?></p>
                    </div>
                </div>

                <div class="mb-3 col-md-12">
                    <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                    <textarea name="mo_ta" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả"><?= isset($_SESSION['danh_muc']) ? $_SESSION['danh_muc']['mo_ta'] : $danhMuc['mo_ta'] ?></textarea>
                </div>
                </div>

            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> 
                <button type="submit" class="btn btn-primary">Sửa</button> 
                <button type="reset" class="btn btn-primary">Nhập lại</button> 
            </div> <!--end::Footer-->
        </form> <!--end::Form-->
    </div> <!--end::Quick Example--> <!--begin::Input Group-->
    <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-danh-muc" ?>"><button class="btn btn-success">Trang danh sách</button></a>
    <a href="<?= BASE_URL_ADMIN . "/?act=form-them-danh-muc" ?>"><button class="btn btn-success">Thêm danh mục</button></a>
</div>


<?php include './views/layout/footer.php' ?>