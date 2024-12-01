<?php
class AdminSanPhamBienTheController
{


    public $modelSanPhamBienThe;
    public $modelGiaTriThuocTinh;
    public $modelSanPham;


    public function __construct()
    {
        $this->modelSanPhamBienThe = new AdminSanPhamBienThe();
        $this->modelGiaTriThuocTinh = new AdminGiaTriThuocTinh();
        $this->modelSanPham = new AdminProduct();
       
    }


    public function listProduct()
    {
        $listProduct = $this->modelProduct->getAllProduct();
        $title = "Danh Sách Sản Phẩm";
        $link_navs = [
            ["link" => 'href=' . BASE_URL_ADMIN . '', "ten" => "Trang Chủ"],
            ["link" => '', "ten" => $title],
        ];
        require_once './views/product/listProduct.php';
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }
        deleteAlertSession();
        deleteSession('error');
        deleteSession('san_pham_bien_the');
    }


    public function formAddSanPhamBienThe()
    {  
        $list_gia_tri_thuoc_tinh = $this->modelGiaTriThuocTinh->getAllGiaTriThuocTinh();


        // $id_san_pham = $_GET['id_san_pham'];
        // $san_pham = $this->modelSanPham->getDetailSanPham($id_san_pham);


        $title = "Thêm Sản Phẩm Biến Thể";
        $link_navs = [
            ["link" => 'href="' . BASE_URL_ADMIN . '"', "ten" => "Trang Chủ"],
            ["link" => 'href="' . BASE_URL_ADMIN . '/?act=danh-sach-san-pham"', "ten" => "Danh Sách Sản Phẩm"],
            // ["link" => 'href="' . BASE_URL_ADMIN . '/?act=form-sua-san-pham"', "ten" => "Thêm Sản Phẩm"],
            ["link" => '', "ten" => $title],
        ];
       
        require_once './views/SanPhamBienThe/addSanPhamBienThe.php';


        // Xóa session sau khi load trang
        deleteSession('error');
        deleteSession('san_pham');
        deleteAlertSession();
    }


    public function postAddSanPhamBienThe()
    {
        // Kiểm tra xem dữ liệu có phải được submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $id_san_pham = $_POST['id_san_pham'] ?? '';
            $gia = $_POST['gia'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $id_gia_tri_thuoc_tinh = $_POST['id_gia_tri_thuoc_tinh'] ?? '';
           
            // var_dump($_POST);die();
            $hinh_anh = $_FILES['hinh_anh'] ?? null;


            //Lưu hình ảnh
            $file_thumb = uploadFile($hinh_anh, './uploads/');
            // var_dump($file_thumb);die();


            // Tạo mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($gia)) {
                $errors['gia'] = 'Không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Không được để trống';
            }
            if (empty($id_gia_tri_thuoc_tinh)) {
                $errors['id_gia_tri_thuoc_tinh'] = 'Không được để trống';
            }


            $_SESSION['error'] = $errors;


            if (empty($errors)) {
                //Nếu không có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');die();
                $this->modelSanPhamBienThe->insertBienTheSanPham($id_san_pham, $gia, $gia_khuyen_mai, $so_luong,$file_thumb,$id_gia_tri_thuoc_tinh);
                // var_dump($id_san_pham);die();
               
                $_SESSION['alert_success'] = 1;
                   
                header('Location: ' . BASE_URL_ADMIN. '?act=form-them-san-pham-bien-the&id_san_pham='.$id_san_pham);
                exit();
            } else {
                //Đặt chỉ thị xóa sesson sau khi hiển thị form
                // $_SESSION['flash'] = true;
                $san_pham = [
                    'gia' => $gia,
                    'gia_khuyen_mai' => $gia_khuyen_mai,
                    'so_luong' => $so_luong,
                    'id_gia_tri_thuoc_tinh' => $id_gia_tri_thuoc_tinh,
                ];


                $_SESSION['san_pham'] = $san_pham;
                // var_dump($san_pham);die();
                $_SESSION['alert_error'] = 1;
                header('Location: ' . BASE_URL_ADMIN. '?act=form-them-san-pham-bien-the&id_san_pham='.$id_san_pham);
                exit();
            }
        }
    }


    public function formEditSanPhamBienThe()
    {
        if (!isset($_GET['id'])) {
            header('Location: ' . BASE_URL_ADMIN. '?act=danh-sach-san-pham');
            exit();
        }
        $id = $_GET['id'];
        $list_gia_tri_thuoc_tinh = $this->modelGiaTriThuocTinh->getAllGiaTriThuocTinh();
        $san_pham_bien_the = $this->modelSanPhamBienThe->getSanPhamBienTheByID($id);
        if (!isset($_SESSION['san_pham'])) {
            $_SESSION['san_pham']= $san_pham_bien_the;
        }


        $title = "Sửa thông tin biến thể sản phẩm ";
        $link_navs = [
            ["link" => 'href="' . BASE_URL_ADMIN . '"', "ten" => "Trang Chủ"],
            ["link" => 'href="' . BASE_URL_ADMIN . '/?act=danh-sach-san-pham"', "ten" => "Danh Sách Sản Phẩm"],
            ["link" => '', "ten" => $title],
        ];
        if ($san_pham_bien_the) {


            require_once './views/SanPhamBienThe/editSanPhamBienThe.php';


            deleteSession('error');
            deleteSession('san_pham');
            deleteAlertSession();
        }else{
            header('Location: ' . BASE_URL_ADMIN. '?act=danh-sach-san-pham');
            exit();
        }
    }
    public function postEditSanPhamBienThe()
    {
        // var_dump($_SERVER);die();
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            $id = $_POST['id'] ?? '';
            $id_san_pham = $_POST['id_san_pham'] ?? '';
            $gia = $_POST['gia'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $id_gia_tri_thuoc_tinh = $_POST['id_gia_tri_thuoc_tinh'] ?? '';


            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $old_file = $_POST['hinh_anh_old'] ?? '';


            //Tạo mảng trống để chứa dữ liệu
           
            $errors = [];
            if (empty($gia)) {
                $errors['gia'] = 'Không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Không được để trống';
            }
            if (empty($id_gia_tri_thuoc_tinh)) {
                $errors['id_gia_tri_thuoc_tinh'] = 'Không được để trống';
            }


            $_SESSION['error'] = $errors;


            // Logic sửa ảnh
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                // Upload ảnh mới lên
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }


            // Nếu không có lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
               
                $this->modelSanPhamBienThe->updateBienTheSanPham($id,$id_san_pham, $gia, $gia_khuyen_mai, $so_luong,$new_file,$id_gia_tri_thuoc_tinh);
               
                $_SESSION['alert_success'] = 1;
                // $_SESSION['id_active'] = $id;
                header('Location: ' . BASE_URL_ADMIN . '/?act=form-sua-san-pham-bien-the&id=' . $id);
                exit();
            } else {
               
                $san_pham = [
                    'gia' => $gia,
                    'gia_khuyen_mai' => $gia_khuyen_mai,
                    'so_luong' => $so_luong,
                    'id_gia_tri_thuoc_tinh' => $id_gia_tri_thuoc_tinh,
                    'hinh_anh' => $old_file,
                    'id_san_pham' => $id_san_pham,
                    'id' => $id,
                ];
                $_SESSION['san_pham'] = $san_pham;
                // var_dump($san_pham);die();
                $_SESSION['alert_error'] = 1;
                // var_dump($id);die();


                header('Location: ' . BASE_URL_ADMIN . '/?act=form-sua-san-pham-bien-the&id=' . $id);
                exit();
            }
        }
        else {
            header( 'Location:'.BASE_URL_ADMIN);
        }
    }


    public function deleteSanPhamBienThe(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            // var_dump($id);die();
           
            $san_pham_bien_the = $this->modelSanPhamBienThe->getSanPhamBienTheByID( $id );
            $id_san_pham = $san_pham_bien_the['id_san_pham'];


            deleteFile($san_pham_bien_the['hinh_anh']);
            $this->modelSanPhamBienThe->deleteBienTheSanPham( $id );


            header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-san-pham&id_san_pham='.$id_san_pham) ;
        }else {
            header( ''.BASE_URL_ADMIN);
        }
    }


}



