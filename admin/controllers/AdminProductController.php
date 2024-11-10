<?php
class AdminProductController{

    public $modelProduct;

    public function __construct(){
        $this->modelProduct = new AdminProduct();
    }

    public function listProduct(){
        $listProduct = $this->modelProduct->getAllProduct();
        $title = "Danh Sách Sản Phẩm";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        require_once './views/product/listProduct.php';
    }
}