<?php
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
$style = '<link rel="stylesheet" href="styles/legal.css">';
?>

<!-- section mentions legales -->
<section class="page-legal">
    <div class="page-legal__conteneur reveal reveal-up">
        <article class="page-legal__bloc" id="mentionsLegales">
            <h2 class="page-legal__titre" id="mentionsLegalesLegal">Mentions légales</h2>
            <div class="page-legal__texte" id="ml1">Conformément aux dispositions de l’article 6 de la Loi n° 2004-575
                du 21 juin 2004 pour la Confiance dans l’Économie Numérique (LCEN), les utilisateurs du site sont
                informés de l'identité des différents intervenants. Le présent site est édité par la société exploitant
                l'enseigne d'Escape Game, dont le siège social est situé à l'adresse indiquée sur la page contact,
                immatriculée au Registre du Commerce et des Sociétés sous le numéro SIRET correspondant.</div>
            <div class="page-legal__texte" id="ml2">La direction de la publication est assurée par le responsable légal
                de l'établissement. Pour toute question ou réclamation concernant le contenu du site, vous pouvez nous
                contacter directement par email ou via le formulaire de contact dédié. Le site est hébergé par un
                prestataire professionnel garantissant la sécurité et la continuité du service, dont les coordonnées
                sont disponibles sur demande ou consultables dans nos registres officiels.</div>
            <div class="page-legal__texte" id="ml3">L’ensemble des contenus présents sur ce site (textes, photographies,
                logos, codes sources) est protégé par le droit d'auteur. Toute reproduction, même partielle, sans accord
                préalable écrit de l'éditeur est strictement interdite et constituerait une contrefaçon sanctionnée par
                le Code de la propriété intellectuelle. Nous nous efforçons de maintenir des informations à jour,
                toutefois, les tarifs et disponibilités des salles peuvent être modifiés sans préavis.</div>
            <div class="page-legal__texte" id="ml4">L'accès au site implique l'acceptation pleine et entière des
                conditions générales d'utilisation. L'éditeur ne pourra être tenu responsable des dommages directs ou
                indirects causés au matériel de l'utilisateur lors de l'accès au site, ou de l'apparition de bugs ou
                d'incompatibilités. Des liens hypertextes peuvent renvoyer vers des sites tiers ; notre responsabilité
                ne saurait être engagée quant au contenu ou aux pratiques de ces sites externes.</div>
        </article>

        <!-- section politique de confidentialité -->
        <article class="page-legal__bloc reveal reveal-up" id="politique">
            <h2 class="page-legal__titre" id="politiqueLegal">Politique de confidentialité</h2>
            <div class="page-legal__texte" id="pc1">La protection de votre vie privée est une priorité absolue pour
                notre établissement. Cette politique de confidentialité détaille la manière dont nous collectons et
                traitons vos informations lorsque vous naviguez sur notre plateforme ou effectuez une réservation en
                ligne. Nous nous engageons à ce que la collecte de vos données soit limitée au strict nécessaire,
                conformément au principe de minimisation des données.</div>
            <div class="page-legal__texte" id="pc2">Les informations que vous nous transmettez sont utilisées
                exclusivement pour la gestion de vos réservations, l'amélioration de nos services et, si vous y avez
                consenti, l'envoi de nos actualités. Vos données ne sont jamais vendues, louées ou cédées à des tiers à
                des fins commerciales. Seuls nos services internes et nos prestataires techniques (comme l'outil de
                paiement sécurisé) ont accès aux informations nécessaires à la finalisation de votre commande.</div>
            <div class="page-legal__texte" id="pc3">La sécurité de vos transactions est garantie par l'utilisation de
                protocoles de chiffrement SSL (Secure Socket Layer), assurant que vos coordonnées bancaires ne circulent
                jamais en clair sur le réseau. Nous conservons vos données de réservation pendant la durée légale
                nécessaire à la gestion administrative et comptable de nos activités, après quoi elles sont anonymisées
                ou supprimées de nos bases actives.</div>
        </article>

        <!-- section données personnelles -->
        <article class="page-legal__bloc reveal reveal-up" id="donneesPerso">
            <h2 class="page-legal__titre" id="donneesLegal">Données personnelles</h2>
            <div class="page-legal__texte" id="dp1">En conformité avec le Règlement Général sur la Protection des
                Données (RGPD) et la loi "Informatique et Libertés", vous disposez d'un contrôle total sur vos
                informations personnelles. Les données collectées (nom, prénom, email, téléphone) sont indispensables au
                traitement de votre dossier et à l'envoi de votre confirmation de réservation par voie électronique ou
                SMS.</div>
            <div class="page-legal__texte" id="dp2">Vous disposez d'un droit d'accès, de rectification, de portabilité
                et d'effacement de vos données. Vous pouvez également demander la limitation du traitement ou vous
                opposer à celui-ci pour des motifs légitimes. Pour exercer ces droits, il vous suffit de nous adresser
                une demande écrite accompagnée d'un justificatif d'identité à l'adresse de contact principale de
                l'établissement.</div>
            <div class="page-legal__texte" id="dp3">Nous prenons toutes les mesures de sécurité techniques et
                organisationnelles nécessaires pour protéger vos données personnelles contre tout accès non autorisé,
                perte ou altération. Nos systèmes sont régulièrement mis à jour et l'accès aux données est restreint au
                personnel habilité ayant besoin d'en connaître dans le cadre de ses fonctions (accueil des joueurs,
                support client, comptabilité).</div>
            <div class="page-legal__texte" id="dp4">Si vous estimez, après nous avoir contactés, que vos droits ne sont
                pas respectés, vous avez la possibilité d'introduire une réclamation auprès de la CNIL (Commission
                Nationale de l'Informatique et des Libertés). Nous restons à votre entière disposition pour toute
                précision concernant notre politique de gestion des données et pour vous accompagner dans l'exercice de
                vos droits.</div>
        </article>
    </div>
</section>

<?php
$script = '<script src="js/traduction/tradCommun.js" defer></script><script src="js/traduction/tradHeader.js" defer></script><script src="js/traduction/tradFooter.js" defer></script><script src="js/traduction/tradLegal.js" defer></script><script src="js/traduction.js" defer></script>';
?>