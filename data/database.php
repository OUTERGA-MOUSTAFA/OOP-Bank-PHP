<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "Bank";

    //protected=> because this pdo(conxion) will be changed on requetts
    protected $pdo;

    public function __construct() {
        try{
            $dsn = "mysql:host=" . $this->host .
            ";dbname=" . $this->dbname . ";charset=utf8";
            $this->pdo = new PDO($dsn,$this->$user,$this->$pass);

            // add pramettres to my conexion like feshing as assoc table, and show 
            // errors of connxion/ Prepared Statement on my database side
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES => false);
        }catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}