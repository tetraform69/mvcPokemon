<?php

namespace Model;

include_once "conexion.php";

class Rol{

    private $id;
    private $nameRol;
    public $con; //* Objeto conexion

    public function __construct(){
        $this->con = new \Conexion();
    }

    public function create(){
        
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nameRol
     */
    public function getNameRol()
    {
        return $this->nameRol;
    }

    /**
     * Set the value of nameRol
     */
    public function setNameRol($nameRol): self
    {
        $this->nameRol = $nameRol;

        return $this;
    }
}