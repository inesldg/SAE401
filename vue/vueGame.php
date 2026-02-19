<?php

$style = '<link rel="stylesheet" href="styles/infoEscape.css">';

?>

<a href="index.php?action=accueil">Retour à l'accueil</a>
<a href="index.php?action=escapeGames">Retour aux escape games</a>

<section class="hero-section">
    <h1>In vino Veritas L'escape game mélant nature et découverte locale</h1>
</section>

<div class="conteneur-reservation">

    <div class="colonne-gauche">
        <section class="block_description carte-noire">
            <h2>
                <?= $escapeGame[0]['nom'] ?>
            </h2>
            <div class="infos-rapides">
                <div class="prix">A partir de 55€/pers.</div>
                <div class="notation">★★★★★ <span style="font-size: 0.7rem; color: white;">10 avis</span></div>
            </div>

            <div style="font-size: 0.9rem; color: #bbb;">
                <?= $escapeGame[0]['description'] ?>
            </div>


            <div class="icones-detail">
                <div>👥 2 à 12 joueurs</div>
                <div>🕒 Durée de =
                    <?= $escapeGame[0]['duree'] ?>h
                </div>

                <div>
                    <div>📍 Lieu :</div>
                    <?= $escapeGame[0]['lieu'] ?>
                </div>

            </div>

            <div class="separateur"></div>

            <div class="detail">
                <h3>Détails</h3>
                <div style="font-size: 0.85rem; color: #bbb;">
                    <?= $escapeGame[0]['description'] ?>
                </div>
            </div>

            <div class="separateur"></div>

            <div class="livraison">
                <h3>Livraison</h3>
                <div style="font-size: 0.85rem; color: #bbb;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure dolor in reprehenderit
                    in voluptate velit esse cillum.
                </div>
            </div>
        </section>

        <section class="block_avis carte-noire">
            <h2 style="font-size: 24px;">Avis</h2>
            <div class="grille-avis">
                <div class="avis-unitaire">
                    <div class="photo-profil"></div>
                    <strong>Emilien</strong><br>
                    <span style="color: var(--gold-clair)">★★★★★</span>
                    <div>blahblahb bg ydhjfnv jdnvjkdjvkd, ,ndvkjvn</div>
                </div>
                <div class="avis-unitaire">
                    <div class="photo-profil"></div>
                    <strong>Florian</strong><br>
                    <span style="color: var(--gold-clair)">★★★★★</span>
                    <div>blahblahb bg ydhjfnv jdnvjkdjvkd, ,ndvkjvn</div>
                </div>
                <div class="avis-unitaire">
                    <div class="photo-profil"></div>
                    <strong>Enzo</strong><br>
                    <span style="color: var(--gold-clair)">★★★★★</span>
                    <div>blahblahb bg ydhjfnv jdnvjkdjvkd, ,ndvkjvn</div>
                </div>
            </div>
            <center><button class="bouton-avis">Voir tous les avis</button></center>
        </section>
    </div>

    <div class="colonne-droite">
        <section class="carte-noire">
            <h2 style="font-size: 28px;">Invino Veritas</h2>
            <p class="preferences-titre">Sélectionnez vos préférences pour l'aventure.</p>

            <p style="text-align: center; font-size: 0.9rem;">Sélectionnez votre date pour l'aventure</p>

            <div class="calendrier-boite">
                <div class="calendrier-header">
                    <span id="prevMois" class="fleche-cal">❮</span>
                    <strong id="moisAnnee"></strong>
                    <span id="nextMois" class="fleche-cal">❯</span>
                </div>
                <div class="calendrier-jours">
                    <span>Lun</span><span>Mar</span><span>Mer</span><span>Jeu</span><span>Ven</span><span>Sam</span><span>Dim</span>
                </div>
                <div id="calendrier-grille" class="calendrier-grille">
                </div>
            </div>

            <div class="selecteur-ligne">
                <span>Horaire</span>
                <select class="choix-horaire">
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
                <span>Participants</span>
                <select class="choix-horaire">
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
                <span>Total estimé</span>
                <span style="color: white;">220.00 €</span>
            </div>

            <button class="bouton-reserver">Réserver maintenant</button>
            <button class="bouton-panier">Ajouter au panier</button>
        </section>
    </div>

</div>
<div>
    <div>Nombre de personnes minimum = <?= $escapeGame[0]['nbr_pers_min'] ?></div>
    <div>Nombre de personnes maximum = <?= $escapeGame[0]['nbr_pers_max'] ?></div>
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
if (isset($_SESSION["acces"])){
    echo '
    <div>
        ' . $message .'
    </div>
    <form method="post" action=' . $_SERVER["PHP_SELF"] . '?action=ajouterAvis&idEscapeGame=' . $escapeGame[0]['id_escape'] . '>
        <label>
            <input type="text" name="commentaire" value="" placeholder="Commentaire">
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
        <button type="submit" name="ajoutAvis">Ajouter un avis</button>
    </form>';
        }

        ?>

        <div>
            <?php
            if ($avis != 0) {
                foreach ($avis as $evaluation) {
                    $result = '
                <div>' . $evaluation['nom'] . ' ' . $evaluation['prenom'] . '</div>
                <div>' . $evaluation['note'] . '</div>
                <div>' . $evaluation['avis_date'] . '</div>
                <div>' . $evaluation['commentaire'] . '</div>
            ';

                    echo $result;
                }
            }
            ?>
        </div>

        <?php

        $script = '<script src="js/infoescape.js"></script>';