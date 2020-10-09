<?php

require __DIR__ . '/../../classes/Map.php';

$map = new Map();
$markers = $map->getMarkers();
echo json_encode($markers);
