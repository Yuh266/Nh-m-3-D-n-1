<?
 class AdminBinhLuan{
    public $conn;

    
    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllBinhLuan(){
        try{
            $sql = 'SELECT * from binh_luans';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }

    public function getBinhLuanByID($id){
       try{
         
        $sql = "SELECT * FROM binh_luans WHERE id=".$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetch();
       }
       catch (Exception $th) {
        echo "Lỗi". $th->getMessage();
    }
    }
    public function UpdateBinhLuan($id,$trang_thai){
        try{
            $sql= 'UPDATE binh_luans set trang_thai=:trang_thai where id=:id';
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
    
    public function deleteBinhLuan($id){
        try {
            $sql = "DELETE FROM binh_luans WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return true;
        }catch (Exception $th) {
            echo "Lỗi". $th->getMessage();
        }
        
    }
 }
 

?>