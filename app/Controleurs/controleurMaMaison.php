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
          $valeurs[] = $_POST['type_pieceC'];


          $capteur = new Capteurs();
          $valeurs[] = $capteur->chercher_id_piece($valeurs[3])[0];
          $capteur->enregistrerCapteur($valeurs);

          header("Location: http://localhost:8080/ITH/accueil");

      }
      if ((isset($_POST['valider-Piece']))) {

          $valeurs = [];
          $valeurs[] = $_POST['type_piece'];
          $valeurs[] = $_POST['long_piece'];
          $valeurs[] = $_POST['largeur_piece'];
          $valeurs[] = $_POST['hauteur_piece'];

          $utilisateur= new Utilisateurs();
          $valeurs[] = $utilisateur->chercherIdGerant($_SESSION['id_u'])[0];

          $piece = new Piece();
          $piece->enregistrerPiece($valeurs);

          header("Location: http://localhost:8080/ITH/accueil");

      }

      $utilisateur= new Utilisateurs();
      $id_gerant= $utilisateur->chercherIdGerant($_SESSION['id_u']);

      $piece= new Piece();
      $pieces[]=$piece->afficherPiece($id_gerant);



      if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
          $vue = new Vue('EditerMaMaison');
          $vue->generer($pieces);
      } else {
          $vue = new Vue('404');
          $vue->generer();
      }

  }
}
