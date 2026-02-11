<?php
require_once "vue/vue.class.php";

class ctlPages {

    public function accueil($acces){
        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array("acces" => $acces));
    }

    public function erreur($message){
        $vue = new vue("Erreur");
        $vue->afficher(array("message" => $message));
    }


    public function pageInscription($message){
        $vue = new vue("Inscription");
        $vue->afficher(array("message" => $message));
    }

    public function pageConnexion($message){
        $vue = new vue("Connexion");
        $vue->afficher(array("message" => $message));
    }

}