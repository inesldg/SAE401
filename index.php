<?php
// Initialise ou récupère la session utilisateur
session_start();

// Chargement des paramètres de configuration
require "includes/default_config.php";
require "controleur/routeur.class.php";

// Appel du routeur dans le dossier controleur pour router les requêtes

$routeur = new routeur();
// Analyse la requête HTTP (GET/POST) et redirige vers l'action correspondante
$routeur->routerRequete();
