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
    
    <!-- ---------------------- -->


    <!-- Liens à inclure dans toutes les pages si besoin (ex : polices) -->

    
    <!-- --------------------------------------------------------- -->


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