<?php

// Modèle Inscription : gère la création d'un nouveau compte utilisateur

require_once "modele/database.class.php";

class inscription extends database
{
    // Crée un utilisateur dans la table utilisateur
    // $mdpCrypte contient déjà le mot de passe hashé (password_hash côté contrôleur)
    public function inscrire($nom, $prenom, $mail, $phone, $mdpCrypte)
    {
        $req = 'INSERT INTO utilisateur (nom, prenom, mail, tel, mdp, statut) 
                VALUES (?, ?, ?, ?, ?, 1);';
        // Les ? correspondent dans l'ordre à : nom, prénom, mail, téléphone, mot de passe hashé
        $inscription = $this->execReqPrep($req, array($nom, $prenom, $mail, $phone, $mdpCrypte));

        return $inscription;
    }
}
