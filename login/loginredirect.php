<?php 
session_start();
if(isset($_GET["role"]) && isset($_SESSION["role"])){
    $role = $_GET["role"];
    $_SESSION["role"]=$role;
    
    switch($role){
        case '1': header('location:../divisionalsecretary/index.php');break;
        case '2':header('location:../clerk/index.php');break;
        case '3':header('location:../storekeeper/index.php');break;
        case '4':header('location:../technician/index.php');break;
        case '5':header('location:../admin/index.php');break;
        default:header('location: ./index.php');unset($_SESSION["role"]);break;
    }
}else{
    header('location: ./index.php');
}


?>