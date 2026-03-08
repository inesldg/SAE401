<?php
require "controleur/ctlAccueil.class.php";
require "controleur/ctlPages.class.php";
require "controleur/ctlEscapeGames.class.php";
require "controleur/ctlCompte.class.php";
require "controleur/ctlInscription.class.php";
require "controleur/ctlConnexion.class.php";
require "controleur/ctlUtilisateurs.class.php";
require "controleur/ctlAjoutEscape.class.php";

require "controleur/ctlAdmin.class.php";
require "controleur/ctlDashAvis.class.php";
require "controleur/ctlDashCalendrier.class.php";
require "controleur/ctlPanier.class.php";

class routeur
{
    private $ctlAccueil;
    private $ctlPages;
    private $ctlEscapeGames;
    private $ctlCompte;
    private $ctlInscription;
    private $ctlConnexion;
    private $ctlUtilisateurs;
    private $ctlAjoutEscape;
    private $ctlAdmin;
    private $ctlDashAvis;
    private $ctlDashCalendrier;
    private $ctlPanier;



    public function __construct()
    {
        $this->ctlAccueil = new ctlAccueil();
        $this->ctlPages = new ctlPages();
        $this->ctlEscapeGames = new ctlEscapeGames();
        $this->ctlCompte = new ctlCompte();
        $this->ctlInscription = new ctlInscription();
        $this->ctlConnexion = new ctlConnexion();
        $this->ctlUtilisateurs = new ctlUtilisateurs();
        $this->ctlAjoutEscape = new ctlAjoutEscape();
        $this->ctlAdmin = new ctlAdmin();
        $this->ctlDashAvis = new ctlDashAvis();
        $this->ctlDashCalendrier = new ctlDashCalendrier();
        $this->ctlPanier = new ctlPanier();
    }

    public function routerRequete()
    {
        try {

            if (isset($_SESSION["acces"])) {

                $mail = $_SESSION["acces"];
                $acces = $this->ctlCompte->getAcces($mail);
                $id = $this->ctlCompte->getId($mail);
                $_SESSION['statut'] = $acces[0]['statut'] ?? null;

                if (isset($_GET["action"])) {
                    switch ($_GET["action"]) {
                        case "deconnexion":
                            $this->ctlCompte->deconnexion();
                            break;
                        case "accueil":
                            $this->ctlAccueil->afficherAccueil();
                            break;
                        case "legal":
                            $this->ctlPages->pageLegal();
                            break;
                        case "escapeGames":
                            $this->ctlEscapeGames->pageEscapeGames();
                            break;
                        case "game":
                            $message = $_SESSION['flash_avis'] ?? "";
                            if (isset($_SESSION['flash_avis'])) {
                                unset($_SESSION['flash_avis']);
                            }
                            $this->ctlEscapeGames->pageGame($_GET['idEscapeGame'], $message);
                            break;
                        case "pageVoirToutLesAvis":
                            if (isset($_GET['idEscapeGame']))
                                $this->ctlEscapeGames->pageVoirToutLesAvis($_GET['idEscapeGame'], (function () {
                                    $message = $_SESSION['flash_avis'] ?? "";
                                    if (isset($_SESSION['flash_avis'])) {
                                        unset($_SESSION['flash_avis']);
                                    }
                                    return $message;
                                })());
                            else
                                throw new Exception("<span>Aucun escape game selectionné</span>");
                            break;
                        case "panier":
                            $donneesPanier = null;
                            if (isset($_POST['jourEscape'], $_POST['horaireEscape'], $_POST['nbrPersonnesEscape'], $_POST['idEscape'])) {
                                $donneesPanier = $_POST;
                            } elseif (isset($_SESSION['retour_panier']) && !empty($_SESSION['retour_panier'])) {
                                $donneesPanier = $_SESSION['retour_panier'];
                                unset($_SESSION['retour_panier']);
                            }
                            if ($donneesPanier) {
                                $mois = !empty($donneesPanier['moisEscape']) ? $donneesPanier['moisEscape'] : date('n');
                                $annee = !empty($donneesPanier['anneeEscape']) ? $donneesPanier['anneeEscape'] : date('Y');
                                $this->ctlPanier->pagePanier($donneesPanier['jourEscape'], $mois, $annee, $donneesPanier['horaireEscape'], $donneesPanier['nbrPersonnesEscape'], $donneesPanier['idEscape'], $message = "");
                            } else {
                                throw new Exception("Vous n'avez aucun panier actif");
                            }
                            break;
                        case "ajouterAvis":
                            if (isset($_GET['idEscapeGame'])) {
                                if (isset($_POST['note'], $_POST['commentaire']) && $_POST['note'] !== "")
                                    $this->ctlEscapeGames->ajouterAvis($_POST['note'], $_POST['commentaire'], $id[0]['id_utilisateur'], $_GET['idEscapeGame'], $message = "<span>Avis ajouté avec succès !</span>", $_POST['retour'] ?? "game");
                                else {
                                    if (isset($_POST['retour']) && $_POST['retour'] === "all")
                                        $this->ctlEscapeGames->pageVoirToutLesAvis($_GET['idEscapeGame'], $message = "<span>Veuillez écrire un commentaire ainsi que de choisir une note sur 5</span>");
                                    else
                                        $this->ctlEscapeGames->pageGame($_GET['idEscapeGame'], $message = "<span>Veuillez écrire un commentaire ainsi que de choisir une note sur 5</span>");
                                }
                            } else
                                throw new Exception("<span>Aucun escape game selectionné</span>");
                            break;
                        case "propos":
                            $this->ctlPages->pagePropos();
                            break;
                        case "confirmation":
                            $this->ctlPages->pageConfirmation();
                            break;
                        case "contact":
                            $this->ctlPages->pageContact();
                            break;
                        case "compte":
                            $this->ctlCompte->infosCompte($message = "", $mail);
                            break;
                        case "modifInfos":
                            if (isset($_POST['mdp']) && isset($_POST['mdp_confirm']))
                                $this->ctlCompte->modifInfos($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'] ?? '', $_POST['mdp'], $_POST['mdp_confirm'], ancienMail: $mail);
                            else
                                $this->ctlCompte->infosCompte($message = "<span>Veuillez entrer et confirmer votre mot de passe pour enregistrer vos modifications</span>", $mail);
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
                        case "dashCalendrier":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else
                                $this->ctlDashCalendrier->afficherdashCalendrier();
                            break;
                        case "dashAvis":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else
                                $this->ctlDashAvis->afficherdashAvis();
                            break;

                        case "supprimerAvis":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else {
                                if (isset($_POST['id_avis']))
                                    $this->ctlDashAvis->supprimer();
                                else
                                    throw new Exception("ID avis manquant");
                            }
                            break;

                        case "pageAjoutEscape":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else
                                $this->ctlAjoutEscape->afficherEscapes();
                            break;
                        case "ajoutEscape":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else {
                                if (isset($_POST['nom'], $_POST['description'], $_POST['lieu'], $_POST['duree'], $_POST['pers_min'], $_POST['pers_max']))
                                    $this->ctlAjoutEscape->ajoutEscape($_POST['nom'], $_POST['description'], $_POST['lieu'], $_POST['duree'], $_POST['pers_min'], $_POST['pers_max']);
                                else
                                    $this->ctlAjoutEscape->afficherEscapes();
                            }
                            break;

                        case "supprimerEscape":
                            if ($acces[0]['statut'] !== 2)
                                throw new Exception("Action non valide");
                            else {
                                if (isset($_GET['id']))
                                    $this->ctlAjoutEscape->supprimerEscape($_GET['id']);
                                else
                                    throw new Exception("ID manquant pour la suppression");
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
                    $this->ctlAccueil->afficherAccueil();
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

                        case "contact":
                            $this->ctlPages->pageContact();
                            break;

                        case "legal":
                            $this->ctlPages->pageLegal();
                            break;

                        case "panier":
                            // Retour après connexion : on garde les infos de résa en session et on met le cookie pour rediriger vers panier
                            if (isset($_POST['jourEscape'], $_POST['horaireEscape'], $_POST['nbrPersonnesEscape'], $_POST['idEscape'])) {
                                $_SESSION['retour_panier'] = [
                                    'jourEscape' => $_POST['jourEscape'],
                                    'moisEscape' => isset($_POST['moisEscape']) ? $_POST['moisEscape'] : date('n'),
                                    'anneeEscape' => isset($_POST['anneeEscape']) ? $_POST['anneeEscape'] : date('Y'),
                                    'horaireEscape' => $_POST['horaireEscape'],
                                    'nbrPersonnesEscape' => $_POST['nbrPersonnesEscape'],
                                    'idEscape' => $_POST['idEscape'],
                                ];
                                setcookie('page', '?action=panier', time() + 300, '/');
                            } else {
                                setcookie('page', '?action=panier', time() + 300, '/');
                            }
                            $this->ctlPages->pageConnexion($message = "");
                            break;

                        // case "confirmation":
                        //     $this->ctlPages->pageConfirmation();
                        //     break;

                        case "pageConnexion":
                            $this->ctlPages->pageConnexion($message = "");
                            break;
                        case "ajouterAvis":
                            if (isset($_GET['idEscapeGame'])) {
                                setcookie('page', '?action=game&idEscapeGame=' . urlencode($_GET['idEscapeGame']), time() + 300, '/');
                            }
                            $this->ctlPages->pageConnexion($message = "<span>Veuillez vous connecter pour ajouter un avis</span>");
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
                        case "pageVoirToutLesAvis":
                            if (isset($_GET['idEscapeGame']))
                                $this->ctlEscapeGames->pageVoirToutLesAvis($_GET['idEscapeGame']);
                            else
                                throw new Exception("<span>Aucun escape game selectionné</span>");
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
