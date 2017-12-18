<?php

require_once 'Vues/vue.php';

class ControleurMaMaison{

    public function affichageCapteurs(){

        //Gestion des messagges d'erreur si l'utilisateur ne remplis pas les champs
        //Sera remplacé par du js
        if (isset($_POST['valider'])) {

            if (empty($_POST['capteur'])) {
                $this->erreur[] = "Veuillez saisir le nom du capteur";
            }

            if (empty($_POST['id_piece'])) {
                $this->erreur[] = "Veuillez saisir la piece";
            }

            if (empty($_POST['on_off'])) {
                $this->erreur[] = "Veuillez saisir l'etat du capteur";
            }


            //On stock les valeurs de l'utilisateur pour les passer au modèle ensuite
            $valeurs = [];
            $valeurs[] = $_POST['capteur'];
            $valeurs[] = $_POST['id_piece'];
            $valeurs[] = $_POST['on_off'];

            //On essaye de rentrer l'utilisateur dans la bdd
            //On créé les variables de session
            //Si l'utilisateur existe déjà: retourne une erreur
            try {

                $capteur = new Capteurs();
                $capteur->enregistrerCapteurs($valeurs);

            } catch (Exception $e) {

                $this->erreur[] = "Vous avez déjà enregistré ce capteur, veuillez en saisir un nouveau";

                $vue = new Vue('TableauDeBord');
                $vue->generer(array('erreur' => $this->erreur));

            }


        }

        //On genère la vue Enregistrement
        $vue = new Vue('Enregistrement');
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

    if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
      $vue = new Vue('TableauDeBord');
      $vue->generer();
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }
  }

  public function affichageEditerMaMaison(){
    if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
      $vue = new Vue('EditerMaMaison');
      $vue->generer();
    } else {
      $vue = new Vue('404');
      $vue->generer();
    }
  }

}
