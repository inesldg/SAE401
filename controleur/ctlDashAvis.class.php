<?php
require_once "modele/dashAvis.class.php";
require_once "vue/vue.class.php";

class ctlDashAvis
{
    private $dashAvis;

    public function __construct()
    {
        $this->dashAvis = new dashAvis();
    }

    public function afficherDashAvis()
    {
        $avis = $this->dashAvis->getAvis();

        $vue = new vue("DashAvis");
        $vue->afficher([
            "avis" => $avis
        ]);
    }

    public function supprimer()
    {
        if (isset($_POST['id_avis'])) {
            $this->dashAvis->supprimerAvis($_POST['id_avis']);
        }

        header("Location: index.php?action=dashAvis");
        exit();
    }
}