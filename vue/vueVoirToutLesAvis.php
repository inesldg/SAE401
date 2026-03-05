<?php
$style = '<link rel="stylesheet" href="styles/VoirToutLesAvis.css">';
$idEscapeGame = $escapeGame[0]['id_escape'] ?? ($_GET['idEscapeGame'] ?? '');
?>

<div class="avis-page-wrapper">
<div class="avis-page">
    <div class="avis-filtre">
        <div class="avis-titre">Avis</div>
        <div class="avis-actions">
            <div class="avis-pill avis-pill-filtre" data-filter-note="1"><span class="dore">★</span><span class="grise">★★★★</span></div>
            <div class="avis-pill avis-pill-filtre" data-filter-note="2"><span class="dore">★★</span><span class="grise">★★★</span></div>
            <div class="avis-pill avis-pill-filtre" data-filter-note="3"><span class="dore">★★★</span><span class="grise">★★</span></div>
            <div class="avis-pill avis-pill-filtre" data-filter-note="4"><span class="dore">★★★★</span><span class="grise">★</span></div>
            <div class="avis-pill avis-pill-filtre" data-filter-note="5"><span class="dore">★★★★★</span></div>
            <div class="avis-pill avis-pill-add" id="txt-ajt-avis">Ajouter un avis</div>
        </div>
    </div>
    <div class="avis-filtre-message" id="avisFiltreMessage" style="display:none;"></div>

    <?php if (!empty($message)): ?>
        <div style="margin: 0 32px 16px; color: var(--blanc-casse);"><?= $message ?></div>
    <?php endif; ?>

    <div class="avis-fenetre-overlay" id="avisPopupOverlay" aria-hidden="true">
        <form class="avis-fenetre" id="avisForm" method="post" action="<?= $_SERVER["PHP_SELF"] . "?action=ajouterAvis&idEscapeGame=" . urlencode($idEscapeGame)?>">
            <div class="avis-fenetre-fermer" id="avisPopupClose">✕</div>
            <div class="avis-fenetre-titre">Quelle note donneriez vous ? <span class="avis-obligatoire">*</span></div>
            <div class="avis-fenetre-etoiles">
                <span class="avis-fenetre-etoile dore" data-note="1">★</span>
                <span class="avis-fenetre-etoile dore" data-note="2">★</span>
                <span class="avis-fenetre-etoile grise" data-note="3">★</span>
                <span class="avis-fenetre-etoile grise" data-note="4">★</span>
                <span class="avis-fenetre-etoile grise" data-note="5">★</span>
            </div>
            <input type="hidden" name="note" id="avisNote" value="2" required>
            <input type="hidden" name="retour" value="all">
            <div class="avis-fenetre-libelle">Votre avis <span class="avis-obligatoire">*</span></div>
            <textarea class="avis-fenetre-zone" name="commentaire" id="avisTexte" required placeholder="Qu'avez vous pensé de notre escape game ? faites part de votre ressenti aux autres !"></textarea>
            <div class="avis-fenetre-actions">
                <button type="submit" class="avis-fenetre-valider" id="avisPopupValider">Valider</button>
            </div>
        </form>
    </div>

    <?php if (!empty($avis) && $avis != 0): ?>
        <?php foreach ($avis as $evaluation): ?>
            <?php $note = max(0, min(5, (int) $evaluation['note'])); ?>
            <div class="avis" data-note="<?= $note ?>">
                <div class="container-avis">
                    <div class="top-avis">
                        <div class="photo-de-profil">
                            <img src="images/default-profile-picture.png" alt="Photo de profil">
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
                <div class="message"><?= htmlspecialchars($evaluation['commentaire']) ?></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="avis">
            <div class="message">Aucun avis pour le moment.</div>
        </div>
    <?php endif; ?>
</div>
</div>

<?php
$script = '<script src="js/avisPopup.js"></script>';
$script .= '<script src="js/json.js" defer></script>';
?>