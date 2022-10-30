<?php

namespace Src\Database;

use PDO;
use PDOException;
use Src\Config\CONFIG;

class DatabaseConnector
{
    private $driver;
    private $host;
    private $user;
    private $pass;
    private $dbName;
    private $charset;
    private $conn;

    public function __construct()
    {
        $this->driver = CONFIG::DB_DRIVER;
        $this->host =CONFIG::DB_HOST;
        $this->user = CONFIG::DB_USERNAME;
        $this->pass = CONFIG::DB_PASSWORD;
        $this->dbName =CONFIG::DB_DATABASE;
        $this->charset = "utf8";
        $this->options = [
            PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //make the default fetch be an associative array
        ];

        $this->conn = $this->conexion();
    }

    protected function conexion()
    {
        try {
            $pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};charset={$this->charset}", $this->user, $this->pass, $this->options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function colseConn()
    {
        $this->conn = null;
    }
}
   




