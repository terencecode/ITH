<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {

  public function affichageMonCompte($email){

    $utilisateur = new Utilisateurs();
    $informationsUtilisateur = $utilisateur->afficherUtilisateur($email)->fetch();

    if (!empty($_SESSION['id']) && $email == $_SESSION['email']) {
      $vue = new Vue('Utilisateur');
      $vue->generer(array('infos' => $informationsUtilisateur, 'id' => $email ));
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }

  }

}
