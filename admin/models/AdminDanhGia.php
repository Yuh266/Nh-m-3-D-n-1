<?php
 class AdminDanhGia{
    public $conn;
    
    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllDanhGia(){
        try{
            $sql = 'SELECT  danh_gias.id_san_pham ,
                            san_phams.ten_san_pham,
                            COUNT(*) AS so_luong ,
                            MIN(danh_gias.ngay_danh_gia) AS ngay_cu_nhat ,
                            MAX(danh_gias.ngay_danh_gia) AS ngay_moi_nhat,
                            AVG(danh_gias.danh_gia) AS trung_binh_danh_gia
                    FROM danh_gias 
                    JOIN san_phams ON danh_gias.id_san_pham = san_phams.id
                    GROUP BY san_phams.ten_san_pham , danh_gias.id_san_pham
                    ';
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return $stmt->fetchAll() ;
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }
    public function getDanhGiaByIDSanPham($id){
        try{
            $sql = 'SELECT 	
                            danh_gias.id,
                            danh_gias.noi_dung,
                            danh_gias.ngay_danh_gia,
                            tai_khoans.ho_ten,
                            danh_gias.id_san_pham
                    FROM danh_gias 
                    JOIN san_phams ON danh_gias.id_san_pham = san_phams.id
                    JOIN tai_khoans ON danh_gias.id_tai_khoan = tai_khoans.id
                    WHERE danh_gias.id_san_pham = :id
                    GROUP BY danh_gias.id_san_pham, danh_gias.noi_dung, danh_gias.ngay_danh_gia, tai_khoans.ho_ten,danh_gias.id
                    ';
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute(['id'=>$id]) ;

            return $stmt->fetchAll() ;
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }

    public function getDanhGiaByID($id){
       try{
         
            $sql = "SELECT * FROM danh_gias WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
    
        return $stmt->fetch();
       }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
    }
    public function UpdateDanhGia($id,$trang_thai){
        try{
            $sql= 'UPDATE danh_gias set trang_thai=:trang_thai where id=:id';
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
    
    public function deleteDanhGia($id){
        try {
            $sql = "DELETE FROM danh_gias WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
        }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
        
    }
 }
 

?>