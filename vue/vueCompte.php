<?php
// Ta logique de config
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}
$lang = $_SESSION['lang'];

// Style dynamique (si besoin)
$style = '<link rel="stylesheet" href="styles/compteEtModif.css">';
?>

<body>

    <div class="background-fond">

        <div class="carte">
            <div class="carte-couleur"></div>

            <form method="post" action="<?= $_SERVER["PHP_SELF"] . "?action=modifInfos" ?>" class="carte-contenu">

                <div class="ligne-profil">
                    <div class="infos-utilisateur">
                        <div class="pdp">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                    fill="#888" />
                            </svg>
                        </div>
                        <div class="infos-texte">
                            <h2><?= $infosCompte[0]['prenom'] . ' ' . $infosCompte[0]['nom'] ?></h2>
                            <p><?= $infosCompte[0]['mail'] ?></p>
                        </div>
                    </div>
                    <button type="submit" name="modifierInfos" class="bouton-sauvegarder"
                        id="modifCompte">Sauvegarder</button>
                </div>

                <div class="grille-formulaire">
                    <div class="case">
                        <label id="nomCompte">NOM</label>
                        <input type="text" name="nom" placeholder="<?= $infosCompte[0]['nom'] ?>" value="">
                    </div>
                    <div class="case">
                        <label id="prenomCompte">PRÉNOM</label>
                        <input type="text" name="prenom" placeholder="<?= $infosCompte[0]['prenom'] ?>" value="">
                    </div>
                </div>

                <div class="section-mdp">
                    <div class="case">
                        <label id="entrerMDPCompte">Entrez votre mot de passe pour enregistrer</label>
                        <input type="password" name="mdp" id="inputmdp" placeholder="Votre mot de passe" required>
                    </div>
                </div>

                <div class="email">
                    <p class="adresseemail" id="mailCompteActuel">ADRESSE MAIL ACTUELLE</p>
                    <div class="boite-email">
                        <?= $infosCompte[0]['mail'] ?>
                    </div>
                    <div class="case" style="margin-top:15px; width: 100%; max-width: 400px;">
                        <input type="email" name="mail" placeholder="Nouvelle adresse mail (optionnel)">
                    </div>
                    <span class="message-php"><?= $message ?></span>
                </div>
            </form>
        </div>
    </div>

    <script src="js/json.js" defer></script>
</body>

</html>