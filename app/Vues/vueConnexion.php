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

<?php if (empty($_SESSION['mail'])): ?>
  la varialble session est vide
<?php else: ?>
  la variable session est set
  <a href="index.php?page=deconnexion">deconnexion</a>
<?php endif; ?>
<br>


<form class="connexion" action="" method="post">
  Adresse Mail:<br>
  <input type="text" name="mail"><br>
  Mot de passe:<br>
  <input type="password" name="passe"><br>
  <input type="submit" name="valider">
</form>
