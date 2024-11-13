<?php 

class SanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelSlideShow;
    public function __construct() {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelSlideShow = new SlideShow();
    }
    public function Trangchu(){
        $list_san_pham_hot = $this->modelSanPham->getAllSanPham(); 
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        $list_slide_show = $this->modelSlideShow->getAllSlideShows(); 
        
        require './views/TrangChinh/trangchu.php' ;
    }

}