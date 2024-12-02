<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>




<table class="table table-striped table-hover text-center">
    <thead>
        <tr>

            <th>STT</th>
            <th>Tên Tài Khoản</th>
            <th>Thao tác</th>


        </tr>
    </thead>
    <tbody>
        <?php foreach ($listGioHang as $key => $gioHang) : ?>
            <tr
                <?php
                if (isset($_SESSION['id_active'])) {
                    if ($_SESSION['id_active'] == $gioHang['id']) {
                        echo "class='table-success'";
                    }
                }
                ?>>

                <td><?= $key + 1 ?></td>
                <td><?= $gioHang['ho_ten'] ?></td>
                <td>

                    <a class="btn btn-success"
                        href="<?= BASE_URL_ADMIN . "?act=danh-sach-gio-hang-chi-tiet&id=" . $gioHang['id_tai_khoan'] ?>">

                        Xem chi tiết
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>






<?php include './views/layout/footer.php' ?>
<!-- // Kiểm tra phát hiện thông báo đã xóa  -->
<?php if (isset($_SESSION["alert_delete_success"])): ?>
    <script>
        showToast()
    </script>
    <?php unset($_SESSION["alert_delete_success"]); ?>
<?php endif ?>