<?php
/**
 * Modèle Accueil
 * Gère les données affichées sur la page d'accueil du site.
 * Hérite de database pour exécuter les requêtes SQL.
 */
require_once "modele/database.class.php";

class accueil extends database
{
    /**
     * Récupère les 4 derniers escape games (les plus récents) pour la section "Nos derniers escapes".
     * @return array Liste des escapes triés par id_escape décroissant, limitée à 4.
     */
    public function getEscapesAccueil()
    {
        $req = "SELECT * FROM escape 
                ORDER BY id_escape DESC 
                LIMIT 4";

        return $this->execReq($req);
    }
}