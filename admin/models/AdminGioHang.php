<?
 class AdminGioHang{
    public $conn;

    
    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllGioHang(){
        try{
            $sql = 'SELECT * from gio_hangs ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
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
            $sql = "DELETE FROM gio_hangs WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
        }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
        
    }
 }
 

?>