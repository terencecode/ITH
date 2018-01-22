<?php

require_once "Modeles/modele.php";

class Piece extends Modele
{

    public function enregistrerPiece($valeurs)
    {
        $sql = "INSERT INTO piece (type_piece, long_piece, largeur_piece, hauteur_piece,id_gerant,emplacement) VALUES ('$valeurs[0]','$valeurs[1]','$valeurs[2]','$valeurs[3]','$valeurs[4]','$valeurs[5]')";
        $resultatrequete = $this->executerRequete($sql);
        return $resultatrequete;
    }

    public function afficherPiece($id_gerant)
    {
        $sql = "SELECT type_piece FROM piece WHERE id_gerant=:id_gerant";
        $resultatRequete = $this->executerRequete($sql, array('id_gerant' => $id_gerant))->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }

    public function supprimer_piece($type_piece)
    {
        $sql = "DELETE FROM piece WHERE type_piece=:type_piece";
        $resultatRequete = $this->executerRequete($sql, array('type_piece' => $type_piece));
        return $resultatRequete;
    }

    public function afficherHabitations($id_habitation)
    {
        $sql = "SELECT rue_habitation FROM habitation WHERE id_habitation=:id_habitation";
        $resultatRequete = $this->executerRequete($sql, array('id_habitation' => $id_habitation))->fetch();
        return $resultatRequete;
    }

    public function chercherIDHabitations($id_gerant)
    {
        $sql = "SELECT id_habitation FROM gerant WHERE id_gerant=:id_gerant";
        $resultatRequete = $this->executerRequete($sql, array('id_gerant' => $id_gerant))->fetch();
        return $resultatRequete;
    }



}

