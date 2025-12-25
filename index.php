<?php
include_once('src/Client.php');
include_once('src/Compt.php');
include_once('src/Courant.php');
include_once('src/Epargne.php');
$Mohamed = new client(
    'Mohamed',
    'JA15427',
    '06554477',
    'email@mail.fr',
    90000,
    'Tanger',
    '2000-01-09'
);

$compte = new compte(
    // 'Ali',
    // 'JA15427',
    // '06554477',
    // 'email@mail.fr',
    // 90000,
    // 'Tanger',
    // '2000-01-09',
    "2023-05-25",
    "CIH","Nador",
    "Paso",
    "145824522562563",
    // 20,10,50,"2025-11-30",new DateTime()
    );
// echo "hello";
// print_r($Mohamed->__toString());

echo '<pre>';
print_r($Mohamed);
echo 'age: '. $Mohamed->getAge() . " years old";
echo '</pre>';

echo "<br>";
echo '<pre>';
print_r($compte);
echo '</pre>';
    /*
    $dateCreation,$bank,$ville,$agence,$rib,
    $deposit,DateTime $dateDeposit, $retrait,DateTime $dateRetrait, $sold
    */
$CompteCourant = new compteCourant(
    "2025-07-24","BMCE",'Agadir','el hoda','15445875562698656',
    40,"2025-11-15",500,"2024/02/02",500);
echo "<br>";
echo '<pre>';
print_r($CompteCourant);
echo '</pre>';

$CompteEpargne = new compteEpargne(
    "2026-01-01","CFG",'Guelmim','hay moritan','1547826142585',
    40,"2025-11-15",500,"2024/02/02",500);
echo "<br>";
echo '<pre>';
print_r($CompteEpargne);
echo '</pre>';