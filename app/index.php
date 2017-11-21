<?php

require 'routeur.php';
session_start();
$routeur = new routeur();
$routeur->routerRequete();
