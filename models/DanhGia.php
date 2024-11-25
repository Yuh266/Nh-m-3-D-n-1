<?php 

class DanhGia{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }
    public function checkDanhGia($id_san_pham, $id_tai_khoan) {
     try{
        $sql = "SELECT COUNT(*) as count FROM danh_gias WHERE id_san_pham = :id_san_pham AND id_tai_khoan = :id_tai_khoan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id_san_pham' => $id_san_pham,
            ':id_tai_khoan'=>$id_tai_khoan,
        ]);
        $result = $stmt->fetch();
        return $result['count'] > 0;
     } catch(Exception $e){
        echo "Lỗi sql đếm bản ghi".$e->getMessage();
        return false;
    }
}
    public function getReviewSanPham($id_san_pham){
        try{
            $sql = 'SELECT * FROM danh_gias 
            join tai_khoans on danh_gias.id_tai_khoan=tai_khoans.id
             WHERE id_san_pham=:id_san_pham';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham' => $id_san_pham
            ]);
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi sql lấy danh gia sp".$e->getMessage();
            return false;
        }
    }
    public function insertReviewSanPham($id_san_pham,$id_tai_khoan,$danh_gia,$ngay_danh_gia,$noi_dung ){
        try{
            $sql = 'INSERT Into danh_gias(id_san_pham,id_tai_khoan,danh_gia,ngay_danh_gia,noi_dung) values (:id_san_pham, :id_tai_khoan, :danh_gia,:ngay_danh_gia,:noi_dung)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham' => $id_san_pham,
                ':id_tai_khoan' => $id_tai_khoan,
                ':danh_gia' => $danh_gia,
                ':ngay_danh_gia' => $ngay_danh_gia,
                ':noi_dung' => $noi_dung
            ]);
            return $this->conn->lastInsertId();
        }catch(Exception $e){
            echo "Lỗi sql insert danh gia".$e->getMessage();
            return false;
        }
    }


}