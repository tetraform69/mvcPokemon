<?php

include_once('model/user.php');

function login($data)
{
    $correo = $data->correo;
    $password = $data->password;

    $user = new \Model\User;
    $user->setCorreo($correo);
    $user->setPassword($password);

    $response = $user->login();

    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = $correo;
        $json['status'] = 'ok';
        $json['message'] = 'You have Login';
    } elseif (empty($response)) {
        $json['status'] = 'error';
        $json['message'] = 'incorrect credentials';
    } else {
        $json['status'] = 'error';
        $json['message'] = 'already have a session';
    }

    $json['response'] = $response;
    return $json;
    unset($user);
    unset($response);
}

function validate(){
    if(!isset($_SESSION['user'])){
        header('Location: /mvcPokemon/login');   
    }
}

function logout() {
    session_destroy();
}
