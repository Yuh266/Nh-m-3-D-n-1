<?php 

class AdminTrangThaiDonHang{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB() ;
    }

    public function getAllTrangThai(){  
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs ";
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return $stmt->fetchAll() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    } 

    public function getTrangThaiByID($id){
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs WHERE id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return $stmt->fetch() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }
    public function insertTrangThai($ten_trang_thai){
        try {
            $sql = "INSERT INTO `trang_thai_don_hangs`(`ten_trang_thai`) 
                    VALUES (:ten_trang_thai)
                   ";
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute([
                ":ten_trang_thai"=>$ten_trang_thai,
            ]) ;

            return $this->conn->lastInsertId() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

    public function updateTrangThai($id,$ten_trang_thai){
        try {
            $sql = "UPDATE trang_thai_don_hangs 
                    SET 
                        ten_trang_thai=:ten_trang_thai
                    WHERE
                        id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute([
                ":ten_trang_thai"=>$ten_trang_thai,
            ]) ;

            return true ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

    public function deleteTrangThai($id){
        try {
            $sql = "DELETE FROM trang_thai_don_hangs WHERE id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return true ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

}