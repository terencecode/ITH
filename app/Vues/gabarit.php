<!DOCTYPE html>
<html>

<head>

  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="public/css/framework.css">
  <link rel="stylesheet" href="public/css/header.css">
  <link rel="stylesheet" href="public/css/Theme.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="icon" href="public/images/favicon.ico">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/tab.css">-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
