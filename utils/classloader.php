<?php
include 'const.php';

function loadmodels($class) {
    $base_dir = __DIR__ . '/../';
    require_once $base_dir. $class .'.php';
} 
     
function loadClasses($class) {
    $base_dir = __DIR__ . '/../classes/';
    require_once $base_dir. $class .'.php';
} 
     
spl_autoload_register("loadmodels");
spl_autoload_register("loadClasses");

?>
