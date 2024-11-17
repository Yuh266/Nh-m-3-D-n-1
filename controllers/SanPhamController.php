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
    public function Trangchu() {
        $list_san_pham_hot = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
        $list_slide_show = $this->modelSlideShow->getAllSlideShows();
    
        require './views/TrangChinh/trangchu.php';
    }
    public function Login(){
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 

        require './views/TrangChinh/login.php' ;
    }


    public function chiTietSanPham(){
        $id = $_GET['id_san_pham'];
        
        if(isset($_GET['id_san_pham'])){
            $list_san_pham_hot = $this->modelSanPham->getAllSanPham();

            $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();

            $sanphan_ct = $this->modelSanPham->getDetailSanPham($id);
            
            $danh_sach_anh = $this->modelSanPham->getListAnhSanPham($id);
            // var_dump($sanphan_ct); die;

        }else{
            
            header('Location' . BASE_URL . '/');
            exit();

        }
        require_once './views/sanPham/sanphamchitiet.php';
    }


    public function timKiem(){
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        
        require './views/TrangChinh/tim_kiem.php' ;
    }

}