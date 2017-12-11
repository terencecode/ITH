<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8" />

      <link rel="stylesheet" href="public/css/framework.css">
      <link rel="stylesheet" href="public/css/header.css">
      <link rel="stylesheet" href="public/css/Theme.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <?= $css ?>

    <title>
      <?= $titre ?>
    </title>

  </head>

  <body>
  <?php include 'header.php'; ?>

  <?= $contenu ?>

  </body>

</html>
