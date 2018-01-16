<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {

  public function affichageMonCompte($id){

      $utilisateur = new Utilisateurs();
      $donnees = $utilisateur->afficherCompte($id);

      $vue = new Vue('Profil');
      $vue->generer($donnees);

  }

  public function affichageUtilisateur($id)
  {
    $utilisateur = new Utilisateurs();
    $donnees = $utilisateur->afficherCompte($id);

    $vue = new Vue('Utilisateur');
    $vue->generer($donnees);
  }

}
