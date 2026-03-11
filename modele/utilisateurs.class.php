<?php

require_once "modele/database.class.php";

class utilisateurs extends database
{
    // Récupère la liste de tous les utilisateurs
    public function listeUtilisateurs($mail)
    {
        // Requête SQL pour sélectionner les champs principaux des utilisateurs
        $req = 'SELECT id_utilisateur, nom, prenom, mail, tel, statut FROM utilisateur;';
        
        // Exécution de la requête préparée
        // Même si aucun paramètre n'est passé, execReqPrep sécurise la requête
        $listeUtilisateurs = $this->execReqPrep($req, array());
        return $listeUtilisateurs;
    }

      // Modifie le statut / accès d'un utilisateur
    public function changementAcces($acces, $id)
    {
        // Requête SQL pour mettre à jour le champ 'statut' d'un utilisateur spécifique
        $req = 'UPDATE utilisateur SET statut = ? WHERE utilisateur.id_utilisateur = ?;';
        // Exécution de la requête préparée avec les paramètres $acces et $id
        $modifPrenom = $this->execReqPrep($req, array($acces, $id));
        return $modifPrenom;
    }

    // Supprime un utilisateur
    public function supprimerUtilisateur($id)
    {
        // Requête SQL pour supprimer un utilisateur selon son ID
        $req = 'DELETE FROM utilisateur WHERE id_utilisateur = ?';
        // Exécution de la requête préparée avec l'ID passé en paramètre
        $supp = $this->execReqPrep($req, array($id));
        return $supp;
    }
}
