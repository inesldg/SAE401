<?php
require_once "modele/escapeGames.class.php";
require_once "vue/vue.class.php";

class ctlEscapeGames {

    private $escapeGames;

    public function __construct(){
        $this->escapeGames = new escapeGames();
    }

    public function accueil($acces){
        $escapeGames = $this->escapeGames->listeEscapeGames();

        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array("escapeGames" => $escapeGames, "acces" => $acces));
    }

    public function pageEscapeGames(){
        $escapeGames = $this->escapeGames->listeEscapeGames();

        $vue = new vue("EscapeGames"); // Instancie la vue appropriée
        $vue->afficher(array("escapeGames" => $escapeGames)); // Affiche la liste des clients dans la vue
    }

    public function pageGame($idEscapeGame, $message=""){
        $game = $this->escapeGames->afficherGame($idEscapeGame);
        $avis = $this->escapeGames->afficherAvis($idEscapeGame);

        if ($game != 0){
            $vue = new vue("Game"); // Instancie la vue appropriée
            $vue->afficher(array("escapeGame" => $game, "avis" => $avis, "message" => $message)); // Affiche la liste des clients dans la vue
        }
        else
            throw new Exception("L'escape Game demandé n'existe pas");
    }

}