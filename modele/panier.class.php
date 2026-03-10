<?php
require_once "modele/database.class.php";

class panier extends database
{

    public function affichagePanier($idEscapeGame)
    {
        $req = 'SELECT * FROM escape WHERE id_escape = ?';
        $escape = $this->execReqPrep($req, array($idEscapeGame));
        return $escape;
    }

    public function verifierDispo($idEscape)
    {
        $req = 'SELECT duree FROM escape WHERE id_escape = ?;';
        $escape = $this->execReqPrep($req, array($idEscape));
        return $escape;
    }

    public function verifierHoraire($date, $horaireMin, $horaireMax , $idEscape)
    {
        $req = 'SELECT id_reserver, horaire, duree FROM reserver 
        INNER JOIN escape ON reserver.id_escape = escape.id_escape 
        WHERE reserver_date = ? AND horaire > ? AND horaire < ? AND reserver.id_escape = ?
        ORDER BY horaire DESC;';
        $escape = $this->execReqPrep($req, array($date, $horaireMin, $horaireMax, $idEscape));
        return $escape;
    }

    public function validerReservation($date, $horaire, $nbrPersonne, $idUtilisateur, $idEscapeReserve)
    {
        $req = 'INSERT INTO `reserver` (`id_reserver`, `reserver_date`, `horaire`, `nbr_pers`, `id_utilisateur`, `id_escape`) 
                VALUES (NULL, ?, ?, ?, ?, ?);';
        $reservation = $this->execReqPrep($req, array($date, $horaire, $nbrPersonne, $idUtilisateur, $idEscapeReserve));

        $reservation = 'ok';
        return $reservation;
    }

}