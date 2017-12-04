<?php

require_once 'Controleurs/controleurUtilisateur.php';
require_once 'Controleurs/controleurAccueil.php';
require_once 'Controleurs/controleurAide.php';
require_once 'Controleurs/controleurAuthentification.php';
require_once 'Controleurs/controleurMaMaison.php';
require_once 'Route.php';

class Routeur{

    private $currentPageUrl;
    private $routes = [];

    public function __construct($currentPageUrl){
        $this->currentPageUrl = $currentPageUrl;
    }

    public function get($path, $callback){
        $route = new Route($path, $callback);
        $this->routes["GET"][] = $route;
        return $route; // On retourne la route pour "enchainer" les méthodes
    }

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new Exception('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->currentPageUrl)){
                return $route->call();
            }
        }
        throw new Exception('No matching routes');
    }

  /*public function routerRequete(){
    if(isset($_GET['page'])) {

      switch($_GET['page']) {

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
            //vérifie si l'id est entré dans l'url
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

    } else {
      $this->controleurAccueil->affichage404();
    }

  }*/

}
