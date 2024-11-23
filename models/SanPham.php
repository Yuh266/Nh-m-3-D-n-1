<?php 
// require_once $_SERVER['DOCUMENT_ROOT'] . '/Du_an_1/models/AdminProduct.php';
class SanPham
{
    public $conn;
    public function __construct() {
        $this->conn = connectDB();    
    }
    public function getAllSanPham() {
        try {
            $sql = "SELECT * FROM san_phams
                    ORDER BY luot_xem 
                    ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
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


    public function getDetailSanPham($id){
        try{
            $sql =  'SELECT * FROM san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
            return false;
        }
    }

    public function getListAnhSanPham($id){
        try{
            $sql =  'SELECT * FROM hinh_anh_san_phams WHERE id_san_pham=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }


    public function getDetailAnhSanPham($id){
        try{
            $sql =  'SELECT * FROM hinh_anh_san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }


    public function getSanPhamByKeyword($keyword){
        try {
            $sql=" SELECT *  
                   FROM san_phams 
                   JOIN danh_mucs ON san_phams.id_danh_muc = danh_mucs.id
                   WHERE ten_san_pham LIKE :keyword
                    OR ten_danh_muc LIKE :keyword  
                ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":keyword"=> "%".$keyword."%" ,
            ]);

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo "".$th->getMessage();
        }
    }
    public function getSanPhamByPrice($keyword,$price_max,$price_min){
        try {
            $sql=" SELECT *  
                   FROM san_phams 
                   JOIN danh_mucs ON san_phams.id_danh_muc = danh_mucs.id
                   WHERE (ten_san_pham LIKE :keyword
                    OR ten_danh_muc LIKE :keyword  )
                    AND gia_khuyen_mai > :price_min
                    AND gia_khuyen_mai < :price_max
                ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":keyword"=> "%".$keyword."%" ,
                ":price_min"=> $price_min,
                ":price_max"=> $price_max,
            ]);

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo "".$th->getMessage();
        }
    }
    public function getSanPhamByInformationSearch($keyword,$id,$price_max,$price_min){
        try {
            // var_dump($keyword);
            // var_dump(empty($id));
            // var_dump($price_max);
            // var_dump($price_min);die();
            $sql_id = "";
            if (!empty($id)) {
                foreach ($id as $key => $value) {
                    $sql_id .= " OR id_danh_muc = ".$value;
                }
                $sql_id = substr($sql_id, 3);
                $sql_id = "AND ($sql_id)";
            }
            
            $sql_price = "";
            if (!empty($price_max)) {
                $sql_price .= " AND gia_khuyen_mai < ".$price_max." " ;
            }
            if (!empty($price_min)) {
                $sql_price .= " AND gia_khuyen_mai > ".$price_min ;
            }
            
            $sql=" SELECT *  
                   FROM san_phams 
                   JOIN danh_mucs ON san_phams.id_danh_muc = danh_mucs.id
                   WHERE (ten_san_pham LIKE :keyword
                    OR ten_danh_muc LIKE :keyword  )
                    $sql_id $sql_price";
            // var_dump($sql);die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":keyword"=> "%".$keyword."%" ,
            ]);

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo "".$th->getMessage();
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

    public function getBinhLuan($id){
        try{
            $sql = 'SELECT binh_luans.id AS id_binh_luan, binh_luans.noi_dung, binh_luans.ngay_dang,
                    tai_khoans.ho_ten, tai_khoans.anh_dai_dien,san_phams.ten_san_pham 
                    FROM binh_luans
                    JOIN tai_khoans ON binh_luans.id_tai_khoan = tai_khoans.id
                    JOIN san_phams ON binh_luans.id_san_pham = san_phams.id
                    WHERE binh_luans.id_san_pham = :id_san_pham
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

    public function getBinhLuans($id){
        try{
            $sql = 'SELECT * FROM binh_luans WHERE id_tai_khoan =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
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

