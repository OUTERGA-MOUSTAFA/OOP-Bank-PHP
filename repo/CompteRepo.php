<?php
include_once  __DIR__ . '/../src/Compte.php';
include_once __DIR__ . '/../config/Database.php';
 class CompteRepo extends BaseModel {
    private PDO $pdo;
    public function __construct(){
        $this->pdo = Database::getInstance()->getconexion();
    }
    function createClient($Newclient) {
        $query = 'SELECT CIN , email FROM CLIENT where CIN = ? OR email = ?';
        try{
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$Newclient->getCIN(),$Newclient->getEmail()]);
            $check = $stmt->fetch();
            if($check['CIN'] == $Newclient->getCIN() ){
                echo "<script>alert('CIN already used!')</script>";
            }elseif($check['email'] == $Newclient->getEmail()){
                echo "<script>alert('Email already used!')</script>";
            }else{
                $sql = "INSERT INTO CLIENT (name, CIN, telephne,email,codePostale,city,dateNaissance) VALUES (?,?,?,?,?,?,?)";
                $stmt = $this->pdo->prepare($sql);
                return $stmt->execute([$Newclient->getName(),
                            $Newclient->getCIN(),
                            $Newclient->getTelephone(),
                            $Newclient->getEmail(),
                            $Newclient->getCodePostale(),
                            $Newclient->getCity(),
                            $Newclient->getDateNaissance()]);
                echo "<script>alert('Inserted well!')</script>";
            }
        }catch(PDOException $e){
            echo "sever error : ". $e->getMessage();
        }
    }
     public function deposit($amount);
     public function retrait($amount);
}


