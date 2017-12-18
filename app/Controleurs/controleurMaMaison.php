<?php

require_once 'Vues/vue.php';

class ControleurMaMaison{

  public function affichageStatistiques(){
    if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
      $vue = new Vue('Statistiques');
      $vue->generer();
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }
  }

  public function affichageTableauDeBord(){
    if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
      $vue = new Vue('TableauDeBord');
      $vue->generer();
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }
  }

  //Mettre toutes les fonctions relatives à la page éditer ma maison
  public function affichageEditerMaMaison(){
    if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
      $vue = new Vue('EditerMaMaison');
      $vue->generer();
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }
  }

}
