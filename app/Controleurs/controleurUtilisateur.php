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


  public function affichageUtilisateur($id){

    if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {

      $vue = new Vue('Utilisateur');
      $vue->generer(array('id' => $id));

      if (isset($_POST['addHabitation'])) {

        

      }

    } else {

      $vue = new Vue('404');
      $vue->generer(array('id' => $id));

    }

  }


}
