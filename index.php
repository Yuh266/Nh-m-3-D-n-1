<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

spl_autoload_register(function ($class) {
    $fileName = "$class.php";
    $fileModel = PATH_ROOT_MODELS . $fileName ;
    $fileController = PATH_ROOT_CONTROLLERS . $fileName ;
    // var_dump($fileModel);die();

    if (is_readable($fileModel)) {
        require_once $fileModel ;
    }elseif (is_readable($fileController)) {
        require_once $fileController ;
    }
});

// var_dump($_GET);die();
// Route
// $act = $_GET['act'] ?? '/';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}else{
    $act = '/';
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

// $path = "D:\laragon\www\Du_an_1\commons/.././uploads/1731075972anh2.PNG";
// if (file_exists($path)) {
//     echo "File exists!";
// } else {
//     echo "File does not exist!";
// }
// die();

match ($act) {
    // Trang chủclgur
    "/"=>(new TrangChinhController() )->Trangchu(),
    "tim-kiem"=>(new TrangChinhController() )->timKiem(),

    "san-pham-chi-tiet"=>(new SanPhamController() )->chiTietSanPham(),
    
    "gio-hang-chi-tiet"=>(new TrangChinhController() )->chiTietGioHang(),
    "them-gio-hang"=>(new SanPhamController() )->themGioHang(),
    "xoa-gio-hang"=>(new SanPhamController() )->xoaGioHang(),

    "them-binh-luan"=>(new SanPhamController() )->binhLuan(),
    "them-danh-gia"=>(new SanPhamController())->danhGia(),
    

    "don-hang"=>(new TrangChinhController() )->listDonHang(),

    "chi-tiet-don-hang"=>(new TrangChinhController() )->chiTietDonHang(),

    "login"=>(new TaiKhoanController())->Login(),
    "logout"=>(new TaiKhoanController())->Logout(),
    "form-login"=>(new TaiKhoanController())->post_Login(),

    "register"=>(new TaiKhoanController())->register(),
    "form-register"=>(new TaiKhoanController())->post_Register(),
    
    "tai_khoan"=>(new TaiKhoanController())->tai_khoan(),
    "form-tai-khoan"=>(new TaiKhoanController())->post_update_Tai_Khoan(),

    "doi_mat_khau"=>(new TaiKhoanController)->doi_mat_khau(),
    "form-doi-mat-khau"=>(new TaiKhoanController)->post_doi_mat_khau(),
    
    
    "form-dia-chi-nhan-hang"=>(new TrangChinhController())->trangDiaChiNhanHang(),
    "form-thanh-toan"=>(new TrangChinhController())->trangThanhToan(),
    "thanh-toan"=>(new TrangChinhController())->thanhToan(),
    "huy-don-hang"=>(new TrangChinhController())->huyDonHang(),

    "xu-li-thanh-toan"=>(new TrangChinhController())->xuLiThanhToan(),
    "xu-li-thanh-toan-momo"=>(new TrangChinhController())->xuLiThanhToanMoMo(),
    "xu-li-thanh-toan-momo-atm"=>(new TrangChinhController())->xuLiThanhToanMoMoATM(),



};