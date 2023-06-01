<?php

include_once "../model/producto.php";

$producto = new Model\Producto();
$result = $producto->read();

echo json_encode($result);
unset($producto);
unset($result);