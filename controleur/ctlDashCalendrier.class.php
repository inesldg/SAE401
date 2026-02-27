<?php
require_once "modele/dashCalendrier.class.php";
require_once "vue/vue.class.php";

class ctlDashCalendrier
{

    private $dashCalendrier;

    public function __construct()
    {
        $this->dashCalendrier = new dashCalendrier();
    }

    public function afficherDashCalendrier(){
        $vue = new vue("DashCalendrier"); // Instancie la vue appropriée

        $vue->afficher([]);
    }
}
