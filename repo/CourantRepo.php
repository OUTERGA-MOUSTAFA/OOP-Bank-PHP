<?php


class CompteCourantRepo extends Compte {


    
    function createCompteCourant($NewCompte){
        $query = 'SELECT clientCin FROM Compte where type_compte = ?';
        try{
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$NewCompte->getType()]);
            $check = $stmt->fetch();
            if($check['clientCin'] == $NewCompte->getCIN() ){
                echo "<script>alert('Already this acoute created by this client!')</script>";
            }else{
                $sql = "INSERT INTO Compte (clientCin, dateCreation, bank,ville,agence,rib,type_compte,sold) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = $this->pdo->prepare($sql);
                return $stmt->execute([$NewCompte->getClientCin(),
                            $NewCompte->getDateCreation(),
                            $NewCompte->getBank(),
                            $NewCompte->getVille(),
                            $NewCompte->getAgence(),
                            $NewCompte->getRib(),
                            $NewCompte->getType(),
                            $NewCompte->getSold()]);
                echo "<script>alert('compte ' .$NewCompte->gettype() ' seccus created!')</script>";
            }
        }catch(PDOException $e){
            echo "sever error : ". $e->getMessage();
        }
    }
    const Deposit_FEE = 1;
    const Retrait_FEE = 5;

    public function deposit($amount) {
        $this->solde += $amount;
    }

    public function retrait($amount) {
        $this->solde -= $amount + self::$retrait_FEE;
    }
}
