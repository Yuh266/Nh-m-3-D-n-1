<?php 

class TaiKhoan{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function check_login($email,$password){

        try {
            $sql="SELECT * from tai_khoans where email='$email' and mat_khau='$password' and trang_thai=1 and chuc_vu=2 or chuc_vu=3 ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
             return $stmt->fetch();
        } catch (Exception $th) {
            echo "". $th->getMessage();
        }
    }

    
}

