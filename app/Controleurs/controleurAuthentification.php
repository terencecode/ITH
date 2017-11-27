<?php

require_once 'Vues/vue.php';
require_once 'Controleurs/controleurAccueil.php';

class ControleurAuthentification{

  private $erreur;
  private $messagePassesDifferents;

  public function affichageConnexion(){

    //Gestion des messagges d'erreur si l'utilisateur ne remplis pas les champs
    if(isset($_POST['valider'])){

      if (empty($_POST['mail'])) {
        $this->erreur[] = "Veuillez saisir le Mail";
      }
      if (empty($_POST['passe'])) {
        $this->erreur[] = "Veuillez saisir le Mot de Passe";
      }

      //une fois qu'on a vérifié les identifiants
      $_SESSION['mail'] = $_POST['mail'];
      $_SESSION['passe'] = $_POST['passe'];
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

      if (empty($_POST['mail'])) {
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

      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $mail = $_POST['mail'];
      $passe = $_POST['passe'];
      $passe2 = $_POST['passe2'];
      $code = $_POST['code'];

      if ($passe != $passe2) {
        $this->messagePassesDifferents = "Les deux mots de passe sont différents";
      }

    }
    $vue = new Vue('Enregistrement');
    $vue->generer(array('erreur' => $this->erreur, 'messagePassesDifferents' => $this->messagePassesDifferents));
  }

  public function affichageDeconnexion()
  {
    session_destroy();
    header("Location: http://localhost:8888/APP/ITH/app/index.php?page=accueil"); //devra etre remplacé en prod
  }

}
