<?php 

class DonHang{
    
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function getDonHangByID($id){
        try {
            $sql = "SELECT * 
                    FROM `don_hangs` 
                    JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.id_don_hang
                    JOIN trang_thai_don_hangs ON don_hangs.id_trang_thai = trang_thai_don_hangs.id
                    JOIN san_phams ON chi_tiet_don_hangs.id = san_phams.id
                    WHERE id_tai_khoan =".$id ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }




}



