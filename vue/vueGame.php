<?php

$style = '';

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

<?php
if (isset($_SESSION["acces"])){
    echo '<form method="post" action=' . $_SERVER["PHP_SELF"] . "?action=ajouterAvis" . '>
        <label>
            <input type="text" name="avis" value="" placeholder="Commentaire">
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
    </form>';
}
    
?>

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

$script = '';