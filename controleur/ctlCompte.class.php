<?php

require_once "modele/compte.class.php";
require_once "vue/vue.class.php";

class ctlCompte
{

    private $compte;

    public function __construct()
    {
        $this->compte = new compte();
    }

    public function getAcces($acces)
    {
        $mail = $_SESSION["acces"];
        $acces = $this->compte->getAcces($mail);
        return $acces;
    }

    public function getMail($mail)
    {
        $mail = $_SESSION["acces"];
        $mailUtilisateur = $this->compte->getMail($mail);
        return $mailUtilisateur;
    }

    public function getId($mail)
    {
        $mail = $_SESSION["acces"];
        $id = $this->compte->getId($mail);
        return $id;
    }

    public function deconnexion()
    {
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
        header("Location: index.php");
    }

    public function infosCompte($message, $mail)
    {
        $infosCompte = $this->compte->infosCompte($mail);

        $vue = new vue("Compte"); // Instancie la vue appropriée
        $vue->afficher(array("infosCompte" => $infosCompte, "message" => $message));
    }


    // Modification des informations utilisateur

    // public function afficherUtilisateurs($message, $mail){
    //     $infos = $this->compte->infosUtilisateur($mail);

    //     $vue = new vue("InfosCompte"); // Instancie la vue appropriée
    //     $vue->afficher(array("infos" => $infos, "message" => $message));
    // }

    function modifInfos($nom, $prenom, $mail, $mdp, $ancienMail)
    {
        $vue = new vue("Compte"); // Instancie la vue appropriée
        $infosCompte = $this->compte->infosCompte($ancienMail);
        $mdpUtilisateur = $this->compte->getMdp($ancienMail);

        if ($nom === "")
            $nom = $infosCompte[0]['nom'];
        if ($prenom === "")
            $prenom = $infosCompte[0]['prenom'];
        if ($mail === "")
            $mail = $ancienMail;

        if (password_verify($mdp, $mdpUtilisateur[0]['mdp'])) {
            $this->compte->modifInfos($nom, $prenom, $mail, $ancienMail);
            $_SESSION["acces"] = $mail;
            $infosCompte = $this->compte->infosCompte($mail);

            $vue->afficher(array("infosCompte" => $infosCompte, "message" => "<span>Le ou les changement(s) ont été réalisé(s) avec succès</span>"));
        } else
            $vue->afficher(array("infosCompte" => $infosCompte, "message" => "<span>Mot de passe incorrect</span>"));
    }
}
