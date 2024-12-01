<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<main class="mt-4" >

    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Số lượng đánh giá</th>
                <th>TB đánh giá</th>
                <th>Cũ nhất</th>
                <th>Mới nhất</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody >
            <?php foreach ($listDanhGia as $key => $danhGia) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $danhGia['ten_san_pham'] ?></td>
                    <td><?= $danhGia['so_luong'] ?></td>
                    <td><?= number_format($danhGia['trung_binh_danh_gia']) ?> <i style=" color: yellow ; " class="fa-solid fa-star"></i> </td>
                    <td><?= $danhGia['ngay_cu_nhat'] ?></td>
                    <td><?= $danhGia['ngay_moi_nhat'] ?></td>
                    <td>
                        <a class="btn btn-success" href="<?= BASE_URL_ADMIN . "?act=danh-sach-danh-gia-chi-tiet&id=".$danhGia['id_san_pham'] ?>" > Xem chi tiết </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
 
</main>
  
<?php include './views/layout/footer.php' ?>
<!-- // Kiểm tra phát hiện thông báo đã xóa  -->
<?php if(isset($_SESSION["alert_delete_success"]) ):?>
    <script>showToast()</script>
    <?php unset($_SESSION["alert_delete_success"]); ?>
<?php endif ?>
