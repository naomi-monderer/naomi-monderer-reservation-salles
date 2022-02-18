-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 fév. 2022 à 12:47
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateurs`) VALUES
(16, 'Forrest Gump', 'Quelques décennies d\'histoire américaine, des années 1940 à la fin du XXème siècle, à travers le regard et l\'étrange odyssée d\'un homme simple et pur, Forrest Gump. ', '2022-02-16 12:00:00', '2022-02-16 13:00:00', 15),
(17, 'La Liste de Schindler', 'Evocation des années de guerre d\'Oskar Schindler, industriel autrichien rentré à Cracovie en 1939 avec les troupes allemandes. Il va, tout au long de la guerre, protéger des juifs en les faisant travailler dans sa fabrique.', '2022-02-16 17:00:00', '2022-02-16 18:00:00', 15),
(14, 'La Ligne verte', 'Paul Edgecomb, Gardien-chef du pénitencier de Cold Mountain en 1935, était chargé de veiller au bon déroulement des exécutions capitales. Parmi les prisonniers se trouvait un colosse du nom de John Coffey... ', '2022-02-15 08:00:00', '2022-02-15 09:00:00', 14),
(15, '12 hommes en colère', 'Lors d\'un procès, un juré émet l\'hypothèse que l\'homme qu\'il doit juger n\'est peut-être pas coupable. Il va tenter de convaincre les onze autres jurés. ', '2022-02-15 08:00:00', '2022-02-15 09:00:00', 6),
(13, 'Taken', 'Que peut-on imaginer de pire pour un père que d\'assister impuissant à l\'enlèvement de sa fille via un téléphone portable ? C\'est le cauchemar vécu par Bryan, ancien agent des services secrets américains, qui n\'a que quelques heures pour arracher Kim des mains d\'un redoutable gang spécialisé dans la traite des femmes. Premier problème à résoudre : il est à Los Angeles, elle vient de se faire enlever à Paris. ', '2022-02-08 16:00:00', '2022-02-08 17:00:00', 10),
(12, 'Fight club', 'Le narrateur, vit seul, travaille seul, dort seul, comme beaucoup d\'autres personnes seules qui connaissent la misère morale et sexuelle. C\'est pourquoi il va devenir membre du Fight club, un lieu clandestin dirigé par Tyler Durden, anarchiste entre gourou et philosophe.', '2022-02-08 14:00:00', '2022-02-08 15:00:00', 6),
(11, 'L\'Attaque des Titans', 'Dans un monde ravagé par des titans mangeurs d’homme depuis plus d’un siècle, les rares survivants de l’Humanité n’ont d’autre choix pour survivre que de se barricader dans une cité-forteresse. Le jeune Eren, témoin de la mort de sa mère dévorée par un titan, n’a qu’un rêve : entrer dans le corps d’élite chargé de découvrir l’origine des Titans et les annihiler jusqu’au dernier… ', '2022-02-08 09:00:00', '2022-02-08 10:00:00', 11),
(10, 'Le Parrain', 'En 1945, à New York, les Corleone sont une des cinq familles de la mafia. Don Vito Corleone marie sa fille à un bookmaker. Sollozzo, \"parrain\" de la famille Tattaglia, propose à Don Vito une association dans le trafic de drogue... ', '2022-02-07 12:00:00', '2022-02-07 13:00:00', 11),
(18, 'Les Evadés', 'L\'amitié d\'un jeune banquier condamné à la prison à vie pour le meurtre de sa femme et d\'un vétéran de la prison de Shawshank, le pénitencier le plus sévère de l\'Etat du Maine.\r\nStreaming\r\nPresse\r\n3,2\r\nSpectateurs\r\n4,5\r\nMes amis ', '2022-02-16 08:00:00', '2022-02-16 09:00:00', 8),
(19, 'Le Seigneur des anneaux : le retour du roi', 'Tandis que les ténèbres se répandent sur la Terre du Milieu, Aragorn se révèle être l\'héritier caché des rois antiques. Quant à Frodon, toujours tenté par l\'Anneau, il voyage à travers les contrées ennemies, se reposant sur Sam et Gollum... ', '2022-02-16 14:00:00', '2022-02-16 15:00:00', 8),
(20, 'Le Roi Lion', ' à partir de 6 ans\r\nLe long combat de Simba le lionceau pour accéder à son rang de roi des animaux, après que le fourbe Scar, son oncle, a tué son père et pris sa place.', '2022-02-14 09:00:00', '2022-02-14 10:00:00', 8),
(21, 'Vol au-dessus d\'un nid de coucou', 'Rebellion dans un hôpital psychiatrique à l\'instigation d\'un malade qui se révolte contre la dureté d\'une infirmière. ', '2022-02-14 12:00:00', '2022-02-14 13:00:00', 8),
(22, 'The Dark Knight, Le Chevalier Noir', 'Batman entreprend de démanteler les dernières organisations criminelles de Gotham. Mais il se heurte bientôt à un nouveau génie du crime qui répand la terreur et le chaos dans la ville : le Joker... ', '2022-02-15 08:00:00', '2022-02-15 09:00:00', 8),
(23, 'Pulp Fiction', 'L\'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s\'entremêlent. ', '2022-02-15 10:00:00', '2022-02-15 16:00:00', 8),
(24, 'Il était une fois dans l\'Ouest', 'Un mystérieux desperado pourchasse sans relâche un dangereux criminel.', '2022-02-16 18:00:00', '2022-02-16 19:00:00', 8),
(25, 'Le Bon, la brute et le truand', 'Pendant la Guerre de Sécession, Tuco, Joe et Setenza, trois hommes préférant s\'intéresser à leur profit personnel, se lancent à la recherche d\'un coffre contenant 200 000 dollars en pièces d\'or volés à l\'armée sudiste. Chacun a besoin de l\'autre... ', '2022-02-16 18:00:00', '2022-02-16 19:00:00', 8),
(26, 'Il était une fois en Amérique', 'Il était une fois deux truands juifs, Max et Noodles, liés par un pacte d\'éternelle amitié. Débutant au début du siècle par de fructueux trafics dans le ghetto de New York, ils voient leurs chemins se séparer, lorsque Noodles se retrouve durant quelques années derrière les barreaux, puis se recouper en pleine période de prohibition, dans les années vingt. ', '2022-02-16 18:00:00', '2022-02-16 19:00:00', 8),
(27, 'Django Unchained', 'Le parcours d\'un chasseur de prime allemand et d\'un homme noir pour retrouver la femme de ce dernier retenue en esclavage par le propriétaire d\'une plantation... ', '2022-02-18 08:00:00', '2022-02-18 09:00:00', 16),
(28, 'Star Wars : Episode V - L\'Empire contre-attaque', 'Malgré la destruction de l\'Etoile Noire, l\'Empire maintient son emprise sur la galaxie, et poursuit sans relâche sa lutte contre l\'Alliance rebelle. Basés sur la planète glacée de Hoth, les rebelles essuient un assaut des troupes impériales... ', '2022-02-18 09:00:00', '2022-02-18 10:00:00', 16),
(29, 'Gran Torino', 'Walt Kowalski est un ancien de la guerre de Corée, un homme inflexible, amer et pétri de préjugés surannés. Hormis sa chienne Daisy, il ne fait confiance qu\'à son M-1, toujours propre, toujours prêt à l\'usage... ', '2022-02-20 15:00:00', '2022-02-20 16:00:00', 16),
(30, 'Gladiator', 'Le général romain Maximus est le plus fidèle soutien de l\'empereur Marc Aurèle, qu\'il a conduit de victoire en victoire avec une bravoure et un dévouement exemplaires. Jaloux du prestige de Maximus, et plus encore de l\'amour que lui voue l\'empereur, le fils de MarcAurèle, Commode, s\'arroge brutalement le pouvoir, puis ordonne l\'arrestation du ... ', '2022-02-20 13:00:00', '2022-02-20 14:00:00', 8),
(31, 'Boruto : Naruto, le film', 'Après un conflit qui a déchiré toute la région, Konoha connait enfin la prospérité et le progrès. C’est dans ce contexte paisible que Naruto est nommé 7e Hokage à la tête du Village des Feuilles. Il prépare la tenue du prochain examen de sélection des Ninjas de Moyennes Classes afin de détecter de nouveaux talents. Seule ombre au tableau : son fils Boruto, qui lui en veut terriblement car il se sent délaissé. Mais voilà que Sasuke rentre brusquement au village avec des informations inquiétantes… Boruto, en admiration devant le seul rival sérieux de son père, prend son courage à deux mains et supplie le dernier des Uchiwa de l’accepter comme disciple. Pendant les épreuves de l’examen, deux sombres individus s\'attaquent à Naruto ! Boruto est tétanisé et ne doit la vie sauve qu’à l’intervention de Sasuke. Il découvre stupéfait que Naruto a disparu avec ses mystérieux agresseurs au cours de l’attaque éclair… ', '2022-02-18 11:00:00', '2022-02-18 12:00:00', 17);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(17, 'sasuke', '$2y$10$y3uzcK7BwXMRVvgi2OB45egnTH4R.LPwDalTU/wehH2HNYWDo9fyC'),
(6, 'rita', '$2y$10$CCkoQQOM8VF0lpt2u40ybepCOR5O8ZjRBk5h8j8IA3TaUTD9psjhe'),
(7, 'oui', '$2y$10$veOEXCJJHnpdQVwv5qMw..JtM3OQNgJmWsuzhJXenooJmnsx3cuaS'),
(8, 'lll', '$2y$10$Lx4Y87w6B5qWbQCjfna46OMXdd2t.GVp.ejgI7XFrws1R2wS1eTta'),
(9, 'will', '$2y$10$u2YnWBv6rttGOLs1jHUMruJYxBHpvtTyyWtK9jZCr.upBLwmz0DwS'),
(10, 'non', '$2y$10$e5fAvrL1.9joObgaKhL7o.thVlumG2hrf/8XqKA2soKB.N9FTs7Sy'),
(11, 'cc', '$2y$10$21KCvBcETSjb/9PjxIOyvOoM1q.WjEf3lu0r7aNqgd1oq3ZAbr5v6'),
(13, 'okl', '$argon2i$v=19$m=65536,t=4,p=1$ZkZ3Q09CZUxOcXltZUpqQw$jRJKGNGILxM45cJh/tEZoOk9HeQcL5zF6kGkcnYFgoU'),
(14, 'mmm', '$2y$10$FXi2kuH9XRaMhmvlu.K6K.MUF6e7TCs1w2R4gDjOTzTcTNjX0Wfo6'),
(15, 'nbn', '$2y$10$REYs6JPqyQfszUtqMq5ni.AEtdfOgTWatgzy9L.GGVKPvHk6mX4lC'),
(16, 'pp', '$2y$10$e2pdxcFyCR4oggiFSFYq..yg/IIJEcQc8qWEA2sHVMaBBAjhe7r0.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
