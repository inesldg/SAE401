<?php

$style = '';

$header = '<h1>Escape game<h1>';

ob_start();
?>

<a href="index.php?action=accueil">Retour à l'accueil</a>

<div>
    <h2><?= $escapeGame[0]['nom_escape_game'] ?></h2>
    <div><?= $escapeGame[0]['lieu'] ?></div>
    <div><?= $escapeGame[0]['description_escape_game'] ?></div>
<div>

<?php
// var_dump($escapeGame[0]);

$main = ob_get_clean();

$footer = '';

$script = '';