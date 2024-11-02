<?php
class AdminLoaiHang{

    public $conn;

    public function __construct() {
        $this->conn = connectDB();
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


}





