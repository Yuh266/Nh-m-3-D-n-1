<?php
class AdminDanhMucController{

    public $modelDanhMuc;

    public function __construct(){
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function listDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $title = "Danh Sách Danh Mục";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        require_once './views/Danhmuc/listDanhMuc.php';
        deleteAlertSession();
        deleteSession('error');
        deleteSession('danh_muc');
    }

    public function formAddDanhMuc(){
        $title = "Thêm Danh Mục";
        $link_navs = [
            ["link"=> 'href="'.BASE_URL_ADMIN.'"',"ten"=> "Trang Chủ"],
            ["link"=> 'href="'.BASE_URL_ADMIN.'/?act=danh-sach-danh-muc"',"ten"=> "Danh Sách Danh Mục"],
            ["link"=> '',"ten"=> $title ],
        ];
        require_once './views/Danhmuc/addDanhMuc.php';
        // Xóa session sau khi load trang
        deleteAlertSession();
        deleteSession('error');
        deleteSession('danh_muc');
    }

    public function postAddDanhMuc(){
        // Kiểm tra xem dữ liệu có phải được submit lên không
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Lấy dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            // Tạo mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            $_SESSION['error'] = $errors;

            // Nếu không có lỗi tiến hành thêm danh mục
            if(empty($errors)){
                if($id = $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta)){
                    session_unset();
                    $_SESSION['alert_success']=1;
                    $_SESSION['id_active'] = $id;
                    header('Location: ' . BASE_URL_ADMIN . '?act=form-them-danh-muc');
                    exit();
                }else{
                    echo "Lỗi";
                }
                
            }else{
                
                $_SESSION['alert_error']=1;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-danh-muc');
                exit();
            }
        }
    }

    public function formEditDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        
        if($danhMuc){
            $title = "Sửa Danh Mục";
            $link_navs = [
                ["link"=> 'href="'.BASE_URL_ADMIN.'"',"ten"=> "Trang Chủ"],
                ["link"=> 'href="'.BASE_URL_ADMIN.'/?act=danh-sach-danh-muc"',"ten"=> "Danh Sách Danh Muc"],
                ["link"=> '',"ten"=> $title ],
            ];
            require_once './views/Danhmuc/editDanhMuc.php';
            deleteAlertSession();
            deleteSessionError();
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=danh-sach-danh-muc');
            exit();
        }
    }

    public function postEditDanhMuc(){
        // Kiểm tra xem dữ liệu có phải được submit lên không
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Lấy dữ liệu
            $id = $_POST['id'] ?? '';
            $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            // Tạo mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            $_SESSION['error'] = $errors;

            // Nếu không có lỗi tiến hành sửa danh mục
            if(empty($errors)){
                if($this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta)){
                    session_unset();
                    $_SESSION['alert_success']=1;
                    $_SESSION['id_active'] = $id;
                    header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danh_muc='.$id);
                    exit();
                }else{
                    echo "Lỗi";
                }    
            }else{
                // Trả về form báo lỗi
                $danh_muc = [
                    'id'=>$id,
                    'ten_danh_muc'=>$ten_danh_muc,
                    'mo_ta'=>$mo_ta
                ];
                $_SESSION['danh_muc'] = $danh_muc;
                // var_dump($_SESSION);die();
                $_SESSION['flash'] = 1 ;
                $_SESSION['alert_error']=1;
                // $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                // require_once './views/Danhmuc/editDanhMuc.php';
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danh_muc='.$id);
                exit();  
            }
        }
    }

    public function deleteDanhMuc(){
        // $id = $_GET['id_danh_muc'];
        // $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        // if($danhMuc){
        //     $this->modelDanhMuc->destroyDanhMuc($id);
        // }
        // header('Location: ' . BASE_URL_ADMIN . '?act=danh-sach-danh-muc');
        // exit();

        if ($_GET['id_danh_muc'] || $_POST["id"]) {
            $id = $_GET['id_danh_muc'] ?? $_POST["id"];
            if (is_array($id)) {
                foreach ($id as $value) {
                    $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($value);
                    if ($danhMuc) {
                        $this->modelDanhMuc->destroyDanhMuc($value);
                    }
                }
            } else {
                $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
                // var_dump($danhMuc);die();
                
                $this->modelDanhMuc->destroyDanhMuc($id);
            }
            
            $_SESSION['alert_delete_success'] = 1;
            header('Location:' . BASE_URL_ADMIN . '/?act=danh-sach-danh-muc');
            exit();
        } else {
            header('Location:' . BASE_URL_ADMIN . '/?act=danh-sach-danh-muc');
            exit();
        }
    }
}
