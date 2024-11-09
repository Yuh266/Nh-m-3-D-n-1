<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>
   
    <form method="POST" action="<?= BASE_URL_ADMIN . '/?act=xoa-san-pham'?>" >

        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->

            <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                    <li class="nav-item active mx-2">
                        <a href="<?= BASE_URL_ADMIN . "/?act=form-them-san-pham" ?>"><button type="button" class="btn btn-success" >Thêm</button></a>
                    </li>
                    <li class="nav-item active mx-2">
                        <button onclick="chonTatCa()" type="button" class="btn btn-success" >Chọn tất cả</button>
                    </li>
                    <li class="nav-item active mx-2">
                        <button onclick="boChonTatCa()" type="button" class="btn btn-success" >Bỏ chọn tất cả</button>
                    </li>
                    <li class="nav-item active mx-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?= 'deleteAll' ?>">
                            Xóa các mục đã chọn 
                        </button>
                    </li>
                </ul>
                <!-- <div class="form-inline d-flex">
                    <input class="form-control mr-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                    <button class="btn btn-outline-success w-50 mx-2" type="submit">Tìm kiếm</button>
                </div> -->
            </div>
        </nav>    

        <table class="table table-striped table-hover text-center">
            <thead>
                <th>#</th>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Ảnh Sản Phẩm</th>
                <th>Giá Sản Phẩm</th>
                <!-- <th>Giá Khuyến Mãi</th> -->
                <th>Số Lượng</th>
                <!-- <th>Ngày Nhập</th> -->
                <th>Danh Mục</th>
                <th>Trạng Thái</th>
                <!-- <th>Mô Tả</th> -->
                <th>Thao Tác</th>
            </thead>
            <tbody class="">
                <?php foreach ($listProduct as $key => $product) : ?>
                    <tr>
                        <td><input name="id[]" product="<?= $product['id'] ?>" type="checkbox" ></td>
                        <td><?= $key + 1 ?></td>
                        <td><?= $product['ten_san_pham'] ?></td>
                        <td><img src="<?= BASE_URL . $product['hinh_anh'] ?>" style="width: 100px" alt=""
                        onerror="this.onerror=null; this.src='' "></td>
                        <td><?= $product['gia_san_pham'] ?></td>
                        <td><?= $product['so_luong'] ?></td>
                        <td><?= $product['ten_danh_muc'] ?></td>
                        <td><?= $product['trang_thai'] == 1 ? 'Còn Bán' : 'Dừng Bán' ?></td>
                        <td>
                            <a href="<?= BASE_URL_ADMIN . "/?act=form-sua-san-pham&id_danh_muc=".$product['id'] ?>"><button type="button" class="btn btn-warning" >Sửa</button></a>
                            <a href="<?= BASE_URL_ADMIN . "/?act=xoa-san-pham&id_danh_muc=".$product['id'] ?>"><button type="button" onclick="return confirm('Bạn chắc chứ') " class="btn btn-danger" >Xóa</button></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <thead>
            <th>#</th>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Ảnh Sản Phẩm</th>
                <th>Giá Sản Phẩm</th>
                <!-- <th>Giá Khuyến Mãi</th> -->
                <th>Số Lượng</th>
                <!-- <th>Ngày Nhập</th> -->
                <th>Danh Mục</th>
                <th>Trạng Thái</th>
                <!-- <th>Mô Tả</th> -->
                <th>Thao Tác</th>
            </thead>
        </table>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->

            <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                    <li class="nav-item active mx-2">
                        <a href="<?= BASE_URL_ADMIN . "/?act=form-them-san-pham" ?>"><button type="button" class="btn btn-success" >Thêm</button></a>
                    </li>
                    <li class="nav-item active mx-2">
                        <a href=""><button type="button" class="btn btn-success" >Chọn tất cả</button></a>
                    </li>
                    <li class="nav-item active mx-2">
                        <a href=""><button type="button" class="btn btn-success" >Bỏ chọn tất cả</button></a>
                    </li>
                    <li class="nav-item active mx-2">
                        <a href=""><button type="button" class="btn btn-success" >Xóa các mục đã chọn</button></a>
                    </li>
                    
                    
                </ul>
                <!-- <div class="form-inline d-flex">
                    <input class="form-control mr-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                    <button class="btn btn-outline-success w-50 mx-2" type="submit">Tìm kiếm</button>
                </div> -->
            </div>
        </nav>

    </form>

</main>
    
<?php include './views/layout/footer.php' ?>