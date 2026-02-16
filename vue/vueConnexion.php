<?php

$style = '';

ob_start();
?>

<div>Page de connexion</div>
<a href="index.php?action=accueil">Retour à l'accueil</a>
<a href="index.php?action=escapeGames">Découvrez nos escape games</a>

<form method="post" action=<?= $_SERVER["PHP_SELF"] . "?action=connexion" ?>>
    <div>
        <h2>Connexion</h2>
    </div>
    <div>
        <label>
            <p>Votre Email : </p>
            <input type="email" name="mail" value="" placeholder="Adresse mail" required>
        </label>
        <label>
            <p>Votre Mot de passe : </p>
            <input type="password" name="mdp" value="" placeholder="Mot de passe" required>
        </label>
    </div>
    <div>
        <input type="submit" name="connexion" value="Se connecter">
    </div>
    <span><?= $message ?></span>
    <div>
        Vous n'avez pas de compte ?
        <a href="index.php?action=pageInscription">Inscription</a>
    </div>
</form>

<?php

$main = ob_get_clean();

$script = '';