<?php

$style = '';

ob_start();
?>

<a href="index.php?action=accueil">Retour à l'accueil</a>

<div>
<?php
    foreach ($utilisateurs as $utilisateur){
        $result = '
            <div>'. $utilisateur['mail'] . '</div>
        ';

        echo $result;
    }

    var_dump(value: $utilisateurs);
?>
<div>

<?php

$main = ob_get_clean();

$script = '';