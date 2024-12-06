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
                    ORDER BY luot_xem DESC
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
                $sql_price .= " AND gia_khuyen_mai <= ".$price_max." " ;
            }
            if (!empty($price_min)) {
                $sql_price .= " AND gia_khuyen_mai >= ".$price_min ;
            }
            
            $sql=" SELECT san_phams.id , san_phams.ten_san_pham, san_phams.gia_san_pham, san_phams.gia_khuyen_mai, san_phams.hinh_anh, san_phams.so_luong, san_phams.ngay_nhap, san_phams.mo_ta, san_phams.id_danh_muc, san_phams.trang_thai, san_phams.luot_xem ,danh_mucs.ten_danh_muc
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
    
    public function updateLuotXem($id_san_pham) {
       try {
            $sql = "UPDATE san_phams SET luot_xem = luot_xem + 1 WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id_san_pham
            ]);    
            return true;
       } catch (Exception $th) {
            echo $th->getMessage() ;
       }
    }
    

}

