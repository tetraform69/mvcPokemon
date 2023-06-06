<?php

include_once '../model/user.php';

$correo = $_GET['correo'];
$password = $_GET['password'];

$user = new \Model\User;
$user->setCorreo($correo);
$user->setPassword($password);

$response = $user->login();

if (isset($response[0]['correo']) && !empty($response[0]['correo'])) {
    session_start();
    $_SESSION['nombre'] = $response[0]['nombre'];
    $_SESSION['apellido'] = $response[0]['apellido'];
    $_SESSION['correo'] = $response[0]['correo'];
    $_SESSION['rol'] = $response[0]['idRol'];
}

echo json_encode($response);
unset($user);
unset($response);
