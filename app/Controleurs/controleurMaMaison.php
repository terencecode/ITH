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


      $capteur=new Capteurs();
      $tableauCapPiece=$capteur->joinCapteurPiece($id_gerant);



    if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
        $vue = new Vue('TableauDeBord');
        $vue->generer(array('tableauCapPiece' => $tableauCapPiece));


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
          $valeurs[5] = $capteur->chercher_id_piece($valeurs[3])[0];
          $valeurs[5]=$valeurs[5]['id_piece'];
          //die(var_dump($valeurs[5]));
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
          $valeurs[]=$_POST['Emplacement'];
          $piece = new Piece();
          $piece->enregistrerPiece($valeurs);

      }

      if((isset($_POST['Supprimer_capteur'])))
      {
          if (empty($_POST['Suppcapteur'])) {
              $this->erreur[] = "Veuillez saisir le nom du capteur à supprimer";
          }
          $SupprC = [];
          $SupprC[0]=$_POST['Suppcapteur'];
          $SupprC[1]=$_POST['Supp-piece'];

          $capteur=new Capteurs();
          $id_piece=$capteur->chercher_id_piece($SupprC[1]);
          $capteur->supprimer_capteur($id_piece[0]['id_piece'],$SupprC[0]);

      }
      if((isset($_POST['Supprimer_piece'])))
      {
          if (empty($_POST['Supprimer_piece'])) {
              $this->erreur[] = "Veuillez saisir le nom de la pièce dans laquelle vous souhaitez supprimer des capteurs";
          }
          $SupprP = [];
          $SupprP[0]=$_POST['Supprimer_piece'];

          $capteur=new Capteurs();
          $id_piece=$capteur->chercher_id_piece($SupprP[0]);
          $capteur->supprimer_capteur_piece($id_piece[0]['id_piece']);

          $piece=new Piece();
          $piece->supprimer_piece($SupprP[0]);
      }


      $utilisateur= new Utilisateurs();
      $id_gerant= $utilisateur->chercherIdGerant($_SESSION['id_u'])[0];

      $capteur = new Capteurs();
      $id_piece=$capteur->chercher_id_pieceG($id_gerant);

      $capteurs=[];
      $capteur = new Capteurs();
      foreach ($id_piece as $key=> $value):
        $capteurs[]=$capteur->afficherEtat($value['id_piece']);
      endforeach;


      $piece = new Piece();
      $pieces = $piece->afficherPiece($id_gerant);

      $piece = new Piece();
      $id_habitation=$piece->chercherIDHabitations($id_gerant)[0];

      $piece = new Piece();
      $habitations=$piece->afficherHabitations($id_habitation)[0];



      if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
          $vue = new Vue('EditerMaMaison');
          //die(var_dump($capteurs));
          $vue->generer(array('pieces'=>$pieces, 'capteurs'=>$capteurs,'habitations'=>$habitations));
      } else {
          $vue = new Vue('404');
          $vue->generer();
      }
  }

}
