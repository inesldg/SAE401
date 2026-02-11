<?php

require_once "modele/compte.class.php";
require_once "vue/vue.class.php";

class ctlCompte {

    public function getAcces($acces)
    {
        $accesUser = new compte();
        $mail = $_SESSION["acces"];
        $acces = $accesUser->getAcces($mail);
        return $acces;
    }

    public function deconnexion(){
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
        header("Location: index.php");
    }

}