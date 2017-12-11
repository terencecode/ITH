<script src="public/js/navbar.js"></script>
<ul id="navigation" class="topNav">
    <?php if (!empty($_SESSION['email'])): ?>
        <li id="logocontainer"><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
        <li class="header-link"><a href="accueil">Accueil</a></li>
        <li class="header-link"><a href="utilisateur">Mon Compte</a></li>
        <li class="header-link"><a href="editer">Ma Maison</a></li>
        <li class="header-link"><a href="deconnexion">Deconnexion</a></li>
        <li class="right"><a href="aide">Aide</li>
        <li class="right header-link"><a href="apropos">A Propos</a></li>
        <li class="right" id="collapsible-icon"><a href="javascript:void(0);" onclick="showNav()"><img id="menu-button" src="public/svg/menu-button.svg"></a></li>
    <?php else: ?>
        <li id="logocontainer"><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
        <li class="header-link"><a href="accueil">Accueil</a></li>
        <li class="header-link"><a href="connexion">Connexion</a></li>
        <li class="header-link"><a href="enregistrement">S'enregistrer</a></li>
        <li class="right header-link"><a href="aide">Aide</li>
        <li class="right header-link"><a href="apropos">A Propos</a></li>
        <li class="right" id="collapsible-icon"><a href="javascript:void(0);" onclick="showNav()"><img id="menu-button" src="public/svg/menu-button.svg"></a></li>
    <?php endif; ?>
</ul>
