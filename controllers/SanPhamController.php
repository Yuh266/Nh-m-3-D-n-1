<?php 

class SanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct() {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
    }
    public function Trangchu(){
        $list_san_pham_hot = $this->modelSanPham->getAllSanPham(); 
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 

        require './views/TrangChinh/trangchu.php' ;
    }

}