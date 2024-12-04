<?php
 class AdminBinhLuan{
    public $conn;

    
    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllBinhLuan(){
        try{
            $sql = 'SELECT  binh_luans.id_san_pham ,
                            san_phams.ten_san_pham,
                            COUNT(*) AS so_luong ,
                            MIN(binh_luans.ngay_dang) AS ngay_cu_nhat ,
                            MAX(binh_luans.ngay_dang) AS ngay_moi_nhat
                            
                    FROM binh_luans 
                    JOIN san_phams ON binh_luans.id_san_pham = san_phams.id
                    GROUP BY san_phams.ten_san_pham , binh_luans.id_san_pham
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }

    public function getBinhLuanByIDSanPham($id){
       try{
         
        $sql = 'SELECT 	
                            binh_luans.id,
                            binh_luans.noi_dung,
                            binh_luans.ngay_dang,
                            tai_khoans.ho_ten,
                            binh_luans.id_san_pham
                    FROM binh_luans 
                    JOIN san_phams ON binh_luans.id_san_pham = san_phams.id
                    JOIN tai_khoans ON binh_luans.id_tai_khoan = tai_khoans.id
                    WHERE binh_luans.id_san_pham = :id
                    GROUP BY binh_luans.id_san_pham, binh_luans.noi_dung, binh_luans.ngay_dang, tai_khoans.ho_ten,binh_luans.id
                    ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
    
        return $stmt->fetchAll();
       }
       catch (Exception $th) {
        echo "Lỗi". $th->getMessage();
    }
    }
    public function UpdateBinhLuan($id,$trang_thai){
        try{
            $sql= 'UPDATE binh_luans set trang_thai=:trang_thai where id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=> $id,
                ':trang_thai'=> $trang_thai
           ]);
        
           return true;
        }
        catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
    }
    
    public function deleteBinhLuan($id){
        try {
            $sql = "DELETE FROM binh_luans WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
        }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
        
    }
 }
 

?>