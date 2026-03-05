<?php
require_once "vue/vue.class.php";

class ctlPages
{

    public function erreur($message)
    {
        $vue = new vue("Erreur");
        $vue->afficher(array("message" => $message));
    }

    public function pageInscription($message)
    {
        $vue = new vue("Inscription");
        $vue->afficher(array("message" => $message));
    }

    public function pageConnexion($message)
    {
        $vue = new vue("Connexion");
        $vue->afficher(array("message" => $message));
    }

    public function pageAjoutEscape($message)
    {
        $vue = new vue("AjoutEscape");
        $vue->afficher(array("message" => $message));
    }

    public function pageConfirmation()
    {
        $vue = new vue("Confirmation");
        $vue->afficher(array());
    }

    public function pageContact()
    {
        $vue = new vue("Contact");
        $vue->afficher(array());
    }

    public function pagePropos()
    {
        $vue = new vue("Propos");
        $vue->afficher(array());
    }

    public function pagePanier($message)
    {
        $vue = new vue("panier");
        $vue->afficher(array("message" => $message));
    }

    public function pageLegal()
    {
        $vue = new vue("Legal");
        $vue->afficher(array());
    }
}