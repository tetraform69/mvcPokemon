<?php
include_once "../model/rol.php"

$rol = new Model\Rol();

$rol->setNameRol($_POST["nameRol"]);
$rol->create();

echo json_encode("Rol creado");

unset($rol);