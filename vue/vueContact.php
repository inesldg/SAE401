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
$style = '<link rel="stylesheet" href="styles/contact.css">';
?>

<!-- ------ ICI mettre le code HTML ------ -->



<main class="container">
    <div class="page-wrapper">
        <div class="overlay"></div>

        <main class="content">
            <h1>Contact</h1>
            <p class="subtitle">Nous espérons avoir de vos nouvelles bientôt !</p>

            <div class="contact-grid">
                <div class="contact-card">
                    <h3>Appelez-nous</h3>
                    <p><strong>07668 996660</strong></p>
                    <div class="divider"></div>
                    <p>Lun - Ven<br>9h00 – 12h00 / 13h00 – 16h00</p>
                </div>

                <div class="contact-card">
                    <h3>Écrivez-nous</h3>
                    <p><a href="mailto:booking@we-escape.de">booking@we-escape.de</a></p>
                    <div class="divider"></div>
                    <p>L'épreuve par équipe pour le meilleur moment d'équipe.</p>
                </div>

                <div class="contact-card">
                    <h3>Suivez-nous</h3>
                    <p>Rejoignez l'aventure sur les réseaux</p>
                    <div class="social-icons-wrapper">
                        <a href="https://www.instagram.com/we_escape_abenteuer/" target="_blank" aria-label="Instagram">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/company/we-escape-gmbh/" target="_blank"
                            aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C13.93,9.94 13.46,10.66 13.12,11.24V10.13H10.13V18.5H13.13V13.29C13.13,12.87 13.3,12.14 13.81,11.63C14.32,11.12 14.78,11.05 15.11,11.05C16.03,11.05 16.5,11.69 16.5,13.15V18.5H19.5V18.5M8,18.5V10.13H5V18.5H8M6.5,5.5A1.5,1.5 0 1,0 8,7A1.5,1.5 0 0,0 6.5,5.5Z" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/weescapegmbh" target="_blank" aria-label="Facebook">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/@We-Escape" target="_blank" aria-label="YouTube">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M10,15L15.19,12L10,9V15M21.56,7.17C21.67,7.64 21.7,8.77 21.7,10V14C21.7,15.23 21.67,16.36 21.56,16.83C21.43,17.36 21.11,17.78 20.6,17.91C20.12,18.03 17.5,18.1 12,18.1C6.5,18.1 3.88,18.03 3.4,17.91C2.89,17.78 2.57,17.36 2.44,16.83C2.33,16.36 2.3,15.23 2.3,14V10C2.3,8.77 2.33,7.64 2.44,7.17C2.57,6.64 2.89,6.22 3.4,6.09C3.88,5.97 6.5,5.9 12,5.9C17.5,5.9 20.12,5.97 20.6,6.09C21.11,6.22 21.43,6.64 21.56,7.17Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="divider"></div>
                    <p>#WeEscapeChallenge</p>
                </div>
            </div>

            <section class="gallery-section">
                <h2 class="gallery-title">Aperçus de l'Aventure</h2>
                <div class="gallery-container">
                    <div class="photo-frame">
                        <img src="images/escape_grp.png" alt="Escape Groupe">
                    </div>
                    <div class="photo-frame">
                        <img src="images/nature_escape2.jpg" alt="Nature Escape">
                    </div>
                    <div class="photo-frame">
                        <img src="images/image_34.png" alt="Escape Room">
                    </div>
                </div>
            </section>

            <section class="footer-quote">
                <div class="horizontal-line"></div>
                <p class="quote-text">"Le secret le mieux gardé est celui que l'on partage au bon moment"</p>
            </section>
        </main>
    </div>


</main>




<?php

$script = '<script src="js/json.js" defer></script>';
