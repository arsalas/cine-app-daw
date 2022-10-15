<?php

namespace Src\App\Review;

use PDOException;
use Src\Database\DatabaseConnector;

class ReviewModel
{
    private $db;
    private $table = 'review';

    public function __construct($db = null)
    {
        if (!isset($db)) $this->db = new DatabaseConnector();
        else $this->db = $db;
    }


    public function selectOne($id)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "SELECT * FROM $this->table WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id);
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

    public function selectAllByMovie($movieId)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "SELECT * FROM $this->table WHERE movieId = :movieId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':movieId', $movieId);
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

    public function insert($params)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "INSERT INTO $this->table (movieId, userId, content, score) VALUES (:movieId, :userId, :content, :score)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':movieId', $params['movieId']);
            $stmt->bindParam(':userId', $params['userId']);
            $stmt->bindParam(':content', $params['content']);
            $stmt->bindParam(':score', $params['score']);
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


    public function update($params)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "UPDATE $this->table SET content = :content, score = :score WHERE userId = :userId AND movieId = :movieId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':movieId', $params['movieId']);
            $stmt->bindParam(':userId', $params['userId']);
            $stmt->bindParam(':content', $params['content']);
            $stmt->bindParam(':score', $params['score']);
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
    public function delete($userId, $movieId)
    {
        try {
            $pdo = $this->db->getConn();
            $query = "DELETE FROM $this->table WHERE userId = :userId AND movieId = :movieId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':movieId', $movieId);
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
}
