<?php 

class GioHang{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }

    
}

