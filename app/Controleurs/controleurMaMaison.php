<?php

require_once 'Vues/vue.php';

class ControleurMaMaison{

  public function affichageStatistiques(){
    $vue = new Vue('Statistiques');
    $vue->generer();
  }

  public function affichageTableauDeBord(){
    $vue = new Vue('TableauDeBord');
    $vue->generer();
  }

  public function affichageEditerMaMaison(){
    $vue = new Vue('EditerMaMaison');
    $vue->generer();
  }

}
