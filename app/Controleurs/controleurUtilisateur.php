<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {

  public function affichageMonCompte($id){

    $utilisateur = new Utilisateurs();
    $informationsUtilisateur = $utilisateur->afficherUtilisateur($id)->fetch();

    if ($id == $_SESSION['id']) {
      $vue = new Vue('Utilisateur');
      $vue->generer(array('infos' => $informationsUtilisateur, 'id' => $id ));
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }

  }

}
