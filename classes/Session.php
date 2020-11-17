<?php

namespace classes;
class Session
{
    public function __construct($occuFlag) {
        session_start();
        // session_destroy();
        echo $occuFlag;
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
    

   
}
