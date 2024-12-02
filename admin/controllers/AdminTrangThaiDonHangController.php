<?php 

class AdminTrangThaiDonHangController{
    public $modelTrangThai;

    public function __construct(){
        $this->modelTrangThai = new AdminTrangThaiDonHang();
    }

    public function listTrangThai(){
        // Phân quyền
        if ($_SESSION['user']['chuc_vu'] == 3){
            header('Location:'.BASE_URL_ADMIN);
            exit();
        }
        // end Phân quyền
        $title = "Danh sách trạng thái đơn hàng";
        $title_url = "trang-thai-don-hang";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        $listTrangThai = $this->modelTrangThai->getAllTrangThai();

        require_once "./views/TrangThaiDonHang/listTrangThai.php";
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }
        deleteAlertSession();
        deleteSession('error');
        deleteSession('trang_thai');
    }

    public function formAddTrangThai(){
        // Phân quyền
        if ($_SESSION['user']['chuc_vu'] == 3){
            header('Location:'.BASE_URL_ADMIN);
            exit();
        }
        // end Phân quyền
        $title = "Thêm trạng thái đơn hàng";
        $title_url = "trang-thai-don-hang";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> 'href='.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url,"ten"=> "Danh sách trạng thái đơn hàng"],
            ["link"=> '',"ten"=> $title ],
        ];

        require "./views/TrangThaiDonHang/addTrangThai.php" ;
        deleteAlertSession();
        deleteSession('error');
        deleteSession('trang_thai');
    }
    public function addTrangThai(){
        // Phân quyền
        if ($_SESSION['user']['chuc_vu'] == 3){
            header('Location:'.BASE_URL_ADMIN);
            exit();
        }
        // end Phân quyền
        $title_url = "trang-thai-don-hang";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_trang_thai = $_POST['ten_trang_thai'] ?? "";
           
            // var_dump($_POST);
            // die();
            $error = [];

            if (empty($ten_trang_thai)) {
                $error['ten_trang_thai'] = "Không được để trống";
            }
            // var_dump($error);die();
            $_SESSION['error'] = $error;
            // var_dump(empty($error));die();
            if (empty($error)) {
                if ($id=$this->modelTrangThai->insertTrangThai($ten_trang_thai)) {
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;

                    header('Location:'.BASE_URL_ADMIN.'/?act=form-them-'.$title_url);
                }else {
                    // $_SESSION['alert_error'] =1;
                    echo 'Lỗi' ;
                }
            }else {
                $trang_thai = [
                    "ten_trang_thai"=>$ten_trang_thai,
                ];
                $_SESSION['trang_thai'] = $trang_thai;
                $_SESSION['alert_error'] =1;
                
                header('Location:'.BASE_URL_ADMIN.'/?act=form-them-'.$title_url);
            }
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url);
        }
    }
  
    public function formEditTrangThai(){
        // Phân quyền
        if ($_SESSION['user']['chuc_vu'] == 3){
            header('Location:'.BASE_URL_ADMIN);
            exit();
        }
        // end Phân quyền
        // Khai báo biến đổ form
        $title = "Sửa trạng thái đơn hàng";
        $title_url = "trang-thai-don-hang";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> 'href='.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url,"ten"=> "Danh sách trạng thái đơn hàng"],
            ["link"=> '',"ten"=> $title ],
        ];

        // Xử lí logic 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            if (isset($_SESSION['trang_thai'])&&$id != $_SESSION['trang_thai']['id']) {
                $trang_thai = $this->modelTrangThai->getTrangThaiByID( $id );
                $_SESSION['trang_thai'] = $trang_thai;
            }elseif(!isset($_SESSION['trang_thai'])){
                $trang_thai = $this->modelTrangThai->getTrangThaiByID( $id );
                $_SESSION['trang_thai'] = $trang_thai;
            }
            
            require "./views/TrangThaiDonHang/editTrangThai.php" ;
            deleteAlertSession();
            deleteSession('error');
            deleteSession('trang_thai');
        }else {
            header("Location:".BASE_URL_ADMIN."?/act=danh-sach".$title_url);
        }
    }

    public function editTrangThai(){
        // Phân quyền
        if ($_SESSION['user']['chuc_vu'] == 3){
            header('Location:'.BASE_URL_ADMIN);
            exit();
        }
        // end Phân quyền
        $title_url = "trang-thai-don-hang";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'] ?? "";
            $ten_trang_thai = $_POST['ten_trang_thai'] ?? "";
           
            // var_dump($_POST);
            // die();
            $error = [];
            if (empty($ten_trang_thai)) {
                $error['ten_trang_thai'] = "Không được để trống";
            }
            // var_dump($error);die();
            $_SESSION['error'] = $error;
            if (empty($error)) {
                if ($this->modelTrangThai->updateTrangThai($id,$ten_trang_thai) ) {
                    
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;
                    header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-'.$title_url.'&id='.$id);
                }else {
                    echo 'Lỗi' ;
                }
            }else {
                $trang_thai = [
                    "id"=>$id,
                    "ten_trang_thai"=>$ten_trang_thai,
                ];
                $_SESSION['trang_thai'] = $trang_thai;
                $_SESSION['alert_error'] =1;
                header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-'.$title_url."&id=".$id);
            }
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url);
        }
    }

    public function deleteTrangThai(){
        // Phân quyền
        if ($_SESSION['user']['chuc_vu'] == 3){
            header('Location:'.BASE_URL_ADMIN);
            exit();
        }
        // end Phân quyền
        $title_url = "trang-thai-don-hang";
        if ($_GET["id"] || $_POST['id']) {
            $id = $_GET['id'] ?? $_POST['id'] ;
            if (is_array($id)) {
                foreach ($id as $key => $value) {
                    if ($this->modelTrangThai->deleteTrangThai($value)) {
                        $_SESSION['alert_delete_success'] = 1;
                    }else{
                        echo "Lỗi khi xóa";
                    }
                }
            }else{
                if ($this->modelTrangThai->deleteTrangThai($id)) {
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