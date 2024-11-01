<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <h1>Danh sách sản phẩm</h1>
    <a href="./?act=form-them-san-pham">
        <button>Thêm sản phẩm</button>
    </a>
    <table border="1">
        <thead>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Giá khuyến mãi</th>
            <th>Số lượng</th>
            <th>Ngày nhập</th>
            <th>Tên danh mục</th>
            <th>Trạng thái</th>
        </thead>
        <tbody>
            <?php foreach($listProduct as $key=>$product): ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $product['ten_san_pham']; ?></td>
                    <td><img src="<?php echo $product['link_anh']; ?>" style="width: 100px;" alt=""></td>
                    <td><?php echo $product['gia']; ?></td>
                    <td><?php echo $product['gia_khuyen_mai']; ?></td>
                    <td><?php echo $product['so_luong']; ?></td>
                    <td><?php echo $product['ngay_nhap']; ?></td>
                    <td><?php echo $product['ten_danh_muc']; ?></td>
                    <td><?php echo $product['trang_thai']; ?></td>
                    <td>
                        <a href="./?act=form-sua-san=pham&id=<?= $product['id'] ?>"><button>Sửa</button></a>
                        <a href="./?act=xoa-san=pham"><button>Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>