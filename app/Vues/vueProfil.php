<script src="public/js/profil.js"></script>

<?php $this->titre = "Profil" ?>
<script>
    var donnees = [];
    <?php for ($i = 0; $i < count($donnees); ++$i): ?>
        donnees.push("<?php echo $donnees[$i] ?>");
    <?php endfor; ?>

</script>
<div id="body">
    <form action="" method="post" id="formProfil">
    <div class="row row_retour_ligne_xs">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 no_padding_bottom">
            <img class="img_1" src="public/images/photo-à-venir.jpg" style="width: 100%">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 no_padding_bottom">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label for="nom">Nom:</label></br>
                    <input type="text" name="nom" id="nom" value="<?php echo $donnees[2]; ?>"></br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label type="prenom">Prénom:</label></br>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $donnees[1]; ?>"></br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label for="email">Adresse mail:</label></br>
                    <input type="text" name="email" id="email" value="<?php echo $donnees[0]; ?>"></br>
                    <span id="emailErrorMessage" class="errorMessage"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formulaire">
                    <label for="telephone">Numéro de téléphone:</label></br>
                    <input type="text" name="telephone" id="telephone" placeholder="Ajouter un numéro"></br>
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

            <?php if(isset($donnees[3])) : ?>
                <?php echo $donnees[3]; ?>
            <?php endif; ?>
        </div>
    </div>
    </form>
</div>
