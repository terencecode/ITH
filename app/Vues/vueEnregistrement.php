<!-- Titre de la page -->
<?php $this->titre = "Enregistrement"; ?>

<?php echo $messagePassesDifferents ?>
<?php if (!empty($erreur)) {
  foreach ($erreur as $key => $text) {
    echo $text;
    echo "<br>";
  }
} ?>

<form action="" class="enregistrement" method="post">
  Nom:<br>
  <input type="text" name="nom"><br>
  Prénom:<br>
  <input type="text" name="prenom"><br>
  Adresse Mail:<br>
  <input type="text" name="mail"><br>
  Mot de Passe:<br>
  <input type="password" name="passe"><br>
  Répéter le mot de passe:<br>
  <input type="text" name="passe2"><br>
  Code d'inscription:<br>
  <input type="text" name="code"><br>
  <input type="submit" name='valider'>
</form>
