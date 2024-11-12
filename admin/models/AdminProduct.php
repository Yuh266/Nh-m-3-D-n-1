<?php
class AdminProduct{
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllProduct(){
        try{
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.id_danh_muc = danh_mucs.id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();          
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }

    public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, 
    $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $mo_ta, $hinh_anh){
        try{
            $sql =  'INSERT INTO san_phams (ten_san_pham, gia_san_pham, gia_khuyen_mai, 
            so_luong, ngay_nhap, id_danh_muc,trang_thai, mo_ta, hinh_anh)
            VALUE (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, 
            :ngay_nhap, :id_danh_muc, :trang_thai, :mo_ta, :hinh_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham'=>$ten_san_pham,
                ':gia_san_pham'=>$gia_san_pham, 
                ':gia_khuyen_mai'=>$gia_khuyen_mai, 
                ':so_luong'=>$so_luong, 
                ':ngay_nhap'=>$ngay_nhap, 
                ':id_danh_muc'=>$id_danh_muc, 
                ':trang_thai'=>$trang_thai, 
                ':mo_ta'=>$mo_ta, 
                ':hinh_anh'=>$hinh_anh,
            ]);

            // Lấy id sản phẩm vừa thêm
            return $this->conn->lastInsertId();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }

    public function insertAlbumSanPham($id_san_pham, $link_hinh_anh){
        try{
            $sql =  'INSERT INTO hinh_anh_san_phams (id_san_pham, link_hinh_anh)
            VALUE (:id_san_pham, :link_hinh_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham'=>$id_san_pham,
                ':link_hinh_anh'=>$link_hinh_anh, 
            ]);
            return true;
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }
}