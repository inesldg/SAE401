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

    public function paiement($nom, $prenom, $mail, $adresse, $numCarte, $moisExpiration, $anneeExpiration, $numCarteDos, $jourReserve, $horaireReserve, $nbrPersonneReserve, $idEscapeReserve, $montant)
    {
        // temporaire
        if(isset($nom, $prenom, $mail, $adresse, $numCarte, $moisExpiration, $anneeExpiration, $numCarteDos, $jourReserve, $horaireReserve, $nbrPersonneReserve, $idEscapeReserve, $montant))
            $montant = 0;
        // --------

        $numCarte = str_replace(' ', '', $numCarte);
        $numCarteDos = str_replace(' ', '', $numCarteDos);
        $moisExpiration = str_replace(' ', '', $moisExpiration);
        $anneeExpiration = str_replace(' ', '', $anneeExpiration);

        $message = '';
        if (!is_numeric($numCarte) || strlen($numCarte) !== 16 || is_float($numCarte))
            $message = "<span>Le numéro de la carte doit être un nombre valide</span><br>";
        if (!is_numeric($numCarteDos) || strlen($numCarteDos) !== 3 || is_float($numCarteDos))
            $message .= "<span>Le numéro de sécurité de la carte doit être un nombre de 3 chiffres valide</span><br>";
        if (!is_numeric($moisExpiration) || $moisExpiration > 12 || $moisExpiration < 1 || is_float($moisExpiration))
            $message .= "<span>Le mois d'expiration doit être un nombre valide entre 1 et 12</span><br>";
        if (!is_numeric($anneeExpiration) || strlen($anneeExpiration) !== 2 || is_float($anneeExpiration))
            $message .= "<span>L'année d'expiration doit être un nombre valide sur 2 chiffres</span>";
        

        if (empty($message)){
            header("location: index.php?action=confirmation");
        }
        else
        {
            $this->pagePanier($jourReserve, $horaireReserve, $nbrPersonneReserve, $idEscapeReserve, $message);
        }
    }


}
