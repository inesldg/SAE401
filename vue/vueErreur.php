<?php

$style = '';

$header = '<h1>Erreur<h1>';

ob_start();
?>

<div>Une erreur est survenue<div>
<div><?= $message ?></div>

<?php

$main = ob_get_clean();

$footer = '';

$script = '';