<?php

$style = '';

$header = '<h1>Nos escapes games<h1>';

ob_start();
?>

<a href="index.php?action=accueil">Retour à l'accueil</a>

<div>
<?php
    foreach ($escapeGames as $game){
        $result = '
            <div>'. $game['nom_escape_game'] . '</div>
            <div>'. $game['lieu'] . '</div>
            <a href=index.php?action=game&idEscapeGame=' . $game['id_escape_game'] . '>Lien</a>
        ';

        echo $result;
    }

    // var_dump($escapeGames);
?>
<div>

<?php

$main = ob_get_clean();

$footer = '';

$script = '';