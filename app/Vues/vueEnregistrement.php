<!-- Titre de la page -->
<script src="public/js/enregistrement.js"></script>
<?php $this->titre = "Enregistrement"; ?>

<div id="body">
    <div class="row">

        <div id="background-image" class="col-xs-hide col-sm-4 col-md-7 col-lg-9"></div>


        <div id="form-container" class="col-xs-12 col-sm-8 col-md-5 col-lg-3">
            <h1>Créer un compte</h1>
            <?php if (!empty($messagePassesDifferents)){
              echo $messagePassesDifferents;
              } ?>
            <?php if (!empty($erreur)) {
              foreach ($erreur as $key => $text) {
                echo $text;
                echo "<br>";
              }
            } ?>
            <form action="" method="post" id="formEnregistrement">
                <label type="prenom">Prénom:</label>
                <input type="text" name="prenom" id="prenom"></br>
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom"></br>
                <label for="email">Adresse mail:</label>
                <input type="text" name="email" id="email"></br>
                <span id="emailErrorMessage" class="errorMessage"></span>
                <label for="mdp">Mot de passe:</label>
                <input type="password" name="passe" id="mdp"
                       placeholder="10 caractères minimum"></br>
                <span id="mdpErrorMessage" class="errorMessage"></span>
                <label for="mdp2">Répeter mot de passe:</label>
                <input type="password" name="passe2" id="mdp2"></br>
                <span id="mdp2ErrorMessage" class="errorMessage"></span>
                <input class="submit-button" name="valider" type="submit" value="Valider">
            </form>
        </div>

    </div>
</div>
