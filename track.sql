-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 04 mai 2018 à 16:13
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `track`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ami`
--

DROP TABLE IF EXISTS `ami`;
CREATE TABLE IF NOT EXISTS `ami` (
  `id_ami` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo1` varchar(50) DEFAULT NULL,
  `pseudo2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ami`),
  KEY `pseudo1` (`pseudo1`),
  KEY `pseudo2` (`pseudo2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_photo`
--

DROP TABLE IF EXISTS `commentaire_photo`;
CREATE TABLE IF NOT EXISTS `commentaire_photo` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) DEFAULT NULL,
  `id_photo` int(11) DEFAULT NULL,
  `commentaire` tinytext NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `id_photo` (`id_photo`),
  KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_publication`
--

DROP TABLE IF EXISTS `commentaire_publication`;
CREATE TABLE IF NOT EXISTS `commentaire_publication` (
  `id_commentairepub` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL,
  `commentairepub` tinytext NOT NULL,
  PRIMARY KEY (`id_commentairepub`),
  KEY `id_publication` (`id_publication`),
  KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `id_competence` int(11) NOT NULL AUTO_INCREMENT,
  `competence` int(11) NOT NULL,
  PRIMARY KEY (`id_competence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
CREATE TABLE IF NOT EXISTS `emploi` (
  `titre` varchar(50) NOT NULL,
  `compagnie` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id_offre` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_offre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`titre`, `compagnie`, `description`, `id_offre`) VALUES
('Ingenieur R&D', 'THALES', 'Rejoignez le Centre de Competences HTE recherche de Thales, leader mondial des technologies de surete et de securite pour les marches de l\'Aerospatial, du Transport, de la Defense et de la Securite. \r\nBase(e) a Gennevilliers (92)\r\nAppelez le 0650565593 si cette offre vous interesse.', 1),
('Ingenieur Intelligence Artificielle', 'Orange', 'Vous integrez une equipe dediee a l\'anticipation et la strategie afin de participer au developpement de solutions d\'intelligence artificielle et d\'ameliorer l\'analyse et detection des causes racines des pannes \r\nAppelez le 0650336754 si cette offre vous interresse.', 2),
('Ingenieur logiciels embarques', 'Parrot Drones', 'Au sein de la filiale Parrot drone, situee dans le 10e arrondissement de Paris, vous serez integre a l\'equipe  Drones core products enos en tant qu\'Ingenieur logiciel embarque. \r\nL\'equipe firmware core products a pour responsabilite le developpement du firmware embarque dans les produits Parrot. \r\nAppelez le 0640460000 si cette offre vous interresse.', 3),
('Ingenieur en Systemes Embarques', 'Safran', 'Vos missions seront de :\r\nRediger les specifications logicielles et les specifications detaillees du logiciel ;\r\nContribuer au developpement du logiciel : modelisation, codage, debug et test ;\r\nSuivre les livraisons des sous-traitants : suivi de l\'avancement et verification des travaux rendus.\r\nAppelez le 0650565593 si cette offre vous interesse.', 4);

-- --------------------------------------------------------

--
-- Structure de la table `evenenement`
--

DROP TABLE IF EXISTS `evenenement`;
CREATE TABLE IF NOT EXISTS `evenenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `confidentialite` varchar(50) NOT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_evenement` int(11) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  KEY `id_evenement` (`id_evenement`),
  KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id_experience` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `experience` tinytext NOT NULL,
  PRIMARY KEY (`id_experience`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `formation` tinytext NOT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `interet`
--

DROP TABLE IF EXISTS `interet`;
CREATE TABLE IF NOT EXISTS `interet` (
  `id_interet` int(11) NOT NULL AUTO_INCREMENT,
  `interet` tinytext NOT NULL,
  PRIMARY KEY (`id_interet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `like_photo`
--

DROP TABLE IF EXISTS `like_photo`;
CREATE TABLE IF NOT EXISTS `like_photo` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) DEFAULT NULL,
  `id_photo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_like`),
  KEY `pseudo` (`pseudo`),
  KEY `id_photo` (`id_photo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `like_publication`
--

DROP TABLE IF EXISTS `like_publication`;
CREATE TABLE IF NOT EXISTS `like_publication` (
  `id_likePub` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_likePub`),
  KEY `pseudo` (`pseudo`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `expediteur` varchar(50) DEFAULT NULL,
  `destinataire` varchar(50) DEFAULT NULL,
  `message` tinytext NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `destinataire` (`destinataire`),
  KEY `expediteur` (`expediteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `confidentialite` varchar(50) NOT NULL,
  `id_album` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `id_album` (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_publication` int(11) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  KEY `Id_publication` (`id_publication`),
  KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `postulant`
--

DROP TABLE IF EXISTS `postulant`;
CREATE TABLE IF NOT EXISTS `postulant` (
  `pseudo` varchar(50) DEFAULT NULL,
  `id_offre` int(11) DEFAULT NULL,
  KEY `pseudo` (`pseudo`),
  KEY `id_offre` (`id_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id_photo` int(11) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  KEY `id_photo` (`id_photo`),
  KEY `pseudo` (`pseudo`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `confidentialite` varchar(50) NOT NULL,
  PRIMARY KEY (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int(11) NOT NULL AUTO_INCREMENT,
  `nom_statut` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `nom_statut`) VALUES
(1, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `type_photo`
--

DROP TABLE IF EXISTS `type_photo`;
CREATE TABLE IF NOT EXISTS `type_photo` (
  `type` varchar(2) NOT NULL,
  `nom_type` varchar(50) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `pseudo` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `tel` int(8) NOT NULL,
  `sexe` char(1) NOT NULL,
  `statut_pro` varchar(50) NOT NULL,
  `id_statut` int(255) DEFAULT NULL,
  `id_formation` int(255) DEFAULT NULL,
  `id_experience` int(255) DEFAULT NULL,
  `id_interet` int(255) DEFAULT NULL,
  `id_competence` int(255) DEFAULT NULL,
  PRIMARY KEY (`pseudo`),
  KEY `id_formation` (`id_formation`),
  KEY `id_experience` (`id_experience`),
  KEY `id_interet` (`id_interet`),
  KEY `id_competence` (`id_competence`),
  KEY `id_statut` (`id_statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `nom`, `prenom`, `email`, `mdp`, `date_naissance`, `tel`, `sexe`, `statut_pro`, `id_statut`, `id_formation`, `id_experience`, `id_interet`, `id_competence`) VALUES
('sou97', 'maherzi', 'soufia', 'smaherzi@yahoo.fr', 'sou', '1997-03-10', 640464483, 'F', 'etudiant', 1, NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ami`
--
ALTER TABLE `ami`
  ADD CONSTRAINT `ami_ibfk_1` FOREIGN KEY (`pseudo1`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ami_ibfk_2` FOREIGN KEY (`pseudo2`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire_photo`
--
ALTER TABLE `commentaire_photo`
  ADD CONSTRAINT `commentaire_photo_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_photo_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire_publication`
--
ALTER TABLE `commentaire_publication`
  ADD CONSTRAINT `commentaire_publication_ibfk_1` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_publication_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`id_evenement`) REFERENCES `evenenement` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `like_photo`
--
ALTER TABLE `like_photo`
  ADD CONSTRAINT `like_photo_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_photo_ibfk_2` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `like_publication`
--
ALTER TABLE `like_publication`
  ADD CONSTRAINT `like_publication_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_publication_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `messagerie_ibfk_1` FOREIGN KEY (`destinataire`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messagerie_ibfk_2` FOREIGN KEY (`expediteur`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `postulant`
--
ALTER TABLE `postulant`
  ADD CONSTRAINT `postulant_ibfk_1` FOREIGN KEY (`id_offre`) REFERENCES `emploi` (`id_offre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postulant_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profil_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profil_ibfk_3` FOREIGN KEY (`type`) REFERENCES `type_photo` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`id_competence`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_experience`) REFERENCES `experience` (`id_experience`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_3` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_4` FOREIGN KEY (`id_interet`) REFERENCES `interet` (`id_interet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_5` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
