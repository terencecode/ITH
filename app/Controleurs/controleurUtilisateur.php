<?php

require_once 'Modeles/habitation.php';
require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurUtilisateur {


      public function affichageMonCompte($id){
          $utilisateur = new Utilisateurs();
          $valeurs = [];
          $modif = false;
          $valeurs[0] = isset($_POST['nom']) ? $_POST['nom'] : "";
          $valeurs[1] = isset($_POST['prenom']) ? $_POST['prenom'] : "";
          $valeurs[2] = isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false ? $_POST['email'] : "";
          $valeurs[3] = isset($_POST['telephone']) ? $_POST['telephone'] : "";
          $valeurs[4] = isset($_POST['passe']) && isset($_POST['passe2']) &&
            $_POST['passe'] == $_POST['passe2'] ? $_POST['passe'] : "";
          $valeurs[5] = "";
          if (isset($_FILES["fileToUpload"])) {
              $relative_path = "fichiers/photos_de_profil/";
              $absolute_dir_path = $_SERVER['DOCUMENT_ROOT'] . "/ITH/" . $relative_path;
              $uploadOk = true;
              $typeImage = strtolower(pathinfo($absolute_dir_path . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));

              // Check if image file is a actual image or fake image
              if(isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                      $uploadOk = true;
                  } else {
                      $uploadOk = false;
                  }
              }

              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 2*1024*1024) {
                  $uploadOk = false;
              }
              // Allow certain file formats
              if($typeImage != "jpg" && $typeImage != "png" && $typeImage != "jpeg"
              && $typeImage != "gif" ) {
                  $uploadOk = false;
              }

              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == false) {
                  echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                    $filename = "";
                  do {
                      $filename = uniqid() . "." .$typeImage;
                      $fichier_dest = $absolute_dir_path . basename($filename);
                  } while (file_exists($fichier_dest));

                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fichier_dest)) {
                      $valeurs[5] = $relative_path . $filename;
                      $modif = true;
                  }
              }
          }

          for($i = 0; $i < count($valeurs); $i++) {
              if ($valeurs[$i] != "") {
                  $utilisateur->modifierUtilisateur($valeurs, $id);
                  $modif = true;
                  break;
              }
          }

          $resultat = $utilisateur->recupererUtilisateur($id);
          $donnees = array(
            'email' => $resultat[1],
            'prenom' => $resultat[2],
            'nom' => $resultat[3]
          );

          if ($modif) $donnees['successMessage'] = '<span id="successMessage">Les données ont bien été mises à jour</span>';
          if (isset($resultat[5])) $donnees['telephone'] = $resultat[5];
          if (isset($resultat[6])) $donnees['photo'] = $resultat[6];

          //die(var_dump($donnees));

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
