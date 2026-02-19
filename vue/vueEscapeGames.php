<?php

$style = '';

?>

<div>
<?php
    foreach ($escapeGames as $game){
        $result = '
            <div>'. $game['nom'] . '</div>
            <div>'. $game['lieu'] . '</div>
            <a href=index.php?action=game&idEscapeGame=' . $game['id_escape'] . '>Lien</a>
        ';

        echo $result;
    }

    // var_dump($escapeGames);
?>
<div>

<?php

$script = '';