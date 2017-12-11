<ul>
    <?php if (!empty($_SESSION['email'])): ?>
        <li><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
        <li><a class="header-link" href="accueil">Accueil</a></li>
        <li><a class="header-link" href="profil">Mon Compte</a></li>
        <li><a class="header-link" href="editer">Ma Maison</a></li>
        <li><a class="header-link" href="deconnexion">Deconnexion</a></li>
        <li class="right"><a class="right" href="aide"><img id="help" src="public/images/help.png"></a></li>
        <li class="right"><a class="header-link" href="apropos">A Propos</a></li>
    <?php else: ?>
        <li><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
        <li><a class="header-link" href="accueil">Accueil</a></li>
        <li><a class="header-link" href="connexion">Connexion</a></li>
        <li><a class="header-link" href="enregistrement">S'enregistrer</a></li>
        <li class="right"><a class="right" href="aide"><img id="help" src="public/images/help.png"></a></li>
        <li class="right"><a class="header-link" href="apropos">A Propos</a></li>
    <?php endif; ?>
</ul>
