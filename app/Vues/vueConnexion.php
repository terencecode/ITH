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


<br>


<form class="connexion" action="" method="post">
  Adresse Mail:<br>
  <input type="text" name="mail"><br>
  Mot de passe:<br>
  <input type="password" name="passe"><br>
  <input type="submit" name="valider">
</form>
