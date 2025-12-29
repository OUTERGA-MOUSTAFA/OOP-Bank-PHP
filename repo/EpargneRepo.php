<?php
class CompteEpargne extends Compte {

    const Deposit_FEE = 0;
    const Retrait_FEE = 0;

    public function deposit($amount) {
        $this->solde += $amount;
    }

    public function retrait($amount) {
        $this->solde += $amount;
    }
}


