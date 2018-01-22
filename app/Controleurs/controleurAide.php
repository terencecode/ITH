<?php

require_once 'Vues/vue.php';

class Controleuraide{

    public function affichageAide()
    {
        if (isset($_POST['input_enregistrer'])) {

            if (empty($_POST['enregistrerQuestion'])) {
                $this->erreur[] = "Veuillez saisir votre question";
            }
            $valeurs = [];
            $valeurs[0] = $_POST['textarea'];
            $Aide -> enregistrerQuestion($valeurs);


        }
        echo "Aide";
        $this -> afficheAide();

    }

  public function affichageApropos(){
    $vue = new Vue('Apropos');
    $vue->generer();
  }

  public function afficheAide(){
    $vue = new Vue('Aide');
    $vue->generer();

  }


}


