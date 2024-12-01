<?php
class AdminDanhGiaController{

    public $modelDanhGia;

    public function __construct(){
        $this->modelDanhGia = new AdminDanhGia();
    }

    public function listDanhGia(){
        $listDanhGia = $this->modelDanhGia->getAllDanhGia() ;
        // echo"<pre>";
        // var_dump($listDanhGia);die();
        $title = "Danh Sách Đánh Giá";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        
        require_once './views/DanhGia/listDanhGia.php';
        
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }

        deleteAlertSession();
        deleteSession('error');
        deleteSession('danh_gia');
    }
    public function listDanhGiaByIDSanPham(){
        if (!isset($_GET['id'])) {
            header('Location:'.BASE_URL_ADMIN.'');
        }
        $id = $_GET['id'] ;

        $listDanhGia = $this->modelDanhGia->getDanhGiaByIDSanPham($id) ;
        $title = "Danh Sách Đánh Giá Chi Tiết";
        
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        
        require_once './views/DanhGia/listDanhGiaChiTiet.php';
        
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }

        deleteAlertSession();
        deleteSession('error');
        deleteSession('danh_gia');
    }



    public function deleteDanhGia(){
        // var_dump($_POST);
        // die();

        if($_GET['id'] || $_POST["id"] ){
            $id = $_GET['id']??$_POST["id"];
            // var_dump($id);die();
            $id_san_pham = $_GET['id_san_pham']??"";


            if(is_array($id)){
                foreach($id as $key => $value){
                    // $this->modelDanhGia->getDanhGiaByID($id[$key]);
                    $this->modelDanhGia->deleteDanhGia($value);
                }
            }else{
                // $this->modelDanhGia->getDanhGiaByID($id);
                $this->modelDanhGia->deleteDanhGia($id);
            }
            $_SESSION['alert_delete_success']=1;
        }
        header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-danh-gia-chi-tiet&id='.$id_san_pham) ;
    }
    
}
