<?php
require_once "modele/database.class.php";

class ajoutEscape extends database {

    public function ajouterEscape($nom, $description, $lieu, $duree, $min, $max)
    {
        $req = 'INSERT INTO `escape` (`id_escape`, `nom`, `description`, `lieu`, `duree`, `nbr_pers_min`, `nbr_pers_max`) 
                VALUES (NULL, ?, ?, ?, ?, ?, ?);';
        $ajout = $this->execReqPrep($req, array($nom, $description, $lieu, $duree, $min, $max));

        return $ajout;
    }
}