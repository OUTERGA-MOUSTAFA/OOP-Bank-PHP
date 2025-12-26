<?php

class compteCourant extends Compt{

    private $montant;
    private ?DateTime $dateDeposit = null;
    private $retrait;
    private ?DateTime $dateRetrait = null; // means null-> no transaction || datetime -> transaction
    private static float $fees = 5.42;

    function __construct($clientCin,$dateCreation,$bank,$ville,$agence,$rib
                    , $dateDeposit, $retrait, $dateRetrait, $sold = 500){
        parent::__construct($clientCin,$dateCreation,$bank,$ville,$agence,$rib,$sold);
        static::$fees = $fees;
        $this->montant = $montant;
        $this->dateDeposit = new DateTime($dateDeposit);
        //$this->dateRetrait->setTime(0, 0, 0);
        $this->retrait = $retrait;
        $this->dateRetrait = new DateTime($dateRetrait);
    }
    // getters
    static function getFees(){ return static::$fees;}
    function   getSold(){       return $this->sold;}
    function getDeposit(){      return $this->montant;}
    function getDateDeposit(){  return $this->dateDeposit;}
    function getRetrait(){      return $this->retrait;}
    function getDateRetrait(){  return $this->dateRetrait;}


    // setters
    // function setFees($fee){ $this->fees = $fee;}

    static function deposit(float $money){
        $total = $money + static::$fees;
                        // $total>=0
        if($money>0 && $total <= $this->sold){
            $this->sold += $money;
            $this->montant = $money;
            $this->dateDeposit = new DateTime();
            return $this->sold;
        }
        return false;
        
    }
    function retrait(float $money){
            $total = $this->sold - $money;       
        if($money>0 && $total>=0){
            $this->sold -= $money;
            $this->retrait = $money;
            $this->dateRetrait= new DateTime();
            return $this->sold;    
        }        
        return false;
        
    }
}