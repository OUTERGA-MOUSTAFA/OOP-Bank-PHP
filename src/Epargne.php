<?php
<?php

class CompteEpargne extends Compte {

    private static float $fees = 1;
    private static string $type = "CompteEpargne";

    protected float $montant = 0;
    protected ?DateTime $dateDeposit = null;
    protected float $retrait = 0;
    protected ?DateTime $dateRetrait = null;

    function __construct(
        string $clientCin,
        string $bank,
        string $ville,
        string $agence,
        string $rib,
        float $sold
    ){
        parent::__construct($clientCin, $bank, $ville, $agence, $rib, $sold);
    }

    function getType(): string {
        return static::$type;
    }

    static function getFees(): float {
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
        $amount = $money - getFees();
        $this->sold -= $money;
        $this->retrait = $money;
        $this->dateRetrait = new DateTime();

        return $this->sold;
    }
}
