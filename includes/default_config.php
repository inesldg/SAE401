<?php
require_once "config/config.class.php";

// On crée l'objet stdClass qu’on remplit ensuite avec des propriétés (comme titreOnglet par exemple)
$Conf = new stdClass();

// Configuration des paramètres par défaut du site modifiable dans le fichier config.class.php

$Conf->DBHost = Config::$DBHOST ?? "localhost";
$Conf->DBName = Config::$DBNAME ?? "";
$Conf->DBUser = Config::$DBUSER ?? "root";
$Conf->DBPwd = Config::$DBPWD ?? "admin";

$Conf->titreOnglet = Config::TITREONGLET;
$Conf->nomSite = Config::NOMSITE;
