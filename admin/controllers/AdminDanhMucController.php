<?php
class AdminDanhMucController{
    public $modelDanhMuc;
    
    public function __construct(){
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function danhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/Danhmuc/listDanhMuc.php';
    }

    public function formAddDanhMuc(){
        require_once './views/Danhmuc/addDanhMuc.php';
        // Xóa session sau khi load trang
        // deleteSessionError();
    }

    public function postAddDanhMuc(){
        // Kiểm tra xem dữ liệu có được submit lên không
        if($_SESSION['REQUEST_METHOD'] == 'POST'){
            // Lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            // Tạo mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            $_SESSION['error'] = $errors;

            // Nếu không có lỗi thì tiến hành thêm danh mục
            if(empty($errors)){
                $this->modelDanhMuc->insertDanhMuc(ten_danh_muc: $ten_danh_muc, mo_ta: $mo_ta);
                header(header: 'Location'.BASE_URL_ADMIN.'?act=danh-muc');
                exit();
            }else{
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header(header: 'Location'.BASE_URL_ADMIN.'?act=form-them-danh-muc');
                exit(); 
            }
        }
    }

    public function formEditDanhMuc(){
        // Lấy ra thông tin danh mục cần sửa
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc(id: $id);
        if($danhMuc){
            require_once '../views/Danhmuc/editDanhMuc.php';
        }else{
            header(header: 'Location'.BASE_URL_ADMIN.'?act=danh-muc');
            exit();
        }
    }

    public function postEditDanhMuc(){
        // Kiểm tra xem dữ liệu có được submit lên không
        if($_SESSION['REQUEST_METHOD'] == 'POST'){
            // Lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            // Tạo mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            $_SESSION['error'] = $errors;

            // Nếu không có lỗi thì tiến hành thêm danh mục
            if(empty($errors)){
                $this->modelDanhMuc->updateDanhMuc(id: $id, ten_danh_muc: $ten_danh_muc, mo_ta: $mo_ta);
                header(header: 'Location'.BASE_URL_ADMIN.'?act=danh-muc');
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
            $this->modelDanhMuc->destroyDanhMuc(id: $id);
        }
        header(header: 'Location'.BASE_URL_ADMIN.'?act=danh-muc');
        exit();
    }
}