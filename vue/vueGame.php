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
?>

<!-- <a href="index.php?action=escapeGames" id="" retourescapeGames>Retour aux escape games</a> -->

<section class="hero-section"<?= $bannerImageUrl ? ' style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), var(--fond-sombre)), url(\'' . htmlspecialchars($bannerImageUrl) . '\'); background-size: cover; background-position: center;"' : '' ?>>
    <a href="index.php?action=escapeGames" class="btn-retour btn-retour-absolu">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span id="btnRetourTexte">Retour aux escape games</span>
    </a>

    <h1>
        <span class="titre-hero-nom"><?= $escapeGame[0]['nom'] ?></span>
    </h1>
</section>


<div class="conteneur-reservation">

    <div class="colonne-gauche">
        <section class="block_description carte-noire">
            <h2 class="titre-or">
                <?= $escapeGame[0]['nom'] ?>
            </h2>
            <div class="infos-rapides">
                <div class="prix" id="prixGames">A partir de 55€/pers.</div>
                <div class="notation">★★★★★ <span style="font-size: 0.7rem; color: white;" id="nbAvisGames">10
                        avis</span></div>
            </div>


            <div class="icones-detail">
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

                <div class="detail">
                    <h3 id="detailGames">Détails</h3>
                    <div style="font-size: 0.85rem; color: #bbb;">
                        <?= $escapeGame[0]['description'] ?>
                    </div>
                </div>
        </section>

        <section class="block_avis carte-noire">
            <h2 style="font-size: 24px;" id="nbAvisGames">Avis</h2>
            <div class="grille-avis">
                <?php
                // On vérifie s'il y a des avis (si $avis n'est pas vide et n'est pas égal à 0)
                if (!empty($avis) && $avis != 0) {
                    foreach ($avis as $evaluation) {
                        // Gestion de la langue pour le commentaire
                        $commAffichage = ($lang == 'en') ? $evaluation['commentaire_en'] : $evaluation['commentaire'];

                        // Calcul des étoiles
                        $note = intval($evaluation['note']);
                        $etoiles = str_repeat('★', $note) . str_repeat('☆', 5 - $note);
                        ?>

                        <div class="avis-unitaire">
                            <div class="photo-profil"></div>
                            <strong><?= htmlspecialchars($evaluation['prenom']) ?></strong><br>

                            <span style="color: var(--gold-clair)"><?= $etoiles ?></span>
                            <small>(<?= $note ?>/5)</small>

                            <div style="font-size: 0.8em; opacity: 0.7;">
                                <?= date('d/m/Y', strtotime($evaluation['avis_date'])) ?>
                            </div>

                            <div><?= htmlspecialchars($commAffichage) ?></div>
                        </div>

                        <?php
                    }
                } else {
                    // Message si aucun avis n'est trouvé
                    echo "<p style='grid-column: 1/-1; text-align: center;'>Aucun avis pour le moment.</p>";
                }
                ?>
            </div>
            <div class="bouton-avis-wrap" style="text-align: center;">
                <button class="bouton-avis" id="voirAvisGames">Voir tous les avis</button>
            </div>
        </section>
    </div>

    <div class="colonne-droite">
        <section class="carte-noire">
            <h2 style="font-size: 28px;">
                <?= $escapeGame[0]['nom'] ?>
            </h2>

            <p class="preferences-titre" id="selectionGames">Sélectionnez vos préférences pour l'aventure.</p>

            <p style="text-align: center; font-size: 0.9rem;" id="selectionDatesGames">Sélectionnez votre date pour
                l'aventure</p>


            <div class="calendrier-container-flex">

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


                <div class="selection-options-mobile">

                    <div class="selecteur-ligne">
                        <span id="horaireGames">Horaire</span>
                        <select class="choix-horaire" id="DemandeHoraireGame">
                            <option value="09:30">09 : 30</option>
                            <option value="10:30">10 : 30</option>
                            <option value="11:30">11 : 30</option>
                            <option value="12:30">12 : 30</option>
                            <option value="13:30">13 : 30</option>
                            <option value="14:30">14 : 30</option>
                            <option value="15:30">15 : 30</option>
                            <option value="16:30" selected>16 : 30</option>
                        </select>
                    </div>

            <div class="selecteur-ligne">
                <span id="participGames">Participants</span>
                <select class="choix-horaire" id="nbrParticipantsGame">
                    <option value="1">1 personne</option>
                    <option value="2">2 personnes</option>
                    <option value="3">3 personnes</option>
                    <option value="4">4 personnes</option>
                    <option value="5">5 personnes</option>
                    <option value="6" selected>6 personnes</option>
                    <option value="7">7 personnes</option>
                    <option value="8">8 personnes</option>
                    <option value="9">9 personnes</option>
                    <option value="10">10 personnes</option>
                    <option value="11">11 personnes</option>
                    <option value="12">12 personnes</option>
                    <option value="13">13 personnes</option>
                    <option value="14">14 personnes</option>
                    <option value="15">15 personnes</option>
                    <option value="16">16 personnes</option>
                    <option value="17">17 personnes</option>
                    <option value="18">18 personnes</option>
                    <option value="19">19 personnes</option>
                    <option value="20">20 personnes</option>
                </select>
            </div>

            <div class="total-ligne">
                <span id="totalGames">Total</span>
                <span style="color: white;">220.00 €</span>
            </div>

            <a href="index.php?action=panier" class="bouton-reserver" id="boutonReserverGames reserverGames">Réserver maintenant</a>
        </section>
    </div>

</div>
<div>
    <div>
        <div>
            <?php
            if ($avis != 0) {
                foreach ($avis as $evaluation) {
                    $result = '
                <div>' . $evaluation['nom'] . ' ' . $evaluation['prenom'] . '</div>
                <div>' . $evaluation['note'] . '</div>
                <div>' . $evaluation['avis_date'] . '</div>
                <div>' . $evaluation['commentaire'] . '</div>';
                }
            }
            ;
            ?>
        </div>

        <?php
        if (isset($_SESSION["acces"])) {
            echo '
    <div>
        ' . $message . '
    </div>
    <form method="post" action=' . $_SERVER["PHP_SELF"] . '?action=ajouterAvis&idEscapeGame=' . $escapeGame[0]['id_escape'] . '>
        <label>
            <input type="text" name="commentaire" value="" id="inputcommentaire" placeholder="Commentaire">
        </label>
        <label>
            <select name="note">
                <option value="">Choisissez une note</option>
                <option value="0">0/5</option>
                <option value="1">1/5</option>
                <option value="2">2/5</option>
                <option value="3">3/5</option>
                <option value="4">4/5</option>
                <option value="5">5/5</option>
            </select>
        </label>
        <button type="submit" id=ajoutAvisGame name="ajoutAvis">Ajouter un avis</button>
    </form>';
        }

        ?>

        <?php

        $script = '<script src="js/infoescape.js"></script>';
        $script .= '<script src="js/json.js" defer></script>';

