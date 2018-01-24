<?php

require_once "Modeles/modele.php";


class Capteurs extends Modele
{

    public function afficherEtat($id_piece)
    {
        $sql = "SELECT * FROM capteur WHERE id_piece=:id_piece";
        $resultatRequete = $this->executerRequete($sql, array('id_piece' => $id_piece))->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }

    public function joinCapteurPiece($id_gerant)
    {
        $sql = "SELECT * FROM capteur JOIN piece ON capteur.id_piece=piece.id_piece WHERE piece.id_gerant=:id_gerant";
        $resultatRequete = $this->executerRequete($sql, array('id_gerant' => $id_gerant))->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }

    public function enregistrerCapteur($valeurs)
    {
        $sql = "INSERT INTO capteur (type_Capteur,power_state, id_piece,nom_Capteur) VALUES ('$valeurs[0]', '$valeurs[1]','$valeurs[5]','$valeurs[6]')";
        $resultatRequete = $this->executerRequete($sql);
        return $resultatRequete;
    }

    public function chercher_id_piece($type_piece)
    {
        $sql = "SELECT id_piece FROM piece WHERE type_piece=:type_piece";
        $resultatRequete = $this->executerRequete($sql, array('type_piece' => $type_piece))->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }
    public function chercher_id_pieceG($id_gerant)
    {
        $sql = "SELECT id_piece FROM piece WHERE id_gerant=:id_gerant ";
        $resultatRequete = $this->executerRequete($sql, array('id_gerant' => $id_gerant))->fetchAll(PDO::FETCH_ASSOC);
        return $resultatRequete;
    }


    public function supprimer_capteur($id_piece, $nom_Capteur)
    {
        $sql = "DELETE FROM capteur WHERE id_piece=:id_piece AND nom_Capteur=:nom_Capteur";
        $resultatRequete = $this->executerRequete($sql, array('id_piece'=>$id_piece,'nom_Capteur' => $nom_Capteur));
        return $resultatRequete;
    }

    public function supprimer_capteur_piece($id_piece)
    {
        $sql = "DELETE FROM capteur WHERE id_piece=:id_piece ";
        $resultatRequete = $this->executerRequete($sql, array('id_piece' => $id_piece));
        return $resultatRequete;
    }

    public function update_capteur($Update)
    {
        $sql = "UPDATE capteur SET  WHERE id_piece=:id_piece ";
        $resultatRequete = $this->executerRequete($sql, array('id_piece' => $id_piece));
        return $resultatRequete;
    }
}
?>
