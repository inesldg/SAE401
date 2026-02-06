<?php

$style = '';

$header = '<h1>Nos escapes games<h1>';

ob_start();
?>

<a href="index.php?action=accueil">Retour à l'accueil</a>

<div>
<?php
    foreach ($escapeGames as $game){
        $result = '<div>test</div>';

        echo $result;
    }
?>
<div>

<?php

$main = ob_get_clean();

$footer = '';

$script = '';