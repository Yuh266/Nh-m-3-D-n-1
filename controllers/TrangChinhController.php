<?php 

class TrangChinhController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelSlideShow;
    public $modelGioHang;
    public $modelDonHang;
    public $modelDiaChiNhanHang;
    public $modelSanPhamBienThe;

    public function __construct() {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelSlideShow = new SlideShow();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        $this->modelDiaChiNhanHang = new DiaChiNhanHang();
        $this->modelSanPhamBienThe = new SanPhamBienThe();


    }
    public function Trangchu() {
        // var_dump($id_gio_hang);die();

        $list_san_pham_hot = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
        $list_slide_show = $this->modelSlideShow->getAllSlideShows();

        if(isset($_SESSION['client_user']['id'])){
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
            $id_gio_hang = $gio_hang['id'];
            // $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
            // var_dump($chi_tiet_gio_hangs);die();       
        }else{
            echo"";
        }
        // var_dump($gio_hang);die();
        require './views/TrangChinh/trangchu.php';
    }
    public function Login(){
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        if(isset($_SESSION['client_user']['id'])){
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
            $id_gio_hang = $gio_hang['id'];
            // $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
            // var_dump($chi_tiet_gio_hangs);die();       
        }else{
            echo"";
        }
        require './views/TrangChinh/login.php' ;
    }

    public function timKiem(){
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        // var_dump($_GET['id']);die();
        if(isset($_SESSION['client_user']['id'])){
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
            $id_gio_hang = $gio_hang['id'];
            // $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
            // var_dump($chi_tiet_gio_hangs);die();       
        }else{
            echo"";
        }
        $keyword = $_GET['keyword']??"";
        $maxPrice = $_GET['maxPrice']??"";
        $minPrice = $_GET['minPrice']??"";
        $id = $_GET['id']??"";

        $list_san_pham = $this->modelSanPham->getSanPhamByInformationSearch($keyword,$id,$maxPrice,$minPrice);

        // var_dump($list_san_pham);die();
        require './views/TrangChinh/tim_kiem.php';
    }

    public function chiTietGioHang(){
        // $id_gio_hang = $_GET['id_gio_hang'];
        $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
        $id_gio_hang = $gio_hang['id'];
        // $id = $_GET['id'];var
        // var_dump($id_gio_hang);
        $list_san_pham_hot = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 

        $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
        $chi_tiet_gio_hang2s = $this->modelGioHang->getChiTietGioHang2($id_gio_hang);

        // echo "<pre>" ;
        // var_dump($chi_tiet_gio_hang2s);die();
        // $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);

        require "./views/gioHang/giohang.php";
           
    }

    public function listDonHang(){
        if(isset($_SESSION['client_user']['id'])){
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
            $id_gio_hang = $gio_hang['id'];
            // $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
            // var_dump($chi_tiet_gio_hangs);die();       
        }else{
            echo"";
        }

        $list_san_pham = $this->modelSanPham->getAllSanPham();
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 
        $list_don_hang = $this->modelDonHang->getDonHangByID($_SESSION['client_user']['id']);
        // echo "<pre>";
        // var_dump($list_don_hang);die();
        require "./views/TrangChinh/listdonhang.php";
        deleteSession("alert_success");
        deleteSession("alert_error");
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

    public function trangDiaChiNhanHang(){
        

        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
        $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
        if(isset($_SESSION['client_user']['id'])){
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
            $id_gio_hang = $gio_hang['id'];
            $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
            // var_dump($chi_tiet_gio_hangs);die();       
        }else{
            echo"";
        }
        // echo "<pre>";
        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == "POST" || isset($_SESSION['dia_chi']) ) {

            if (isset($_POST['id_gio_hang'])) {
                $id_chi_tiet_gio_hang = $_POST['id_gio_hang'] ?? "";
                $_SESSION["id_chi_tiet_gio_hang"] = $id_chi_tiet_gio_hang;

                $id = [];
                $so_luong = [];
                $id_bien_the = [];

                foreach ($id_chi_tiet_gio_hang as $key => $value) {
                    $chi_tiet_gio_hang = $this->modelGioHang->getChiTietGioHangByID($value);
                    $id[] = $chi_tiet_gio_hang['id_san_pham'] ; 
                    $so_luong[] = $chi_tiet_gio_hang['so_luong'] ; 
                    $id_bien_the[] = $chi_tiet_gio_hang['id_bien_the_san_pham'] ; 
                }

            }else {
                $id = $_POST['id'] ?? $_SESSION['id'] ?? "";
                $so_luong = $_POST['so_luong'] ?? $_SESSION['so_luong'] ?? "";
                $id_bien_the = $_POST['id_bien_the'] ?? $_SESSION['id_bien_the'] ?? "";
            }

            if(empty($id)) {
                header("Location:".BASE_URL."?act=gio-hang-chi-tiet");
            }
            // var_dump($_POST);die();
            
            $tong_tien = 0;
            // echo "<pre>";
            // var_dump($_POST);die();
            $array_san_pham = [];
            
            foreach ($id as $key => $value) {
                $array_san_pham[$key] = $this->modelSanPham->getDetailSanPham($value) ;
                $array_san_pham[$key]['so_luong'] = $so_luong[$key] ;

                if($id_bien_the[$key] != "" && $id_bien_the[$key] != NULL ){
                    $san_pham_bien_the_id = $this->modelSanPhamBienThe->getSanPhamBienTheByID($id_bien_the[$key]);
                    $gia_tri_thuoc_tinh = $this->modelSanPhamBienThe->getGiaTri($san_pham_bien_the_id['id_gia_tri_thuoc_tinh']);

                    $array_san_pham[$key]['ten_san_pham'] = $array_san_pham[$key]['ten_san_pham']. " => ".$gia_tri_thuoc_tinh['gia_tri']  ;  
                    $array_san_pham[$key]['hinh_anh'] = $san_pham_bien_the_id['hinh_anh'];  
                      
                    $array_san_pham[$key]['gia_khuyen_mai'] = $san_pham_bien_the_id['gia_khuyen_mai'];  
                    $array_san_pham[$key]['gia_san_pham'] = $san_pham_bien_the_id['gia'];  
                }

            }
            // echo "<pre>";
            // var_dump($array_san_pham);die();
            $list_dia_chi_nhan_hang = $this->modelDiaChiNhanHang->getAllDiaChiByIDTaiKhoan($_SESSION['client_user']['id']);

            require "./views/TrangChinh/dia_chi_nhan_hang.php";
            deleteSession( 'id');
            deleteSession('so_luong');
            deleteSession('dia_chi');
            deleteSession('error');
        }else {
            header("Location:".BASE_URL);
        }
    }
    public function trangThanhToan(){
        
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
        $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);

        if(isset($_SESSION['client_user']['id'])){
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
            $id_gio_hang = $gio_hang['id'];
            $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
            // var_dump($chi_tiet_gio_hangs);die();       
        }else{
            echo"";
        }
        // echo "<pre>";
        // var_dump($_POST);die();

        if (isset($_POST['btn_thanh_toan']) &&  isset($_POST['id_don_hang'])) {
            $id_don_hang = $_POST['id_don_hang'];

            $don_hang = $this->modelDonHang->getIDSanPhamAndSoLuongByIDDonHang($id_don_hang);

            // var_dump($don_hang);die();
            $id = [];
            $so_luong = [];

            foreach ($don_hang as $key => $value) {
                $id[] = $value['id_san_pham'] ;
                $so_luong[] = $value['so_luong'] ;
            }
            
            $_SESSION['id'] =  $id  ;
            $_SESSION['so_luong'] = $so_luong  ;
            $_SESSION['id_don_hang'] = $id_don_hang  ;
        }
        // Đẩy về dơn hàng khi tồn tại biến nào 

        if (isset($_SESSION['id']) && isset( $_SESSION['so_luong']) && isset( $_SESSION['id_don_hang'] ) ) {
            $id =  $_SESSION['id'] ;
            $so_luong =  $_SESSION['so_luong'] ;
            $id_don_hang =  $_SESSION['id_don_hang'] ;
            $id_bien_the =  $_SESSION['id_bien_the'] ;
            
            // var_dump($_POST);die();
            
            $tong_tien = 0;
            // echo "<pre>";
            // var_dump($_POST);die();
            $array_san_pham = [];
            
            foreach ($id as $key => $value) {
                $array_san_pham[$key] = $this->modelSanPham->getDetailSanPham($value) ;
                $array_san_pham[$key]['so_luong'] = $so_luong[$key] ;

                if($id_bien_the[$key] != ""){
                    $san_pham_bien_the_id = $this->modelSanPhamBienThe->getSanPhamBienTheByID($id_bien_the[$key]);
                    $gia_tri_thuoc_tinh = $this->modelSanPhamBienThe->getGiaTri($san_pham_bien_the_id['id_gia_tri_thuoc_tinh']);

                    $array_san_pham[$key]['ten_san_pham'] = $array_san_pham[$key]['ten_san_pham']. " => ".$gia_tri_thuoc_tinh['gia_tri']  ;  
                    $array_san_pham[$key]['hinh_anh'] = $san_pham_bien_the_id['hinh_anh'];  
                    
                    $array_san_pham[$key]['gia_khuyen_mai'] = $san_pham_bien_the_id['gia_khuyen_mai'];  
                    $array_san_pham[$key]['gia_san_pham'] = $san_pham_bien_the_id['gia'];  
                }
            }

            require './views/TrangChinh/thanh_toan.php';
            // var_dump($tong_tien);die();

            deleteSession( 'id');
            deleteSession('so_luong');
        }else{
            $_SESSION['alert_error'] = "Đơn hàng chưa được thanh toán";
            header("Location:".BASE_URL."?act=don-hang");
            exit();
        }

    }
    public function luuDonHang(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // var_dump($_POST);die();
            $id = $_POST['id'] ?? "";
            $so_luong = $_POST['so_luong'] ?? "";
            $id_bien_the = $_POST['id_bien_the'] ?? "";
            
            $tong_tien = $_POST['tong_tien'] ?? "";
            $ghi_chu = $_POST['ghi_chu'] ?? "";
            $ngay_dat = date('Y-m-d');
            $hinh_thuc_thanh_toan = "Chưa thanh toán";
            $error = [];

            $array_san_pham = [];
            foreach ($id as $key => $value) {
                $array_san_pham[$key] = $this->modelSanPham->getDetailSanPham($value) ;
                $array_san_pham[$key]['so_luong'] = $so_luong[$key] ;

                if($id_bien_the[$key] != ""){
                    $san_pham_bien_the_id = $this->modelSanPhamBienThe->getSanPhamBienTheByID($id_bien_the[$key]);
                    $gia_tri_thuoc_tinh = $this->modelSanPhamBienThe->getGiaTri($san_pham_bien_the_id['id_gia_tri_thuoc_tinh']);

                    $array_san_pham[$key]['ten_san_pham'] = $array_san_pham[$key]['ten_san_pham']. " => ".$gia_tri_thuoc_tinh['gia_tri']  ;  
                    $array_san_pham[$key]['hinh_anh'] = $san_pham_bien_the_id['hinh_anh'] ;
                    
                    // Lưu tên biến thể vô ghi chú
                    $ghi_chu .= '( '.$array_san_pham[$key]["ten_san_pham"].' )' ;

                    $array_san_pham[$key]['gia_khuyen_mai'] = $san_pham_bien_the_id['gia_khuyen_mai'];  
                    $array_san_pham[$key]['gia_san_pham'] = $san_pham_bien_the_id['gia'];  
                }
            }



            if(isset($_POST['btn_old'])){
                $id_dia_chi_nhan_hang = $_POST['id_dia_chi_nhan_hang'] ??'';
                
                if (empty($id_dia_chi_nhan_hang)) {
                    $error['id_dia_chi_nhan_hang'] = "Không được để trống, Bạn chưa có thông tin nhận hàng vui lòng thêm.";
                }
                // var_dump($error);die();
                $_SESSION['error'] = $error;

                if (empty($error)) {

                }else {
                    $dia_chi = [
                        "id_dia_chi_nhan_hang"=>$id_dia_chi_nhan_hang,
                    ];
                    $_SESSION['dia_chi'] = $dia_chi;
                    $_SESSION['id'] = $id;
                    $_SESSION['id_bien_the'] = $id_bien_the;
                    $_SESSION['so_luong'] = $so_luong;
                    
                    header("Location: " . BASE_URL ."?act=form-dia-chi-nhan-hang");
                    exit();
                }

            }else {
                $ten_nguoi_nhan = $_POST['ten_nguoi_nhan']??"";
                $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan']??"";
                $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan']??"";

                // var_dump($_POST);
                // die();
                
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
                    $_SESSION['id_bien_the'] = $id_bien_the;
                    $_SESSION['so_luong'] = $so_luong;
                    
                    header("Location: " . BASE_URL ."?act=form-dia-chi-nhan-hang");
                    exit();
                }
            }

            if ($id_don_hang=$this->modelDonHang->insertDonHang($_SESSION['client_user']['id'],$ngay_dat,$tong_tien,$ghi_chu,$hinh_thuc_thanh_toan,1,$id_dia_chi_nhan_hang)) {
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

            // var_dump($id_don_hang);die();

            $_SESSION['id'] = $id ;
            $_SESSION['so_luong'] = $so_luong ;
            $_SESSION['id_don_hang'] = $id_don_hang ;
            $_SESSION['id_bien_the'] = $id_bien_the;
            
            header("Location: " . BASE_URL ."?act=form-thanh-toan") ;
        }
    }
    
    public function huyDonHang(){
        if (isset($_GET['id_don_hang'])) {
            $id_don_hang = $_GET['id_don_hang'] ;

            if ($this->modelDonHang->huyDonHang($id_don_hang)) {
                $_SESSION['alert_success'] = "Hủy đơn hàng thành công";
            }else {
                $_SESSION['alert_error'] = "Hủy đơn hàng thất bại. Vui lòng thử lại";
            }
        }
        header('Location:'. BASE_URL .'?act=don-hang') ;
    }

    public function xuLiThanhToanMoMo(){

        require "./views/TrangChinh/xu_li_thanh_toan_momo.php" ;
    }
    public function xuLiThanhToanMoMoATM(){

        require "./views/TrangChinh/xu_li_thanh_toan_momo_atm.php" ;
    }

    public function xuLiThanhToan(){
        if ($_SERVER['REQUEST_METHOD']=="POST" || isset($_GET['resultCode']) ) {

            if (isset($_GET['resultCode'])) {
                if ($_GET['resultCode'] == 0 ) {
                    $id_don_hang = $_GET["id_don_hang"];
                    if ($this->modelDonHang->updateHinhThucThanhToanByID($id_don_hang,2,"Thanh toán bằng momo")) {
                        $_SESSION['alert_success'] = "Thanh toán thành công." ;
                    }
                }else {
                    $_SESSION['alert_error'] = "Thanh toán không thành công." ;
                }
            }else {
                $id_don_hang = $_POST["id_don_hang"];
                if ($this->modelDonHang->updateHinhThucThanhToanByID($id_don_hang,2,"Thanh toán khi nhận hàng")) {
                    $_SESSION['alert_success'] = "Đơn hàng được xử lí thành công." ;
                }
            }
        }
        header("Location:". BASE_URL ."?act=don-hang") ;
    }


}