<!-- 
 Toutes les variables présentes sur cette page doivent se retrouver sur les différents fichier vue même si il n'y a rien dedans.
Sauf dans le cas où la variable se trouve déjà dans le fichier vue.class.php (exemple : la variable $titre qui est déjà définie dans le fichier) 
-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>


    <!-- styles pour cette page -->

    <?= $style ?>
    <link rel="stylesheet" href="styles/variables.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/header.css">
    <!-- <link rel="stylesheet" href="styles/accueil.css"> -->

    <!-- <link rel="stylesheet" href="styles/inscription.css">
    <link rel="stylesheet" href="styles/loader.css"> -->


    <!-- <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/about.css">
    <link rel="stylesheet" href="styles/ajoutEscape.css">
    <link rel="stylesheet" href="styles/compteEtModif.css">
    <link rel="stylesheet" href="styles/confirmationAchat.css">
    <link rel="stylesheet" href="styles/dashboardAdmin.css">
    <link rel="stylesheet" href="styles/erreur.css">
    <link rel="stylesheet" href="styles/escapeGames.css">
    <link rel="stylesheet" href="styles/game.css">
    <link rel="stylesheet" href="styles/infoEscape.css">
    <link rel="stylesheet" href="styles/panier.css">
    <link rel="stylesheet" href="styles/utilisateurs.css"> -->


    <!-- ---------------------- -->

</head>

<body>

    <header><?= $header ?></header>

    <main><?= $main ?></main>

    <footer><?= $footer ?></footer>


    <!-- scripts pour cette page -->

    <?= $script ?>

    <!-- ----------------------- -->

</body>

</html>