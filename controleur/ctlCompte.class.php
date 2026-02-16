<?php

require_once "modele/compte.class.php";
require_once "vue/vue.class.php";

class ctlCompte {

    private $compte;

    public function __construct(){
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

    public function deconnexion(){
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
        header("Location: index.php");
    }


    // Modification des informations utilisateur

    // public function afficherUtilisateurs($message, $mail){
    //     $infos = $this->compte->infosUtilisateur($mail);

    //     $vue = new vue("InfosCompte"); // Instancie la vue appropriée
    //     $vue->afficher(array("infos" => $infos, "message" => $message));
    // }

    // function modifInfos($mail, $mdp)
    // {
    //     $this->compte->modifInfos($mail);

    //     $infos = $this->compte->infosUtilisateur($mail);

    //     $mdpUtilisateur = $this->compte->getMdp($mail);
    
    //     // if(password_verify($mdp, $mdpUtilisateur[0]['mdp'])){
    //         // $_SESSION["acces"] = $mail;
    //     // 
    //         // if(isset($_COOKIE["page"]))
    //             // header("Location: index.php".$_COOKIE["page"]);
    //         // else
    //             // header("location: index.php");
    //     // }
    //     // else
    //         // $vue->afficher(array("message" => "<span>Mot de passe incorrect</span>"));
    
    //     $vue = new vue("InfosCompte"); // Instancie la vue appropriée
    //     $vue->afficher(array("infos" => $infos, "message" => "<span>Le ou les changement(s) ont été réalisé(s) avec succès</span>"));
    // }

}