<?php

// Modèle pour gérer les escapes côté administrateur
// - ajouter un escape
// - lister tous les escapes
// - supprimer un escape et sa photo

require_once "modele/database.class.php";

class ajoutEscape extends database
{
    // Ajoute un escape dans la base de données
    // et renvoie son identifiant (id_escape)
    public function ajouterEscape($nom, $description, $lieu, $duree, $min, $max)
    {
        $req = 'INSERT INTO escape (nom, description, lieu, duree, nbr_pers_min, nbr_pers_max)
                VALUES (?, ?, ?, ?, ?, ?)'; // chaque ? sera remplacé par la valeur dans le même ordre (nom, desc, lieu, durée, nb pers min et max)

        $this->execReqPrep($req, array($nom, $description, $lieu, $duree, $min, $max));

        // 2) On demande à MySQL l'id du dernier enregistrement créé
        // (c'est l'id_escape du nouvel escape)
        $lastId = $this->getLastInsertId();

        // On renvoie l'id sous forme d'entier
        return intval($lastId);
    }

    // Retourne la liste de tous les escapes,
    // du plus récent (id le plus grand) au plus ancien
    public function getAllEscapes()
    {
        $req = "SELECT * FROM escape ORDER BY id_escape DESC";
        return $this->execReq($req);
    }

    // Supprime un escape dans la base
    // et supprime aussi sa photo sur le serveur si elle existe
    public function supprimerEscape($id_escape)
    {
        // On s'assure que l'id est bien un nombre
        $id_escape = intval($id_escape);

        // 1) On supprime l'escape dans la table escape
        $req = "DELETE FROM escape WHERE id_escape = ?";
        $this->execReqPrep($req, array($id_escape));

        // 2) On supprime les fichiers image éventuels
        $photoJpg = "photos_escapes/" . $id_escape . ".jpg";
        $photoPng = "photos_escapes/" . $id_escape . ".png";

        if (file_exists($photoJpg)) {
            unlink($photoJpg);
        }

        if (file_exists($photoPng)) {
            unlink($photoPng);
        }
    }
}
