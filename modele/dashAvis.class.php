<?php
require_once "modele/database.class.php";

class dashAvis extends database
{
    // Récupère tous les avis avec les infos utilisateur et escape
    public function getAvis()
    {
        // Requête SQL pour sélectionner :
        // - l'ID de l'avis, la note, le commentaire, la date
        // - le nom et prénom de l'utilisateur
        // - le nom de l'escape game
        // Les avis sont triés par ID décroissant (du plus récent au plus ancien)
        $req = "
            SELECT 
                a.id_avis,
                a.note,
                a.commentaire,
                a.avis_date,
                u.nom,
                u.prenom,
                e.nom AS nom_escape
            FROM evaluer a
            JOIN utilisateur u ON a.id_utilisateur = u.id_utilisateur
            JOIN escape e ON a.id_escape = e.id_escape
            ORDER BY a.id_avis DESC
        ";

        return $this->execReq($req);
    }

    // Supprime un avis selon son ID
    public function supprimerAvis($id)
    {
        // Requête préparée pour supprimer l'avis correspondant à l'ID fourni
        // L'utilisation d'une requête préparée sécurise contre les injections SQL
        $req = "DELETE FROM evaluer WHERE id_avis = ?";
        return $this->execReqPrep($req, [$id]);
    }
}
