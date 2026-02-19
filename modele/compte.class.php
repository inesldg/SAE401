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

    public function getMdp($mail)
    {
        $data = array($mail);
        $req = 'SELECT mdp FROM utilisateur WHERE mail = ?;';
        $mdpUtilisateur = $this->execReqPrep($req, $data);
        return $mdpUtilisateur;
    }

    public function infosCompte($mail)
    {
        $req = 'SELECT nom, prenom, mail, tel FROM utilisateur 
        WHERE mail = ?;';
        $infosCompte = $this->execReqPrep($req, array($mail));
        return $infosCompte;
    }

    public function modifInfos($nom, $prenom, $mail, $ancienMail)
    {
        $req = 'UPDATE utilisateurs SET nom = ?, prenom = ?, mail = ? WHERE utilisateurs.id_utilisateur = ?;';
        $modifMail = $this->execReqPrep($req, array($nom, $prenom, $mail, $ancienMail));
        return $modifMail;
    }

}