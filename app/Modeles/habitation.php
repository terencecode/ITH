<?php

require_once "Modeles/modele.php";


class Habitation extends Modele
{

  public function chercherHabitations($id)
  {
    $sql = "SELECT * FROM habitation";
    $resultatRequete = $this->executerRequete($sql, array('id_gerant' => $id_gerant))->fetchAll(PDO::FETCH_ASSOC);
    return $resultatRequete;
  }

  public function ajouterHabitation($valeurs)
  {
    $sql = "INSERT INTO habitation (pays_habitation, ville, num_rue_habitation, rue_habitation, sup_habitation) VALUES ('$valeurs[0]', '$valeurs[1]', '$valeurs[2]', '$valeurs[3]', '$valeurs[4]')";
    $resultatRequete = $this->executerRequete($sql);
    return $resultatRequete;
  }

}
