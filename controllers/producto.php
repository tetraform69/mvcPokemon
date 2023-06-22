<?php

include_once("model/producto.php");

class productoController
{
    private $producto;

    public function __construct()
    {
        $this->producto = new Model\producto();
    }

    public function create($data)
    {
        $this->producto->setNombre($data->name);
        $this->producto->setPrecio($data->precio);
        $this->producto->setCantidad($data->cantidad);
        $this->producto->setDescripcion($data->descripcion);
        return $this->producto->create();
    }

    public function getAll()
    {
        return $this->producto->read();
    }

    public function getOne($index)
    {
        return $this->producto->readOne($index);
    }

    public function state($data)
    {
        $this->producto->setId($data->id);
        $this->producto->setEstado($data->estado == "A" ? "I" : "A");
        return $this->producto->estado();
    }

    public function update($data)
    {
        $this->producto->setId($data->id);
        $this->producto->setNombre($data->name);
        $this->producto->setPrecio($data->precio);
        $this->producto->setCantidad($data->cantidad);
        $this->producto->setDescripcion($data->descripcion);
        return $this->producto->update();
    }

    public function delete($data)
    {
        $this->producto->setId($data->id);
        return $this->producto->delete();
    }
}
