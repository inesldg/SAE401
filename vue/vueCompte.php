<?php
// Ta logique de config
if (isset($_GET['lang'])) { $_SESSION['lang'] = $_GET['lang']; }
if (!isset($_SESSION['lang'])) { $_SESSION['lang'] = 'fr'; }
$lang = $_SESSION['lang'];

// Style dynamique (si besoin)
$style = ''; 
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --dore: #c5a059;
            --fond-clair: #f9f9f9;
            --texte-sombre: #1a1a1a;
            --texte-gris: #777;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }

        body {
            background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .background-fond {
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: flex; justify-content: center; align-items: center;
            position: relative;
        }

        /* Bouton Retour Accueil */
        #retourAcc {
            position: absolute; top: 20px; left: 20px;
            color: white; text-decoration: none; font-weight: 500;
            background: rgba(0,0,0,0.5); padding: 10px 20px; border-radius: 5px;
        }

        .carte {
            width: 900px; background: white; border-radius: 12px;
            overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .carte-couleur { height: 120px; background: linear-gradient(to right, #b88e46, #8e6d35); }
        .carte-contenu { padding: 40px 60px; }

        .ligne-profil {
            display: flex; justify-content: space-between;
            align-items: center; margin-bottom: 40px;
        }

        .infos-utilisateur { display: flex; align-items: center; gap: 20px; }

        .pdp {
            width: 80px; height: 80px; background: #e0e0e0;
            border-radius: 50%; display: flex; justify-content: center; align-items: center;
        }

        .infos-texte h2 { font-size: 1.4rem; color: var(--texte-sombre); }
        .infos-texte p { color: var(--texte-gris); font-size: 0.9rem; }

        .bouton-sauvegarder {
            background-color: var(--dore); color: white;
            border: none; padding: 10px 25px; border-radius: 8px;
            font-weight: 600; cursor: pointer;
        }

        .grille-formulaire {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 25px 40px; margin-bottom: 30px;
        }

        .case label { display: block; font-weight: 600; margin-bottom: 10px; font-size: 0.9rem; }

        .case input {
            width: 100%; padding: 15px; background-color: var(--fond-clair);
            border: 1px solid transparent; border-radius: 8px;
            font-size: 0.9rem; color: var(--texte-gris); outline: none;
        }

        .section-mdp { margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; }
        .case-mdp { width: 100%; margin-bottom: 10px; }

        .email { display: flex; flex-direction: column; align-items: center; margin-top: 30px; }
        .adresseemail { font-weight: 600; margin-bottom: 15px; font-size: 0.9rem; }
        .boite-email {
            background: #e9dcc5; padding: 12px 60px; border-radius: 10px;
            font-size: 0.9rem; min-width: 300px; text-align: center;
        }
        
        .message-php { display: block; text-align: center; margin-top: 10px; color: var(--dore); font-weight: 600; }
    </style>
</head>

<body>

    <div class="background-fond">
        <a href="index.php?action=accueil" id="retourAcc">← Retour à l'accueil</a>

        <div class="carte">
            <div class="carte-couleur"></div>
            
            <form method="post" action="<?= $_SERVER["PHP_SELF"] . "?action=modifInfos" ?>" class="carte-contenu">
                
                <div class="ligne-profil">
                    <div class="infos-utilisateur">
                        <div class="pdp">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z" fill="#888" />
                            </svg>
                        </div>
                        <div class="infos-texte">
                            <h2><?= $infosCompte[0]['prenom'] . ' ' . $infosCompte[0]['nom'] ?></h2>
                            <p><?= $infosCompte[0]['mail'] ?></p>
                        </div>
                    </div>
                    <button type="submit" name="modifierInfos" class="bouton-sauvegarder" id="modifCompte">Sauvegarder</button>
                </div>

                <div class="grille-formulaire">
                    <div class="case">
                        <label id="nomCompte">NOM</label>
                        <input type="text" name="nom" placeholder="<?= $infosCompte[0]['nom'] ?>" value="">
                    </div>
                    <div class="case">
                        <label id="prenomCompte">PRÉNOM</label>
                        <input type="text" name="prenom" placeholder="<?= $infosCompte[0]['prenom'] ?>" value="">
                    </div>
                </div>

                <div class="section-mdp">
                    <div class="case">
                        <label id="entrerMDPCompte">Entrez votre mot de passe pour enregistrer</label>
                        <input type="password" name="mdp" id="inputmdp" placeholder="Votre mot de passe" required>
                    </div>
                </div>

                <div class="email">
                    <p class="adresseemail" id="mailCompte">ADRESSE MAIL ACTUELLE</p>
                    <div class="boite-email">
                        <?= $infosCompte[0]['mail'] ?>
                    </div>
                    <div class="case" style="margin-top:15px; width: 100%; max-width: 400px;">
                        <input type="email" name="mail" placeholder="Nouvelle adresse mail (optionnel)">
                    </div>
                    <span class="message-php"><?= $message ?></span>
                </div>
            </form>
        </div>
    </div>

    <script src="js/json.js" defer></script>
</body>
</html>