<?php

require_once 'Vues/vue.php';

class ControleurAide{

  public function affichageApropos(){
    $vue = new Vue('Apropos');
    $vue->generer();
  }

  public function affichageAide(){
    $vue = new Vue('Aide');
    $vue->generer();

  }
        

}


