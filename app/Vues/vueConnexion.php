<!-- Titre de la page -->
<?php $this->titre = "Connexion"; ?>

<form class="connexion" action="" method="post">
  <input type="text" name="mail" placeholder="Adresse Mail..">  <b style="color: red"> <?php echo $messageMail; ?> </b> <br>
  <input type="text" name="passe" placeholder="Mot de Passe"> <b style="color: red"> <?php echo $messagePasse; ?> </b> <br>
  <input type="submit" name="valider">
</form>
