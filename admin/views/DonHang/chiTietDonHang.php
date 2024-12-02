<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>

<div class="col-md-12">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <!-- Hiển thị thông báo nếu có -->
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Sửa thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-don-hang" ?>" class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])): ?>
                <div class="alert alert-danger w-100" role="alert">
                    Sửa thất bại.
                </div>
            <?php endif ?>
            <?php deleteAlertSession(); ?>
        </div>

        <!-- Hiển thị chi tiết đơn hàng -->
        <div class="card-body">
            <h5>Thông tin đơn hàng:</h5>
            <?php if ($donHang): ?>
                <p><strong>Tên khách hàng:</strong> <?= $donHang['ho_ten'] ?></p>
                <p><strong>Email:</strong> <?= $donHang['email'] ?></p>
                <p><strong>Địa Chỉ:</strong> <?= $donHang['dia_chi_nguoi_nhan'] ?></p>
                <p><strong>Số điện thoại:</strong> <?= $donHang['so_dien_thoai'] ?></p>
                <p><strong>Ngày đặt hàng:</strong> <?= date('d/m/Y', strtotime($donHang['ngay_dat'])) ?></p>
            <?php else: ?>
                <p>Không tìm thấy thông tin đơn hàng.</p>
            <?php endif; ?>
        </div>

        <!-- Form sửa trạng thái đơn hàng -->
        <form method="POST" action="<?= BASE_URL_ADMIN . "/?act=sua-chi-tiet-don-hang" ?>">
            <input type="hidden" name="id_don_hang" value="<?= $donHang['id_don_hang'] ?>">
            <input type="hidden" name="id_trang_thai" value="<?= $donHang['id_trang_thai'] ?>">

            <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label"><strong>Trạng thái đơn hàng:</strong></label>
                <select name="id_trang_thai" required>
                    <option value="1" <?= $donHang['id_trang_thai'] == 1 ? 'selected' : '' ?>>Chưa thanh toán</option>
                    <option value="2" <?= $donHang['id_trang_thai'] == 2 ? 'selected' : '' ?>>Đang chuẩn bị hàng</option>
                    <option value="3" <?= $donHang['id_trang_thai'] == 3 ? 'selected' : '' ?>>Đang giao hàng</option>
                    <option value="4" <?= $donHang['id_trang_thai'] == 4 ? 'selected' : '' ?>>Đã nhận hàng</option>
                    <option value="5" <?= $donHang['id_trang_thai'] == 5 ? 'selected' : '' ?>>Đã hủy</option>
                </select>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
            </div>
        </form>
    </div> 
</div>

<a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-don-hang" ?>"><button class="btn btn-success">Trang danh sách đơn hàng</button></a>

<?php include './views/layout/footer.php' ?>
