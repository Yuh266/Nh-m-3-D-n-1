<?php 

class TaiKhoan{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }
    public function getTaiKhoanByID($id){
        $sql = "SELECT * FROM tai_khoans WHERE id=".$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }
    
    public function check_login($email) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email AND chuc_vu = 2 AND trang_thai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":email" => $email]);
            return $stmt->fetch(); // Lấy thông tin user nếu tìm thấy
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
  
    public function register($ho_ten, $anh_dai_dien, $so_dien_thoai, $gioi_tinh, $email,$chuc_vu,$hashed_password,$trang_thai,$ngay_sinh,$dia_chi){
        try {
            $sql = "INSERT INTO tai_khoans(ho_ten, anh_dai_dien, so_dien_thoai, gioi_tinh, email,chuc_vu,mat_khau,trang_thai,ngay_sinh,dia_chi) 
            VALUES(:ho_ten, :anh_dai_dien, :so_dien_thoai, :gioi_tinh, :email,:chuc_vu,:mat_khau,:trang_thai,:ngay_sinh,:dia_chi)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":ho_ten"=>$ho_ten,":anh_dai_dien"=>$anh_dai_dien,":so_dien_thoai"=>$so_dien_thoai,":gioi_tinh"=>$gioi_tinh,":email"=>$email,":chuc_vu"=>$chuc_vu,":mat_khau"=>$hashed_password,":trang_thai"=>$trang_thai,":ngay_sinh"=>$ngay_sinh,":dia_chi"=>$dia_chi]);
           
            return $this->conn->lastInsertId();
        } catch (Exception $th) {
            echo"Lôi". $th->getMessage();
        }
    }
     
  // Check email có tồn tại k
  function checkEmailById($email,$id) {
    try {
        
        $sql = 'SELECT COUNT(*) AS count FROM tai_khoans WHERE email = :email AND id != :id';
        $stmt =$this->conn->prepare($sql);
        $stmt->execute([
            ':email'=>$email,
            ':id'=>$id,
        ]);
        $result = $stmt->fetch();
        return $result['count'] > 0; 
    } catch (PDOException $th) {
        echo  $th->getMessage();
        return false;
    }
}
function checkEmail($email) {
    try {
        
        $sql = 'SELECT COUNT(*) AS count FROM tai_khoans WHERE email = :email ';
        $stmt =$this->conn->prepare($sql);
        $stmt->execute([
            ':email'=>$email
           
        ]);
        $result = $stmt->fetch();
        return $result['count'] > 0; 
    } catch (PDOException $th) {
        echo  $th->getMessage();
        return false;
    }
}
    public function updateTaikhoan($id,$ho_ten, $anh_dai_dien, $so_dien_thoai, $gioi_tinh, $email,$ngay_sinh,$dia_chi){
        try {
            $sql = "UPDATE tai_khoans SET ho_ten = :ho_ten , anh_dai_dien = :anh_dai_dien, so_dien_thoai= :so_dien_thoai,gioi_tinh=:gioi_tinh, email=:email, ngay_sinh=:ngay_sinh , dia_chi=:dia_chi WHERE id =".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":ho_ten"=>$ho_ten,":anh_dai_dien"=>$anh_dai_dien,":so_dien_thoai"=>$so_dien_thoai,":gioi_tinh"=>$gioi_tinh,":email"=>$email,":ngay_sinh"=>$ngay_sinh,":dia_chi"=>$dia_chi]);
            
            return true;
        }catch (Exception $th) {
            echo "Lỗi sql". $th->getMessage();
        }
    }

    public function updateMatKhau($userId, $hashedPassword){
        try {
            $sql = "UPDATE tai_khoans SET mat_khau=:mat_khau WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":mat_khau" => $hashedPassword,
                ":id" => $userId,
            ]);
            return true;
        } catch (Exception $th) {
            echo "Lỗi SQL: " . $th->getMessage();
            return false;
        }
    }
    
    
}

