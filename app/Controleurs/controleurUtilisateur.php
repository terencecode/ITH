<?php

require_once 'Modeles/habitation.php';
require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {


      public function affichageMonCompte($id){
          $utilisateur = new Utilisateurs();
          $donnees = [];
          $valeurs = [];
          $modif = false;
          $valeurs[0] = isset($_POST['nom']) ? $_POST['nom'] : "";
          $valeurs[1] = isset($_POST['prenom']) ? $_POST['prenom'] : "";
          $valeurs[2] = isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false ? $_POST['email'] : "";
          $valeurs[3] = isset($_POST['telephone']) ? $_POST['telephone'] : "";
          $valeurs[4] = isset($_POST['passe']) && isset($_POST['passe2']) &&
            $_POST['passe'] == $_POST['passe2'] ? $_POST['passe'] : "";
          for($i = 0; $i < count($valeurs); $i++) {
              if ($valeurs[$i] != "") {
                  $utilisateur->modifierUtilisateur($valeurs, $id);
                  $modif = true;
                  break;
              }
          }
          $resultat = $utilisateur->recupererUtilisateur($id);
          array_push($donnees, $resultat[1]);
          array_push($donnees, $resultat[2]);
          array_push($donnees, $resultat[3]);
          if ($modif) array_push($donnees, '<span id="successMessage">Les données ont bien été mises à jour</span>');
          $vue = new Vue('Profil');
          $vue->generer($donnees);

      }

  public function affichageUtilisateur($id){

    if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {

      $utilisateur = new Utilisateurs();
      $donnees = $utilisateur->chercherNomPrenom($id);

      if (isset($_POST['addAdmin'])) {
        $utilisateur = new Utilisateurs();
        $utilisateur->ajouterAdmin($id);
      }

      if (isset($_POST['envoyer'])) {

        $valeurs = [];
        $valeurs[] = $_POST['pays'];
        $valeurs[] = $_POST['ville'];
        $valeurs[] = $_POST['num_rue'];
        $valeurs[] = $_POST['rue'];
        $valeurs[] = $_POST['sup'];
        //$valeurs[] = $_POST['type_habitation'];

        $habitation = new Habitation();
        $habitation->ajouterHabitation($valeurs);

        $id_habitation = $habitation->chercherIdHabitation()[0];

        $gerant = [];
        $gerant[] = $id;
        $gerant[] = $id_habitation;

        $utilisateur = new Utilisateurs();
        $utilisateur->enregistrerGerant($gerant);

      }

      $vue = new Vue('Utilisateur');
      $vue->generer(array('id' => $id, 'donnees' => $donnees));

    } else {

      $vue = new Vue('404');
      $vue->generer();

    }

  }


}
