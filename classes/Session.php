<?php

namespace classes;
class Session
{
    public function __construct() {
        session_start();
        if (!isset($_SESSION["user"])) {
            header('location: ./../login');
        }
    }
    
    public function getuserID(){
        return $_SESSION["id"];
    }
    public function getuserName(){
        return $_SESSION["user"];
    }
    public function logout(){
        session_destroy();
        header('location: ./../login');
    }

   
}
