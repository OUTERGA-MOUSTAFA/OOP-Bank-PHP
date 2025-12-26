<?php
class compteEpargne extends Compt{
    private static float $fees = 1;
    // protected for saving transaction 
    protected $montant;
    protected ?DateTime $dateDeposit = null;
    protected $retrait;
    protected ?DateTime $dateRetrait = null; // means null-> no transaction || datetime -> transaction 

    public function __construct($clientCin,$dateCreation,$bank,$ville,$agence,$rib,$sold
                        , $dateDeposit, $retrait, $dateRetrait) 
    {        
        parent::__construct($clientCin,$dateCreation,$bank,$ville,$agence,$rib,$sold);
        static::$fees = $fees;
        $this->montant = $montant;
        $this->dateDeposit = $dateDeposit;
        $this->retrait = $retrait;
        $this->dateRetrait = $dateRetrait;

    }

    // Getters function
    static function getFees(){return static:: $fees;}
    function deposit(float $money){
        $total = $this->sold + static::$fees;
        if($money > 0 && $total >= 0){
            $this->sold += $money;
            $this->montant = $money;
            $this->dateDeposit = new DateTime();
            
            return $this->sold;
        }
        return 0;
        
    }
     static function retrait(float $money){
        $total = $this->sold;
        if($total<$this->sold){

            $this->sold -= $money;
            $this->retrait = $money;
            $this->dateRetrait = new DateTime();
            return $this->sold;            
        }
            
            return 0;
    }

}