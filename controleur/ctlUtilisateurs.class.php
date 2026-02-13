<?php
require_once "modele/utilisateurs.class.php";
require_once "vue/vue.class.php";

class ctlUtilisateurs {

    private $utilisateurs;

    public function __construct(){
        $this->utilisateurs = new utilisateurs();
    }

    public function afficherUtilisateurs(){
        $listeUtilisateurs = $this->utilisateurs->listeUtilisateurs();

        $vue = new vue("Utilisateurs"); // Instancie la vue appropriée
        $vue->afficher(array("utilisateurs" => $listeUtilisateurs)); // Affiche la liste des clients dans la vue
    }

}