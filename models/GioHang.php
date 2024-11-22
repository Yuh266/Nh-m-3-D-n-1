<?php 

class GioHang{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function getDonHang(){

    }
    
    public function getChiTietGioHang($id_gio_hang) {
        try {
            $sql = 'SELECT san_phams.id, san_phams.gia_san_pham, san_phams.ten_san_pham, san_phams.hinh_anh, 
                        chi_tiet_gio_hangs.so_luong,(san_phams.gia_san_pham * chi_tiet_gio_hangs.so_luong) AS thanh_tien
                    FROM chi_tiet_gio_hangs
                    JOIN san_phams ON chi_tiet_gio_hangs.id_san_pham = san_phams.id
                    WHERE chi_tiet_gio_hangs.id_gio_hang = :id_gio_hang';
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_gio_hang' => $id_gio_hang]);
            
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            
        }
    }
    public function getGioHang($id){
        try{
            $sql = 'SELECT * FROM gio_hangs
                    WHERE  id_tai_khoan= :id';
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        }catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

        }
    }
    
}

