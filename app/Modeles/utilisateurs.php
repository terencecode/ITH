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
    die(var_dump($valeurs));
  }

}
