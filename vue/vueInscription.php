<?php

$style = '';

$header = '<h1>Outdoor mystery<h1>';

ob_start();
?>

<div>Page d'inscription</div>
<a href="index.php?action=accueil">Retour à l'accueil</a>
<a href="index.php?action=escapeGames">Découvrez nos escape games</a>

<form method="post" action=<?= $_SERVER["PHP_SELF"] . "?action=inscription" ?>>
    <div>
        <h2>Inscription</h2>
    </div>
    <div>
        <label>
            <p>Votre Nom : </p>
            <input type="text" name="nom" value="" placeholder="Nom" required>
        </label>
        <label>
            <p>Votre Prenom : </p>
            <input type="text" name="prenom" value="" placeholder="Prenom" required>
        </label>
        <label>
            <p>Votre Email : </p>
            <input type="email" name="mail" value="" placeholder="Adresse mail" required>
        </label>
        <label>
            <p>Votre Numéro de téléphone : </p>
            <input type="tel" name="phone" value="" placeholder="01 23 45 67 89" pattern="[0]{1}[0-9]{1} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" required><br><br>
            Format: 01 23 45 67 89
        </label>
        <label>
            <p>Votre Mot de passe : </p>
            <input type="password" name="mdp" value="" placeholder="Mot de passe" required>
        </label>
        <label>
            <p>Confirmer le mot de passe : </p>
            <input type="password" name="mdpConfirm" value="" placeholder="Confirmer le mot de passe" required>
        </label>
    </div>
    <div>
        <input type="submit" name="inscription" value="S'inscrire">
    </div>
    <span><?= $message ?></span>
    <div>
        Vous avez un compte ?
        <a href="index.php?action=pageConnexion">Connexion</a>
    </div>
</form>

<?php

$main = ob_get_clean();

$footer;

$script = '';