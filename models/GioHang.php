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
                    WHERE chi_tiet_gio_hangs.id_gio_hang = :id_gio_hang
                    AND chi_tiet_gio_hangs.id_bien_the_san_pham IS NULL ';
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_gio_hang' => $id_gio_hang]);
            
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            
        }
    }
    public function getChiTietGioHang2($id_gio_hang) {
        try {
            $sql = 'SELECT san_phams.ten_san_pham , bien_the_san_phams.gia_khuyen_mai ,bien_the_san_phams.hinh_anh,gia_tri_thuoc_tinhs.gia_tri,chi_tiet_gio_hangs.so_luong, chi_tiet_gio_hangs.so_luong * bien_the_san_phams.gia_khuyen_mai AS thanh_tien ,chi_tiet_gio_hangs.id
                    FROM chi_tiet_gio_hangs
                    JOIN san_phams ON chi_tiet_gio_hangs.id_san_pham = san_phams.id
                    JOIN bien_the_san_phams ON chi_tiet_gio_hangs.id_bien_the_san_pham = bien_the_san_phams.id
                    JOIN gia_tri_thuoc_tinhs ON bien_the_san_phams.id_gia_tri_thuoc_tinh = gia_tri_thuoc_tinhs.id
                    WHERE chi_tiet_gio_hangs.id_gio_hang = '.$id_gio_hang;
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
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
    public function insertGioHang($id_san_pham, $id_gio_hang, $so_luong,$id_bien_the){
        try{
            $sql="INSERT INTO chi_tiet_gio_hangs(id_san_pham, id_gio_hang, so_luong, id_bien_the_san_pham) VALUES (:id_san_pham,:id_gio_hang,:so_luong,:id_bien_the_san_pham)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham' => $id_san_pham,
                ':id_gio_hang' => $id_gio_hang,
                ':so_luong' => $so_luong,
                ':id_bien_the_san_pham' => $id_bien_the,
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
    
    public function updateQuantity($id, $quantityChange) {
        $sql = "SELECT so_luong FROM chi_tiet_gio_hangs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch();
    
        if ($result) {
            $newQuantity = $result['so_luong'] + $quantityChange;
            // Đảm bảo số lượng không nhỏ hơn 1
            $newQuantity = max(1, $newQuantity);
            
            $updateQuery = "UPDATE chi_tiet_gio_hangs SET so_luong = :so_luong WHERE id = :id";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->execute([
                ':so_luong'=> $newQuantity,
                ':id'=> $id
            ]);
    
            return $newQuantity;
        }
    
        return false;
    }
}
  





