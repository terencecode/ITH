<?php

require_once 'Vues/vue.php';
require_once 'Modeles/Aide.php';

class ControleurAide{

    public function affichageAide()
    {

        if (isset($_SESSION["id"]) && $_SESSION["id"] == 1) {

            if (isset($_POST['reponse'])) {

                //die(var_dump($_POST["reponse"]));
                $reponse = $_POST["reponse"];
                $id = $_POST['id'];
                $aide = new Aide();
                $aide -> enregistrerReponse($reponse, $id);
        
            }

            if (isset($_POST["supprimer"])) {
                $id = $_POST['id'];
                $aide = new Aide();
                $aide -> supprimerQuestion($id);
            }
            
        } else {

            if (isset($_POST['input_enregistrer'])) {

                if (empty($_POST['Question'])) {
                    $this->erreur[] = "Veuillez saisir votre question";
                }
                $valeurs = [];
                $valeurs[0] = $_POST['Question'];
                $aide = new Aide();
                $aide -> enregistrerQuestion($valeurs);
    
            }
            
        }

        $aide = new Aide();
        $questions = $aide->voirQuestion();
    
        $vue = new Vue('Aide');
        $vue->generer(array('questions' => $questions));

    }

  public function affichageApropos(){

    $vue = new Vue('Apropos');
    $vue->generer();

  }


}


