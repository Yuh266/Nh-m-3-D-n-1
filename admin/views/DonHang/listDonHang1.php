<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<form id="form" method="POST" action="<?= BASE_URL_ADMIN . "/?act=xoa-danh-sach-don-hang" ?>">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                <li class="nav-item active mx-2">
                    <button onclick="chonTatCa()" type="button" class="btn btn-success">Chọn tất cả</button>
                </li>
                <li class="nav-item active mx-2">
                    <button onclick="boChonTatCa()" type="button" class="btn btn-success">Bỏ chọn tất cả</button>
                </li>
                <li class="nav-item active mx-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"
                        data-link="<?= 'deleteAll' ?>">
                        Xóa các mục đã chọn
                    </button>
                </li>
            </ul>

        </div>
    </nav>

    <table class="table table-striped table-hover text-center">
        <thead>
            <th>#</th>
            <th>Trạng Thái</th>
            <th>Họ và Tên</th>
            <th>Tổng tiền</th>
            <th>Email</th>
            <th>Ngày đặt</th>
            <th>Chức năng</th>
        </thead>
        <tbody>
            <?php if (!empty($listDonHang)): ?>
                <?php foreach ($listDonHang as $key => $donHang): ?>
                    <tr <?php
                    if (isset($_SESSION['id_active'])) {
                        if ($_SESSION['id_active'] == $donHang['id_don_hang']) {
                            echo "class='table-success'";
                        }
                    }
                    ?>>
                        <td><input name="id[]" value="<?= $donHang['id_don_hang'] ?>" type="checkbox"></td>
                        <td><?= $donHang['ten_trang_thai'] ?></td>
                        <td><?= $donHang['ho_ten'] ?></td>
                        <td class="text-danger"><?= number_format($donHang['tong_tien'], 0, ',', '.') . " vnđ" ?></td>
                        <td><?= $donHang['email'] ?></td>
                        <td><?= date('d/m/Y', strtotime($donHang['ngay_dat'])) ?></td>
                        <td>
                            <a href="<?= BASE_URL_ADMIN . "/?act=chi-tiet-don-hang&id=" . $donHang['id_don_hang'] ?>"><button
                                    type="button" class="btn btn-success">Chi tiết</button></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal"
                                data-link="<?= BASE_URL_ADMIN . "/?act=xoa-danh-sach-don-hang&id=" . $donHang['id_don_hang'] ?>">
                                Xóa
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Không có đơn hàng nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <!-- Thông báo xác nhận xóa  -->
    <!-- Button trigger modal -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                <li class="nav-item active mx-2">
                    <button onclick="chonTatCa()" type="button" class="btn btn-success">Chọn tất cả</button>
                </li>
                <li class="nav-item active mx-2">
                    <button onclick="boChonTatCa()" type="button" class="btn btn-success">Bỏ chọn tất cả</button>
                </li>
                <li class="nav-item active mx-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"
                        data-link="<?= 'deleteAll' ?>">
                        Xóa các mục đã chọn
                    </button>
                </li>
            </ul>

        </div>
    </nav>


</form>


</main>

<?php include './views/layout/footer.php' ?>
<!-- // Kiểm tra phát hiện thông báo đã xóa  -->
<?php if (isset($_SESSION["alert_delete_success"])): ?>
    <script>showToast()</script>
    <?php unset($_SESSION["alert_delete_success"]); ?>
<?php endif ?>