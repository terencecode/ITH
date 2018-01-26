<?php

require_once 'Vues/vue.php';
require_once 'Modeles/Aide.php';

class Controleuraide{

    public function affichageAide()
    {
        if (isset($_POST['input_enregistrer'])) {

            if (empty($_POST['Question'])) {
                $this->erreur[] = "Veuillez saisir votre question";
            }
            $valeurs = [];
            $valeurs[0] = $_POST['Question'];
            $Aide = new Aide();
            $Aide -> enregistrerQuestion($valeurs);

        }
        $this -> afficheAide();

    }

  public function affichageApropos(){
    $vue = new Vue('Apropos');
    $vue->generer();
  }

  public function afficheAide(){
    $vue = new Vue('Aide');
    $vue->generer();
    $question = [];
    $question[] = $_GET['question'];
    $question = new question ();
    $question -> voirQuestion($question)[0];

  }


}


