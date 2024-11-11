    <?php include './views/layout/header.php' ?>

    <?php include './views/layout/navbar.php' ?>
    
        <form id="form" method="POST" action="<?= BASE_URL_ADMIN . '/?act=xoa-danh-muc'?>" >

            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->

                <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                        <li class="nav-item active mx-2">
                            <a href="<?= BASE_URL_ADMIN . "/?act=form-them-danh-muc" ?>"><button type="button" class="btn btn-success" >Thêm</button></a>
                        </li>
                        <li class="nav-item active mx-2">
                            <button onclick="chonTatCa()" type="button" class="btn btn-success" >Chọn tất cả</button>
                        </li>
                        <li class="nav-item active mx-2">
                            <button onclick="boChonTatCa()" type="button" class="btn btn-success" >Bỏ chọn tất cả</button>
                        </li>
                        <li class="nav-item active mx-2">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"  data-link="<?= 'deleteAll' ?>">
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
                    <th>Tên Danh Mục</th>
                    <th>Mô Tả</th>
                    <th>Thao Tác</th>
                </thead>
                <tbody class="">
                    <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                        <tr
                            <?php 
                                if (isset($_SESSION['id_active'])) {
                                    if ($_SESSION['id_active']==$danhMuc['id']) {
                                            echo "class='table-success'" ;
                                    }
                                }
                            ?>
                        >
                            <td><input name="id[]" value="<?= $danhMuc['id'] ?>" type="checkbox"></td>
                            <td><?= $key + 1 ?></td>
                            <td><?= $danhMuc['ten_danh_muc'] ?></td>
                            <td><?= $danhMuc['mo_ta'] ?></td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN . "/?act=form-sua-danh-muc&id_danh_muc=".$danhMuc['id'] ?>"><button type="button" class="btn btn-warning" >Sửa</button></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?= BASE_URL_ADMIN . "/?act=xoa-danh-muc&id_danh_muc=" . $danhMuc['id'] ?>">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <thead>
                    <th>#</th>
                    <th>STT</th>
                    <th>Tên Danh Mục</th>
                    <th>Mô Tả</th>
                    <th>Thao Tác</th>
                </thead>
            </table>
        
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                        <li class="nav-item active mx-2">
                            <a href="<?= BASE_URL_ADMIN . "/?act=form-them-danh-muc" ?>"><button type="button" class="btn btn-success" >Thêm</button></a>
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