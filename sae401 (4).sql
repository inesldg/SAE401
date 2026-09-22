-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 11 mars 2026 à 17:46
-- Version du serveur : 5.7.43
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae401`
--

-- --------------------------------------------------------

--
-- Structure de la table `escape`
--

DROP TABLE IF EXISTS `escape`;
CREATE TABLE `escape` (
  `id_escape` int(11) NOT NULL,
  `nom` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` int(11) NOT NULL,
  `nbr_pers_min` int(11) NOT NULL,
  `nbr_pers_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `escape`
--

INSERT INTO `escape` (`id_escape`, `nom`, `description`, `lieu`, `duree`, `nbr_pers_min`, `nbr_pers_max`) VALUES
(6, 'Steam & Shadows : Mulhouse industriel', 'Entrez dans un Mulhouse \"Steampunk\" et découvrez les secrets de son passé industriel à travers des puzzles, machines, et usines oubliées qui ont façonné l’identité de la ville.', 'Mulhouse', 120, 6, 12),
(7, 'Houblon & Histoire : La quête de la bière de Mulhouse', 'Explorez Mulhouse à travers ses traditions brassicoles avec un escape game sur le thème de la bière combinant histoire locale, puzzles et dégustations dans des pubs soigneusement sélectionnés.', 'Mulhouse', 180, 6, 16),
(8, ' L\'énigme Schlumpf : À l’intérieur du Musée de l’Automobile', 'Rejoignez les frères Schlumpf pour un voyage interactif à travers l’histoire de l’automobile, en résolvant des énigmes parmi voitures légendaires tout en découvrant la passion et l’ambition derrière le musée.', 'Mulhouse', 120, 6, 20),
(9, 'L’or bleu : Mulhouse et le pouvoir de l’eau', 'Découvrez comment l’eau a façonné le développement de Mulhouse et apprenez pourquoi protéger cette ressource vitale à travers un jeu d’évasion en plein air engageant.', 'Mulhouse', 60, 6, 12),
(10, 'L’héritage d’Albert Schweitzer : Science et éthique', 'Suivez Albert Schweitzer à travers Mulhouse pour explorer la chimie, la science et l’éthique, résoudre des énigmes qui relient le progrès scientifique à la responsabilité humaine', 'Mulhouse', 120, 6, 16),
(11, 'Les Waggis déchaînés : Le Carnaval de Mulhouse', 'Rejoins Waggis, la figure du carnaval espiègle, dans un escape game coloré explorant les traditions du carnaval de Mulhouse à travers des énigmes, de l’humour et des défis festifs.', 'Mulhouse', 120, 6, 20),
(12, 'Les Veilleurs du Sundgau : Découverte des paysages Alsaciens', 'Explorez les collines du Sundgau et percez les secrets des anciens postes d’observation et villages oubliés. Entre forêts profondes et pierres ancestrales, saurez-vous décrypter les messages du passé ?', 'Sundgau', 180, 6, 20),
(13, 'Secrets lacustres : Les étangs Sundgauviens', 'Plongez au cœur des étangs mystérieux du Sundgau et suivez les traces d’anciens gardiens de l’eau à travers énigmes naturelles, légendes locales et sentiers sauvages.', 'Sundgau', 120, 6, 12),
(14, 'Maisons à Colombages & Traditions : Visite de Colmar', 'Remontez le temps dans les ruelles colorées de Colmar et déchiffrez les symboles cachés dans les façades historiques. Chaque détail architectural devient une clé vers le passé.', 'Colmar', 120, 4, 8),
(15, 'Château Alsacien : Les ombres du Haut-Koenigsbourg', 'Gravissez les hauteurs d’Alsace et infiltrez-vous dans les secrets d’une forteresse légendaire. Entre stratégies militaires, passages cachés et intrigues médiévales, l’histoire reprend vie.', 'Colmar', 180, 6, 12),
(16, 'Printemps à Eguisheim: Le mystère des couronnes fleuries', 'Explorez les façades colorées, déchiffrez les symboles dissimulés dans les détails architecturaux et résolvez une série d’énigmes inspirées des traditions alsaciennes de Pâques et du renouveau.', 'Eguisheim', 120, 6, 16),
(17, 'Pâques : Les œufs oubliés du Parc Salvator', 'Partez à travers les allées du parc pour retrouver les fragments d’un code ancien, résoudre des énigmes inspirées des symboles de Pâques (lapins, cloches, motifs floraux cachés) et reconstituer l’Œuf d’Or, puis profitez de la récolte de Paques.', 'Mulhouse', 60, 6, 10);

-- --------------------------------------------------------

--
-- Structure de la table `evaluer`
--

DROP TABLE IF EXISTS `evaluer`;
CREATE TABLE `evaluer` (
  `id_avis` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avis_date` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_escape` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evaluer`
--

INSERT INTO `evaluer` (`id_avis`, `note`, `commentaire`, `avis_date`, `id_utilisateur`, `id_escape`) VALUES
(1, 3, 'test', '2026-02-11', 1, 2),
(2, 4, 'test 2', '2026-02-07', 2, 2),
(3, 2, 'retest', '2026-02-04', 1, 1),
(4, 5, 'Mais c\'est un super escape game ça dis donc', '2026-03-03', 2, 6),
(5, 4, 'J\'adore la bière, c\'est Trystan', '2026-03-03', 2, 7),
(6, 2, 'test', '2026-03-11', 2, 6),
(7, 4, 'hopla', '2026-03-11', 3, 6),
(8, 5, 'C\'est un très bon jeu pour les fans de trains !', '2026-03-11', 3, 6),
(9, 4, 'Très ludique et en plus on a le droit a un apéro à la fin du jeu ! Je recommande fortement pour les soirées d\'été.', '2026-03-11', 3, 7),
(10, 2, 'Nous avons fait l\'énigme Schlumpf avec ma famille et c\'était un régal !  Cependant attention il faisait très chaud et les bouteilles d\'eau étaient à 4€', '2026-03-11', 3, 8),
(11, 4, 'J\'adore l\'eau, dans 20 / 30 ans y\'en aura plus ! Alors profitez de ce jeu !', '2026-03-11', 3, 9),
(12, 5, 'Quand j\'étais au lycée j\'adorait Albert, un homme remarquable, alors ce jeu m\'a fait remonter tout mes beaux souvenirs d\'enfance !', '2026-03-11', 3, 10),
(13, 2, 'LES WAGGIS SONT TROP BIEN J\'ADORE !! Mais des fois ils sont un peu farceurs il y en a un qui m\'a poussé par terre et je me suis cassé la mâchoire :(', '2026-03-11', 3, 11),
(14, 4, 'J\'ai visité le Sundgau grâce à ce jeu et j\'ai adoré surtout l\'été ! J\'ai pu y aller avec mon ami Joël, un Sundgauvien vigoureux.', '2026-03-11', 3, 13),
(15, 5, 'Les maisons à Colombages sont si belles oh my god !', '2026-03-11', 3, 14),
(16, 3, 'Un château médiéval pour les fans de médiéval en Alsace ! Attention tout de même au vertige et aux chutes libres brrrrr', '2026-03-11', 3, 15),
(17, 3, 'La ville qui a inspiré la belle et la bête ! Magique ! Mais, il fait chaud et beaucoup de touristes attention emmenez vos bouteilles d\'eau et vos claquettes.', '2026-03-11', 3, 16),
(18, 4, 'Super pour ma famille', '2026-03-11', 2, 17),
(19, 5, 'Je suis content, c\'est le printemps !', '2026-03-11', 4, 17),
(20, 4, 'Très joli mais qu\'est-ce qu\'il fait chaud', '2026-03-11', 4, 16),
(21, 2, 'Les touristes sont désagréables.', '2026-03-11', 4, 14),
(22, 5, 'WOW.', '2026-03-11', 4, 12),
(23, 2, 'Je suis aussi folle que les Waggis hoplà !', '2026-03-11', 4, 11),
(24, 4, 'Bien', '2026-03-11', 4, 10),
(25, 3, 'Pas mal', '2026-03-11', 4, 9),
(26, 5, 'Vroum !', '2026-03-11', 4, 8),
(27, 2, 'J\'adore fêter paques avec ma famille mais les chocolats sont tout fondus :/', '2026-03-11', 5, 17),
(28, 5, 'Château !', '2026-03-11', 5, 15),
(29, 4, 'Beautiful', '2026-03-11', 5, 14),
(30, 1, 'It\'s a NO for me !!!!!', '2026-03-11', 5, 12),
(31, 1, 'zeoihzeoifhZENOzeg', '2026-03-11', 5, 7),
(32, 5, 'C\'est mon chat qui marchait sur le clavier !! J\'ai adoré ce jeu, très ludique !', '2026-03-11', 5, 7),
(33, 5, 'Gloulgou', '2026-03-11', 5, 9),
(34, 3, 'hmmm', '2026-03-11', 6, 17),
(35, 1, 'Je me suis fait arrêté par la police pendant le jeu', '2026-03-11', 6, 16),
(36, 1, 'I only know 25 letters in the alphabet', '2026-03-11', 7, 11),
(37, 1, 'because I dont know why (Y), you have it ?', '2026-03-11', 7, 11),
(38, 2, 'do you know why the transgender man only eat salad ? Because he was a her before (herbivore)', '2026-03-11', 7, 17),
(39, 3, 'Not bad', '2026-03-11', 7, 10),
(40, 5, 'J\'adore les lacs, je suis Joël, un habitant du beau Sundgau', '2026-03-11', 7, 13),
(41, 4, 'YES', '2026-03-11', 7, 12),
(42, 3, 'J\'ai mis le feu à la forêt sans faire exprès... c\'était bien quand même', '2026-03-11', 6, 12),
(43, 3, 'J\'ai loupé le tram pour y aller mais ils m\'ont quand même acceptés ! Ouf !', '2026-03-11', 6, 10),
(44, 5, 'J\'aime les voitures et j\'adore en construire même si elles ne roulent jamais je sais pas pourquoi', '2026-03-11', 6, 8);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE `reserver` (
  `id_reserver` int(11) NOT NULL,
  `reserver_date` date NOT NULL,
  `horaire` time NOT NULL,
  `nbr_pers` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_escape` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`id_reserver`, `reserver_date`, `horaire`, `nbr_pers`, `id_utilisateur`, `id_escape`) VALUES
(4, '2026-03-13', '15:30:00', 9, 1, 12),
(5, '2026-03-13', '16:30:00', 8, 1, 13),
(6, '2026-03-11', '16:30:00', 20, 1, 8),
(7, '2026-03-13', '09:30:00', 6, 1, 17),
(8, '2026-03-13', '09:30:00', 9, 1, 11),
(9, '2026-03-27', '12:30:00', 6, 2, 17),
(10, '2026-03-12', '12:30:00', 13, 2, 7),
(11, '2026-03-25', '16:30:00', 6, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `effectif` int(11) NOT NULL,
  `id_escape` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `prix`, `effectif`, `id_escape`) VALUES
(1, 84, 6, 6),
(2, 81, 7, 6),
(3, 78, 8, 6),
(4, 75, 9, 6),
(5, 72, 10, 6),
(6, 69, 11, 6),
(7, 66, 12, 6),
(8, 102, 6, 7),
(9, 99, 7, 7),
(10, 96, 8, 7),
(11, 93, 9, 7),
(12, 90, 10, 7),
(13, 87, 11, 7),
(14, 84, 12, 7),
(15, 81, 13, 7),
(16, 78, 14, 7),
(17, 75, 15, 7),
(18, 72, 16, 7),
(19, 96, 6, 8),
(20, 93, 7, 8),
(21, 90, 8, 8),
(22, 87, 9, 8),
(23, 84, 10, 8),
(24, 81, 11, 8),
(25, 78, 12, 8),
(26, 75, 13, 8),
(27, 72, 14, 8),
(28, 69, 15, 8),
(29, 66, 16, 8),
(30, 63, 17, 8),
(31, 60, 18, 8),
(32, 57, 19, 8),
(33, 54, 20, 8),
(34, 78, 6, 9),
(35, 75, 7, 9),
(36, 72, 8, 9),
(37, 69, 9, 9),
(38, 66, 10, 9),
(39, 63, 11, 9),
(40, 60, 12, 9),
(41, 90, 6, 10),
(42, 87, 7, 10),
(43, 84, 8, 10),
(44, 81, 9, 10),
(45, 78, 10, 10),
(46, 75, 11, 10),
(47, 72, 12, 10),
(48, 69, 13, 10),
(49, 66, 14, 10),
(50, 63, 15, 10),
(51, 60, 16, 10),
(52, 84, 6, 11),
(53, 81, 7, 11),
(54, 78, 8, 11),
(55, 75, 9, 11),
(56, 72, 10, 11),
(57, 69, 11, 11),
(58, 66, 12, 11),
(59, 63, 13, 11),
(60, 60, 14, 11),
(61, 57, 15, 11),
(62, 54, 16, 11),
(63, 51, 17, 11),
(64, 48, 18, 11),
(65, 45, 19, 11),
(66, 42, 20, 11),
(67, 78, 6, 12),
(68, 75, 7, 12),
(69, 72, 8, 12),
(70, 69, 9, 12),
(71, 66, 10, 12),
(72, 63, 11, 12),
(73, 60, 12, 12),
(74, 57, 13, 12),
(75, 54, 14, 12),
(76, 51, 15, 12),
(77, 48, 16, 12),
(78, 45, 17, 12),
(79, 42, 18, 12),
(80, 39, 19, 12),
(81, 36, 20, 12),
(82, 78, 6, 13),
(83, 75, 7, 13),
(84, 72, 8, 13),
(85, 69, 9, 13),
(86, 66, 10, 13),
(87, 63, 11, 13),
(88, 60, 12, 13),
(89, 80, 6, 14),
(90, 77, 7, 14),
(91, 74, 8, 14),
(92, 90, 6, 15),
(93, 87, 7, 15),
(94, 84, 8, 15),
(95, 81, 9, 15),
(96, 78, 10, 15),
(97, 75, 11, 15),
(98, 72, 12, 15),
(99, 84, 6, 16),
(100, 81, 7, 16),
(101, 78, 8, 16),
(102, 75, 9, 16),
(103, 72, 10, 16),
(104, 69, 11, 16),
(105, 66, 12, 16),
(106, 63, 13, 16),
(107, 60, 14, 16),
(108, 57, 15, 16),
(109, 54, 16, 16),
(110, 80, 6, 17),
(111, 75, 7, 17),
(112, 72, 8, 17),
(113, 69, 9, 17),
(114, 66, 10, 17);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mail`, `tel`, `mdp`, `statut`) VALUES
(1, 'test', 'test', 'test@mail.com', '01 11 11 11 11', '$2y$10$D5SqKCIj6MEVS7s9R8cF9uRRYlrHgLn/XCW/mFafW1cwO2mo87Tmq', 1),
(2, 'ADMIN', 'ADMIN', 'admin@mail.com', '01 11 11 11 11', '$2y$10$13xjFHrNoeSGw47vVeVH0uH37kL6goEnSrs1AzFzLuW/BTx8JRCj6', 2),
(3, 'Ledig', 'Inès', 'ines3434.l@gmail.com', '06 44 29 18 64', '$2y$10$p1wRc6u1ZS4d9kvZAPGlXuA8/tWHqpj/aphVB/Ngw5XHRBAKpUslW', 1),
(4, 'Deiber', 'Emilie', 'emilie.deiber@uha.fr', 'NULL', '$2y$10$prV7D.7RyBk74wfEoGgk4.bTU9B1GAn5K8PNcW8op2qtKcYiEUZVu', 1),
(5, 'Monseran', 'Lauryne', 'lauryne.monseran@uha.fr', 'NULL', '$2y$10$LBpgjhMOt9AJdMwds0qhAes3ucbfIZ3dQ45VL8FLkrhlUATj2V8Dq', 1),
(6, 'Seiller', 'Florian', 'florian.seiller@uha.fr', 'NULL', '$2y$10$tQMhsq6bcATC0l2olay9s.bwq4CrjqvwbF2NMToA/eDajsaWGiXiq', 1),
(7, 'Y', 'I don\'t know', 'idontknowY@uha.fr', 'NULL', '$2y$10$0fQVmiCVtB3nDBM9E4pxCOncBAmUwlNWuZ1p6AUfe/pf/WAHaedF2', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `escape`
--
ALTER TABLE `escape`
  ADD PRIMARY KEY (`id_escape`);

--
-- Index pour la table `evaluer`
--
ALTER TABLE `evaluer`
  ADD PRIMARY KEY (`id_avis`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`id_reserver`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `escape`
--
ALTER TABLE `escape`
  MODIFY `id_escape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `evaluer`
--
ALTER TABLE `evaluer`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `reserver`
--
ALTER TABLE `reserver`
  MODIFY `id_reserver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
