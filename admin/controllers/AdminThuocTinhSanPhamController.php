<?php 

class AdminThuocTinhSanPhamController{

    public $modelThuocTinhSanPham;

    public function __construct(){
        $this->modelThuocTinhSanPham = new AdminThuocTinhSanPham();
    }

    public function listThuocTinhSanPham(){
        $title = "Danh sách thuộc tính biến thể";
        $title_url = "thuoc-tinh-san-pham";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        $listThuocTinhSanPham = $this->modelThuocTinhSanPham->getAllThuocTinhSanPham();

        require_once "./views/ThuocTinhSanPham/listThuocTinhSanPham.php";
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }
        deleteAlertSession();
        deleteSession('error');
        deleteSession('thuoc_tinh');
    }

    public function formAddThuocTinhSanPham(){
        $title = "Thêm thuộc tính biến thể";
        $title_url = "thuoc-tinh-san-pham";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> 'href='.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url,"ten"=> "Danh sách thuộc tính biến thể"],
            ["link"=> '',"ten"=> $title ],
        ];

        require "./views/ThuocTinhSanPham/addThuocTinhSanPham.php" ;
        deleteAlertSession();
        deleteSession('error');
        deleteSession('thuoc_tinh');
    }
    public function addThuocTinhSanPham(){
        $title_url = "thuoc-tinh-san-pham";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_thuoc_tinh = $_POST['ten_thuoc_tinh'] ?? "";
           
            // var_dump($_POST);
            // die();
            $error = [];

            if (empty($ten_thuoc_tinh)) {
                $error['ten_thuoc_tinh'] = "Không được để trống";
            }
            // var_dump($error);die();
            $_SESSION['error'] = $error;
            // var_dump(empty($error));die();
            if (empty($error)) {
                if ($id=$this->modelThuocTinhSanPham->insertThuocTinhSanPham($ten_thuoc_tinh)) {
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;

                    header('Location:'.BASE_URL_ADMIN.'/?act=form-them-'.$title_url);
                }else {
                    // $_SESSION['alert_error'] =1;
                    echo 'Lỗi' ;
                }
            }else {
                $thuoc_tinh = [
                    "ten_thuoc_tinh"=>$ten_thuoc_tinh,
                ];
                $_SESSION['thuoc_tinh'] = $thuoc_tinh;
                $_SESSION['alert_error'] =1;
                
                header('Location:'.BASE_URL_ADMIN.'/?act=form-them-'.$title_url);
            }
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url);
        }
    }
  
    public function formEditThuocTinhSanPham(){
        // Khai báo biến đổ form
        $title = "Sửa thuộc tính biến thể";
        $title_url = "thuoc-tinh-san-pham";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> 'href='.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url,"ten"=> "Danh sách thuộc tính biến thể"],
            ["link"=> '',"ten"=> $title ],
        ];

        // Xử lí logic 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            if (isset($_SESSION['thuoc_tinh'])&&$id != $_SESSION['thuoc_tinh']['id']) {
                $thuoc_tinh = $this->modelThuocTinhSanPham->getThuocTinhSanPhamByID( $id );
                $_SESSION['thuoc_tinh'] = $thuoc_tinh;
            }elseif(!isset($_SESSION['thuoc_tinh'])){
                $thuoc_tinh = $this->modelThuocTinhSanPham->getThuocTinhSanPhamByID( $id );
                $_SESSION['thuoc_tinh'] = $thuoc_tinh;
            }
            
            require "./views/ThuocTinhSanPham/editThuocTinhSanPham.php" ;
            deleteAlertSession();
            deleteSession('error');
            deleteSession('thuoc_tinh');
        }else {
            header("Location:".BASE_URL_ADMIN."?/act=danh-sach".$title_url);
        }
    }

    public function editThuocTinhSanPham(){
        $title_url = "thuoc-tinh-san-pham";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'] ?? "";
            $ten_thuoc_tinh = $_POST['ten_thuoc_tinh'] ?? "";
            
            // var_dump($_POST);
            // die();
            $error = [];
            if (empty($ten_thuoc_tinh)) {
                $error['ten_thuoc_tinh'] = "Không được để trống";
            }
            // var_dump($error);die();
            $_SESSION['error'] = $error;
            if (empty($error)) {
                if ($this->modelThuocTinhSanPham->updateThuocTinhSanPham($id,$ten_thuoc_tinh) ) {
                    
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;
                    header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-'.$title_url.'&id='.$id);
                }else {
                    echo 'Lỗi' ;
                }
            }else {
                $thuoc_tinh = [
                    "id"=>$id,
                    "ten_thuoc_tinh"=>$ten_thuoc_tinh,
                ];
                $_SESSION['thuoc_tinh'] = $thuoc_tinh;
                $_SESSION['alert_error'] =1;
                header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-'.$title_url."&id=".$id);
            }
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-'.$title_url);
        }
    }

    public function deleteThuocTinhSanPham(){
        $title_url = "thuoc-tinh-san-pham";
        if ($_GET["id"] || $_POST['id']) {
            $id = $_GET['id'] ?? $_POST['id'] ;
            if (is_array($id)) {
                foreach ($id as $key => $value) {
                    if ($this->modelThuocTinhSanPham->deleteThuocTinhSanPham($value)) {
                        $_SESSION['alert_delete_success'] = 1;
                    }else{
                        echo "Lỗi khi xóa";
                    }
                }
            }else{
                if ($this->modelThuocTinhSanPham->deleteThuocTinhSanPham($id)) {
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
