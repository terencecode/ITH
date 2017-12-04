<?php

require_once "Modeles/modele.php";

class Utilisateurs extends Modele {

  public function afficherUtilisateur($email){

  $sql = 'SELECT nom, prenom, gestionnaire FROM utilisateur WHERE email_u = :email';
  $resultatRequete = $this->executerRequete($sql, array('email' => $email));
  return $resultatRequete;
  }

  public function recupererUtilisateur($valeurs)
  {
      $sql = "INSERT INTO utilisateur (email_u, prenom_u, nom_u, mdp_u, clef_u) VALUES('$valeurs[0]', '$valeurs[1]', '$valeurs[2]', AES_ENCRYPT('$valeurs[3]', UNHEX('F3229A0B371ED2D9441B830D21A390C3')), '$valeurs[5]')";
      $resultatrequete = $this->executerRequete($sql);
      return $resultatrequete;
  }

}
