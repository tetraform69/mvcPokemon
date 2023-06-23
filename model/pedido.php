<?php

namespace Model;

use PDOException;

include_once "conexion.php";

class Pedido
{
    private $id;
    private $codigo;
    private $fecha;
    private $idUser;
    private $nombre;
    private $direccion;
    private $telefono;
    private $total;
    private $formaPago;
    private $fechaEnvPedido;
    private $estadoPedido;
    private $estado = 'A';
    public $con; //* Objeto conexion

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO pedidos(codigo, fecha, idUser, nombre, direccion, telefono, total, formaPago, fechaEnvPedido, estadoPedido, estado) VALUES(:codigo, :fecha, idUser, :nombre, :direccion, :telefono, :total, :formaPago, :fechaEnvPedido, :estadoPedido, :estado)");
            $request->bindParam(':codigo', $this->codigo);
            $request->bindParam(':fecha', $this->fecha);
            $request->bindParam(':idUser', $this->idUser);
            $request->bindParam(':nombre', $this->nombre);
            $request->bindParam(':direccion', $this->direccion);
            $request->bindParam(':telefono', $this->telefono);
            $request->bindParam(':total', $this->total);
            $request->bindParam(':formaPago', $this->formaPago);
            $request->bindParam(':fechaEnvPedido', $this->fechaEnvPedido);
            $request->bindParam(':estadoPedido', $this->estadoPedido);
            $request->bindParam(':estado', $this->estado);
            $request->execute();
            return "pedido creado";
        } catch (PDOException $err) {
            return "Error al crear" . $err->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM pedidos");
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
            $request = $this->con->getCon()->prepare("SELECT * FROM pedidos WHERE id = :id");
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
            $request = $this->con->getCon()->prepare("UPDATE pedidos SET codigo = :codigo, fecha = :fecha, idUser = :idUser, nombre = :nombre, direccion = :direccion,telefono = :telefono, total = :total, formaPago = :formaPago, fechaEnvPedido = :fechaEnvPedido WHERE id = :id");
            $request->bindParam(':codigo', $this->codigo);
            $request->bindParam(':fecha', $this->fecha);
            $request->bindParam(':idUser', $this->idUser);
            $request->bindParam(':nombre', $this->nombre);
            $request->bindParam(':direccion', $this->direccion);
            $request->bindParam(':telefono', $this->telefono);
            $request->bindParam(':total', $this->total);
            $request->bindParam(':formaPago', $this->formaPago);
            $request->bindParam(':fechaEnvPedido', $this->fechaEnvPedido);
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
            $request = $this->con->getCon()->prepare("UPDATE pedidos SET estadoPedido = :estadoPedido, estado = :estado WHERE id = :id");
            $request->bindParam(':estadoPedido', $this->estadoPedido);
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
            $request = $this->con->getCon()->prepare("DELETE FROM pedidos WHERE id = :id");
            $request->bindParam(":id", $this->id);
            $request->execute();
            return "Eliminado";
        } catch (PDOException $err) {
            return "Error al borrar: " . $err->getMessage();
        }
    }
}
