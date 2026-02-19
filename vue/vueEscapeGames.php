<?php

$style = '<link rel="stylesheet" href="styles/escapeGames.css">';

?>

<section class="hero-section">
    <h1>Réservez votre <span class="titre-or">mission immersive</span> dès maintenant</h1>
    <p>Choisissez votre univers !</p>
</section>

<section class="escapes-section">
    <div class="escapes-container">

        <!-- COLONNE TRI -->
        <div class="filtres-tri">
        </div>
        <!-- COLONNE ESCAPES -->
        <div class="escapes-cartes">

            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre">
                        <?= $escapeGames[0]['nom'] ?>
                    </h3>
                    <p class="accueil-escape-card__desc">
                        <?= $escapeGames[0]['description'] ?>
                    </p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">
                            <?= $escapeGames[0]['duree'] ?>h
                        </span>
                        <span class="accueil-escape-card__personnes">
                            <?= $escapeGames[0]['nbr_pers_min'] ?>-
                            <?= $escapeGames[0]['nbr_pers_max'] ?>
                        </span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>

                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>

            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre"><?= $escapeGames[0]['nom'] ?></h3>
                    <p class="accueil-escape-card__desc">
                        <?= $escapeGames[0]['description'] ?>
                    </p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">
                            <?= $escapeGames[0]['duree'] ?>h
                        </span>
                        <span class="accueil-escape-card__personnes">
                            <?= $escapeGames[0]['nbr_pers_min'] ?>-<?= $escapeGames[0]['nbr_pers_max'] ?>
                        </span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>

                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>

            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre"><?= $escapeGames[0]['nom'] ?></h3>
                    <p class="accueil-escape-card__desc">
                        <?= $escapeGames[0]['description'] ?>
                    </p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">
                            <?= $escapeGames[0]['duree'] ?>h
                        </span>
                        <span class="accueil-escape-card__personnes">
                            <?= $escapeGames[0]['nbr_pers_min'] ?>-<?= $escapeGames[0]['nbr_pers_max'] ?>
                        </span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>

                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>

            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre"><?= $escapeGames[0]['nom'] ?></h3>
                    <p class="accueil-escape-card__desc">
                        <?= $escapeGames[0]['description'] ?>
                    </p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">
                            <?= $escapeGames[0]['duree'] ?>h
                        </span>
                        <span class="accueil-escape-card__personnes">
                            <?= $escapeGames[0]['nbr_pers_min'] ?>-<?= $escapeGames[0]['nbr_pers_max'] ?>
                        </span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>

                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>

            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre"><?= $escapeGames[0]['nom'] ?></h3>
                    <p class="accueil-escape-card__desc">
                        <?= $escapeGames[0]['description'] ?>
                    </p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">
                            <?= $escapeGames[0]['duree'] ?>h
                        </span>
                        <span class="accueil-escape-card__personnes">
                            <?= $escapeGames[0]['nbr_pers_min'] ?>-<?= $escapeGames[0]['nbr_pers_max'] ?>
                        </span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>

                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>

            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre"><?= $escapeGames[0]['nom'] ?></h3>
                    <p class="accueil-escape-card__desc">
                        <?= $escapeGames[0]['description'] ?>
                    </p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">
                            <?= $escapeGames[0]['duree'] ?>h
                        </span>
                        <span class="accueil-escape-card__personnes">
                            <?= $escapeGames[0]['nbr_pers_min'] ?>-<?= $escapeGames[0]['nbr_pers_max'] ?>
                        </span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>

                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>

        </div>
    </div>
</section>


<div>
    <?php
    foreach ($escapeGames as $game) {
        $result = '
            <div>' . $game['nom'] . '</div>
            <div>' . $game['lieu'] . '</div>
            <a href=index.php?action=game&idEscapeGame=' . $game['id_escape'] . '>Lien</a>
        ';

        echo $result;
    }

    // var_dump($escapeGames);
    ?>
    <div>

        <?php

        $main;

        $script = '';