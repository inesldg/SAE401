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


<section class="page-legal">
    <div class="page-legal__conteneur">
        <article class="page-legal__bloc" id="mentionsLegales">
            <h2 class="page-legal__titre">Mentions légales</h2>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
        </article>

        <article class="page-legal__bloc" id="politique">
            <h2 class="page-legal__titre">Politique de confidentialité</h2>
            <div class="page-legal__texte">Lorem ipsum dolor sit amet consectetur adipisicing elit. At, ducimus porro!
                Cupiditate vel quae incidunt odit dolor, consequatur odio illum! Odio unde esse dolor dolore explicabo
                earum quas magni praesentium.</div>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
        </article>

        <article class="page-legal__bloc" id="donneesPerso">
            <h2 class="page-legal__titre">Données personnelles</h2>
            <div class="page-legal__texte">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis harum
                consectetur qui earum sed impedit totam ea autem. Voluptas ipsa officiis distinctio. Quas beatae
                laudantium itaque, saepe modi voluptatum aut.</div>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
            <div class="page-legal__texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, explicabo
                sint minus, et a sed eligendi porro ratione numquam sapiente ducimus omnis accusamus nesciunt?
                Reprehenderit nam alias maiores natus similique.</div>
        </article>
    </div>
</section>

<?php
$script = '<script src="js/json.js" defer></script>';



