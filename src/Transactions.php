<?php

class Transaction extends compteCourant{
    
    function getFees(){         return $this->fees;}
    function getSold(){         return $this->sold;}
    function getDeposit(){      return $this->deposit;}
    function getDateDeposit(){  return $this->dateDeposit;}
    function getRetrait(){      return $this->retrait;}
    function getDateRetrait(){  return $this->dateRetrait;}
    function deposit(float $money){
        if($money>0){
            $this->sold += $money;
            $this->deposit = $money;
            $this->dateDeposit = new DateTime();
            return $this->sold;
        }
        return echo "le montant insufisant";
        
    }
    function retrait(){
        
        if($money<$this->sold){
            $total = $money + static::$fees;
            if($total <= $this->sold){
                $this->sold -= $total;
                $this->retrait = $money;
                $this->dateRetrait= new DateTime();
                return $this->sold;    
            }
            return echo "le sold insefisant de retirait";
                    
        }else{
            throw new Exception("invalid transaction. Sold: " .$this->sold);
            return false;
        }
    }
}