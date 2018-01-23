<?php

require_once "Modeles/modele.php";


class Habitation extends Modele
{

  public function ajouterHabitation($valeurs)
  {
    $sql = "INSERT INTO habitation (pays_habitation, ville, num_rue_habitation, rue_habitation, sup_habitation) VALUES ('$valeurs[0]', '$valeurs[1]', '$valeurs[2]', '$valeurs[3]', '$valeurs[4]')";
    $resultatRequete = $this->executerRequete($sql);
    return $resultatRequete;
  }

  public function chercherIdHabitation()
  {
    $sql = "SELECT LAST_INSERT_ID() FROM habitation";
    $resultatRequete = $this->executerRequete($sql)->fetch();
    return $resultatRequete;
  }

  public function chercherDonneesHabitation($id_u)
  {
    $sql = "SELECT habitation.ville, habitation.pays_habitation, habitation.rue_habitation
    FROM habitation
    JOIN gerant ON habitation.id_habitation = gerant.id_habitation
    JOIN utilisateur ON gerant.id_u = utilisateur.id_u
    WHERE utilisateur.id_u = :id_u";
    $resultatRequete = $this->executerRequete($sql, array('id_u' => $id_u))->fetchAll(PDO::FETCH_ASSOC);
    return $resultatRequete;
  }

}
