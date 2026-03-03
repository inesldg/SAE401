<?php
// Config Langue
if (isset($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'fr';
}
$lang = $_SESSION['lang'];

$col_nom = "nom_" . $lang;
$col_desc = "description_" . $lang;

// Style
$style = '<link rel="stylesheet" href="styles/erreur.css">';
?>

<div id="erreurErr">Une erreur est survenue</div>
        <div><?= $message ?></div>

        <?php

        $script = '<script src="js/json.js" defer></script>';

