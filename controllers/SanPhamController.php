<?php 

class SanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelSlideShow;
    public $modelGioHang;
    public $modelBinhLuan;
    public $modelSanPhamBienThe;


    public function __construct() {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelSlideShow = new SlideShow();
        $this->modelGioHang = new GioHang();
        $this->modelBinhLuan = new BinhLuan();
        $this->modelSanPhamBienThe = new SanPhamBienThe();
    }
    
    public function Login(){
        $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc(); 

        require './views/TrangChinh/login.php' ;
    }


    public function chiTietSanPham(){

          
        if(isset($_GET['id_san_pham'])){
            $id = $_GET['id_san_pham'];

            $list_danh_gias=$this->modelSanPham->getReviewSanPham($id);
            $list_san_pham_hot = $this->modelSanPham->getAllSanPham();

            $list_danh_muc = $this->modelDanhMuc->getAllDanhMuc();
        
            $sanphan_ct = $this->modelSanPham->getDetailSanPham($id);
            
            $danh_sach_anh = $this->modelSanPham->getListAnhSanPham($id);
            
            $chi_tiet_binh_luans = $this->modelBinhLuan->getBinhLuan( $id);

            // Xử lí sản phẩm biến thể

            $gia_tri_bien_the = $this->modelSanPhamBienThe->getSanPhamBienTheByIDSanPham($id);
            if(!empty($gia_tri_bien_the)){
                $thuoc_tinh = $this->modelSanPhamBienThe->getThuocTinhByIDSanPham($id);
                $san_pham_bien_the = [];
                foreach ($gia_tri_bien_the as $key => $value) {
                    $san_pham_bien_the[] = $this->modelSanPhamBienThe->getSanPhamBienTheByID($value['id']);
                }
                $id_bien_the = $gia_tri_bien_the[0]['id'];
            }

            if (isset($_POST['id_bien_the'])) {
                $id_bien_the = $_POST['id_bien_the'] ;   

            }
           
            if (isset($id_bien_the)) {
                $san_pham_bien_the_id = $this->modelSanPhamBienThe->getSanPhamBienTheByID($id_bien_the);

                $sanphan_ct['hinh_anh'] = $san_pham_bien_the_id['hinh_anh'];  
                $sanphan_ct['so_luong'] = $san_pham_bien_the_id['so_luong'];  
                $sanphan_ct['gia_khuyen_mai'] = $san_pham_bien_the_id['gia_khuyen_mai'];  
                $sanphan_ct['gia_san_pham'] = $san_pham_bien_the_id['gia'];  
            }
            
            // echo '<pre>';
            // var_dump($san_pham_bien_the);die();
            

        }else{
            
            header('Location' . BASE_URL . '/');
            exit();

        }
        if(isset($_SESSION['client_user']['id'])){
            $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);
            $id_gio_hang = $gio_hang['id'];
            $chi_tiet_gio_hangs = $this->modelGioHang->getChiTietGioHang($id_gio_hang);
            // $binh_luan = $this->modelSanPham->getBinhLuans($_SESSION['client_user']['id']);
            // $id_binh_luan = $binh_luan['id'];
            // $chi_tiet_binh_luan = $this->modelSanPham->getBinhLuan($gio_hang);


            
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
            $id_bien_the = $_GET['id_bien_the'] ?? NULL ;
            // var_dump($_GET);
            // var_dump($this->modelGioHang->insertGioHang($id_gio_hang, $id_san_pham, $so_luong));die();
            if($this->modelGioHang->insertGioHang($id_san_pham, $id_gio_hang, $so_luong,$id_bien_the)){
                header("Location:" . BASE_URL . "?act=san-pham-chi-tiet&id_san_pham=" . $id_san_pham );
                exit();
            }           
        }else{           
            header('Location' . BASE_URL . '/');
            exit();
        }     
    }

    public function binhLuan(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $noi_dung = $_POST['binh_luan']?? '';
            $ngay_dang = date('Y-m-d');
            $id_tai_khoan = $_SESSION['client_user']['id'] ?? '';
            $id_san_pham = $_POST['id_san_pham'] ?? '';

            // var_dump($noi_dung, $id_tai_khoan, $id_san_pham, $ngay_dang);die();
            if($this->modelBinhLuan->insertBinhLuan($id_san_pham, $id_tai_khoan, $noi_dung, $ngay_dang)){
                header("Location:" . BASE_URL . "?act=san-pham-chi-tiet&id_san_pham=" . $id_san_pham );
                exit();
            }           
        }else{     
            header('Location' . BASE_URL . '/');
            exit();
        }     
    }
    // public function showReviewForm()
    // {
    //     // Lấy ID sản phẩm từ URL
    //     $id_san_pham = $_GET['id_san_pham'] ?? '';
    
    
    //     // Gọi model để lấy danh sách đánh giá
    //     $danh_gias = $this->modelSanPham->getReviewSanPham($id_san_pham);
    
    //     // Kiểm tra nếu có lỗi khi lấy dữ liệu
    //     if ($danh_gias === false) {
    //         $danh_gias = [];
    //         echo "Không thể lấy danh sách đánh giá.";
    //     }
    
    //     // Gửi dữ liệu đến view (trang chi tiết sản phẩm)
    //     include 'views/sanPham/sanphamchitiet.php';
    // }

    public function xoaGioHang(){
        if ($_GET['id_gio_hang'] || $_POST["id"]) {
            // var_dump();die($_POST)//;

            $id = $_GET['id_gio_hang'] ?? $_POST["id"];
            // var_dump();die($id);
            if (is_array($id)) {
                foreach ($id as $value) {
                    $gio_hang = $this->modelGioHang->getChiTietGioHangByID($value);
                    if ($gio_hang) {
                        $this->modelGioHang->deleteChiTietGioHang($value);
                    }
                }
            } else {
                $gio_hang = $this->modelGioHang->getChiTietGioHangByID($id);
                // var_dump($gio_hang);die();
                $this->modelGioHang->deleteChiTietGioHang($id);

                
            }
            
            $_SESSION['alert_delete_success'] = 1;  
            header('Location:' . BASE_URL . '/?act=gio-hang-chi-tiet' );
            exit();
        } else {
            header('Location:' . BASE_URL . '/?act=gio-hang-chi-tiet' );
            exit();
        }
    }

    

}