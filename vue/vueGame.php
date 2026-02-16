<?php

$style = '';

ob_start();
?>

<a href="index.php?action=accueil">Retour à l'accueil</a>
<a href="index.php?action=escapeGames">Retour aux escape games</a>

<div>
    <h2><?= $escapeGame[0]['nom'] ?></h2>
    <div><?= $escapeGame[0]['lieu'] ?></div>
    <div><?= $escapeGame[0]['description'] ?></div>
    <div>Durée = <?= $escapeGame[0]['duree'] ?>h</div>
    <div>Nombre de personnes minimum = <?= $escapeGame[0]['nbr_pers_min'] ?></div>
    <div>Nombre de personnes maximum = <?= $escapeGame[0]['nbr_pers_max'] ?></div>
<div>
<div>
<?php
    if ($avis != 0){
        foreach ($avis as $evaluation){
            $result = '
                <div>'. $evaluation['nom'] . ' ' . $evaluation['prenom'] .'</div>
                <div>'. $evaluation['note'] . '</div>
                <div>'. $evaluation['avis_date'] . '</div>
                <div>'. $evaluation['commentaire'] . '</div>
            ';

            echo $result;
        }
    }
?>
</div>

<?php
// var_dump($escapeGame[0]);

$main = ob_get_clean();

$script = '';