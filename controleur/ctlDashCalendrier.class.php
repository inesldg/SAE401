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

    public function afficherDashCalendrier()
    {
        $date = $_GET['date'] ?? date('Y-m-d');
        $escape = $_GET['escape'] ?? null;

        // SUPPRESSION
        if (isset($_GET['supprimer'])) {
            $id = $_GET['supprimer'];

            // Supprimer la réservation dans la BDD
            $this->dashCalendrier->supprimerReservation($id);

            // Rediriger sans envoyer de mail
            header("Location: index.php?action=dashCalendrier");
            exit;
        }

        $escapes = $this->dashCalendrier->getEscapes();
        $reservations = $this->dashCalendrier->getReservationsByDate($date, $escape);

        $vue = new vue("DashCalendrier");
        $vue->afficher([
            "escapes" => $escapes,
            "reservations" => $reservations,
            "date" => $date,
            "escapeSelected" => $escape
        ]);
    }
}
