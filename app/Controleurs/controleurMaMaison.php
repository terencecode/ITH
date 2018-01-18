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

      $utilisateur= new Utilisateurs();
      $id_gerant= $utilisateur->chercherIdGerant($_SESSION['id_u'])[0];

      $capteur = new Capteurs();
      $id_piece=$capteur->chercher_id_piece($id_gerant)[0];
      $capteurs = $capteur->afficherEtat($id_piece);

      $piece = new Piece();
      $pieces=$piece->afficherPiece($id_gerant);

    if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
        $vue = new Vue('TableauDeBord');
        $vue->generer(array('capteurs' => $capteurs, 'pieces'=>$pieces));

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
          $valeurs[0] = $_POST['type_ca'];
          if (isset($_POST['on_off'])){
              $valeurs[1] = 1;
          }
          else {
              $valeurs[1]=0;
          }
          $valeurs[3] = $_POST['type_pieceC'];

          $utilisateur= new Utilisateurs();
          $valeurs[4] = $utilisateur->chercherIdGerant($_SESSION['id_u'])[0];

          $capteur = new Capteurs();
          $valeurs[5] = $capteur->chercher_id_piece($valeurs[4])[0];
          $capteur->enregistrerCapteur($valeurs);

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

      }

      $utilisateur= new Utilisateurs();
      $id_gerant= $utilisateur->chercherIdGerant($_SESSION['id_u'])[0];

      $piece = new Piece();
      $pieces = $piece->afficherPiece($id_gerant);



      if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
          $vue = new Vue('EditerMaMaison');
          $vue->generer(array('pieces'=>$pieces));
      } else {
          $vue = new Vue('404');
          $vue->generer();
      }

  }
}
