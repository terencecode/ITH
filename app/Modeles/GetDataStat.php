<?php

//header("Content-Type: text/plain");
require_once "../../../ITH/app/Modeles/capteur.php";

$typeStat = (isset($_GET["typeStat"])) ? $_GET["typeStat"] : NULL;
$TypeCycle = (isset($_GET["TypeCycle"])) ? $_GET["TypeCycle"] : NULL;
$IdCapteur = (isset($_GET["IdCapteur"])) ? $_GET["IdCapteur"] : NULL;
$IdPiece = (isset($_GET["IdPiece"])) ? $_GET["IdPiece"] : NULL;


$Capteur = new Capteur();
$resultatRequete = $Capteur ->GetValues($IdCapteur,$typeStat);



echo $resultatRequete ;


?>