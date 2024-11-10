<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>
    
    <form id="form" method="POST" action="<?= BASE_URL_ADMIN . '/?act=xoa-slide-show'?>" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->

            <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                    <li class="nav-item active mx-2">
                        <a href="<?= BASE_URL_ADMIN . "/?act=form-them-slide-show" ?>"><button type="button" class="btn btn-success" >Thêm</button></a>
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
                <th>Tên ảnh</th>
                <th>Số thứ tự slide </th>
                <th>Thời gian tồn tại</th>
                <th>Link chuyển hướng</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </thead>
            <tbody class="">
                <?php foreach ($listSlideShow as $key => $value) : ?>
                    <tr 
                        <?php 
                            if (isset($_SESSION['id_active'])) {
                                if ($_SESSION['id_active']==$value['id']) {
                                        echo "class='table-success'" ;
                                }
                            }
                        ?> 
                    >
                        <td><input name="id[]" value="<?= $value['id'] ?>" type="checkbox" ></td>
                        <td><?= $value['ten_anh'] ?></td>
                        <td><?= $value['so_thu_tu'] ?></td>
                        <td><?= $value['thoi_gian_ton_tai'] ?></td>
                        <td><a class="delete_checked" href="<?= $value['link_chuyen_huong'] ?>" target="_blank" ><?= $value['link_chuyen_huong'] ?></a></td>
                        <td><img src="<?= BASE_URL . $value['link_anh'] ?>" width="100px" alt=""></td>
                        <td><?= $value['trang_thai'] == 1 ? "Kích hoạt" : "Vô hiệu" ?></td>
                        <td>
                            <a href="<?= BASE_URL_ADMIN . "/?act=form-sua-slide-show&id=".$value['id'] ?>"><button type="button" class="btn btn-warning" >Sửa</button></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?=BASE_URL_ADMIN."/?act=xoa-slide-show&id=".$value['id'] ?>">
                                Xóa
                            </button>
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
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </thead>
        </table>
        <!-- Thông báo xác nhận xóa  -->
         <!-- Button trigger modal -->
       
         <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->

            <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                    <li class="nav-item active mx-2">
                        <a href="<?= BASE_URL_ADMIN . "/?act=form-them-slide-show" ?>"><button type="button" class="btn btn-success" >Thêm</button></a>
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

    </form>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn sẽ không thể khôi phục lại nội dung đã xóa.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a href="#" id="modalLink" ><button  class="btn btn-primary" onclick="showToast()">Xác nhận xóa</button></a>
      </div>
    </div>
  </div>
</div>

</main>
    
<?php include './views/layout/footer.php' ?>
<!-- // Kiểm tra phát hiện thông báo đã xóa  -->
<?php if(isset($_SESSION["alert_delete_success"]) ):?>
    <script>showToast()</script>
    <?php unset($_SESSION["alert_delete_success"]); ?>
<?php endif ?>