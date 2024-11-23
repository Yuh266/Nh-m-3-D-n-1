<?php 

class DonHang{
    
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function getDonHangByID($id){
        try {
            $sql = "SELECT * 
                    FROM `don_hangs` 
                    JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.id_don_hang
                    JOIN trang_thai_don_hangs ON don_hangs.id_trang_thai = trang_thai_don_hangs.id
                    JOIN san_phams ON chi_tiet_don_hangs.id_san_pham = san_phams.id
                    WHERE id_tai_khoan = $id 
                    ORDER BY chi_tiet_don_hangs.id DESC ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

 public function getDonHangByIDDonHang($id){
        try {
            $sql = "SELECT * 
                    FROM `don_hangs` 
                    JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.id_don_hang
                    JOIN trang_thai_don_hangs ON don_hangs.id_trang_thai = trang_thai_don_hangs.id
                    JOIN san_phams ON chi_tiet_don_hangs.id_san_pham = san_phams.id
                    JOIN dia_chi_nhan_hangs ON dia_chi_nhan_hangs.id = don_hangs.id_dia_chi_nhan_hang
                    JOIN tai_khoans ON don_hangs.id_tai_khoan = tai_khoans.id
                    WHERE don_hangs.id = $id  
                    
                    " ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function insertDonHang($id_tai_khoan,$ngay_dat,$tong_tien,$ghi_chu,$id_trang_thai,$id_dia_chi_nhan_hang){
        try {
            $sql = "INSERT INTO don_hangs(id_tai_khoan, ngay_dat, tong_tien, ghi_chu, id_trang_thai, id_dia_chi_nhan_hang) 
                    VALUES (:id_tai_khoan, :ngay_dat, :tong_tien, :ghi_chu, :id_trang_thai, :id_dia_chi_nhan_hang)" ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_tai_khoan'=>$id_tai_khoan,
                ':ngay_dat'=>$ngay_dat,
                ':tong_tien'=>$tong_tien,
                ':ghi_chu'=>$ghi_chu,
                ':id_trang_thai'=>$id_trang_thai,
                ':id_dia_chi_nhan_hang'=>$id_dia_chi_nhan_hang,
            ]);
            return $this->conn->lastInsertId() ;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function insertChiTietDonHang($id_don_hang,$id_san_pham,$don_gia,$so_luong,$thanh_tien){
        $sql = "INSERT INTO chi_tiet_don_hangs(id_don_hang, id_san_pham, don_gia, so_luong, thanh_tien) 
                VALUES (:id_don_hang, :id_san_pham, :don_gia, :so_luong, :thanh_tien)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":id_don_hang"=>$id_don_hang,
            ":id_san_pham"=>$id_san_pham,
            ":don_gia"=>$don_gia,
            ":so_luong"=>$so_luong,
            ":thanh_tien"=>$thanh_tien,
        ]);

        return true;
    }
    public function updateDonHang($id,$id_tai_khoan,$ten_nguoi_nhan,$sdt_nguoi_nhan,$ngay_dat,$tong_tien,$ghi_chu,$dia_chi_nguoi_nhan,$id_trang_thai){
        try {
            $sql = "UPDATE don_hangs 
            SET 
                id_tai_khoan=:id_tai_khoan',
                ten_nguoi_nhan=:ten_nguoi_nhan',
                sdt_nguoi_nhan=:sdt_nguoi_nhan',
                ngay_dat=:ngay_dat',
                tong_tien=:tong_tien',
                ghi_chu=:ghi_chu',
                dia_chi_nguoi_nhan=:dia_chi_nguoi_nhan',
                id_trang_thai=:id_trang_thai' 
            WHERE id=".$id ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_tai_khoan'=>$id_tai_khoan,
                ':ten_nguoi_nhan'=>$ten_nguoi_nhan,
                ':sdt_nguoi_nhan'=>$sdt_nguoi_nhan,
                ':ngay_dat'=>$ngay_dat,
                ':tong_tien'=>$tong_tien,
                ':ghi_chu'=>$ghi_chu,
                ':dia_chi_nguoi_nhan'=>$dia_chi_nguoi_nhan,
                ':id_trang_thai'=>$id_trang_thai,
            ]);
            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function updateChiTietDonHang($id,$id_don_hang,$id_san_pham,$don_gia,$so_luong,$thanh_tien){
        $sql = "UPDATE chi_tiet_don_hangs 
                SET 
                    id_don_hang=:id_don_hang',
                    id_san_pham=:id_san_pham',
                    don_gia=:don_gia',
                    so_luong=:so_luong',
                    thanh_tien=:thanh_tien' 
                WHERE id=".$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":id_don_hang"=>$id_don_hang,
            ":id_san_pham"=>$id_san_pham,
            ":don_gia"=>$don_gia,
            ":so_luong"=>$so_luong,
            ":thanh_tien"=>$thanh_tien,
        ]);

        return true;
    }
    public function deleteDonHang($id) {
       try {
            $sql = 'DELETE INTO don_hangs WHERE id='.$id ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
       } catch (Exception $th) {
            echo $th->getMessage();
       }
    }

}



