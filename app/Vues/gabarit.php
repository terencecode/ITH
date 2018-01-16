<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8" />

      <link rel="stylesheet" href="public/css/framework.css">
      <link rel="stylesheet" href="public/css/header.css">
      <link rel="stylesheet" href="public/css/Theme.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="icon" href="public/images/favicon.ico">
      <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
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
