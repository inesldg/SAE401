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

<!-- ------ ICI mettre le code HTML ------ -->



<main class="container">

    <div class="titre">
        <span class="goldText">Merci</span> pour votre réservation !
    </div>

    <div class="message-principal" id="accrocheConf">
        Nous avons hâte de vous accueillir et vous guider à travers nos beaux paysages d’ Alsace.
    </div>

    <div class="titre" id="bientotConf">
        À bientôt chez
    </div>
    <img src="images/logo.png" width="50%" alt="Logo de la compagnie ELIFE">

    <div class="separation"></div>

    <div class="footer-content">
        <img src="images/bouton_home.svg" alt="Logo" class="logo-svg">

        <div class="liens-footer">
            <a href="index.php?action=accueil" id="retourAccConf">Retour à la page d'accueil</a>
            <!-- <a href="#" id="voirCommandeConf">Voir ma commande</a> -->
        </div>
    </div>

</main>




<?php

$script = '<script src="js/json.js" defer></script>';
