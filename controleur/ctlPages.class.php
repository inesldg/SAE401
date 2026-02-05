<?php
require_once "vue/vue.class.php";

class ctlPages {

    public function accueil(){
        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array()); // Affiche la liste des clients dans la vue
    }
}