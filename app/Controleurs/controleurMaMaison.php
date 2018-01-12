<?php

require_once 'Vues/vue.php';
require_once 'Modeles/capteurs.php';

class ControleurMaMaison{

    public function affichagePiece(){

        //Gestion des messagges d'erreur si l'utilisateur ne remplis pas les champs
        //Sera remplacé par du js
        if (isset($_POST['valider']))
        {



            if (empty($_POST['type_piece']))
            {
                $this->erreur[] = "Veuillez saisir le nom de la piece";
            }

            if (empty($_POST['long_piece']))
            {
                $this->erreur[] = "Veuillez saisir la longueur de la piece";
            }

            if (empty($_POST['largeur_piece']))
            {
                $this->erreur[] = "Veuillez saisir la largeur de la piece";
            }

            if (empty($_POST['largeur_piece']))
            {
                $this->erreur[] = "Veuillez saisir la hauteur de la piece";
            }

            //On stock les valeurs de l'utilisateur pour les passer au modèle ensuite
            $valeurs = [];
            $valeurs[] = $_POST['type_piece'];
            $valeurs[] = $_POST['long_piece'];
            $valeurs[] = $_POST['largeur_piece'];
            $valeurs[] = $_POST['hauteur_piece'];

            //On essaye de rentrer l'utilisateur dans la bdd
            //On créé les variables de session
            //Si l'utilisateur existe déjà: retourne une erreur
            try
            {

                $capteur = new Piece();
                $capteur->enregistrerPiece($valeurs);

            } catch (Exception $e) {

                $this->erreur[] = "Vous avez déjà enregistré cette piece, veuillez en saisir une nouvelle";

                $vue = new Vue('TableauDeBord');
                $vue->generer(array('erreur' => $this->erreur));
            }
        }
        //On genère la vue Enregistrement
        $vue = new Vue('TableauDeBord');
        $vue->generer(array('erreur' => $this->erreur, 'messagePassesDifferents' => $this->messagePassesDifferents));
    }




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
      //Gestion des messagges d'erreur si l'utilisateur ne remplis pas les champs
      //Sera remplacé par du js
      if (isset($_POST['valider'])) {

          if (empty($_POST['capteur'])) {
              $this->erreur[] = "Veuillez saisir le nom du capteur";
          }

          if (empty($_POST['on_off'])) {
              $this->erreur[] = "Veuillez saisir l'etat du capteur";
          }


          //On stock les valeurs de l'utilisateur pour les passer au modèle ensuite
          $valeurs = [];
          $valeurs[0] = $_POST['capteur'];
          $valeurs[1] = $_POST['on_off'];

          $capteur = new Capteurs();
          $capteur->enregistrerCapteur($valeurs);

          header("Location: http://localhost:8080/ITH/tableau-de-bord");


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
