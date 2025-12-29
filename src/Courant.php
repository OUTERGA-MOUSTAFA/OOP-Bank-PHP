<?php

class CompteCourant extends Compte {

    private float $montant = 0;
    private ?DateTime $dateDeposit = null;
    private float $retrait = 0;
    private ?DateTime $dateRetrait = null;

    private static float $fees = 5.42;
    private static string $type = "CompteCourant";

    function __construct(
        $clientCin,
        $bank,
        $ville,
        $agence,
        $rib,
        float $sold = 500
    ){
        parent::__construct($clientCin, $bank, $ville, $agence, $rib, $sold);
    }

    function getType(){
        return static::$type;
    }

    static function getFees(){
        return static::$fees;
    }

    function deposit(float $money){
        if($money <= 0) return false;

        $this->sold += $money;
        $this->montant = $money;
        $this->dateDeposit = new DateTime();

        return $this->sold;
    }

    function retrait(float $money){
        if($money <= 0 || $money > $this->sold) return false;

        $this->sold -= $money;
        $this->retrait = $money;
        $this->dateRetrait = new DateTime();

        return $this->sold;
    }
}
