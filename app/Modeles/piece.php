<?php

require_once "Modeles/modele.php";

class Piece extends Modele
{
    public function enregistrerPiece($valeurs)
    {
        $sql = "INSERT INTO piece (type_piece, long_piece, largeur_piece, hauteur_piece,id_gerant) VALUES ('$valeurs[0]','$valeurs[1]','$valeurs[2]','$valeurs[3]','$valeurs[4]')";
        $resultatrequete = $this->executerRequete($sql);
        return $resultatrequete;
    }

    public function afficherPiece($id_gerant)
    {

        $sql = "SELECT type_piece FROM piece WHERE id_gerant=:id_gerant";
        $resultatRequete = $this->executerRequete($sql, array('id_gerant' => $id_gerant))->fetch();
        return $resultatRequete;
    }
}

