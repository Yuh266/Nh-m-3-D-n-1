<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>
   

    <nav class="navbar my-2 navbar-expand-lg navbar-light bg-light ">
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->

        <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                <li class="nav-item active mx-2">
                    <a href=""><button class="btn btn-success" >Thêm</button></a>
                </li>
                <li class="nav-item active mx-2">
                    <a href=""><button class="btn btn-success" >Chọn tất cả</button></a>
                </li>
                <li class="nav-item active mx-2">
                    <a href=""><button class="btn btn-success" >Bỏ chọn tất cả</button></a>
                </li>
                <li class="nav-item active mx-2">
                    <a href=""><button class="btn btn-success" >Xóa các mục đã chọn</button></a>
                </li>
                
                
            </ul>
            <form class="form-inline d-flex">
                <input class="form-control mr-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                <button class="btn btn-outline-success w-50 mx-2" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </nav>

    <table class="table table-striped table-hover text-center">
        <thead>
            <th>#</th>
            <th>Tên ảnh</th>
            <th>Số thứ tự slide </th>
            <th>Thời gian tồn tại</th>
            <th>Link chuyển hướng</th>
            <th>Hình ảnh</th>
            <th>Chức năng</th>
        </thead>
        <tbody class="">
            <?php foreach ($listSlideShow as $key => $value) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value['ten_anh'] ?></td>
                    <td><?= $value['so_thu_tu'] ?></td>
                    <td><?= $value['thoi_gian_ton_tai'] ?></td>
                    <td><a href="<?= $value['link_chuyen_huong'] ?>" target="_blank" ><?= $value['link_chuyen_huong'] ?></a></td>
                    <td><img src="<?= BASE_URL . $value['link_anh'] ?>" width="100px" alt=""></td>
                    <td>
                        <a href="<?= BASE_URL_ADMIN . "?act=form-sua-slide-show&id=".$value['id'] ?>"><button class="btn btn-warning" >Sửa</button></a>
                        <a href="<?= BASE_URL_ADMIN . "?act=xoa-slide-show&id=".$value['id'] ?>"><button onclick="return confirm('Bạn chắc chứ') " class="btn btn-danger" >Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <thead>
        <th>#</th>
            <th>Tên ảnh</th>
            <th>Số thứ tự slide </th>
            <th>Thời gian tồn tại</th>
            <th>Link chuyển hướng</th>
            <th>Hình ảnh</th>
            <th>Chức năng</th>
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
                    <a href=""><button class="btn btn-success" >Thêm</button></a>
                </li>
                <li class="nav-item active mx-2">
                    <a href=""><button class="btn btn-success" >Chọn tất cả</button></a>
                </li>
                <li class="nav-item active mx-2">
                    <a href=""><button class="btn btn-success" >Bỏ chọn tất cả</button></a>
                </li>
                <li class="nav-item active mx-2">
                    <a href=""><button class="btn btn-success" >Xóa các mục đã chọn</button></a>
                </li>
                
                
            </ul>
            <form class="form-inline d-flex">
                <input class="form-control mr-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                <button class="btn btn-outline-success w-50 mx-2" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </nav>

</main>

<?php include './views/layout/footer.php' ?>