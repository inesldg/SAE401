<?php
require_once "modele/database.class.php";

class escapeGames extends database {

    public function listeEscapeGames()
    {
        $req = 'SELECT * FROM escape_games;';
        $listeEscapeGames = $this->execReq($req);

        return $listeEscapeGames;
    }

}