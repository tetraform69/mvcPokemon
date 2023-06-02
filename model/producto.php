<?php

namespace Model;

include_once "conexion.php";

class Producto
{

    private $id;
    private $nombre;
    private $precio;
    private $cantidad;
    private $descripcion;
    private $estado = 'A';
    public $con; //* Objeto conexion

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO productos(nombrePro, precioPro, cantidadPro, descripPro, estado) VALUES(:nombre, :precio, :cantidad, :descripcion, :estado)");
            $request->bindParam(':nombre', $this->nombre);
            $request->bindParam(':precio', $this->precio);
            $request->bindParam(':cantidad', $this->cantidad);
            $request->bindParam(':descripcion', $this->descripcion);
            $request->bindParam(':estado', $this->estado);
            $request->execute();
            return "Producto creado";
        } catch (PDOExeption $err) {
            return "Error al crear" . $err->getMessage();
        }
    }

    public function read()
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM productos");
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
            $request = $this->con->getCon()->prepare("SELECT * FROM productos WHERE id = :id");
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
            $request = $this->con->getCon()->prepare("UPDATE productos SET nombrePro = :nombre, precioPro = :precio, cantidadPro = :cantidad, descripPro = :descripcion WHERE id = :id");
            $request->bindParam(':nombre', $this->nombre);
            $request->bindParam(':precio', $this->precio);
            $request->bindParam(':cantidad', $this->cantidad);
            $request->bindParam(':descripcion', $this->descripcion);
            $request->bindParam(':id', $this->id);
            $request->execute();
            $result = "Actualizado";
            return $result;
        } catch (PDOExeption $err) {
            return "Error al leer" . $err->getMessage();
        }
    }

    public function estado()
    {
        try {
            $request = $this->con->getCon()->prepare("UPDATE productos SET estado = :estado WHERE id = :id");
            $request->bindParam(':estado', $this->estado);
            $request->bindParam(':id', $this->id);
            $request->execute();
            $result = "Estado = $this->estado";
            return $result;
        } catch (PDOExeption $err) {
            return "Error" . $err->getMessage();
        }
    }

    public function delete()
    {
        try {
            $request = $this->con->getCon()->prepare("DELETE FROM productos WHERE id = :id");
            $request->bindParam(":id", $this->id);
            $request->execute();
            return "Eliminado";
        } catch (PDOExeption $err) {
            return "Error al borrar: " . $err->getMessage();
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
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio($precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     */
    public function setCantidad($cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;

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
