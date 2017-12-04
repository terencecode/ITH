<?php

require 'Routeur.php';
session_start();
$router = new Routeur($_GET['currentPageUrl']);
$router->get('/', function($id){ echo "Bienvenue sur ma homepage ! " . $_GET['color']; });
$router->get('/posts/:id', function($id){ echo "Voila l'article $id"; });
$router->run();
