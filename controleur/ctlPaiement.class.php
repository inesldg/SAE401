<?php
require_once "modele/paiement.class.php";
require_once "vue/vue.class.php";

class ctlPaiement {

    private $paiement;

    public function __construct(){
        $this->paiement = new paiement();
    }

    public function pagePaiement($message){
        $vue = new vue("PagePaiement"); // Instancie la vue appropriée
        $vue->afficher(array("message" => $message)); // Affiche la liste des clients dans la vue
    }

    public function validationReservations($id, $idEscapeGame, $idPrixReservation, $date, $idReservation){
        $this->paiement->validationReservations($id, $idEscapeGame, $idPrixReservation, $date, $idReservation);
    }

    public function paiement($id)
    {
        $objetsPanier = $this->paiement->objetsPanier($id);
        $reservationsPanier = $this->paiement->reservationsPanier($id);

        extract($_POST);

        $numCarte = str_replace(' ', '', $numCarte);
        $numCarteDos = str_replace(' ', '', $numCarteDos);
        $moisExpiration = str_replace(' ', '', $moisExpiration);
        $anneeExpiration = str_replace(' ', '', $anneeExpiration);

        $message = '';
        if (!is_numeric($numCarte) || strlen($numCarte) !== 16 || is_float($numCarte))
            $message = "<span>Le numéro de la carte doit être un nombre valide</span><br>";
        if (!is_numeric($numCarteDos) || strlen($numCarteDos) !== 3 || is_float($numCarteDos))
            $message .= "<span>Le numéro de sécurité de la carte doit être un nombre valide</span><br>";
        if (!is_numeric($moisExpiration) || $moisExpiration > 12 || $moisExpiration < 1 || is_float($moisExpiration))
            $message .= "<span>Le mois d'expiration doit être un nombre valide entre 1 et 12</span><br>";
        if (!is_numeric($anneeExpiration) || strlen($anneeExpiration) !== 2 || is_float($anneeExpiration))
            $message .= "<span>L'année d'expiration doit être un nombre valide sur 2 chiffres</span>";

        if (empty($message)){

            if ($objetsPanier != 0 OR $reservationsPanier != 0){
                if ($objetsPanier != 0){
                    foreach ($objetsPanier as $obj){
                        $idObjet = $obj['id_objet'];
                        $idPanier = $obj['id_panier'];
                        $this->paiement->validationObjets($id, $idObjet, $idPanier);
                    }
                }
                if ($reservationsPanier != 0) {
                    foreach ($reservationsPanier as $reserv){
                        $idEscapeGame = $reserv['id_escape_game'];
                        $idPrixReservation = $reserv['id_prix_reservation'];
                        $date = $reserv['date'];
                        $idReservation = $reserv['id_reservation'];
                        $this->paiement->validationReservations($id, $idEscapeGame, $idPrixReservation, $date, $idReservation);
                    }
                }
                header("location: index.php?action=panier");
            }
            else{
                $this->pagePaiement("<span id='erreurPanierVide'>Aucun élément dans le panier, veuillez retournez à l'accueil ou remplir votre panier</span>.");
            }
        }
        else
        {
            $this->pagePaiement($message);
        }
    }
}