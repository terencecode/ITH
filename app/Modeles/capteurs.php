<?php

require_once "Modeles/modele.php";


class Capteurs extends Modele
{

    /*public function afficherCapteur($id_ca)
    {

        $sql = "SELECT id_ca FROM capteur WHERE id_ca = :id_ca";
        $resultatRequete = $this->executerRequete($sql, array('capteur' => $id_ca))->fetch();

        return $resultatRequete;

    }*/

    public function afficherEtat($type)
    {
            $sql = "SELECT power_state FROM capteur";
            $resultatRequete = $this->executerRequete($sql)->fetch();

        return $resultatRequete;
    }

    public function enregistrerCapteur($valeurs)
    {
        $sql = "INSERT INTO capteur (type_Capteur,power_state, id_piece) VALUES ('$valeurs[0]', '$valeurs[1]','$valeurs[4]')";
        $resultatRequete = $this->executerRequete($sql);
        return $resultatRequete;
    }

    public function chercher_id_piece($type_pieceC)
    {
        $sql = "SELECT id_piece FROM piece WHERE type_piece = :type_pieceC ";
        $resultatRequete = $this->executerRequete($sql, array('type_pieceC' => $type_pieceC))->fetch();
        return $resultatRequete;
    }



}
?>
