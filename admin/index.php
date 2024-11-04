<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminLoaiHangController.php';
require_once './controllers/AdminTaiKhoanController.php';

// Require toàn bộ file Models
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
    "form-them-loai-hang"=>(new AdminLoaiHangController())->formAddLoaiHang(),
    "them-loai-hang"=>(new AdminLoaiHangController())->postAddLoaiHang(),

    "form-dang-nhap"=>(new AdminTaiKhoanController())->formLogin(),
    "form-dang-ky"=>(new AdminTaiKhoanController())->formRegister(),

};