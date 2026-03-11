<?php
require_once "modele/dashTarif.class.php";
require_once "vue/vue.class.php";

class ctlDashTarif
{
    private $dashTarif;

    public function __construct()
    {
        $this->dashTarif = new DashTarif();
    }

    // Affiche le dashboard des tarifs
    public function afficherDashboard()
    {
        $escapes = $this->dashTarif->getEscapes(); // ← corrigé

        $vue = new Vue("DashboardTarif");
        $vue->afficher(['escapes' => $escapes, 'dashTarif' => $this->dashTarif]);
    }

    // Enregistre ou met à jour les tarifs soumis via le formulaire
    public function enregistrerTarifs()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_escape'], $_POST['prix']) && is_array($_POST['prix'])) {
            $id_escape = intval($_POST['id_escape']);
            $prixData = $_POST['prix'];

            foreach ($prixData as $effectif => $prix) {
                $effectif = intval($effectif);
                $prix = floatval($prix); // si décimal possible
                $this->dashTarif->saveTarif($id_escape, $effectif, $prix);
            }

            // Redirection après enregistrement
            header("Location: index.php?action=dashTarif&success=1");
            exit;
        } else {
            header("Location: index.php?action=dashTarif&error=1");
            exit;
        }
    }
}