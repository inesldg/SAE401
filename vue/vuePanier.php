<?php

// var_dump($jour, $horaire, $nbrPersonnes, $panier);

// Config Langue
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}
$lang = $_SESSION['lang'];

$col_nom = "nom_" . $lang;
$col_desc = "description_" . $lang;

// Style
$style = '<link rel="stylesheet" href="styles/panier.css">';
?>

<main class="panier">
    <div class="conteneur-principal">

        <div class="colonne-gauche reveal reveal-up">
            <div class="section-panier carte reveal reveal-up">
                <h1 id="panierPanier">Votre Panier</h1>

                <div class="produit">
                    <div class="image-remplacement">img</div>
                    <div class="infos-produit">
                        <h3>In Vino Veritas</h3>
                        <div class="description">
                            L'aventure d'évasion "In Vino Veritas" vous emmène à travers la partie sud-ouest du Kaiserstuhl
                            avec une vue imprenable sur la plaine du Rhin.
                        </div>
                        <div class="ligne-prix">
                            <div class="selecteur-personnes">Nombre pers.</div>
                            <div class="bouton-supprimer" id="supprPanier">SUPPRIMER</div>
                            <div class="prix-unitaire"> prix€</div>
                        </div>
                    </div>
                </div>

            </div>

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
                            <rect width="273" height="167" rx="12" fill="#2B3893"/>
                        </svg>
                        <div class="carte-bleue-contenu">
                            <div class="ligne-carte">
                                <label for="inputNumCarte">Numéro de carte</label>
                                <input type="text" name="numCarte" id="inputNumCarte" value=""
                                    placeholder="0000 0000 0000 0000" maxlength="19" required autocomplete="cc-number">
                            </div>
                            <div class="ligne-carte">
                                <label for="inputMoisExpiration">Expiration</label>
                                <div class="ligne-carte-exp">
                                    <input type="text" name="moisExpiration" id="inputMoisExpiration"
                                        class="input-carte-court" value="" placeholder="MM" maxlength="2" required>
                                    <span style="color:#fff;">/</span>
                                    <input type="text" name="anneeExpiration" id="inputAnneeExpiration"
                                        class="input-carte-court" value="" placeholder="AA" maxlength="2" required>
                                </div>
                            </div>
                            <div class="ligne-carte">
                                <label for="inputNumCarteDos">Code CVV</label>
                                <input type="text" name="numCarteDos" id="inputNumCarteDos" class="input-carte-cvc"
                                    value="" placeholder="000" maxlength="3" required>
                            </div>
                        </div>
                        <div class="card-brand-zone" id="card-brand-zone" aria-hidden="true">
                            <img id="card-brand-logo"
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='40' viewBox='0 0 60 40'%3E%3Crect width='60' height='40' fill='%23f0f0f0' rx='4'/%3E%3Ctext x='30' y='26' font-family='Inter' font-size='12' fill='%23999' text-anchor='middle'%3ECarte%3C/text%3E%3C/svg%3E"
                                alt="" class="card-brand-img">
                        </div>
                    </div>
                    <div class="indication2" id="retournercartePanier">Veuillez rentrer vos coordonnées bancaires</div>

                    <!-- ---------------------------------------------------------------- -->
                    <!-- Ne pas toucher -->

                    <input type="hidden" name="montant" id="montantPanier"
                        value="<?= isset($panier[0]['prix']) ? (int) $panier[0]['prix'] : 141 ?>">
                    <input type="hidden" name="jourReserve" value="<?= $jour ?>">

                    <input type="hidden" name="horaireReserve" value="<?= $horaire ?>">

                    <input type="hidden" name="nbrPersonneReserve" id="inputNbrPersonnesForm"
                        value="<?= $nbrPersonnes ?>">

                    <input type="hidden" name="idEscapeReserve" value="<?= $panier[0]['id_escape'] ?>">

                    <!-- ---------------------------------------------------------------- -->



                    <div id="paiement-attente" class="paiement-attente" aria-live="polite" hidden>
                        Veuillez patienter, validation de la transaction en cours par la banque…
                    </div>
                    <button type="submit" class="bouton-valider" id="boutonValiderPaiement"><span
                            id="validerPanier">Valider le paiement</span></button>
                </form>
            </div>
        </div>

    </div>
</main>



<?php


$script = '<script src="js/json.js" defer></script><script src="js/panierPaiement.js" defer></script>';
