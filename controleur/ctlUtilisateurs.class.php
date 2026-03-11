<?php
require_once "modele/utilisateurs.class.php";
require_once "vue/vue.class.php";

class ctlUtilisateurs
{
    // Instance du modèle utilisateurs
    private $utilisateurs;

    // Constructeur
    // Crée une instance du modèle utilisateurs
    public function __construct()
    {
        $this->utilisateurs = new utilisateurs();
    }

    // Affiche la liste des utilisateurs
    // $message : message à afficher à l'utilisateur
    // $mail : mail de l'admin pour filtrer ou autre usage
    public function afficherUtilisateurs($message, $mail)
    {
        $listeUtilisateurs = $this->utilisateurs->listeUtilisateurs($mail);

        $vue = new vue("Utilisateurs"); // Instancie la vue appropriée
        $vue->afficher(array("utilisateurs" => $listeUtilisateurs, "message" => $message));
    }

    // Change le statut d'accès d'un utilisateur
    // $acces : nouveau statut
    // $id : ID de l'utilisateur à modifier
    // $mail : mail de l'admin pour récupérer la liste
    function changementAcces($acces, $id, $mail)
    {
        $this->utilisateurs->changementAcces($acces, $id); // Met à jour le statut en BDD

        $listeUtilisateurs = $this->utilisateurs->listeUtilisateurs($mail);

        $vue = new vue("Utilisateurs"); // Instancie la vue appropriée
        $vue->afficher(array("utilisateurs" => $listeUtilisateurs, "message" => "<span>Le changement d'accès à été réalisé avec succès</span>"));
    }

    // Supprime un utilisateur
    // $id : ID de l'utilisateur à supprimer
    // $mail : mail de l'admin pour récupérer la liste
    public function supprimerUtilisateur($id, $mail)
    {
        $this->utilisateurs->supprimerUtilisateur($id); // Supprime l'utilisateur en BDD

        $listeUtilisateurs = $this->utilisateurs->listeUtilisateurs($mail); // Recharge la liste après suppression

        $vue = new vue("Utilisateurs"); // Instancie la vue
        $vue->afficher(array(
            "utilisateurs" => $listeUtilisateurs, // Passe la liste mise à jour
            "message" => "<span>L'utilisateur a été supprimé avec succès</span>" // Message de confirmation
        ));
    }
}
