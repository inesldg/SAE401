<?php
require_once "modele/inscription.class.php";
require_once "modele/compte.class.php";
require_once "vue/vue.class.php";

class ctlInscription
{

    private $inscription;
    private $compte;

    public function __construct()
    {
        $this->inscription = new inscription();
        $this->compte = new compte();
    }

    public function inscription($nom, $prenom, $mail, $phone, $mdp, $mdpConfirm)
    {
        $vue = new vue("pageSignUp"); // Instancie la vue appropriée

        $mailUtilisateur = $this->compte->getMail($mail);

        if ($mailUtilisateur == NULL) {
            if ($mdp == $mdpConfirm) {
                $mdpCrypte = password_hash($mdp, PASSWORD_DEFAULT);
                $this->inscription->inscrire($nom, $prenom, $mail, $phone, $mdpCrypte);
                $_SESSION["acces"] = $mail;
                if (isset($_COOKIE["page"])) {
                    header("Location: index.php" . $_COOKIE["page"]);
                } else {
                    header("location: index.php");
                }/* penser a mettre une durée */
            } else
                $vue->afficher(array("message" => "<span>Les mots de passe ne correspondent pas, veuillez réessayer</span>"));
        } else
            $vue->afficher(array("message" => "<span>Cet email est déjà associé à un compte</span>"));
    }
}
