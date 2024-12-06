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
                <a href="#" id="modalLink"><button class="btn btn-primary" onclick="showToast()">Xác nhận
                        xóa</button></a>
            </div>
        </div>
    </div>
</div>




<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="https://img-cache.coccoc.com/image2?i=1&l=34/1086683026" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow">
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
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Thống kê</p>
                    </a>
                </li>

                <!-- Quản trị danh mục -->
                <?php if ($_SESSION['user']['chuc_vu'] == 1): ?>
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-danh-muc' ?>"
                            class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-danh-muc', 'them-danh-muc', 'sua-danh-muc'])) ? 'active' : '' ?>">
                            <i class="nav-icon bi bi-folder"></i>
                            <p>Quản trị danh mục</p>
                        </a>
                    </li>
                <?php endif ?>
                <!-- Quản trị tài khoản  -->
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-tai-khoan' ?>"
                        class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-tai-khoan', 'them-tai-khoan', 'sua-tai-khoan'])) ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-person-badge"></i>
                        <p>Quản trị tài khoản</p>
                    </a>
                </li>

                <!-- Quản trị sản phẩm -->
                <li
                    class="nav-item <?= (isset($_GET['act']) && (strpos($_GET['act'], 'san-pham') !== false || strpos($_GET['act'], 'quan-tri-san-pham') !== false)) ? 'menu-open' : '' ?>">
                    <a href="#"
                        class="nav-link <?= (isset($_GET['act']) && (strpos($_GET['act'], 'san-pham') !== false || strpos($_GET['act'], 'quan-tri-san-pham') !== false)) ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-box"></i>
                        <p>
                            Quản trị sản phẩm
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Quản trị sản phẩm -->
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-san-pham' ?>"
                                class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-san-pham', 'them-san-pham', 'sua-san-pham'])) ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-basket"></i>
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-thuoc-tinh-san-pham' ?>"
                                class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-thuoc-tinh-san-pham', 'them-thuoc-tinh-san-pham', 'sua-thuoc-tinh-san-pham'])) ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-ui-checks-grid"></i>
                                <p>Thuộc tính sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-gia-tri-thuoc-tinh' ?>"
                                class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-gia-tri-thuoc-tinh', 'them-gia-tri-thuoc-tinh', 'sua-gia-tri-thuoc-tinh'])) ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-ui-radios"></i>
                                <p>Giá trị thuộc tính</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Quản trị bình luận -->
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-binh-luan' ?>"
                        class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-binh-luan'])) ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-chat-dots"></i>
                        <p>Quản trị bình luận</p>
                    </a>
                </li>

                <!-- Quản trị slide shows -->
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-slide-show' ?>"
                        class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-slide-show', 'them-slide-show', 'sua-slide-show'])) ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-sliders"></i>
                        <p>Quản trị slide shows</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-danh-gia' ?>"
                        class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-danh-gia', 'them-slide-show', 'sua-slide-show'])) ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-star"></i>
                        <p>Quản trị đánh giá</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-gio-hang' ?>"
                        class="nav-link <?= (isset($_GET['act']) && in_array($_GET['act'], ['danh-sach-gio-hang'])) ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-cart"></i>
                        <p>Quản trị giỏ hàng</p>
                    </a>
                </li>

                <!-- Quản trị đơn hàng -->
                <li
                    class="nav-item <?= (isset($_GET['act']) && (strpos($_GET['act'], 'don-hang') !== false || strpos($_GET['act'], 'dia-chi-nhan-hang') !== false)) ? 'menu-open' : '' ?>">
                    <a href="#"
                        class="nav-link <?= (isset($_GET['act']) && (strpos($_GET['act'], 'don-hang') !== false || strpos($_GET['act'], 'dia-chi-nhan-hang') !== false)) ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-cart"></i>
                        <p>
                            Quản trị đơn hàng
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-don-hang' ?>"
                                class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'danh-sach-don-hang') ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-journal"></i>
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
                        <?php if ($_SESSION['user']['chuc_vu'] == 1): ?>
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-trang-thai-don-hang' ?>"
                                    class="nav-link <?= (isset($_GET['act']) && $_GET['act'] == 'danh-sach-trang-thai-don-hang') ? 'active' : '' ?>">
                                    <i class="nav-icon bi bi-hourglass-split"></i>
                                    <p>Trạng Thái Đơn Hàng</p>
                                </a>
                            </li>
                        <?php endif ?>
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

                <?php foreach ($link_navs as $link_nav): ?>
                    <li class="breadcrumb-item"><a <?= $link_nav['link'] ?>><?= $link_nav['ten'] ?></a></li>
                <?php endforeach ?>
            </ol>
        </div>
    </div>