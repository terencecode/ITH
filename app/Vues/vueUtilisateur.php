<?php $this->titre = "Profil" ?>

<div id="body">
    <div class="row">

        <div id="background-image" class="col-xs-4 col-sm-4 col-md-3 col-lg-3"></div>

        <div id="form-container" class="col-xs-8 col-sm-8 col-md-9 col-lg-9">
            <form action="" method="post">
                <label for="nom">Nom:</label></br>
                <input type="text" name="nom" id="nom"></br>
                <label type="prenom">Prénom:</label></br>
                <input type="text" name="prenom" id="prenom"></br>
                <label for="email">Adresse mail:</label></br>
                <input type="text" name="email" id="email"></br>
                <label for="telephone">Numéro de téléphone:</label></br>
                <input type="text" name="telephone" id="telephone"
                       placeholder="Télephone actuel"></br>
                <label for="mdp">Modifier mot de passe:</label></br>
                <input type="password" name="passe" id="mdp"
                       placeholder="10 caractères minimum"></br>
                <input id="submit-button" name="valider" type="submit" value="Enregistrer">
                <input id="cancel-button" name="valider" type="submit" value="Annuler">
            </form>
        </div>

    </div>
</div>