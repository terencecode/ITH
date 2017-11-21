<!-- Titre de la page -->
<?php $this->titre = "Aide"; ?>
<ul>                
    <li>Accueil</li>
    <li>Connexion</li>
    <li>S'enregistrer</li>
    <li>A Propos</li>
</ul>


<h1>F.A.Q : </h1>

<h2>Comment se connecter ?</h2>

<p id="Rep">Pour se connecter il suffit de d'utiliser son adresse mail et mot de passe dans la section "Connexion". Si vous souhaitez vous connecter pour la première fois, entrez votre adresse mail, Mot de passe ainsi que le code d'inscription donné au préalable.</p>

<h2>Comment ajouter un capteur/actionneur ?</h2>

<p id="Rep"> Il est possible d'ajouter un capteur/actionneur dans la section "Editer ma maison" qui est accessible en cliquant sur le bouton "Ma Maison" en en-tête.</p>

<h1>Posez nous votre question :</h1>
<form action="#" method="post">
<textarea name="Question" rows="4" cols="40"></textarea>
<input type="submit" name="Envoyer">
</form>

<?php echo $_POST['Question']; ?>