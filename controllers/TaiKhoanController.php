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
        header('Location:'.BASE_URL."?act=login");
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

            $_SESSION['error_client_login'] = $errors;

            if (empty($errors)) {
                $user = $this->modelTaiKhoan->check_login( $email,$mat_khau );
              
                if($user){
                    $_SESSION['client_user']=$user;
        
                    header('Location:'.BASE_URL."");           
                } else{
                    $_SESSION['check-false']="Mật khẩu hoặc Email không đúng";
                    header('Location:'.BASE_URL. "?act=login");
                    exit();
                }
                
            
            } else {
              
                $_SESSION['tai_khoan_error_login'] = [
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
            $anh_dai_dien = $_FILES['file_anh'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $email = $_POST['email'] ?? '';
            $chuc_vu = $_POST['chuc_vu'] ?? null;
            $mat_khau = $_POST['mat_khau'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? null;
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
    
            // Kiểm tra và xử lý file ảnh đại diện
            $link_anh = null;
            if ($anh_dai_dien && $anh_dai_dien['error'] == 0) {
                $link_anh = upLoadFile($anh_dai_dien, "./uploads/");
            }
    
            // Kiểm tra lỗi
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($mat_khau)) { 
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            } 
            elseif (strlen($mat_khau) <= 6) {
                $errors['mat_khau'] = 'Mật khẩu phải lớn hơn 6 ký tự';
            }
            if (empty($dia_chi)) { 
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            } 
            if (empty($so_dien_thoai)) { 
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';      
            }
            elseif (!is_numeric($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại phải là số';
            } elseif (strlen($so_dien_thoai) > 11  || strlen($so_dien_thoai) < 10 ) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập lại số điện thoại';
            }
             if (!isset($anh_dai_dien) || $anh_dai_dien['error'] != 0) {
                $errors['file_anh'] = 'Ảnh đại diện không được để trống';
            }
            
            $date = empty($ngay_sinh) ? NULL : $ngay_sinh;  
            $_SESSION['error_register'] = $errors;
    
            // Nếu không có lỗi thì thêm vào database
            if (empty($errors)) {
                if ($id = $this->modelTaiKhoan->register($ho_ten, $link_anh, $so_dien_thoai, $gioi_tinh, $email, $chuc_vu, $mat_khau, $trang_thai, $date, $dia_chi)) {
                    unset($_SESSION['error_register']);
                    // $_SESSION['success'] = 'Đăng kí tài khoản thành công!';
                    echo "<script>alert('Đăng kí thành công!');</script>";
                    header('Refresh: 0.5; ' . BASE_URL . '?act=login'); // Tự động chuyển hướng sau 2 giây
                    exit();
                    
                    // exit;
                }  
            } else {
                // Lưu dữ liệu vào session để giữ lại dữ liệu khi có lỗi
                $_SESSION['tai_khoan_error_register'] = [
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
                $_SESSION['alert_error_register'] = 'Có lỗi trong quá trình đăng kí';
                header('Location: ' . BASE_URL . '?act=register');
                exit;
            }
        


    }
    
    public function tai_khoan(){
        $list_danh_muc=$this->modelDanhMuc->getAllDanhMuc();

        require './views/TrangChinh/tai_khoan.php' ;
              
    }

    
    // post update tk
    public function post_update_Tai_Khoan(){
            $id = $_POST['id'] ?? "" ;
            $old_image = $_POST['old_image'] ?? ($_POST['anh_dai_dien']  ?? "") ;
            $ho_ten = $_POST['ho_ten'] ?? "" ;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? "" ;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null ;
            $email  = $_POST['email'] ?? "" ;
            $ngay_sinh = $_POST['ngay_sinh'] ?? null ;
            $dia_chi = $_POST['dia_chi'] ?? null ;
            // var_dump($mat_khau);die();
            $file_anh = $_FILES['file_anh'] ?? "" ;
            // var_dump("Vào r");
            // Begin validate
            $error = [] ;
            if(empty($ho_ten)){
                $error['ho_ten'] = "Không được bỏ trống";
            }
            if(empty($email)){
                $error['email'] = "Không được bỏ trống";
            }
            if(empty($dia_chi)){
                $error['dia_chi'] = "Không được bỏ trống";
            }
            if(empty($so_dien_thoai)){
                $error['so_dien_thoai'] = "Không được bỏ trống";
            }
            $date = empty($ngay_sinh) ? NULL : $ngay_sinh;  
            // End validate
            
            $_SESSION['error_update_tk_client'] = $error;
            // var_dump($error);die();

            if (empty($error)) {
                // var_dump(444);die();
                // Xử lí ảnh
                if(isset($file_anh) && $file_anh["error"] == UPLOAD_ERR_OK  ){
                    $link_anh = upLoadFile($file_anh,"./uploads/");
                    if (!empty($old_image)) {
                        deleteFile($old_image);
                    }
                }else{
                    $link_anh = $old_image;
                }
                
                if ($this->modelTaiKhoan->updateTaikhoan($id,$ho_ten, $link_anh, $so_dien_thoai, $gioi_tinh, $email,$date,$dia_chi)){

                    $_SESSION['client_user'] = [
                        'id' => $id,
                        'ho_ten' => $ho_ten,
                        'so_dien_thoai' => $so_dien_thoai,
                        'gioi_tinh' => $gioi_tinh,
                        'email' => $email,
                        'ngay_sinh' => $date,
                        'dia_chi' => $dia_chi,
                        'anh_dai_dien' => $link_anh,
                    ];
                    $_SESSION['alert_success_tk_client'] = 1 ;
                  
                    
                   
                    header('Location:'.BASE_URL.'?act=tai_khoan') ;
                    exit();

                }else{
                    echo"Lỗi cap nhat thong tin";
                }
            }else {
                $_SESSION['tai_khoan_error'] = [
                    'ho_ten' => $ho_ten,  
                    'email' => $email,
                    'so_dien_thoai' => $so_dien_thoai,
                    'gioi_tinh' => $gioi_tinh,
                    'ngay_sinh' => $ngay_sinh,
                    'dia_chi' => $dia_chi
                ];
              
                
                $_SESSION['error_update_tk_client'] = $error;
                $_SESSION['alert_error_tk_client'] = 1 ;
               

                // var_dump(444);die();
                header('Location:'.BASE_URL.'?act=tai_khoan' ) ;
            }
        
    }
    //  end
    public function doi_mat_khau(){
        $list_danh_muc=$this->modelDanhMuc->getAllDanhMuc();
        require './views/TrangChinh/doi_mat_khau.php' ;
              
    }
    
    // public function post_doi_mat_khau(){
    //         $password = $_POST['mat_khau'] ?? '';
    //         $repassword1 = $_POST['mat_khau_moi1'] ??'' ;
    //         $repassword2 = $_POST['mat_khau_moi2'] ?? '';
    //         $errors = [];
    //         if (empty($password)) {
    //             $errors['mat_khau'] = 'Mật khẩu không được để trống';
    //         }
    //         if (empty($repassword1)) {
    //             $errors['mat_khau_moi1'] = 'Mật khẩu mới không được bỏ trống';
    //         }
    //         if (empty($repassword2)) { 
    //             $errors['mat_khau_moi2'] = 'Nhập lại mật khẩu mới';
    //         } 
    //         if ($repassword1 !== $repassword2) {
    //             $errors['mat_khau_moi2'] = 'Mật khẩu mới không trùng khớp.';
    //         }
    //         $_SESSION['error'] = $errors;
    //         
    //         if (empty($errors)) {
    //             if ($password !== $_SESSION['client_user']['mat_khau']) {
    //                 $errors['mat_khau'] = 'Mật khẩu cũ không chính xác.';
    //                 $_SESSION['error'] = $errors;
    //                 header("Location: " . BASE_URL . "?act=form-doi-mat-khau");
    //                 exit();
    //             }
                
    //             $hashedPassword = password_hash($repassword1, PASSWORD_BCRYPT); // Mã hóa mật khẩu mới
    //             $userEmail = $_SESSION['client_user']['email']; 

                
    //                 $isUpdated = $this->modelTaiKhoan->updateMatKhau($userEmail, $hashedPassword);

    //             if ($isUpdated) {
    //                 $_SESSION['success'] = 'Đổi mật khẩu thành công.';
    //                 header("Location: " . BASE_URL . "?act=login");
    //                 exit();
    //             } else {
    //                 $errors['mat_khau'] = 'Có lỗi xảy ra khi đổi mật khẩu. Vui lòng thử lại.';
    //                 $_SESSION['error'] = $errors;
    //             }
    //         }
            
    // }
    public function post_doi_mat_khau(){
      // Đảm bảo session đã được khởi tạo
        $password = $_POST['mat_khau'] ?? '';
        $repassword1 = $_POST['mat_khau_moi1'] ?? '';
        $repassword2 = $_POST['mat_khau_moi2'] ?? '';
        $userId = $_SESSION['client_user']['id'];
        $errors = [];
    
        if (empty($password)) {
            $errors['mat_khau'] = 'Mật khẩu không được để trống';
        }
        if (empty($repassword1)) {
            $errors['mat_khau_moi1'] = 'Mật khẩu mới không được bỏ trống';
        }
        if (empty($repassword2)) { 
            $errors['mat_khau_moi2'] = 'Nhập lại mật khẩu mới';
        } 
        if ($repassword1 !== $repassword2) {
            $errors['mat_khau_moi2'] = 'Mật khẩu mới không trùng khớp.';
            header("Location: " . BASE_URL . "?act=doi_mat_khau");
            exit();
        }
        $_SESSION['error'] = $errors;
    
   
    
        // Kiểm tra mật khẩu cũ chính xác
        if (empty($errors)) {
            if ($password !== $_SESSION['client_user']['mat_khau']) {
                echo( 'Mật khẩu cũ không chính xác.');
                header("Location: " . BASE_URL . "?act=doi_mat_khau");
                exit();
            }
    
            // Mã hóa mật khẩu mới
            // $hashedPassword = password_hash($repassword1, PASSWORD_BCRYPT);
            
            // var_dump($_SESSION['client_user']['id']);
            // die();
            // Cập nhật mật khẩu mới vào CSDL
            $isUpdated = $this->modelTaiKhoan->updateMatKhau($userId, $password);
            
            if ($isUpdated) {
                echo('Đổi mật khẩu thành công.');
                var_dump($_SESSION['client_user']['id']);
                die();
                $_SESSION['success'] = 'Đổi mật khẩu thành công.';
                // header("Location: " . BASE_URL . "?act=login");
                // exit();
               
            } else {
                $errors['mat_khau'] = 'Có lỗi xảy ra khi đổi mật khẩu. Vui lòng thử lại.';
                echo('Có lỗi xảy ra khi đổi mật khẩu. Vui lòng thử lại.');
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL . "?act=form-doi-mat-khau");             
                exit();
            }
        }
        
       
    }
}