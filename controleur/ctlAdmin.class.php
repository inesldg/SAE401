<?php

// Controleur pour afficher le tableau de bord pour l'admin
require_once "modele/admin.class.php";
require_once "vue/vue.class.php";

class ctlAdmin
{
    // Instance de la classe admin pour interagir avec la base de données
    private $admin;

    // Constructeur
    // Crée une instance de la classe admin
    public function __construct()
    {
        $this->admin = new admin();
    }

    // Méthode pour afficher le tableau de bord
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

        // AJOUT : récupère les réservations récentes
        $reservationsRecente = $this->admin->getReservationsRecentes();

        // Création d'une instance de la vue "Dashboard"
        $vue = new vue("Dashboard");

        // Affichage de la vue avec les données passées dans un tableau associatif
        $vue->afficher(array(
            "reservations" => $reservations['total'],
            "utilisateurs" => $utilisateurs['total'],
            "escapes" => $escapes['total'],
            "revenus" => $revenus['revenus'],
            "noteMoyenne" => $noteMoyenne['moyenne'],
            "occupation" => $occupation['totalPers'],

            // AJOUT : réservations récentes pour le tableau ou les notifications
            "reservationsRecente" => $reservationsRecente
        ));
    }
}
