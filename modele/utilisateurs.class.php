<?php

require_once "modele/database.class.php";

class utilisateurs extends database
{
    
    public function listeUtilisateurs()
    {
        $req = 'SELECT id_utilisateur, nom, prenom, mail, tel, statut FROM utilisateur';
        $accesUtilisateur = $this->execReq($req);
        return $accesUtilisateur;
    }

}