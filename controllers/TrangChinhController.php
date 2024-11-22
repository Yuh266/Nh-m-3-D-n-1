<?php 

class TrangChinhController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelSlideShow;
    public $modelGioHang;
    public $modelDonHang;
    public$modelDiaChiNhanHang;

    public function __construct() {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelSlideShow = new SlideShow();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        $this->modelDiaChiNhanHang = new DiaChiNhanHang();

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
        $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);

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
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        // var_dump($_GET['id']);die();
        $keyword = $_GET['keyword']??"";
        $maxPrice = $_GET['maxPrice']??"";
        $minPrice = $_GET['minPrice']??"";
        $id = $_GET['id']??"";

        $list_san_pham = $this->modelSanPham->getSanPhamByInformationSearch($keyword,$id,$maxPrice,$minPrice);

        // var_dump($list_san_pham);die();
        require './views/TrangChinh/tim_kiem.php' ;
    }

    public function chiTietGioHang(){
        $id_gio_hang = $_GET['id_gio_hang'];
        $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);

        // $id = $_GET['id'];var
        // var_dump($id_gio_hang);
        $list_san_pham_hot = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
        // var_dump($chi_tiet_gio_hang);die();
        // $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);

        require "./views/gioHang/giohang.php";
           
    }

    public function listDonHang(){
        $list_san_pham = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        $list_don_hang = $this->modelDonHang->getDonHangByID($_SESSION['client_user']['id']);
        // echo "<pre>";
        // var_dump($list_don_hang);die();
        require "./views/TrangChinh/listdonhang.php";
        deleteSession("alert_success");
    }
    public function chiTietDonHang(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        
            $list_san_pham = $this->modelSanPham->getAllSanPham();
            $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);

            $list_don_hang = $this->modelDonHang->getDonHangByIDDonHang($id);
            // echo "<pre>";
            // var_dump($list_don_hang);die();
            require "./views/TrangChinh/chi_tiet_don_hang.php";
        }else{
            header(BASE_URL);
        }
    }

    public function trangThanhToan(){
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
        $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);

        // echo "<pre>";
        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == "POST" || isset($_SESSION['dia_chi']) ) {

            if (isset($_POST['id_gio_hang'])) {
                $id_chi_tiet_gio_hang = $_POST['id_gio_hang'] ?? "";
                $_SESSION["id_chi_tiet_gio_hang"] = $id_chi_tiet_gio_hang;
                $id = [];
                $so_luong = [];

                foreach ($id_chi_tiet_gio_hang as $key => $value) {
                    $chi_tiet_gio_hang = $this->modelGioHang->getChiTietGioHangByID($value);
                    $id[] = $chi_tiet_gio_hang['id_san_pham'] ; 
                    $so_luong[] = $chi_tiet_gio_hang['so_luong'] ; 
                }
            }else {
                $id = $_POST['id'] ?? $_SESSION['id'] ?? "";
                $so_luong = $_POST['so_luong'] ?? $_SESSION['so_luong'] ?? "";
            }
            // var_dump($_POST);die();
            
            $tong_tien = 0;
            // echo "<pre>";
            // var_dump($_POST);die();
            $array_san_pham = [];
            
            foreach ($id as $key => $value) {
                $array_san_pham[$key] = $this->modelSanPham->getDetailSanPham($value) ;
                $array_san_pham[$key]['so_luong'] = $so_luong[$key] ;
            }
            // echo "<pre>";
            // var_dump($array_san_pham);die();
            $list_dia_chi_nhan_hang = $this->modelDiaChiNhanHang->getAllDiaChiByIDTaiKhoan($_SESSION['client_user']['id']);

            require "./views/TrangChinh/thanh_toan.php";
            deleteSession( 'id');
            deleteSession('so_luong');
            deleteSession('dia_chi');
            deleteSession('error');
        }else {
            header("Location:".BASE_URL);
        }
    }
    public function thanhToan(){

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // var_dump($_POST);die();
            $id = $_POST['id'] ?? "";
            $so_luong = $_POST['so_luong'] ?? "";
            $tong_tien = $_POST['tong_tien'] ?? "";
            $ghi_chu = $_POST['ghi_chu'] ?? "";
            $ngay_dat = date('Y-m-d');

            $array_san_pham = [];
            foreach ($id as $key => $value) {
                $array_san_pham[$key] = $this->modelSanPham->getDetailSanPham($value) ;
                $array_san_pham[$key]['so_luong'] = $so_luong[$key] ;
            }

            if(isset($_POST['btn_old'])){
                $id_dia_chi_nhan_hang = $_POST['id_dia_chi_nhan_hang'] ??'';
            }else {
                $ten_nguoi_nhan = $_POST['ten_nguoi_nhan']??"";
                $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan']??"";
                $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan']??"";

                // var_dump($_POST);
                // die();
                $error = [];
                
                if (empty($ten_nguoi_nhan)) {
                    $error['ten_nguoi_nhan'] = "Không được để trống";
                }
                if (empty($sdt_nguoi_nhan)) {
                    $error['sdt_nguoi_nhan'] = "Không được để trống";
                }
                if (empty($dia_chi_nguoi_nhan)) {
                    $error['dia_chi_nguoi_nhan'] = "Không được để trống";
                }
                // var_dump($error);die();
                $_SESSION['error'] = $error;

                if (empty($error)) {
                    $id_dia_chi_nhan_hang = $this->modelDiaChiNhanHang->insertDiaChi($_SESSION['client_user']['id'],$ten_nguoi_nhan,$sdt_nguoi_nhan,$dia_chi_nguoi_nhan);
                }else {
                    $dia_chi = [
                        "ten_nguoi_nhan"=>$ten_nguoi_nhan,
                        "sdt_nguoi_nhan"=>$sdt_nguoi_nhan,
                        "dia_chi_nguoi_nhan"=>$dia_chi_nguoi_nhan,
                    ];
                    $_SESSION['dia_chi'] = $dia_chi;
                    $_SESSION['id'] = $id;
                    $_SESSION['so_luong'] = $so_luong;
                    
                    header("Location: " . BASE_URL ."?act=form-thanh-toan");
                    exit();
                }
            }

            if ($id_don_hang=$this->modelDonHang->insertDonHang($_SESSION['client_user']['id'],$ngay_dat,$tong_tien,$ghi_chu,2,$id_dia_chi_nhan_hang)) {
                foreach ($array_san_pham as $key => $value) {
                    $this->modelDonHang->insertChiTietDonHang($id_don_hang,$value['id'],$value['gia_khuyen_mai'],$value['so_luong'],$value['gia_khuyen_mai']*$value['so_luong']);
                }
            }

            if (isset($_SESSION['id_chi_tiet_gio_hang'])) {
                foreach ($_SESSION['id_chi_tiet_gio_hang'] as $key => $value) {
                    $this->modelGioHang->deleteChiTietGioHang($value);
                }
                deleteSession('id_chi_tiet_gio_hang');
            }

            header("Location:".BASE_URL."?act=don-hang");
        }
    }
    

}