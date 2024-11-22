<?php 

class AdminGiaTriThuocTinhController{

    public $modelGiaTriThuocTinh;
    public $modelThuocTinhSanPham;

    public function __construct(){
        $this->modelGiaTriThuocTinh = new AdminGiaTriThuocTinh();
        $this->modelThuocTinhSanPham = new AdminThuocTinhSanPham();
    }

    public function listGiaTriThuocTinh(){
        $title = "Danh sách giá trị thuộc tính";
        $title_url = "gia-tri-thuoc-tinh";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        
        $listGiaTriThuocTinh = $this->modelGiaTriThuocTinh->getAllGiaTriThuocTinh();

        require_once "./views/GiaTriThuocTinh/listGiaTriThuocTinh.php";
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }
        deleteAlertSession();
        deleteSession('error');
        deleteSession('gia_tri');
    }

    public function formAddGiaTriThuocTinh(){
        $title = "Thêm giá trị thuộc tính";
        $title_url = "gia-tri-thuoc-tinh";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> 'href='.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url,"ten"=> "Danh sách giá trị thuộc tính"],
            ["link"=> '',"ten"=> $title ],
        ];

        $list_thuoc_tinh = $this->modelThuocTinhSanPham->getAllThuocTinhSanPham();

        require "./views/GiaTriThuocTinh/addGiaTriThuocTinh.php" ;
        deleteAlertSession();
        deleteSession('error');
        deleteSession('gia_tri');
    }
    public function addGiaTriThuocTinh(){
        $title_url = "gia-tri-thuoc-tinh";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $gia_tri = $_POST['gia_tri'] ?? "";
            $id_thuoc_tinh = $_POST['id_thuoc_tinh'] ?? "";
           
            // var_dump($_POST);
            // var_dump($id_thuoc_tinh);
            // die();

            $error = [];

            if (empty($gia_tri)) {
                $error['gia_tri'] = "Không được để trống";
            }
            // var_dump($error);die();
            $_SESSION['error'] = $error;
            // var_dump(empty($error));die();
            if (empty($error)) {
                if ($id=$this->modelGiaTriThuocTinh->insertGiaTriThuocTinh($id_thuoc_tinh,$gia_tri)) {
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;

                    header('Location:'.BASE_URL_ADMIN.'/?act=form-them-'.$title_url);
                }else {
                    // $_SESSION['alert_error'] =1;
                    echo 'Lỗi' ;
                }
            }else {
                $gia_tri = [
                    "id_thuoc_tinh"=>$id_thuoc_tinh,
                    "gia_tri"=>$gia_tri,
                ];
                $_SESSION['gia_tri'] = $gia_tri;
                $_SESSION['alert_error'] =1;
                
                header('Location:'.BASE_URL_ADMIN.'/?act=form-them-'.$title_url);
            }
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url);
        }
    }
  
    public function formEditGiaTriThuocTinh(){
        // Khai báo biến đổ form
        $title = "Sửa giá trị thuộc tính";
        $title_url = "gia-tri-thuoc-tinh";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> 'href='.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url,"ten"=> "Danh sách giá trị thuộc tính"],
            ["link"=> '',"ten"=> $title ],
        ];

        // Xử lí logic 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            if (isset($_SESSION['thuoc_tinh'])&&$id != $_SESSION['thuoc_tinh']['id']) {
                $thuoc_tinh = $this->modelGiaTriThuocTinh->getGiaTriThuocTinhByID( $id );
                $_SESSION['thuoc_tinh'] = $thuoc_tinh;
            }elseif(!isset($_SESSION['thuoc_tinh'])){
                $thuoc_tinh = $this->modelGiaTriThuocTinh->getGiaTriThuocTinhByID( $id );
                $_SESSION['thuoc_tinh'] = $thuoc_tinh;
            }
            
            require "./views/GiaTriThuocTinh/editGiaTriThuocTinh.php" ;
            deleteAlertSession();
            deleteSession('error');
            deleteSession('gia_tri');
        }else {
            header("Location:".BASE_URL_ADMIN."?/act=danh-sach".$title_url);
        }
    }

    public function editGiaTriThuocTinh(){
        $title_url = "gia-tri-thuoc-tinh";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'] ?? "";
            $gia_tri = $_POST['gia_tri'] ?? "";
            
            // var_dump($_POST);
            // die();
            $error = [];
            if (empty($gia_tri)) {
                $error['gia_tri'] = "Không được để trống";
            }
            // var_dump($error);die();
            $_SESSION['error'] = $error;
            if (empty($error)) {
                if ($this->modelGiaTriThuocTinh->updateGiaTriThuocTinh($id,$gia_tri) ) {
                    
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;
                    header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-'.$title_url.'&id='.$id);
                }else {
                    echo 'Lỗi' ;
                }
            }else {
                $thuoc_tinh = [
                    "id"=>$id,
                    "gia_tri"=>$gia_tri,
                ];
                $_SESSION['thuoc_tinh'] = $thuoc_tinh;
                $_SESSION['alert_error'] =1;
                header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-'.$title_url."&id=".$id);
            }
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url);
        }
    }

    public function deleteGiaTriThuocTinh(){
        $title_url = "gia-tri-thuoc-tinh";
        if ($_GET["id"] || $_POST['id']) {
            $id = $_GET['id'] ?? $_POST['id'] ;
            if (is_array($id)) {
                foreach ($id as $key => $value) {
                    if ($this->modelGiaTriThuocTinh->deleteGiaTriThuocTinh($value)) {
                        $_SESSION['alert_delete_success'] = 1;
                    }else{
                        echo "Lỗi khi xóa";
                    }
                }
            }else{
                if ($this->modelGiaTriThuocTinh->deleteGiaTriThuocTinh($id)) {
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
