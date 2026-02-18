<?php
require_once "vue/vue.class.php";

class ctlAdmin {

    private $ajoutEscape;

    public function __construct(){
        
    }

    public function afficherDash(){
        $vue = new vue("Dashboard"); // Instancie la vue appropriée

        $vue->afficher([]);
    }
}