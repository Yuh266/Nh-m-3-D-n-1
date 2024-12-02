<?php
session_start();
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)


// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ




spl_autoload_register(function ($class) {
    $fileName = "$class.php";
    $fileModel = PATH_ADMIN_CONTROLLERS . $fileName ;
    $fileController = PATH_ADMIN_MODELS . $fileName ;
    // var_dump($fileModel);die();


    if (is_readable($fileModel)) {
        require_once $fileModel ;
    }elseif (is_readable($fileController)) {
        require_once $fileController ;
    }
});


// $act = $_GET['act'] ?? '/';
if (isset($_GET['act'])) {
    $act = $_GET['act'] ;
}else{
    $act = '/';
}


if ( !isset($_SESSION['user'])  && !in_array($act,['form-dang-nhap','dang-nhap'])  ) {
    header('Location:'.BASE_URL_ADMIN.'/?act=form-dang-nhap');
}elseif (isset($_SESSION['user']) && $_SESSION['user']['chuc_vu'] == 2 && !in_array($act,['form-dang-nhap','dang-nhap'])) {
    header('Location:'.BASE_URL_ADMIN.'/?act=form-dang-nhap');
}

// var_dump($_SESSION['user']['chuc_vu']);die();



// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match


match ($act) {
    // Trang chủ
    '/' => (new AdminThongKeController())->home(),

    // Route Sản phẩm
    "danh-sach-san-pham"=>(new AdminProductController())->listProduct(),


    "form-them-san-pham"=>(new AdminProductController())->formAddSanPham(),
    "them-san-pham"=>(new AdminProductController())->postAddSanPham(),

    "form-sua-san-pham"=>(new AdminProductController())->formEditSanPham(),
    "sua-san-pham"=>(new AdminProductController())->postEditSanPham(),
    'sua-album-anh-san-pham' => (new AdminProductController())->postEditAnhSanPham(),
    "xoa-san-pham"=>(new AdminProductController())->deleteSanPham(),
    // Route sản phẩm biến thể
    "danh-sach-san-pham-bien-the"=>(new AdminProductController())->listProduct(),


    "form-them-san-pham-bien-the"=>(new AdminSanPhamBienTheController())->formAddSanPhamBienThe(),
    "them-san-pham-bien-the"=>(new AdminSanPhamBienTheController())->postAddSanPhamBienThe(),
    "form-sua-san-pham-bien-the"=>(new AdminSanPhamBienTheController())->formEditSanPhamBienThe(),
    "sua-san-pham-bien-the"=>(new AdminSanPhamBienTheController())->postEditSanPhamBienThe(),
    "xoa-san-pham-bien-the"=>(new AdminSanPhamBienTheController())->deleteSanPhamBienThe(),

    'sua-album-anh-san-pham-bien-the' => (new AdminProductController())->postEditAnhSanPham(),
    // "xoa-san-pham-bien-the"=>(new AdminProductController())->deleteSanPham(),


    // Biến thể sản phẩm
    "danh-sach-thuoc-tinh-san-pham"=>(new AdminThuocTinhSanPhamController())->listThuocTinhSanPham(),


    "form-them-thuoc-tinh-san-pham"=>(new AdminThuocTinhSanPhamController())->formAddThuocTinhSanPham(),
    "them-thuoc-tinh-san-pham"=>(new AdminThuocTinhSanPhamController())->addThuocTinhSanPham(),


    "form-sua-thuoc-tinh-san-pham"=>(new AdminThuocTinhSanPhamController())->formEditThuocTinhSanPham(),
    "sua-thuoc-tinh-san-pham"=>(new AdminThuocTinhSanPhamController())->editThuocTinhSanPham(),
   
    "xoa-thuoc-tinh-san-pham"=>(new AdminThuocTinhSanPhamController())->deleteThuocTinhSanPham(),


     // Biến thể sản phẩm
     "danh-sach-gia-tri-thuoc-tinh"=>(new AdminGiaTriThuocTinhController())->listGiaTriThuocTinh(),


     "form-them-gia-tri-thuoc-tinh"=>(new AdminGiaTriThuocTinhController())->formAddGiaTriThuocTinh(),
     "them-gia-tri-thuoc-tinh"=>(new AdminGiaTriThuocTinhController())->addGiaTriThuocTinh(),
 
    //  "form-sua-gia-tri-thuoc-tinh"=>(new AdminGiaTriThuocTinhController())->formEditGiaTriThuocTinh(),
    //  "sua-gia-tri-thuoc-tinh"=>(new AdminGiaTriThuocTinhController())->editGiaTriThuocTinh(),
     
     "xoa-gia-tri-thuoc-tinh"=>(new AdminGiaTriThuocTinhController())->deleteGiaTriThuocTinh(),


    // Route danh mục
    "danh-sach-danh-muc"=>(new AdminDanhMucController())->listDanhMuc(),


    "form-them-danh-muc"=>(new AdminDanhMucController())->formAddDanhMuc(),
    "them-danh-muc"=>(new AdminDanhMucController())->postAddDanhMuc(),
   
    "form-sua-danh-muc"=>(new AdminDanhMucController())->formEditDanhMuc(),
    "sua-danh-muc"=>(new AdminDanhMucController())->postEditDanhMuc(),


    "xoa-danh-muc"=>(new AdminDanhMucController())->deleteDanhMuc(),
    // Tài khoản


    "form-dang-nhap"=>(new AdminTaiKhoanController())->formLogin(),
    "dang-nhap"=>(new AdminTaiKhoanController())->login(),
    "dang-xuat"=>(new AdminTaiKhoanController())->logout(),


    "danh-sach-tai-khoan"=>(new AdminTaiKhoanController())->listTaiKhoan(),
    "form-them-tai-khoan"=>(new AdminTaiKhoanController())->formAddTaiKhoan(),
    "them-tai-khoan"=>(new AdminTaiKhoanController())->postAddTaiKhoan(),
    "form-sua-tai-khoan"=>(new AdminTaiKhoanController())->formEditTaiKhoan(),
    "sua-tai-khoan"=>(new AdminTaiKhoanController())->postEditTaiKhoan(),
    "xoa-tai-khoan"=>(new AdminTaiKhoanController())->deleteTaiKhoan(),


    // Slide Show
    "danh-sach-slide-show"=>(new AdminSlideShowController())->listSlideShow(),
   
    "form-them-slide-show"=>(new AdminSlideShowController())->formAddSlideShow(),
    "them-slide-show"=>(new AdminSlideShowController())->postAddSlideShow(),


    "form-sua-slide-show"=>(new AdminSlideShowController())->formEditSlideShow(),
    "sua-slide-show"=>(new AdminSlideShowController())->postEditSlideShow(),
   
    "xoa-slide-show"=>(new AdminSlideShowController())->deleteSlideShow(),
    
    // Địa chỉ nhận hàng
    "danh-sach-dia-chi-nhan-hang"=>(new AdminDiaChiNhanHangController())->listDiaChi(),
   
    "form-them-dia-chi-nhan-hang"=>(new AdminDiaChiNhanHangController())->formAddDiaChi(),
    "them-dia-chi-nhan-hang"=>(new AdminDiaChiNhanHangController())->addDiaChi(),


    "form-sua-dia-chi-nhan-hang"=>(new AdminDiaChiNhanHangController())->formEditDiaChi(),
    "sua-dia-chi-nhan-hang"=>(new AdminDiaChiNhanHangController())->editDiaChi(),
   
    "xoa-dia-chi-nhan-hang"=>(new AdminDiaChiNhanHangController())->deleteDiaChi(),


    // Trạng thái đơn hàng
    "danh-sach-trang-thai-don-hang"=>(new AdminTrangThaiDonHangController())->listTrangThai(),
   
    "form-them-trang-thai-don-hang"=>(new AdminTrangThaiDonHangController())->formAddTrangThai(),
    "them-trang-thai-don-hang"=>(new AdminTrangThaiDonHangController())->addTrangThai(),


    "form-sua-trang-thai-don-hang"=>(new AdminTrangThaiDonHangController())->formEditTrangThai(),
    "sua-trang-thai-don-hang"=>(new AdminTrangThaiDonHangController())->editTrangThai(),
   
    "xoa-trang-thai-don-hang"=>(new AdminTrangThaiDonHangController())->deleteTrangThai(),
    
    // Bình luận
    "danh-sach-binh-luan"=>(new AdminBinhLuanController())->listBinhLuan(),
    "xoa-binh-luan"=>(new AdminBinhLuanController())->deleteBinhLuan(),
    "sua-binh-luan"=>(new AdminBinhLuanController())->updateBinhLuan(),

    // Đánh Giá
    "danh-sach-danh-gia"=>(new AdminDanhGiaController())->listDanhGia() ,
    "xoa-danh-gia"=>(new AdminDanhGiaController())->deleteDanhGia() ,
    "danh-sach-danh-gia-chi-tiet"=>(new AdminDanhGiaController())->listDanhGiaByIDSanPham() ,

    // Đơn hàng chi tiết
    "danh-sach-don-hang"=>(new AdminDonHangController())->listDonHang(),
    "xoa-danh-sach-don-hang"=>(new AdminDonHangController())->deleteDonHangByID(),
    "chi-tiet-don-hang"=>(new AdminDonHangController())->formChiTietDonHang(),
    "sua-chi-tiet-don-hang"=>(new AdminDonHangController())->postChiTietDonHang(),
    
};

