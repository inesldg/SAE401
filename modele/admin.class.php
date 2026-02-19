<?php

// A VERIFIER SVPPPPPP


require_once "modele/database.class.php";

class admin extends database
{

    // Nombre de réservations
    public function getReservations()
    {
        $res = $this->execReq("SELECT COUNT(*) as total FROM reserver");
        return array("total" => $res[0]['total'] ?? 0);
    }

    // Nombre d'utilisateurs
    public function getUtilisateurs()
    {
        $res = $this->execReq("SELECT COUNT(*) as total FROM utilisateur");
        return array("total" => $res[0]['total'] ?? 0);
    }

    // Nombre d'escapes
    public function getEscapes()
    {
        $res = $this->execReq("SELECT COUNT(*) as total FROM escape");
        return array("total" => $res[0]['total'] ?? 0);
    }

    // Revenus des escapes pour le mois 
    public function getRevenus($mois, $annee)
    {
        $req = "SELECT reserver.nbr_pers, tarif.prix
                FROM reserver
                JOIN tarif ON reserver.id_escape = tarif.id_escape
                WHERE MONTH(reserver.reserver_date) = ? 
                AND YEAR(reserver.reserver_date) = ?";

        $res = $this->execReqPrep($req, array($mois, $annee));

        // Si la requête ne retourne rien, on force un tableau vide
        if (!is_array($res)) {
            $res = [];
        }

        $total = 0;
        foreach ($res as $ligne) {
            $total += $ligne['nbr_pers'] * $ligne['prix'];
        }

        return array("revenus" => $total);
    }

    // Note moyenne globale
    public function getNoteMoyenne()
    {
        $res = $this->execReq("SELECT AVG(note) as moyenne FROM evaluer");
        return array("moyenne" => round($res[0]['moyenne'] ?? 0, 1));
    }

    // Taux d'occupation total (somme des participants)
    public function getTauxOccupation()
    {
        $res = $this->execReq("SELECT SUM(nbr_pers) as totalPers FROM reserver");
        return array("totalPers" => $res[0]['totalPers'] ?? 0);
    }


    // public function getListeReservations()
    // {
    //     $req = "SELECT 
    //             reserver.id_reserver,
    //             escape.libelle AS nom_escape,
    //             utilisateur.nom,
    //             utilisateur.prenom,
    //             reserver.reserver_date,
    //             reserver.reserver_heure,
    //             reserver.nbr_pers,
    //             tarif.prix
    //         FROM reserver
    //         JOIN escape ON reserver.id_escape = escape.id_escape
    //         JOIN utilisateur ON reserver.id_utilisateur = utilisateur.id_utilisateur
    //         JOIN tarif ON reserver.id_escape = tarif.id_escape
    //         ORDER BY reserver.reserver_date DESC";

    //     $res = $this->execReq($req);

    //     // Sécurité si vide
    //     if (!is_array($res)) {
    //         return [];
    //     }

    //     return $res;
    // }
}
