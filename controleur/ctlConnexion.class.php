<?php
require_once "modele/connexion.class.php";
require_once "vue/vue.class.php";

class ctlConnexion
{

    private $connexion;

    public function __construct()
    {
        $this->connexion = new connexion();
    }

    function connexion($mail, $mdp)
    {
        $vue = new vue("Connexion"); // Instancie la vue appropriée

        // 1 : Vérifier que le mail existe dans la BDD
        // 2 : Récupérer le mdp correspondant au mail dans la BDD
        // 3 : Vérification : Est ce que $mdp est égal au mot de passe récupéré dans la BDD
        $mdpUtilisateur = $this->connexion->getMdp($mail);

        if (empty($mdpUtilisateur) || !isset($mdpUtilisateur[0]['mdp'])) {
            $vue->afficher(array("message" => "<span>Email incorrect</span>"));
            return;
        }

        if (password_verify($mdp, $mdpUtilisateur[0]['mdp'])) {
            $_SESSION["acces"] = $mail;

            if (isset($_COOKIE["page"]) && $_COOKIE["page"] !== '') {
                $retour = $_COOKIE["page"];
                setcookie('page', '', time() - 3600, '/');
                header("Location: index.php" . $retour);
            } else {
                header("Location: index.php");
            }
        } else {
            $vue->afficher(array("message" => "<span>Mot de passe incorrect</span>"));
        }
    }
}
