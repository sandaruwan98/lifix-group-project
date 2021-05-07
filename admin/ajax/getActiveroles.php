<?php

require_once __DIR__ . '/../../utils/classloader.php';

$user_id = $_GET["accid"];
$role = new models\Role();
$data = $role->getActiveRoles($user_id);

// $roles = array(' ','Divisional Secretary','Clerk', 'Storekeeper', 'Technician' ,'Admin');

echo json_encode($data->fetch_all());
