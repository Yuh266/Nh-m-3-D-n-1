<?php 
session_start();
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ


spl_autoload_register(function ($class) {
    $fileName = "$class.php";
    $fileModel = PATH_ADMIN_CONTROLLERS . $fileName ;
    $fileController = PATH_ADMIN_MODELS . $fileName ;
    // var_dump($fileModel);die();

    if (is_readable($fileModel)) {
        require_once $fileModel ;
    }elseif (is_readable($fileController)) {
        require_once $fileController ;
    }

});


// $act = $_GET['act'] ?? '/';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}else{
    $act = '/';
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    // '/' => (new AdminBaoCaoThongKeController())->home(),
    // Sản phẩm
    "form-them-loai-hang"=>(new AdminLoaiHangController())->formAddLoaiHang(),
    "them-loai-hang"=>(new AdminLoaiHangController())->postAddLoaiHang(),


    // Route danh mục
    "danh-muc"=>(new AdminDanhMucController())->danhSachDanhMuc(),
    "form-them-danh-muc"=>(new AdminDanhMucController())->formAddDanhMuc(),
    // "/"=>(new AdminDanhMucController())->formAddDanhMuc(),
    "them-danh-muc"=>(new AdminDanhMucController())->postAddDanhMuc(),
    "form-sua-danh-muc"=>(new AdminDanhMucController())->formEditDanhMuc(),
    "sua-danh-muc"=>(new AdminDanhMucController())->postEditDanhMuc(),
    "xoa-danh-muc"=>(new AdminDanhMucController())->deleteDanhMuc(),

    "form-dang-nhap"=>(new AdminTaiKhoanController())->formLogin(),
    "form-dang-ky"=>(new AdminTaiKhoanController())->formRegister(),


    "form-them-slide-show"=>(new AdminSlideShowController())->formAddSlideShow(),
    "them-slide-show"=>(new AdminSlideShowController())->postAddSlideShow(),


};