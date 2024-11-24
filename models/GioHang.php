<?php 

class GioHang{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }
    
    public function getChiTietGioHang($id_gio_hang) {
        try {
            $sql = 'SELECT san_phams.id, san_phams.gia_san_pham, san_phams.gia_khuyen_mai, san_phams.ten_san_pham, san_phams.hinh_anh, 
                    chi_tiet_gio_hangs.id AS id, chi_tiet_gio_hangs.so_luong,(san_phams.gia_khuyen_mai * chi_tiet_gio_hangs.so_luong) AS thanh_tien
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

    public function insertID($id){
        try{
                $sql="INSERT INTO  gio_hangs (id_tai_khoan) VALUES (:id)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id' => $id]);
                return $this->conn->lastInsertId();
        } catch (Exception $e){
            echo "Lỗi insert id tk vo gio hang: ".$e->getMessage();
        }
    }
    public function insertGioHang($id_san_pham, $id_gio_hang, $so_luong){
        try{
            $sql="INSERT INTO chi_tiet_gio_hangs(id_san_pham, id_gio_hang, so_luong) VALUES (:id_san_pham,:id_gio_hang,:so_luong)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham' => $id_san_pham,
                ':id_gio_hang' => $id_gio_hang,
                ':so_luong' => $so_luong,
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e){
            echo "Lỗi insert id tk vo gio hang: ".$e->getMessage();
        }
    }

    public function getChiTietGioHangByID($id){
        try {
            $sql = 'SELECT * FROM chi_tiet_gio_hangs
            WHERE  id = '.$id ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $th) {
            echo ''. $th->getMessage();
        }
    }
    public function deleteChiTietGioHang($id){
        try {
            $sql = 'DELETE FROM `chi_tiet_gio_hangs` WHERE id= '.$id ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
        } catch (Exception $th) {
            echo ''. $th->getMessage();
        }
    }
    

}
  





