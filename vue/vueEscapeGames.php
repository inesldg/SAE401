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

// Style
$style = '<link rel="stylesheet" href="styles/escapeGames.css">';
?>

<section class="hero-section">
    <h1 id="reserverEscapGam">
        <span id="txtReserver">Réservez votre </span>
        <span class="titre-or" id="titreorEscapGam">mission immersive</span>
        <span id="txtMaintenant"> dès maintenant</span>
    </h1>
    <p id="choixEscapGam">Choisissez votre univers !</p>
</section>

<section class="escapes-section">
    <div class="escapes-container">

        <!-- COLONNE FILTRE -->
        <aside class="filtres-tri">
            <form class="filtres-escape__form" method="get" action="index.php">
                <input type="hidden" name="action" value="escapeGames">

                <fieldset class="filtres-escape__bloc">
                    <legend id="legendePrix">Prix (€ / pers)</legend>
                    <label><span id="labelMin">Min</span> <input type="number" name="prix_min" min="0" step="5"
                            placeholder="0"></label>
                    <label><span id="labelMax">Max</span> <input type="number" name="prix_max" min="0" step="5"
                            placeholder="50"></label>
                </fieldset>

                <fieldset class="filtres-escape__bloc">
                    <legend id="legendePers">Nombre max de personnes</legend>
                    <input type="number" name="pers_max" min="1" max="20" placeholder="Ex: 6">
                </fieldset>

                <fieldset class="filtres-escape__bloc">
                    <legend id="legendeLieu">Lieu</legend>
                    <label><input type="radio" name="lieu" value=""> <span id="lieuTous">Tous</span></label>
                    <label><input type="radio" name="lieu" value="Mulhouse"> Mulhouse</label>
                </fieldset>

                <fieldset class="filtres-escape__bloc">
                    <legend id="legendeNote">Note des avis (étoiles)</legend>
                    <label><input type="radio" name="etoiles" value="1"> 1 ★</label>
                    <label><input type="radio" name="etoiles" value="2"> 2 ★</label>
                    <label><input type="radio" name="etoiles" value="3"> 3 ★</label>
                    <label><input type="radio" name="etoiles" value="4"> 4 ★</label>
                    <label><input type="radio" name="etoiles" value="5"> 5 ★</label>
                </fieldset>

                <fieldset class="filtres-escape__bloc">
                    <legend id="legendeDuree">Durée du jeu en minutes</legend>
                    <label><span id="labelDureeMin">Minimum</span> <input type="number" name="duree_min" min="0"
                            placeholder="0"></label>
                    <label><span id="labelDureeMax">Maximum</span> <input type="number" name="duree_max" min="0"
                            placeholder="120"></label>
                </fieldset>

                <button type="submit" id="btnFiltrer">Filtrer</button>
            </form>
        </aside>
        <!-- COLONNE ESCAPES -->
        <div class="escapes-cartes">

            <?php foreach ($escapeGames as $game): ?>
                <article class="accueil-escape-card">

                    <div class="accueil-escape-card__img">
                        <?php
                                    $dossier = "photos_escapes/";
                                    $id = $game['id_escape'];

                                    $extensions = ['jpg', 'jpeg', 'png', 'webp'];
                                    $imagePath = null;

                                    foreach ($extensions as $ext) {
                                        if (file_exists($dossier . $id . "." . $ext)) {
                                            $imagePath = $dossier . $id . "." . $ext;
                                            break;
                                        }
                                    }
                                    ?>

                                    <?php if ($imagePath): ?>
                                        <img src="<?= $imagePath ?>" width="100%">
                                    <?php else: ?>
                                        <div class="placeholder-img"></div>
                                    <?php endif; ?>
                    </div>

                    <div class="accueil-escape-card__corps">
                        <h3 class="accueil-escape-card__titre">
                            <?= $game['nom'] ?>
                        </h3>

                        <p class="accueil-escape-card__desc">
                            <?= $game['description'] ?>
                        </p>

                        <div class="accueil-escape-card__infos">
                            <span class="accueil-escape-card__duree">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <?= $game['duree'] ?>
                            </span>

                            <span class="accueil-escape-card__personnes">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <?= $game['nbr_pers_min'] ?> - <?= $game['nbr_pers_max'] ?>
                            </span>

                            <span class="accueil-escape-card__personnes">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M16.2 7.8l-2 6.3-6.4 2.1 2-6.3z" />
                                </svg>
                                <?= $game['lieu'] ?>
                            </span>
                        </div>

                        <a class="accueil-escape-card__prix"
                            href="index.php?action=game&idEscapeGame=<?= $game['id_escape'] ?>" id="detailEscapeGam">
                            Voir détails
                        </a>
                    </div>

                    <a href="index.php?action=game&idEscapeGame=<?= $game['id_escape'] ?>"
                        class="accueil-escape-card__link" aria-label="Voir détails : <?= htmlspecialchars($game['nom']) ?>"></a>
                </article>
            <?php endforeach; ?>

        </div>
    </div>
</section>


<div>
    <!-- <?php
    foreach ($escapeGames as $game) {
        $result = '
            <div>' . $game['nom'] . '</div>
            <div>' . $game['lieu'] . '</div>
            <a href=index.php?action=game&idEscapeGame=' . $game['id_escape'] . '>Lien</a>
        ';

        echo $result;
    }

    ?> -->
    <div>

        <?php

        $main;

        $script = '<script src="js/json.js" defer></script>';
