<?php

include_once "../model/rol.php";

$json_string = file_get_contents('php://input');
$data = json_decode($json_string);
$id = $data->id;
$name = $data->name;

$rol = new Model\Rol();
echo $id;
echo $name;
$rol->setId($id);
$rol->setNameRol($name);
echo $rol->getId();
echo $rol->getNameRol();
$result = $rol->update();

echo json_encode($result);

unset($rol);
unset($result);
