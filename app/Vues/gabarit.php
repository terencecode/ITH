<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8" />


    <link rel="stylesheet" href="public/css/framework.css">
      <link rel="stylesheet" href="public/css/header.css">
    <?= $css ?>

    <title>
      <?= $titre ?>
    </title>

  </head>


  <body>
  <ul>
      <li><a href="accueil"><img id="logo" src="public/images/logo.png"></a></li>
      <li><a class="header-link" href="accueil">Accueil</a></li>
      <li><a class="header-link" href="connexion">Connexion</a></li>
      <li><a class="header-link" href="enregistrement">Enregistrer</a></li>
      <li class="right"><a class="right" href="aide"><img id="help" src="public/images/help.png"></a></li>
      <li class="right"><a class="header-link" href="apropos">A Propos</a></li>
  </ul>
    <?= $contenu ?>

  </body>


</html>
