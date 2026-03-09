<?php

// var_dump($jour, $horaire, $nbrPersonnes, $panier);

// Config Langue
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}

// Données de l'escape game pour l'affichage
$escape = isset($panier[0]) ? $panier[0] : null;
$nomEscape = $escape && isset($escape['nom']) ? $escape['nom'] : '';
$descEscape = $escape && isset($escape['description']) ? $escape['description'] : '';
$prixEscape = $escape && isset($escape['prix']) ? (int) $escape['prix'] : 0;

// Date complète : jour + mois + année (mois/année par défaut si non passés ou vides)
$mois = (isset($mois) && $mois !== '') ? (int) $mois : (int) date('n');
$annee = (isset($annee) && $annee !== '') ? (int) $annee : (int) date('Y');
$jour = (isset($jour) && $jour !== '') ? (int) $jour : (int) date('j');
$mois = max(1, min(12, $mois));
$dateReserve = sprintf('%04d-%02d-%02d', $annee, $mois, $jour);
$nomsMois = array(1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
$dateAffichage = $jour . ' ' . $nomsMois[$mois] . ' ' . $annee;

// Image de l'escape si elle existe
$imageEscape = null;
if ($escape && !empty($escape['id_escape'])) {
    $dossier = "photos_escapes/";
    $id = $escape['id_escape'];
    $extensions = array('jpg', 'jpeg', 'png', 'webp');
    foreach ($extensions as $ext) {
        if (file_exists($dossier . $id . "." . $ext)) {
            $imageEscape = $dossier . $id . "." . $ext;
            break;
        }
    }
}

// Style
$style = '<link rel="stylesheet" href="styles/panier.css">';
?>

<main class="panier">
    <div class="conteneur-principal">

        <!-- ---------------------------
             Colonne gauche : Panier et codes promo
             --------------------------- -->
        <div class="colonne-gauche reveal reveal-up">
            <div class="section-panier carte reveal reveal-up">
                <h1 id="panierPanier">Votre réservation</h1>

                <div class="produit">
                    <?php if ($imageEscape): ?>
                        <img src="<?= htmlspecialchars($imageEscape) ?>" alt="<?= htmlspecialchars($nomEscape) ?>"
                            class="image-panier">
                    <?php else: ?>
                        <div class="image-remplacement">img</div>
                    <?php endif; ?>
                    <div class="infos-produit">
                        <h3><?= htmlspecialchars($nomEscape) ?></h3>
                        <div class="description">
                            <?= htmlspecialchars($descEscape) ?>
                        </div>
                        <div class="ligne-recap">
                            <span class="recap-date">Date : <?= htmlspecialchars($dateAffichage) ?></span>
                            <span class="recap-horaire">Horaire : <?= $horaire ?></span>
                            <span class="recap-personnes"><?= $nbrPersonnes ?> personne(s)</span>
                        </div>
                        <div class="ligne-prix">
                            <div class="prix-unitaire"><?= $prixEscape ?> €</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Section code promo / bons -->
            <div class="carte reveal reveal-up carte-bons">
                <h2 id="codePanier">Code Promo / Bons ?</h2>
                <div class="groupe-saisie">
                    <input type="text" class="saisie-promo" id="inputcodepromo"
                        placeholder="Entrez le code inscrit sur le bon">
                    <button class="bouton-or" id="appliquerPanier">Appliquer</button>
                </div>
                <div class="indication" id="indiqPanier">Saisissez le code sans espace entre les caractères</div>
            </div>
        </div>


        <!-- ---------------------------
             Colonne latérale : Informations utilisateur et paiement
             --------------------------- -->
        <div class="colonne-laterale reveal reveal-up">

            <div class="carte reveal reveal-up">
                <h2 id="infoPanier">Vos Informations</h2>
                <form method="post" action=<?= $_SERVER["PHP_SELF"] . "?action=confirmation" ?>>
                    <div class="grille-nom-prenom">
                        <div class="ligne-formulaire">
                            <label for="inputnom" id="nomCompte">Nom</label>
                            <input type="text" name="nom" id="inputnom" placeholder="Votre nom" required>
                        </div>
                        <div class="ligne-formulaire">
                            <label for="inputprenom" id="prenomCompte">Prénom</label>
                            <input type="text" name="prenom" id="inputprenom" placeholder="Votre prénom" required>
                        </div>
                    </div>

                    <div class="ligne-formulaire">
                        <label for="inputemail" id="mailCompte">Email</label>
                        <input type="email" name="mail" id="inputemail" placeholder="Votre adresse email" required>
                    </div>

                    <div class="ligne-formulaire">
                        <label for="inputadresse" id="adressepostalPanier">Adresse</label>
                        <input type="text" name="adresse" id="inputadresse" placeholder="Votre adresse postale"
                            required>
                    </div>

                    <h2 style="margin-top: 40px; margin-bottom: 10px;" id="payerPanier">Payer avec</h2>

                    <div class="carte-bleue-wrapper">
                        <svg width="100%" height="auto" viewBox="0 0 273 167" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="273" height="167" rx="12" fill="#2B3893" />
                        </svg>
                        <!-- Carte bancaire graphique + champs -->
                        <div class="carte-bleue-contenu">
                            <div class="ligne-carte">
                                <label for="inputNumCarte" id="inputNumTitre">Numéro de carte</label>
                                <input type="text" name="numCarte" id="inputNumCarte" value=""
                                    placeholder="0000 0000 0000 0000" maxlength="19" required autocomplete="cc-number">
                            </div>
                            <div class="ligne-carte">
                                <label for="inputMoisExpiration" id="inputExpiration">Expiration</label>
                                <div class="ligne-carte-exp">
                                    <input type="text" name="moisExpiration" id="inputMoisExpiration"
                                        class="input-carte-court" value="" placeholder="MM" maxlength="2" required>
                                    <span style="color:#fff;">/</span>
                                    <input type="text" name="anneeExpiration" id="inputAnneeExpiration"
                                        class="input-carte-court" value="" placeholder="AA" maxlength="2" required>
                                </div>
                            </div>
                            <div class="ligne-carte">
                                <label for="inputNumCarteDos" id="inputCVV">Code CVV</label>
                                <input type="text" name="numCarteDos" id="inputNumCarteDos" class="input-carte-cvc"
                                    value="" placeholder="000" maxlength="3" required>
                            </div>
                        </div>
                        <!-- Logo de la carte -->

                        <div class="card-brand-zone" id="card-brand-zone" aria-hidden="true">
                            <span class="card-brand-label" id="card-brand-label">Carte</span>
                        </div>
                    </div>
                    <div class="indication2" id="retournercartePanier">Veuillez rentrer vos coordonnées bancaires</div>

                    <!-- ---------------------------------------------------------------- -->
                    <!-- Ne pas toucher -->
                    <!-- ---------------------------
                         Champs cachés pour la gestion du panier
                         --------------------------- -->
                    <!-- <input type="hidden" name="montant" id="montantPanier"
                        value="<?= isset($panier[0]['prix']) ? (int) $panier[0]['prix'] : 141 ?>">
                    <input type="hidden" name="jourReserve" value="<?= $jour ?>">

                    <input type="hidden" name="horaireReserve" value="<?= $horaire ?>">

                    <input type="hidden" name="nbrPersonneReserve" id="inputNbrPersonnesForm" value="<?= $nbrPersonnes ?>">

                    <input type="hidden" name="idEscapeReserve" value="<?= $panier[0]['id_escape'] ?>"> -->

                    <input type="hidden" name="montant" id="montantPanier"
                        value="<?= $prixEscape ? $prixEscape : 141 ?>">
                    <input type="hidden" name="dateReserve" value="<?= htmlspecialchars($dateReserve) ?>">
                    <input type="hidden" name="horaireReserve" value="<?= htmlspecialchars($horaire) ?>">
                    <input type="hidden" name="nbrPersonneReserve" id="inputNbrPersonnesForm"
                        value="<?= htmlspecialchars($nbrPersonnes) ?>">
                    <input type="hidden" name="idEscapeReserve"
                        value="<?= $escape ? (int) $escape['id_escape'] : '' ?>">

                    <!-- ---------------------------------------------------------------- -->


                    <!-- ---------------------------
                         Message d'attente lors de la transaction
                         --------------------------- -->
                    <div id="paiement-attente" class="paiement-attente" aria-live="polite" hidden>
                        Veuillez patienter, validation de la transaction en cours par la banque…
                    </div>

                    <!-- Bouton de validation -->
                    <button type="submit" class="bouton-valider" id="boutonValiderPaiement"><span
                            id="validerPanier">Valider le
                            paiement</span></button>
                </form>
            </div>
        </div>

    </div>
</main>



<?php


$script = '<script src="js/json.js" defer></script><script src="js/panierPaiement.js" defer></script>';
