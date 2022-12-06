<?php

namespace Src\App\Auth;

use PDOException;
use Src\Database\DatabaseConnector;

class AuthModel
{
    private $db;
    private $table = 'users';

    public function __construct($db = null)
    {
        if (!isset($db)) $this->db = new DatabaseConnector();
        else $this->db = $db;
    }

    public function insert($email, $password)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "INSERT INTO $this->table (email, password) VALUES (:email, :password)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();
			$userId = $pdo->lastInsertId();
            return $userId;
        } catch (PDOException $e) {
            return false;
        } finally {
            $stmt = null;
            $this->db->colseConn();
        }
    }

    public function selectOne($email, $password)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "SELECT * FROM $this->table WHERE email = :email AND password = :password";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[0];
        } catch (PDOException $e) {
            return false;
        } finally {
            $stmt = null;
            $this->db->colseConn();
        }
    }
}
