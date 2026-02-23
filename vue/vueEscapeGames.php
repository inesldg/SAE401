<?php

$style = '<link rel="stylesheet" href="styles/escapeGames.css">';

?>

<section class="hero-section">
    <h1 id="reserverEscapGam">Réservez votre <span class="titre-or" id="titreorEscapGam">mission immersive</span> dès maintenant</h1>
    <p id="choixEscapGam">Choisissez votre univers !</p>
</section>

<section class="escapes-section">
    <div class="escapes-container">

        <!-- COLONNE FILTRE -->
        <aside class="filtres-tri">
            <form class="filtres-escape__form" method="get" action="index.php">
                <input type="hidden" name="action" value="escapeGames">

                <fieldset class="filtres-escape__bloc">
                    <legend>Prix (€ / pers)</legend>
                    <label>Min <input type="number" name="prix_min" min="0" step="5" placeholder="0"></label>
                    <label>Max <input type="number" name="prix_max" min="0" step="5" placeholder="50"></label>
                </fieldset>

                <fieldset class="filtres-escape__bloc">
                    <legend>Nombre max de personnes</legend>
                    <input type="number" name="pers_max" min="1" max="20" placeholder="Ex: 6">
                </fieldset>

                <fieldset class="filtres-escape__bloc">
                    <legend>Lieu</legend>
                    <label><input type="radio" name="lieu" value=""> Tous</label>
                    <label><input type="radio" name="lieu" value="lieu1"> Lieu 1</label>
                    <label><input type="radio" name="lieu" value="lieu2"> Lieu 2</label>
                </fieldset>

                <fieldset class="filtres-escape__bloc">
                    <legend>Note des avis (étoiles)</legend>
                    <label><input type="radio" name="etoiles" value="1"> 1 ★</label>
                    <label><input type="radio" name="etoiles" value="2"> 2 ★</label>
                    <label><input type="radio" name="etoiles" value="3"> 3 ★</label>
                    <label><input type="radio" name="etoiles" value="4"> 4 ★</label>
                    <label><input type="radio" name="etoiles" value="5"> 5 ★</label>
                </fieldset>

                <fieldset class="filtres-escape__bloc">
                    <legend>Durée du jeu en minutes</legend>
                    <label>Minimum <input type="number" name="duree_min" min="0" placeholder="0"></label>
                    <label>Maximum <input type="number" name="duree_max" min="0" placeholder="120"></label>
                </fieldset>

                <button type="submit">Filtrer</button>
            </form>
        </aside>
        <!-- COLONNE ESCAPES -->
        <div class="escapes-cartes">

            <?php foreach ($escapeGames as $game): ?>

                <article class="accueil-escape-card">

                    <div class="accueil-escape-card__img"></div>

                    <div class="accueil-escape-card__corps">

                        <h3 class="accueil-escape-card__titre">
                            <?= $game['nom'] ?>
                        </h3>

                        <p class="accueil-escape-card__desc">
                            <?= $game['description'] ?>
                        </p>

                        <div class="accueil-escape-card__infos">
                            <span class="accueil-escape-card__duree">
                                <?= $game['duree'] ?>h
                            </span>

                            <span class="accueil-escape-card__personnes">
                                <?= $game['nbr_pers_min'] ?> - <?= $game['nbr_pers_max'] ?>
                            </span>
                        </div>

                        <!-- <p class="accueil-escape-card__prix">
                            <?= $game['prix'] ?>€ / pers
                        </p> -->

                        <a href="index.php?action=game&idEscapeGame=<?= $game['id_escape'] ?>" id="detailEscapeGam">
                            Voir détails
                        </a>

                    </div>

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

        $script = '';
