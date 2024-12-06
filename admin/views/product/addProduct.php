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
        <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . "/?act=them-san-pham" ?>"  > <!--begin::Body-->
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-4 "> 
                        <label for="ten_san_pham" class="form-label">Tên sản phẩm</label> 
                        <input value="<?= $_SESSION['san_pham']['ten_san_pham'] ??'' ?>" name="ten_san_pham" type="text" class="form-control" id="ten_san_pham" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['ten_san_pham'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                          <?php } ?>
                        </div>
                    </div>

                    <div class="mb-3 col-md-4 "> 
                        <label for="exampleInputEmail1" class="form-label">Giá gốc</label> 
                        <input value="<?= $_SESSION['san_pham']['gia_san_pham'] ?? '' ?>" name="gia_san_pham" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập giá phẩm">
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['gia_san_pham'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
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
                        <label>Album ảnh</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="img_array[]" multiple>
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
                        <label for="exampleInputEmail1" class="form-label">Ngày nhập</label> 
                        <input value="<?= $_SESSION['san_pham']['ngay_nhap'] ??'' ?>" name="ngay_nhap" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ngày nhập sản phẩm">
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['ngay_nhap'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                          <?php } ?>
                        </div>
                    </div>

                    <div class="mb-3 col-md-4 "> 
                        <label for="exampleInputEmail1" class="form-label">Danh mục sản phẩm</label> 
                        <select class="form-select" name="id_danh_muc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <option value=""  hidden>Chọn danh mục sản phẩm</option>
                            <?php foreach($listDanhMuc as $danhMuc): ?>
                                <option <?=isset($_SESSION['san_pham']['id_danh_muc'])?($danhMuc['id']==$_SESSION['san_pham']['id_danh_muc']?"selected":""):"" ?> value="<?=$danhMuc['id'] ?>"><?=$danhMuc['ten_danh_muc'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['id_danh_muc'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['id_danh_muc'] ?></p>
                          <?php } ?>
                        </div>
                    </div>

                    <div class="mb-3 col-md-4 "> 
                        <label for="exampleInputEmail1" class="form-label">Trạng thái</label> 
                        <select class="form-select" value="<?= $_SESSION['san_pham']['trang_thai'] ??'' ?>" name="trang_thai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <option value="" hidden>Chọn trạng thái sản phẩm</option>
                            <option <?= isset($_SESSION['san_pham']['trang_thai']) && $_SESSION['san_pham']['trang_thai'] == "1" ? "selected" : "" ?> value="1">Còn bán</option>
                            <option <?= isset($_SESSION['san_pham']['trang_thai']) && $_SESSION['san_pham']['trang_thai'] == "2" ? "selected" : "" ?> value="2">Dừng bán</option>
                        </select>
                        <div id="emailHelp" class="form-text">
                          <?php if(isset($_SESSION['error']['trang_thai'])){ ?>
                            <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                          <?php } ?>
                        </div>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                        <textarea name="mo_ta" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả"><?= htmlspecialchars($_SESSION['san_pham']['mo_ta'] ?? ($_POST['mo_ta'] ?? '')) ?></textarea>
                        <?php if (isset($_SESSION['mo_ta'])) { ?>
                            <p class="text-danger"><?= isset($_SESSION['mo_ta']) ?></p>
                        <?php } ?>
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
