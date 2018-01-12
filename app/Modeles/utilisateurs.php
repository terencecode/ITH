<?php

require_once "Modeles/modele.php";

class Utilisateurs extends Modele {


    public function chercherUtilisateur($email){

      $sql = "SELECT email_u, mdp_u FROM utilisateur WHERE email_u = :email";
      $resultatRequete = $this->executerRequete($sql, array('email' => $email))->fetch();
      return $resultatRequete;

  }

  public function chercherUtilisateurs(){
    $sql = "SELECT email_u, prenom_u, nom_u FROM utilisateur";
    $resultatRequete = $this->executerRequete($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $resultatRequete;
  }


        public function enregistrerUtilisateur($valeurs){

            $sql = "INSERT INTO utilisateur (email_u, prenom_u, nom_u, mdp_u, clef_u) VALUES ('$valeurs[0]', '$valeurs[1]', '$valeurs[2]', '$valeurs[3]', '$valeurs[5]')";
            $resultatrequete = $this->executerRequete($sql);
            return $resultatrequete;

  }


  public function afficherCompte($email){

      $sql = "SELECT * FROM utilisateur WHERE email_u = :email";
      $resultatRequete = $this->executerRequete($sql, array('email' => $email))->fetch();
      return $resultatRequete;

  }

  public function chercherGardien($email){

    $sql = "SELECT email_u FROM gardien WHERE email_u = :email";
    $resultatRequete = $this->executerRequete($sql, array('email' => $email))->fetch();
    return $resultatRequete;

  }

  public function chercherEmployeMunicipal($email){

    $sql = "SELECT email_u FROM employe_municipal WHERE email_u = :email";
    $resultatRequete = $this->executerRequete($sql, array('email' => $email))->fetch();
    return $resultatRequete;

  }

}
