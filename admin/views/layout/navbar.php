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
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-danh-muc' ?>" class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'danh-sach-danh-muc') ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Quản trị danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-san-pham' ?>" class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'danh-sach-san-pham') ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Quản trị sản phẩm</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-slide-show' ?>" class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'danh-sach-slide-show') ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-palette"></i>
                            <p>Quản trị slide shows</p>
                        </a>
                    </li>

                    <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>
                                <p>
                                    Quản trị đơn hàng
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-dia-chi-nhan-hang' ?>" class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'danh-sach-slide-show') ? 'active' : '' ?>">
                                        <i class="nav-icon bi bi-palette"></i>
                                        <p>Địa chỉ nhận hàng</p>
                                    </a>
                                </li>
                                <li class="nav-item"> <a href="./widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Quản lí đơn hàng</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="./widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Cards</p>
                                    </a> </li>
                            </ul>
                        </li>

                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-clipboard-fill"></i>
                                <p>
                                    Layout Options
                                    <span class="nav-badge badge text-bg-secondary me-3">6</span> <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="./layout/unfixed-sidebar.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Default Sidebar</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="./layout/fixed-sidebar.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Fixed Sidebar</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="./layout/layout-custom-area.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Layout <small>+ Custom Area </small></p>
                                    </a> </li>
                                <li class="nav-item"> <a href="./layout/sidebar-mini.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Sidebar Mini</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="./layout/collapsed-sidebar.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Sidebar Mini <small>+ Collapsed</small></p>
                                    </a> </li>
                                <li class="nav-item"> <a href="./layout/logo-switch.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Sidebar Mini <small>+ Logo Switch</small></p>
                                    </a> </li>
                                <li class="nav-item"> <a href="./layout/layout-rtl.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Layout RTL</p>
                                    </a> </li>
                            </ul>
                        </li>
                    </ul> <!-- end::Sidebar Menu -->


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







