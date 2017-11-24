<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {

  public function affichageMonCompte(){

    $utilisateur = new Utilisateurs();
    $informationsUtilisateur = $utilisateur->afficherUtilisateur($_SESSION['id'])->fetch();
    $vue = new Vue('Utilisateur');
    $vue->generer(array('infos' => $informationsUtilisateur, 'id' => $_SESSION['id']));

  }

}
