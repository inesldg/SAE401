<?php
/*
 * Modèle Compte utilisateur
 * Gère la récupération et la modification des informations du compte connecté :
 * statut (accès), mail, mot de passe, id, infos complètes et mise à jour du profil.
 */
require_once "modele/database.class.php";

class compte extends database
{
    /*
     * Récupère le statut (niveau d'accès) de l'utilisateur à partir de son adresse mail.
     * @param string $mail Adresse mail de l'utilisateur
     * @return array Ligne contenant le champ statut
     */
    public function getAcces($mail)
    {
        $data = array($mail);
        // ? sera remplacé par la valeur de $mail ; le ; termine simplement la requête SQL
        $req = 'SELECT statut FROM utilisateur WHERE mail = ?;';
        $accesUtilisateur = $this->execReqPrep($req, $data);
        return $accesUtilisateur;
    }

    /* Récupère toutes les données utilisateur pour un mail donné. */
    public function getMail($mail)
    {
        $data = array($mail);
        // ici aussi, le ? correspond à $mail passé juste en dessous
        $req = 'SELECT * FROM utilisateur WHERE mail = ?;';
        $mailUtilisateur = $this->execReqPrep($req, $data);
        return $mailUtilisateur;
    }

    /* Récupère le mot de passe (hashé) de l'utilisateur pour vérification à la connexion. */
    public function getMdp($mail)
    {
        $data = array($mail);
        // ? = mail à chercher, ; = fin de la commande SQL
        $req = 'SELECT mdp FROM utilisateur WHERE mail = ?;';
        $mdpUtilisateur = $this->execReqPrep($req, $data);
        return $mdpUtilisateur;
    }

    /* Récupère l'id_utilisateur à partir du mail. */
    public function getId($mail)
    {
        $data = array($mail);
        $req = 'SELECT id_utilisateur FROM utilisateur WHERE mail = ?;'; // ? sera remplacé par $mail
        $id = $this->execReqPrep($req, $data);
        return $id;
    }

    /* Retourne les infos du compte (id, nom, prénom, mail, tél) pour l'affichage / formulaire. */
    public function infosCompte($mail)
    {
        // même principe : le ? sera remplacé par $mail grâce à la requête préparée
        $req = 'SELECT id_utilisateur, nom, prenom, mail, tel FROM utilisateur 
        WHERE mail = ?;';
        $infosCompte = $this->execReqPrep($req, array($mail));
        return $infosCompte;
    }

    /*
     * Met à jour les informations du profil (nom, prénom, mail, tél).
     * La mise à jour cible l'utilisateur identifié par $ancienMail.
     */
    public function modifInfos($nom, $prenom, $mail, $tel, $ancienMail)
    {
        // Ici il y a 5 ? :
        //  - les 4 premiers pour nom, prenom, mail, tel
        //  - le dernier pour $ancienMail dans le WHERE
        $req = 'UPDATE utilisateur SET nom = ?, prenom = ?, mail = ?, tel = ? 
        WHERE mail = ?;';
        $modifMail = $this->execReqPrep($req, array($nom, $prenom, $mail, $tel, $ancienMail));
        return $modifMail;
    }
}