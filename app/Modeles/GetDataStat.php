<?php

//header("Content-Type: text/plain");
require_once "../../../ITH/app/Modeles/capteur.php";

$typeStat = (isset($_GET["typeStat"])) ? $_GET["typeStat"] : NULL;
$TypeCycle = (isset($_GET["TypeCycle"])) ? $_GET["TypeCycle"] : NULL;
$IdCapteur = (isset($_GET["IdCapteur"])) ? $_GET["IdCapteur"] : NULL;
$IdPiece = (isset($_GET["IdPiece"])) ? $_GET["IdPiece"] : NULL;
$DateSelected = (isset($_GET["DateSelected"])) ? $_GET["DateSelected"] : NULL;


$findjournalier   = 'journalier';
$pos = strpos($TypeCycle, $findjournalier);


if ($pos === true) {
// cycle journalier

    //formater le time stamp
    $a = strptime($DateSelected, '%Y -%d-%m--%d');
    $timestamp = mktime(0, 0, 0, $a['tm_mon']+1, $a['tm_mday'], $a['tm_year']+1900);
    echo $timestamp;

}















$Capteur = new Capteur();
$resultatRequete = $Capteur ->GetValues($IdCapteur,$typeStat,$timestamp);



echo $resultatRequete ;


?>