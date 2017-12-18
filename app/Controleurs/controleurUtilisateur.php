<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {

  public function affichageMonCompte($email){

      $utilisateur = new Utilisateurs();

      $donnees = $utilisateur->afficherCompte($email);

      $vue = new Vue('Utilisateur');
      $vue->generer($donnees);

  }

}
