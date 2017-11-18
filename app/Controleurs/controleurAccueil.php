<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurAccueil{

  public function affichageAccueil(){
    $vue = new Vue('Accueil');
    $vue->generer();
  }

  public function affichage404(){
      $vue = new Vue('404');
      $vue->generer();
  }
  
}
