<?php

$style = '';

?>

<div>Ajoutez une nouvel escape game</div>
<a href="index.php?action=accueil">Retour à l'accueil</a>

<form method="post" action=<?= $_SERVER["PHP_SELF"] . "?action=ajoutEscape" ?>>
    <div>
        <h2>Nouvel escape game</h2>
    </div>
    <div>
        <label>
            <p>Nom : </p>
            <input type="text" name="nom" value="" placeholder="Nom" required>
        </label>
        <label>
            <p>Description : </p>
            <input type="text" name="description" value="" placeholder="Description" required>
        </label>
        <label>
            <p>Lieu : </p>
            <input type="text" name="lieu" value="" placeholder="Lieu" required>
        </label>
        <label>
            <p>Durée : </p>
            <input type="number" name="duree" value="" placeholder="0" required>
        </label>
        <label>
            <p>Nombre de personnes minimum : </p>
            <input type="number" name="pers_min" value="" placeholder="1" required>
        </label>
        <label>
            <p>Nombre de personnes maximum : </p>
            <input type="number" name="pers_max" value="" placeholder="1" required>
        </label>
    </div>
    <div>
        <input type="submit" name="ajoutEscape" value="Ajouter aux escape games">
    </div>
    <span><?= $message ?></span>
</form>

<?php

$script = '';