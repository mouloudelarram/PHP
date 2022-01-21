-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 jan. 2022 à 19:10
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `game`
--

-- --------------------------------------------------------

--
-- Structure de la table `usersgame`
--

CREATE TABLE `usersgame` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `score` int(11) DEFAULT 0,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `usersgame`
--

INSERT INTO `usersgame` (`id`, `username`, `email`, `score`, `password`) VALUES
(1, 'wtattersfield0', 'ctomsa0@mtv.com', 783, 'mVPuQs8lMG'),
(2, 'msaltman1', 'csakins1@netlog.com', 825, 'xjrvabRX00Q'),
(3, 'dboor2', 'mdalmon2@ameblo.jp', 936, 'eXahqnVHoWo'),
(4, 'emacconnal3', 'oturnock3@usa.gov', 286, 'BCWH3o0khH'),
(5, 'cjoyce4', 'pmourant4@flickr.com', 5, 'zOAjQQIMv'),
(6, 'wturvey5', 'ljenks5@foxnews.com', 531, '3ZezVOWZ9y'),
(7, 'acockren6', 'mmaddock6@bandcamp.com', 253, 'gSwhB30'),
(8, 'jbader7', 'wpembridge7@youku.com', 411, 'cheZn1Ck'),
(9, 'ewarde8', 'sstorre8@bluehost.com', 727, 'BGCBa9Vn'),
(10, 'egarthside9', 'cstrete9@techcrunch.com', 347, '9Ar6Y8C'),
(11, 'kmcilwricka', 'cirnysa@msn.com', 403, 'BB22Pi'),
(12, 'bstandishbrooksb', 'sseekingsb@redcross.org', 389, 'yDIbfrT'),
(13, 'nskulec', 'egreenmanc@ftc.gov', 12, 'Svdhs8gm5'),
(14, 'lcotilardd', 'ccarsed@123-reg.co.uk', 102, '2wWoICW'),
(15, 'fellene', 'gtiddere@artisteer.com', 969, 'Niy4O2F0xiaM'),
(16, 'cmcinnesf', 'sspilsburyf@nymag.com', 6, '164YTJ'),
(17, 'eguyonnetg', 'swolffersg@com.com', 854, '0xqKr9v'),
(18, 'jbosketh', 'bhaszardh@earthlink.net', 793, 'hBkjqF'),
(19, 'edelphi', 'jliddardi@tmall.com', 847, 'sd4rZGLl'),
(20, 'egassonj', 'lwynrahamej@usgs.gov', 529, 'MFFfRBAB'),
(21, 'spetlyurak', 'mglowinskik@statcounter.com', 849, 'VLFXaDb'),
(22, 'fbournerl', 'kchittockl@hostgator.com', 432, 'aXkVyVRi'),
(23, 'drandlem', 'gbarthelmesm@ibm.com', 307, '0gsaeL'),
(24, 'trykertn', 'wgoggenn@prweb.com', 305, 'pvNQhVlhEEg'),
(25, 'agascaro', 'ascafeo@cbc.ca', 997, 'UTSivhy'),
(26, 'mouloud', 'user1@gmail.com', 1015, 'user1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `usersgame`
--
ALTER TABLE `usersgame`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `usersgame`
--
ALTER TABLE `usersgame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
