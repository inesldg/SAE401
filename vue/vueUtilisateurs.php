<?php
// Config Langue
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}
$lang = $_SESSION['lang'];

$col_nom = "nom_" . $lang;
$col_desc = "description_" . $lang;

// Style
$style = '';
?>


<a href="index.php?action=accueil" id="retourAcc">Retour à l'accueil</a>

<div>
    <div><?= $message ?></div>

    <?php
    foreach ($utilisateurs as $utilisateur) {
        $result = '
            <div>' . $utilisateur['mail'] . $utilisateur['statut'] . ' 
                <form method="post" action="' . $_SERVER["PHP_SELF"] . '?action=changementAcces&id=' . $utilisateur['id_utilisateur'] . '" >
                    <label>
                        <select name="niveauAcces">
                          <option value="0">--Choisissez un niveau--</option>
                          <option value="1">Membre</option>
                          <option value="2">Administrateur</option>
                        </select>
                    </label>
                    <input type="submit" name="changerAcces" value="Modifier">
                </form>
            </div>
        ';

        echo $result;
    }

    // var_dump(value: $utilisateurs);
    ?>

    <div>

        <?php

        $script = '<script src="js/json.js" defer></script>';

