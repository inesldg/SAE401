<?php
// Ajout dynamique de la feuille de style spécifique à la page accueil
$style = '<link rel="stylesheet" href="styles/accueil.css">';
$head_extra = '<script type="importmap">{"imports":{"three":"https://unpkg.com/three@0.160.0/build/three.module.js","three/addons/":"https://unpkg.com/three@0.160.0/examples/jsm/"}}</script>';

?>

<!-- ===== AUDIO D'AMBIANCE ===== -->
<!-- Son immersif pour renforcer l'expérience utilisateur sur la page d'accueil -->
<audio id="ambiance" loop>
    <source src="sons/ambiance.mp3" type="audio/mpeg">
</audio>

<!-- Bouton permettant d'activer ou désactiver le son d'ambiance -->
<button type="button" id="btn-son" class="accueil-btn-son" aria-label="Activer ou désactiver le son d'ambiance">
    <svg class="accueil-btn-son__icon accueil-btn-son__icon--on" xmlns="http://www.w3.org/2000/svg" width="22"
        height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round" aria-hidden="true">
        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
        <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
    </svg>
    <svg class="accueil-btn-son__icon accueil-btn-son__icon--off" xmlns="http://www.w3.org/2000/svg" width="22"
        height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round">
        <path d="M11 5L6 9H2v6h4l5 4zM22 9l-6 6M16 9l6 6" />
    </svg>
</button>

<!-- ===== HERO SECTION ===== -->
<!-- Première section visible de la page : présentation immersive du site -->
<section class="hero-accueil">
    <div class="hero-accueil__overlay"></div>
    <div class="hero-accueil__inner">

        <!-- COLONNE TEXTE -->
        <div class="hero-accueil__contenu">
            <h1 class="hero-accueil__titre reveal reveal-up">
                <span id="titreAcc">VIVEZ L'</span>
                <span class="hero-accueil__titre--or" id="aventure">AVENTURE</span>
            </h1>
            <p class="hero-accueil__sous-titre reveal reveal-up" id="soustitreAcc">
                Plongez dans des univers immersifs, résolvez des énigmes captivantes et échappez-vous avant la fin du
                temps.
            </p>
            <a href="index.php?action=escapeGames" class="hero-accueil__bouton reveal reveal-up" id="lienBoutonAcc">
                Découvrir nos escapes <span class="hero-accueil__bouton-icone"><svg xmlns="http://www.w3.org/2000/svg"
                        width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h13M12 5l7 7-7 7" />
                    </svg></span>
            </a>
        </div>

        <!-- ===== COLONNE 3D ===== -->
        <!-- Conteneur utilisé par Three.js pour afficher l'objet 3D -->
        <div class="hero-accueil__3d">
            <div id="three-container"></div>
        </div>
    </div>
</section>

<!-- ===== SECTION PRESENTATION EXPERIENCE ===== -->
<section class="accueil-section accueil-experience">
    <div class="accueil-conteneur">
        <h2 class="accueil-titre reveal reveal-up">
            <span id="titreAcc_h2">L'EXPÉRIENCE</span>
            <span class="accueil-titre--or" id="elife">ELIFE</span>
        </h2>
        <p class="accueil-experience__texte reveal reveal-up" id="textAcc">La Clé ELIFE vous propose des escape games
            d'exception. Chaque salle est
            conçue pour vous transporter dans un autre monde, avec des décors réalistes, des mécanismes ingénieux et des
            scénarios captivants. Que vous soyez débutant ou expert, venez relever le défi !</p>
    </div>
</section>

<!-- ===== SECTION ESCAPES GAMES ===== -->
<section class="accueil-section2 accueil-escapes">
    <div class="accueil-conteneur">
        <h2 class="accueil-titre reveal reveal-up">
            <span id="nos">Nos derniers</span>
            <span class="accueil-titre--or" id="suitetitreh2">ESCAPES</span>
        </h2>
        <div class="accueil-escapes__grille">


            <!-- ===== BOUCLE PHP ===== -->
            <!-- Affiche dynamiquement les escape games depuis la base de données -->
            <!-- ------------------------------ -->
            <?php foreach ($escapeGames as $game): ?>
                <article class="accueil-escape-card">
                    <div class="accueil-escape-card__img">
                        <?php

                        // Recherche automatique de l'image correspondant à l'id de l'escape game
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
                            <!-- Si une image existe on l'affiche -->
                            <img alt="Image de présentation de l'escape game" loading="lazy" src="<?= $imagePath ?>"
                                width="100%">
                        <?php else: ?>
                            <!-- Sinon on affiche un placeholder -->
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <?= $game['duree'] ?> min
                            </span>

                            <span class="accueil-escape-card__personnes">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <?= $game['nbr_pers_min'] ?> à <?= $game['nbr_pers_max'] ?>
                            </span>

                            <span class="accueil-escape-card__personnes">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M16.2 7.8l-2 6.3-6.4 2.1 2-6.3z" />
                                </svg>
                                <?= $game['lieu'] ?>
                            </span>
                        </div>

                        <!-- Lien vers la page détaillée de l'escape game -->
                        <a class="accueil-escape-card__prix"
                            href="index.php?action=game&idEscapeGame=<?= $game['id_escape'] ?>" id="detailEscapeGam">
                            Voir détails
                        </a>
                    </div>

                    <a href="index.php?action=game&idEscapeGame=<?= $game['id_escape'] ?>" class="accueil-escape-card__link"
                        aria-label="Voir détails : <?= htmlspecialchars($game['nom']) ?>"></a>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Lien vers la page listant tous les escape games -->
        <div class="accueil-escapes__lien-wrap">
            <a href="index.php?action=escapeGames" id="toutEscapes" class="accueil-escapes__lien reveal reveal-up">Voir
                tous les escapes →</a>
        </div>
    </div>
</section>

<?php

// ===== AFFICHAGE SELON LE STATUT UTILISATEUR =====
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

// ===== SCRIPTS JAVASCRIPT =====
// Script Three.js pour l'objet 3D de la page d'accueil

$script = '<script type="module" src="js/three-key.js"></script>';

// Scripts traduction (commun + header + footer + page)
$script .= '<script src="js/traduction/tradCommun.js" defer></script><script src="js/traduction/tradHeader.js" defer></script><script src="js/traduction/tradFooter.js" defer></script><script src="js/traduction/tradAccueil.js" defer></script><script src="js/traduction.js" defer></script>';

// Script contrôlant l'activation / désactivation du son d'ambiance
$script .= '<script>
document.addEventListener("DOMContentLoaded", function () {
    var audio = document.getElementById("ambiance");
    var btn = document.getElementById("btn-son");
    if (!audio || !btn) return;
    audio.volume = 0.05;
    function updateIcon() {
        btn.classList.toggle("accueil-btn-son--playing", !audio.paused);
    }
    btn.addEventListener("click", function () {
        if (audio.paused) audio.play(); else audio.pause();
        updateIcon();
    });
    updateIcon();
});
</script>';
