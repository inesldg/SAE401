<?php
require_once "vue/vue.class.php";


class ctlConfirmation
{

    public function pageConfirmation()
    {
        $styleCustom = '<link rel="stylesheet" href="styles/confirmationAchat.css">';
        $vue = new vue("Confirmation");
        $vue->afficher(array("style" => $styleCustom)); // On passe le style ici
    }

    public function accueil($acces)
    {
        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array("acces" => $acces));
    }

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

}