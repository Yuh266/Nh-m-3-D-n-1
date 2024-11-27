<?php
class AdminSanPhamBienThe{
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
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
    public function getSanPhamBienTheByIDSanPham($id_san_pham){
        try{
            $sql = 'SELECT thuoc_tinh_san_phams.ten_thuoc_tinh , gia_tri_thuoc_tinhs.gia_tri , bien_the_san_phams.id ,bien_the_san_phams.gia_khuyen_mai
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
    public function getSanPhamBienTheByID($id){
        try{
            $sql = 'SELECT *
                    FROM bien_the_san_phams 
                    WHERE bien_the_san_phams.id = '.$id ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetch();          
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }
    

    public function insertBienTheSanPham($id_san_pham, $gia, $gia_khuyen_mai, $so_luong,$hinh_anh,$id_gia_tri_thuoc_tinh){
        try{
            $sql =  'INSERT INTO bien_the_san_phams( id_san_pham, gia, gia_khuyen_mai, so_luong, hinh_anh, id_gia_tri_thuoc_tinh) 
            VALUES( :id_san_pham, :gia, :gia_khuyen_mai, :so_luong, :hinh_anh, :id_gia_tri_thuoc_tinh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham'=>$id_san_pham,
                ':gia'=>$gia, 
                ':gia_khuyen_mai'=>$gia_khuyen_mai, 
                ':so_luong'=>$so_luong, 
                ':hinh_anh'=>$hinh_anh, 
                ':id_gia_tri_thuoc_tinh'=>$id_gia_tri_thuoc_tinh, 
            ]);

            // Lấy id sản phẩm vừa thêm
            return $this->conn->lastInsertId();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }
    public function updateBienTheSanPham($id,$id_san_pham, $gia, $gia_khuyen_mai, $so_luong,$hinh_anh,$id_gia_tri_thuoc_tinh){
        try{
            $sql =  'UPDATE bien_the_san_phams 
            SET  id_san_pham=:id_san_pham, gia=:gia, gia_khuyen_mai=:gia_khuyen_mai, so_luong=:so_luong, hinh_anh=:hinh_anh, id_gia_tri_thuoc_tinh=:id_gia_tri_thuoc_tinh
            WHERE id='.$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham'=>$id_san_pham,
                ':gia'=>$gia, 
                ':gia_khuyen_mai'=>$gia_khuyen_mai, 
                ':so_luong'=>$so_luong, 
                ':hinh_anh'=>$hinh_anh, 
                ':id_gia_tri_thuoc_tinh'=>$id_gia_tri_thuoc_tinh, 
            ]);

            return true ;
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }
    public function deleteBienTheSanPham($id){
        try{
            $sql =  'DELETE FROM bien_the_san_phams 
            WHERE id='.$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true ;
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }
 
 
}