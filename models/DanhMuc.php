<?php 

class DanhMuc{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllDanhMuc(){
        try {
            $sql="SELECT * FROM danh_mucs LIMIT 5
                 
                ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo "". $th->getMessage();
        }
    }

    
}

