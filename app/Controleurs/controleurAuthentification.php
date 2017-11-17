<?php

require_once 'Vues/vue.php';

class ControleurAuthentification{

  public function affichageConnexion(){
    $vue = new Vue('Connexion');
    $vue->generer();
  }

  public function affichageEnregistrement(){
    $vue = new Vue('Enregistrement');
    $vue->generer();
  }

}
