<?php

class Compte{
    protected int $clientCin;
    protected ?DateTime $dateCreation = null;
    protected $bank;
    protected $ville;
    protected $agence;
    protected $rib;

    // construct
    function __construct($clientCin,$date, $bank, $city, $agent, $seri){
        $this->clientCin = $clientCin;
        $this->dateCreation = new DateTime($date);
        $this->bank = $bank;
        $this->ville = $city;
        $this->agence = $agent;
        $this->rib = $seri;
    }

    // getters
    function getClientCin(){
        return $this->clientCin;
    }
    function getDateCreation(){return $this->dateCreation;}
    function getBank(){return $this->bank;}
    function getVille(){return $this->ville;}
    function getAgence(){return $this->agence;}
    function getRib(){return $this->hideCard($this->rib);}
    // setters
    function setDateCreation($date){ $this->dateCreation = $date;}
    function setBank($bank){ $this->bank = $bank;}
    function setVille($city){ $this->ville = $city;}
    function setAgence($agent){ $this->agence = $agent;}
    function setRib($seri){ $this->rib = $seri;}


    // funtion for hidden some values of rib
    function hideCard($card){
        if (strlen($card) <= 4) {
            return str_repeat("*", strlen($card) - 3) . substr($card, -3);
        }
        return str_repeat("*", strlen($card) - 4) . substr($card, -4);
    }


    function __toString(){
        return "Bank: " . $this->bank . ", Agence:" . $this->agence . ", Ville: " . 
        $this->ville . ", date creation: " . $this->dateCreation->format("Y-m-d"). ", Seri: " . $this->hideCard($this->rib);
    }
}