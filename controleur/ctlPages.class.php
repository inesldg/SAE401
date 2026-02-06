<?php
require_once "vue/vue.class.php";

class ctlPages {

    public function accueil(){
        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array());
    }

    public function erreur($message){
        $vue = new vue("Erreur");
        $vue->afficher(array("message" => $message));
    }

}