<?php

$style = '<link rel="stylesheet" href="styles/escapeGames.css">';

?>

<section class="hero-section">
    <h1 id="reserverEscapGam">Réservez votre <span class="titre-or" id="titreorEscapGam">mission immersive</span> dès maintenant</h1>
    <p id="choixEscapGam">Choisissez votre univers !</p>
</section>

<section class="escapes-section">
    <div class="escapes-container">

        <!-- COLONNE TRI -->
        <div class="filtres-tri">
        </div>
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
