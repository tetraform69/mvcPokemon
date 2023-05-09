<?php

include_once "../model/rol.php";

$id = $_POST["id"];

$rol = new Model\Rol();
$result = $rol->readOne($id);

echo json_encode($result);
unset($rol);
unset($result);
