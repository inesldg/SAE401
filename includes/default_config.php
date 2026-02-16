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


// Configuration des menus

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
                    <button><i class="fas fa-arrow-right"></i></button>
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