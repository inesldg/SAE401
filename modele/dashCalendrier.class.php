<?php
require_once "modele/database.class.php";

class dashCalendrier extends database
{
    // Récupère la liste de tous les escape games
    public function getEscapes()
    {
        // Requête SQL pour sélectionner l'ID et le nom des escape games
        // Tri par ordre alphabétique du nom
        $sql = "SELECT id_escape, nom 
                FROM escape
                ORDER BY nom";
        return $this->execReq($sql);
    }

    // Récupère les réservations pour une date donnée
    // Optionnel : filtrer par escape game
    public function getReservationsByDate($date, $id_escape = null)
    {
        // Requête SQL pour récupérer les informations des réservations
        // Joins pour obtenir les informations du jeu (escape) et de l'utilisateur
        $sql = "SELECT r.id_reserver,
                       r.reserver_date,
                       r.horaire,
                       r.nbr_pers,
                       e.nom AS nom_escape,
                       u.nom,
                       u.prenom,
                       u.mail
                FROM reserver r
                JOIN escape e ON r.id_escape = e.id_escape
                JOIN utilisateur u ON r.id_utilisateur = u.id_utilisateur
                WHERE r.reserver_date = '$date'";

        // Si un ID d'escape game est fourni, on filtre également sur cet escape
        if (!empty($id_escape)) {
            $sql .= " AND r.id_escape = " . intval($id_escape);
        }

        return $this->execReq($sql);
    }

     // Supprime une réservation selon son ID
    public function supprimerReservation($id_reserver)
    {
        // Requête SQL pour supprimer la réservation
        $sql = "DELETE FROM reserver WHERE id_reserver = " . intval($id_reserver);
        return $this->execReq($sql);
    }
}
