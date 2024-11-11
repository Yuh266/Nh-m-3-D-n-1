<?php 

class AdminDiaChiNhanHangController{
    public $modelDiaChi;

    public function __construct(){
        $this->modelDiaChi = new AdminDiaChiNhanHang();
    }

    public function listDiaChi(){
        
        // Khai báo biến title
        $title = "Danh sách địa chỉ nhận hàng";
        
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];

        $listDiaChi = $this->modelDiaChi->getAllDiaChi();

        require_once "./views/DiaChiNhanHang/listDiaChi.php";
    }

    public function deleteDiaChi(){
        if ($_GET["id"]) {
            $id = $_GET['id'];
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
                    var_dump($_GET["id"]);die();
                    echo "Lỗi khi xóa";
                }
            }
            header("Location:".BASE_URL_ADMIN."/?act=danh-sach-dia-chi-nhan-hang");
        }else {
            header("Location:".BASE_URL_ADMIN."/?act=danh-sach-dia-chi-nhan-hang");
        }

    }

}