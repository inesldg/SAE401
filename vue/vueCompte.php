<?php
// -----------------------------
// Gestion de la langue du site
// -----------------------------
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}
$lang = $_SESSION['lang'];

// Style
$style = '<link rel="stylesheet" href="styles/compteEtModif.css">';

// Photo de profil : chercher dans photos_utilisateurs (id_utilisateur.ext)
// ?t=filemtime évite le cache navigateur après un nouvel upload (image à jour sans recharger)
$photoProfilPath = null;
$idUtilisateur = $infosCompte[0]['id_utilisateur'] ?? null;
if ($idUtilisateur) {
    $dossier = "photos_utilisateurs/";
    $dossierAbsolu = dirname(__DIR__) . DIRECTORY_SEPARATOR . "photos_utilisateurs" . DIRECTORY_SEPARATOR;
    foreach (array('jpg', 'jpeg', 'png', 'webp') as $ext) {
        $fichierAbsolu = $dossierAbsolu . $idUtilisateur . "." . $ext;
        if (file_exists($fichierAbsolu)) {
            $photoProfilPath = $dossier . $idUtilisateur . "." . $ext . '?t=' . filemtime($fichierAbsolu);
            break;
        }
    }
}
?>

<!-- Fond de la page -->
<div class="background-fond">
    <?php if (!empty($message)): ?>
        <p class="compte-message"><?= $message ?></p>
    <?php endif; ?>

    <!-- Carte principale contenant le formulaire -->
    <div class="carte">
        <div class="carte-couleur">
            <h1 class="carte-couleur__titre reveal reveal-up" id="titreModifCompte">Modification de vos informations
            </h1>
        </div>

        <form method="post" action="<?= $_SERVER["PHP_SELF"] . "?action=modifInfos" ?>" class="carte-contenu" enctype="multipart/form-data">

            <div class="ligne-profil">
                <div class="infos-utilisateur">
                    <label class="pdp-wrapper" for="inputPhotoProfil" title="Changer la photo de profil">
                        <div class="pdp">
                            <?php if ($photoProfilPath): ?>
                                <img src="<?= htmlspecialchars($photoProfilPath) ?>" alt="Photo de profil" class="pdp-img">
                            <?php else: ?>
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z" fill="#888" />
                                </svg>
                            <?php endif; ?>
                        </div>
                        <span class="pdp-crayon" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </span>
                        <input type="file" name="photoProfil" id="inputPhotoProfil" accept="image/jpeg,image/png,image/webp" class="pdp-input-hidden">
                    </label>
                    <div class="infos-texte">
                        <h2><?= $infosCompte[0]['prenom'] . ' ' . $infosCompte[0]['nom'] ?></h2>
                        <p><?= $infosCompte[0]['mail'] ?></p>
                    </div>
                </div>
                <button type="submit" name="modifierInfos" class="bouton-sauvegarder"
                    id="modifCompte">Sauvegarder</button>
            </div>

            <!-- Grille contenant les champs du formulaire -->
            <div class="grille-formulaire">
                <div class="case">
                    <label id="nomCompte">NOM</label>
                    <input type="text" name="nom" placeholder="<?= htmlspecialchars($infosCompte[0]['nom'] ?? '') ?>"
                        value="">
                </div>
                <div class="case">
                    <label id="prenomCompte">PRÉNOM</label>
                    <input type="text" name="prenom"
                        placeholder="<?= htmlspecialchars($infosCompte[0]['prenom'] ?? '') ?>" value="">
                </div>
                <div class="case case--pleine">
                    <label id="telCompte">Numéro de téléphone</label>
                    <input type="tel" name="tel" id="inputtel"
                        placeholder="<?= htmlspecialchars(!empty($infosCompte[0]['tel']) ? $infosCompte[0]['tel'] : '06 06 06 06 06') ?>">
                </div>
            </div>

            <!-- Section email -->
            <div class="email">
                <p class="adresseemail" id="mailCompteActuel">ADRESSE MAIL ACTUELLE</p>
                <div class="boite-email">
                    <?= $infosCompte[0]['mail'] ?>
                </div>
                <div class="case" style="margin-top:15px; width: 100%; max-width: 400px;">
                    <label id="nouvelleMailCompte">Nouvelle adresse mail (optionnel)</label>
                    <input type="email" name="mail" id="inputNewMail" placeholder="Nouvelle adresse mail (optionnel)">
                </div>
            </div>

            <!-- Section sécurité : confirmation du mot de passe -->
            <div class="section-mdp">
                <p class="section-mdp__intro" id="introModifCompte">Pour enregistrer vos modifications, saisissez votre
                    mot de passe actuel.</p>
                <div class="case">
                    <label id="entrerMDPCompte">MOT DE PASSE ACTUEL</label>
                    <input type="password" name="mdp" id="inputmdp" placeholder="Votre mot de passe" required>
                </div>
                <div class="case case--confirmer-mdp">
                    <label id="confirmerMDPCompte">Confirmer le mot de passe</label>
                    <input type="password" name="mdp_confirm" id="inputmdpconfirm"
                        placeholder="Confirmer votre mot de passe" required>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
$script = '<script src="js/traduction/tradCommun.js" defer></script><script src="js/traduction/tradHeader.js" defer></script><script src="js/traduction/tradFooter.js" defer></script><script src="js/traduction/tradCompte.js" defer></script><script src="js/traduction.js" defer></script>';
?>