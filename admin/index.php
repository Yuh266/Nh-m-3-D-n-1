<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';
// var_dump($_GET);die();
// Route
// $act = $_GET['act'] ?? '/';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}else{
    $act = '/';
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new ProductController())->Home(),

    'danh-sach-san-pham'=>(new ProductController())->listProduct(),

    'form-them-san-pham'=>(new ProductController())->formAddProduct(),

    'them-san-pham' =>(new ProductController())->createProduct(),

    'form-sua-san-pham'=>(new ProductController())->formUpdateProduct(),
    
    'sua-san-pham'=>(new ProductController())->UpdateProduct(),

    'xoa-san-pham'=>(new ProductController())->DeleteProduct(),


};