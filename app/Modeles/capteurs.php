<?php

require_once "Modeles/modele.php";


class Capteurs extends Modele {


    public function afficherCapteur($id_ca){

        $sql = "SELECT id_ca FROM capteur WHERE id_ca = :id_cap";
        $resultatRequete = $this->executerRequete($sql, array('capteur' => $id_ca))->fetch();

        return $resultatRequete;

    }

    public function afficherPiece($id_piece){

        $sql = "SELECT id_piece FROM capteur WHERE id_piece=:id_piece";
        $resultatRequete = $this->executerRequete($sql, array('piece' => $id_piece))->fetch();

    public function afficherEtat($on_off){
            $sql = "SELECT power_state FROM capteur WHERE power_state = :on_off";
            $resultatRequete = $this->executerRequete($sql, array('on_off' => $on_off))->fetch();

        return $resultatRequete;
    }

}
