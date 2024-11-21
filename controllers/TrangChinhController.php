<?php 

class TrangChinhController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelSlideShow;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct() {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelSlideShow = new SlideShow();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();

    }
    public function Trangchu() {
        $id_gio_hang = $_GET['id_gio_hang'];

        $list_san_pham_hot = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
        $list_slide_show = $this->modelSlideShow->getAllSlideShows();
        $gio_hang = $this->modelGioHang->getGioHang($_SESSION['user']['id']);
        // var_dump($list_slide_show);die();
        // $id_gio_hang = $gio_hang['id'];

        // $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
    
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

            // var_dump($sanphan_ct);die();
            // var_dump($sanphan_ct); die;

        }else{
            header('Location' . BASE_URL . '/');
            exit();
        }

        
        require_once './views/sanPham/sanphamchitiet.php';
    }

    public function timKiem(){
        if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
            $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
            if(isset($_GET['maxPrice'])){
                $price_max = $_GET['maxPrice']?? 0 ;
                $price_min = $_GET['minPrice']?? 0 ;

                $list_san_pham = $this->modelSanPham->getSanPhamByPrice( $keyword, $price_max, $price_min);
            }else{
                $list_san_pham = $this->modelSanPham->getSanPhamByKeyword($keyword);
            }

            // var_dump($list_san_pham);die();
            require './views/TrangChinh/tim_kiem.php' ;
        }else{
            header(''. BASE_URL . '/');
        }
    }

    public function chiTietGioHang(){
        $id_gio_hang = $_GET['id_gio_hang'];
        // $id = $_GET['id'];var
        // var_dump($id_gio_hang);/


        $list_san_pham_hot = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
        // var_dump($chi_tiet_gio_hang);die();
        // $gio_hang = $this->modelGioHang->getGioHang($_SESSION['user']['id']);

        require "./views/gioHang/giohang.php";
           
    }

    public function listDonHang(){
        $list_san_pham = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        $list_don_hang = $this->modelDonHang->getDonHangByID($_SESSION['user']['id']);
        // echo "<pre>";
        // var_dump($list_don_hang);die();
        require "./views/TrangChinh/listdonhang.php";
    }
    public function chiTietDonHang(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        
            $list_san_pham = $this->modelSanPham->getAllSanPham();
            $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();

            $list_don_hang = $this->modelDonHang->getDonHangByIDDonHang($id);
            // echo "<pre>";
            // var_dump($list_don_hang);die();
            require "./views/TrangChinh/chi_tiet_don_hang.php";
        }else{
            header(BASE_URL);
        }
    }
}