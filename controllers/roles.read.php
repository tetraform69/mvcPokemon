<?php

include_once "../model/rol.php";

$rol = new Model\Rol();
$result = $rol->read();

echo json_encode($result);
unset($rol);
<<<<<<< HEAD
unset($result);
=======
unset($result);
>>>>>>> 8ae87c0e0c573a8ea6565f73c99136a9736f663c
