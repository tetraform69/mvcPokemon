<?php

namespace Model;

use PDOException;

include_once "conexion.php";

class DetalleCompra
{
    private $id;
    private $idCom;
    private $idPro;
    private $cantidad;
    private $estado = 'A';
    public $con; //* Objeto conexion

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO comprad(idCom, idPro, cantidad, estado) VALUES(:idCom, :idPro, :cantidad, :estado)");
            $request->bindParam(':idCom', $this->idCom);
            $request->bindParam(':idPro', $this->idPro);
            $request->bindParam(':cantidad', $this->cantidad);
            $request->bindParam(':estado', $this->estado);
            $request->execute();
            return "Compra Detalle creada";
        } catch (PDOException $err) {
            return "Error al crear" . $err->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM comprad");
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
            $request = $this->con->getCon()->prepare("SELECT * FROM comprad WHERE id = :id");
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
            $request = $this->con->getCon()->prepare("UPDATE comprad SET idCom = :idCom, idPro = :idPro, cantidad = :cantidad, estado = :estado WHERE id = :id");
            $request->bindParam(':idCom', $this->idCom);
            $request->bindParam(':idPro', $this->idPro);
            $request->bindParam(':cantidad', $this->cantidad);
            $request->bindParam(':estado', $this->estado);
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
            $request = $this->con->getCon()->prepare("UPDATE comprad SET estado = :estado WHERE id = :id");
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
            $request = $this->con->getCon()->prepare("DELETE FROM comprad WHERE id = :id");
            $request->bindParam(":id", $this->id);
            $request->execute();
            return "Eliminado";
        } catch (PDOException $err) {
            return "Error al borrar: " . $err->getMessage();
        }
    }
}
