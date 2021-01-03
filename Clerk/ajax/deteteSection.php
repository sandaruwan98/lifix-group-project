<?php 
if(isset($_GET["id"])){

    $id = $_GET["id"];
    require_once __DIR__ . '/../../utils/classloader.php';
    $section = new models\Section();
    $section_id = $section->DeleteSection($id);
}
?>