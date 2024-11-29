<?php
class AdminGioHangController{

    public $modelGioHang;
    public $modelTaiKhoan;

    public function __construct(){
        $this->modelGioHang = new AdminGioHang();
        $this->modelTaiKhoan= new AdminTaiKhoan();
    }

    public function listGiohang(){
        $listGioHang = $this->modelGioHang->getAllGioHang();
        $title = "Danh Sách Giỏ hàng";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        require_once './views/GioHang/listGioHang.php';
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }
        deleteAlertSession();
        deleteSession('error');
        deleteSession('gio_hang');
    }
    public function deleteGioHang(){
        if($_GET['id'] || $_POST["id"]){
            $id = $_GET['id']??$_POST["id"];
            if(is_array($id)){
                foreach($id as $key => $value){
                    $this->modelGioHang->getGioHangbyID($id[$key]);
                    $this->modelGioHang->deleteGioHang($id[$key]);
                }
            }else{
                $this->modelGioHang->getGioHangbyID($id);
           
                $this->modelGioHang->deleteGioHang($id);
                
            }
            $_SESSION['alert_delete_success']=1;
            header('Location:'.BASE_URL_ADMIN.'/?act=gio-hang') ;
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=gio-hang') ;
        }
    }

    public function formAddGioHang()
    {
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        $title = "Thêm Giỏ Hàng";
        $link_navs = [
            ["link" => 'href="' . BASE_URL_ADMIN . '"', "ten" => "Trang Chủ"],
            ["link" => 'href="' . BASE_URL_ADMIN . '/?act=gio-hang"', "ten" => "Danh Sách Giỏ Hàng"],
            ["link" => '', "ten" => $title],
        ];
        require_once './views/GioHang/addGioHang.php';
        deleteSession('error');
        deleteSession('gio_hang');
        deleteAlertSession();
    }
     public function addGioHang(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_tai_khoan= $_POST['id_tai_khoan'];
        // var_dump($id_tai_khoan);
        $error = [];
        if (empty($id_tai_khoan)) {
            $error['id_tai_khoan'] = "Không được để trống";
        }
        $_SESSION['error'] = $error;
        if(empty($error)){
            if($id=$this->modelGioHang->addGioHang($id_tai_khoan)){
             unset($_SESSION['error']);
            $_SESSION['alert_success'] = 1;
            $_SESSION['id_active'] = $id;
            header('Location: ' . BASE_URL_ADMIN . '/?act=form-them-gio-hang');
            exit;
          
        }
        else{
            echo "Lỗi khi thêm tài khoản!";
        }
        }
        else {
            $_SESSION['gio_hang'] = [
                'id_tai_khoan' => $id_tai_khoan,
             
            ];
            $_SESSION['alert_error'] = 'Có lỗi trong quá trình thêm giỏ hàng';
            header('Location: ' . BASE_URL_ADMIN . '/?act=form-them-gio-hang');
            exit;
        }
        
        
    }
     }
  
}
