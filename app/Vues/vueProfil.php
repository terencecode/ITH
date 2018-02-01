<script src="public/js/profil.js"></script>

<?php $this->titre = "Profil" ?>
<script>
    var donnees = {};
    <?php foreach ($donnees as $clef => $valeur): ?>
        donnees["<?php echo $clef; ?>"] = "<?php echo $valeur; ?>";
    <?php endforeach; ?>
</script>
<div id="body">


    <form action="" enctype="multipart/form-data" method="post" id="formProfil">
    <div class="row row_retour_ligne_xs">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 no_padding_bottom">
            <img class="img_1" id = "avatar" src="
            <?php if (isset($donnees["photo"]) && $donnees["photo"] != "") : ?>
              <?php echo $donnees["photo"]; ?>
            <?php else : ?>
              public/images/photo-à-venir.jpg
            <?php endif; ?>" style="width: 100%"></br>
            <label>Selectionner une photo de profil :</label>
            <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
            <span id="fileErrorMessage" class="errorMessage"></span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 no_padding_bottom">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">

                    <input hidden ="true" type="text" name="imagesel" id="imagesel" value="<?php echo $donnees["nom"]; ?>"></br>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label for="nom">Nom:</label></br>
                    <input type="text" name="nom" id="nom" value="<?php echo $donnees["nom"]; ?>"></br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label type="prenom">Prénom:</label></br>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $donnees["prenom"]; ?>"></br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label for="email">Adresse mail:</label></br>
                    <input type="text" name="email" id="email" value="<?php echo $donnees["email"]; ?>"></br>
                    <span id="emailErrorMessage" class="errorMessage"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label for="telephone">Numéro de téléphone:</label></br>
                    <input type="text" name="telephone" id="telephone" placeholder="Ajouter un numéro"
                    <?php if (isset($donnees["telephone"]) && $donnees["telephone"] != "") : ?>
                        value="<?php echo $donnees["telephone"]; ?>"
                    <?php endif; ?>></br>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 no_padding_top">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label for="mdp">Mot de passe:</label></br>
                    <input type="password" name="passe" id="mdp"
                           placeholder="Modifier le mot de passe"></br>
                    <span id="mdpErrorMessage" class="errorMessage"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label for="mdp2">Répeter mot de passe:</label></br>
                    <input type="password" name="passe2" id="mdp2"></br>
                    <span id="mdp2ErrorMessage" class="errorMessage"></span>
                </div>
            </div>
        </div>
    </div>
    <div id="valid" class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
            <input class="submit-button" name="valider" type="submit" value="Enregistrer">
            <button id="cancelModif" class="cancel-button">Annuler</button>

            <?php if(isset($donnees["successMessage"]) && $donnees["successMessage"] != "") : ?>
                <?php echo $donnees["successMessage"]; ?>
            <?php endif; ?>

        </div>
    </div>
    </form>
</div>
