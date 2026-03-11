<?php

/*
 * Classe chargée de l'affichage des vues
 * À partir d'une action (accueil, Game, Contact, …), construit le nom du
 * fichier de vue à inclure (`vue/vue<Action>.php`)
 * Prépare les morceaux communs (header, footer) et les variables nécessaires,
 * puis les injecte dans le gabarit principal `gabarit.php`
 */
class vue
{

  /*
   * Nom complet du fichier de vue à inclure pour l'action demandée
   * Exemple : "vue/vueAccueil.php", "vue/vueEscapeGames.php", "vue/vueErreur.php", ...
   */
  private $fichierVue;

  /*******************************************************
   * Constructeur
   * Initialise le chemin du fichier de vue correspondant à l'action
   *
   * Entrée :
   *   $action [string] : action demandée par le routeur
   *                        (ex. "Accueil", "EscapeGames", "Game", "Contact", …)
   *
   * Sortie :
   *   $this->fichierVue [string] : chemin du fichier de vue à inclure,
   *   construit sous la forme "vue/vue{$action}.php"
   *
   * Retour :
   *   aucun (initialisation interne de l'objet).
   *******************************************************/
  public function __construct($action)
  {
    $this->fichierVue = "vue/vue" . $action . ".php";
  }

  /*******************************************************
   * Affiche dans le gabarit la vue correspondant à l'action demandée
   *
   * Étapes principales :
   *   1. Récupère le titre d'onglet depuis la configuration globale
   *   2. Construit le header adapté au statut de l'utilisateur
   *      (déconnecté, connecté, administrateur) via les différents composants
   *   3. Construit le footer commun
   *   4. Extrait les données passées en paramètre ($data) pour les rendre
   *      directement accessibles dans le fichier de vue spécifique
   *   5. Exécute le fichier de vue correspondant à l'action et récupère
   *      son rendu HTML dans la variable $main
   *   6. Inclut enfin `gabarit.php`, qui assemble header, contenu principal
   *      ($main) et footer dans un template commun
   *
   * Entrée :
   *   $data [array] : tableau associatif contenant les données à afficher
   *   dans la vue (ex: les jeux etc)
   *
   * Retour :
   *   aucun : la méthode se charge directement d'afficher la page complète
   *******************************************************/
  public function afficher($data)
  {
    global $Conf;
    $titre = $Conf->titreOnglet;

    $script = "";

    // Conditions d'affichage du header selon le type de connexion (deconnecté, admin ou simple utilisateur) en vérifiant la session
    if (!isset($_SESSION["acces"]) || empty($_SESSION["acces"])) {
      ob_start();
      require "composants/header/header_deconnecte.php";
      $header = ob_get_clean();
    } elseif (isset($_SESSION['statut']) && $_SESSION['statut'] == 2) {
      ob_start();
      require "composants/header/header_admin.php";
      $header = ob_get_clean();
    } else {
      ob_start();
      require "composants/header/header_connecte.php";
      $header = ob_get_clean();
    }

    ob_start();
    require "composants/footer/footer_deconnecte.php";
    $footer = ob_get_clean();


    extract($data);   // Extrait les valeurs du tableau associatif $data dans des variables

    $head_extra = '';   // Optionnel : scripts/style dans le head (ex. Three.js uniquement sur accueil)
    ob_start();

    require $this->fichierVue;   // Génère le contenu de la page en fonction de l'action

    $main = ob_get_clean();

    require "gabarit.php";
  }
}
