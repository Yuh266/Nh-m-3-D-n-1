<?php 

class SanPhamBienThe
{
    public $conn;
    public function __construct() {
        $this->conn = connectDB();    
    }

    public function getSanPhamBienTheByIDSanPham($id_san_pham){
        try{
            $sql = 'SELECT thuoc_tinh_san_phams.ten_thuoc_tinh , gia_tri_thuoc_tinhs.gia_tri , bien_the_san_phams.id 
                    FROM bien_the_san_phams 
                    JOIN gia_tri_thuoc_tinhs ON bien_the_san_phams.id_gia_tri_thuoc_tinh = gia_tri_thuoc_tinhs.id
                    JOIN thuoc_tinh_san_phams ON gia_tri_thuoc_tinhs.id_thuoc_tinh = thuoc_tinh_san_phams.id
                    WHERE bien_the_san_phams.id_san_pham = '.$id_san_pham ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll();          
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }
    public function getThuocTinhByIDSanPham($id_san_pham){
        try{
            $sql = 'SELECT thuoc_tinh_san_phams.ten_thuoc_tinh
                    FROM bien_the_san_phams 
                    JOIN gia_tri_thuoc_tinhs ON bien_the_san_phams.id_gia_tri_thuoc_tinh = gia_tri_thuoc_tinhs.id
                    JOIN thuoc_tinh_san_phams ON gia_tri_thuoc_tinhs.id_thuoc_tinh = thuoc_tinh_san_phams.id
                    WHERE bien_the_san_phams.id_san_pham = '.$id_san_pham ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetch();          
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }
    public function getSanPhamBienTheByID($id){
        try{
            $sql = 'SELECT *
                    FROM bien_the_san_phams 
                    WHERE id = '.$id ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetch();          
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }

    public function getGiaTri($id){
        try{
            $sql = 'SELECT *
                    FROM gia_tri_thuoc_tinhs 
                    WHERE id = '.$id ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetch();          
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }




}