<!-- Titre de la page -->
<?php $this->titre = "Connexion"; ?>
<?php foreach ($erreur as $key => $text) {
  echo $text;
  echo "<br>";
} ?>

<form class="connexion" action="" method="post">
  Adresse Mail:<br>
  <input type="text" name="mail"><br>
  Mot de passe:<br>
  <input type="text" name="passe"><br>
  <input type="submit" name="valider">
</form>
