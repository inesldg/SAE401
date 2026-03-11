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
$style = '<link rel="stylesheet" href="styles/infoEscape.css">';

// Image de la bannière : photo de l'escape game si elle existe
$bannerImageUrl = null;
if (!empty($escapeGame[0]['id_escape'])) {
    $dossier = "photos_escapes/";
    $id = $escapeGame[0]['id_escape'];
    $extensions = ['jpg', 'jpeg', 'png', 'webp'];
    foreach ($extensions as $ext) {
        if (file_exists($dossier . $id . "." . $ext)) {
            $bannerImageUrl = $dossier . $id . "." . $ext;
            break;
        }
    }
}

// Nombre d'avis pour ce jeu : on compte les éléments dans $avis
$nbAvis = 0;
if (!empty($avis) && is_array($avis)) {
    $nbAvis = count($avis);
}
?>

<!-- ===============================
SECTION HERO (bannière du jeu)
================================ -->

<section class="hero-section" <?= $bannerImageUrl ? ' style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), var(--fond-sombre)), url(\'' . htmlspecialchars($bannerImageUrl) . '\'); background-size: cover; background-position: center;"' : '' ?>>
    <!-- Si une image de bannière existe, on l'applique en background -->

    <!-- Bouton retour vers la liste des escape games -->
    <a href="index.php?action=escapeGames" class="btn-retour btn-retour-absolu">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span id="btnRetourTexte">Retour aux escape games</span>
    </a>

    <!-- Nom de l'escape game -->
    <h1>
        <span class="titre-hero-nom"><?= $escapeGame[0]['nom'] ?></span>
    </h1>
</section>

<!-- ===============================
CONTENEUR GLOBAL (2 colonnes)
================================ -->
<div class="conteneur-reservation">

    <!-- ===============================
CONTENEUR GLOBAL (2 colonnes)
================================ -->
    <div class="colonne-gauche reveal reveal-up">

        <!-- ===============================
        DESCRIPTION DU JEU
        =============================== -->
        <section class="block_description carte-noire">
            <h2 class="titre-or">
                <?= $escapeGame[0]['nom'] ?>
            </h2>
            <div class="infos-rapides">
                <div class="prix"><span id="aPartir">A partir de</span><?= $tarifs[0]['prix'] ?><span id="pour">pour</span> <?= $tarifs[0]['effectif'] ?><span id="personne">personnes</span></div>
                <div class="notation"><?= $nbAvis ?> <span style="font-size: 0.7rem; color: white;" id="nbAvisGames">avis</span></div>
            </div>
            <!-- ===============================
            ICÔNES INFORMATIONS
            =============================== -->
            <div class="icones-detail ">
                <div><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span id="labelParticipants1">De </span>
                    <?= $escapeGame[0]['nbr_pers_min'] ?>
                    <span id="labelParticipants2">à </span>
                    <?= $escapeGame[0]['nbr_pers_max'] ?>
                    <span id="labelParticipants3">joueurs </span>
                </div>
                <div><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span id="labelDuree">Durée de</span>
                    <?= $escapeGame[0]['duree'] ?> minutes
                </div>
                <div id="lieuGames"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M16.2 7.8l-2 6.3-6.4 2.1 2-6.3z" />
                    </svg>
                    <span id="labelLieu">Lieu :</span>
                    <?= $escapeGame[0]['lieu'] ?>
                </div>

                <div class="separateur"></div>

                <!-- ===============================
                DESCRIPTION DÉTAILLÉE
                =============================== -->
                <div class="detail">
                    <h3 id="detailGames">Détails</h3>
                    <div style="font-size: 0.85rem; color: #bbb;">
                        <?= $escapeGame[0]['description'] ?>
                    </div>
                </div>
        </section>

        <!-- ===============================
        SECTION AVIS UTILISATEURS
        =============================== -->
        <section class="block_avis carte-noire reveal reveal-up">
            <h2 style="font-size: 24px;" id="nbAvisGames">Avis</h2>
            <div class="grille-avis">
                <?php
                // On vérifie s'il y a des avis (si $avis n'est pas vide et n'est pas égal à 0)
                if (!empty($avis) && $avis != 0) {
                    foreach (array_slice($avis, 0, 3) as $evaluation) {
                        // Gestion de la langue pour le commentaire
                        $commAffichage = ($lang == 'en') ? $evaluation['commentaire_en'] : $evaluation['commentaire'];

                        // Calcul des étoiles
                        $note = intval($evaluation['note']);
                        $etoiles = str_repeat('★', $note) . str_repeat('☆', 5 - $note);

                        // Photo de l'utilisateur : on cherche dans photos_utilisateurs/
                        $dossierPhotos = "photos_utilisateurs/";
                        $idUtilisateur = $evaluation['id_utilisateur'] ?? null;
                        $photoUtilisateur = null;
                        if ($idUtilisateur !== null) {
                            $extensions = ['jpg', 'jpeg', 'png', 'webp'];
                            foreach ($extensions as $ext) {
                                $fichier = $dossierPhotos . $idUtilisateur . "." . $ext;
                                if (file_exists($fichier)) {
                                    $photoUtilisateur = $fichier;
                                    break;
                                }
                            }
                        }
                        ?>

                        <div class="avis-unitaire">
                            <div class="photo-profil">
                                <?php if ($photoUtilisateur): ?>
                                    <img src="<?= htmlspecialchars($photoUtilisateur) ?>" alt="Photo de <?= htmlspecialchars($evaluation['prenom']) ?>">
                                <?php else: ?>
                                    <!-- Pas de photo : on laisse la div vide (style .photo-profil gère l’apparence) -->
                                <?php endif; ?>
                            </div>
                            <strong><?= ($evaluation['prenom']) ?></strong><br>

                            <span style="color: var(--gold-clair)"><?= $etoiles ?></span>
                            <small>(<?= $note ?>/5)</small>

                            <div style="font-size: 0.8em; opacity: 0.7;">
                                <?= date('d/m/Y', strtotime($evaluation['avis_date'])) ?>
                            </div>

                            <div><?= ($commAffichage) ?></div>
                        </div>

                        <?php
                    }
                } else {
                    // Message si aucun avis n'est trouvé
                    echo "<p style='grid-column: 1/-1; text-align: center;' id='gameAucunAvis'>Aucun avis pour le moment.</p>";
                }
                ?>
            </div>

            <!-- bouton voir tous les avis -->
            <div class="bouton-avis-wrap" style="text-align: center;">
                <a class="bouton-avis" id="voirAvisGames"
                    href="index.php?action=pageVoirToutLesAvis&idEscapeGame=<?= $escapeGame[0]['id_escape'] ?>">Voir
                    tous les avis</a>
            </div>
        </section>
    </div>

    <!-- ===============================
    COLONNE DROITE
    réservation + calendrier
    =============================== -->
    <div class="colonne-droite reveal reveal-up">
        <section class="carte-noire">
            <div class="preferences-titre" id="selectionGames">Sélectionnez vos préférences pour l'aventure.</div>

            <p style="text-align: center; font-size: 0.9rem;" id="selectionDatesGames">Sélectionnez votre date pour
                l'aventure</p>

            <!-- ===============================
            FORMULAIRE DE RÉSERVATION
            =============================== -->
            <form method="post" action=<?= $_SERVER["PHP_SELF"] . "?action=panier" ?> class="calendrier-container-flex">

                <!-- ===============================
                CALENDRIER
                =============================== -->
                <div class="calendrier-boite">
                    <div class="calendrier-header">
                        <span id="prevMois" class="fleche-cal">❮</span>
                        <strong id="moisAnnee"></strong>
                        <span id="nextMois" class="fleche-cal">❯</span>
                    </div>
                    <div class="calendrier-jours">
                        <span id="lundi">Lun</span><span id="mardi">Mar</span><span id="mercredi">Mer</span><span
                            id="jeudi">Jeu</span><span id="vendredi">Ven</span><span id="samedi">Sam</span><span
                            id="dimanche">Dim</span>
                    </div>
                    <div id="calendrier-grille" class="calendrier-grille">
                    </div>
                </div>

                <!-- ===============================
                SÉLECTION HORAIRE
                =============================== -->
                <div class="selection-options-mobile">

                    <div class="selecteur-ligne">
                        <label>
                            <span id="horaireGames">Horaire</span>
                            <select name="horaireEscape" class="choix-horaire" id="DemandeHoraireGame">
                                <option value="09:30">09 : 30</option>
                                <option value="10:30">10 : 30</option>
                                <option value="11:30">11 : 30</option>
                                <option value="12:30">12 : 30</option>
                                <option value="13:30">13 : 30</option>
                                <option value="14:30">14 : 30</option>
                                <option value="15:30">15 : 30</option>
                                <option value="16:30" selected>16 : 30</option>
                            </select>
                        </label>
                    </div>
                </div>

                <!-- ===============================
                NOMBRE DE PARTICIPANTS
                =============================== -->
                <div class="selecteur-ligne">
                    <label>
                        <span id="participGames">Participants</span>
                        <select name="nbrPersonnesEscape" class="choix-horaire" id="nbrParticipantsGame">
                            <?php

                            foreach($tarifs as $tarif){
                                $result = '<option value="' . $tarif['effectif'] . '-' . $tarif['prix'] . '">' . $tarif['effectif'] . ' personnes</option>';

                                echo $result;
                            }
                            
                            ?>
                        </select>
                    </label>
                </div>

                <div class="total-ligne">
                    <span id="totalGames">Total</span>
                    <span style="color: white;" id="prixTotalCalendrier"><?= $tarifs[0]['prix'] ?>.00 €</span>
                </div>

                <?php if (!empty($message)): ?>
                <p class="reservation-erreur-date reservation-erreur-horaire" role="alert" aria-live="polite"><?= htmlspecialchars($message) ?></p>
                <?php endif; ?>

                <p class="reservation-erreur-date" id="erreurDateReservation" role="alert" aria-live="polite" style="display: none;">Veuillez sélectionner une date.</p>

                <input type="text" name="jourEscape" id="inputJourEscape" style="display: none;" value="">
                <input type="hidden" name="moisEscape" id="inputMoisEscape" value="">
                <input type="hidden" name="anneeEscape" id="inputAnneeEscape" value="">
                <input type="hidden" name="idEscape" value="<?= $escapeGame[0]['id_escape'] ?>">

                <!-- bouton reserver -->
                <button type="submit" class="bouton-reserver" id="boutonReserverGames">Réserver maintenant</button>
            </form>
        </section>
    </div>

</div>
<?php

$script = '<script src="js/infoescape.js"></script>';
$script .= '<script src="js/traduction/tradCommun.js" defer></script><script src="js/traduction/tradHeader.js" defer></script><script src="js/traduction/tradFooter.js" defer></script><script src="js/traduction/tradGames.js" defer></script><script src="js/traduction/tradErreur.js" defer></script><script src="js/traduction/tradAvis.js" defer></script><script src="js/traduction.js" defer></script>';

