<?php 
class SanPhamController
{
    public $conn;
    public function __construct() {
        $this->conn = connectDB();    
    }
    public function Trangchu(){

        require './views/TrangChinh/trangchu.php' ;
    }

}