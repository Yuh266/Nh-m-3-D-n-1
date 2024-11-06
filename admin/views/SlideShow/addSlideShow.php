<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<div class="col-md-12"> <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <div class="card-title"></div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . "/?act=them-slide-show" ?>"  > <!--begin::Body-->
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6 "> 
                        <label for="exampleInputEmail1" class="form-label">Tên ảnh</label> 
                        <input value="<?= $_SESSION['slide_show']['ten_anh']??"" ?>" name="ten_anh" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                            <?= $_SESSION['error']['ten_anh']??"" ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Số thứ tự</label> 
                        <input value="<?= $_SESSION['slide_show']['so_thu_tu']??"" ?>" name="so_thu_tu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                            <?= $_SESSION['error']['so_thu_tu']??"" ?>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Thời gian tồn tại</label> 
                        <input value="<?= $_SESSION['slide_show']['thoi_gian_ton_tai']??"" ?>" name="thoi_gian_ton_tai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                            
                        </div>
                    </div>
                    <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Link chuyển hướng</label> 
                        <input value="<?= $_SESSION['slide_show']['link_chuyen_huong']??"" ?>" name="link_chuyen_huong" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                            <?= $_SESSION['error']['link_chuyen_huong']??"" ?>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3 col-md-6"> 
                    <input name="file_anh" type="file" class="form-control" id="inputGroupFile02"> 
                    <label class="input-group-text" for="inputGroupFile02">Ảnh</label> 
                </div>
                
                <!-- <div class="mb-3 form-check"> <input type="checkbox" class="form-check-input" id="exampleCheck1"> <label class="form-check-label" for="exampleCheck1">Check me out</label> </div> -->
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> <button type="submit" class="btn btn-primary">Thêm</button> </div> <!--end::Footer-->
        </form> <!--end::Form-->

    </div> <!--end::Quick Example--> <!--begin::Input Group-->
    <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-slide-show" ?>"><button class="btn btn-success">Trang danh sách</button></a>

</div>



<?php include './views/layout/footer.php' ?>
