<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>
    
<form id="form" method="POST" action="<?= BASE_URL_ADMIN . '/?act=xoa-tai-khoan'?>">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active mx-2">
                    <a href="<?= BASE_URL_ADMIN . "/?act=form-them-tai-khoan" ?>"><button type="button" class="btn btn-success">Thêm</button></a>
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
                <th>STT</th>
                <th>Họ tên</th>
                <th>Ảnh đại diện</th>
                <th>Số điện thoại</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Chức vụ</th>
                <th>Mật khẩu</th>
                <th>Trạng thái</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listTaiKhoan as $key => $taiKhoan) : ?>
                <tr>
                    <td><input name="id[]" type="checkbox" value="<?= $taiKhoan['id'] ?>"></td>
                    <td><?= $key + 1 ?></td>
                    <td><?= $taiKhoan['ho_ten'] ?></td>
                    <td><img src="<?= BASE_URL . $taiKhoan['anh_dai_dien'] ?>" width="100px" alt=""></td>
                    <td><?= $taiKhoan['so_dien_thoai'] ?></td>
                    <td><?= $taiKhoan['gioi_tinh'] == 1 ? "Nam" : ($taiKhoan['gioi_tinh'] == 0 ? "Nữ" : "Khác")?></td>
                    <td><?= $taiKhoan['email'] ?></td>
                    <td><?= $taiKhoan['chuc_vu'] == 1 ? "Admin" : "Thành viên" ?></td>
                    <td><?= $taiKhoan['mat_khau'] ?></td>
                    <td><?= $taiKhoan['trang_thai'] == 1 ? "Kích hoạt" : "Vô hiệu" ?></td>
                    <td><?= $taiKhoan['ngay_sinh'] ?></td>
                    <td><?= $taiKhoan['dia_chi'] ?></td>
                    <td>
                        <a href="<?= BASE_URL_ADMIN . "/?act=form-sua-tai-khoan&id=" . $taiKhoan['id'] ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?= BASE_URL_ADMIN . "/?act=xoa-tai-khoan&id=" . $taiKhoan['id'] ?>">Xóa</button>
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
                    <a href="<?= BASE_URL_ADMIN . "/?act=form-them-tai-khoan" ?>"><button type="button" class="btn btn-success">Thêm</button></a>
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
