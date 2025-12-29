<?php
include_once  __DIR__ . '/../src/Compte.php';
include_once __DIR__ . '/../config/Database.php';
abstract class CompteRepo {
    protected PDO $pdo;
    public function __construct(){
        $this->pdo = Database::getInstance()->getconexion();
    }


    abstract function createCompteCourant($NewCompte);
    abstract public function deposit($amount);
    abstract public function retrait($amount);
}


