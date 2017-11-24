<?php

require_once "Modeles/modele.php";

class Utilisateurs extends Modele {

  public function afficherUtilisateur($id){

  $sql = 'SELECT nom, prenom, gestionnaire FROM utilisateur WHERE id_utilisateur = :id';
  $resultatRequete = $this->executerRequete($sql, array('id' => $id));
  return $resultatRequete;
  }

}
