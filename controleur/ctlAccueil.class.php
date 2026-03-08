<?php
require_once "modele/accueil.class.php";
require_once "vue/vue.class.php";

// Controleur pour afficher la page d'accueil

class ctlAccueil
{
    private $accueil;

    public function __construct()
    {
        $this->accueil = new accueil();
    }

    public function afficherAccueil()
    {
        $escapeGames = $this->accueil->getEscapesAccueil();

        $vue = new vue("Accueil");
        $vue->afficher([
            "escapeGames" => $escapeGames
        ]);
    }
}