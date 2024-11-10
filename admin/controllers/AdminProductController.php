<?php
class AdminProductController{

    public $modelProduct;

    public function __construct(){
        $this->modelProduct = new AdminProduct();
    }

    public function listProduct(){
        $listProduct = $this->modelProduct->getAllProduct();
        $title = "Danh Sách Sản Phẩm";
        require_once './views/product/listProduct.php';
    }
}