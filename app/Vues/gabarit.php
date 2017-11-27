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
      <div class="col-md-1 col-lg-1"><a href="#"><img id="logo" src="../public/images/logo.png"></a></div>
      <div class="col-md-2 col-lg-1 header-link"><a href="#">Accueil</a></div>
      <div class="col-md-2 col-lg-1 header-link"><a href="#">Connexion</a></div>
      <div class="col-md-2 col-lg-1 header-link"><a href="#">S'enregistrer</a></div>
      <div class="col-md-2 col-lg-6"></div>
      <div class="col-md-2 col-lg-1 header-link"><a href="#">A Propos</a></div>
      <div class="col-md-1 col-lg-1"><a href="#"><img id="help" src="../public/images/help.png"></a></div>
  </div>
    <?= $contenu ?>

  </body>


</html>
