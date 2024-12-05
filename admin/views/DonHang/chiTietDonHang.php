<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>

<div class="col-md-12">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <!-- Hiển thị thông báo nếu có -->
            <?php if (isset($_SESSION['alert_success'])): ?>
                <div class="alert alert-success w-100" role="alert">
                    Thay đổi trạng thái thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-don-hang" ?>"
                        class="alert-link">Đi đến trang danh sách.</a>
                </div>
            <?php elseif (isset($_SESSION['alert_error'])): ?>
                <div class="alert alert-danger w-100" role="alert">
                    Thay đổi trạng thái thất bại.
                </div>
            <?php endif ?>
            <?php deleteAlertSession(); ?>
        </div>

        <!-- Hiển thị chi tiết đơn hàng -->
        <div class="card-body">
            <h2 class="text-center text-primary">Thông tin đơn hàng:</h2>
            <?php if (!empty($donHang)): ?>
                <?php
                // Lấy thông tin chung của đơn hàng từ sản phẩm đầu tiên
                $thongTinDonHang = $donHang[0];
                ?>
                <ul class="list-group">
                    <h5 class="text-primary">Đơn hàng: <?= $thongTinDonHang['id_don_hang'] ?></h5>
                    <li class="list-group-item mb-1"><strong>Người đặt hàng:</strong> <?= $thongTinDonHang['ho_ten'] ?></li>
                    <li class="list-group-item mb-1"><strong>Ngày đặt hàng:</strong>
                        <?= date('d/m/Y', strtotime($thongTinDonHang['ngay_dat'])) ?></li>
                    <li class="list-group-item mb-1"><strong>Hình thức thanh toán:</strong>
                        <?= $thongTinDonHang['hinh_thuc_thanh_toan'] ?></li>
                    <li class="list-group-item mb-1"><strong>Email:</strong> <?= $thongTinDonHang['email'] ?></li>
                    <li class="list-group-item mb-1"><strong>Số điện thoại:</strong>
                        <?= $thongTinDonHang['so_dien_thoai'] ?></li>
                </ul>
                <br>
                <ul class="list-group">
                    <h5 class="text-primary">Sản phẩm trong đơn hàng:</h5>
                    <?php 
                    $tongTien = 0; // Khởi tạo biến tổng tiền
                    foreach ($donHang as $sanPham): 
                        $tongTien += $sanPham['thanh_tien']; // Cộng dồn giá trị thanh_tien
                    ?>
                        <li class="list-group-item mb-1">
                            <img style="width: 100px;" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>">
                            <strong>Tên sản phẩm:</strong> <?= $sanPham['ten_san_pham'] ?>
                        </li>
                        <li class="list-group-item mb-1"><strong>Mô tả:</strong> <?= $sanPham['mo_ta'] ?></li>
                        <li class="list-group-item mb-1"><strong>Số lượng:</strong> <?= $sanPham['so_luong'] ?></li>
                        <li class="list-group-item mb-1 text-danger"><strong>Thành tiền:</strong> <?= number_format($sanPham['thanh_tien'], 0, ',', '.') . " vnđ" ?></li>
                    <?php endforeach; ?> 
                </ul>
                <br>
                <ul class="list-group">
                    <li class="list-group-item mb-1 text-success">
                        <strong>Tổng tiền:</strong> <?= number_format($tongTien, 0, ',', '.') . " vnđ" ?>
                    </li>
                </ul>

                <br>
                <ul class="list-group">
                    <h5 class="text-primary">Địa chỉ người nhận:</h5>
                    <li class="list-group-item mb-1"><strong>Người nhận:</strong> <?= $thongTinDonHang['ten_nguoi_nhan'] ?></li>
                    <li class="list-group-item mb-1"><strong>Số điện thoại người nhận: </strong><?= $thongTinDonHang['sdt_nguoi_nhan'] ?></li>
                    <li class="list-group-item mb-1"><strong>Địa chỉ người nhận:</strong> <?= $thongTinDonHang['dia_chi_nguoi_nhan'] ?></li>
                    <li class="list-group-item mb-1"><strong>Ghi chú:</strong> <?= $thongTinDonHang['ghi_chu'] ?></li>
                </ul> 
            <?php else: ?>
                <p>Không tìm thấy thông tin đơn hàng.</p>
            <?php endif; ?>

        </div>
        <!-- Form sửa trạng thái đơn hàng -->
        <form method="POST" action="<?= BASE_URL_ADMIN . "/?act=sua-chi-tiet-don-hang" ?>">
            <input type="hidden" name="id_don_hang" value="<?= $donHang1['id_don_hang'] ?>">
            <input type="hidden" name="id_trang_thai" value="<?= $donHang1['id_trang_thai'] ?>">
            <div class="mb-3 col-md-6">
                <ul>
                    <li class="list-group-item mb-1 text-danger">
                        <label><strong>Trạng thái đơn hàng:</strong></label>
                        <select name="id_trang_thai" required>
                            <option value="1" <?= $donHang1['id_trang_thai'] == 1 ? 'selected' : '' ?>>Chưa thanh toán
                            </option>
                            <option value="2" <?= $donHang1['id_trang_thai'] == 2 ? 'selected' : '' ?>>Đang chuẩn bị hàng
                            </option>
                            <option value="3" <?= $donHang1['id_trang_thai'] == 3 ? 'selected' : '' ?>>Đang giao hàng
                            </option>
                            <option value="4" <?= $donHang1['id_trang_thai'] == 4 ? 'selected' : '' ?>>Đã nhận hàng
                            </option>
                            <option value="5" <?= $donHang1['id_trang_thai'] == 5 ? 'selected' : '' ?>>Đã hủy</option>
                        </select>
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật trạng thái đơn hàng</button>
            </div>
        </form>
    </div>
</div>

<a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-don-hang" ?>"><button class="btn btn-success">Trang danh sách đơn
        hàng</button></a>

<?php include './views/layout/footer.php' ?>