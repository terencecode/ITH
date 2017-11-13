<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {

  public function affichageProfil(){
    $utilisateur = new Utilisateurs();
    $informationsUtilisateur = $utilisateur->afficherUtilisateur(1)->fetch();
    $vue = new Vue('Utilisateur');
    $vue->generer(array('infos' => $informationsUtilisateur));

  }

}

?>
