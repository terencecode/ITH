<?php

require_once 'Vues/vue.php';
require_once 'Modeles/capteurs.php';
require_once 'Modeles/piece.php';

class ControleurMaMaison
{

    public function affichageStatistiques()
    {
        $capteur = new Capteurs();
        $trames = $capteur->recuperer_trams();

        if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
            $vue = new Vue('Statistiques');
            $vue->generer(array('trames' => $trames));
        } else {
            $vue = new Vue('404');
            $vue->generer();
        }
    }

    public function affichageTableauDeBord()
    {
        $nom_rue=NULL;
        $piece = new Piece();
        $habitations = $piece->joinHabitationsGerant($_SESSION['id_u']);
        $tableauCapPiece=NULL;
        $pieces=NULL;

        if (isset($_POST['go'])) {
            $i = 1;

            $piece = new Piece();
            $id_habitation = $piece->chercherHabitations($_POST['habitation'])[0];
            $nom_rue = $piece->chercherHabitationsRue($id_habitation)[0];


            $utilisateur = new Utilisateurs();
            $id_gerant = $utilisateur->chercherIdGerant($id_habitation)[0];
            $_SESSION['id_gerant']=$id_gerant;

            $capteur = new Capteurs();
            $tableauCapPiece = $capteur->joinCapteurPiece($_SESSION['id_gerant']);

            $piece = new Piece();
            $pieces = $piece->afficherPiece($_SESSION['id_gerant']);

        }



        else{$i=0;}

        if (isset($_POST['update'])) {

            $Update = [];
            $Update[0] = $_POST['nom_Capteur'];
            $Update[1] = $_POST['type_piece'];
            if (isset($_POST['on_off'])) {
                $Update[2] = 1;
            } else {
                $Update[2] = 0;
            }
            $Update[3]=$_POST['nom_Capteur2'];



            $capteur = new Capteurs();
            $capteur->update_capteur($Update);



        }

            if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
                $vue = new Vue('TableauDeBord');
                $vue->generer(array('tableauCapPiece' => $tableauCapPiece, 'habitations'=>$habitations,'i'=>$i,'nom_rue'=> $nom_rue,'pieces'=>$pieces));

            } else {
                $vue = new Vue('404');
                $vue->generer();
            }

    }



    public function affichageEditerMaMaison()
    {

        $pieces=NULL;
        $capteurs=NULL;
        $nom_rue=NULL;
        $id_gerant=0;

        $piece = new Piece();
        $habitations = $piece->joinHabitationsGerant($_SESSION['id_u']);


        if (isset($_POST['go'])) {
            $i = 1;

            $piece = new Piece();
            $id_habitation = $piece->chercherHabitations($_POST['habitation'])[0];
            $nom_rue = $piece->chercherHabitationsRue($id_habitation)[0];


            $utilisateur = new Utilisateurs();
            $id_gerant = $utilisateur->chercherIdGerant($id_habitation)[0];
            $_SESSION['id_gerant']=$id_gerant;

            $capteur = new Capteurs();
            $id_piece = $capteur->chercher_id_pieceG($_SESSION['id_gerant']);

            $capteurs = [];
            $capteur = new Capteurs();
            foreach ($id_piece as $key => $value):
                $capteurs[] = $capteur->afficherEtat($value['id_piece']);
            endforeach;
            for($i=0;$i++;$i<sizeof($capteurs)):
                for($j=0;$j++;$j<sizeof($capteurs)):
                if($capteurs[$i][$j]==NULL){unset($capteurs[$i][$j]);}endfor;endfor;


            $piece = new Piece();
            $pieces = $piece->afficherPiece($_SESSION['id_gerant']);
        }

        else{$i=0;}


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
                    if (isset($_POST['on_off'])) {
                        $valeurs[1] = 1;
                    } else {
                        $valeurs[1] = 0;
                    }
                    $valeurs[3] = $_POST['type_pieceC'];
                    $valeurs[4] = $_SESSION['id_gerant'];

                    $capteur = new Capteurs();
                    $valeurs[6] = $_POST['Nom_capteur'];
                    $capteur->enregistrerCapteur($valeurs);


        }
                if ((isset($_POST['valider-Piece']))) {

                    $valeurs = [];
                    $valeurs[] = $_POST['type_piece'];
                    $valeurs[] = $_POST['long_piece'];
                    $valeurs[] = $_POST['largeur_piece'];
                    $valeurs[] = $_POST['hauteur_piece'];


                    $valeurs[] = $_SESSION['id_gerant'];
                    $valeurs[] = $_POST['Emplacement'];

                    $piece = new Piece();
                    $piece->enregistrerPiece($valeurs);


                }

                if ((isset($_POST['Supprimer_capteur']))) {
                    if (empty($_POST['Suppcapteur'])) {
                        $this->erreur[] = "Veuillez saisir le nom du capteur à supprimer";
                    }
                    $SupprC = [];
                    $SupprC[0] = $_POST['Suppcapteur'];

                    $capteur = new Capteurs();
                    $capteur->supprimer_capteur($SupprC[0]);


                }
                if ((isset($_POST['Supprimer_piece']))) {
                    if (empty($_POST['Supprimer_piece'])) {
                        $this->erreur[] = "Veuillez saisir le nom de la pièce dans laquelle vous souhaitez supprimer des capteurs";
                    }
                    $SupprP = [];
                    $SupprP[0] = $_POST['Supprimer_piece'];

                    $capteur = new Capteurs();
                    $capteur->supprimer_capteur_piece($SupprP[0]);

                    $piece = new Piece();
                    $piece->supprimer_piece($SupprP[0]);
                }



                if (!empty($_SESSION['email']) && !empty($_SESSION['passe'])) {
                    $vue = new Vue('EditerMaMaison');
                    $vue->generer(array('pieces' => $pieces, 'capteurs' => $capteurs,'habitations' => $habitations, 'nom_rue'=>$nom_rue,'i'=>$i));
                } else {
                    $vue = new Vue('404');
                    $vue->generer();
                }
    }
}
