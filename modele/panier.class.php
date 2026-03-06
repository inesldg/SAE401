<?php
require_once "modele/database.class.php";

class panier extends database
{

    public function affichagePanier($idEscapeGame)
    {
        $req = 'SELECT * FROM escape WHERE id_escape = ?';
        $escape = $this->execReqPrep($req, array($idEscapeGame));
        return $escape;
    }

}