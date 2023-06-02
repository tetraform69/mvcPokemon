<?php

include_once "../model/producto.php";

$json_string = file_get_contents('php://input');
$data = json_decode($json_string);
$id = $data->id;

$producto = new Model\Producto();
$producto->setId($id);

$result = $producto->delete();
echo json_encode($result);

unset($producto);
unset($result);