<?php
include_once 'const.php';

function loadmodels($class) {
    $base_dir = __DIR__ . '/../';
    require_once $base_dir. $class .'.php';
} 
     
spl_autoload_register("loadmodels");
