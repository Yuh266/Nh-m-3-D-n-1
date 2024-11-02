<?php

class AdminLoaiHangController{
    
    public $modelLoaiHang ;

    function __construct(){
        $this->modelLoaiHang = new AdminLoaiHang();
    }

    public function formAddLoaiHang(){
        require "./views/LoaiHang/addLoaiHang.php";
    }

    public function postAddLoaiHang(){
        $ten_loai_hang = $_POST["ten_loai_hang"]?? "";
        $mo_ta = $_POST["ten_loai_hang"]?? "";
         if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($this->modelLoaiHang->insertLoaiHang($ten_loai_hang, $mo_ta)) {
                
            }else {
                echo "Lỗi";
            }
         }



    }

}