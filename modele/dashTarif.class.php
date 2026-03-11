<?php
require_once "modele/database.class.php";

class DashTarif extends database
{
    // Récupère tous les escape games
    public function getEscapes()
    {
        $res = $this->execReq("SELECT * FROM escape ORDER BY id_escape DESC");
        return $res;
    }

    // Récupère les tarifs d'un escape game donné
    public function getTarifsByEscape($id_escape)
    {
        $res = $this->execReqPrep(
            "SELECT * FROM tarif WHERE id_escape = :id_escape ORDER BY effectif ASC",
            [":id_escape" => intval($id_escape)]
        );
        return $res;
    }

    // Enregistre ou met à jour un tarif
    public function saveTarif($id_escape, $effectif, $prix)
    {
        $existant = $this->execReqPrep(
            "SELECT id_tarif FROM tarif WHERE id_escape = :id_escape AND effectif = :effectif",
            [
                ":id_escape" => $id_escape,
                ":effectif" => $effectif
            ]
        );

        if (count($existant) > 0) {
            $this->execReqPrep(
                "UPDATE tarif SET prix = :prix WHERE id_tarif = :id_tarif",
                [
                    ":prix" => $prix,
                    ":id_tarif" => $existant[0]['id_tarif']
                ]
            );
        } else {
            $this->execReqPrep(
                "INSERT INTO tarif (prix, effectif, id_escape) VALUES (:prix, :effectif, :id_escape)",
                [
                    ":prix" => $prix,
                    ":effectif" => $effectif,
                    ":id_escape" => $id_escape
                ]
            );
        }
    }
}
