<?php

$style = '<link rel="stylesheet" href="styles/accueil.css">';

ob_start();
?>

<section class="hero-accueil">
    <div class="hero-accueil__overlay"></div>
    <div class="hero-accueil__contenu">
        <h1 class="hero-accueil__titre">VIVEZ L' <span class="hero-accueil__titre--or">AVENTURE</span></h1>
        <p class="hero-accueil__sous-titre">Plongez dans des univers immersifs, résolvez des énigmes captivantes et échappez-vous avant la fin du temps.</p>
        <a href="index.php?action=escapeGames" class="hero-accueil__bouton">Découvrir nos escape <span class="hero-accueil__bouton-icone">→</span></a>
    </div>
</section>

<?php

if (isset($acces[0]['statut'])) {
    switch ($acces[0]['statut']) {
        case "1":
            echo "<div>vous êtes connecté en tant qu'utilisateur</div>
            <a href='index.php?action=deconnexion'>Déconnexion</a>";
            break;
        case "2":
            echo "<div>vous êtes connecté en tant qu'administrateur</div>
            <a href='index.php?action=utilisateurs'>Liste des utilisateurs</a>
            <a href='index.php?action=pageAjoutEscape'>Ajouter un escape game</a>
            <a href='index.php?action=deconnexion'>Déconnexion</a>";
            break;
        default:
            echo "<div>vous n'êtes pas connecté</div>
            <a href='index.php?action=pageConnexion'>Connexion</a>
            <a href='index.php?action=pageInscription'>Inscription</a>";
    }
} else {
    echo "<div>vous n'êtes pas connecté</div>
    <a href='index.php?action=pageConnexion'>Connexion</a>
    <a href='index.php?action=pageInscription'>Inscription</a>";
}


?>
<?php

$main = ob_get_clean();

$script = '';