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

// Au moins un filtre est-il appliqué ?
$filtresActifs = !empty($filtres['prix_max'])
    || !empty($filtres['pers_min'])
    || (isset($filtres['lieu']) && $filtres['lieu'] !== '')
    || !empty($filtres['etoiles'])
    || !empty($filtres['duree_max']);
?>

<!-- -------------------------------
SECTION HERO (titre principal)
-------------------------------- -->
<section class="hero-section">
    <!-- titre principal -->
    <h1 id="reserverEscapGam">
        <span id="txtReserver">Réservez votre </span>
        <span class="titre-or" id="titreorEscapGam">mission immersive</span>
        <span id="txtMaintenant"> dès maintenant</span>
    </h1>
    <!-- sous-titre -->
    <p class="reveal reveal-up" id="choixEscapGam">Choisissez votre univers !</p>
</section>


<!-- -------------------------------
SECTION HERO (titre principal)
-------------------------------- -->
<section class="escapes-section">
    <div class="escapes-container">

        <!-- Bouton mobile pour afficher les filtres -->
        <button id="btn-toggle-filtres" class="mobile-filter-trigger">
            <span class="reveal reveal-up">Afficher les Filtres</span>
        </button>

        <!-- ===============================
        COLONNE FILTRES
        =============================== -->
        <aside class="filtres-tri reveal reveal-up">
            <form class="filtres-escape__form" method="get" action="index.php">
                <input type="hidden" name="action" value="escapeGames">

                <!-- -------------------------------
                FILTRE NOMBRE MINIMUM DE JOUEURS
                -------------------------------- -->
                <fieldset class="filtres-escape__bloc">
                    <legend id="legendePers">Nombre minimum de personnes</legend>
                    <input type="number" name="pers_min" min="1" max="20" placeholder="Ex: 4"
                        value="<?= isset($filtres['pers_min']) ? htmlspecialchars($filtres['pers_min']) : '' ?>">
                </fieldset>

                <!-- -------------------------------
                FILTRE PAR LIEU
                -------------------------------- -->
                <fieldset class="filtres-escape__bloc">
                    <legend id="legendeLieu">Lieu</legend>
                    <?php $lieuActuel = $filtres['lieu'] ?? ''; ?>
                    <label>
                        <input type="radio" name="lieu" value="" <?= $lieuActuel === '' ? 'checked' : '' ?>>
                        <span id="lieuTous">Tous</span>
                    </label>
                    <label>
                        <input type="radio" name="lieu" value="Mulhouse" <?= $lieuActuel === 'Mulhouse' ? 'checked' : '' ?>>
                        Mulhouse
                    </label>
                    <label>
                        <input type="radio" name="lieu" value="Sundgau" <?= $lieuActuel === 'Sundgau' ? 'checked' : '' ?>>
                        Sundgau
                    </label>
                    <label>
                        <input type="radio" name="lieu" value="Colmar" <?= $lieuActuel === 'Colmar' ? 'checked' : '' ?>>
                        Colmar
                    </label>
                    <label>
                        <input type="radio" name="lieu" value="Eguisheim" <?= $lieuActuel === 'Eguisheim' ? 'checked' : '' ?>>
                        Eguisheim
                    </label>
                </fieldset>

                <!-- -------------------------------
                FILTRE PAR NOTE (étoiles)
                -------------------------------- -->
                <fieldset class="filtres-escape__bloc">
                    <legend id="legendeNote">Note des avis (moyenne)</legend>
                    <?php
                    $etoilesCochees = $filtres['etoiles'] ?? [];
                    if (!is_array($etoilesCochees)) {
                        $etoilesCochees = $etoilesCochees !== '' ? [$etoilesCochees] : [];
                    }
                    $etoilesCochees = array_map('strval', $etoilesCochees);
                    ?>
                    <label><input type="checkbox" name="etoiles[]" value="1" <?= in_array('1', $etoilesCochees, true) ? 'checked' : '' ?>> 1 ★</label>
                    <label><input type="checkbox" name="etoiles[]" value="2" <?= in_array('2', $etoilesCochees, true) ? 'checked' : '' ?>> 2 ★</label>
                    <label><input type="checkbox" name="etoiles[]" value="3" <?= in_array('3', $etoilesCochees, true) ? 'checked' : '' ?>> 3 ★</label>
                    <label><input type="checkbox" name="etoiles[]" value="4" <?= in_array('4', $etoilesCochees, true) ? 'checked' : '' ?>> 4 ★</label>
                    <label><input type="checkbox" name="etoiles[]" value="5" <?= in_array('5', $etoilesCochees, true) ? 'checked' : '' ?>> 5 ★</label>
                </fieldset>

                <!-- -------------------------------
                FILTRE DURÉE MAX DU JEU
                -------------------------------- -->
                <fieldset class="filtres-escape__bloc">
                    <legend id="legendeDuree">Durée max du jeu (minutes)</legend>
                    <label>
                        <span id="labelDureeMax">Maximum</span>
                        <input type="number" name="duree_max" min="0" placeholder="120"
                            value="<?= isset($filtres['duree_max']) ? $filtres['duree_max'] : '' ?>">
                    </label>
                </fieldset>

                <button type="submit" id="btnFiltrer">Filtrer</button>

                <button type="submit" id="btn-filtrer-mobile" class="mobile-filter-trigger">
                    <span>Filtrer</span>
                </button>

                <?php if ($filtresActifs): ?>
                    <a href="index.php?action=escapeGames" class="btn-supprimer-filtres" id="btnSupprimerFiltres">Supprimer les filtres</a>
                <?php endif; ?>
            </form>


            <!-- ===============================
        COLONNE DES CARTES ESCAPES
        =============================== -->
        </aside>
        <!-- COLONNE ESCAPES -->
        <div class="escapes-cartes">
            <?php if (empty($escapeGames)): ?>
                <p class="escapes-aucun-resultat" id="aucunJeuCriteres">Aucun jeu trouvé correspondant à ces critères.</p>
            <?php else: ?>
            <?php foreach ($escapeGames as $game): ?>
                <article class="accueil-escape-card">

                    <!-- -------------------------------
                    IMAGE DE L'ESCAPE
                    -------------------------------- -->
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

                    <!-- -------------------------------
                    CONTENU DE LA CARTE
                    -------------------------------- -->
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
                                <?= $game['duree'] ?> min
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
                                <?= $game['nbr_pers_min'] ?> à <?= $game['nbr_pers_max'] ?>
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

                        <!-- bouton voir détails -->
                        <a class="accueil-escape-card__prix"
                            href="index.php?action=game&idEscapeGame=<?= $game['id_escape'] ?>" id="detailEscapeGam">
                            Voir détails
                        </a>
                    </div>

                    <!-- lien invisible pour rendre toute la carte cliquable -->
                    <a href="index.php?action=game&idEscapeGame=<?= $game['id_escape'] ?>" class="accueil-escape-card__link"
                        aria-label="Voir détails : <?= $game['nom'] ?>"></a>
                </article>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php
$script = '<script src="js/traduction/tradCommun.js" defer></script><script src="js/traduction/tradHeader.js" defer></script><script src="js/traduction/tradFooter.js" defer></script><script src="js/traduction/tradEscapeGames.js" defer></script><script src="js/traduction.js" defer></script>';
$script .= '<script src="js/filtre.js" defer></script>';
