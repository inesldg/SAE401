<?php
require_once "modele/database.class.php";

class ajoutEscape extends database
{

    public function ajouterEscape($nom, $description, $lieu, $duree, $min, $max)
    {
        // Insertion de l'escape dans la table escape
        $req = 'INSERT INTO `escape` (`id_escape`, `nom`, `description`, `lieu`, `duree`, `nbr_pers_min`, `nbr_pers_max`) 
                VALUES (NULL, ?, ?, ?, ?, ?, ?);';
        $this->execReqPrep($req, [$nom, $description, $lieu, $duree, $min, $max]);

        // Récupère l'ID du dernier escape ajouté
        // On sélectionne l'escape qui correspond au nom, lieu et durée, trié par id_escape décroissant pour obtenir le dernier inséré
        $reqId = "SELECT id_escape FROM escape WHERE nom = ? AND lieu = ? AND duree = ? ORDER BY id_escape DESC LIMIT 1";
        $result = $this->execReqPrep($reqId, [$nom, $lieu, $duree]);

        // Retourne l'ID si trouvé, sinon null
        return $result[0]['id_escape'] ?? null;
    }
}
