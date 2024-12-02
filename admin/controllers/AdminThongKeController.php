<?php 
class AdminThongKeController{
    public $modelDanhMuc;
    public $modelProduct;
    public $modelTaiKhoan;
    public $modelDonHang;


    public function __construct()
    {
        $this->modelProduct = new AdminProduct();
        $this->modelDanhMuc = new AdminDanhMuc();
        $this->modelTaiKhoan= new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();

    }

    public function home(){
        $listProduct = $this->modelProduct->getAllProduct();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $top5SanPham = $this->modelProduct->top5SanPhams();
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        $doanhThuNgay = $this->modelDonHang->doanhThuNgay();
        $doanhThuThang = $this->modelDonHang->doanhThuThang();
        $top5LuotXem = $this->modelProduct->top5LuotXem();
        $top5DanhGia = $this->modelProduct->top5DanhGia();


        function doanhThuNgay($doanhThuNgay) {
            $tongDoanhThu = 0;
            foreach ($doanhThuNgay as $item) {
                $tongDoanhThu += $item['doanh_thu'];
            }
            return $tongDoanhThu;
        }
        $tongDoanhThu = doanhThuNgay($doanhThuNgay);


        $title = "Thống Kê";
            $link_navs = [
                ["link"=> 'href="'.BASE_URL_ADMIN.'"',"ten"=> "Trang Chủ"],
                ["link"=> 'href="'.BASE_URL_ADMIN.'/',"ten"=> "Thống Kê"],
                ["link"=> '',"ten"=> $title ],
            ];
        require_once './views/ThongKe.php';
    }



    
}