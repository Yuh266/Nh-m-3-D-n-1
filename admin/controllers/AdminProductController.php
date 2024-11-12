<?php
class AdminProductController{

    public $modelProduct;
    public $modelDanhMuc;

    public function __construct(){
        $this->modelProduct = new AdminProduct();
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function listProduct(){
        $listProduct = $this->modelProduct->getAllProduct();
        $title = "Danh Sách Sản Phẩm";
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        require_once './views/product/listProduct.php';
        session_unset();
    }

    public function formAddSanPham(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $title = "Thêm Sản Phẩm";
        $link_navs = [
            ["link"=> 'href="'.BASE_URL_ADMIN.'"',"ten"=> "Trang Chủ"],
            ["link"=> 'href="'.BASE_URL_ADMIN.'/?act=danh-sach-san-pham"',"ten"=> "Danh Sách Sản Phẩm"],
            ["link"=> '',"ten"=> $title ],
        ];
        require_once './views/product/addProduct.php';
        // Xóa session sau khi load trang
        deleteSession('error');
        deleteSession('san_pham');
        deleteAlertSession();
    }

    public function postAddSanPham(){
        // Kiểm tra xem dữ liệu có phải được submit lên không
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Lấy dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $id_danh_muc = $_POST['id_danh_muc'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            // var_dump($_POST);die();
            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            //Lưu hình ảnh
            $file_thumb = uploadFile($hinh_anh, './uploads/');
            // var_dump($file_thumb);die();

            $img_array = $_FILES['img_array']; //Mảng hình ảnh

            // Tạo mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_san_pham)){
                $errors['ten_san_pham'] = 'Tên danh mục không được để trống';
            }
            if(empty($gia_san_pham)){
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if(empty($gia_khuyen_mai)){
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if(empty($so_luong)){
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if(empty($ngay_nhap)){
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if(empty($id_danh_muc)){
                $errors['id_danh_muc'] = 'Danh mục bắt buộc phải chọn';
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Trạng thái bắt buộc phải chọn';
            }

            $_SESSION['error'] = $errors;

            if(empty($errors)){
                //Nếu không có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');die();
                $id_san_pham = $this->modelProduct->insertSanPham($ten_san_pham,$gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap,
                $id_danh_muc, $trang_thai, $mo_ta, $file_thumb);
                // var_dump($id_san_pham);die();

                // Xử lý thêm album ảnh sản phẩm img_array 
                if(!empty($img_array['name'])){
                    foreach ($img_array['name'] as $key=>$value){
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelProduct->insertAlbumSanPham($id_san_pham, $link_hinh_anh);
                    }
                }
                    session_unset();
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id_san_pham;
                header('Location: ' . BASE_URL_ADMIN. '?act=form-them-san-pham');
                exit();
            }else{
                //Đặt chỉ thị xóa sesson sau khi hiển thị form
                // $_SESSION['flash'] = true;
                $san_pham = [
                    'ten_san_pham'=>$ten_san_pham,
                    'gia_san_pham'=>$gia_san_pham,
                    'gia_khuyen_mai'=>$ten_san_pham,
                    'so_luong'=>$so_luong,
                    'ngay_nhap'=>$ngay_nhap,
                    'id_danh_muc'=>$id_danh_muc,
                    'trang_thai'=>$trang_thai,  
                    'mo_ta'=>$mo_ta,  
                    'hinh_anh'=>$hinh_anh,  
                ];
                $_SESSION['san_pham']=$san_pham;
                // var_dump($san_pham);die();
                $_SESSION['alert_error']=1;
                header('Location: ' . BASE_URL_ADMIN. '?act=form-them-san-pham');
                exit();      
            }
        }
    }
}