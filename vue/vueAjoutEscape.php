<?php

$style = '<link rel="stylesheet" href="styles/ajoutEscape.css">';

?>

<div class="contenu">
    <div class="menu-gauche">
        <div class="admin" id="adminAdministrateur">Administrateur</div>
        <div class="ligne"></div>
        <div class="menu-categorie">
            <a href="index.php?action=dash" class="dash">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 6V0H18V6H10ZM0 10V0H8V10H0ZM10 18V8H18V18H10ZM0 18V12H8V18H0ZM2 8H6V2H2V8ZM12 16H16V10H12V16ZM12 4H16V2H12V4ZM2 16H6V14H2V16Z" fill="#F2F2F2" />
                </svg>
                <div id="dashAdmin" >Dashboard</div>
            </a>
            <a href="index.php?action=ajoutEscape" class="escape">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0507 3.15106C13.1639 3.26431 13.3051 3.34533 13.46 3.38578C13.6149 3.42623 13.7777 3.42463 13.9318 3.38117C14.0858 3.3377 14.2255 3.25393 14.3364 3.1385C14.4473 3.02306 14.5254 2.88014 14.5626 2.72446C14.656 2.33558 14.8514 1.97862 15.1286 1.69035C15.4059 1.40209 15.7549 1.19293 16.1398 1.08443C16.5248 0.975926 16.9316 0.971995 17.3186 1.07304C17.7055 1.17409 18.0586 1.37646 18.3413 1.65932C18.6241 1.94217 18.8263 2.29529 18.9272 2.6823C19.0281 3.06931 19.024 3.47623 18.9154 3.86115C18.8068 4.24606 18.5975 4.59507 18.3092 4.87222C18.0209 5.14937 17.6639 5.34465 17.275 5.43794C17.1193 5.4752 16.9764 5.5533 16.861 5.6642C16.7456 5.77509 16.6618 5.91477 16.6183 6.06883C16.5749 6.22289 16.5733 6.38575 16.6137 6.54063C16.6542 6.69551 16.7352 6.8368 16.8484 6.94993L18.363 8.46371C18.5647 8.66546 18.7248 8.90497 18.8339 9.16856C18.9431 9.43216 18.9993 9.71468 18.9993 10C18.9993 10.2853 18.9431 10.5678 18.8339 10.8314C18.7248 11.095 18.5647 11.3345 18.363 11.5363L16.8484 13.051C16.7353 13.1642 16.594 13.2452 16.4392 13.2857C16.2843 13.3261 16.1214 13.3245 15.9674 13.2811C15.8133 13.2376 15.6737 13.1538 15.5628 13.0384C15.4519 12.923 15.3738 12.7801 15.3366 12.6244C15.2431 12.2355 15.0478 11.8785 14.7705 11.5903C14.4933 11.302 14.1443 11.0928 13.7593 10.9843C13.3744 10.8758 12.9675 10.8719 12.5806 10.973C12.1936 11.074 11.8406 11.2764 11.5579 11.5592C11.2751 11.8421 11.0729 12.1952 10.972 12.5822C10.8711 12.9692 10.8751 13.3761 10.9837 13.7611C11.0924 14.146 11.3016 14.495 11.59 14.7721C11.8783 15.0493 12.2353 15.2446 12.6242 15.3379C12.7798 15.3751 12.9228 15.4532 13.0382 15.5641C13.1536 15.675 13.2374 15.8147 13.2808 15.9687C13.3243 16.1228 13.3259 16.2857 13.2854 16.4405C13.245 16.5954 13.164 16.7367 13.0507 16.8498L11.5362 18.3636C11.3344 18.5654 11.095 18.7254 10.8314 18.8346C10.5678 18.9438 10.2853 19 10 19C9.71471 19 9.4322 18.9438 9.16863 18.8346C8.90505 18.7254 8.66556 18.5654 8.46383 18.3636L6.94926 16.8489C6.83613 16.7357 6.69486 16.6547 6.53999 16.6142C6.38512 16.5738 6.22227 16.5754 6.06823 16.6188C5.91418 16.6623 5.77451 16.7461 5.66362 16.8615C5.55274 16.9769 5.47464 17.1199 5.43738 17.2755C5.34397 17.6644 5.14859 18.0214 4.87136 18.3096C4.59414 18.5979 4.24509 18.8071 3.86016 18.9156C3.47524 19.0241 3.06835 19.028 2.6814 18.927C2.29445 18.8259 1.94143 18.6235 1.65869 18.3407C1.37595 18.0578 1.17371 17.7047 1.0728 17.3177C0.971888 16.9307 0.975953 16.5238 1.08458 16.1389C1.1932 15.7539 1.40245 15.4049 1.69079 15.1278C1.97913 14.8506 2.33612 14.6554 2.72501 14.5621C2.88068 14.5248 3.02359 14.4467 3.13901 14.3358C3.25444 14.2249 3.3382 14.0852 3.38167 13.9312C3.42513 13.7771 3.42672 13.6142 3.38627 13.4594C3.34583 13.3045 3.26481 13.1632 3.15158 13.0501L1.637 11.5363C1.43526 11.3345 1.27523 11.095 1.16605 10.8314C1.05687 10.5678 1.00068 10.2853 1.00068 10C1.00068 9.71468 1.05687 9.43216 1.16605 9.16856C1.27523 8.90497 1.43526 8.66546 1.637 8.46371L3.15158 6.94903C3.2647 6.83578 3.40598 6.75476 3.56084 6.71431C3.71571 6.67386 3.87856 6.67545 4.03261 6.71892C4.18665 6.76239 4.32632 6.84616 4.43721 6.96159C4.5481 7.07702 4.62619 7.21995 4.66345 7.37562C4.75687 7.76451 4.95225 8.12147 5.22947 8.40974C5.5067 8.698 5.85574 8.90716 6.24067 9.01566C6.62559 9.12416 7.03248 9.12809 7.41943 9.02705C7.80638 8.926 8.1594 8.72363 8.44214 8.44077C8.72488 8.15792 8.92712 7.8048 9.02803 7.41779C9.12895 7.03078 9.12488 6.62386 9.01626 6.23894C8.90763 5.85402 8.69838 5.50502 8.41004 5.22787C8.12171 4.95072 7.76471 4.75544 7.37582 4.66215C7.22016 4.62489 7.07724 4.54679 6.96182 4.43589C6.84639 4.32499 6.76263 4.18532 6.71917 4.03126C6.6757 3.8772 6.67411 3.71434 6.71456 3.55946C6.755 3.40458 6.83602 3.26329 6.94926 3.15016L8.46383 1.63637C8.66556 1.43462 8.90505 1.27458 9.16863 1.16539C9.4322 1.0562 9.71471 1 10 1C10.2853 1 10.5678 1.0562 10.8314 1.16539C11.095 1.27458 11.3344 1.43462 11.5362 1.63637L13.0507 3.15106Z" stroke="#C5A059" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div id="escapeAdmin">Escapes</div>
            </a>
            <a href="#" class="user">
                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.6 17.2V15.4C13.6 14.4453 13.2207 13.5296 12.5456 12.8545C11.8705 12.1793 10.9548 11.8 10 11.8H4.6C3.64522 11.8 2.72955 12.1793 2.05442 12.8545C1.37928 13.5296 1 14.4453 1 15.4V17.2M13.6 1.11523C14.372 1.31537 15.0557 1.76617 15.5437 2.39689C16.0318 3.02761 16.2966 3.80253 16.2966 4.60003C16.2966 5.39753 16.0318 6.17246 15.5437 6.80318C15.0557 7.4339 14.372 7.8847 13.6 8.08483M19 17.2V15.4C18.9994 14.6024 18.7339 13.8275 18.2452 13.1971C17.7565 12.5667 17.0723 12.1164 16.3 11.917" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7.3002 8.2C9.28842 8.2 10.9002 6.58822 10.9002 4.6C10.9002 2.61177 9.28842 1 7.3002 1C5.31197 1 3.7002 2.61177 3.7002 4.6C3.7002 6.58822 5.31197 8.2 7.3002 8.2Z" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div id="utilisateurAdmin">Utilisateurs</div>
            </a>
            <a href="#" class="calendrier">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 2H15V1C15 0.734784 14.8946 0.48043 14.7071 0.292893C14.5196 0.105357 14.2652 0 14 0C13.7348 0 13.4804 0.105357 13.2929 0.292893C13.1054 0.48043 13 0.734784 13 1V2H7V1C7 0.734784 6.89464 0.48043 6.70711 0.292893C6.51957 0.105357 6.26522 0 6 0C5.73478 0 5.48043 0.105357 5.29289 0.292893C5.10536 0.48043 5 0.734784 5 1V2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H17C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17V5C20 4.20435 19.6839 3.44129 19.1213 2.87868C18.5587 2.31607 17.7956 2 17 2ZM18 17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V10H18V17ZM18 8H2V5C2 4.73478 2.10536 4.48043 2.29289 4.29289C2.48043 4.10536 2.73478 4 3 4H5V5C5 5.26522 5.10536 5.51957 5.29289 5.70711C5.48043 5.89464 5.73478 6 6 6C6.26522 6 6.51957 5.89464 6.70711 5.70711C6.89464 5.51957 7 5.26522 7 5V4H13V5C13 5.26522 13.1054 5.51957 13.2929 5.70711C13.4804 5.89464 13.7348 6 14 6C14.2652 6 14.5196 5.89464 14.7071 5.70711C14.8946 5.51957 15 5.26522 15 5V4H17C17.2652 4 17.5196 4.10536 17.7071 4.29289C17.8946 4.48043 18 4.73478 18 5V8Z" fill="#F2F2F2" />
                </svg>
                <div id="calendrierAdmin">Calendrier</div>
            </a>
            <a href="#" class="avis">
                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 1H3C2.46957 1 1.96086 1.21071 1.58579 1.58579C1.21071 1.96086 1 2.46957 1 3V18L4.467 15.4C4.81319 15.1404 5.23426 15 5.667 15H17C17.5304 15 18.0391 14.7893 18.4142 14.4142C18.7893 14.0391 19 13.5304 19 13V3C19 2.46957 18.7893 1.96086 18.4142 1.58579C18.0391 1.21071 17.5304 1 17 1Z" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div id="avisAdmin" >Avis</div>
            </a>
        </div>
    </div>


    <div class="droite">

        <div class="haut">
            <div class="part1">
                <h1 id="gestionAdmin">GESTIONS DES ESCAPES</h1>
                <div class="sous-titre" id="nbEscapeAdmin" >X escapes actifs</div>
            </div>
            <div class="part2">
                <a href="#" class="ajouter" id="btnAjouter">+ Ajouter</a>
            </div>
        </div>
    </div>


    <div class="overlay" id="overlay"></div>


    <div class="popup" id="popup">
        <div class="popup-content">

            <span class="close" id="closePopup">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 17.5L17.5 1.5M1.5 1.5L17.5 17.5" stroke="#C5A059" stroke-width="3" stroke-linecap="round" />
                </svg>
            </span>

            <div class="ajout">

                <form method="post" enctype="multipart/form-data" action="<?= $_SERVER["PHP_SELF"] . "?action=ajoutEscape" ?>">
                    <div>
                        <h2 id="nvEscapeAjout" >Nouvel escape game</h2>
                    </div>
                    <div>
                        <label>
                            <span id="nomNvEscape" >Nom</span>
                            <input type="text" name="nom" value="" placeholder="Nom de l'escape" required>
                        </label>

                        <label class="image-label">
                            <span id="PhotoNvEscape">Photo de l’escape</span>
                            <!-- L'attribut accept permet de limiter les types de fichiers -->
                            <input type="file"
                                name="photoEscape"
                                accept="image/jpeg,image/png,image/webp,image/gif,image/bmp">
                            <!-- Limite la taille du fichier (500 Ko) -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="500000">
                            <div class="choix" id="choixFichier">Choisir un fichier...</div>
                        </label>

                        <label>
                            <span id="descriptionNvEscape" >Description</span>
                            <input type="text" name="description" value="" placeholder="Description de l'escape" required>
                        </label>
                        <label>
                            <span id="lieuNvEscape">Lieu</span>
                            <input type="text" name="lieu" value="" placeholder="Lieu de l'escape" required>
                        </label>
                        <label>
                            <span id="dureeNvEscape">Durée</span>
                            <input type="number" name="duree" value="" placeholder="Durée de l'escape" required>
                        </label>
                        <label>
                            <span id="prsnMin">Nb de pers min</span>
                            <input type="number" name="pers_min" value="" placeholder="Nombre de personnes min" required>
                        </label>
                        <label>
                            <span id="prsnMax">Nb de pers max</span>
                            <input type="number" name="pers_max" value="" placeholder="Nombre de personnes max" required>
                        </label>
                    </div>
                    <div>
                        <input type="submit" name="ajoutEscape" value="Ajouter aux escape games" class="valider">
                    </div>
                    <span><?= $message ?></span>
                </form>
            </div>
        </div>
    </div>

    <?php

    $script = '<script src="js/ajoutescape.js"></script>';
