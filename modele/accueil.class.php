<?php
require_once "modele/database.class.php";

class accueil extends database
{
    public function getEscapesAccueil()
    {
        $req = "SELECT * FROM escape 
                ORDER BY id_escape DESC 
                LIMIT 4";

        return $this->execReq($req);
    }
}