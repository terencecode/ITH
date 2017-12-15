<?php

require_once 'Vues/vue.php';
require_once 'Controleurs/controleurAccueil.php';
require_once 'Modeles/utilisateurs.php';

class ControleurAuthentification{

  private $erreur;
  private $messagePassesDifferents;


    public function affichageConnexion(){

    //Gestion des messagges d'erreur si l'utilisateur ne remplis pas les champs
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
      $data = $utilisateur->afficherUtilisateur($email);

      if ($data != false) {
          if ($data[1] == $passe) {
              $_SESSION['email'] = $email;
              $_SESSION['passe'] = $passe;
          }
      }

      if (isset($_SESSION['email']) && isset($_SESSION['passe'])) {
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


      if ($_POST['passe'] != $_POST['passe2']) {
        $this->messagePassesDifferents = "Les deux mots de passe sont différents";
      }

      $valeurs = [];
      $valeurs[] = $_POST['email'];
      $valeurs[] = $_POST['prenom'];
      $valeurs[] = $_POST['nom'];
      $valeurs[] = $_POST['passe'];
      $valeurs[] = $_POST['passe2'];
      $valeurs[] = $_POST['code'];


      try {

        $utilisateur = new Utilisateurs();
        $utilisateur->recupererUtilisateur($valeurs);

      } catch (Exception $e) {

        $this->erreur[] = "Vous êtes déjà enregistré, veuillez vous connecter";

        $vue = new Vue('Enregistrement');
        $vue->generer(array('erreur' => $this->erreur));

      }


    }

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
