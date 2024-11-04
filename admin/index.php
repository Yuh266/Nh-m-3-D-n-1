<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminLoaiHangController.php';
// require_once './controllers/AdminBaoCaoThongKeController.php';


// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminLoaiHang.php';

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

    // Danh mục
    // "form-them-danh-muc"=>(new AdminDanhMucController())->formAddDanhMuc(),
    "/"=>(new AdminDanhMucController())->formAddDanhMuc(),
    "them-danh-muc"=>(new AdminDanhMucController())->postAddDanhMuc(),
    "form-sua-danh-muc"=>(new AdminDanhMucController())->formEditDanhMuc(),
    "sua-danh-muc"=>(new AdminDanhMucController())->postEditDanhMuc(),
    "xoa-danh-muc"=>(new AdminDanhMucController())->deleteDanhMuc(),

};