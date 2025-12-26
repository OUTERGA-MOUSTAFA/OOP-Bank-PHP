<?php

class client{
    // private static int $counter = 0;
    // private $id;
    private $name;
    private $CIN;
    private $telephne;
    private $email;
    private $codePostale;
    private $city;
    private $dateNaissance;

    public function __construct($name,$CIN,$telephne,$email,$codePostale,$city,$dateNaissance){
        
        // static::$counter++;
        // $this->id = static::$counter;
        $this->name = $name;
        $this->CIN = $CIN;
        $this->telephne = $telephne;
        $this->email = $email;
        $this->codePostale = $codePostale;
        $this->city = $city;
        $this->dateNaissance = $dateNaissance;
    } 
    // oop console without database
    // getters
    
    public function getName(){       return $this->name;    }
    public function getCIN(){        return $this->CIN;    }
    public function getTelephone(){   return $this->telephne;    }
    public function getEmail(){       return $this->email;    }
    public function getCodePostale(){ return $this->codePostale;    }
    public function getCity(){        return $this->city;    }
    public function getDateNaissance(){return $this->dateNaissance;    }

    // setters
    // public function setName($name){             $this-> name = $name;    }
    // public function setCIN($cin){               $this-> CIN = $cin;    }
    // public function setTelephone($tel){         $this->telephne = $tel;    }
    // public function setEmail($email){           $this->email = $email;    }
    // public function setCodePostale($code){      $this->codePostale = $code;    }
    // public function setCity($ville){            $this->city= $ville;    }
    // public function setDateNaissance($dN){      $this->dateNaissance = $dN;    }
// // get age of client
//     public function getAge(): int{
//         $today = new DateTime();
//         $birthday = new DateTime($this->dateNaissance);
//         $age = $today->diff($birthday);
//         return $age->y;
//     }
    
//     // function to
//     public function __toString(){
//         return "Name: ". $this->name .", telephone: ". $this->telephne.  ", Email: ". $this->email.", code Postale ". $this->codePostale . ", city: ". $this->city . ", Age: ". $this->getAge() . '.';
//     }


}