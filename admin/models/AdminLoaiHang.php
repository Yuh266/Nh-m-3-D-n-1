<?php
class AdminLoaiHang{

    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllLoaiHang(){
        $sql = "SELECT * FROM loai_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getLoaiHangByID($id){
        $sql = "SELECT * FROM loai_hang WHERE id=".$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function insertLoaiHang($ten_loai_hang, $mo_ta){
        try {
            $sql = "INSERT INTO loai_hang(ten_loai_hang, mo_ta) VALUES(:ten_loai_hang, :mo_ta)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":ten_loai_hang"=>$ten_loai_hang,"mo_ta"=>$mo_ta]);

            return true;
        } catch (Exception $th) {
            echo"Lôi". $th->getMessage();
        }

    }
    
    public function updateLoaiHang($id,$ten_loai_hang, $mo_ta){
        try {
            $sql = "UPDATE loai_hang SET ten_loai_hang = :ten_loai_hang , mo_ta = :mo_ta WHERE id =".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":ten_loai_hang"=>$ten_loai_hang,"mo_ta"=>$mo_ta]);
            
            return true;
        }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
    }

    public function deleteLoaiHang($id){
        try {
            $sql = "DELETE FROM loai_hang WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
        }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
    }

}





