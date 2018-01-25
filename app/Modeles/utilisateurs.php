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
    $sql = "UPDATE gerant SET admin = '1' WHERE id_u = :id";
    $resultatRequete = $this->executerRequete($sql, array('id' => $id ));
    return $resultatRequete;
  }

  public function chercherUtilisateurs(){
    $sql = "SELECT email_u, prenom_u, nom_u, id_u FROM utilisateur";
    $resultatRequete = $this->executerRequete($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $resultatRequete;
  }

    public function enregistrerUtilisateur($valeurs){

      $mdp = password_hash($valeurs[3], PASSWORD_BCRYPT);

      $sql = "INSERT INTO utilisateur (email_u, prenom_u, nom_u, mdp_u) VALUES ('$valeurs[0]', '$valeurs[1]', '$valeurs[2]', '$mdp')";
      $resultatrequete = $this->executerRequete($sql);
      return $resultatrequete;

    }

    public function modifierUtilisateur($valeurs, $id){
        $champsUpdate = $valeurs[0] != "" ? "nom_u = '" . $valeurs[0] . "'" : "";
        $champsUpdate = $champsUpdate . ($valeurs[1] != "" ? ", prenom_u = '" . $valeurs[1] . "'" : "");
        $champsUpdate = $champsUpdate . ($valeurs[2] != "" ? ", email_u = '" . $valeurs[2] . "'" : "");
        $champsUpdate = $champsUpdate . ($valeurs[3] != "" ? ", telephone_u = '" . $valeurs[3] . "'" : "");
        $champsUpdate = $champsUpdate . ($valeurs[4] != "" ? ", mdp_u = '" . password_hash($valeurs[4], PASSWORD_BCRYPT) . "'" : "");

        $champsUpdate = substr($champsUpdate, 0, 1) == "," ? substr($champsUpdate, 1) : $champsUpdate;

        $sql = "UPDATE utilisateur SET " . $champsUpdate . " WHERE id_u = $id";
        $resultatrequete = $this->executerRequete($sql);
        return $resultatrequete;

    }

  public function chercherNomPrenom($id){
    $sql = "SELECT prenom_u, nom_u FROM utilisateur WHERE id_u = :id";
    $resultatRequete = $this->executerRequete($sql, array('id' => $id ))->fetch(PDO::FETCH_ASSOC);
    return $resultatRequete;
  }

  public function enregistrerGerant($id_u){
    $sql = "INSERT INTO gerant (admin, id_u) VALUES (0, '$id_u')";
    $resultatRequete = $this->executerRequete($sql);
    return $resultatRequete;
  }


  public function recupererUtilisateur($id){

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
