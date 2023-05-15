<?php

namespace Model;

include_once "conexion.php";

class Rol
{

    private $id;
    private $nameRol;
    private $estado = 'A';
    public $con; //* Objeto conexion

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO roles(nombreRol, estado) VALUES(:nombre, :estado)");
            $request->bindParam(':nombre', $this->nameRol);
            $request->bindParam(':estado', $this->estado);
            $request->execute();
            return "Rol creado";
        } catch (PDOExeption $err) {
            return "Error al crear" . $err->getMessage();
        }
    }

    public function read()
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM roles WHERE estado = 'A'");
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOExeption $err) {
            return "Error al leer" . $err->getMessage();
        }
    }

    public function readOne($id)
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM roles WHERE id = :id");
            $request->bindParam(':id', $id);
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOExeption $err) {
            return "Error al leer" . $err->getMessage();
        }
    }

    public function update()
    {
        try {
            $request = $this->con->getCon()->prepare("UPDATE roles SET nombreRol = ':name' WHERE id = :id");
            $request->bindParam(':name', $this->nameRol);
            $request->bindParam(':id', $this->id);
            $request->execute();
            $result = "Actualizado";
            return $result;
        } catch (PDOExeption $err) {
            return "Error al leer" . $err->getMessage();
        }
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

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}
