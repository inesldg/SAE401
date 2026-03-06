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

    public function pagePanier($jour, $horaire, $nbrPersonnes, $idEscape, $message)
    {
        $panier = $this->panier->affichagePanier($idEscape);

        $vue = new vue("Panier"); // Instancie la vue appropriée
        $vue->afficher(array("jour" => $jour, "horaire" => $horaire, "nbrPersonnes" => $nbrPersonnes, "panier" => $panier, "message" => $message));
    }


}
