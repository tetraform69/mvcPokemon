<?php

include_once("model/rol.php");

class rolController
{
    private $rol;

    public function __construct()
    {
        $this->rol = new Model\Rol();
    }

    public function create($data)
    {
        $this->rol->setNameRol($data->name);
        return $this->rol->create();
    }

    public function getAll()
    {
        return $this->rol->read();
    }

    public function getOne($index)
    {
        return $this->rol->readOne($index);
    }

    public function state($data)
    {
        $this->rol->setId($data->id);
        $this->rol->setEstado($data->estado == "A" ? "I" : "A");
        return $this->rol->estado();
    }

    public function update($data)
    {
        $this->rol->setId($data->id);
        $this->rol->setNameRol($data->name);
        return $this->rol->update();
    }

    public function delete($data)
    {
        $this->rol->setId($data->id);
        return $this->rol->delete();
    }
}
