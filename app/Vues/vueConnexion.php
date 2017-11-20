<!-- Titre de la page -->
<?php $this->titre = "Connexion"; ?>

<!-- Messages d'erreur -->
<?php echo $messageMail; echo $messagePasse ?>

<form class="connexion" action="" method="post">
  <input type="text" name="mail" placeholder="Adresse Mail.."> <br>
  <input type="text" name="passe" placeholder="Mot de Passe.."> <br>
  <input type="submit" name="valider">
</form>
