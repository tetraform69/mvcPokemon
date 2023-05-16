<?php

include_once "../model/rol.php";

$json_string = file_get_contents('php://input');
$data = json_decode($json_string);
$id = $data->id;

$rol = new Model\Rol();
$rol->setId($id);

$result = $rol->delete();
echo json_encode($result);

unset($rol);
unset($result);