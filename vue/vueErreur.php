<?php

$style = '';


ob_start();
?>

<div>Une erreur est survenue<div>
<div><?= $message ?></div>

<?php

$main = ob_get_clean();


$script = '';