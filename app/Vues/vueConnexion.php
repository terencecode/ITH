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


<form class="connexion" action="profil" method="post">
  Adresse Mail:<br>
  <input type="text" name="mail"><br>
  Mot de passe:<br>
  <input type="password" name="passe"><br>
  <input type="submit" name="valider">
</form>
