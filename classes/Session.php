<?php

namespace classes;

class Session
{
    public function __construct($occuFlag) {
        session_start();
        if (!isset($_SESSION["user"])) {
            header('location: ./../login');
        }
        else if($occuFlag != $_SESSION["occuFlag"]){
            header('location: ./../login');
        }
    }
    
    public function getuserID(){
        return $_SESSION["id"];
    }
    public function getuserName(){
        return $_SESSION["user"];
    }

    public function sendMessage($msg,$class){
        $_SESSION["msg"] = $msg;
        $_SESSION["msgclass"] = $class;
    }
    public function showMessage(){
        if (isset($_SESSION["msg"])) {
        
            echo " <script> notification.show('".$_SESSION["msg"].  "','".$_SESSION["msgclass"]. "') </script>";
            unset($_SESSION["msg"]);
            unset($_SESSION["msgclass"]);
        }
         
        
    }
    

   
}
