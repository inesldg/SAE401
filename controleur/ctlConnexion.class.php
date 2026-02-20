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

        if ($mdpUtilisateur !== 0) {
            if (password_verify($mdp, $mdpUtilisateur[0]['mdp'])) {
                $_SESSION["acces"] = $mail;

                if (isset($_COOKIE["page"]))
                    header("Location: index.php" . $_COOKIE["page"]);
                else
                    header("location: index.php");
            } else
                $vue->afficher(array("message" => "<span>Mot de passe incorrect</span>"));
        } else
            $vue->afficher(array("message" => "<span>Email incorrect</span>"));
    }
}
