<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "Bank";
    private static $instatce =null;
    private PDO $pdo;
    private function __construct() {
        try{
            $dsn = "mysql:host=" . $this->host .
            ";dbname=" . $this->dbname . ";charset=utf8";
            $this->pdo = new PDO($dsn,$this->user,$this->pass);

            // add pramettres to my conexion like feshing as assoc table, and show 
            // errors of connxion/ Prepared Statement on my database side
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(){
        if(static::$instatce ===null){
            static::$instatce = new Database();
        }
        return static::$instatce;
    }

    public function getconexion(): PDO {
        return $this->pdo;
    }
}