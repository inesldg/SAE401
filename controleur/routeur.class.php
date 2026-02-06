<?php

require "controleur/ctlPages.class.php";
require "controleur/ctlEscapeGames.class.php";

class routeur {
    private $ctlPages;
    private $ctlEscapeGames;


    public function __construct(){
        $this->ctlPages = new ctlPages();
        $this->ctlEscapeGames = new ctlEscapeGames();
    }

    public function routerRequete(){
        try {

            // if (isset($_SESSION["acces"])) {
                    
            //         if (isset($_GET["action"])) {
            //             switch($_GET["action"]){
            //                 default :
            //                     throw new Exception("Action non valide");
            //             }
            //         }
            //         else
            //             $this->ctlPages->accueil();
            // }
        
            // else {

                if (isset($_GET["action"])) {
        
                    switch($_GET["action"]){
                        case "accueil" :
                            $this->ctlPages->accueil();
                        break;
                        case "escapeGames" :
                            $this->ctlEscapeGames->pageEscapeGames();
                        break;

                        default :
                            throw new Exception("Action non valide");
                    }
                }
                else
                    $this->ctlPages->accueil();
                
            // }

        } catch (Exception $e) {
            $this->ctlPages->erreur($e->getMessage());
        }
    }
}