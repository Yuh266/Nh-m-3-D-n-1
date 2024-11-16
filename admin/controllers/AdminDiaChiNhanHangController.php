<?php 

class AdminDiaChiNhanHangController{
    public $modelDiaChi;
    public $modelTaiKhoan;

         
    public function __construct(){
        $this->modelDiaChi = new AdminDiaChiNhanHang();
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }

    public function listDiaChi(){
        $title = "Danh sách địa chỉ nhận hàng";
        $title_url = "dia-chi-nhan-hang";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        $listDiaChi = $this->modelDiaChi->getAllDiaChi();

        require_once "./views/DiaChiNhanHang/listDiaChi.php";
        deleteAlertSession();
        deleteSession('error');
        deleteSession('dia_chi');

    }

    public function formAddDiaChi(){
        $title = "Thêm địa chỉ nhận hàng";
        $title_url = "dia-chi-nhan-hang";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> 'href='.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url,"ten"=> "Danh sách đại chỉ nhận hàng"],
            ["link"=> '',"ten"=> $title ],
        ];

        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();

        require "./views/DiaChiNhanHang/addDiaChi.php" ;
        deleteAlertSession();
        deleteSession('error');
        deleteSession('dia_chi');
    }
    public function addDiaChi(){
        $title_url = "dia-chi-nhan-hang";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id_tai_khoan = $_POST['id_tai_khoan'] ?? "";
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? "";
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? "";
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? "";
            // var_dump($id_tai_khoan);
            // var_dump($ten_nguoi_nhan);
            // var_dump($sdt_nguoi_nhan);
            // var_dump($dia_chi_nguoi_nhan);
            // var_dump($_POST);
            // die();
            $error = [];

            if (empty($id_tai_khoan)) {
                $error['id_tai_khoan'] = "Không được để trống";
            }
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
            // var_dump(empty($error));die();
            if (empty($error)) {
                if ($id=$this->modelDiaChi->insertDiaChi($id_tai_khoan,$ten_nguoi_nhan,$sdt_nguoi_nhan,$dia_chi_nguoi_nhan)) {
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;

                    header('Location:'.BASE_URL_ADMIN.'/?act=form-them-'.$title_url);
                }else {
                    // $_SESSION['alert_error'] =1;
                    echo 'Lỗi' ;
                }
            }else {
                $dia_chi = [
                    "id_tai_khoan"=>$id_tai_khoan,
                    "ten_nguoi_nhan"=>$ten_nguoi_nhan,
                    "sdt_nguoi_nhan"=>$sdt_nguoi_nhan,
                    "dia_chi_nguoi_nhan"=>$dia_chi_nguoi_nhan,
                ];
                $_SESSION['dia_chi'] = $dia_chi;
                $_SESSION['alert_error'] =1;
                
                header('Location:'.BASE_URL_ADMIN.'/?act=form-them-'.$title_url);
            }
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url);
        }
    }
  
    public function formEditDiaChi(){
        // Khai báo biến đổ form
        $title = "Sửa địa chỉ nhận hàng";
        $title_url = "dia-chi-nhan-hang";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> 'href='.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url,"ten"=> "Danh sách đại chỉ nhận hàng"],
            ["link"=> '',"ten"=> $title ],
        ];

        // Xử lí logic 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
            
            if (isset($_SESSION['dia_chi'])&&$id != $_SESSION['dia_chi']['id']) {
                $dia_chi = $this->modelDiaChi->getAllDiaChiByID( $id );
                $_SESSION['dia_chi'] = $dia_chi;
            }elseif(!isset($_SESSION['dia_chi'])){
                $dia_chi = $this->modelDiaChi->getAllDiaChiByID( $id );
                $_SESSION['dia_chi'] = $dia_chi;
            }
            
            require "./views/DiaChiNhanHang/editDiaChi.php" ;
            deleteAlertSession();
            deleteSession('error');
            deleteSession('dia_chi');
        }else {
            header("Location:".BASE_URL_ADMIN."?/act=danh-sach".$title_url);
        }
    }

    public function editDiaChi(){
        $title_url = "dia-chi-nhan-hang";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'] ?? "";
            $id_tai_khoan = $_POST['id_tai_khoan'] ?? "";
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? "";
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? "";
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? "";
            // var_dump($_POST);
            // die();
            $error = [];
            if (empty($id_tai_khoan)) {
                $error['id_tai_khoan'] = "Không được để trống";
            }
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
                if ($this->modelDiaChi->updateDiaChi($id,$id_tai_khoan,$ten_nguoi_nhan,$sdt_nguoi_nhan,$dia_chi_nguoi_nhan) ) {
                  
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;
                    header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-'.$title_url.'&id='.$id);
                }else {
                    // $_SESSION['alert_error'] =1;
                    echo 'Lỗi' ;
                }
            }else {
                $dia_chi = [
                    "id"=>$id,
                    "id_tai_khoan"=>$id_tai_khoan,
                    "ten_nguoi_nhan"=>$ten_nguoi_nhan,
                    "sdt_nguoi_nhan"=>$sdt_nguoi_nhan,
                    "dia_chi_nguoi_nhan"=>$dia_chi_nguoi_nhan,
                ];
                $_SESSION['dia_chi'] = $dia_chi;
                $_SESSION['alert_error'] =1;
                
                header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-'.$title_url."&id=".$id);
            }
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url);
        }
    }

    public function deleteDiaChi(){
        $title_url = "dia-chi-nhan-hang";
        if ($_GET["id"] || $_POST['id']) {
            $id = $_GET['id'] ?? $_POST['id'] ;
            if (is_array($id)) {
                foreach ($id as $key => $value) {
                    if ($this->modelDiaChi->deleteDiaChi($value)) {
                        $_SESSION['alert_delete_success'] = 1;
                    }else{
                        echo "Lỗi khi xóa";
                    }
                }
            }else{
                if ($this->modelDiaChi->deleteDiaChi($id)) {
                    $_SESSION['alert_delete_success'] = 1;
                }else{
                    // var_dump($_GET["id"]);die();
                    echo "Lỗi khi xóa";
                }
            }
            header("Location:".BASE_URL_ADMIN."/?act=danh-sach-".$title_url);
        }else {
            header("Location:".BASE_URL_ADMIN."/?act=danh-sach-".$title_url);
        }

    }

}