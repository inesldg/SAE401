<?php

$style = '';

?>

<a href="index.php?action=accueil" id="retourAcc">Retour à l'accueil</a>

<form method="post" action=<?= $_SERVER["PHP_SELF"] . "?action=modifInfos" ?>>

    <label id="nomCompte">NOM
        <input type="text" name="nom" value="" placeholder="<?= $infosCompte[0]['nom'] ?>">
    </label>
    <label id="prenomCompte">PRENOM
        <input type="text" name="prenom" value="" placeholder="<?= $infosCompte[0]['prenom'] ?>">
    </label>
    <label id="mailCompte">ADRESSE MAIL
        <input type="email" name="mail" value="" placeholder="<?= $infosCompte[0]['mail'] ?>">
    </label>


    <label id="entrerMDPCompte">Entrez votre mot de passe pour enregistrer
        <input type="password" name="mdp" value="" id="inputmdp" placeholder="Votre mot de passe" required>
    </label>
    <button type="submit" name="modifierInfos" id="modifCompte">Modifier</button>
    <span>
        <?= $message ?>
    </span>
</form>

<?php

$script = '<script src="js/json.js" defer></script>';
