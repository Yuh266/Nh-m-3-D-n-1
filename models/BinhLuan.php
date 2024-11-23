<?php 

class BinhLuan{
    public $conn ;

    public function __construct(){
        $this->conn = connectDB();
    }


}