<?php 

class AdminDiaChiNhanHang{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB() ;
    }

    public function getTrangThai(){  
        try {
            $sql = "SELECT
                        dia_chi_nhan_hangs.`id` AS id, 
                        dia_chi_nhan_hangs.`id_tai_khoan` AS id_tai_khoan, 
                        dia_chi_nhan_hangs.`ten_nguoi_nhan` AS ten_nguoi_nhan, 
                        dia_chi_nhan_hangs.`sdt_nguoi_nhan` AS sdt_nguoi_nhan, 
                        dia_chi_nhan_hangs.`dia_chi_nguoi_nhan` AS dia_chi_nguoi_nhan, 
                        tai_khoans.email AS email 
                    FROM `dia_chi_nhan_hangs` 
                    JOIN tai_khoans 
                    ON dia_chi_nhan_hangs.id_tai_khoan = tai_khoans.id;";
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