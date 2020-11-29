<?php
include_once 'const.php';


     
function loadClasses($class) {
    $base_dir = __DIR__ . '/../';

    $base_dir = $_SERVER['DOCUMENT_ROOT'].'/';
    $cl = str_replace("\\","/",$class);
    // echo $base_dir. $cl .'.php';
    require_once $base_dir. $cl .'.php';
} 
     
spl_autoload_register("loadClasses");

?>
