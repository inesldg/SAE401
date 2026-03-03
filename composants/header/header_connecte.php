<header class="main-header">

    <a href="index.php?action=accueil"><img class="imglogo2" src="images/logo.png" alt="logo elife"></a>


    <div class="header-actions">
        <nav class="nav-menu">
            <a href="index.php?action=accueil" id="menuAcc">Accueil</a>
            <a href="index.php?action=propos" id="menuPropos">À propos</a>
            <a href="index.php?action=escapeGames" id="menuNosEscapes">Nos escapes</a>
            <a href="index.php?action=accueil" id="menuContact">Contact</a> <!-- A MODIFIER -->
            <a href="index.php?action=compte" id="menuCompte">Mon compte</a>
            <!-- A MODIFIER - ajouter vue pour modifier info compte -->
            <a href="index.php?action=deconnexion" id="menudeco">Déconnexion</a>
            
            <div class="lang-switcher">
                <button data-langue="fr" class="active">FR</button>
                <button data-langue="en">EN</button>
            </div>
            <button type="button" id="btn-son" class="header-btn-son" aria-label="Activer ou désactiver le son d'ambiance">
                <svg class="header-btn-son__icon header-btn-son__icon--on" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                    <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                </svg>
                <svg class="header-btn-son__icon header-btn-son__icon--off" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 5L6 9H2v6h4l5 4zM22 9l-6 6M16 9l6 6"/>
                </svg>
            </button>

        </nav>
        <a href="index.php?action=escapeGames" class="btn-reserve" id="reserver">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            Réserver
        </a>
    </div>
</header>