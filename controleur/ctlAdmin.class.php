<?php

// Controleur pour afficher le tableau de bord pour l'admin

require_once "modele/admin.class.php";
require_once "vue/vue.class.php";

class ctlAdmin
{

    private $admin;

    public function __construct()
    {
        $this->admin = new admin();
    }

    public function afficherDash()
    {
        // On appelle différentes fonctions du modèle pour récupérer les données de la base
        $reservations = $this->admin->getReservations();
        $utilisateurs = $this->admin->getUtilisateurs();
        $escapes = $this->admin->getEscapes();
        $noteMoyenne = $this->admin->getNoteMoyenne();
        $occupation = $this->admin->getTauxOccupation();

        $mois = date("m");     // mois courant
        $annee = date("Y");    // année courante

        $revenus = $this->admin->getRevenus($mois, $annee);


        $vue = new vue("Dashboard");

        // On envoie les données à la vue sous forme de tableau associatif
        // La vue pourra ensuite afficher ces informations
        $vue->afficher(array(
            "reservations" => $reservations['total'],
            "utilisateurs" => $utilisateurs['total'],
            "escapes" => $escapes['total'],
            "revenus" => $revenus['revenus'],
            "noteMoyenne" => $noteMoyenne['moyenne'],
            "occupation" => $occupation['totalPers'],
        ));
    }
}
