<?php
require_once "modele/escapeGames.class.php";
require_once "vue/vue.class.php";

class ctlEscapeGames
{

    private $escapeGames;

    public function __construct()
    {
        $this->escapeGames = new escapeGames();
    }

    public function accueil($acces)
    {
        $escapeGames = $this->escapeGames->listeEscapeGames();

        $vue = new vue("Accueil"); // Instancie la vue appropriée
        $vue->afficher(array("escapeGames" => $escapeGames, "acces" => $acces));
    }

    public function pageEscapeGames()
    {
        // Récupération des filtres depuis la query string (tous les critères sont cumulés en AND)
        $etoilesGet = $_GET['etoiles'] ?? null;
        if (!is_array($etoilesGet) && $etoilesGet !== null && $etoilesGet !== '') {
            $etoilesGet = [$etoilesGet];
        }
        $etoilesGet = $etoilesGet ?? [];

        $filtres = [
            'prix_min'   => $_GET['prix_min']   ?? null,
            'prix_max'   => $_GET['prix_max']   ?? null,
            'pers_max'   => $_GET['pers_max']   ?? null,
            'lieu'       => $_GET['lieu']       ?? null,
            'etoiles'    => $etoilesGet,
            'duree_min'  => $_GET['duree_min']  ?? null,
            'duree_max'  => $_GET['duree_max']  ?? null,
        ];

        // Au moins un filtre rempli ?
        $auMoinsUnFiltre = !empty($filtres['prix_min']) || $filtres['prix_min'] === '0' || $filtres['prix_min'] === 0
            || !empty($filtres['prix_max'])
            || !empty($filtres['pers_max'])
            || (isset($filtres['lieu']) && $filtres['lieu'] !== '')
            || !empty($filtres['etoiles'])
            || !empty($filtres['duree_min']) || $filtres['duree_min'] === '0' || $filtres['duree_min'] === 0
            || !empty($filtres['duree_max']);

        if ($auMoinsUnFiltre) {
            $escapeGames = $this->escapeGames->filtrerEscapeGames($filtres);
        } else {
            $escapeGames = $this->escapeGames->listeEscapeGames();
        }

        $vue = new vue("EscapeGames"); // Instancie la vue appropriée
        $vue->afficher(array(
            "escapeGames" => $escapeGames,
            "filtres"     => $filtres
        ));
    }

    public function pageGame($idEscapeGame, $message = "")
    {
        $game = $this->escapeGames->afficherGame($idEscapeGame);
        $avis = $this->escapeGames->afficherAvis($idEscapeGame);

        if ($game != 0) {
            $vue = new vue("Game"); // Instancie la vue appropriée
            $vue->afficher(array("escapeGame" => $game, "avis" => $avis, "message" => $message)); // Affiche la liste des clients dans la vue
        } else
            throw new Exception("L'escape Game demandé n'existe pas");
    }

    public function ajouterAvis($note, $avis, $id, $idEscape, $message){
        $date = date("Y-m-d");

        $this->escapeGames->ajouterAvis($note, $avis, $date, $id, $idEscape);

        $game = $this->escapeGames->afficherGame($idEscape);
        $avis = $this->escapeGames->afficherAvis($idEscape);

        $vue = new vue("Game"); // Instancie la vue appropriée
        $vue->afficher(array("escapeGame" => $game, "avis" => $avis, "message" => $message));
    }

}
