<?php

// Modèle Panier : gère tout ce qui touche à la réservation
// - affichage des infos de l'escape dans le panier
// - vérification de la durée / des créneaux disponibles
// - enregistrement d'une réservation

require_once "modele/database.class.php";

class panier extends database
{
    // Retourne les infos complètes d'un escape pour l'afficher dans le panier
    public function affichagePanier($idEscapeGame)
    {
        // ? sera remplacé par $idEscapeGame (id de l'escape choisi)
        $req = 'SELECT * FROM escape WHERE id_escape = ?';
        $escape = $this->execReqPrep($req, array($idEscapeGame));
        return $escape;
    }

    // Récupère la durée d'un escape (utile pour calculer les créneaux bloqués)
    public function verifierDispo($idEscape)
    {
        $req = 'SELECT duree FROM escape WHERE id_escape = ?;'; // ? = id de l'escape
        $escape = $this->execReqPrep($req, array($idEscape));
        return $escape;
    }

    // Vérifie s'il existe déjà une réservation qui chevauche le créneau demandé
    public function verifierHoraire($date, $horaireMin, $horaireMax, $idEscape)
    {
        $req = 'SELECT id_reserver, horaire, duree FROM reserver 
        INNER JOIN escape ON reserver.id_escape = escape.id_escape 
        WHERE reserver_date = ? AND horaire > ? AND horaire < ? AND reserver.id_escape = ?
        ORDER BY horaire DESC;';
        // Les ? ci-dessus correspondent dans l'ordre à : $date, $horaireMin, $horaireMax, $idEscape
        $escape = $this->execReqPrep($req, array($date, $horaireMin, $horaireMax, $idEscape));
        return $escape;
    }

    // Insère une nouvelle réservation dans la table reserver
    public function validerReservation($date, $horaire, $nbrPersonne, $idUtilisateur, $idEscapeReserve)
    {
        $req = 'INSERT INTO reserver (reserver_date, horaire, nbr_pers, id_utilisateur, id_escape) 
                VALUES (?, ?, ?, ?, ?);';
        // Ordre des valeurs : date, heure, nombre de personnes, id de l'utilisateur, id de l'escape
        $this->execReqPrep($req, array($date, $horaire, $nbrPersonne, $idUtilisateur, $idEscapeReserve));

        // On renvoie simplement 'ok' pour signaler que tout s'est bien passé
        return 'ok';
    }
}