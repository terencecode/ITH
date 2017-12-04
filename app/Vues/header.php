<?php if (!empty($_SESSION['mail'])): ?>
    <li><a href="index.php?page=accueil"><img id="logo" src="../public/images/logo.png"></a></li>
    <li><a class="header-link" href="index.php?page=accueil">Accueil</a></li>
    <li><a class="header-link" href="index.php?page=utilisateur">Mon Compte</a></li>
    <li><a class="header-link" href="index.php?page=editer">Ma Maison</a></li>
    <li><a class="header-link" href="index.php?page=deconnexion">Deconnexion</a></li>
    <li class="right"><a class="right" href="index.php?page=aide"><img id="help" src="../public/images/help.png"></a></li>
    <li class="right"><a class="header-link" href="index.php?page=apropos">A Propos</a></li>
<?php else: ?>
    <li><a href="index.php?page=accueil"><img id="logo" src="../public/images/logo.png"></a></li>
    <li><a class="header-link" href="index.php?page=accueil">Accueil</a></li>
    <li><a class="header-link" href="index.php?page=connexion">Connexion</a></li>
    <li><a class="header-link" href="index.php?page=enregistrement">Enregistrer</a></li>
    <li class="right"><a class="right" href="index.php?page=aide"><img id="help" src="../public/images/help.png"></a></li>
    <li class="right"><a class="header-link" href="index.php?page=apropos">A Propos</a></li>
<?php endif; ?>