<?php
// include_once 'baseModel.php';
include_once  __DIR__ . '/../src/Client.php';
include_once __DIR__ . '/../config/Database.php';
class ClientRepo {
    //-> |this for baseModel to know name table i am targeting|=> protected $table = "CLIENT";
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
            if($check){
                if($check['CIN'] == $Newclient->getCIN() ){
                    echo "<script>alert('CIN already used!')</script>";
                }elseif($check['email'] == $Newclient->getEmail()){
                    echo "<script>alert('Email already used!')</script>";
                }
                    
            }else{
                $sql = "INSERT INTO CLIENT (name, CIN, telephne,email,codePostale,city,dateNaissance) VALUES (?,?,?,?,?,?,?)";
                try{
                $stmt = $this->pdo->prepare($sql);
                    return $stmt->execute([$Newclient->getName(),
                                $Newclient->getCIN(),
                                $Newclient->getTelephone(),
                                $Newclient->getEmail(),
                                $Newclient->getCodePostale(),
                                $Newclient->getCity(),
                                $Newclient->getDateNaissance()]);
                    echo "<script>alert('Inserted well!')</script>";
            }catch(PDOException $e){
                // for test but in real project we hidden this errors.
                echo "sever error 1 sql insert : ". $e->getMessage();
            }}
        }catch(PDOException $e){
           echo "sever error 2 sql: ". $e->getMessage();
        }
    }
    public function findByClient($email) {
        $sql = "SELECT * FROM CLIENT WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row;
    }
    public function AfficherClients() {
        $sql = "SELECT * FROM CLIENT";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $arry = $stmt->fetchAll();
        return $arry;
    }

    public function updateClient($Client): bool {
        $sql = "UPDATE FROM CLIENT SET name = ?, telephne = ?,
         email = ?, codePostale = ?, city = ?, dateNaissance = ? WHERE CIN = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$Client->getName(),
                            $Client->getEmail(),
                            $Client->getTelephone(),
                            $Client->getCodePostale(),
                            $Client->getCity(),
                            $Client->getDateNaissance()->format('Y-m-d'),
                        $Client->getCIN(),]);
    }
    public function deleteClient($cin): bool {
        $sql = "DELETE FROM CLIENT WHERE CIN = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$cin]);
    }
}