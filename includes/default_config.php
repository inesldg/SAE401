<?php
require_once "config/config.class.php";

$Conf = new stdClass();

// Configuration des paramètres par défaut du site modifiable dans le fichier config.class.php

$Conf->DBHost = Config::$DBHOST ?? "localhost";
$Conf->DBName = Config::$DBNAME ?? "";
$Conf->DBUser = Config::$DBUSER ?? "root";
$Conf->DBPwd = Config::$DBPWD ?? "admin";

$Conf->titreOnglet = Config::TITREONGLET;
$Conf->nomSite = Config::NOMSITE;


// Configuration du header, footer
$Conf->header = '<header class="main-header">
        <div class="logo">Logo</div>

        <nav class="nav-menu">
            <a href="#">Accueil</a>
            <a href="#">À propos</a>
            <a href="#">Nos escapes</a>
            <a href="#">Nous trouver</a>
            <a href="#">Contact</a>
        </nav>

        <div class="header-actions">
            <a href="#" class="btn-reserve">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Réserver
            </a>
        </div>
    </header>';

$Conf->footer = '<div class="footer-top">
            <div class="colonne">
                <h2>Services</h2>
                <a href="#">Réservations</a>
                <a href="#">Tarifs</a>
                <a href="#">Nos jeux</a>
            </div>

            <div class="colonne">
                <h2>Informations</h2>
                <a href="#">FAQ</a>
                <a href="#">Assistance</a>
                <a href="#">Support</a>
            </div>

            <div class="colonne">
                <h2>Notre entreprise</h2>
                <a href="#">À propos de nous</a>
                <a href="#">Nos jeux</a>
                <a href="#">Notre Instagram</a>
            </div>

            <div class="blockNewsletter">
                <h2>S inscrire à la Newsletter !</h2>
                <div class="groupeNewletter">
                    <input type="email" placeholder="Adresse mail">
                    <button><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M12 5l7 7-7 7"/></svg></button>
                </div>
                <p class="infoNewsletter">
                    Inscrivez-vous à la Newsletter Outdoor Mystery pour ne rien manquer des nouveautés et des jeux de
                    saisons !
                </p>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="logo">LOGO</div>

            <div class="links">
                <a href="#">Mentions légales</a>
                <a href="#">Politique de confidentialité</a>
                <a href="#">Données personnelles</a>
            </div>

            <div class="social-icons">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

        <div class="copyright">
            &copy; 2026 Outdoor Mystery. Tous droits réservés.
        </div>';