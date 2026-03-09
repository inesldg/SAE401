<?php
require_once "modele/database.class.php";

class dashCalendrier extends database
{
    public function getEscapes()
    {
        $sql = "SELECT id_escape, nom 
                FROM escape
                ORDER BY nom";
        return $this->execReq($sql);
    }

    public function getReservationsByDate($date, $id_escape = null)
    {
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

        if (!empty($id_escape)) {
            $sql .= " AND r.id_escape = " . intval($id_escape);
        }

        return $this->execReq($sql);
    }

    public function supprimerReservation($id_reserver)
{
    $sql = "DELETE FROM reserver WHERE id_reserver = " . intval($id_reserver);
    return $this->execReq($sql);
}
    
}