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
<?php endif; ?>
<br>

<?php if (!empty($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $action = "index.php?page=profil&id=".$id;
} ?>


<form class="connexion" action="<?php echo $action ?>" method="post">
  Adresse Mail:<br>
  <input type="text" name="mail"><br>
  Mot de passe:<br>
  <input type="password" name="passe"><br>
  <input type="submit" name="valider">
</form>
