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
  <?= $head_extra ?? '' ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="styles/variables.css">
  <link rel="stylesheet" href="styles/loader.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="styles/header.css">
  <link rel="icon" href="/images/favicon.ico">

</head>

<body>

  <!--
    LOADER
    Affiche un écran de chargement (boussole + texte) tant que la page n'est pas entièrement prête.
    Le composant loader.php injecte le bloc HTML avec l'animation. Le script ci-dessous masque
    le loader dès que l'événement "load" du window est déclenché (ressources, images, scripts chargés)
-->
  <?php require "composants/loader.php"; ?>
  <script>
    (function () {
      var loader = document.getElementById('page-loader');
      if (!loader) return;

      /* Fonctionn qui cache le loader : ajoute la classe CSS qui déclenche le fondu de sortie */
      function hideLoader() {
        loader.classList.add('page-loader--hidden');
        loader.setAttribute('aria-hidden', 'true');
      }

      /* Si la page est déjà chargée (ex: dans cache), on masque tout de suite ; sinon on attend l'événement "load" */
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