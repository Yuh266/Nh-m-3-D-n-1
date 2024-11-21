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
    
    
    public function check_login($email,$mat_khau){

        try {
            $sql="SELECT * from tai_khoans where email=:email and mat_khau=:mat_khau ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":email"=>$email,":mat_khau"=>$mat_khau]);
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

    // public function updateMatKhau($mat_khau){
    //     try {
    //         $sql = "UPDATE tai_khoans SET  mat_khau=:mat_khau ";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([":mat_khau"=>$mat_khau]);
            
    //         return true;
    //     }catch (Exception $th) {
    //         echo "Lỗi". $th->getMessage();
    //     }
    // }
    // public function updateMatKhau($userEmail, $hashedPassword) {
    //     try{
            
    //         $sql="UPDATE tai_khoans SET mat_khau = ? WHERE email = ?";
    //         $stmt = $this->conn->prepare($sql);
    //         return $stmt->execute([$hashedPassword, $userEmail]);}
        
    //     catch (Exception $th) {
    //         echo "Lỗi". $th->getMessage();
    //     }
    // }

    // public function updateMatKhau($userEmail, $password) {
    //     try {
    //         $sql = "UPDATE tai_khoans SET mat_khau = ? WHERE email = ?";
    //         $stmt = $this->conn->prepare($sql);
    
    //         // Kiểm tra xem câu lệnh execute có thành công không
    //         if ($stmt->execute([$password,$userEmail ])) {
              
    //             return true; // Cập nhật thành công
    //             var_dump($stmt);
    //              die();
    //         }
            
    //          else {
    //             // Nếu không thành công, ghi lại lỗi
    //             throw new Exception("Không thể cập nhật mật khẩu. Vui lòng thử lại.");
    //         }
    //     } catch (Exception $th) {
    //         // Ghi lại chi tiết lỗi và trả về false
    //         echo "Lỗi: " . $th->getMessage();
    //         return false;
    //     }
    // }
    public function updateMatKhau($userId, $password){
        try {
            $sql = "UPDATE tai_khoans SET  mat_khau=:mat_khau  WHERE id =".$userId;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":mat_khau"=>$password]);         
            return true;
         
        }catch (Exception $th) {
            echo "Lỗi sql". $th->getMessage();
        }
    }
    
    
}

