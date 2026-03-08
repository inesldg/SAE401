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
    $reservations = $this->admin->getReservations();
    $utilisateurs = $this->admin->getUtilisateurs();
    $escapes = $this->admin->getEscapes();
    $noteMoyenne = $this->admin->getNoteMoyenne();
    $occupation = $this->admin->getTauxOccupation();

    $mois = date("m");
    $annee = date("Y");

    $revenus = $this->admin->getRevenus($mois, $annee);

    // AJOUT
    $reservationsRecente = $this->admin->getReservationsRecentes();

    $vue = new vue("Dashboard");

    $vue->afficher(array(
        "reservations" => $reservations['total'],
        "utilisateurs" => $utilisateurs['total'],
        "escapes" => $escapes['total'],
        "revenus" => $revenus['revenus'],
        "noteMoyenne" => $noteMoyenne['moyenne'],
        "occupation" => $occupation['totalPers'],

        // AJOUT
        "reservationsRecente" => $reservationsRecente
    ));
}
}
