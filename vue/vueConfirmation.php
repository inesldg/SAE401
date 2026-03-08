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
$style = '<link rel="stylesheet" href="styles/confirmationAchat.css">';
?>

<!-- contenu du remerciement -->
<main class="container">

    <div class="titre reveal reveal-up">
        <span class="goldText" id="merciGold">Merci</span>
        <span id="txtReservation">pour votre réservation !</span>
    </div>

    <div class="message-principal reveal reveal-up" id="accrocheConf">
        Nous avons hâte de vous accueillir et vous guider à travers nos beaux paysages d’ Alsace.
    </div>

    <div class="titre reveal reveal-up" id="bientotConf">
        À bientôt chez
    </div>
    <img src="images/logo.png" width="50%" alt="Logo de la compagnie ELIFE">

    <div class="separation"></div>

    <!-- logo ELIFE -->
    <div class="footer-content reveal reveal-up">
        <img src="images/bouton_home.svg" alt="Logo" class="logo-svg">

        <!-- lien retour page d'accueil -->
        <div class="liens-footer">
            <a href="index.php?action=accueil" id="retourAccConf reveal reveal-up">Retour à la page d'accueil</a>
        </div>
    </div>

</main>




<?php

$script = '<script src="js/json.js" defer></script>';
