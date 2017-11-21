<?php

require_once 'Vues/vue.php';

class ControleurAuthentification{

  public function affichageConnexion(){
    if(isset($_POST['valider'])){

      if (empty($_POST['mail'])) {
        $erreur[] = "Veuillez saisir le Mail";
      }

      if (empty($_POST['passe'])) {
        $erreur[] = "Veuillez saisir le Mot de Passe";
      }

      $mail = $_POST['mail'];
      $passe = $_POST['passe'];

    }
    $vue = new Vue('Connexion');
    $vue->generer(array('erreur' => $erreur));
  }

  public function affichageEnregistrement(){
    if (isset($_POST['valider'])) {

      if (empty($_POST['nom'])) {
        $erreur[] = "Veuillez saisir le Nom";
      }

      if (empty($_POST['prenom'])) {
        $erreur[] = "Veuillez saisir le Prenom";
      }

      if (empty($_POST['mail'])) {
        $erreur[] = "Veuillez saisir le Mail";
      }

      if (empty($_POST['passe'])) {
        $erreur[] = "Veuillez saisir le Mot de Passe";
      }

      if (empty($_POST['passe2'])) {
        $erreur[] = "Veuillez confirmer le Mot de Passe";
      }

      if (empty($_POST['code'])) {
        $erreur[] = "Veuillez saisir le Code d'Inscription";
      }

      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $mail = $_POST['mail'];
      $passe = $_POST['passe'];
      $passe2 = $_POST['passe2'];
      $code = $_POST['code'];

      if ($passe != $passe2) {
        $messagePassesDifferents = "Les deux mots de passe sont différents";
      }

    }
    $vue = new Vue('Enregistrement');
    $vue->generer(array('erreur' => $erreur, 'messagePassesDifferents' => $messagePassesDifferents));
  }

}
