<?
 class AdminGioHang{
    public $conn;

    
    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllGioHang(){
        try{
            $sql = 'SELECT   gio_hangs.id_tai_khoan,                         
                            tai_khoans.ho_ten  
                            from gio_hangs
                            join tai_khoans on gio_hangs.id_tai_khoan= tai_khoans.id
                            GROUP BY gio_hangs.id_tai_khoan,tai_khoans.ho_ten
              ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }

    public function getGioHangByIDTaiKhoan($id){
        try {
            $sql = 'SELECT 
                    chi_tiet_gio_hangs.id,
                    chi_tiet_gio_hangs.id_san_pham, 
                    san_phams.ten_san_pham,
                    san_phams.gia_san_pham,
                    SUM(chi_tiet_gio_hangs.so_luong) AS tong_so_luong
                FROM 
                    gio_hangs
                JOIN 
                    chi_tiet_gio_hangs ON gio_hangs.id = chi_tiet_gio_hangs.id_gio_hang
                JOIN 
                    san_phams ON chi_tiet_gio_hangs.id_san_pham = san_phams.id
                WHERE 
                    gio_hangs.id_tai_khoan = :id
                GROUP BY 
                    chi_tiet_gio_hangs.id_san_pham, chi_tiet_gio_hangs.id, san_phams.ten_san_pham, san_phams.gia_san_pham';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
    
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function getGioHangbyID($id){
       try{
         
        $sql = "SELECT * FROM gio_hangs WHERE id=".$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetch();
       }
       catch (Exception $th) {
        echo "Lỗi". $th->getMessage();
    }
    }
    public function addGioHang($id_tai_khoan){
        try {
            $sql = "INSERT INTO gio_hangs(id_tai_khoan) 
            VALUES(:id_tai_khoan)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":id_tai_khoan"=>$id_tai_khoan]);

            return $this->conn->lastInsertId();
        } catch (Exception $th) {
            echo"Lôi". $th->getMessage();
        }

    }
    
    public function deleteGioHang($id){
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
        }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
        
    }
 }
 

?>