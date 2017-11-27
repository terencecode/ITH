<!-- Titre de la page -->
<?php $this->titre = "Editer Ma Maison"; ?>

<?php if (empty($_SESSION['mail'])): ?>
  la varialble session est vide
<?php else: ?>
  la variable session est set
<?php endif; ?>
<br>
bonjour, ton mail est <?php echo $_SESSION['mail'] ?>, ton mot de passe est <?php echo $_SESSION['passe'] ?> !

<!-- test deconnexion -->
<a href="index.php?page=deconnexion">deconnexion</a>
