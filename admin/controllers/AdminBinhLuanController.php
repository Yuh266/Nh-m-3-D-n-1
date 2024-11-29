<?php
class AdminBinhLuanController{

    public $modelBinhLuan;

    public function __construct(){
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    public function listBinhLuan(){
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        $title = "Danh Sách Bình Luận";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        require_once './views/BinhLuan/listBinhLuan.php';
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }
        deleteAlertSession();
        deleteSession('error');
        deleteSession('binh_luan');
    }
    public function deleteBinhLuan(){
        if($_GET['id'] || $_POST["id"]){
            $id = $_GET['id']??$_POST["id"];
            if(is_array($id)){
                foreach($id as $key => $value){
                    $this->modelBinhLuan->getBinhLuanByID($id[$key]);
                    $this->modelBinhLuan->deleteBinhLuan($id[$key]);
                }
            }else{
                $this->modelBinhLuan->getBinhLuanByID($id);
           
                $this->modelBinhLuan->deleteBinhLuan($id);
                
            }
            $_SESSION['alert_delete_success']=1;
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-binh-luan') ;
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-binh-luan') ;
        }
    }

    public function updateBinhluan(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['thay_doi_trang_thai'])) {
            $id = intval($_POST['id']);
            $trang_thai = intval($_POST['status']);
          
            $check = $this->modelBinhLuan->updateBinhLuan($id,$trang_thai);
            // var_dump($check);
            // die();

            if ($check) {
                $_SESSION['alert_success'] = 1 ;
                $_SESSION['id_active'] = $id;
               
               
            } else {
                echo "<script>alert('Cập nhật thất bại') </script>";
            }

           
            header('Location: ' . BASE_URL_ADMIN . '/?act=danh-sach-binh-luan');
            exit;
        }
    }
  
}
