<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<main>
    <form action="<?= BASE_URL_ADMIN.'?act=them-loai-hang' ?>" method="post">
        <input placeholder="ten_loai_hang" name="ten_loai_hang" type="text">
        <input placeholder="mo_ta" name="mo_ta" type="text">
        <button type="submit" >Thêm</button>
    </form>
</main>

<?php include './views/layout/footer.php' ?>
