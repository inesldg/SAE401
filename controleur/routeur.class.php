<?php

require "controleur/ctlPages.class.php";
require "controleur/ctlEscapeGames.class.php";
require "controleur/ctlCompte.class.php";
require "controleur/ctlInscription.class.php";
require "controleur/ctlConnexion.class.php";
require "controleur/ctlUtilisateurs.class.php";
require "controleur/ctlAjoutEscape.class.php";


require "controleur/ctlAdmin.class.php";

class routeur
{
    private $ctlPages;
    private $ctlEscapeGames;
    private $ctlCompte;
    private $ctlInscription;
    private $ctlConnexion;
    private $ctlUtilisateurs;
    private $ctlAjoutEscape;
    private $ctlAdmin;



    public function __construct()
    {
        $this->ctlPages = new ctlPages();
        $this->ctlEscapeGames = new ctlEscapeGames();
        $this->ctlCompte = new ctlCompte();
        $this->ctlInscription = new ctlInscription();
        $this->ctlConnexion = new ctlConnexion();
        $this->ctlUtilisateurs = new ctlUtilisateurs();
        $this->ctlAjoutEscape = new ctlAjoutEscape();
        $this->ctlAdmin = new ctlAdmin();
    }

    public function routerRequete()
    {
        try {

            if (isset($_SESSION["acces"])) {

                $mail = $_SESSION["acces"];
                $acces = $this->ctlCompte->getAcces($mail);
                $id = $this->ctlCompte->getId($mail);

                if (isset($_GET["action"])) {
                    switch ($_GET["action"]) {
                        case "deconnexion":
                            $this->ctlCompte->deconnexion();
                            break;
                        case "accueil":
                            $this->ctlEscapeGames->accueil($acces);
                            break;
                        case "escapeGames":
                            $this->ctlEscapeGames->pageEscapeGames();
                            break;
                        case "game":
                            $this->ctlEscapeGames->pageGame($_GET['idEscapeGame']);
                            break;
                        case "propos":
                            $this->ctlPages->pagePropos();
                            break;
                        case "confirmation":
                            $this->ctlPages->pageConfirmation();
                            break;
                        case "compte":
                            $this->ctlCompte->infosCompte($message = "", $mail);
                            break;
                        case "modifInfos":
                            if (isset($_POST['mdp']))
                                $this->ctlCompte->modifInfos($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mdp'], ancienMail: $mail);
                            else
                                $this->ctlCompte->infosCompte($message = "<span>Veuillez entrer votre mot de passe si vous souhaitez modifier vos informations</span>", $mail);
                            break;


                        /********** Pages administrateur **********/
                        case "dash":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else
                                $this->ctlAdmin->afficherDash();
                            break;
                        case "utilisateurs":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else
                                $this->ctlUtilisateurs->afficherUtilisateurs($message = "", $mail);
                            break;
                        case "pageAjoutEscape":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else
                                $this->ctlPages->pageAjoutEscape($message = "");
                            break;
                        case "ajoutEscape":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else {
                                if (isset($_POST['nom'], $_POST['description'], $_POST['lieu'], $_POST['duree'], $_POST['pers_min'], $_POST['pers_max']))
                                    $this->ctlAjoutEscape->ajoutEscape($_POST['nom'], $_POST['description'], $_POST['lieu'], $_POST['duree'], $_POST['pers_min'], $_POST['pers_max']);
                                else
                                    $this->ctlPages->pageAjoutEscape($message = "<span>Veuillez remplir tout les champs</span>");
                            }
                            break;
                        case "changementAcces":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else {
                                if (isset($_POST['niveauAcces']) && $_POST['niveauAcces'] !== 0)
                                    if (isset($_GET['id']))
                                        $this->ctlUtilisateurs->changementAcces($_POST['niveauAcces'], $_GET['id'], $mail);
                                    else
                                        $this->ctlUtilisateurs->afficherUtilisateurs($message = "<span>Veuillez choisir un niveau d'acces si vous souhaitez le modifier sur cet utilisateur</span>", $mail);
                                else
                                    $this->ctlUtilisateurs->afficherUtilisateurs($message = "<span>Veuillez choisir un niveau d'acces si vous souhaitez modifier cet utilisateur</span>", $mail);
                            }
                            break;
                        default:
                            throw new Exception("Action non valide");
                    }
                } else
                    $this->ctlEscapeGames->accueil($acces);
            }


            /********** Pages non connectés **********/ else {

                if (isset($_GET["action"])) {

                    switch ($_GET["action"]) {
                        case "pageInscription":
                            $this->ctlPages->pageInscription($message = "");
                            break;
                        case "propos":
                            $this->ctlPages->pagePropos();
                            break;

                        case "confirmation":
                            $this->ctlPages->pageConfirmation();
                            break;

                            case "panier":
                            $this->ctlPages->pagePanier($message = "");
                            break;

                        case "pageConnexion":
                            $this->ctlPages->pageConnexion($message = "");
                            break;
                        case "inscription":
                            if (isset($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mdp'], $_POST['mdpConfirm'])) {
                                if (isset($_POST['phone']))
                                    $phone = $_POST['phone'];
                                else
                                    $phone = 'NULL';
                                $this->ctlInscription->inscription($_POST['nom'], $_POST['prenom'], $_POST['mail'], $phone, $_POST['mdp'], $_POST['mdpConfirm']);
                            } else
                                $this->ctlPages->pageInscription($message = "<span>Veuillez remplir tout les champs</span>");
                            break;
                        case "connexion":
                            if (isset($_POST['mail'], $_POST['mdp']))
                                $this->ctlConnexion->connexion($_POST['mail'], $_POST['mdp']);
                            else
                                $this->ctlPages->pageConnexion($message = "<span>Veuillez remplir tout les champs</span>");
                            break;
                        case "accueil":
                            $this->ctlEscapeGames->accueil($acces = "0");
                            break;
                        case "escapeGames":
                            $this->ctlEscapeGames->pageEscapeGames();
                            break;
                        case "game":
                            $this->ctlEscapeGames->pageGame($_GET['idEscapeGame']);
                            break;

                        default:
                            throw new Exception("Action non valide");
                    }
                } else
                    $this->ctlEscapeGames->accueil($acces = "0");

            }
        } catch (Exception $e) {
            $this->ctlPages->erreur($e->getMessage());
        }
    }
}
