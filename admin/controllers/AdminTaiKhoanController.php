<?php

class AdminTaiKhoanController{
    public $modelTaiKhoan;
    public function __construct(){
        $this->modelTaiKhoan= new AdminTaiKhoan();
    }
  
    public function formLogin(){
        
        require "./views/TaiKhoan/login.php";
        deleteAlertSession();
    }
    public function login(){
       if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            // var_dump($_POST);die();
            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($mat_khau)) { 
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            } 

            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                // Lấy thông tin người dùng từ cơ sở dữ liệu dựa trên email
                $user = $this->modelTaiKhoan->checkLoginAdmin($email); 
                
                if ($user  && password_verify($mat_khau, $user['mat_khau'])) {
                    // Nếu mật khẩu hợp lệ, lưu thông tin người dùng vào session
                    $_SESSION['user'] = $user;
                    // Điều hướng đến trang admin
                    header("Location:" . BASE_URL_ADMIN);
                    
                } 
               
                else {
                    // var_dump(password_verify($mat_khau, $user['mat_khau']));
                    // die();
                    // Sai tài khoản hoặc mật khẩu
                    $_SESSION['alert_error'] = 'Tài khoản hoặc mật khẩu không tồn tại';
                    header('Location: ' . BASE_URL_ADMIN . '/?act=form-login');
                }
            } else {
                // Lưu dữ liệu vào session để giữ lại dữ liệu khi có lỗi
                $_SESSION['tai_khoan'] = [
                    'email' => $email,
                    'mat_khau' => $mat_khau,
                ];
                header('Location: ' . BASE_URL_ADMIN . '/?act=form-login');
                exit;
            }
       }

    }

    public function logout(){
         session_destroy();

        header('Location:'.BASE_URL_ADMIN."/?act=form-dang-nhap");
    }
    public function listTaiKhoan(){
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        $title = "Danh Sách Tài Khoản";
        // Mảng chỉnh sửa để dổ đg link nav (Phần html này đg ở layout/navbar)
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        require "./views/TaiKhoan/listTaiKhoan.php";
        // Xóa dòng bảng đc tô màu sau khi load trang
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }
        deleteAlertSession();
        deleteSession('error');
        deleteSession('tai_khoan');
    }
    public function formAddTaiKhoan() {
        $title = "Thêm Tài Khoản";
        $link_navs = [
            ["link" => 'href="' . BASE_URL_ADMIN . '"', "ten" => "Trang Chủ"],
            ["link" => 'href="' . BASE_URL_ADMIN . '/?act=danh-sach-tai-khoan"', "ten" => "Danh Sách Tài Khoản"],
            ["link" => '', "ten" => $title],
        ];
        require "./views/TaiKhoan/addTaiKhoan.php";
        deleteSession('error');
        deleteSession('tai_khoan');
    }
    
    public function postAddTaiKhoan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $ho_ten = $_POST['ho_ten'] ?? '';
            $anh_dai_dien = $_FILES['file_anh'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $email = $_POST['email'] ?? '';
            $chuc_vu = $_POST['chuc_vu'] ?? null;
            $mat_khau = $_POST['mat_khau'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? null;
            if($trang_thai==null){
                $trang_thai=1;
            }
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
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            $checkEmail= $this->modelTaiKhoan->checkEmail($email);
            // var_dump($checkEmail);
            // die();
            if($checkEmail){
                $errors['email'] = 'Email đã tồn tại ';
            }
            if (empty($mat_khau)) { 
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            } 
            elseif (!is_numeric($so_dien_thoai)) {
                    $errors['so_dien_thoai'] = 'Số điện thoại phải là số';
                } elseif (strlen($so_dien_thoai) > 11  || strlen($so_dien_thoai) < 10 ) {
                    $errors['so_dien_thoai'] = 'Vui lòng nhập lại số điện thoại';
                }
            $date = empty($ngay_sinh) ? NULL : $ngay_sinh;  
            $_SESSION['error'] = $errors;
            $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);
            // Nếu không có lỗi thì thêm vào database
            if (empty($errors)) {
                if ($id = $this->modelTaiKhoan->addTaiKhoan($ho_ten, $link_anh, $so_dien_thoai, $gioi_tinh, $email, $chuc_vu, $hashed_password, $trang_thai, $date, $dia_chi)) {
                    unset($_SESSION['error']);
                    $_SESSION['alert_success'] = 'Thêm tài khoản thành công!';
                    $_SESSION['id_active'] = $id;
                    header('Location: ' . BASE_URL_ADMIN . '/?act=form-them-tai-khoan');
                    exit;
                } else {
                    error_log("Error adding account to the database");
                    echo "Lỗi khi thêm tài khoản!";
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
                $_SESSION['alert_error'] = 'Có lỗi trong quá trình thêm tài khoản';
                header('Location: ' . BASE_URL_ADMIN . '/?act=form-them-tai-khoan');
                exit;
            }
        }
    }
    

    public function formEditTaiKhoan(){
        if ($_GET['id']) {
            $id = $_GET['id'];

         
            if (isset($_SESSION['tai_khoan']['id'])) {
             
                if($id != $_SESSION['tai_khoan']['id']){
                    $tai_khoan = $this->modelTaiKhoan->getTaiKhoanByID( $id );
                    $_SESSION['tai_khoan'] = $tai_khoan;
                    
                }
            }
            
            // var_dump($dd);
            if(!isset($_SESSION['tai_khoan'])){
                $tai_khoan = $this->modelTaiKhoan->getTaiKhoanByID( $id );
                $_SESSION['tai_khoan'] = $tai_khoan;
               
                
            }

            // var_dump($_SESSION['slide_show']);die();
            $title = "Sửa Tài Khoản " ;
            // Mảng chỉnh sửa để dổ đg link nav (Phần html này đg ở layout/navbar)
            $link_navs = [
                ["link"=> 'href="'.BASE_URL_ADMIN.'"',"ten"=> "Trang Chủ"],
                ["link"=> 'href="'.BASE_URL_ADMIN.'/?act=danh-sach-tai-khoan"',"ten"=> "Danh Sách Tài Khoản"],
                ["link"=> '',"ten"=> $title ],
            ];


            require "./views/TaiKhoan/editTaiKhoan.php";
            deleteSession('error');
            deleteSession('tai_khoan');
        }else{
            header("Location:".BASE_URL_ADMIN."?act=danh-sach-tai-khoan") ;
        }        
    }
    public function postEditTaiKhoan() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'] ?? "";
            $old_image = $_POST['old_image'] ?? ($_POST['anh_dai_dien'] ?? "");
            $ho_ten = $_POST['ho_ten'] ?? "";
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? "";
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $email = $_POST['email'] ?? "";
            $chuc_vu = $_POST['chuc_vu'] ?? null;
            $mat_khau = $_POST['mat_khau'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? null;
            $ngay_sinh = $_POST['ngay_sinh'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
    
            $file_anh = $_FILES['file_anh'] ?? "";
            $error = [];
    
            // Validate dữ liệu
            if (empty($ho_ten)) {
                $error['ho_ten'] = "Không được bỏ trống";
            }
    
            if (empty($email)) {
                $error['email'] = "Không được bỏ trống";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Email không hợp lệ';
            } elseif ($this->modelTaiKhoan->checkEmailById($email, $id)) {
                $error['email'] = 'Email đã tồn tại';
            }
            
            if (!empty($so_dien_thoai)) {
                if (!is_numeric($so_dien_thoai)) {
                    $error['so_dien_thoai'] = 'Số điện thoại phải là số';
                } elseif (strlen($so_dien_thoai) > 11 || strlen($so_dien_thoai) < 10) {
                    $error['so_dien_thoai'] = 'Vui lòng nhập lại số điện thoại';
                }
            }
    
            $date = empty($ngay_sinh) ? null : $ngay_sinh;
    
            $_SESSION['error'] = $error;
    
            if (empty($error)) {
                $hashed_password = $mat_khau ? password_hash($mat_khau, PASSWORD_DEFAULT) : null;
    
                // Xử lý ảnh
                if (isset($file_anh) && $file_anh["error"] == UPLOAD_ERR_OK) {
                    $link_anh = upLoadFile($file_anh, "./uploads/");
                    if (!empty($old_image)) {
                        deleteFile($old_image);
                    }
                } else {
                    $link_anh = $old_image;
                }
    
              
                $check = $this->modelTaiKhoan->updateTaikhoan(
                    $id, $ho_ten, $link_anh, $so_dien_thoai, $gioi_tinh, 
                    $email, $chuc_vu, $hashed_password, $trang_thai, $date, $dia_chi
                );
                // var_dump($check);
                // die();
    
                if ($check) {
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;
    
                    header('Location:' . BASE_URL_ADMIN . '/?act=form-sua-tai-khoan&id=' . $id);
                    exit();
                } else {
                    echo "Lỗi";
                }
            } else {
                // Trả về dữ liệu cũ nếu có lỗi
                $_SESSION['tai_khoan'] = [
                    'anh_dai_dien' => $old_image,
                    'id' => $id,
                    'ho_ten' => $ho_ten,
                    'so_dien_thoai' => $so_dien_thoai,
                    'gioi_tinh' => $gioi_tinh,
                    'email' => $email,
                    'chuc_vu' => $chuc_vu,
                    'mat_khau' => $mat_khau,
                    'trang_thai' => $trang_thai,
                    'ngay_sinh' => $date,
                    'dia_chi' => $dia_chi,
                ];
    
                $_SESSION['flash'] = 1;
                $_SESSION['alert_error'] = 1;
    
                header('Location:' . BASE_URL_ADMIN . '?act=form-sua-tai-khoan&id=' . $id);
                exit();
            }
        }
    }
    public function deleteTaiKhoan(){
        if($_GET['id'] || $_POST["id"]){
            $id = $_GET['id']??$_POST["id"];
            if(is_array($id)){
                foreach($id as $key => $value){
                    $tai_khoan = $this->modelTaiKhoan->getTaiKhoanByID($id[$key]);
                    deleteFile($tai_khoan['anh_dai_dien']);
                    $this->modelTaiKhoan->deleteTaiKhoan($id[$key]);
                }
            }else{
                $tai_khoan = $this->modelTaiKhoan->getTaiKhoanByID($id);
                // var_dump($slide_show);
                deleteFile($tai_khoan['anh_dai_dien']);
                $this->modelTaiKhoan->deleteTaiKhoan($id);
                
            }
            $_SESSION['alert_delete_success']=1;
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-tai-khoan') ;
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-tai-khoan') ;
        }
    }

    

    }


   


