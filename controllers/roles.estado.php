<?php

include_once "../model/rol.php";

$json_string = file_get_contents('php://input');
$data = json_decode($json_string);

$id = $data->id;
$estado = $data->estado;

$estado == "A"? $estado = "I": $estado = "A";

$rol = new Model\Rol();
$rol->setId($id);
$rol->setEstado($estado);
$result = $rol->estado();

echo json_encode($result);

 unset($rol);
 unset($result);