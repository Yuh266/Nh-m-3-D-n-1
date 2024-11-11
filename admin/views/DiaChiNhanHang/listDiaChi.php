<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>
    
    <form id="form" method="POST" action="<?= BASE_URL_ADMIN . '/?act=xoa-dia-chi-nhan-hang'?>" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                    <li class="nav-item active mx-2">
                        <a href="<?= BASE_URL_ADMIN . "/?act=form-them-dia-chi-nhan-hang" ?>"><button type="button" class="btn btn-success" >Thêm</button></a>
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
            
            </div>
        </nav>    

        <table class="table table-striped table-hover text-center">
            <thead>
                <th>#</th>
                <th>Id tài khảo</th>
                <th>Tên người nhận</th>
                <th>SĐT người nhận</th>
                <th>Địa chỉ người nhận</th>
                <th>Chức năng</th>
            </thead>
            <tbody class = "" >
                <?php foreach ($listDiaChi as $key => $value) : ?>
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
                        <td><?= $value['id_tai_khoan'] ?></td>
                        <td><?= $value['ten_nguoi_nhan'] ?></td>
                        <td><?= $value['sdt_nguoi_nhan'] ?></td>
                        <td><?= $value['dia_chi_nguoi_nhan'] ?></td>
                        <td>
                            <a href="<?= BASE_URL_ADMIN . "/?act=form-sua-dia-chi-nhan-hang&id=".$value['id'] ?>"><button type="button" class="btn btn-warning" >Sửa</button></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?=BASE_URL_ADMIN."/?act=xoa-dia-chi-nhan-hang&id=".$value['id'] ?>">
                                Xóa
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <thead>
                <th>#</th>
                <th>Id tài khảo</th>
                <th>Tên người nhận</th>
                <th>SĐT người nhận</th>
                <th>Địa chỉ người nhận</th>
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
                        <a href="<?= BASE_URL_ADMIN . "/?act=form-them-dia-chi-nhan-hang" ?>"><button type="button" class="btn btn-success" >Thêm</button></a>
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
                
            </div>
        </nav>    

    </form>


</main>
    
<?php include './views/layout/footer.php' ?>
<!-- // Kiểm tra phát hiện thông báo đã xóa  -->
<?php if(isset($_SESSION["alert_delete_success"]) ):?>
    <script>showToast()</script>
    <?php unset($_SESSION["alert_delete_success"]); ?>
<?php endif ?>