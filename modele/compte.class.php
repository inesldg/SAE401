<?php

require_once "modele/database.class.php";

class compte extends database
{
    public function getAcces($mail)
    {
        $data = array($mail);
        $req = 'SELECT statut FROM utilisateur WHERE mail = ?;';
        $accesUtilisateur = $this->execReqPrep($req, $data);
        return $accesUtilisateur;
    }

    public function getMail($mail)
    {
        $data = array($mail);
        $req = 'SELECT * FROM utilisateur WHERE mail = ?;';
        $mailUtilisateur = $this->execReqPrep($req, $data);
        return $mailUtilisateur;
    }

}