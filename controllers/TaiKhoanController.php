<?php

class TaiKhoanController
{
    public $modelTaiKhoan;
 
    public function __construct() {
        $this->modelTaiKhoan = new TaiKhoan();
     
    }
  
    public function Login(){
        require './views/TrangChinh/login.php' ;
    }
    
    public function post_Login(){
        $email=$_POST['email'];
        $password=$_POST['mat_khau'];
      $check_user=$this->modelTaiKhoan->check_login($email,$password);
        if($check_user){
            header('Location:'.BASE_URL. "");
        }
        else{
            header('Location:'.BASE_URL. "?act=login");
            exit();
        }
    }
}