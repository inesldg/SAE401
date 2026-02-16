<?php

$style = '';

$header;

ob_start();
?>

<a href="index.php?action=escapeGames">Découvrez nos escape games</a>

<?php

if (isset($acces[0]['statut'])){
    switch($acces[0]['statut']){
        case "1" :
            echo "<div>vous êtes connecté en tant qu'utilisateur</div>
            <a href='index.php?action=deconnexion'>Déconnexion</a>";
        break;
        case "2" :
            echo "<div>vous êtes connecté en tant qu'administrateur</div>
            <a href='index.php?action=utilisateurs'>Liste des utilisateurs</a>
            <a href='index.php?action=pageAjoutEscape'>Ajouter un escape game</a>
            <a href='index.php?action=deconnexion'>Déconnexion</a>";
        break;
        default :
            echo "<div>vous n'êtes pas connecté</div>
            <a href='index.php?action=pageConnexion'>Connexion</a>
            <a href='index.php?action=pageInscription'>Inscription</a>";
    }
}
else {
    echo "<div>vous n'êtes pas connecté</div>
    <a href='index.php?action=pageConnexion'>Connexion</a>
    <a href='index.php?action=pageInscription'>Inscription</a>";
}


?>
<?php

$main = ob_get_clean();

$footer;

$script = '';