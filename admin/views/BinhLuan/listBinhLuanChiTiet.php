<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<form id="form" method="POST" action="<?= BASE_URL_ADMIN . '/?act=xoa-binh-luan&id_san_pham='.$_GET['id']?>">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <li class="nav-item active mx-2">
                 
                    <a class="btn btn-success"  href="<?=BASE_URL_ADMIN . "/?act=danh-sach-binh-luan"?>">Danh sách bình luận</a>
                </li>
                <li class="nav-item active mx-2">
                    <button type="button" class="btn btn-success" onclick="chonTatCa()">Chọn tất cả</button>
                </li>
                <li class="nav-item active mx-2">
                    <button type="button" class="btn btn-success" onclick="boChonTatCa()">Bỏ chọn tất cả</button>
                </li>
                
                <li class="nav-item active mx-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?= 'deleteAll'?>">Xóa các mục đã chọn</button>
                </li>
            </ul>
        </div>
    </nav>    
  
    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <th>Người bình luận</th>
                <th>Thao tác</th>
               
            </tr>
        </thead>
        <tbody >
            <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                <tr 
                <?php 
                            if (isset($_SESSION['id_active'])) {
                                if ($_SESSION['id_active']==$binhLuan['id']) {
                                        echo "class='table-success'";
                                }
                            }
                        ?> 
            >
                
                    <td><input name="id[]" value="<?= $binhLuan['id'] ?>" type="checkbox"></td>
                    <td><?= $binhLuan['noi_dung'] ?></td>
                    <td><?= (new DateTime($binhLuan['ngay_dang']))->format('d/m/Y') ?></td>
                    <td><?= $binhLuan['ho_ten'] ?></td>
                    <td>
                            
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?= BASE_URL_ADMIN . "?act=xoa-binh-luan&id=".$binhLuan['id']."&id_san_pham=".$_GET['id'] ?>">Xóa</button>
                    </td>
                  
                                        </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active mx-2">
                 
                 <a class="btn btn-success"  href="<?=BASE_URL_ADMIN . "/?act=danh-sach-binh-luan"?>">Danh sách bình luận</a>
             </li>
                <li class="nav-item active mx-2">
                    <button type="button" class="btn btn-success" onclick="chonTatCa()">Chọn tất cả</button>
                </li>
                <li class="nav-item active mx-2">
                    <button type="button" class="btn btn-success" onclick="boChonTatCa()">Bỏ chọn tất cả</button>
                </li>
                <li class="nav-item active mx-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?= 'deleteAll' ?>">Xóa các mục đã chọn</button>
                </li>
            </ul>
        </div>
    </nav>    
</form>

<!-- Modal Xác Nhận Xóa -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn sẽ không thể khôi phục lại nội dung đã xóa.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <a href="#" id="modalLink"><button type="button" class="btn btn-primary" onclick="showToast()">Xác nhận xóa</button></a>
            </div>
        </div>
    </div>
</div>


<?php include './views/layout/footer.php' ?>
<!-- // Kiểm tra phát hiện thông báo đã xóa  -->
<?php if(isset($_SESSION["alert_delete_success"]) ):?>
    <script>showToast()</script>
    <?php unset($_SESSION["alert_delete_success"]); ?>
<?php endif ?>
