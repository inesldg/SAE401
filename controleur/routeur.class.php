<?php

require "controleur/ctlPages.class.php";

class routeur {
    private $ctlPages;


    public function __construct(){
        $this->ctlPages = new ctlPages();
    }

    public function routerRequete(){
        try {

            // if (isset($_SESSION["acces"])) {
                    
            //         if (isset($_GET["action"])) {
            //             switch($_GET["action"]){
            //                 default :
            //                     throw new Exception("<span id='actionInvalide'>Action non valide</span>");
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

                        default :
                            throw new Exception("<span id='actionInvalide'>Action non valide</span>");
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