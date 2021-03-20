<?php

require_once __DIR__ . '/../../utils/classloader.php';

$map = new models\Map();
$sections = $map->getAllSections();
$data = [];
while ($section=$sections->fetch_assoc()) {
    $temp["color"] = $section["color"];
    $temp["id"] = $section["section_id"];
    $temp["tech_id"] = $section["tech_id"];
    
    $temp["coords"] = $map->getPointsForSection($section["section_id"]);
    $data[] = $temp;
}

echo json_encode($data);
