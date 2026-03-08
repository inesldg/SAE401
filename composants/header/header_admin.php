// Récupère l'action dans l'URL (ex: index.php?action=contact)
// Si aucune action n'est définie, la page par défaut est "accueil"
<?php

// Header qui s'affiche lorsque l'utilisateur est connecté en tant qu'admin

$currentAction = $_GET['action'] ?? 'accueil';
?>

<!-- ===== HEADER PRINCIPAL DU SITE ===== -->
<header class="main-header">
    <!-- Logo du site redirigeant vers la page d'accueil -->
    <a href="index.php?action=accueil"><img class="imglogo2" src="images/logo.png" alt="logo elife"></a>

    <!-- Bouton burger utilisé pour afficher/masquer le menu sur mobile -->
    <div class="header-actions">
        <button class="burger-menu" id="burgerBtn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Liens menu navigateur +  dashboard -->
        <nav class="nav-menu" id="navMenu">
            <!-- Chaque lien vérifie si l'action actuelle correspond pour appliquer la classe "active" -->
            <!-- Cela permet de surligner la page active dans le menu -->
            <a href="index.php?action=accueil" id="menuAcc" <?= $currentAction === 'accueil' ? 'class="active"' : '' ?>>Accueil</a>
            <a href="index.php?action=propos" id="menuPropos" <?= $currentAction === 'propos' ? 'class="active"' : '' ?>>À
                propos</a>
            <a href="index.php?action=escapeGames" id="menuNosEscapes" <?= in_array($currentAction, ['escapeGames', 'game', 'pageVoirToutLesAvis']) ? 'class="active"' : '' ?>>Nos escapes</a>
            <a href="index.php?action=contact" id="menuContact" <?= $currentAction === 'contact' ? 'class="active"' : '' ?>>Contact</a>
            <a href="index.php?action=dash" id="menuDash" <?= in_array($currentAction, ['dash', 'dashCalendrier', 'dashAvis', 'pageAjoutEscape', 'utilisateurs']) ? 'class="active"' : '' ?>>Dashboard</a>
            <a href="index.php?action=compte" id="menuCompte" <?= in_array($currentAction, ['compte', 'modifInfos']) ? 'class="active"' : '' ?>>Mon compte</a>
            <a href="index.php?action=deconnexion" id="menudeco">Déconnexion</a>

            <div class="lang-switcher">
                <button data-langue="fr" class="active">FR</button>
                <button data-langue="en">EN</button>
                <button data-langue="de">DE</button>
            </div>

            <!-- Boutons de réservation mobile & ordi -->
            <a href="index.php?action=escapeGames" class="btn-reserve mobile-only">
                Réserver
            </a>
        </nav>

        <!-- Bouton principal de réservation visible sur desktop -->
        <!-- Contient une icône SVG calendrier -->
        <a href="index.php?action=escapeGames" class="btn-reserve desktop-only" id="reserver">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            <span class="btn-text">Réserver</span>
        </a>
    </div>
</header>