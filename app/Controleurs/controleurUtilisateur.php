<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {

  public function affichageMonCompte($email){

      $utilisateur = new Utilisateurs();
      $donnees = $utilisateur->afficherUtilisateur($email);

      //die(var_dump($donnees));

      $vue = new Vue('Utilisateur');
      $vue->generer(array('donnees' => $donnees));

  }

}
