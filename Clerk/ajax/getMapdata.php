<?php

require_once __DIR__ . '/../../utils/classloader.php';

$map = new classes\Map();
$markers = $map->getMarkers();
echo json_encode($markers);
