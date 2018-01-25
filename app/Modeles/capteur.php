<?php

require_once "../../../ITH/app/Modeles/modele.php";


class Capteur extends Modele
{

    public function GetValues($id_ca,$TypeCapteur,$timestamp)
    {
        $sql = "SELECT  valeur , timestamp FROM ";
        $sql  = $sql  . $TypeCapteur;
        $sql  = $sql  . " WHERE id_ca=";
        $sql  = $sql.$id_ca;
        $sql  = $sql ." ORDER BY timestamp";

      //  $resultatRequete = $this->executerRequete($sql, array('id_ca' => $id_ca))->fetchAll(PDO::FETCH_ASSOC);
        $resultat = $this->executerRequete($sql, null);



        echo "<list>";
        echo $timestamp;

        while ($Tab_result= $resultat->fetch()) {

            $item = "<item valeur=\"" .$Tab_result["valeur"] . "\" timestamp=\"" . $Tab_result["timestamp"] . "\" />";
            //echo  $Tab_result["nom"];
            echo  $item;

        }
        echo "</list>";
    }





}
?>
