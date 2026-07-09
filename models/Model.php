<?php

require_once __DIR__ . '/../config/db.php';

abstract class Model
{
    protected PDO $db;
    protected string $table;

    public function __construct()
    {
        $this->db = getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM ' . $this->table);
        return $stmt->fetchAll();
    }

    public function findById(int $id): array|false
    {
        $stmt = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
