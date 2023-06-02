<?php

include_once "../model/producto.php";

$json_string = file_get_contents('php://input');
$data = json_decode($json_string);

$id = $data->id;
$data->estado == "A"? $estado = "I": $estado = "A";

$producto = new Model\Producto();
$producto->setId($id);
$producto->setEstado($estado);
$result = $producto->estado();

echo json_encode($result);

 unset($producto);
 unset($result);