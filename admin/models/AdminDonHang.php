<?php

class AdminDonHang
{

    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDonHang()
    {
        try {
            $sql = "SELECT * 
                    FROM chi_tiet_don_hangs 
                    JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.id_don_hang 
                    JOIN san_phams ON san_phams.id = chi_tiet_don_hangs.id_san_pham 
                    JOIN tai_khoans ON tai_khoans.id = don_hangs.id_tai_khoan;
                    ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    // public function getDonHangByID($id)
    // {
    //     try {
    //         $sql = "SELECT * 
    //                 FROM chi_tiet_don_hangs 
    //                 JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.id_don_hang 
    //                 JOIN san_phams ON san_phams.id = chi_tiet_don_hangs.id_san_pham 
    //                 JOIN tai_khoans ON tai_khoans.id = don_hangs.id_tai_khoan;
    //                 WHERE id=" . $id;
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute();
    //         return $stmt->fetch();
    //     } catch (Exception $th) {
    //         echo $th->getMessage();
    //     }
    // }
    public function insertDonHang($id_tai_khoan, $ten_nguoi_nhan, $sdt_nguoi_nhan, $ngay_dat, $tong_tien, $ghi_chu, $dia_chi_nguoi_nhan, $id_trang_thai)
    {
        try {
            $sql = "INSERT INTO don_hangs( id_tai_khoan, ten_nguoi_nhan, sdt_nguoi_nhan, ngay_dat, tong_tien, ghi_chu, dia_chi_nguoi_nhan, id_trang_thai) 
                    VALUES ( :id_tai_khoan, :ten_nguoi_nhan, :sdt_nguoi_nhan, :ngay_dat, :tong_tien, :ghi_chu, :dia_chi_nguoi_nhan, :id_trang_thai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_tai_khoan' => $id_tai_khoan,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':ngay_dat' => $ngay_dat,
                ':tong_tien' => $tong_tien,
                ':ghi_chu' => $ghi_chu,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':id_trang_thai' => $id_trang_thai,
            ]);
            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function insertChiTietDonHang($id_don_hang, $id_san_pham, $don_gia, $so_luong, $thanh_tien)
    {
        $sql = "INSERT INTO chi_tiet_don_hangs(id_don_hang, id_san_pham, don_gia, so_luong, thanh_tien) 
                VALUES (:id_don_hang, :id_san_pham, :don_gia, :so_luong, :thanh_tien)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":id_don_hang" => $id_don_hang,
            ":id_san_pham" => $id_san_pham,
            ":don_gia" => $don_gia,
            ":so_luong" => $so_luong,
            ":thanh_tien" => $thanh_tien,
        ]);

        return true;
    }
    public function updateDonHang($id, $id_tai_khoan, $ten_nguoi_nhan, $sdt_nguoi_nhan, $ngay_dat, $tong_tien, $ghi_chu, $dia_chi_nguoi_nhan, $id_trang_thai)
    {
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
            WHERE id=" . $id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_tai_khoan' => $id_tai_khoan,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':ngay_dat' => $ngay_dat,
                ':tong_tien' => $tong_tien,
                ':ghi_chu' => $ghi_chu,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':id_trang_thai' => $id_trang_thai,
            ]);
            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function updateChiTietDonHang($id, $id_don_hang, $id_san_pham, $don_gia, $so_luong, $thanh_tien)
    {
        $sql = "UPDATE chi_tiet_don_hangs 
                SET 
                    id_don_hang=:id_don_hang',
                    id_san_pham=:id_san_pham',
                    don_gia=:don_gia',
                    so_luong=:so_luong',
                    thanh_tien=:thanh_tien' 
                WHERE id=" . $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":id_don_hang" => $id_don_hang,
            ":id_san_pham" => $id_san_pham,
            ":don_gia" => $don_gia,
            ":so_luong" => $so_luong,
            ":thanh_tien" => $thanh_tien,
        ]);

        return true;
    }
    public function deleteDonHang($id)
    {
        try {
            $sql = 'DELETE INTO don_hangs WHERE id=' . $id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function getAllDonHangVoiTrangThai()
    {
        try {
            $sql = "SELECT dh.id AS id_don_hang, tk.email, dh.ngay_dat, tk.ho_ten, 
                    dcnh.sdt_nguoi_nhan AS so_dien_thoai, dcnh.dia_chi_nguoi_nhan, ttdh.ten_trang_thai, 
                    ttdh.id AS id_trang_thai
                    FROM don_hangs dh
                    JOIN dia_chi_nhan_hangs dcnh ON dh.id_dia_chi_nhan_hang = dcnh.id
                    JOIN trang_thai_don_hangs ttdh ON dh.id_trang_thai = ttdh.id
                    JOIN tai_khoans tk ON dh.id_tai_khoan = tk.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function deleteDonHangById($id)
    {
        try {
            $sql = 'DELETE dh
                    FROM don_hangs dh
                    LEFT JOIN dia_chi_nhan_hangs dcnh ON dh.id_dia_chi_nhan_hang = dcnh.id
                    LEFT JOIN trang_thai_don_hangs ttdh ON dh.id_trang_thai = ttdh.id
                    WHERE dh.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function getDonHangById($id){
        try {
            $sql = "SELECT dh.id AS id_don_hang, tk.email, dh.ngay_dat, tk.ho_ten, 
            dcnh.sdt_nguoi_nhan AS so_dien_thoai, dcnh.dia_chi_nguoi_nhan, ttdh.ten_trang_thai, 
            ttdh.id AS id_trang_thai
            FROM don_hangs dh
            JOIN dia_chi_nhan_hangs dcnh ON dh.id_dia_chi_nhan_hang = dcnh.id
            JOIN trang_thai_don_hangs ttdh ON dh.id_trang_thai = ttdh.id
            JOIN tai_khoans tk ON dh.id_tai_khoan = tk.id
            WHERE dh.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id
            ]);
            return $stmt->fetch();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function updateTrangThaiDonHang($id, $id_trang_thai)
{
    try {
        $sql = 'UPDATE don_hangs SET id_trang_thai = :id_trang_thai WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':id_trang_thai' => $id_trang_thai
        ]);
        return true;
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

}






