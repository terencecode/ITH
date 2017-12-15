<?php $this->titre = "Profil" ?>

<div id="body">
    <form action="" method="post">
    <div class="row">

        <div id="background-image" class="col-xs-4 col-sm-3 col-md-3 col-lg-3"></div>

        <div id="form-container" class="col-xs-8 col-sm-9 col-md-9 col-lg-9">
                <label for="nom">Nom:</label></br>
                <input type="text" name="nom" id="nom" placeholder="<?php $_SELECT   ?>"></br>
                <label type="prenom">Prénom:</label></br>
                <input type="text" name="prenom" id="prenom" placeholder="BDD"></br>
                <label for="email">Adresse mail:</label></br>
                <input type="text" name="email" id="email" placeholder="BDD"></br>
                <label for="telephone">Numéro de téléphone:</label></br>
                <input type="text" name="telephone" id="telephone" placeholder="BDD"></br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-sm-7 col-md-7 col-lg-7">

            <label for="mdp">Mot de passe:</label></br>
            <input type="password" name="passe" id="mdp"
                   placeholder="le prendre dans la BDD"></br>
            <label for="mdp2">Répeter mot de passe:</label></br>
            <input type="password" name="passe2" id="mdp2"></br>
            <label for="code">Code d'inscription:</label></br>
            <input type="text" name="code" id="code" readonly value="CoD1SkRiPsIoN"></br>
            <input class="submit-button" name="valider" type="submit" value="Enregistrer">
            <input class="cancel-button" name="valider" type="submit" value="Annuler">
        </div>
        <div class="col-xs-1 col-sm-5 col-md-5 col-lg-5"></div>
    </div>
    </form>
</div>