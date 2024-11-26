<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<div class="col-md-12"> <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
        <div class="card-header">
            <!-- Hiển thị thông báo thêm thành công  -->
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Thêm thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-san-pham" ?>" class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])):?>
                <div class="alert alert-danger w-100" role="alert">
                    Thêm thất bại. 
                </div>
            <?php endif ?>
            <?php deleteAlertSession(); ?>
            <div class="card-title"></div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . "/?act=them-san-pham-bien-the" ?>"  > <!--begin::Body-->
            <div class="card-body">
                <div class="row">
                  <input type="text" name="id_san_pham" value="<?= $_GET['id_san_pham'] ?>" hidden >
                    <div class="mb-3 col-md-4 "> 
                        <label for="exampleInputEmail1" class="form-label">Giá sản phẩm</label> 
                        <input value="<?= $_SESSION['san_pham']['gia'] ?? '' ?>" name="gia" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập giá phẩm">
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['gia'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['gia'] ?></p>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 "> 
                        <label for="exampleInputEmail1" class="form-label">Giá khuyến mãi</label> 
                        <input value="<?= $_SESSION['san_pham']['gia_khuyen_mai'] ?? '' ?>" name="gia_khuyen_mai" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập giá khuyến mãi">
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['gia_khuyen_mai'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                          <?php } ?>
                        </div>
                    </div>

                    <div class="mb-3 col-md-4 "> 
                        <label for="exampleInputEmail1" class="form-label">Hình ảnh</label> 
                        <input value="<?= $_SESSION['san_pham']['hinh_anh'] ?? '' ?>" name="hinh_anh" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['hinh_anh'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 "> 
                        <label for="exampleInputEmail1" class="form-label">Số lượng</label> 
                        <input value="<?= $_SESSION['san_pham']['so_luong'] ?? '' ?>" name="so_luong" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số lượng sản phẩm">
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['so_luong'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 "> 
                        <label for="exampleInputEmail1" class="form-label">Giá trị thuộc tính</label> 
                        <select class="form-select" name="id_gia_tri_thuoc_tinh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <option value=""  hidden>Chọn giá trị thuộc tính</option>
                            <?php foreach($list_gia_tri_thuoc_tinh as $gia_tri_thuoc_tinh): ?>
                                <option <?=isset($_SESSION['san_pham']['id_gia_tri_thuoc_tinh'])?($gia_tri_thuoc_tinh['id']==$_SESSION['san_pham']['id_gia_tri_thuoc_tinh']?"selected":""):"" ?> value="<?=$gia_tri_thuoc_tinh['id'] ?>"><?=$gia_tri_thuoc_tinh['gia_tri'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['id_gia_tri_thuoc_tinh'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['id_gia_tri_thuoc_tinh'] ?></p>
                          <?php } ?>
                        </div>
                    </div>
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> 
                <button type="submit" class="btn btn-primary">Thêm</button> 
                <button type="reset" class="btn btn-primary">Nhập lại</button> 
            </div> <!--end::Footer-->
        </form> <!--end::Form-->

    </div> <!--end::Quick Example--> <!--begin::Input Group-->
    

</div>
<div><a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-san-pham" ?>"><button class="btn btn-success">Trang danh sách</button></a></div>



<?php include './views/layout/footer.php' ?>
