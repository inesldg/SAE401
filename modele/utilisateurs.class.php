<?php

require_once "modele/database.class.php";

class utilisateurs extends database
{
    
    public function listeUtilisateurs($mail)
    {
        $req = 'SELECT id_utilisateur, nom, prenom, mail, tel, statut FROM utilisateur 
        WHERE NOT mail = ?;';
        $accesUtilisateur = $this->execReqPrep($req, array($mail));
        return $accesUtilisateur;
    }

    public function changementAcces($acces, $id)
    {
        $req = 'UPDATE utilisateur SET statut = ? WHERE utilisateur.id_utilisateur = ?;';
        $modifPrenom = $this->execReqPrep($req, array($acces, $id));
        return $modifPrenom;
    }

}