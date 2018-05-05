-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 05 mai 2018 à 16:19
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ami`
--

CREATE TABLE `ami` (
  `id_ami` int(11) NOT NULL,
  `pseudo1` varchar(50) DEFAULT NULL,
  `pseudo2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ami`
--

INSERT INTO `ami` (`id_ami`, `pseudo1`, `pseudo2`) VALUES
(1, 'pseudo', 'pseudoAmi');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_photo`
--

CREATE TABLE `commentaire_photo` (
  `id_commentaire` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `id_photo` int(11) DEFAULT NULL,
  `commentaire` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_publication`
--

CREATE TABLE `commentaire_publication` (
  `id_commentairepub` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL,
  `commentairepub` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id_competence` int(11) NOT NULL,
  `competence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `titre` varchar(50) NOT NULL,
  `compagnie` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `evenenement` (
  `id_evenement` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `confidentialite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id_evenement` int(11) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(11) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `experience` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `formation` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `interet`
--

CREATE TABLE `interet` (
  `id_interet` int(11) NOT NULL,
  `interet` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `like_photo`
--

CREATE TABLE `like_photo` (
  `id_like` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `id_photo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `like_publication`
--

CREATE TABLE `like_publication` (
  `id_likePub` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id_message` int(11) NOT NULL,
  `expediteur` varchar(50) DEFAULT NULL,
  `destinataire` varchar(50) DEFAULT NULL,
  `message` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `confidentialite` varchar(50) NOT NULL,
  `id_album` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id_publication` int(11) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `postulant`
--

CREATE TABLE `postulant` (
  `pseudo` varchar(50) DEFAULT NULL,
  `id_offre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_photo` int(11) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `test_publication` text,
  `pseudo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `date`, `heure`, `test_publication`, `pseudo`) VALUES
(7, '2018-05-05', '16:09:27', 'Bonjour !', 'nawou');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_statut` int(11) NOT NULL,
  `nom_statut` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `nom_statut`) VALUES
(1, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `type_photo`
--

CREATE TABLE `type_photo` (
  `type` varchar(2) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pseudo` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `tel` varchar(15) NOT NULL,
  `sexe` char(1) NOT NULL,
  `statut_pro` varchar(50) NOT NULL,
  `id_statut` int(255) DEFAULT NULL,
  `id_formation` int(255) DEFAULT NULL,
  `id_experience` int(255) DEFAULT NULL,
  `id_interet` int(255) DEFAULT NULL,
  `id_competence` int(255) DEFAULT NULL,
  `formation` text,
  `experience` text,
  `competences` text,
  `interets` text,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `nom`, `prenom`, `email`, `mdp`, `date_naissance`, `tel`, `sexe`, `statut_pro`, `id_statut`, `id_formation`, `id_experience`, `id_interet`, `id_competence`, `formation`, `experience`, `competences`, `interets`, `photo`) VALUES
('nawou', 'Lalioui', 'Nawel', 'nawel.uae@gmail.com', 'na', '1996-07-21', '0643882803', 'F', 'Etudiante', NULL, NULL, NULL, NULL, NULL, 'Paris-Sud', 'prof', 'JAVA', 'Gastronomie', 'ppnawou.jpeg'),
('sou97', 'Maherzi', 'Soufia', 'smaherzi@yahoo.fr', 'sou', '1997-03-10', '0640464483', 'F', 'Etudiante', 1, NULL, NULL, NULL, NULL, 'PREPA', 'Emploi', 'HTML', 'sport', 'ppsoufia.jpeg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Index pour la table `ami`
--
ALTER TABLE `ami`
  ADD PRIMARY KEY (`id_ami`),
  ADD KEY `pseudo1` (`pseudo1`),
  ADD KEY `pseudo2` (`pseudo2`);

--
-- Index pour la table `commentaire_photo`
--
ALTER TABLE `commentaire_photo`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_photo` (`id_photo`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `commentaire_publication`
--
ALTER TABLE `commentaire_publication`
  ADD PRIMARY KEY (`id_commentairepub`),
  ADD KEY `id_publication` (`id_publication`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `evenenement`
--
ALTER TABLE `evenenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `interet`
--
ALTER TABLE `interet`
  ADD PRIMARY KEY (`id_interet`);

--
-- Index pour la table `like_photo`
--
ALTER TABLE `like_photo`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `pseudo` (`pseudo`),
  ADD KEY `id_photo` (`id_photo`);

--
-- Index pour la table `like_publication`
--
ALTER TABLE `like_publication`
  ADD PRIMARY KEY (`id_likePub`),
  ADD KEY `pseudo` (`pseudo`),
  ADD KEY `id_publication` (`id_publication`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `destinataire` (`destinataire`),
  ADD KEY `expediteur` (`expediteur`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_album` (`id_album`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD KEY `Id_publication` (`id_publication`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `postulant`
--
ALTER TABLE `postulant`
  ADD KEY `pseudo` (`pseudo`),
  ADD KEY `id_offre` (`id_offre`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD KEY `id_photo` (`id_photo`),
  ADD KEY `pseudo` (`pseudo`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statut`);

--
-- Index pour la table `type_photo`
--
ALTER TABLE `type_photo`
  ADD PRIMARY KEY (`type`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pseudo`),
  ADD KEY `id_formation` (`id_formation`),
  ADD KEY `id_experience` (`id_experience`),
  ADD KEY `id_interet` (`id_interet`),
  ADD KEY `id_competence` (`id_competence`),
  ADD KEY `id_statut` (`id_statut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ami`
--
ALTER TABLE `ami`
  MODIFY `id_ami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `commentaire_photo`
--
ALTER TABLE `commentaire_photo`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaire_publication`
--
ALTER TABLE `commentaire_publication`
  MODIFY `id_commentairepub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `evenenement`
--
ALTER TABLE `evenenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `interet`
--
ALTER TABLE `interet`
  MODIFY `id_interet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `like_photo`
--
ALTER TABLE `like_photo`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `like_publication`
--
ALTER TABLE `like_publication`
  MODIFY `id_likePub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
