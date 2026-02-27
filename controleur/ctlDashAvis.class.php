<?php
require_once "modele/dashAvis.class.php";
require_once "vue/vue.class.php";

class ctlDashAvis
{

    private $dashAvis;

    public function __construct()
    {
        $this->dashAvis = new dashAvis();
    }

    public function afficherDashAvis(){
        $vue = new vue("DashAvis"); // Instancie la vue appropriée

        $vue->afficher([]);
    }
}
