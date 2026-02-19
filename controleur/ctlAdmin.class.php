<?php

// A VERIFIERRRRRRR SVP

require_once "modele/admin.class.php";
require_once "vue/vue.class.php";

class ctlAdmin
{

    private $admin;

    public function __construct()
    {
        $this->admin = new admin();
    }

    // public function afficherDash(){
    //     $vue = new vue("Dashboard"); // Instancie la vue appropriée

    //     $vue->afficher([]);
    // }

    public function afficherDash()
    {

        $reservations = $this->admin->getReservations();
        $utilisateurs = $this->admin->getUtilisateurs();
        $escapes = $this->admin->getEscapes();
        $noteMoyenne = $this->admin->getNoteMoyenne();
        $occupation = $this->admin->getTauxOccupation();

        $mois = date("m");     // mois courant
        $annee = date("Y");    // année courante

        $revenus = $this->admin->getRevenus($mois, $annee);
        // $reservationsListe = $this->admin->getListeReservations();


        $vue = new vue("Dashboard");

        $vue->afficher(array(
            "reservations" => $reservations['total'],
            "utilisateurs" => $utilisateurs['total'],
            "escapes" => $escapes['total'],
            "revenus" => $revenus['revenus'],
            "noteMoyenne" => $noteMoyenne['moyenne'],
            "occupation" => $occupation['totalPers'],
            // "listeReservations" => $reservationsListe
        ));
    }
}
