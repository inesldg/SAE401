<?php
require_once "modele/database.class.php";

class ajoutEscape extends database
{

    public function ajouterEscape($nom, $description, $lieu, $duree, $min, $max)
    {
        // Insertion de l'escape dans la table escape
        $req = 'INSERT INTO `escape` (`id_escape`, `nom`, `description`, `lieu`, `duree`, `nbr_pers_min`, `nbr_pers_max`) 
                VALUES (NULL, ?, ?, ?, ?, ?, ?);';
        $this->execReqPrep($req, [$nom, $description, $lieu, $duree, $min, $max]);

        // Récupère l'ID du dernier escape ajouté
        // On sélectionne l'escape qui correspond au nom, lieu et durée, trié par id_escape décroissant pour obtenir le dernier inséré
        $reqId = "SELECT id_escape FROM escape WHERE nom = ? AND lieu = ? AND duree = ? ORDER BY id_escape DESC LIMIT 1";
        $result = $this->execReqPrep($reqId, [$nom, $lieu, $duree]);

        // Retourne l'ID si trouvé, sinon null
        return $result[0]['id_escape'] ?? null;
    }

    public function getAllEscapes()
    {
        $req = "SELECT * FROM escape ORDER BY id_escape DESC";
        return $this->execReq($req);
    }

    // public function supprimerEscape($id_escape)
    // {
    //     $id_escape = intval($id_escape); // sécurité

    //     // Supprimer l'escape de la BDD
    //     $req = "DELETE FROM escape WHERE id_escape = ?";
    //     $this->execReqPrep($req, [$id_escape]);

    //     // Supprimer la photo si elle existe
    //     $photoJpg = "photos_escapes/" . $id_escape . ".jpg";
    //     $photoPng = "photos_escapes/" . $id_escape . ".png"; // au cas où tu as d'autres extensions
    //     if (file_exists($photoJpg)) unlink($photoJpg);
    //     if (file_exists($photoPng)) unlink($photoPng);
    // }
}
