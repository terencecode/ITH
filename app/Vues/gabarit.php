<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8" />


    <link rel="stylesheet" href="../public/css/framework.css">
      <link rel="stylesheet" href="../public/css/header.css">
    <?= $css ?>

    <title>
      <?= $titre ?>
    </title>

  </head>


  <body>

  <ul>
      <li><a href="#"><img id="logo" src="../public/images/logo.png"></a></li>
      <li><a class="header-link" href="#home">Accueil</a></li>
      <li><a class="header-link" href="#news">Connexion</a></li>
      <li><a class="header-link" href="#contact">Enregistrer</a></li>
      <li class="right"><a class="right" href="#"><img id="help" src="../public/images/help.png"></a></li>
      <li class="right"><a class="header-link" href="#about">A Propos</a></li>
  </ul>
    <?= $contenu ?>

  </body>


</html>
