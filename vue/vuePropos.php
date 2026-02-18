<?php

$style = '<link rel="stylesheet" href="styles/about.css">';


ob_start();
?>

<a href="index.php?action=accueil">Retour à l'accueil</a>

<!-- ------ ICI mettre le code HTML ------ -->

<?php

$main = ob_get_clean();

$script = '';