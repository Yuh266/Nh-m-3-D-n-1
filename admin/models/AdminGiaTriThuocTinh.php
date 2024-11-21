<?php 

class AdminGiaTriThuocTinh{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB() ;
    }

    public function getAllGiaTriThuocTinh(){  
        try {
            $sql = "SELECT * FROM gia_tri_thuoc_tinhs ";
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return $stmt->fetchAll() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    } 

    public function getGiaTriThuocTinhByID($id){
        try {
            $sql = "SELECT * FROM gia_tri_thuoc_tinhs WHERE id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return $stmt->fetch() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }
    public function insertGiaTriThuocTinh($id_thuoc_tinh,$gia_tri){
        try {
            $sql = "INSERT INTO gia_tri_thuoc_tinhs(id_thuoc_tinh, gia_tri) 
                    VALUES (:id_thuoc_tinh,:gia_tri)
                   ";
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute([
                ":id_thuoc_tinh"=>$id_thuoc_tinh,
                ":gia_tri"=>$gia_tri,
            ]) ;

            return $this->conn->lastInsertId() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

    public function updateGiaTriThuocTinh($id,$id_thuoc_tinh,$ten_thuoc_tinh){
        try {
            $sql = "UPDATE gia_tri_thuoc_tinhs 
                    SET 
                        id_thuoc_tinh,=:id_thuoc_tinh,
                        ten_thuoc_tinh=:ten_thuoc_tinh
                    WHERE
                        id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute([
                ":id_thuoc_tinh,"=>$id_thuoc_tinh,
                ":ten_thuoc_tinh"=>$ten_thuoc_tinh,
            ]) ;

            return true ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

    public function deleteGiaTriThuocTinh($id){
        try {
            $sql = "DELETE FROM gia_tri_thuoc_tinhs WHERE id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return true ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

}