<?php
include_once 'Compt.php';
class compteCourant extends Compte{
    protected $deposit;
    protected ?DateTime $dateDeposit = null;
    protected $retrait;
    protected ?DateTime $dateRetrait = null; // means null-> no transaction || datetime -> transaction
    protected static float $fees;
    protected $sold =500;


    function __construct($dateCreation,$bank,$ville,$agence,$rib,
                        $deposit, $dateDeposit, $retrait, $dateRetrait, $sold){
        parent::__construct($dateCreation,$bank,$ville,$agence,$rib);
        static$fees = 5.42;
        $this->deposit = $deposit;
        $this->dateDeposit = new DateTime($dateDeposit);
//$this->dateRetrait->setTime(0, 0, 0);
        $this->retrait = $retrait;
        $this->dateRetrait = new DateTime($dateRetrait);
        $this->sold = $sold - $fees;
    }
    // getters
    function   getFees(){           return $this->fees;}
    function   getSold(){           return $this->sold;}
    function getDeposit(){      return $this->deposit;}
    function getDateDeposit(){  return $this->dateDeposit;}
    function getRetrait(){      return $this->retrait;}
    function getDateRetrait(){  return $this->dateRetrait;}


    // setters
    // function setFees($fee){ $this->fees = $fee;}

    function deposit(float $money){
        $this->sold += $money;
        $this->deposit = $money;
        $this->dateDeposit = new DateTime();
        
        return $this->sold;
    }
    function retrait(float $money){
        if ($this->dateRetrait !== null) {
            echo $this->dateRetrait->format('Y-m-d');
        } else {
            echo "Aucun retrait effectué";
        }
        if($money<$this->sold){
            $this->sold -= $money - $fees;
            $this->retrait = $money;
            $this->DateRetrait= new DateTime();
            return $this->sold;            
        }else{
            throw new Exception("invalid transaction. Sold: " .$this->sold);
            return false;
        }
    }
}