<?php

require_once 'Modeles/habitation.php';
require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {


  public function affichageMonCompte($id){

    $utilisateur = new Utilisateurs();
    $donnees = $utilisateur->afficherCompte($id);

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

      $habitation = new Habitation();
      $donnees_habitation = $habitation->chercherDonneesHabitation($id);

      $vue = new Vue('Utilisateur');
      $vue->generer(array('donnees' => $donnees, 'donnees_habitation' => $donnees_habitation));

    } else {

      $vue = new Vue('404');
      $vue->generer();

    }

  }


}
