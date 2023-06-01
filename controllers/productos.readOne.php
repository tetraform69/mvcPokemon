<?php

include_once "../model/producto.php";

$json_string = file_get_contents('php://input');
$data = json_decode($json_string);
$id = $data->id;

$producto = new Model\Producto();
$result = $producto->readOne($id);

echo json_encode($result);
unset($producto);
unset($result);
