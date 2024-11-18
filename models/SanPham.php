<?php 
// require_once $_SERVER['DOCUMENT_ROOT'] . '/Du_an_1/models/AdminProduct.php';
class SanPham
{
    public $conn;
    public function __construct() {
        $this->conn = connectDB();    
    }
    public function getAllSanPham() {
        try {
            $sql = "SELECT * FROM san_phams
                    ORDER BY luot_xem 
                    ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    
    public function getAllProduct(){
        try{
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.id_danh_muc = danh_mucs.id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();          
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }


    public function getDetailSanPham($id){
        try{
            $sql =  'SELECT * FROM san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
            return false;
        }
    }

    public function getListAnhSanPham($id){
        try{
            $sql =  'SELECT * FROM hinh_anh_san_phams WHERE id_san_pham=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }


    public function getDetailAnhSanPham($id){
        try{
            $sql =  'SELECT * FROM hinh_anh_san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }


    public function getSanPhamByKeyword($keyword){
        try {
            $sql=" SELECT *  
                   FROM san_phams 
                   JOIN danh_mucs ON san_phams.id_danh_muc = danh_mucs.id
                   WHERE ten_san_pham LIKE :keyword
                    OR ten_danh_muc LIKE :keyword  
                ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":keyword"=> "%".$keyword."%" ,
            ]);

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo "".$th->getMessage();
        }
    }
    public function getSanPhamByPrice($keyword,$price_max,$price_min){
        try {
            $sql=" SELECT *  
                   FROM san_phams 
                   JOIN danh_mucs ON san_phams.id_danh_muc = danh_mucs.id
                   WHERE (ten_san_pham LIKE :keyword
                    OR ten_danh_muc LIKE :keyword  )
                    AND gia_khuyen_mai > :price_min
                    AND gia_khuyen_mai < :price_max
                ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":keyword"=> "%".$keyword."%" ,
                ":price_min"=> $price_min,
                ":price_max"=> $price_max,
            ]);

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo "".$th->getMessage();
        }
    }
    

}

