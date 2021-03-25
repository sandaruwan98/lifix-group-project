<?php

require_once __DIR__ . '/../../utils/classloader.php';

$user_id = $_GET["accid"];
$user = new models\User();
$data = $user->getUserById($user_id);
$roles = array(' ','Divisional Secretary','Clerk', 'Storekeeper', 'Technician' ,'Admin');
$data['role'] = $roles[ $data['occuFlag'] ];
echo json_encode($data);
