<header class="main-header">

    <a href="index.php?action=accueil"><img class="imglogo2" src="images/logo.png" alt="logo elife"></a>

    <div class="header-actions">
        <button class="burger-menu" id="burgerBtn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="nav-menu" id="navMenu">
            <a href="index.php?action=accueil" id="menuAcc">Accueil</a>
            <a href="index.php?action=propos" id="menuPropos">À propos</a>
            <a href="index.php?action=escapeGames" id="menuNosEscapes">Nos escapes</a>
            <a href="index.php?action=contact" id="menuContact">Contact</a>
            <a href="index.php?action=compte" id="menuCompte">Mon compte</a>
            <a href="index.php?action=deconnexion" id="menudeco">Déconnexion</a>

            <div class="lang-switcher">
                <button data-langue="fr" class="active">FR</button>
                <button data-langue="en">EN</button>
            </div>

            <a href="index.php?action=escapeGames" class="btn-reserve mobile-only">
                Réserver
            </a>
        </nav>

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