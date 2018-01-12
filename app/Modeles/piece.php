<?php

require_once "Modeles/modele.php";

class Piece extends Modele
{
    public function enregistrerPiece($valeurs)
    {
        $sql = "INSERT INTO piece (id_piece, type_piece, long_piece, largeur_piece, hauteur_piece) VALUES ('$valeurs[0]','$valeurs[1]','$valeurs[2]','$valeurs[3]','$valeurs[4]')";
        $resultatrequete = $this->executerRequete($sql);
        return $resultatrequete;
    }
}

