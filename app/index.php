<?php

require_once 'Controleurs/controleurUtilisateur.php';
require_once 'Controleurs/controleurAccueil.php';
require_once 'Controleurs/controleurAide.php';
require_once 'Controleurs/controleurAuthentification.php';
require_once 'Controleurs/controleurMaMaison.php';

require 'Routeur.php';
session_start();
$router = new Routeur($_GET['currentPageUrl']);
$router->get('/', function(){ $controleur = new ControleurAccueil();
    $controleur->affichageAccueil(); });
$router->get('/accueil', function(){ $controleur = new ControleurAccueil();
    $controleur->affichageAccueil(); });
$router->get('/apropos', function(){ $controleur = new ControleurAide();
    $controleur->affichageApropos(); });
$router->get('/aide', function(){ $controleur = new ControleurAide();
    $controleur->affichageAide(); });
$router->get('/connexion', function(){ $controleur = new ControleurAuthentification;
    $controleur->affichageConnexion(); });
$router->post('/connexion', function(){ $controleur = new ControleurAuthentification;
    $controleur->affichageConnexion(); });
$router->get('/enregistrement', function(){ $controleur = new ControleurAuthentification;
    $controleur->affichageEnregistrement(); });
$router->post('/enregistrement', function(){ $controleur = new ControleurAuthentification;
    $controleur->affichageEnregistrement(); });
$router->get('/profil', function(){ if(isset($_SESSION['id_u'])) {
    $controleur = new ControleurUtilisateur;
    $controleur->affichageMonCompte($_SESSION['id_u']);
}});
$router->get('/statistiques', function(){ $controleur = new ControleurMaMaison;
    $controleur->affichageStatistiques(); });
$router->get('/tableau-de-bord', function(){ $controleur = new ControleurMaMaison;
    $controleur->affichageTableauDeBord(); });
$router->get('/editer', function(){ $controleur = new ControleurMaMaison;
    $controleur->affichageEditerMaMaison(); });
$router->get('/deconnexion', function(){ $controleur = new ControleurAuthentification;
    $controleur->affichageDeconnexion(); });

$router->run();
