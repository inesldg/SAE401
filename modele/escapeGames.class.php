<?php
require_once "modele/database.class.php";

class escapeGames extends database
{

    public function listeEscapeGames()
    {
        $req = 'SELECT * FROM escape;';
        $listeEscapeGames = $this->execReq($req);

        return $listeEscapeGames;
    }

    /**
     * Les N jeux les plus récents (pour la page d'accueil).
     */
    public function listeEscapeGamesRecents($limit = 4)
    {
        $limit = max(1, (int) $limit);
        $req = 'SELECT * FROM escape ORDER BY id_escape DESC LIMIT ' . $limit;
        return $this->execReq($req);
    }

    /**
     * Recherche d'escapes avec filtres
     * $filtres est un tableau associatif contenant des valeurs
     */
    public function filtrerEscapeGames(array $filtres)
    {
        // Base : escape, avec jointure facultative sur tarif et moyenne des notes
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

        // Prix max (tarif.prix = prix par personne)
        if (!empty($filtres['prix_max'])) {
            $conditions[] = "t.prix <= ?";
            $params[] = (float) $filtres['prix_max'];
        }

        // Nombre minimum de personnes : jeux qui acceptent au moins ce nombre
        if (!empty($filtres['pers_min'])) {
            $conditions[] = "e.nbr_pers_max >= ?";
            $params[] = (int) $filtres['pers_min'];
        }

        // Lieu
        if (isset($filtres['lieu']) && $filtres['lieu'] !== '') {
            $conditions[] = "e.lieu = ?";
            $params[] = $filtres['lieu'];
        }

        // Note (étoiles) : cases cochées = jeux dont la note moyenne est dans la tranche [N ; N+1[
        // Ex. cocher "1 ★" = uniquement jeux avec moyenne entre 1.0 et 1.99 → sans aucun si aucun n'a 1 étoile
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
                $etoilesConditions[] = "(ev.note_moy >= ? AND ev.note_moy < ?)";
                $params[] = $n;
                $params[] = $n + 1;
            }
            $conditions[] = "(" . implode(" OR ", $etoilesConditions) . ")";
        }

        // Durée max
        if (!empty($filtres['duree_max'])) {
            $conditions[] = "e.duree <= ?";
            $params[] = (int) $filtres['duree_max'];
        }

        if (!empty($conditions)) {
            $sql .= " AND " . implode(" AND ", $conditions);
        }

        // Éviter les doublons si un escape a plusieurs tarifs
        $sql .= " GROUP BY e.id_escape";
        $sql .= " ORDER BY e.nom ASC";

        $listeEscapeGames = $this->execReqPrep($sql, $params);
        return is_array($listeEscapeGames) ? $listeEscapeGames : [];
    }

    public function afficherGame($idEscapeGame)
    {
        $req = 'SELECT * FROM escape
        WHERE id_escape = ?;';
        $afficherGame = $this->execReqPrep($req, array($idEscapeGame));
        //$idEscapeGame a récupérer en $_GET avec l'index (avec symbole & pour ajouter un parametre dans le lien)

        return $afficherGame;
    }

    public function afficherAvis($idEscapeGame)
    {
        $req = 'SELECT evaluer.id_avis, evaluer.note, evaluer.commentaire, evaluer.avis_date, evaluer.id_escape, utilisateur.nom, utilisateur.prenom
        FROM `evaluer` 
        INNER JOIN escape ON evaluer.id_escape = escape.id_escape 
        INNER JOIN utilisateur ON evaluer.id_utilisateur = utilisateur.id_utilisateur 
        WHERE evaluer.id_escape = ?;';
        $afficherAvis = $this->execReqPrep($req, array($idEscapeGame));
        //$idEscapeGame a récupérer en $_GET avec l'index (avec symbole & pour ajouter un parametre dans le lien)

        return $afficherAvis;
    }

    public function ajouterAvis($note, $avis, $date, $id, $idEscape)
    {
        $req = 'INSERT INTO `evaluer` (`id_avis`, `note`, `commentaire`, `avis_date`, `id_utilisateur`, `id_escape`) 
                VALUES (NULL, ?, ?, ?, ?, ?);';
        $ajout = $this->execReqPrep($req, array($note, $avis, $date, $id, $idEscape));

        return $ajout;
    }
}
