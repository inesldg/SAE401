<?php

$style = '<link rel="stylesheet" href="styles/escapeGames.css">';

// ob_start();
?>

<section class="hero-section">
    <h1>Réservez votre <span class="titre-or">mission immersive</span> dès maintenant</h1>
    <p>Choisissez votre univers !</p>
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

        // $main = ob_get_clean();
        $main;

        $script = '';