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

    public function formEditSanPham()
    {
        //Hàm này dùng để hiển thì form nhập
        //Lấy ra thông tin của sản phẩm cần sửa
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelProduct->getDetailSanPham($id);
        $listAnhSanPham = $this->modelProduct->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $title = "Sửa thông tin sản phẩm " . $sanPham['ten_san_pham'];
        $link_navs = [
            ["link" => 'href="' . BASE_URL_ADMIN . '"', "ten" => "Trang Chủ"],
            ["link" => 'href="' . BASE_URL_ADMIN . '/?act=danh-sach-san-pham"', "ten" => "Danh Sách Sản Phẩm"],
            ["link" => '', "ten" => $title],
        ];
        if ($sanPham) {
            require_once './views/product/editProduct.php';
            deleteSession('error');
            deleteSession('san_pham');
            deleteAlertSession();
        }else{
            header('Location: ' . BASE_URL_ADMIN. '?act=danh-sach-san-pham');
            exit();
        }
    }

    public function postEditSanPham()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu cũ của sản phẩm
            $id_san_pham = $_POST['id_san_pham'] ?? '';
            // Truy vấn 
            $sanPhamOld = $this->modelProduct->getDetailSanPham($id_san_pham);
            $old_file = $sanPhamOld['hinh_anh']; // Lấy ảnh cũ để phục vụ sửa ảnh

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $id_danh_muc = $_POST['id_danh_muc'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            //Tạo mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($id_danh_muc)) {
                $errors['id_danh_muc'] = 'Danh mục bắt buộc phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái bắt buộc phải chọn';
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
                //Nếu không có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');
                $id = $this->modelProduct->updateSanPham(
                    $id_san_pham,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $id_danh_muc,
                    $trang_thai,
                    $mo_ta,
                    $new_file
                );
                // var_dump($id);die;
               
                $_SESSION['alert_success'] = 1;
                $_SESSION['id_active'] = $id;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $id_san_pham);
                exit();
            } else {
                //Đặt chỉ thị xóa sesson sau khi hiển thị form
                // $_SESSION['flash'] = true;
                $san_pham = [
                    'ten_san_pham' => $ten_san_pham,
                    'gia_san_pham' => $gia_san_pham,
                    'gia_khuyen_mai' => $ten_san_pham,
                    'so_luong' => $so_luong,
                    'ngay_nhap' => $ngay_nhap,
                    'id_danh_muc' => $id_danh_muc,
                    'trang_thai' => $trang_thai,
                    'mo_ta' => $mo_ta,
                    'hinh_anh' => $hinh_anh,
                ];
                $_SESSION['san_pham'] = $san_pham;
                // var_dump($san_pham);die();
                $_SESSION['alert_error'] = 1;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $id_san_pham);
                exit();
            }
        }
    }

    // Sửa album ảnh
    // - Sửa ảnh cũ
    //  + Thêm ảnh mới
    //  + Không thêm ảnh mới
    // - Không sửa ảnh cũ
    //  + Thêm ảnh mới
    //  + Không thêm ảnh mới
    // - Xóa ảnh cũ
    //  + Thêm ảnh mới
    //  + Không thêm ảnh mới

    public function postEditAnhSanPham()
    {
        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump(1);die();
            $id_san_pham = $_POST['id_san_pham'] ?? '';

            // Lấy danh sách sản phẩm hiên tại của sản phẩm
            $listAnhSanPhamCurrent = $this->modelProduct->getListAnhSanPham($id_san_pham);
            // Xử lý các ảnh đucợ gửi tới
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            // Khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cữ 
            $upload_file = [];

            // upload ảnh mới hoặc thay thế ảnh cũ
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    // var_dump($new_file);(die);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            // Lưu ảnh mới vào db và xóa ảnh cũ
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelProduct->getDetailAnhSanPham($file_info['id'])['link_anh'];

                    // Cập nhật ảnh cũ
                    $this->modelProduct->updateAnhSanPham($file_info['id'], $file_info['file']);

                    // Xóa ảnh cũ
                    deleteFile($old_file);
                } else {
                    // Thêm ảnh mới 
                    $this->modelProduct->insertAlbumSanPham($id_san_pham, $file_info['file']);
                }
            }

            // Xử lý xóa ảnh 
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                        
                    $this->modelProduct->destroyAnhSanPham($anh_id);

                    //Xóa file
                    deleteFile($anhSP['link_anh']);
                }
            }
            $_SESSION['alert_success'] = 1;
            header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $id_san_pham);
            exit();
        }
    }

    public function deleteSanPham(){
        if (isset($_GET['id_san_pham']) || isset($_POST["id"])) {
            $id = $_GET['id_san_pham'] ?? $_POST["id"]; 
            // var_dump(1111);die();
            if (is_array($id)) {
                foreach ($id as $value) {
                    $listAnhSanPham = $this->modelProduct->getListAnhSanPham($value);
                    if ($listAnhSanPham) {
                        foreach ($listAnhSanPham as $anhSP) {
                            if (!empty($anhSP['link_anh'])) {
                                deleteFile($anhSP['link_anh']);
                                $this->modelProduct->destroyAnhSanPham($anhSP['id']);
                            }
                        }
                    }
                    $sanPham = $this->modelProduct->getDetailSanPham($value);
                    if ($sanPham && !empty($sanPham['hinh_anh'])) {
                        deleteFile($sanPham['hinh_anh']);
                    }
                    $this->modelProduct->destroySanPham($value);
                }
            } else {
                $sanPham = $this->modelProduct->getDetailSanPham($id);
                if ($sanPham) {
                    if (!empty($sanPham['hinh_anh'])) {
                        deleteFile($sanPham['hinh_anh']);
                    }
                    
                    $listAnhSanPham = $this->modelProduct->getListAnhSanPham($id);
                    if ($listAnhSanPham) {
                        foreach ($listAnhSanPham as $anhSP) {
                            if (!empty($anhSP['link_anh'])) {
                                deleteFile($anhSP['link_anh']);
                            }
                        }
                    }
                    $this->modelProduct->destroySanPham($id);
                    $this->modelProduct->destroyAnhSanPham($id);
                }
            }
            
            $_SESSION['alert_delete_success'] = 1;
            header('Location:' . BASE_URL_ADMIN . '/?act=danh-sach-san-pham');
            exit();
        } else {
            header('Location:' . BASE_URL_ADMIN . '/?act=danh-sach-san-pham');
            exit();
        }
    }
}