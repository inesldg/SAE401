<?php

$style = '<link rel="stylesheet" href="styles/accueil.css">';

?>

<section class="hero-accueil">
    <div class="hero-accueil__overlay"></div>
    <div class="hero-accueil__inner">

        <!-- COLONNE TEXTE -->
        <div class="hero-accueil__contenu">
            <h1 class="hero-accueil__titre" id="titreAcc">
                VIVEZ L' <span class="hero-accueil__titre--or" id="aventure">AVENTURE</span>
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
        <h2 class="accueil-titre" id="titreAcc_h2" >L'EXPÉRIENCE <span class="accueil-titre--or" id="elife" >ELIFE</span></h2>
        <p class="accueil-experience__texte">La Clé ELIFE vous propose des escape games d'exception. Chaque salle est
            conçue pour vous transporter dans un autre monde, avec des décors réalistes, des mécanismes ingénieux et des
            scénarios captivants. Que vous soyez débutant ou expert, venez relever le défi !</p>
    </div>
</section>

<section class="accueil-section2 accueil-escapes">
    <div class="accueil-conteneur">
        <h2 class="accueil-titre" id="nos">NOS <span class="accueil-titre--or" id="suitetitreh2">ESCAPES</span></h2>
        <div class="accueil-escapes__grille">


            <!-- ------------------------------ -->
            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre"><?= $escapeGames[0]['nom'] ?></h3>
                    <p class="accueil-escape-card__desc">
                        <?= $escapeGames[0]['description'] ?>
                    </p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">
                            <?= $escapeGames[0]['duree'] ?>h
                        </span>
                        <span class="accueil-escape-card__personnes">
                            <?= $escapeGames[0]['nbr_pers_min'] ?>-<?= $escapeGames[0]['nbr_pers_max'] ?>
                        </span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>

                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>
            <!-- ------------------------------ -->

            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre">TITRE</h3>
                    <p class="accueil-escape-card__desc">Enfin un escape game qui nous fait lever le nez ! Jouer avec
                        l'architecture de la ville comme si c'était un mécanisme géant est génial. On a adoré parcourir
                        les parcs avec nos boussoles.

                        — Léa M.</p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">120 min</span>
                        <span class="accueil-escape-card__personnes">2-6</span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>
                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>
            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre">TITRE</h3>
                    <p class="accueil-escape-card__desc">Mini blabla : Hopla vous savez que la mamsell Huguette, la miss
                        Miss Dahlias du messti de Bischheim</p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">120 min</span>
                        <span class="accueil-escape-card__personnes">2-6</span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>
                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>
            <article class="accueil-escape-card">
                <div class="accueil-escape-card__img"></div>
                <div class="accueil-escape-card__corps">
                    <h3 class="accueil-escape-card__titre">TITRE</h3>
                    <p class="accueil-escape-card__desc">Mini blabla : Hopla vous savez que la mamsell Huguette, la miss
                        Miss Dahlias du messti de Bischheim</p>
                    <div class="accueil-escape-card__infos">
                        <span class="accueil-escape-card__duree">120 min</span>
                        <span class="accueil-escape-card__personnes">2-6</span>
                    </div>
                    <p class="accueil-escape-card__prix">28€ / pers</p>
                    <a href="#" class="accueil-escape-card__btn">Voir détails</a>
                </div>
            </article>
        </div>
        <p class="accueil-escapes__lien-wrap"><a href="index.php?action=escapeGames" class="accueil-escapes__lien">Voir
                tout les escape →</a></p>
    </div>
</section>

<section class="accueil-section accueil-avis">
    <div class="accueil-conteneur">
        <h2 class="accueil-titre" id="avistitre_h2" >AVIS <span class="accueil-titre--or" id="suiteClient_h2">CLIENTS</span></h2>
        <div class="accueil-avis__grille">
            <article class="accueil-avis-card">
                <div class="accueil-avis-card__etoiles">★★★★★</div>
                <p class="accueil-avis-card__texte">Enfin un escape game qui nous fait lever le nez ! Jouer avec
                    l'architecture de la ville comme si c'était un mécanisme géant est génial. On a adoré parcourir les
                    parcs avec nos boussoles.</p>
                <p class="accueil-avis-card__auteur">Emilien.D</p>
            </article>
            <article class="accueil-avis-card">
                <div class="accueil-avis-card__etoiles">★★★★★</div>
                <p class="accueil-avis-card__texte">Idéal pour un moment entre amis. Les énigmes de ELIFE sont
                    intelligentes et demandent une vraie communication. On ne voit pas le temps passer, même en plein
                    air !</p>
                <p class="accueil-avis-card__auteur">Emilien.D</p>
            </article>
            <article class="accueil-avis-card">
                <div class="accueil-avis-card__etoiles">★★★★★</div>
                <p class="accueil-avis-card__texte">Une immersion totale. L'histoire est captivante du début à la fin et
                    le matériel prêté est de super qualité. Une expérience premium qui change des salles classiques.</p>
                <p class="accueil-avis-card__auteur">Emilien.D</p>
            </article>
            <article class="accueil-avis-card">
                <div class="accueil-avis-card__etoiles">★★★★★</div>
                <p class="accueil-avis-card__texte">Marre d'être enfermés dans une petite pièce ? Ici, le terrain de jeu
                    est immense. On utilise des indices cachés sur les monuments réels, c'est grisant. Une expérience
                    insolite que je recommande à 100% pour redécouvrir la ville.</p>
                <p class="accueil-avis-card__auteur">Emilien.D</p>
            </article>
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
