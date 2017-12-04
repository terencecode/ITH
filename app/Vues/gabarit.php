<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8" />


    <link rel="stylesheet" href="../public/css/framework.css">
      <link rel="stylesheet" href="../public/css/header.css">
      <link rel="stylesheet" href="../public/css/Theme.css">

    <?= $css ?>

    <title>
      <?= $titre ?>
    </title>

  </head>


  <body>
  <ul>

      <?php
      include 'header.php';
      ?>

  </ul>

    <?= $contenu ?>

  </body>


</html>
