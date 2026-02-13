<?php
require_once "modele/database.class.php";

class escapeGames extends database {

    public function listeEscapeGames()
    {
        $req = 'SELECT * FROM escape;';
        $listeEscapeGames = $this->execReq($req);

        return $listeEscapeGames;
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

}