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
      /*$sql = 'INSERT INTO utilisateur (email_u, prenom_u, nom_u, mdp_u, clef_u) VALUES'*/
  }

}
