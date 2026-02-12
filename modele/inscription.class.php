<?php
require_once "modele/database.class.php";

class inscription extends database {

    public function inscrire($nom, $prenom, $mail, $phone, $mdpCrypte)
    {
        $req = 'INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `mail`, `telephone`, `mdp`, `niveau_acces`) 
                VALUES (NULL, ?, ?, ?, ?, 1);';
        $inscription = $this->execReqPrep($req, array($nom, $prenom, $mail, $phone, $mdpCrypte));

        return $inscription;
    }
}