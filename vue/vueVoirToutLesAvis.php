<?php
$style = '<link rel="stylesheet" href="styles/VoirToutLesAvis.css">';
$idEscapeGame = $escapeGame[0]['id_escape'] ?? ($_GET['idEscapeGame'] ?? '');
?>

<!-- ========================= -->
<!-- PAGE DES AVIS -->
<!-- ========================= -->
<div class="avis-page-wrapper">
    <a href="index.php?action=escapeGames" class="btn-retour btn-retour-absolu">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span id="btnRetourTexte">Retour aux escape games</span>
    </a>

    <div class="avis-page">
        <!-- ========================= -->
        <!-- SECTION FILTRES ET AACTIONS -->
        <!-- ========================= -->
        <div class="avis-filtre reveal reveal-up">
            <div class="avis-titre reveal reveal-up" id="titreAvisTous2">Avis</div>
            <!-- Boutons de filtre par note -->
            <div class="avis-actions">
                <div class="avis-pill avis-pill-filtre" data-filter-note="1"><span class="dore">★</span><span
                        class="grise">★★★★</span></div>
                <div class="avis-pill avis-pill-filtre" data-filter-note="2"><span class="dore">★★</span><span
                        class="grise">★★★</span></div>
                <div class="avis-pill avis-pill-filtre" data-filter-note="3"><span class="dore">★★★</span><span
                        class="grise">★★</span></div>
                <div class="avis-pill avis-pill-filtre" data-filter-note="4"><span class="dore">★★★★</span><span
                        class="grise">★</span></div>
                <div class="avis-pill avis-pill-filtre" data-filter-note="5"><span class="dore">★★★★★</span></div>
                <div class="avis-pill avis-pill-add" id="txt-ajt-avis">Ajouter un avis</div>
            </div>
        </div>
        <div class="avis-filtre-message" id="avisFiltreMessage" style="display:none;"></div>

        <?php if (!empty($message)): ?>
            <p class="avis-page-message"><?= $message ?></p>
        <?php endif; ?>

        <!-- ========================= -->
        <!-- POPUP AJOUT D'AVIS -->
        <!-- ========================= -->
        <div class="avis-fenetre-overlay" id="avisPopupOverlay" aria-hidden="true">
            <form class="avis-fenetre" id="avisForm" method="post"
                action="<?= $_SERVER["PHP_SELF"] . "?action=ajouterAvis&idEscapeGame=" . urlencode($idEscapeGame) ?>">
                <div class="avis-fenetre-fermer" id="avisPopupClose">✕</div>
                <!-- Choix de la note -->
                <div class="avis-fenetre-titre"><span id="avisPopupQuestion">Quelle note donneriez vous ?</span> <span class="avis-obligatoire">*</span>
                </div>
                <div class="avis-fenetre-etoiles">
                    <!-- Étoiles interactives -->
                    <span class="avis-fenetre-etoile dore" data-note="1">★</span>
                    <span class="avis-fenetre-etoile dore" data-note="2">★</span>
                    <span class="avis-fenetre-etoile grise" data-note="3">★</span>
                    <span class="avis-fenetre-etoile grise" data-note="4">★</span>
                    <span class="avis-fenetre-etoile grise" data-note="5">★</span>
                </div>
                <!-- Données cachées -->
                <input type="hidden" name="note" id="avisNote" value="2" required>
                <input type="hidden" name="retour" value="all">
                <div class="avis-fenetre-libelle"><span id="avisPopupLabel">Votre avis</span> <span class="avis-obligatoire">*</span></div>
                <textarea class="avis-fenetre-zone" name="commentaire" id="avisTexte" required
                    placeholder="Qu'avez vous pensé de notre escape game ? faites part de votre ressenti aux autres !"></textarea>
                <div class="avis-fenetre-actions">
                    <!-- Bouton validation -->
                    <button type="submit" class="avis-fenetre-valider" id="avisPopupValider">Valider</button>
                </div>
            </form>
        </div>

        <!-- ========================= -->
        <!-- LISTE DES AVIS -->
        <!-- ========================= -->
        <?php if (!empty($avis) && $avis != 0): ?>
            <?php foreach ($avis as $evaluation): ?>

                <?php // Sécurisation et limitation de la note entre 0 et 5 ?>
                <?php $note = max(0, min(5, (int) $evaluation['note'])); ?>
                <div class="avis" data-note="<?= $note ?>">
                    <div class="container-avis">
                        <div class="top-avis">
                            <div class="photo-de-profil">
                                <?php
                                $dossier = "photos_users/";
                                $idUser = $evaluation['id_utilisateur'] ?? null;
                                $photoPath = null;
                                if ($idUser) {
                                    foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                                        if (file_exists($dossier . $idUser . "." . $ext)) {
                                            $photoPath = $dossier . $idUser . "." . $ext;
                                            break;
                                        }
                                    }
                                }
                                ?>
                                <!-- Affichage photo ou placeholder -->
                                <?php if ($photoPath): ?>
                                    <img src="<?= htmlspecialchars($photoPath) ?>"
                                        alt="Photo de profil de <?= htmlspecialchars($evaluation['prenom']) ?>">
                                <?php else: ?>
                                    <div class="photo-de-profil-placeholder" aria-hidden="true">
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                <!-- Informations de l'avis -->
                                <div class="pseudo"><?= htmlspecialchars($evaluation['prenom']) ?></div>
                            </div>
                        </div>
                        <div class="meta-avis">
                            <div class="note">
                                <?php for ($i = 0; $i < $note; $i++): ?>
                                    <img src="images/etoileAvisOr.svg" alt="Etoile or">
                                <?php endfor; ?>
                                <?php for ($i = 0; $i < 5 - $note; $i++): ?>
                                    <img src="images/etoileAvisGrise.svg" alt="Etoile grise">
                                <?php endfor; ?>
                            </div>
                            <div class="nom-escape"><?= htmlspecialchars($escapeGame[0]['nom']) ?></div>
                            <div class="date-publication"><?= date('d/m/Y', strtotime($evaluation['avis_date'])) ?></div>
                        </div>
                    </div>

                    <!-- Commentaire -->
                    <div class="message"><?= htmlspecialchars($evaluation['commentaire']) ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Cas où il n'y a aucun avis -->
            <div class="avis">
                <div class="message" id="avisAucunMessage">Aucun avis pour le moment.</div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$script = '<script src="js/avisPopup.js"></script>';
$script .= '<script src="js/json.js" defer></script>';
?>