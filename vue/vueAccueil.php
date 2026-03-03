<?php

$style = '<link rel="stylesheet" href="styles/accueil.css">';

?>

<section class="hero-accueil">
    <div class="hero-accueil__overlay"></div>
    <div class="hero-accueil__inner">

        <!-- COLONNE TEXTE -->
        <div class="hero-accueil__contenu">
            <h1 class="hero-accueil__titre">
                <span id="titreAcc">VIVEZ L'</span>
                <span class="hero-accueil__titre--or" id="aventure">AVENTURE</span>
            </h1>
            <p class="hero-accueil__sous-titre" id="soustitreAcc">
                Plongez dans des univers immersifs, résolvez des énigmes captivantes et échappez-vous avant la fin du
                temps.
            </p>
            <a href="index.php?action=escapeGames" class="hero-accueil__bouton" id="lienBoutonAcc">
                Découvrir nos escapes <span class="hero-accueil__bouton-icone"><svg xmlns="http://www.w3.org/2000/svg"
                        width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h13M12 5l7 7-7 7" />
                    </svg></span>
            </a>
        </div>
        <!-- COLONNE 3D -->
        <div class="hero-accueil__3d">
            <div id="three-container"></div>
        </div>
    </div>
</section>

<section class="accueil-section accueil-experience">
    <div class="accueil-conteneur">
        <h2 class="accueil-titre">
            <span id="titreAcc_h2">L'EXPÉRIENCE</span>
            <span class="accueil-titre--or" id="elife">ELIFE</span>
        </h2>
        <p class="accueil-experience__texte" id="textAcc">La Clé ELIFE vous propose des escape games d'exception. Chaque salle est
            conçue pour vous transporter dans un autre monde, avec des décors réalistes, des mécanismes ingénieux et des
            scénarios captivants. Que vous soyez débutant ou expert, venez relever le défi !</p>
    </div>
</section>

<section class="accueil-section2 accueil-escapes">
    <div class="accueil-conteneur">
        <h2 class="accueil-titre">
            <span id="nos">NOS</span>
            <span class="accueil-titre--or" id="suitetitreh2">ESCAPES</span>
        </h2>
        <div class="accueil-escapes__grille">


            <!-- ------------------------------ -->
            <?php foreach ($escapeGames as $game): ?>
                <article class="accueil-escape-card">
                    <div class="accueil-escape-card__img">
                        <?php
                        $dossier = "photos_escapes/";
                        $id = $game['id_escape'];

                        $extensions = ['jpg', 'jpeg', 'png', 'webp'];
                        $imagePath = null;

                        foreach ($extensions as $ext) {
                            if (file_exists($dossier . $id . "." . $ext)) {
                                $imagePath = $dossier . $id . "." . $ext;
                                break;
                            }
                        }
                        ?>

                        <?php if ($imagePath): ?>
                            <img alt="Image de présentation de l'escape game" loading="lazy" src="<?= $imagePath ?>" width="100%">
                        <?php else: ?>
                            <div class="placeholder-img"></div>
                        <?php endif; ?>
                    </div>

                    <div class="accueil-escape-card__corps">
                        <h3 class="accueil-escape-card__titre"><?= $game['nom'] ?></h3>

                        <p class="accueil-escape-card__desc">
                            <?= $game['description'] ?>
                        </p>

                        <div class="accueil-escape-card__infos">
                            <span class="accueil-escape-card__duree">
                                <?= $game['duree'] ?>h
                            </span>

                            <span class="accueil-escape-card__personnes">
                                <?= $game['nbr_pers_min'] ?>-<?= $game['nbr_pers_max'] ?>
                            </span>
                        </div>

                        <p class="accueil-escape-card__prix">28€ / pers</p>

                        <a href="index.php?action=game&idEscapeGame=<?= $game['id_escape'] ?>"
                            class="accueil-escape-card__btn">
                            Voir détails
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php

if (isset($acces[0]['statut'])) {
    switch ($acces[0]['statut']) {
        case "1":
            echo "<div>vous êtes connecté en tant qu'utilisateur</div>";
            break;
        case "2":
            echo "<div>vous êtes connecté en tant qu'administrateur</div>
            <a href='index.php?action=utilisateurs'>Liste des utilisateurs</a>
            <a href='index.php?action=pageAjoutEscape'>Ajouter un escape game</a>";
            break;
        default:
            echo "<div>vous n'êtes pas connecté</div>
            <a href='index.php?action=pageConnexion'>Connexion</a>
            <a href='index.php?action=pageInscription'>Inscription</a>";
    }
}

?>
<?php

$script = '<script type="module" src="js/three-key.js"></script>';
$script .= '<script src="js/json.js" defer></script>';
