<?php
require_once "modele/utilisateurs.class.php";
require_once "vue/vue.class.php";

class ctlUtilisateurs {

    private $utilisateurs;

    public function __construct(){
        $this->utilisateurs = new utilisateurs();
    }

    public function afficherUtilisateurs($message, $mail){
        $listeUtilisateurs = $this->utilisateurs->listeUtilisateurs($mail);

        $vue = new vue("Utilisateurs"); // Instancie la vue appropriée
        $vue->afficher(array("utilisateurs" => $listeUtilisateurs, "message" => $message));
    }

    function changementAcces($acces, $id, $mail)
    {
        $this->utilisateurs->changementAcces($acces, $id);

        $listeUtilisateurs = $this->utilisateurs->listeUtilisateurs($mail);
    
        $vue = new vue("Utilisateurs"); // Instancie la vue appropriée
        $vue->afficher(array("utilisateurs" => $listeUtilisateurs, "message" => "<span>Le changement d'accès à été réalisé avec succès"));
    }

}