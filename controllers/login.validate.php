<?php

session_start();

if (isset($_SESSION['correo'])) {
    $response = true;
} else {
    $response = false;
}

echo json_encode($response);
unset($response);
