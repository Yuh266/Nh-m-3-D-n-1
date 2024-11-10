<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<div class="col-md-12"> <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <div class="card-title"></div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . "/?act=them-danh-muc" ?>"  > <!--begin::Body-->
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-12 "> 
                        <label for="exampleInputEmail1" class="form-label">Tên danh mục</label> 
                        <input name="ten_danh_muc" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục">
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['ten_danh_muc'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['ten_danh_muc'] ?></p>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-12 "> 
                        <label for="exampleInputEmail1" class="form-label">Mô tả</label> 
                        <textarea name="mo_ta" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả"></textarea>
                    </div>
                    
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> 
                <button type="submit" class="btn btn-primary">Thêm</button> 
                <button type="reset" class="btn btn-primary">Nhập lại</button> 
            </div> <!--end::Footer-->
        </form> <!--end::Form-->

    </div> <!--end::Quick Example--> <!--begin::Input Group-->
    

</div>
<div><a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-danh-muc" ?>"><button class="btn btn-success">Trang danh sách</button></a></div>



<?php include './views/layout/footer.php' ?>
