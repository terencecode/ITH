<!-- Titre de la page -->
<?php
$this->titre = "Connexion";
if (!empty($erreur)) {
  foreach ($erreur as $key => $text) {
    echo $text;
    echo "<br>";
  }
}
?>

<div id="body">
    <div class="row">

        <div id="background-image" class="col-xs-hide col-sm-4 col-md-7 col-lg-9"></div>

        <div id="form-container" class="col-xs-12 col-sm-8 col-md-5 col-lg-3">
            <h1>Me connecter</h1>
            <form class="connexion" action="" method="post">
            Adresse Mail:<br>
            <input type="text" name="email"><br>
            Mot de passe:<br>
            <input type="password" name="passe"><br>
            <input class="submit-button" type="submit" name="valider">
            </form>
        </div>

    </div>
</div>