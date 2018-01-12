<?php

require_once "Modeles/modele.php";


class Capteurs extends Modele
{

    public function afficherPiece($type_piece)
    {

        $sql = "SELECT type_piece FROM piece WHERE type_piece=:type_piece";
        $resultatRequete = $this->executerRequete($sql, array('piece' => $type_piece))->fetch();
    }

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
        $sql = "INSERT INTO capteur (power_state) VALUES ('$valeurs[1]')";
        $resultatrequete = $this->executerRequete($sql);
        return $resultatrequete;
    }


}
?>
