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

  <script type="importmap">
    {
      "imports": {
        "three": "https://unpkg.com/three@0.160.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@0.160.0/examples/jsm/"
      }
    }
  </script>

  <link rel="stylesheet" href="styles/variables.css">
  <link rel="stylesheet" href="styles/loader.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="styles/header.css">
  <link rel="icon" href="/images/favicon.ico">


  <!-- <link rel="stylesheet" href="styles/loader.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/ajoutEscape.css">
    <link rel="stylesheet" href="styles/compteEtModif.css">
    <link rel="stylesheet" href="styles/dashboardAdmin.css">
    <link rel="stylesheet" href="styles/erreur.css">
    <link rel="stylesheet" href="styles/game.css">
    <link rel="stylesheet" href="styles/infoEscape.css">
    <link rel="stylesheet" href="styles/panier.css">
    <link rel="stylesheet" href="styles/utilisateurs.css"> -->


  <!-- ---------------------- -->

</head>

<body>

  <?php require "composants/loader.php"; ?>
  <script>
    (function () {
      var loader = document.getElementById('page-loader');
      if (!loader) return;
      function hideLoader() {
        loader.classList.add('page-loader--hidden');
        loader.setAttribute('aria-hidden', 'true');
      }
      if (document.readyState === 'complete') {
        hideLoader();
      } else {
        window.addEventListener('load', hideLoader);
      }
    })();
  </script>

  <header><?= $header ?></header>

  <main><?= $main ?></main>

  <footer><?= $footer ?></footer>

  <!-- Bouton pour retourner en haut -->
  <a href="#" class="back-to-top">
    <svg class="back-to-top_arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M12 19V5M5 12l7-7 7 7" />
    </svg>
  </a>


  <!-- scripts pour cette page -->

  <?= $script ?>
  <script src="js/script.js"></script>

  <!-- ----------------------- -->

</body>

</html>