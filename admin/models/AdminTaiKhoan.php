<?php
class AdminTaiKhoan{

    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }
    
    public function getTaiKhoanByID($id){
        $sql = "SELECT * FROM tai_khoans WHERE id=".$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }
    public function getAllTaiKhoan(){
        $sql = "SELECT * FROM tai_khoans";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function addTaiKhoan($ho_ten, $anh_dai_dien, $so_dien_thoai, $gioi_tinh, $email,$chuc_vu,$hashed_password,$trang_thai,$ngay_sinh,$dia_chi){
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
    
    public function updateTaikhoan($id,$ho_ten, $anh_dai_dien, $so_dien_thoai, $gioi_tinh, $email,$chuc_vu,$hashed_password,$trang_thai,$ngay_sinh,$dia_chi){
        try {
            $sql = "UPDATE tai_khoans SET ho_ten = :ho_ten , anh_dai_dien = :anh_dai_dien, so_dien_thoai= :so_dien_thoai,gioi_tinh=:gioi_tinh, email=:email , chuc_vu=:chuc_vu , mat_khau=:mat_khau , trang_thai=:trang_thai , ngay_sinh=:ngay_sinh , dia_chi=:dia_chi WHERE id =".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":ho_ten"=>$ho_ten,":anh_dai_dien"=>$anh_dai_dien,":so_dien_thoai"=>$so_dien_thoai,":gioi_tinh"=>$gioi_tinh,":email"=>$email,":chuc_vu"=>$chuc_vu,":mat_khau"=>$hashed_password,":trang_thai"=>$trang_thai,":ngay_sinh"=>$ngay_sinh,":dia_chi"=>$dia_chi]);
            
            return true;
        }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
    }

    public function deleteTaiKhoan($id){
        try {
            $sql = "DELETE FROM tai_khoans WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
        }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
        
    }

    public function checkLoginAdmin($email){
        try {
            $sql = " SELECT * FROM tai_khoans 
                    WHERE email=:email  
                    AND (chuc_vu = 1 OR chuc_vu = 3) 
                    AND trang_thai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email'=>$email,
               
            ]);
            
            return $stmt->fetch() ;
        }catch (Exception $th) {
            echo $th->getMessage();           
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
    
    

   
}

