<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

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
    "/"=>(header("Location:".BASE_URL_ADMIN)),

};