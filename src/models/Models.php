<?php

namespace App\Models;

use PDO;
use App\Utils\Hydrate;

class Models
{

    private PDO $pdo;

    protected string $table;
    protected string $className;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=bu;charset=utf8", "root", "root");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function connect(): ?PDO
    {
        return $this->pdo;
    }

    // Lire tous les data
    public function readAll()
    {
        $req = $this->connect()->prepare("SELECT * FROM " . $this->table);
        $req->execute();
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return Hydrate::convertArrayToObject($results, $this->className);
    }

    // Lire une donnée
    public function read(int $id)
    {
        $req = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->connect()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return Hydrate::arrayToObject($this->className, $result[0]);
    }

    // Faut je réfléchis comment le faire
    public function create(array $data): void
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $values = array_values($data);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);
    }

    // Faut je réfléchis comment le faire
    public function update(int $id, array $data): void
    {
        $columns = array_keys($data);
        $placeholders = array_map(function ($column) {
            return $column . ' = ?';
        }, $columns);

        $sql = "UPDATE {$this->table} SET " . implode(', ', $placeholders) . " WHERE id = ?";
        $values = array_merge(array_values($data), [$id]);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);
    }

    // Suppression
    public function remove(int $id): void
    {
        $req = $this->connect()->prepare("DELETE FROM " . $this->table . " WHERE id=?");
        $req->execute([$id]);
        $req->closeCursor();
    }
}
