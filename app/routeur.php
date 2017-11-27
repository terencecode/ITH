<?php

require_once 'Controleurs/controleurUtilisateur.php';
require_once 'Controleurs/controleurAccueil.php';
require_once 'Controleurs/controleurAide.php';
require_once 'Controleurs/controleurAuthentification.php';
require_once 'Controleurs/controleurMaMaison.php';

class routeur{

  private $controleurAccueil;
  private $controleurUtilisateur;
  private $controleurAide;
  private $controleurAuthentification;
  private $controleurMaMaison;

  public function __construct(){

    $this->controleurAccueil = new ControleurAccueil();
    $this->controleurUtilisateur = new ControleurUtilisateur();
    $this->controleurAide = new ControleurAide();
    $this->controleurAuthentification = new ControleurAuthentification();
    $this->controleurMaMaison = new ControleurMaMaison();

  }

  public function routerRequete(){
    switch($_GET['page']){

      case '':
        $this->controleurAccueil->affichageAccueil();
        break;

      case 'accueil':
        $this->controleurAccueil->affichageAccueil();
        break;

      case 'apropos':
        $this->controleurAide->affichageApropos();
        break;

      case 'aide':
        $this->controleurAide->affichageAide();
        break;

      case 'connexion':
        $this->controleurAuthentification->affichageConnexion();
        break;

      case 'enregistrement':
        $this->controleurAuthentification->affichageEnregistrement();
        break;

      case 'profil';
          if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->controleurUtilisateur->affichageMonCompte($id);
          } else {
            $this->controleurAccueil->affichage404();
          }
        break;

      case 'statistiques':
        $this->controleurMaMaison->affichageStatistiques();
        break;

      case 'tableaudebord':
        $this->controleurMaMaison->affichageTableauDeBord();
        break;

      case 'editer':
        $this->controleurMaMaison->affichageEditerMaMaison();
        break;

      case 'deconnexion':
        $this->controleurAuthentification->affichageDeconnexion();
        break;

      default :
        $this->controleurAccueil->affichage404();

    }

  }

}
