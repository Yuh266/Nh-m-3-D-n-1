<?php

class AdminTaiKhoanController{
    public function __construct(){

    }

    public function formLogin(){
        
        require "./views/TaiKhoan/login.php";
    }

    public function formRegister(){
        
        require "./views/TaiKhoan/register.php";
    }

}


