<?php

namespace Model;

use PDOException;

include_once "conexion.php";

class Compra
{
    private $id;
    private $codigo;
    private $fecha;
    private $estado = 'A';
    public $con; //* Objeto conexion

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO compras(codigo, fecha, estado) VALUES(:codigo, :fecha, :estado)");
            $request->bindParam(':codigo', $this->codigo);
            $request->bindParam(':fecha', $this->fecha);
            $request->bindParam(':estado', $this->estado);
            $request->execute();
            return "Compra creada";
        } catch (PDOException $err) {
            return "Error al crear" . $err->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM compras");
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            return "Error al leer" . $err->getMessage();
        }
    }

    public function getOne($id)
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM compras WHERE id = :id");
            $request->bindParam(':id', $id);
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            return "Error al leer" . $err->getMessage();
        }
    }

    public function update()
    {
        try {
            $request = $this->con->getCon()->prepare("UPDATE compras SET codigo = :codigo, fecha = :fecha, estado = :estado WHERE id = :id");
            $request->bindParam(':codigo', $this->codigo);
            $request->bindParam(':fecha', $this->fecha);
            $request->bindParam(':estado', $this->estado); 
            $request->bindParam(':id', $this->id);
            $request->execute();
            $result = "Actualizado";
            return $result;
        } catch (PDOException $err) {
            return "Error al leer" . $err->getMessage();
        }
    }

    public function estado()
    {
        try {
            $request = $this->con->getCon()->prepare("UPDATE compras SET estado = :estado WHERE id = :id");
            $request->bindParam(':estado', $this->estado);
            $request->bindParam(':id', $this->id);
            $request->execute();
            $result = "Estado = $this->estado";
            return $result;
        } catch (PDOException $err) {
            return "Error" . $err->getMessage();
        }
    }

    public function delete()
    {
        try {
            $request = $this->con->getCon()->prepare("DELETE FROM compras WHERE id = :id");
            $request->bindParam(":id", $this->id);
            $request->execute();
            return "Eliminado";
        } catch (PDOException $err) {
            return "Error al borrar: " . $err->getMessage();
        }
    }
}
