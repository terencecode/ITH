<ul id="navigation" class="topNav">
<script type="text/javascript" src="public/js/navbar.js"></script>

  <?php if (!empty($_SESSION['email'])): ?>

    <?php if ($_SESSION['id'] == 0): ?>

      <li id="logocontainer"><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
      <li class="header-link"><a href="accueil">Accueil</a></li>
      <li class="header-link"><a href="profil">Mon Compte</a></li>
      <li id="dropdown-container">
          <ul class="dropdown">
            <li class="header-link-dropdown"><a href="javascript:void(0);">Mon habitation</a></li>
              <div class="dropdown-content">
                <a class="header-link-dropdown" href="editer">Éditer mon habitation</a>
                <!-- En cours de développement
                <a class="header-link-dropdown" href="statistiques">Statistiques</a>
                -->
                <a class="header-link-dropdown" href="tableau-de-bord">Tableau de bord</a>
              </div>
          </ul>
      </li>
      <li class="header-link-dropdown-responsive"><a href="editer">Éditer mon habitation</a></li>
      <!-- En cours de développement
      <li class="header-link-dropdown-responsive"><a href="statistiques">Statistiques</a></li>
      -->
      <li class="header-link-dropdown-responsive"><a href="tableau-de-bord">Tableau de bord</a></li>
      <li class="right header-link"><a href="aide">Aide</a></li>
      <li class="right header-link"><a href="apropos">A Propos</a></li>
      <li class="right header-link"><a href="deconnexion">Deconnexion</a></li>
      <li class="right" id="collapsible-icon"><a href="javascript:void(0);"><img id="menu-button" src="public/svg/menu-button.svg"></a></li>

    <?php elseif ($_SESSION['id'] == 1): ?>

      <li id="logocontainer"><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
      <li class="header-link"><a href="accueil">Utilsateurs</a></li>
      <li class="header-link"><a href="aide">Aide</a></li>
      <li class="right header-link"><a href="deconnexion">Deconnexion</a></li>
      <li class="right" id="collapsible-icon"><a href="javascript:void(0);"><img id="menu-button" src="public/svg/menu-button.svg"></a></li>   

    <?php endif; ?>

  <?php else : ?>

      <li id="logocontainer"><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
      <li class="header-link"><a href="accueil">Accueil</a></li>
      <li class="header-link"><a href="connexion">Connexion</a></li>
      <li class="header-link"><a href="enregistrement">Enregistrement</a></li>
      <li class="right header-link"><a href="aide">Aide</a></li>
      <li class="right header-link"><a href="apropos">A Propos</a></li>
      <li class="right" id="collapsible-icon"><a href="javascript:void(0);"><img id="menu-button" src="public/svg/menu-button.svg"></a></li>

  <?php endif; ?>

</ul>
