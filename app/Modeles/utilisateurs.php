<?php

require_once "Modeles/modele.php";

class Utilisateurs extends Modele {

  public function afficherUtilisateur($id){
/*
  $sql = 'SELECT nom_u, prenom_u FROM utilisateur WHERE id_utilisateur = :id';
  $resultatRequete = $this->executerRequete($sql, array('id' => $id));
  return $resultatRequete;  */
  }

  public function recupererUtilisateur($valeurs)
  {

  }

}
