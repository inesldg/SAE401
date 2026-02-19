<?php
session_start();

require "includes/default_config.php";
require "controleur/routeur.class.php";

// Appel du routeur dans le dossier controleur pour router les requêtes

$routeur = new routeur();
$routeur->routerRequete();
