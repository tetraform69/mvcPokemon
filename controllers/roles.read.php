<?php

include_once "../model/rol.php";

$rol = new Model\Rol();
$result = $rol->read();

echo json_encode($result);
unset($rol);
unset($result);