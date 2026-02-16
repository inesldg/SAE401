<?php

$style = '';

ob_start();
?>

<a href="index.php?action=accueil">Retour à l'accueil</a>

<div>
    <div><?= $message ?></div>

<?php
    foreach ($utilisateurs as $utilisateur){
        $result = '
            <div>'. $utilisateur['mail'] . $utilisateur['statut'] . ' 
                <form method="post" action="' . $_SERVER["PHP_SELF"] . '?action=changementAcces&id=' . $utilisateur['id_utilisateur'] . '" >
                    <label>
                        <select name="niveauAcces">
                          <option value="">--Please choose an option--</option>
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

    var_dump(value: $utilisateurs);
?>

<div>

<?php

$main = ob_get_clean();

$script = '';