<?php

abstract class BaseModel {
    protected static $db;
    protected $table;

    public function __construct(PDO $pdo) {
        static::$db = $pdo;
    }

    public function all() {
        $stmt = static::$db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }

    public function findId($Cin) {
        $stmt = static::$db->prepare("SELECT * FROM {$this->table} WHERE Cin = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function findEmail($email) {
        $stmt = static::$db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function delete($id) {
        $stmt = static::$db->prepare("DELETE FROM {$this->table} WHERE Cin = ?");
        return $stmt->execute([$id]);
    }
}
