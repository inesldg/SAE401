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
        if (is_numeric($nbrPersonnes) == false);{
            $nbrPersonnes = explode("-", $nbrPersonnes);
            $nbrPersonnes = $nbrPersonnes[0];
        }

        $tarifs = $this->panier->getTarifs($idEscape, $nbrPersonnes);

        $dateReserve = implode("-", [$annee, $mois, $jour]);

        $dispo = $this->panier->verifierDispo($idEscape);
        
        $duree = ceil($dispo[0]['duree']/60);
        $heure = explode(':', $horaire);

        $horaireMin = implode(":", [floatval($heure[0]) - $duree, $heure[1], '00']);
        $horaireMax = implode(":", [floatval($heure[0]) + $duree, $heure[1], '00']);

        $verifHoraire = $this->panier->verifierHoraire($dateReserve, $horaireMin,$horaireMax, $idEscape);
        
        if(empty($verifHoraire)){
            $panier = $this->panier->affichagePanier($idEscape);

            $vue = new vue("Panier");
            $vue->afficher(array("jour" => $jour, "mois" => $mois, "annee" => $annee, "horaire" => $horaire, "nbrPersonnes" => $nbrPersonnes, "panier" => $panier, "tarifs" => $tarifs, "message" => $message));
        }
        else{
            throw new Exception('
                <span>Cette horaire n\'est plus disponible veuillez en choisir une autre</span>
                <a href="index.php?action=game&idEscapeGame=' . $idEscape . '" class="page-erreur__lien">
                    Retourner sur la page de réservation
                </a>
            ');
        }
        
    }

    public function paiement($nom, $prenom, $mail, $adresse, $numCarte, $moisExpiration, $anneeExpiration, $numCarteDos, $dateReserve, $horaireReserve, $nbrPersonneReserve, $idEscapeReserve, $montant, $idUtilisateur)
    {
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


        $dispo = $this->panier->verifierDispo($idEscapeReserve);
        
        $duree = ceil($dispo[0]['duree']/60);
        $heure = explode(':', $horaireReserve);

        $horaireMin = implode(":", [floatval($heure[0]) - $duree, $heure[1], '00']);
        $horaireMax = implode(":", [floatval($heure[0]) + $duree, $heure[1], '00']);

        $verifHoraire = $this->panier->verifierHoraire($dateReserve, $horaireMin,$horaireMax, $idEscapeReserve);

        if (empty($message)){
            if(empty($verifHoraire)){
                if($this->panier->validerReservation($dateReserve, $horaireReserve,     $nbrPersonneReserve, $idUtilisateur[0]['id_utilisateur'], $idEscapeReserve) === 'ok')
                    header("location: index.php?action=confirmation");
                else
                    throw new Exception('Une erreur est survenue lors de l\'enregistrement de votre réservation');
            }
            else{
                throw new Exception('
                    <span>Cette horaire n\'est plus disponible veuillez en choisir une autre</span>
                    <a href="index.php?action=game&idEscapeGame=' . $idEscapeReserve . '" class="page-erreur__lien">
                        Retourner sur la page de réservation
                    </a>
                ');
            }
        }
        else
        {
            $date = explode("-", $dateReserve);
            $this->pagePanier($date[2], $date[1], $date[0], $horaireReserve, $nbrPersonneReserve, $idEscapeReserve, $message);
        }
    }

}
