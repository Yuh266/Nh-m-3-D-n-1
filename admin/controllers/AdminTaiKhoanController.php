<?php

class AdminTaiKhoanController{
    public $modelTaiKhoan;
    public function __construct(){
        $this->modelTaiKhoan= new AdminTaiKhoan();
    }
  
    public function formLogin(){
        
        require "./views/TaiKhoan/login.php";
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
                $user = $this->modelTaiKhoan->checkLoginAdmin( $email,$mat_khau );
                // var_dump($user);die();
                if (empty($user)) {
                    $_SESSION['alert_error'] = 'Tài khoản , mật khẩu không tồn tại';
                }else {
                    $_SESSION['user'] = $user;
                    // var_dump($_SESSION['user']);die();
                    header("Location:".BASE_URL_ADMIN);
                }
                // header('Location: ' . BASE_URL_ADMIN ) ;
            
            } else {
                // Lưu dữ liệu vào session để giữ lại dữ liệu khi có lỗi
                $_SESSION['tai_khoan'] = [
                    'email' => $email,
                    'mat_khau' => $mat_khau, 
                ];
                // var_dump($errors);die();
                // $_SESSION['alert_error'] = 'Có lỗi trong quá trình thêm tài khoản';
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
        $_SESSION['flash'] = 1 ;
        deleteAlertSession();
        require "./views/TaiKhoan/listTaiKhoan.php";
        // Xóa dòng bảng đc tô màu sau khi load trang
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }
        deleteSession('error');
        deleteSession('slide_show');
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
        deleteSession('slide_show');
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
                if ($id = $this->modelTaiKhoan->addTaiKhoan($ho_ten, $link_anh, $so_dien_thoai, $gioi_tinh, $email, $chuc_vu, $mat_khau, $trang_thai, $date, $dia_chi)) {
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
            deleteSession('slide_show');
        }else{
            header("Location:".BASE_URL_ADMIN."?act=danh-sach-tai-khoan") ;
        }        
    }
    public function postEditTaiKhoan(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'] ?? "" ;
            $old_image = $_POST['old_image'] ?? ($_POST['anh_dai_dien']  ?? "") ;
            $ho_ten = $_POST['ho_ten'] ?? "" ;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? "" ;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null ;
            $email  = $_POST['email'] ?? "" ;
            $chuc_vu = $_POST['chuc_vu'] ?? null ;
            $mat_khau = $_POST['mat_khau'] ?? '' ;
            $trang_thai = $_POST['trang_thai']  ?? null  ;
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
            if(empty($mat_khau)){
                $error['mat_khau'] = "Không được bỏ trống";
            }
            $date = empty($ngay_sinh) ? NULL : $ngay_sinh;  
            // End validate
            
            $_SESSION['error'] = $error;
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
                
                if ($this->modelTaiKhoan->updateTaikhoan($id,$ho_ten, $link_anh, $so_dien_thoai, $gioi_tinh, $email,$chuc_vu,$mat_khau,$trang_thai,$date,$dia_chi)){

                    
                    $_SESSION['alert_success'] = 1 ;
                    $_SESSION['id_active'] = $id ;
                    
                    // var_dump($_SESSION['id_active']);die();
                    header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-tai-khoan&id='.$id) ;

                }else{
                    echo"Lỗi";
                }
            }else {
                $tai_khoan = [
                    'anh_dai_dien'=>$old_image,
                    'id'=>$id,
                    'ho_ten'=>$ho_ten,
                    'so_dien_thoai'=>$so_dien_thoai,
                    'gioi_tinh'=>$gioi_tinh,
                    'email '=>$email ,
                    'chuc_vu'=>$chuc_vu,
                    'mat_khau'=>$mat_khau,
                    'trang_thai'=>$trang_thai,
                    'ngay_sinh'=>$date,
                    'dia_chi'=>$dia_chi
                ];
                $_SESSION['tai_khoan'] = $tai_khoan;
                $_SESSION['flash'] = 1 ;

                $_SESSION['alert_error'] = 1 ;

                // var_dump(444);die();
                header('Location:'.BASE_URL_ADMIN.'?act=form-sua-tai-khoan&id='.$id ) ;
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


   


