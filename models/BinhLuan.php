<?php 

class BinhLuan{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function getBinhLuan($id){
        try{
            $sql = 'SELECT binh_luans.id AS id_binh_luan, binh_luans.noi_dung, binh_luans.ngay_dang,
                    tai_khoans.ho_ten, tai_khoans.anh_dai_dien,san_phams.ten_san_pham, binh_luans.trang_thai
                    FROM binh_luans
                    JOIN tai_khoans ON binh_luans.id_tai_khoan = tai_khoans.id
                    JOIN san_phams ON binh_luans.id_san_pham = san_phams.id
                    WHERE binh_luans.id_san_pham = :id_san_pham AND binh_luans.trang_thai = 1
                    ORDER BY binh_luans.ngay_dang DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'id_san_pham'=>$id
            ]);
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }


    public function insertBinhLuan($id_san_pham, $id_tai_khoan, $noi_dung, $ngay_dang){
        try{
            $sql =  'INSERT INTO binh_luans (id_san_pham, id_tai_khoan, noi_dung, ngay_dang)
                    VALUE (:id_san_pham, :id_tai_khoan, :noi_dung, :ngay_dang)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham'=>$id_san_pham,
                ':id_tai_khoan'=>$id_tai_khoan, 
                ':noi_dung'=>$noi_dung, 
                ':ngay_dang'=>$ngay_dang, 
            ]);
            return $this->conn->lastInsertId();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }

}