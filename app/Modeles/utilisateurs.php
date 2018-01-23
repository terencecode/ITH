<?php

require_once "Modeles/modele.php";

class Utilisateurs extends Modele {

  public function chercherId($email){
    $sql = "SELECT id_u FROM utilisateur WHERE email_u = :email";
    $resultatRequete = $this->executerRequete($sql, array('email' => $email))->fetch();
    return $resultatRequete;
  }

    public function chercherUtilisateur($id_u){

      $sql = "SELECT email_u, mdp_u FROM utilisateur WHERE id_u = :id_u";
      $resultatRequete = $this->executerRequete($sql, array('id_u' => $id_u))->fetch();
      return $resultatRequete;

  }

  public function chercherAdmin($id_u){

    $sql = "SELECT admin FROM gerant WHERE id_u = :id_u";
    $resultatRequete = $this->executerRequete($sql, array('id_u' => $id_u))->fetch();
    return $resultatRequete;

  }

  public function ajouterAdmin($id){
    $sql = "INSERT INTO gerant (admin, id_u) VALUES (1, $id)";
    $resultatRequete = $this->executerRequete($sql);
    return $resultatRequete;
  }

  public function chercherUtilisateurs(){
    $sql = "SELECT email_u, prenom_u, nom_u, id_u FROM utilisateur";
    $resultatRequete = $this->executerRequete($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $resultatRequete;
  }

    public function enregistrerUtilisateur($valeurs){

      $sql = "INSERT INTO utilisateur (email_u, prenom_u, nom_u, mdp_u) VALUES ('$valeurs[0]', '$valeurs[1]', '$valeurs[2]', '$valeurs[3]')";
      $resultatrequete = $this->executerRequete($sql);
      return $resultatrequete;

  }

  public function chercherNomPrenom($id){
    $sql = "SELECT prenom_u, nom_u FROM utilisateur WHERE id_u = :id";
    $resultatRequete = $this->executerRequete($sql, array('id' => $id ))->fetch(PDO::FETCH_ASSOC);
    return $resultatRequete;
  }

  public function enregistrerGerant($gerant){
    $sql = "INSERT INTO gerant (id_u, admin, id_habitation) VALUES ('$gerant[0]', 0, '$gerant[1]')";
    $resultatRequete = $this->executerRequete($sql);
    return $resultatRequete;
  }


  public function afficherCompte($id){

      $sql = "SELECT * FROM utilisateur WHERE id_u = :id";
      $resultatRequete = $this->executerRequete($sql, array('id' => $id))->fetch();
      return $resultatRequete;

  }

  public function chercherIdGerant($id_u){
    $sql = "SELECT id_gerant FROM gerant WHERE id_u = :id_u";
    $resultatRequete = $this->executerRequete($sql, array('id_u' => $id_u))->fetch();
    return $resultatRequete;
  }


}
