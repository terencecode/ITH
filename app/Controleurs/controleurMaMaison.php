<?php

require_once 'Vues/vue.php';

class ControleurMaMaison{

  public function affichageStatistiques(){
    if (isset($_SESSION['id'])) {
      $vue = new Vue('Statistiques');
      $vue->generer();
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }
  }

  public function affichageTableauDeBord(){
    if (isset($_SESSION['id'])) {
      $vue = new Vue('TableauDeBord');
      $vue->generer();
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }
  }

  public function affichageEditerMaMaison(){
    if (isset($_SESSION['id'])) {
      $vue = new Vue('EditerMaMaison');
      $vue->generer();
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }
  }
  
}
