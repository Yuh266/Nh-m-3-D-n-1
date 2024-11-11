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

 
 
 
 <!--begin::Sidebar-->
 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> 
                <a href="./index.html" class="brand-link"> 
                <!--begin::Brand Image--> 
                <img src="https://img-cache.coccoc.com/image2?i=1&l=34/1086683026" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> 
                <!--end::Brand Image--> 
                <!--begin::Brand Text--> 
                <span class="brand-text fw-light">Okkk</span> 
                <!--end::Brand Text--> </a> <!--end::Brand Link--> 
            </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->

                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN ?>" class="nav-link <?= (!isset($_GET['act'])) ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-speedometer2"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- Quản trị danh mục -->
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-danh-muc' ?>" 
                        class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-danh-muc', 'them-danh-muc', 'sua-danh-muc'])) ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-list-check"></i>
                            <p>Quản trị danh mục</p>
                        </a>
                    </li>
                    <!-- Quản trị tài khoản  -->
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-tai-khoan' ?>" 
                        class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-tai-khoan', 'them-tai-khoan', 'sua-tai-khoan'])) ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-list-check"></i>
                            <p>Quản trị tài khoản</p>
                        </a>
                    </li>
                    <!-- Quản trị sản phẩm -->
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-san-pham' ?>" 
                        class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-san-pham', 'them-san-pham', 'sua-san-pham'])) ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-box-seam"></i>
                            <p>Quản trị sản phẩm</p>
                        </a>
                    </li>

                    <!-- Quản trị slide shows -->
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-slide-show' ?>" 
                        class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-slide-show', 'them-slide-show', 'sua-slide-show'])) ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-images"></i>
                            <p>Quản trị slide shows</p>
                        </a>
                    </li>

                    <!-- Quản trị đơn hàng -->
                    <li class="nav-item <?= (isset($_GET['act']) && (strpos($_GET['act'], 'don-hang') !== false || strpos($_GET['act'], 'dia-chi-nhan-hang') !== false)) ? 'menu-open' : '' ?>">
                        <a href="#" 
                        class="nav-link <?= (isset($_GET['act']) && (strpos($_GET['act'], 'don-hang') !== false || strpos($_GET['act'], 'dia-chi-nhan-hang') !== false)) ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-cart-check"></i>
                            <p>
                                Quản trị đơn hàng
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-don-hang' ?>" 
                                class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'danh-sach-don-hang') ? 'active' : '' ?>">
                                    <i class="nav-icon bi bi-list-ul"></i>
                                    <p>Danh sách đơn hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-dia-chi-nhan-hang' ?>" 
                                class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'danh-sach-dia-chi-nhan-hang') ? 'active' : '' ?>">
                                    <i class="nav-icon bi bi-geo-alt"></i>
                                    <p>Địa chỉ nhận hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-trang-thai-don-hang' ?>" 
                                class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'danh-sach-trang-thai-don-hang') ? 'active' : '' ?>">
                                    <i class="nav-icon bi bi-hourglass-split"></i>
                                    <p>Trạng Thái Đơn Hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Cấu hình hệ thống -->
                    <li class="nav-item <?= (isset($_GET['act']) && strpos($_GET['act'], 'cau-hinh') !== false) ? 'menu-open' : '' ?>">
                        <a href="#" 
                        class="nav-link <?= (isset($_GET['act']) && strpos($_GET['act'], 'cau-hinh') !== false) ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-gear"></i>
                            <p>
                                Cấu hình hệ thống
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '?act=cau-hinh-chung' ?>" 
                                class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'cau-hinh-chung') ? 'active' : '' ?>">
                                    <i class="nav-icon bi bi-sliders"></i>
                                    <p>Cấu hình chung</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '?act=cau-hinh-giao-dien' ?>" 
                                class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'cau-hinh-giao-dien') ? 'active' : '' ?>">
                                    <i class="nav-icon bi bi-palette"></i>
                                    <p>Giao diện</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '?act=sao-luu-du-lieu' ?>" 
                                class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'sao-luu-du-lieu') ? 'active' : '' ?>">
                                    <i class="nav-icon bi bi-database"></i>
                                    <p>Sao lưu dữ liệu</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>


                </nav>
            </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar-->

<main class="m-3">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0"><?= $title ?></h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                
                <?php foreach($link_navs as $link_nav): ?>
                    <li class="breadcrumb-item"><a <?= $link_nav['link']?>  ><?= $link_nav['ten'] ?></a></li>
                <?php endforeach ?>
            </ol>
        </div>
    </div>







