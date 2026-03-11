<?php

// Controleur pour l'ajout d'un escape game en tant qu'Admin
require_once "modele/ajoutEscape.class.php";
require_once "vue/vue.class.php";

class ctlAjoutEscape
{
    // Instance de la classe ajoutEscape pour interagir avec la base
    private $ajoutEscape;

    // Constructeur
    // Crée une instance de la classe ajoutEscape
    public function __construct()
    {
        $this->ajoutEscape = new ajoutEscape();
    }

    // Méthode pour ajouter un escape game
    public function ajoutEscape($nom, $description, $lieu, $duree, $min, $max)
    {
        $vue = new vue("AjoutEscape"); // Instancie la vue appropriée

        // Validation des données
        if ($duree < 0) {
            $vue->afficher(array("message" => "<span>La durée doit être supérieure à 0</span>"));
            return;
        }

        // Vérifie que le nombre minimum de joueurs n'est pas supérieur au maximum
        if ($min > $max) {
            $vue->afficher(array("message" => "<span>Le nombre de personnes minimum ne peut pas être plus grand que le maximum</span>"));
            return;
        }

         // Insertion en base de données
        $id_escape = $this->ajoutEscape->ajouterEscape($nom, $description, $lieu, $duree, $min, $max);

        // Upload de la photo associée
        if (isset($_FILES['photoEscape']) && $_FILES['photoEscape']['error'] === 0 && $id_escape) {
            $fichier = $_FILES['photoEscape']; // récupère le fichier uploadé
            $dossier = "photos_escapes/"; // dossier de destination

            // Crée le dossier s'il n'existe pas
            if (!is_dir($dossier))
                mkdir($dossier, 0755, true);

            // Récupère l'extension du fichier (jpg, png, etc.)
            $extension = pathinfo($fichier['name'], PATHINFO_EXTENSION); // récupère l'extension

            // Nom du fichier = ID de l'escape + extension
            $photoNom = $id_escape . "." . $extension;
            $cheminComplet = $dossier . $photoNom;

            // Déplace le fichier depuis le dossier temporaire vers le dossier final
            move_uploaded_file($fichier['tmp_name'], $cheminComplet);
        }

        // Redirection vers la liste après ajout
        header("Location: index.php?action=pageAjoutEscape");
        exit;
    }

    // Méthode pour afficher tous les escapes games
    public function afficherEscapes()
    {
        $vue = new vue("AjoutEscape");

        $escapes = $this->ajoutEscape->getAllEscapes();

        // Affiche la vue avec la liste et un message vide
        $vue->afficher([
            "escapes" => $escapes,
            "message" => ""
        ]);
    }

    // Méthode pour supprimer un escape game
    public function supprimerEscape($id)
    {
        $id_escape = intval($id); // sécurité
        $this->ajoutEscape->supprimerEscape($id_escape); 
        header("Location: index.php?action=ajoutEscape");
        exit;
    }
}
