<ul>
    <?php if (!empty($_SESSION['email'])): ?>
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
    <?php else: ?>
        <li><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
        <li><a class="header-link" href="accueil">Accueil</a></li>
        <li><a class="header-link" href="connexion">Connexion</a></li>
        <li><a class="header-link" href="enregistrement">S'enregistrer</a></li>
        <li class="right"><a class="right" href="aide"><img id="help" src="public/images/help.png"></a></li>
        <li class="right"><a class="header-link" href="apropos">A Propos</a></li>
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
