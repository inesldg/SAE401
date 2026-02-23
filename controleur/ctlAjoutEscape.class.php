<?php
require_once "modele/ajoutEscape.class.php";
require_once "vue/vue.class.php";

class ctlAjoutEscape
{

    private $ajoutEscape;

    public function __construct()
    {
        $this->ajoutEscape = new ajoutEscape();
    }

    public function ajoutEscape($nom, $description, $lieu, $duree, $min, $max)
    {
        $vue = new vue("AjoutEscape"); // Instancie la vue appropriée

        // Validation
        if ($duree < 0) {
            $vue->afficher(array("message" => "<span>La durée doit être supérieure à 0</span>"));
            return;
        }

        if ($min > $max) {
            $vue->afficher(array("message" => "<span>Le nombre de personnes minimum ne peut pas être plus grand que le maximum</span>"));
            return;
        }

        // Insertion en BDD
        $id_escape = $this->ajoutEscape->ajouterEscape($nom, $description, $lieu, $duree, $min, $max);

        // Upload de la photo
        if (isset($_FILES['photoEscape']) && $_FILES['photoEscape']['error'] === 0 && $id_escape) {
            $fichier = $_FILES['photoEscape']; // récupère le fichier uploadé
            $dossier = "photos_escapes/"; // dossier de destination

            // Crée le dossier s'il n'existe pas
            if (!is_dir($dossier)) mkdir($dossier, 0755, true);

            // Récupère l'extension du fichier (jpg, png, etc.)
            $extension = pathinfo($fichier['name'], PATHINFO_EXTENSION); // récupère l'extension

            // Nom du fichier = ID de l'escape + extension
            $photoNom = $id_escape . "." . $extension;
            $cheminComplet = $dossier . $photoNom;

            // Déplace le fichier depuis le dossier temporaire vers le dossier final
            move_uploaded_file($fichier['tmp_name'], $cheminComplet);
        }
    }

    public function afficherEscapes()
    {
        $vue = new vue("AjoutEscape");

        $escapes = $this->ajoutEscape->getAllEscapes();

        $vue->afficher([
            "escapes" => $escapes,
            "message" => ""
        ]);
    }

    public function supprimerEscape($id)
    {
        $id_escape = intval($id); // sécurité
        $this->ajoutEscape->supprimerEscape($id_escape); // ta méthode dans le modèle
        header("Location: index.php?action=ajoutEscape");; // retourne à la liste
        exit;
    }
}
