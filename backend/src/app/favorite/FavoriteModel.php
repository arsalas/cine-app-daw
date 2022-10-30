<?php

namespace Src\App\Favorite;

use PDOException;
use Src\Database\DatabaseConnector;

class FavoriteModel
{
    private $db;
    private $table = 'favorites';

    public function __construct($db = null)
    {
        if (!isset($db)) $this->db = new DatabaseConnector();
        else $this->db = $db;
    }

    public function selectAllByUser($userId)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "SELECT * FROM $this->table WHERE userId = :userId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $result = $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            return false;
        } finally {
            $stmt = null;
            $this->db->colseConn();
        }
    }

    public function insert($userId, $movieId)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "INSERT INTO $this->table (movieId, userId) VALUES (:movieId, :userId)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':movieId', $movieId);
            $stmt->bindParam(':userId', $userId);
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

    public function delete($userId, $movieId)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "DELETE FROM $this->table WHERE userId = :userId AND movieId = :movieId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':movieId', $movieId);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false;
        } finally {
            $stmt = null;
            $this->db->colseConn();
        }
    }
}
