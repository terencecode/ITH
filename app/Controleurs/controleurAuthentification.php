<?php

require_once 'Vues/vue.php';

class ControleurAuthentification{

  public function affichageConnexion(){
    if(isset($_POST['valider'])){

      if (empty($_POST['mail'])) {
        $messageMail = "Veuillez saisir le Mail";
      }

      if (empty($_POST['passe'])) {
        $messagePasse = "Veuillez saisir le Mot de Passe";
      }

      $mail = $_POST['mail'];
      $passe = $_POST['passe'];

    }
    $vue = new Vue('Connexion');
    $vue->generer(array('messageMail' => $messageMail, 'messagePasse' => $messagePasse));
  }

  public function affichageEnregistrement(){
    $vue = new Vue('Enregistrement');
    $vue->generer();
  }

}
