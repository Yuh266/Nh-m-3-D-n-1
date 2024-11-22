<?php 

class AdminThuocTinhSanPham{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB() ;
    }

    public function getAllThuocTinhSanPham(){  
        try {
            $sql = "SELECT * FROM thuoc_tinh_san_phams ";
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return $stmt->fetchAll() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    } 

    public function getThuocTinhSanPhamByID($id){
        try {
            $sql = "SELECT * FROM thuoc_tinh_san_phams WHERE id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return $stmt->fetch() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }
    public function insertThuocTinhSanPham($ten_thuoc_tinh){
        try {
            $sql = "INSERT INTO `thuoc_tinh_san_phams`(`ten_thuoc_tinh`) 
                    VALUES (:ten_thuoc_tinh)
                   ";
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute([
                ":ten_thuoc_tinh"=>$ten_thuoc_tinh,
            ]) ;

            return $this->conn->lastInsertId() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

    public function updateThuocTinhSanPham($id,$ten_thuoc_tinh){
        try {
            $sql = "UPDATE thuoc_tinh_san_phams 
                    SET 
                        ten_thuoc_tinh=:ten_thuoc_tinh
                    WHERE
                        id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute([
                ":ten_thuoc_tinh"=>$ten_thuoc_tinh,
            ]) ;

            return true ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

    public function deleteThuocTinhSanPham($id){
        try {
            $sql = "DELETE FROM thuoc_tinh_san_phams WHERE id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return true ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

}