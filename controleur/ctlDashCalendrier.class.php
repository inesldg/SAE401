<?php
require_once "modele/dashCalendrier.class.php";
require_once "vue/vue.class.php";

class ctlDashCalendrier
{
// Instance du modèle dashCalendrier
    private $dashCalendrier;

    // Constructeur
    // Crée une instance du modèle dashCalendrier
    public function __construct()
    {
        $this->dashCalendrier = new dashCalendrier();
    }

    // Affiche le tableau de bord calendrier
    // - Récupère la date et l'escape game sélectionné
    // - Supprime une réservation si demandé
    // - Récupère toutes les réservations et escapes
    // - Passe les données à la vue
    public function afficherDashCalendrier()
    {
        // Récupère la date depuis l'URL ou utilise la date actuelle
        $date = $_GET['date'] ?? date('Y-m-d');
         // Récupère l'ID de l'escape game sélectionné, si fourni
        $escape = $_GET['escape'] ?? null;

        // Gestion de la suppression d'une réservation
        if (isset($_GET['supprimer'])) {
            $id = $_GET['supprimer'];

            // Supprimer la réservation dans la BDD
            $this->dashCalendrier->supprimerReservation($id);

            // Redirection vers le calendrier pour rafraîchir la page
            header("Location: index.php?action=dashCalendrier");
            exit;
        }

        // Récupère tous les escape games pour le filtre
        $escapes = $this->dashCalendrier->getEscapes();
        // Récupère les réservations correspondant à la date et à l'escape sélectionné
        $reservations = $this->dashCalendrier->getReservationsByDate($date, $escape);

        $vue = new vue("DashCalendrier"); // Instancie la vue calendrier
        // Passe les données à la vue pour affichage
        $vue->afficher([
            "escapes" => $escapes,
            "reservations" => $reservations,
            "date" => $date,
            "escapeSelected" => $escape
        ]);
    }
}
