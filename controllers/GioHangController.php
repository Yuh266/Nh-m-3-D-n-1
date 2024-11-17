<?php 
class GioHangController {
    public $modelGioHang;
    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct() {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelGioHang = new GioHang();
    }

    public function chiTietGioHang(){
        $list_san_pham_hot = $this->modelSanPham->getAllSanPham();
        require "./views/gioHang/giohang.php";
        
    }
}