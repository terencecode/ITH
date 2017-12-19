<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurAccueil{

  public function affichageAccueil(){

    if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {

      $utilisateurs = new Utilisateurs;
      $donnees = $utilisateurs->chercherUtilisateurs();

      $vue = new Vue('Accueil');
      $vue->generer($donnees);

    } elseif (isset($_SESSION['id']) && $_SESSION['id'] == 2) {

      $utilisateurs = new Utilisateurs;
      $donnees = $utilisateurs->chercherUtilisateurs();

      $vue = new Vue('Accueil');
      $vue->generer($donnees);

    } else {

      $arrayName = array(1,2,3,4,5);
      $json = json_encode($arrayName);

      $vue = new Vue('Accueil');
      $vue->generer(array('json' => $json));

    }

  }

  public function affichage404(){
      $vue = new Vue('404');
      $vue->generer();
  }

}
