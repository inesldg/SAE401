<?php
require_once "modele/dashTarif.class.php";
require_once "vue/vue.class.php";

class ctlDashTarif
{
    // Instance de la classe DashTarif
    private $dashTarif;

    // Constructeur
    // Crée une instance de DashTarif pour pouvoir utiliser ses méthodes
    public function __construct()
    {
        $this->dashTarif = new DashTarif();
    }

    // Affiche le dashboard des tarifs pour tous les escape games
    public function afficherDashboard()
    {
        $escapes = $this->dashTarif->getEscapes();  // Instancie la vue spécifique aux tarifs

        $vue = new Vue("DashboardTarif");   // Passe la liste des escapes à la vue
        $vue->afficher(['escapes' => $escapes, 'dashTarif' => $this->dashTarif]);   // Passe l'instance pour utiliser les méthodes dans la vue
    }

    // Enregistre ou met à jour les tarifs soumis via le formulaire
    public function enregistrerTarifs()
    {
        // Vérifie que le formulaire a été soumis et contient les données attendues
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_escape'], $_POST['prix']) && is_array($_POST['prix'])) {
            $id_escape = intval($_POST['id_escape']);
            $prixData = $_POST['prix'];

            // Parcourt chaque tarif pour le sauvegarder
            foreach ($prixData as $effectif => $prix) {
                $effectif = intval($effectif);
                $prix = floatval($prix); // si décimal possible
                $this->dashTarif->saveTarif($id_escape, $effectif, $prix);
            }

            // Redirection après enregistrement
            header("Location: index.php?action=dashTarif&success=1");
            exit;
        } else {
            // Redirection avec message d'erreur si les données ne sont pas correctes
            header("Location: index.php?action=dashTarif&error=1");
            exit;
        }
    }
}