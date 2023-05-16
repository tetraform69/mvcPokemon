<?php
include_once "../model/rol.php";

$rol = new Model\Rol();

$rol->setNameRol($_POST["nameRol"]);
$result = $rol->create();

echo json_encode($result);

unset($rol);
unset($result);
