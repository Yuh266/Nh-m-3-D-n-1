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
        require './views/TrangChinh/login.php' ;
    }

    public function chiTietSanPham(){
        
        if(isset($_GET['id_san_pham'])){
            $id = $_GET['id_san_pham'];

            $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
            $list_danh_muc = is_array($list_danh_muc) ? $list_danh_muc : [];

            $sanphan_ct = $this->modelSanPham->getDetailSanPham($id); 
            // $danh_sach_anh = $this->modelSanPham->getListAnhSanPham($id);
            // var_dump($danh_sach_anh); die;

        }else{
            
            header('Location' . BASE_URL . '/');
            exit();

        }
        
        
        
        
        require_once './views/sanPham/sanphamchitiet.php';
    }

}