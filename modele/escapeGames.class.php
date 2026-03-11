<?php

// Modèle EscapeGames : toutes les opérations liées aux escapes côté « catalogue »
// - liste de tous les escapes
// - derniers escapes pour l'accueil
// - recherche avec filtres (prix, lieu, nombre de personnes, note, durée)
// - détails d'un escape + avis associés
// - ajout d'un nouvel avis

require_once "modele/database.class.php";

class escapeGames extends database
{
    // Retourne tous les escapes (utilisé pour la page de liste)
    public function listeEscapeGames()
    {
        $req = 'SELECT * FROM escape;';
        $listeEscapeGames = $this->execReq($req);

        return $listeEscapeGames;
    }

    // Retourne les N escapes les plus récents (pour la page d'accueil)
    public function listeEscapeGamesRecents($limit = 4)
    {
        // On force un minimum de 1 pour éviter une limite à 0
        $limit = max(1, (int) $limit);
        $req = 'SELECT * FROM escape ORDER BY id_escape DESC LIMIT ' . $limit;
        return $this->execReq($req);
    }

    // Recherche d'escapes avec plusieurs filtres possibles
    // $filtres est un tableau associatif (prix_max, pers_min, lieu, etoiles, duree_max, ...)
    public function filtrerEscapeGames(array $filtres)
    {
        // Base : table escape, avec jointures pour les tarifs et la moyenne des notes
        $sql = "
            SELECT e.*
            FROM escape e
            LEFT JOIN tarif t ON t.id_escape = e.id_escape
            LEFT JOIN (
                SELECT id_escape, AVG(note) AS note_moy
                FROM evaluer
                GROUP BY id_escape
            ) ev ON ev.id_escape = e.id_escape
            WHERE 1 = 1
        ";

        $conditions = [];
        $params = [];

        // Filtre sur le prix maximum (tarif.prix)
        if (!empty($filtres['prix_max'])) {
            $conditions[] = "t.prix <= ?";
            $params[] = (float) $filtres['prix_max'];
        }

        // Filtre sur le nombre minimum de personnes
        if (!empty($filtres['pers_min'])) {
            $conditions[] = "e.nbr_pers_max >= ?";
            $params[] = (int) $filtres['pers_min'];
        }

        // Filtre sur le lieu
        if (isset($filtres['lieu']) && $filtres['lieu'] !== '') {
            $conditions[] = "e.lieu = ?";
            $params[] = $filtres['lieu'];
        }

        // Filtre sur la note moyenne (étoiles cochées dans le formulaire)
        $etoiles = $filtres['etoiles'] ?? [];
        if (!is_array($etoiles)) {
            $etoiles = $etoiles !== '' && $etoiles !== null ? [$etoiles] : [];
        }
        $etoiles = array_map('intval', array_filter($etoiles, function ($e) {
            return $e >= 1 && $e <= 5;
        }));
        if (!empty($etoiles)) {
            $etoilesConditions = [];
            foreach ($etoiles as $n) {
                // ROUND(ev.note_moy) = ?  →  moyenne arrondie au nombre d'étoiles choisi
                $etoilesConditions[] = "(ev.note_moy IS NOT NULL AND ROUND(ev.note_moy) = ?)";
                $params[] = $n;
            }
            $conditions[] = "(" . implode(" OR ", $etoilesConditions) . ")";
        }

        // Filtre sur la durée maximale
        if (!empty($filtres['duree_max'])) {
            $conditions[] = "e.duree <= ?";
            $params[] = (int) $filtres['duree_max'];
        }

        // On ajoute toutes les conditions dans la requête SQL
        if (!empty($conditions)) {
            $sql .= " AND " . implode(" AND ", $conditions);
        }

        // Éviter les doublons si un escape a plusieurs tarifs
        $sql .= " GROUP BY e.id_escape";
        // Tri par nom d'escape
        $sql .= " ORDER BY e.nom ASC";

        $listeEscapeGames = $this->execReqPrep($sql, $params);
        return is_array($listeEscapeGames) ? $listeEscapeGames : [];
    }

    // Retourne les infos complètes d'un escape (page détail d'un jeu)
    public function afficherGame($idEscapeGame)
    {
        $req = 'SELECT * FROM escape
        WHERE id_escape = ?;'; // ? = id de l'escape demandé
        $afficherGame = $this->execReqPrep($req, array($idEscapeGame));

        return $afficherGame;
    }

    // Retourne tous les avis associés à un escape donné
    public function afficherAvis($idEscapeGame)
    {
        $req = 'SELECT evaluer.id_avis, evaluer.note, evaluer.commentaire, evaluer.avis_date, evaluer.id_escape, evaluer.id_utilisateur, utilisateur.nom, utilisateur.prenom
        FROM evaluer 
        INNER JOIN escape ON evaluer.id_escape = escape.id_escape 
        INNER JOIN utilisateur ON evaluer.id_utilisateur = utilisateur.id_utilisateur 
        WHERE evaluer.id_escape = ?;'; // ? = id de l'escape
        $afficherAvis = $this->execReqPrep($req, array($idEscapeGame));

        return $afficherAvis;
    }

    // Ajoute un avis pour un escape (note + texte)
    public function ajouterAvis($note, $avis, $date, $id, $idEscape)
    {
        $req = 'INSERT INTO evaluer (note, commentaire, avis_date, id_utilisateur, id_escape) 
                VALUES (?, ?, ?, ?, ?);';
        // Les ? correspondent : note, commentaire, date de l'avis, id de l'utilisateur, id de l'escape
        $ajout = $this->execReqPrep($req, array($note, $avis, $date, $id, $idEscape));

        return $ajout;
    }
}
