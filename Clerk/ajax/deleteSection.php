<?php 
$session = new classes\Session(CleckFL);
if(isset($_GET["id"])){

    $id = $_GET["id"];
    require_once __DIR__ . '/../../utils/classloader.php';
    $map = new models\Map();
    $section_id = $map->DeleteSection($id);
}
?>