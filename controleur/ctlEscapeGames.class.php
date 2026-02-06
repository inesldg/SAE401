<?php
require_once "modele/escapeGames.class.php";
require_once "vue/vue.class.php";

class ctlEscapeGames {

    private $escapeGames;

    public function __construct(){
        $this->escapeGames = new escapeGames();
    }

    public function pageEscapeGames(){
        $escapeGames = $this->escapeGames->listeEscapeGames();

        $vue = new vue("EscapeGames"); // Instancie la vue appropriée
        $vue->afficher(array("escapeGames" => $escapeGames)); // Affiche la liste des clients dans la vue
    }

}