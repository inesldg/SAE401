<?php

require_once "modele/compte.class.php";
require_once "vue/vue.class.php";

class ctlCompte
{

    private $compte;

    public function __construct()
    {
        $this->compte = new compte();
    }

    public function getAcces($acces)
    {
        $mail = $_SESSION["acces"];
        $acces = $this->compte->getAcces($mail);
        return $acces;
    }

    public function getMail($mail)
    {
        $mail = $_SESSION["acces"];
        $mailUtilisateur = $this->compte->getMail($mail);
        return $mailUtilisateur;
    }

    public function getId($mail)
    {
        $mail = $_SESSION["acces"];
        $id = $this->compte->getId($mail);
        return $id;
    }

    public function deconnexion()
    {
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
        header("Location: index.php");
    }

    public function infosCompte($message, $mail)
    {
        $infosCompte = $this->compte->infosCompte($mail);

        $vue = new vue("Compte"); // Instancie la vue appropriée
        $vue->afficher(array("infosCompte" => $infosCompte, "message" => $message));
    }


    // Modification des informations utilisateur

    // public function afficherUtilisateurs($message, $mail){
    //     $infos = $this->compte->infosUtilisateur($mail);

    //     $vue = new vue("InfosCompte"); // Instancie la vue appropriée
    //     $vue->afficher(array("infos" => $infos, "message" => $message));
    // }

    function modifInfos($nom, $prenom, $mail, $tel, $mdp, $mdp_confirm, $ancienMail)
    {
        $vue = new vue("Compte");
        $infosCompte = $this->compte->infosCompte($ancienMail);
        $mdpUtilisateur = $this->compte->getMdp($ancienMail);

        if ($nom === "")
            $nom = $infosCompte[0]['nom'];
        if ($prenom === "")
            $prenom = $infosCompte[0]['prenom'];
        if ($mail === "")
            $mail = $ancienMail;
        if ($tel === "")
            $tel = $infosCompte[0]['tel'] ?? '';

        if ($mdp !== $mdp_confirm) {
            $vue->afficher(array("infosCompte" => $infosCompte, "message" => "<span>Les deux mots de passe ne correspondent pas</span>"));
            return;
        }

        if (password_verify($mdp, $mdpUtilisateur[0]['mdp'])) {
            $this->compte->modifInfos($nom, $prenom, $mail, $tel, $ancienMail);
            $_SESSION["acces"] = $mail;

            // Upload photo de profil (même logique que photos escape)
            $idResult = $this->compte->getId($ancienMail);
            if ($idResult && isset($_FILES['photoProfil']) && $_FILES['photoProfil']['error'] === 0) {
                $id_utilisateur = $idResult[0]['id_utilisateur'];
                $fichier = $_FILES['photoProfil'];
                $dossier = "photos_utilisateurs/";
                if (!is_dir($dossier)) {
                    mkdir($dossier, 0755, true);
                }
                $extension = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));
                $extensions_ok = array('jpg', 'jpeg', 'png', 'webp');
                if (in_array($extension, $extensions_ok)) {
                    foreach ($extensions_ok as $ext) {
                        $ancien = $dossier . $id_utilisateur . "." . $ext;
                        if (file_exists($ancien)) {
                            unlink($ancien);
                        }
                    }
                    $photoNom = $id_utilisateur . "." . $extension;
                    move_uploaded_file($fichier['tmp_name'], $dossier . $photoNom);
                }
            }

            $infosCompte = $this->compte->infosCompte($mail);
            $vue->afficher(array("infosCompte" => $infosCompte, "message" => "<span>Le ou les changement(s) ont été réalisé(s) avec succès</span>"));
        } else {
            $vue->afficher(array("infosCompte" => $infosCompte, "message" => "<span>Mot de passe incorrect</span>"));
        }
    }
}
