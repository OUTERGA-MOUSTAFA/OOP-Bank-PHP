<?php

include_once 'Courant.php';
class compteEpargne extends compteCourant{
    function deposit(float $money){
        $this->sold += $money + $fees;
        $this->deposit = $money;
        $this->dateDeposit = new DateTime();
        
        return $this->sold;
    }
    function retrait(float $money){

        if($money<$this->sold){

            $this->sold -= $money;
            $this->retrait = $money;
            $this->dateRetrait = new DateTime();
            return $this->sold;            
        }else{
            throw new Exception("invalid transaction. Sold: " .$this->sold);
            return false;
        }
    }

}