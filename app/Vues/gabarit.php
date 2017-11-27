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
  <div id="header" class="row">
      <div class="col-md-1 col-lg-1"><a href="index.php?page=accueil"><img id="logo" src="../public/images/logo.png"></a></div>
      <div class="col-md-2 col-lg-1 header-link"><a href="index.php?page=accueil">Accueil</a></div>
      <div class="col-md-2 col-lg-1 header-link"><a href="index.php?page=connexion">Connexion</a></div>
      <div class="col-md-2 col-lg-1 header-link"><a href="index.php?page=enregistrement">S'enregistrer</a></div>
      <div class="col-md-2 col-lg-6"></div>
      <div class="col-md-2 col-lg-1 header-link"><a href="index.php?page=apropos">A Propos</a></div>
      <div class="col-md-1 col-lg-1"><a href="index.php?page=aide"><img id="help" src="../public/images/help.png"></a></div>
  </div>
    <?= $contenu ?>

  </body>


</html>
