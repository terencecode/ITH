<?php

require_once 'Vues/vue.php';
require_once 'Controleurs/controleurAccueil.php';
require_once 'Modeles/utilisateurs.php';

class ControleurAuthentification{

  private $erreur;
  private $messagePassesDifferents;


    public function affichageConnexion(){

    //Gestion des messagges d'erreur si l'utilisateur ne remplis pas les champs
    //Sera remplacé par du js
    if(isset($_POST['valider'])){

      if (empty($_POST['email'])) {
        $this->erreur[] = "Veuillez saisir le Mail";
      }
      if (empty($_POST['passe'])) {
        $this->erreur[] = "Veuillez saisir le Mot de Passe";
      }

      $email = $_POST['email'];
      $passe = $_POST['passe'];
      $utilisateur = new Utilisateurs();
      $id_u = $utilisateur->chercherId($email)[0];

      $estUtilisateur = $utilisateur->chercherUtilisateur($id_u);
      $estGardien = $utilisateur->chercherGardien($id_u);
      //$estEmployeMunicipal = $utilisateur->chercherEmployeMunicipal($id_u);
      $estAdmin = $utilisateur->chercherAdmin($id_u);


      if ($estUtilisateur) {
          if ($estUtilisateur[1] == $passe) {
              $_SESSION['email'] = $email;
              $_SESSION['passe'] = $passe;
              $_SESSION['id_u'] = $id_u;
              $_SESSION['id'] = 0;
          }
          if ($estGardien) {
            $_SESSION['id'] = 1;
          }
          if ($estAdmin) {
            $_SESSION['id'] = 2;
          }
      }

      if (isset($_SESSION['email']) && isset($_SESSION['passe']) && isset($_SESSION['id'])) {
          header("Location: http://localhost:8080/ITH/accueil");
        } else {
          $this->erreur[] = "Mail où Mot de passe incorrect";
      }

    }

    $vue = new Vue('Connexion');
    $vue->generer(array('erreur' => $this->erreur));

  }

  public function affichageEnregistrement(){

    //Gestion des messagges d'erreur si l'utilisateur ne remplis pas les champs
    //Sera remplacé par du js
    if (isset($_POST['valider'])) {

      if (empty($_POST['nom'])) {
        $this->erreur[] = "Veuillez saisir le Nom";
      }

      if (empty($_POST['prenom'])) {
        $this->erreur[] = "Veuillez saisir le Prenom";
      }

      if (empty($_POST['email'])) {
        $this->erreur[] = "Veuillez saisir le Mail";
      }

      if (empty($_POST['passe'])) {
        $this->erreur[] = "Veuillez saisir le Mot de Passe";
      }

      if (empty($_POST['passe2'])) {
        $this->erreur[] = "Veuillez confirmer le Mot de Passe";
      }

      if (empty($_POST['code'])) {
        $this->erreur[] = "Veuillez saisir le Code d'Inscription";
      }

      //verification mots de passes identiques
      if ($_POST['passe'] != $_POST['passe2']) {
        $this->messagePassesDifferents = "Les deux mots de passe sont différents";
      }


      //On stock les valeurs de l'utilisateur pour les passer au modèle ensuite
      $valeurs = [];
      $valeurs[] = $_POST['email'];
      $valeurs[] = $_POST['prenom'];
      $valeurs[] = $_POST['nom'];
      $valeurs[] = $_POST['passe'];
      $valeurs[] = $_POST['passe2'];
      $valeurs[] = $_POST['code'];

      //On essaye de rentrer l'utilisateur dans la bdd
      //On créé les variables de session
      //Si l'utilisateur existe déjà => retourne une erreur
      try {

        $utilisateur = new Utilisateurs();
        $utilisateur->enregistrerUtilisateur($valeurs);

        $_SESSION['email'] = $_POST['email'];
        $_SESSION['passe'] = $_POST['prenom'];
        header("Location: http://localhost:8080/ITH/accueil");

      } catch (Exception $e) {

        $this->erreur[] = "Vous êtes déjà enregistré, veuillez vous connecter";

        $vue = new Vue('Enregistrement');
        $vue->generer(array('erreur' => $this->erreur));

      }


    }

    //On genère la vue Enregistrement
    $vue = new Vue('Enregistrement');
    $vue->generer(array('erreur' => $this->erreur, 'messagePassesDifferents' => $this->messagePassesDifferents));

  }

  public function affichageDeconnexion()
  {
    //Vide les variables de session lors de la deconnexion
    session_destroy();
    header("Location: http://localhost:8080/ITH/accueil");

  }

}
