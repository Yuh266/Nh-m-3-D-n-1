<?php 
class AdminThongKeController{
    public $modelDanhMuc;
    public $modelProduct;
    public $modelTaiKhoan;


    public function __construct()
    {
        $this->modelProduct = new AdminProduct();
        $this->modelDanhMuc = new AdminDanhMuc();
        $this->modelTaiKhoan= new AdminTaiKhoan();

    }

    public function home(){
        $listProduct = $this->modelProduct->getAllProduct();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $top5SanPham = $this->modelProduct->top5SanPhams();
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();


        $title = "Thống Kê";
            $link_navs = [
                ["link"=> 'href="'.BASE_URL_ADMIN.'"',"ten"=> "Trang Chủ"],
                ["link"=> 'href="'.BASE_URL_ADMIN.'/',"ten"=> "Thống Kê"],
                ["link"=> '',"ten"=> $title ],
            ];
        require_once './views/ThongKe.php';
    }



    
}