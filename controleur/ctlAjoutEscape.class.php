<?php
require_once "modele/ajoutEscape.class.php";
require_once "vue/vue.class.php";

class ctlAjoutEscape {

    private $ajoutEscape;

    public function __construct(){
        $this->ajoutEscape = new ajoutEscape();
    }

    public function ajoutEscape($nom, $description, $lieu, $duree, $min, $max){
        $vue = new vue("AjoutEscape"); // Instancie la vue appropriée

        if ($duree >= 0){
            if ($min <= $max){
                $this->ajoutEscape->ajouterEscape($nom, $description, $lieu, $duree, $min, $max);
                header("location: index.php");
            }
            else
                $vue->afficher(array("message"=> "<span>Le nombre de personnes minimum ne peut pas être plus grand que le maximum</span>"));
        }
        else
            $vue->afficher(array("message" => "<span>La durée doit être supérieure à 0</span>"));
    }
}