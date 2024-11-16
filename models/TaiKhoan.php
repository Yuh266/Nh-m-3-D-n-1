<?php 

class TaiKhoan{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }
      
    
    
    public function check_login($email,$password){

        try {
            $sql="SELECT * from tai_khoans where email=:email and mat_khau=:mat_khau ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":email"=>$email,":mat_khau"=>$password]);
             return $stmt->fetch();
        } catch (Exception $th) {
            echo "". $th->getMessage();
        }
    }
    public function register($ho_ten, $anh_dai_dien, $so_dien_thoai, $gioi_tinh, $email,$chuc_vu,$mat_khau,$trang_thai,$ngay_sinh,$dia_chi){
        try {
            $sql = "INSERT INTO tai_khoans(ho_ten, anh_dai_dien, so_dien_thoai, gioi_tinh, email,chuc_vu,mat_khau,trang_thai,ngay_sinh,dia_chi) 
            VALUES(:ho_ten, :anh_dai_dien, :so_dien_thoai, :gioi_tinh, :email,:chuc_vu,:mat_khau,:trang_thai,:ngay_sinh,:dia_chi)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":ho_ten"=>$ho_ten,":anh_dai_dien"=>$anh_dai_dien,":so_dien_thoai"=>$so_dien_thoai,":gioi_tinh"=>$gioi_tinh,":email"=>$email,":chuc_vu"=>$chuc_vu,":mat_khau"=>$mat_khau,":trang_thai"=>$trang_thai,":ngay_sinh"=>$ngay_sinh,":dia_chi"=>$dia_chi]);

            return $this->conn->lastInsertId();
        } catch (Exception $th) {
            echo"Lôi". $th->getMessage();
        }

    }

    
}

