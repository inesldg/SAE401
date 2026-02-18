<?php

$style = '<link rel="stylesheet" href="styles/confirmationAchat.css">';

ob_start();
?>

<a href="index.php?action=confirmation">Retour à l'accueil</a>

<!-- ------ ICI mettre le code HTML ------ -->

<main class="container">

    <div class="titre">
        <span class="goldText">Merci</span> pour votre réservation !
    </div>

    <div class="message-principal">
        Nous avons hâte de vous accueillir et vous guider à travers nos beaux paysages d’ Alsace.
    </div>

    <div class="titre">
        À bientôt à <span class="goldText">Outdoor Mystery</span> !
    </div>

    <div class="separation"></div>

    <div class="footer-content">
        <img src="SVG/bouton home.svg" alt="Logo" class="logo-svg">

        <div class="liens-footer">
            <a href="#">Retour à la page d'accueil</a>
            <a href="#">Voir ma commande</a>
        </div>
    </div>

</main>




<?php

$main = ob_get_clean();

$script = '';