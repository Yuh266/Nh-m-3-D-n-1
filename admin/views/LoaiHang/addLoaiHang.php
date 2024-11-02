<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>
</head>
<body>
    <form action="<?= BASE_URL_ADMIN.'?act=them-loai-hang' ?>" method="post">
        <input placeholder="ten_loai_hang" name="ten_loai_hang" type="text">
        <input placeholder="mo_ta" name="mo_ta" type="text">
        <button type="submit" >Thêm</button>
    </form>
</body>
</html>