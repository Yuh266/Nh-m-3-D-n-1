<?php 

class AdminDiaChiNhanHang{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB() ;
    }

    public function getAllDiaChi(){  
        try {
            $sql = "SELECT * FROM dia_chi_nhan_hangs";
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return $stmt->fetchAll() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    } 

    public function getAllDiaChiByID($id){
        try {
            $sql = "SELECT * FROM dia_chi_nhan_hangs WHERE id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return $stmt->fetch() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }
    public function insertDiaChi($id_tai_khoan,$ten_nguoi_nhan,$sdt_nguoi_nhan,$dia_chi_nguoi_nhan){
        try {
            $sql = "INSERT INTO dia_chi_nhan_hangs(id_tai_khoan,ten_nguoi_nhan,sdt_nguoi_nhan,dia_chi_nguoi_nhan) 
                    VALUE (:id_tai_khoan,:ten_nguoi_nhan,:sdt_nguoi_nhan,:dia_chi_nguoi_nhan)
                   ";
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute([
                ":id_tai_khoan"=>$id_tai_khoan,
                ":ten_nguoi_nhan"=>$ten_nguoi_nhan,
                ":sdt_nguoi_nhan"=>$sdt_nguoi_nhan,
                ":dia_chi_nguoi_nhan"=>$dia_chi_nguoi_nhan,
            ]) ;

            return $this->conn->lastInsertId() ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

    public function updateDiaChi($id,$id_tai_khoan,$ten_nguoi_nhan,$sdt_nguoi_nhan,$dia_chi_nguoi_nhan){
        try {
            $sql = "UPDATE dia_chi_nhan_hangs 
                    SET 
                        id_tai_khoan=:id_tai_khoan,
                        ten_nguoi_nhan=:ten_nguoi_nhan,
                        sdt_nguoi_nhan=:sdt_nguoi_nhan,
                        dia_chi_nguoi_nhan=:dia_chi_nguoi_nhan
                    WHERE
                        id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute([
                ":id_tai_khoan"=>$id_tai_khoan,
                ":ten_nguoi_nhan"=>$ten_nguoi_nhan,
                ":sdt_nguoi_nhan"=>$sdt_nguoi_nhan,
                ":dia_chi_nguoi_nhan"=>$dia_chi_nguoi_nhan,
            ]) ;

            return true ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

    public function deleteDiaChi($id){
        try {
            $sql = "DELETE FROM dia_chi_nhan_hangs WHERE id=".$id;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return true ;
        } catch (Exception $th) {
            echo $th->getMessage() ;
        }
    }

}