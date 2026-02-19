<?php

$style = '';

?>

<a href="index.php?action=accueil">Retour à l'accueil</a>

<form method="post" action=<?= $_SERVER["PHP_SELF"] . "?action=modifInfos" ?>>

    <label>NOM
        <input type="text" name="nom" value="" placeholder="<?= $infosCompte[0]['nom'] ?>">
    </label>
    <label>PRENOM
        <input type="text" name="prenom" value="" placeholder="<?= $infosCompte[0]['prenom'] ?>">
    </label>
    <label>ADRESSE MAIL
        <input type="email" name="mail" value="" placeholder="<?= $infosCompte[0]['mail'] ?>">
    </label>


    <label>Entrez votre mot de passe pour enregistrer
        <input type="password" name="mdp" value="" placeholder="Votre mot de passe" required>
    </label>
    <button type="submit" name="modifierInfos">Modifier</button>
    <span>
        <?= $message ?>
    </span>
</form>

<?php

$script = '';
