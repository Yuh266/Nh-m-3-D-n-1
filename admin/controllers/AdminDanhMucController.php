<?php
class AdminDanhMucController{

    public $modelDanhMuc;

    public function __construct(){
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function listDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $title = "Danh Sách Danh Mục";
        require_once './views/Danhmuc/listDanhMuc.php';
    }

    public function formAddDanhMuc(){
        $title = "Thêm Danh Mục";
        require_once './views/Danhmuc/addDanhMuc.php';
        // Xóa session sau khi load trang
        deleteSessionError();
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
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=danh-sach-danh-muc');
                exit();
            }else{
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-danh-muc');
                exit();
            }
        }
    }

    public function formEditDanhMuc(){
        // Lấy ra thông tin cần sửa
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if($danhMuc){
            $title = "Sửa Danh Mục";
            require_once './views/Danhmuc/editDanhMuc.php';
        }else{
            header('Location: ' . BASE_URL_ADMIN . '?act=danh-sach-danh-muc');
            exit();
        }
    }

    public function postEditDanhMuc(){
        // Kiểm tra xem dữ liệu có phải được submit lên không
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Lấy dữ liệu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            // Tạo mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            // Nếu không có lỗi tiến hành sửa danh mục
            if(empty($errors)){
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=danh-sach-danh-muc');
                exit();
            }else{
                // Trả về form báo lỗi
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/Danhmuc/editDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if($danhMuc){
            $this->modelDanhMuc->destroyDanhMuc($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=danh-sach-danh-muc');
        exit();
    }
}