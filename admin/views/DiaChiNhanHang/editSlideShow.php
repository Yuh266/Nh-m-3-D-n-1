<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<div class="col-md-12"> <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <!-- Hiển thị thông báo thêm thành công  -->
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Sửa thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-slide-show" ?>" class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])):?>
                <div class="alert alert-danger w-100" role="alert">
                    Sửa thất bại. 
                </div>
            <?php endif ?>
        </div> <!--end::Header--> <!--begin::Form-->
        <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . "/?act=sua-slide-show" ?>"  > <!--begin::Body-->
            <div class="card-body">
                
                <input type="text" name="id" value="<?= $_SESSION['slide_show']['id']??"" ?>" hidden >
                <input type="text" name="old_image" value="<?= $_SESSION['slide_show']['link_anh']??"" ?>" hidden >
                <div class="row">
                    <div class="mb-3 col-md-6 "> 
                        <label for="exampleInputEmail1" class="form-label">Tên ảnh</label> 
                        <input value="<?= $_SESSION['slide_show']['ten_anh']??"" ?>" name="ten_anh" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['ten_anh']??"" ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Số thứ tự</label> 
                        <input value="<?= $_SESSION['slide_show']['so_thu_tu']??"" ?>" name="so_thu_tu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['so_thu_tu']??"" ?>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Thời gian tồn tại</label> 
                        <input value="<?= $_SESSION['slide_show']['thoi_gian_ton_tai']??"" ?>" name="thoi_gian_ton_tai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['thoi_gian_ton_tai']??"" ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Link chuyển hướng</label> 
                        <input value="<?= $_SESSION['slide_show']['link_chuyen_huong']??"" ?>" name="link_chuyen_huong" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['error']['link_chuyen_huong']??"" ?>
                        </div>
                    </div>
                </div>
                <div class=" d-flex">
                    <label for="">Trạng thái :</label>
                    <div class="form-check mx-3 mb-3 ">
                        <input class="form-check-input" <?= isset($_SESSION['slide_show']['trang_thai'])?($_SESSION['slide_show']['trang_thai']==1?"checked":""):"" ?> type="radio" name="trang_thai" value="1" > 
                        <label class="form-check-label" for="gridRadios1">Kích hoạt</label> 
                    </div>
                    <div class="form-check mx-3 mb-3 ">
                        <input class="form-check-input" <?= isset($_SESSION['slide_show']['trang_thai'])?($_SESSION['slide_show']['trang_thai']==0?"checked":""):"" ?> type="radio" name="trang_thai" value="0" > 
                        <label class="form-check-label" for="gridRadios1">Vô hiệu</label> 
                    </div>
                    <div id="emailHelp" class="form-text text-danger">
                        <?= $_SESSION['error']['trang_thai']??"" ?>
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
    <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-slide-show" ?>"><button class="btn btn-success">Danh sách</button></a>
    <a href="<?= BASE_URL_ADMIN . "/?act=form-them-slide-show" ?>"><button class="btn btn-success">Thêm</button></a>
    
</div>


<?php include './views/layout/footer.php' ?>
