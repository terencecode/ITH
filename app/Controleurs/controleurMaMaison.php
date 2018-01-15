<?php

require_once 'Vues/vue.php';
require_once 'Modeles/capteurs.php';
require_once 'Modeles/piece.php';

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

      $capteur = new Capteurs();
      $etat = $capteur->afficherEtat();


    if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
        $vue = new Vue('TableauDeBord');
        $vue->generer(array('etat' => $etat));

    } else {
      $vue = new Vue('404');
      $vue->generer();
    }
  }

  //Mettre toutes les fonctions relatives à la page éditer ma maison

  public function affichageEditerMaMaison(){


      if (isset($_POST['valider-Capteur'])) {

          if (empty($_POST['capteur'])) {
              $this->erreur[] = "Veuillez saisir le nom du capteur";
          }

          if (empty($_POST['on_off'])) {
              $this->erreur[] = "Veuillez saisir l'etat du capteur";
          }


          //On stock les valeurs de l'utilisateur pour les passer au modèle ensuite
          $valeurs = [];
          $valeurs[] = $_POST['type_ca'];
          $valeurs[] = $_POST['on_off'];
          $valeurs[] = $_POST['fonction'];
          $valeurs[] = $_POST['type_piece'];

          $capteur = new Capteurs();
          $capteur->enregistrerCapteur($valeurs);

          header("Location: http://localhost:8080/ITH/accueil");

      }
      if ((isset($_POST['valider-Piece']))) {

          $valeurs = [];
          $valeurs[] = $_POST['type_piece'];
          $valeurs[] = $_POST['long_piece'];
          $valeurs[] = $_POST['largeur_piece'];
          $valeurs[] = $_POST['hauteur_piece'];

          $piece = new Piece();
          $piece->enregistrerPiece($valeurs);

          header("Location: http://localhost:8080/ITH/accueil");

      }
      if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
          $vue = new Vue('EditerMaMaison');
          $vue->generer();
      } else {
          $vue = new Vue('404');
          $vue->generer();
      }

  }
}
