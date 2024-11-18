<?php

class TaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDanhMuc;
 
    public function __construct() {
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelDanhMuc=new DanhMuc();
     
    }
    
    public function Login(){
        $list_danh_muc=$this->modelDanhMuc->getAllDanhMuc();
        require './views/TrangChinh/login.php' ;
     
        
    }
    
    public function Logout(){
        session_destroy();
        header('Location:'.BASE_URL."/?act=login");
    }
    
    public function post_Login(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
        
            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($mat_khau)) { 
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            } 

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $user = $this->modelTaiKhoan->check_login( $email,$mat_khau );
              
                if($user){
                    $_SESSION['user']=$user;
        
                    header('Location:'.BASE_URL."");           
                } else{
                    $_SESSION['check-false']="Mật khẩu hoặc Email không đúng";
                    header('Location:'.BASE_URL. "?act=login");
                    exit();
                }
                
            
            } else {
              
                $_SESSION['tai_khoan'] = [
                    'email' => $email,
                    'mat_khau' => $mat_khau, 
                ];
                header('Location: '. BASE_URL.'?act=login');
                exit();
            }
       }

        }
    

      
       
    
    public function register(){
        $list_danh_muc=$this->modelDanhMuc->getAllDanhMuc();
        require './views/TrangChinh/register.php' ;
    }
    public function post_Register(){
            // Lấy dữ liệu từ form
            $ho_ten = $_POST['ho_ten'] ?? '';
            $anh_dai_dien = $_FILES['file_anh'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $email = $_POST['email'] ?? '';
            $chuc_vu = $_POST['chuc_vu'] ?? null;
            $mat_khau = $_POST['mat_khau'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? null;
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? null;
    
            // Kiểm tra và xử lý file ảnh đại diện
            $link_anh = null;
            if ($anh_dai_dien && $anh_dai_dien['error'] == 0) {
                $link_anh = upLoadFile($anh_dai_dien, "/uploads/");
            }
    
            // Kiểm tra lỗi
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($mat_khau)) { 
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            } 
            $date = empty($ngay_sinh) ? NULL : $ngay_sinh;  
            $_SESSION['error'] = $errors;
    
            // Nếu không có lỗi thì thêm vào database
            if (empty($errors)) {
                if ($id = $this->modelTaiKhoan->register($ho_ten, $link_anh, $so_dien_thoai, $gioi_tinh, $email, $chuc_vu, $mat_khau, $trang_thai, $date, $dia_chi)) {
                    unset($_SESSION['error']);
                    // $_SESSION['success'] = 'Đăng kí tài khoản thành công!';
                    echo "<script>alert('Đăng kí thành công!');</script>";
                    header('Refresh: 0.5; ' . BASE_URL . '/?act=form-login'); // Tự động chuyển hướng sau 2 giây
                    exit();
                    
                    // exit;
                }  
            } else {
                // Lưu dữ liệu vào session để giữ lại dữ liệu khi có lỗi
                $_SESSION['tai_khoan'] = [
                    'ho_ten' => $ho_ten,
                    'anh_dai_dien' => $link_anh,
                    'so_dien_thoai' => $so_dien_thoai,
                    'gioi_tinh' => $gioi_tinh,
                    'email' => $email,
                    'chuc_vu' => $chuc_vu,
                    'mat_khau' => $mat_khau, 
                    'trang_thai' => $trang_thai,
                    'ngay_sinh' => $date,
                    'dia_chi' => $dia_chi
                ];
                $_SESSION['alert_error'] = 'Có lỗi trong quá trình đăng kí';
                header('Location: ' . BASE_URL . '?act=register');
                exit;
            }
        


    }
    public function tai_khoan(){
        require './views/TrangChinh/tai_khoan.php' ;
              
    }

    public function post_Tai_Khoan(){
        
    }
}