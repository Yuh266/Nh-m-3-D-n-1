<?php 

class SanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelSlideShow;
    public $modelGioHang;

    public function __construct() {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelSlideShow = new SlideShow();
        $this->modelGioHang = new GioHang();

    }
    public function Trangchu() {
        // var_dump($id_gio_hang);die();

        $list_san_pham_hot = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
        $list_slide_show = $this->modelSlideShow->getAllSlideShows();

        if(isset($_SESSION['client_user']['id'])){
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
            $id_gio_hang = $gio_hang['id'];
            $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
            // var_dump($chi_tiet_gio_hangs);die();       
        }else{
            echo"";
        }
    // var_dump($gio_hang);die();
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
        }else{
            
            header('Location' . BASE_URL . '/');
            exit();

        }
        if(isset($_SESSION['client_user']['id'])){
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
            $id_gio_hang = $gio_hang['id'];
            $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
            
            // var_dump($chi_tiet_gio_hangs);die();       
        }else{
            echo"";
        }
        require_once './views/sanPham/sanphamchitiet.php';
    }


    public function timKiem(){
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        
        require './views/TrangChinh/tim_kiem.php' ;
    }

    public function themGioHang(){
        // $id = $_GET['id'];
        if(isset($_GET['id_gio_hang']) && isset($_GET['id_san_pham'])){
            $so_luong = 1;
            $id_gio_hang = $_GET['id_gio_hang'] ?? '';
            $id_san_pham = $_GET['id_san_pham'] ?? '';
            // var_dump($_GET);
            // var_dump($this->modelGioHang->insertGioHang($id_gio_hang, $id_san_pham, $so_luong));die();
            if($this->modelGioHang->insertGioHang($id_san_pham, $id_gio_hang, $so_luong)){
                header("Location:" . BASE_URL . "?act=san-pham-chi-tiet&id_san_pham=" . $id_san_pham );
                exit();
            }
            

        }else{
            
            header('Location' . BASE_URL . '/');
            exit();

        }
        
        
    }

}