<!-- Titre de la page -->
<?php $this->titre = "aide"; ?>

<?php if (isset($_SESSION['id']) && $_SESSION['id'] == 1): ?>

<div id="body">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <h1>F.A.Q.</h1>
        </div>

    </div>

</div>

<?php foreach ($questions as $key=>$value):?>
        <?php foreach ($value as $key =>$value2):?>

            <option value="<?php echo $value2 ?>"><?php echo $value2 ?></option>

            <textarea name="reponse" id="reponse" cols="20" rows="5"></textarea>

        <?php endforeach;?>
    <?php endforeach;?>

<?php else: ?>

<div id="body">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <h1>F.A.Q.</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Posez nous votre question :</h2>
            <form action="" method="post">
                <textarea id="enregistrerQuestion" name="Question" rows="4" cols="40"></textarea>
                <input class="submit-button" name="input_enregistrer" type="submit" value="Valider">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <h2>Comment se connecter ?</h2>
            <p id="Rep">Pour se connecter il suffit de d'utiliser son adresse mail et mot de passe dans la section "Connexion". Si vous souhaitez vous connecter pour la première fois, entrez votre adresse mail, Mot de passe ainsi que le code d'inscription donné au préalable.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <h2>Comment ajouter un capteur/actionneur ?</h2>
            <p id="Rep"> Il est possible d'ajouter un capteur/actionneur dans la section "Editer ma maison" qui est accessible en cliquant sur le bouton "Ma Maison" en en-tête.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <h2>Vos questions</h2>

        </div>
    </div>

</div>

    <?php foreach ($questions as $key=>$value):?>
        <?php foreach ($value as $key =>$value2):?>
            <option value="<?php echo $value2 ?>"><?php echo $value2 ?></option>
        <?php endforeach;?>
    <?php endforeach;?>

</form></br>

<?php endif; ?>