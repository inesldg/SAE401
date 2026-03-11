<?php
require_once "modele/dashAvis.class.php";
require_once "vue/vue.class.php";

class ctlDashAvis
{
    // Instance du modèle dashAvis
    private $dashAvis;

    // Constructeur
    // Crée une instance du modèle dashAvis
    public function __construct()
    {
        $this->dashAvis = new dashAvis();
    }

    // Affiche le tableau de bord des avis
    // - Récupère tous les avis avec les informations utilisateurs et escape
    // - Passe les données à la vue DashAvis
    public function afficherDashAvis()
    {
        // Récupère tous les avis depuis le modèle
        $avis = $this->dashAvis->getAvis();

        // Instancie la vue pour le dashboard avis
        $vue = new vue("DashAvis");
        // Passe les avis à la vue pour affichage
        $vue->afficher([
            "avis" => $avis
        ]);
    }

    // Supprime un avis
    // - Vérifie si l'ID de l'avis est fourni via POST
    // - Supprime l'avis correspondant dans la base de données
    // - Redirige vers le tableau de bord des avis
    public function supprimer()
    {
        // Vérifie si l'ID de l'avis à supprimer est fourni
        if (isset($_POST['id_avis'])) {
            // Appelle la méthode du modèle pour supprimer l'avis
            $this->dashAvis->supprimerAvis($_POST['id_avis']);
        }

         // Redirection vers le dashboard des avis pour rafraîchir la page
        header("Location: index.php?action=dashAvis");
        exit();
    }
}