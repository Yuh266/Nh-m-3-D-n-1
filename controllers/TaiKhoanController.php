<?php

class TaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDanhMuc;
    public $modelGioHang;
 
    public function __construct() {
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelDanhMuc=new DanhMuc();
        $this->modelGioHang = new GioHang();
     
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
            $remember = isset($_POST['ghi_nho']); 
        
            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($mat_khau)) { 
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            } 
           
            $_SESSION['error_client_login'] = $errors;

            if (empty($errors)) {
               $user = $this->modelTaiKhoan->check_login($email);

            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                // Đăng nhập thành công
                $_SESSION['client_user'] = $user;
                if ($remember) {
                    // Lưu thông tin vào cookie nếu người dùng chọn "Ghi nhớ tôi"
                    setcookie('email', $email, time() + (86400 * 7), "/"); // Lưu trong 30 ngày
                    setcookie('mat_khau', $mat_khau, time() + (86400 * 7), "/"); 
                }
        
                header('Location: ' . BASE_URL . "");
                exit();
            } else {
                // Sai email hoặc mật khẩu
                $_SESSION['check-false'] = "Mật khẩu hoặc Email không đúng.";
                header('Location: ' . BASE_URL . "?act=login");
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
            $ho_ten = 'user'.time();
            $anh_dai_dien = $_FILES['file_anh'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '2';
            $email = $_POST['email'] ?? '';
            $chuc_vu = 2;
            $mat_khau = $_POST['mat_khau'] ?? '';
            $mat_khau_nhap_lai = $_POST['mat_khau_nhap_lai'] ?? '';
            $trang_thai =1;
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $link_anh=null;
            // Kiểm tra và xử lý file ảnh đại diện

            // if ($anh_dai_dien && $anh_dai_dien['error'] == 0) {
            //     $link_anh = upLoadFile($anh_dai_dien, "./uploads/");
            // }
    
            // Kiểm tra lỗi
            $errors = [];
            // if (empty($ho_ten)) {
            //     $errors['ho_ten'] = 'Họ tên không được để trống';
            // }
    
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($mat_khau)) { 
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            } 
            elseif (strlen($mat_khau) < 6) {
                $errors['mat_khau'] = 'Mật khẩu phải từ 6 ký tự';
            }
            if (empty($mat_khau_nhap_lai)) { 
                $errors['mat_khau_nhap_lai'] = 'Nhập lại mật khẩu';
            } 
            elseif($mat_khau_nhap_lai !== $mat_khau){
                $errors['mat_khau_nhap_lai'] = 'Mật khẩu không trùng khớp';
            }
            // if (empty($dia_chi)) { 
            //     $errors['dia_chi'] = 'Địa chỉ không được để trống';
            // } 
            // if (empty($so_dien_thoai)) { 
            //     $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';      
            // }
            // elseif (!is_numeric($so_dien_thoai)) {
            //     $errors['so_dien_thoai'] = 'Số điện thoại phải là số';
            // } elseif (strlen($so_dien_thoai) > 11  || strlen($so_dien_thoai) < 10 ) {
            //     $errors['so_dien_thoai'] = 'Vui lòng nhập lại số điện thoại';
            // }
            //  if (!isset($anh_dai_dien) || $anh_dai_dien['error'] != 0) {
            //     $errors['file_anh'] = 'Ảnh đại diện không được để trống';
            // }
            
            $date = empty($ngay_sinh) ? NULL : $ngay_sinh;  
            $_SESSION['error_register'] = $errors;
            
            // Nếu không có lỗi thì thêm vào database
            if (empty($errors)) {
                $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);
                if ($id = $this->modelTaiKhoan->register($ho_ten, $anh_dai_dien, $so_dien_thoai, $gioi_tinh, $email,$chuc_vu,$hashed_password,$trang_thai,$date,$dia_chi) ){
                    unset($_SESSION['error_register']);
                    // $_SESSION['success'] = 'Đăng kí tài khoản thành công!';
                    echo "<script>alert('Đăng kí thành công!');</script>";
                     $this->modelGioHang->insertID($id);
                    header('Refresh: 0.5; ' . BASE_URL . '?act=login'); // Tự động chuyển hướng sau 2 giây
                    exit();
                    
                    // exit;
                } 
            } else {
                // Lưu dữ liệu vào session để giữ lại dữ liệu khi có lỗi
                $_SESSION['tai_khoan_error_register'] = [
                    'ho_ten' => $ho_ten,
                    'anh_dai_dien' => $link_anh,
                    'so_dien_thoai'=> $so_dien_thoai,
                    'email' => $email,
                    'chuc_vu' => $chuc_vu,
                    'mat_khau' => $mat_khau, 
                    'trang_thai' => $trang_thai,
                    'ngay_sinh' => $date,
                   
                ];
                $_SESSION['alert_error_register'] = 'Có lỗi trong quá trình đăng kí';
                header('Location: ' . BASE_URL . '?act=register');
                exit;
            }
        


    }
    
    public function tai_khoan(){
        $list_danh_muc=$this->modelDanhMuc->getAllDanhMuc();
        $gio_hang = $this->modelGioHang->getGioHang($_SESSION['client_user']['id']);

        require './views/TrangChinh/tai_khoan.php' ;
              
    }

    public function post_update_Tai_Khoan() {
        $id = $_POST['id'] ?? "";
        $old_image = $_POST['old_image'] ?? "";
        $ho_ten = $_POST['ho_ten'] ?? "";
        $so_dien_thoai = $_POST['so_dien_thoai'] ?? "";
        $gioi_tinh = $_POST['gioi_tinh'] ?? null;
        $email = $_POST['email'] ?? "";
        $ngay_sinh = $_POST['ngay_sinh'] ?? null;
        $dia_chi = $_POST['dia_chi'] ?? null;
        $file_anh = $_FILES['file_anh'] ?? null;
    
        // Xác thực dữ liệu
        $error = [];
        if (empty($ho_ten)) {
            $error['ho_ten'] = "Không được bỏ trống";
        }
        if (empty($email)) {
            $error['email'] = "Không được bỏ trống";
        }
        $date = empty($ngay_sinh) ? NULL : $ngay_sinh;  
        $_SESSION['error_update_tk_client'] = $error;
    
        if (empty($error)) {
            // Xử lý ảnh
            $link_anh = $old_image;
            if ($file_anh && $file_anh["error"] == UPLOAD_ERR_OK) {
                $link_anh = upLoadFile($file_anh, "./uploads/");
                if (!empty($old_image)) {
                    deleteFile($old_image);
                }
            }
    
            // Cập nhật dữ liệu
            if ($this->modelTaiKhoan->updateTaikhoan($id, $ho_ten, $link_anh, $so_dien_thoai, $gioi_tinh, $email, $date, $dia_chi)) {
                $updatedUser = $this->modelTaiKhoan->getTaiKhoanById($id);
                    // var_dump($updatedUser);
                    // die();
                if ($updatedUser) {
                    $_SESSION['client_user'] = $updatedUser; // Cập nhật session
                    $_SESSION['alert_success_tk_client'] =1;
                    header('Location: ' . BASE_URL . '?act=tai_khoan');
                    exit();
                }
            } else {
                echo "Lỗi cập nhật thông tin tài khoản.";
            }
        } else {
            $_SESSION['tai_khoan_error'] = $_POST; // Lưu lại thông tin form
            $_SESSION['alert_error_tk_client'] = "Vui lòng kiểm tra lại thông tin.";
            header('Location: ' . BASE_URL . '?act=tai_khoan');
        }
    }
    //  end
    public function doi_mat_khau(){
        $list_danh_muc=$this->modelDanhMuc->getAllDanhMuc();
        

        require './views/TrangChinh/doi_mat_khau.php' ;
              
    }
    
    
    public function post_doi_mat_khau(){
        // Lấy dữ liệu từ form
        $password = $_POST['mat_khau'] ?? '';
        $repassword1 = $_POST['mat_khau_moi1'] ?? '';
        $repassword2 = $_POST['mat_khau_moi2'] ?? '';
        $userId = $_SESSION['client_user']['id'];
        $errors = [];
    
        // Kiểm tra đầu vào
        if (empty($password)) {
            $errors['mat_khau'] = 'Mật khẩu không được để trống';
        }
        if (empty($repassword1)) {
            $errors['mat_khau_moi1'] = 'Mật khẩu mới không được bỏ trống';
        }
        elseif (strlen($repassword1) < 6) {
            $errors['mat_khau_moi1'] = 'Mật khẩu phải từ 6 ký tự';
        }
        if (empty($repassword2)) { 
            $errors['mat_khau_moi2'] = 'Nhập lại mật khẩu mới';
        } 
        if ($repassword1 !== $repassword2) {
            $errors['mat_khau_moi2'] = 'Mật khẩu mới không trùng khớp.';
        }
    
        // Lưu lỗi vào session nếu có
        $_SESSION['error_doi_mat_khau'] = $errors;
 
        // Nếu có lỗi, chuyển hướng về trang đổi mật khẩu
        if (!empty($errors)) {
            header("Location: " . BASE_URL . "?act=doi_mat_khau");
            exit();
        }
        
        // Kiểm tra mật khẩu cũ khớp với hash trong cơ sở dữ liệu
        $currentHashedPassword = $_SESSION['client_user']['mat_khau']; // Lấy hash từ session
        // var_dump( $_SESSION['error_doi_mat_khau']);
        // die();
        if (!password_verify($password, $currentHashedPassword)) {
            $_SESSION['error_doi_mat_khau']['mat_khau'] = 'Mật khẩu cũ không chính xác.';
            header("Location: " . BASE_URL . "?act=doi_mat_khau");
            exit();
        }
    
        // Mã hóa mật khẩu mới
        $hashedPassword = password_hash($repassword1, PASSWORD_BCRYPT);
    
        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        $isUpdated = $this->modelTaiKhoan->updateMatKhau($userId, $hashedPassword);
    
        if ($isUpdated) {
           
            // Cập nhật lại session với hash mới
            $_SESSION['client_user']['mat_khau'] = $hashedPassword;
            unset($_SESSION['error_doi_mat_khau']);
            unset($_SESSION['client_user']);
            // Thông báo thành công
            echo "<script>alert('Đổi mật khẩu thành công !');</script>";
             header('Refresh:0.5;' . BASE_URL . '?act=login'); // Tự động chuyển hướng sau 2 giây
            exit();
        } else {
            // Nếu cập nhật thất bại
            $_SESSION['error']['mat_khau'] = 'Có lỗi xảy ra khi đổi mật khẩu. Vui lòng thử lại.';
            header("Location: " . BASE_URL . "?act=doi_mat_khau");
            exit();
        }
    }
}