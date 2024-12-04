<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<main class="mt-4" >

    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Số lượng bình luận</th>
                <th>Cũ nhất</th>
                <th>Mới nhất</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody >
            <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $binhLuan['ten_san_pham'] ?></td>
                    <td><?= $binhLuan['so_luong'] ?></td>             
                    <td><?= (new DateTime($binhLuan['ngay_cu_nhat']))->format('d/m/Y')?></td>
                    <td><?= (new DateTime($binhLuan['ngay_moi_nhat']))->format('d/m/Y') ?></td>
                    <td>
                        <a class="btn btn-success" href="<?= BASE_URL_ADMIN . "?act=danh-sach-binh-luan-chi-tiet&id=".$binhLuan['id_san_pham'] ?>"> Xem chi tiết </a>
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
