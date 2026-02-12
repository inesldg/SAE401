<?php
require_once "modele/database.class.php";

class escapeGames extends database {

    public function listeEscapeGames()
    {
        $req = 'SELECT * FROM escape_games;';
        $listeEscapeGames = $this->execReq($req);

        return $listeEscapeGames;
    }

    public function afficherGame($idEscapeGame)
        {
        $req = 'SELECT * FROM escape_games 
        WHERE id_escape_game = ?;';
        $afficherGame = $this->execReqPrep($req, array($idEscapeGame)); 
        //$idEscapeGame a récupérer en $_GET avec l'index (avec symbole & pour ajouter un parametre dans le lien)
        
        return $afficherGame;

    }

}