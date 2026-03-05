<?php
// Config Langue
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}
$lang = $_SESSION['lang'];

$col_nom = "nom_" . $lang;
$col_desc = "description_" . $lang;

// Message par défaut si aucun passé (ex: URL invalide)
if (empty($message)) {
    $message = 'La page demandée est introuvable ou l\'action n\'est pas valide.';
}

$style = '<link rel="stylesheet" href="styles/erreur.css">';
?>

<span id="erreurErr" aria-hidden="true">Une erreur est survenue</span>

<section class="page-erreur" aria-labelledby="titre-erreur">
    <div class="page-erreur__contenu reveal reveal-up">
        <h1 id="titre-erreur" class="page-erreur__titre">
            Une erreur est survenue
        </h1>
        <p class="page-erreur__message">
            <?= $message ?>
        </p>
        <a href="index.php?action=accueil" class="page-erreur__lien">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            Retour à l'accueil
        </a>
    </div>
</section>

<?php
$script = '<script src="js/json.js" defer></script>';
?>
