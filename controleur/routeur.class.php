<?php

require "controleur/ctlPages.class.php";
require "controleur/ctlEscapeGames.class.php";
require "controleur/ctlCompte.class.php";

class routeur {
    private $ctlPages;
    private $ctlEscapeGames;
    private $ctlCompte;


    public function __construct(){
        $this->ctlPages = new ctlPages();
        $this->ctlEscapeGames = new ctlEscapeGames();
        $this->ctlCompte = new ctlCompte();
    }

    public function routerRequete(){
        try {

            if (isset($_SESSION["acces"])) {

                $mail = $_SESSION["acces"];
                $acces = $this->ctlCompte->getAcces($mail);
                    
                    if (isset($_GET["action"])) {
                        switch($_GET["action"]){
                            case "deconnexion" :
                                $this->ctlCompte->deconnexion();
                            break;
                            case "accueil" :
                                $this->ctlPages->accueil($acces);
                            break;
                            case "escapeGames" :
                                $this->ctlEscapeGames->pageEscapeGames();
                            break;
                            default :
                                throw new Exception("Action non valide");
                        }
                    }
                    else
                        $this->ctlPages->accueil($acces);
            }
        
            else {

                if (isset($_GET["action"])) {
        
                    switch($_GET["action"]){
                        case "pageInscription" :
                            $this->ctlPages->pageInscription($message="");
                        break;
                        case "pageConnexion" :
                            $this->ctlPages->pageConnexion($message="");
                        break;
                        // case "signUp" :
                        //     if (isset($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mdp'], $_POST['mdpConfirm']))
                        //         $this->ctlSignUp->signUp($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mdp'], $_POST['mdpConfirm']);
                        //     else
                        //         $this->ctlPages->pageSignUp($message="<span id='erreurRemplirChamps'>Veuillez remplir tout les champs</span>");
                        // break;
                        // case "login" :
                        //     if (isset($_POST['mail'], $_POST['mdp']))
                        //         $this->ctlLogin->login($_POST['mail'], $_POST['mdp']);
                        //     else
                        //         $this->ctlPages->pageLogin($message="<span id='erreurRemplirChamps'>Veuillez remplir tout les champs</span>");
                        // break;
                        case "accueil" :
                            $this->ctlPages->accueil($acces="0");
                        break;
                        case "escapeGames" :
                            $this->ctlEscapeGames->pageEscapeGames();
                        break;

                        default :
                            throw new Exception("Action non valide");
                    }
                }
                else
                    $this->ctlPages->accueil($acces="0");
                
            }

        } catch (Exception $e) {
            $this->ctlPages->erreur($e->getMessage());
        }
    }
}