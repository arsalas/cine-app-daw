<?php

namespace Src\App\Profile;

use PDOException;
use Src\Database\DatabaseConnector;

class ProfileModel
{
    private $db;
    private $table = 'profile';

    public function __construct($db = null)
    {
        if (!isset($db)) $this->db = new DatabaseConnector();
        else $this->db = $db;
    }

    public function insertOrUpdate($userId, $name, $avatar)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "INSERT INTO $this->table (userId, name, avatar) VALUES (:userId, :name, :avatar) 
            ON DUPLICATE KEY UPDATE name = :name2, avatar = :avatar2";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->bindParam(':name2', $name);
            $stmt->bindParam(':avatar2', $avatar);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            var_dump($e);
            return false;
        } finally {
            $stmt = null;
            $this->db->colseConn();
        }
    }

    public function selectOne($userId)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "SELECT * FROM $this->table WHERE userId = :userId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':userId', $userId);
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
