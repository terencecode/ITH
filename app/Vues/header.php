<script src="public/js/navbar.js"></script>
<ul id="navigation" class="topNav">
    <?php if (!empty($_SESSION['email'])): ?>
        <li id="logocontainer"><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
        <li class="header-link"><a href="accueil">Accueil</a></li>
        <li class="header-link"><a href="utilisateur">Mon Compte</a></li>
        <li class="header-link">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Mon habitation</button>
                <div id="myDropdown" class="dropdown-content">
                    <a class="header-link" href="editer">Éditer ma maison</a>
                    <a class="header-link" href="statistiques">Statistiques</a>
                    <a class="header-link" href="tableaudebord">Tableau de bord</a>
                </div>
            </div>
        </li>
        <li class="header-link"><a href="deconnexion">Deconnexion</a></li>
        <li class="right"><a href="aide">Aide</li>
        <li class="right header-link"><a href="apropos">A Propos</a></li>
        <li class="right" id="collapsible-icon"><a href="javascript:void(0);" onclick="showNav()"><img id="menu-button" src="public/svg/menu-button.svg"></a></li>
<!--=======
        <li><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
        <li><a class="header-link" href="accueil">Accueil</a></li>
        <li><a class="header-link" href="profil">Mon Compte</a></li>
        <li>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Mon habitation</button>
                <div id="myDropdown" class="dropdown-content">
                    <a class="header-link" href="editer">Éditer ma maison</a>
                    <a class="header-link" href="statistiques">Statistiques</a>
                    <a class="header-link" href="tableaudebord">Tableau de bord</a>
                </div>
            </div>
        </li>
        <li><a class="header-link" href="deconnexion">Deconnexion</a></li>
        <li class="right"><a class="right" href="aide"><img id="help" src="public/images/help.png"></a></li>
        <li class="right"><a class="header-link" href="apropos">A Propos</a></li>
>>>>>>> eb5439acb546659e14b69e8db3d928cdd9236280-->
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

<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
