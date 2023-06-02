<?php

include_once "../model/producto.php";

$json_string = file_get_contents('php://input');
$data = json_decode($json_string);
$id = $data->id;
$name = $data->name;
$precio = $data->precio;
$cantidad = $data->cantidad;
$descripcion = $data->descripcion;

$producto = new Model\Producto();
$producto->setId($id);
$producto->setNombre($name);
$producto->setPrecio($precio);
$producto->setCantidad($cantidad);
$producto->setDescripcion($descripcion);
$result = $producto->update();

echo json_encode($result);

unset($producto);
unset($result);
