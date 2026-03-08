<?php
require_once "modele/panier.class.php";
require_once "vue/vue.class.php";

class ctlPanier
{

    private $panier;

    public function __construct()
    {
        $this->panier = new panier();
    }

    public function pagePanier($jour, $mois, $annee, $horaire, $nbrPersonnes, $idEscape, $message)
    {
        $panier = $this->panier->affichagePanier($idEscape);

        $vue = new vue("Panier");
        $vue->afficher(array("jour" => $jour, "mois" => $mois, "annee" => $annee, "horaire" => $horaire, "nbrPersonnes" => $nbrPersonnes, "panier" => $panier, "message" => $message));
    }


}
