<?php

class Conexion
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "pokemon33";
    private $con;

    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:dbname=$this->database;host=$this->host", $this->user, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "falla la conexion" . $e->getMessage();
        }
    }

    /**
     * get the conexion
     */
    public function getCon()
    {
        return $this->con;
    }
}
