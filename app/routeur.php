<?php

require_once 'Controleurs/controleurUtilisateur.php';
require_once 'Controleurs/controleurAccueil.php';

class routeur{

  private $controleurAccueil;
  private $controleurUtilisateur;

  public function __construct(){
    $this->controleurAccueil = new ControleurAccueil();
    $this->controleurUtilisateur = new ControleurUtilisateur();

  }

  public function routerRequete(){
    $routeur = new routeur();
    error_reporting(0);
    switch($_GET['page']){

      case '':
        $this->controleurAccueil->affichageAccueil();
        break;

      case 'accueil':
        $this->controleurAccueil->affichageAccueil();
        break;

      case 'profil';
        $id = $_GET['id'];
        $this->controleurUtilisateur->affichageProfil($id);
        break;
    }

  }

}
