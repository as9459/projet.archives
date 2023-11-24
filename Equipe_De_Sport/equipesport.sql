  -- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14 مايو 2023 الساعة 06:41
-- إصدار الخادم: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19887702_equipesport`
--

-- --------------------------------------------------------

--
-- بنية الجدول `etat_joueurs`
--

CREATE TABLE `etat_joueurs` (
  `id_etat` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `etat_joueurs`
--

INSERT INTO `etat_joueurs` (`id_etat`, `description`) VALUES
('RAE', 'Le joueur remplaçant dans le match a été entré'),
('RTM', 'Le joueur a été choisi comme remplaçant dans le match et il reste tout le match'),
('TAS', 'Le joueur titulaire dans le match a été sorti'),
('TTM', 'Le joueur a été choisi comme titulaire dans le match et il reste tout le match');

-- --------------------------------------------------------

--
-- بنية الجدول `joueurs`
--

CREATE TABLE `joueurs` (
  `iD_joueurs` int(3) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `numeroLicence` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `taille` decimal(8,2) NOT NULL,
  `poids` decimal(8,2) NOT NULL,
  `iD_statut` char(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `joueurs`
--

INSERT INTO `joueurs` (`iD_joueurs`, `nom`, `prenom`, `dateNaissance`, `numeroLicence`, `taille`, `poids`, `iD_statut`) VALUES
(1, 'Paulllo', 'Aris', '1988-11-19', '123456789963852', 2.50, 90.10, 'ACT'),
(2, 'Kahm', 'Eto', '1990-11-20', '456789123741258', 1.86, 81.20, 'ABS'),
(3, 'Valent', 'Ambi', '1995-05-07', '234561564896789', 1.79, 78.40, 'BLS'),
(4, 'Par', 'Aplui', '1992-12-23', '164789878546123', 1.78, 75.20, 'ACT'),
(5, 'Poulain', 'Amel', '1989-05-26', '134546589845613', 1.82, 82.50, 'SPN'),
(6, 'Time', 'Vincent', '1975-02-25', '556135686898512', 1.95, 90.10, 'BLS'),
(7, 'Counia', 'Manmanw', '1969-03-31', '621354646895616', 1.68, 75.60, 'ACT'),
(8, 'Fils', 'Auri', '1994-11-13', '798956213132566', 1.84, 76.30, 'ACT'),
(9, 'Hole', 'Cabri', '1989-05-23', '865132154654513', 1.78, 78.60, 'ACT'),
(10, 'Vi', 'Mister', '1985-07-29', '956513568796545', 1.77, 75.10, 'ACT'),
(11, 'Positif', 'Seraud', '1987-06-17', '458651325613216', 1.86, 80.40, 'ACT'),
(12, 'Christ', 'Jésus', '1990-12-25', '989598988513235', 1.82, 78.30, 'ACT'),
(13, 'Ivalent', 'Paul', '1993-02-22', '888885465132155', 1.93, 90.10, 'ACT'),
(14, 'Telement', 'Ecart', '1979-01-15', '759877754651232', 1.74, 76.30, 'ACT'),
(15, 'Remme', 'Theo', '1981-01-12', '665453215445489', 1.95, 86.50, 'ACT'),
(16, 'Tume', 'Amer', '1992-01-21', '333215645447988', 1.69, 69.80, 'ACT'),
(17, 'Tation', 'Levi', '1988-05-11', '554688895651213', 1.88, 89.40, 'ACT'),
(18, 'Strement', 'Encas', '1979-06-17', '998787987875544', 1.92, 70.80, 'BLS'),
(19, 'Potter', 'Harry', '1993-05-18', '121324654598651', 1.81, 77.30, 'SPN'),
(20, 'Lage', 'Carthi', '1990-07-23', '555644489666321', 1.79, 79.70, 'ACT'),
(21, 'nom test&amp;é&quot;', 'prénom', '2023-01-09', '1234', 11.00, 22.00, 'ACT'),
(22, 'nom', 'p', '2023-01-10', '11', 11.00, 22.00, 'ACT');

-- --------------------------------------------------------

--
-- بنية الجدول `joueurs_poste`
--

CREATE TABLE `joueurs_poste` (
  `iD_poste` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `poste_description` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `joueurs_poste`
--

INSERT INTO `joueurs_poste` (`iD_poste`, `poste_description`) VALUES
('AD', 'Attaques au Droit'),
('AG', 'Attaques au Gauche'),
('BT', 'Attaques du Lance'),
('DC', 'Defenses de Coeur '),
('DD', 'Defenses au Droit'),
('DG', 'Defenses au Gauche'),
('G', 'Gardien '),
('MC', 'Milieu de Coeur'),
('MD', 'Milieu au Droit'),
('MG', 'Milieu au Gauche'),
('MOC', 'Milieu au Coeur de terrain');

-- --------------------------------------------------------

--
-- بنية الجدول `joueurs_statut`
--

CREATE TABLE `joueurs_statut` (
  `iD_statut` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `commentaires` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `joueurs_statut`
--

INSERT INTO `joueurs_statut` (`iD_statut`, `commentaires`) VALUES
('ABS', 'Absent'),
('ACT', 'Actif'),
('BLS', 'Blessé'),
('SPN', 'Suspendu');

-- --------------------------------------------------------

--
-- بنية الجدول `lieus`
--

CREATE TABLE `lieus` (
  `iD_lieus` int(3) NOT NULL,
  `lieuRencontre` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `lieus`
--

INSERT INTO `lieus` (`iD_lieus`, `lieuRencontre`) VALUES
(1, 'Domicile'),
(2, 'Extérieur');

-- --------------------------------------------------------

--
-- بنية الجدول `matchs`
--

CREATE TABLE `matchs` (
  `iD_matchs` int(3) NOT NULL,
  `dateMatch` date NOT NULL,
  `heureMatch` time NOT NULL,
  `equipeAdverse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `score` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `iD_lieus` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `matchs`
--

INSERT INTO `matchs` (`iD_matchs`, `dateMatch`, `heureMatch`, `equipeAdverse`, `score`, `iD_lieus`) VALUES
(1001, '2023-02-01', '15:06:24', 'Paris Saint Germain', 'N - N', 1),
(1002, '2023-01-10', '11:00:00', 'Olympique Lyonnais', 'N - N', 2),
(1003, '2023-01-19', '15:04:36', 'Fromagi', '2 - 1', 2),
(1004, '2022-06-03', '15:07:25', 'Gens Beaunneaux', '4 - 0', 1),
(1005, '2008-05-17', '14:20:11', 'Les Pingouins Du Saarah', '0 - 11', 1),
(1006, '2009-01-31', '13:50:12', 'Inazuma Japon', '0 - 5', 2),
(1007, '2020-04-25', '17:25:32', 'Les Kebabs Marsiens', '0 - 0', 2),
(1008, '2019-06-28', '18:30:26', 'Les Ecolos Du Dimanche', '3 - 3', 2),
(1009, '2022-01-26', '13:15:16', 'Riz Cantonnais', '2 - 2', 1),
(1010, '2021-12-05', '11:30:14', 'Jackson Five', '1 - 1', 1),
(1011, '2023-02-09', '14:06:24', 'Paris Saint Germain', 'N - N', 1),
(1012, '2023-01-30', '12:30:00', 'lyon equipe', 'N - N', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `participer`
--

CREATE TABLE `participer` (
  `joueur_position` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `evaluer` text COLLATE utf8_unicode_ci NOT NULL,
  `nbCarteRouge` int(3) NOT NULL,
  `nbCarteJaune` int(3) NOT NULL,
  `nbTirsCadres` int(3) NOT NULL,
  `iD_matchs` int(3) NOT NULL,
  `iD_joueurs` int(3) NOT NULL,
  `id_etat` char(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `participer`
--

INSERT INTO `participer` (`joueur_position`, `evaluer`, `nbCarteRouge`, `nbCarteJaune`, `nbTirsCadres`, `iD_matchs`, `iD_joueurs`, `id_etat`) VALUES
('MOC', '15', 0, 1, 1, 1003, 1, 'TTM'),
('MD', '17', 0, 0, 1, 1003, 7, 'TTM'),
('DG', '16', 0, 0, 0, 1003, 8, 'TTM'),
('DC', '13', 0, 0, 0, 1003, 9, 'TTM'),
('DD', '14', 0, 0, 0, 1003, 10, 'TTM'),
('G', '12', 0, 0, 0, 1003, 11, 'TTM'),
('AG', '11', 0, 0, 0, 1003, 12, 'TTM'),
('BT', '10', 0, 0, 0, 1003, 13, 'TTM'),
('MC', '13', 0, 0, 0, 1003, 14, 'TTM'),
('MG', '10', 0, 0, 0, 1003, 15, 'TTM'),
('AD', '9', 0, 1, 0, 1003, 16, 'TAS'),
('MG', '11', 0, 0, 0, 1003, 4, 'RAE'),
('MG', '0', 0, 0, 0, 1003, 17, 'RTM'),
('DC', '0', 0, 0, 0, 1003, 20, 'RTM');

-- --------------------------------------------------------

--
-- بنية الجدول `role`
--

CREATE TABLE `role` (
  `iD_joueurs` int(3) NOT NULL,
  `iD_poste` char(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `role`
--

INSERT INTO `role` (`iD_joueurs`, `iD_poste`) VALUES
(2, 'BT'),
(3, 'AD'),
(4, 'MG'),
(5, 'MOC'),
(6, 'MC'),
(7, 'MD'),
(8, 'DG'),
(9, 'DC'),
(10, 'DD'),
(11, 'G'),
(12, 'AG'),
(12, 'BT'),
(13, 'BT'),
(13, 'AD'),
(14, 'AG'),
(14, 'MG'),
(14, 'MC'),
(15, 'MG'),
(15, 'MOC'),
(15, 'MC'),
(15, 'MD'),
(16, 'AD'),
(16, 'MC'),
(16, 'MD'),
(17, 'MG'),
(17, 'DG'),
(18, 'MD'),
(18, 'DD'),
(19, 'DG'),
(19, 'DC'),
(19, 'DD'),
(20, 'DC'),
(20, 'G'),
(1, 'MOC'),
(1, 'MC'),
(1, 'DC'),
(22, 'MG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etat_joueurs`
--
ALTER TABLE `etat_joueurs`
  ADD PRIMARY KEY (`id_etat`);

--
-- Indexes for table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`iD_joueurs`),
  ADD KEY `FK_joueurs_id_statut` (`iD_statut`);

--
-- Indexes for table `joueurs_poste`
--
ALTER TABLE `joueurs_poste`
  ADD PRIMARY KEY (`iD_poste`);

--
-- Indexes for table `joueurs_statut`
--
ALTER TABLE `joueurs_statut`
  ADD PRIMARY KEY (`iD_statut`);

--
-- Indexes for table `lieus`
--
ALTER TABLE `lieus`
  ADD PRIMARY KEY (`iD_lieus`);

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`iD_matchs`),
  ADD KEY `FK_matchs_iD_lieus` (`iD_lieus`);

--
-- Indexes for table `participer`
--
ALTER TABLE `participer`
  ADD KEY `FK_participer_iD_joueurs` (`iD_joueurs`),
  ADD KEY `FK_participer_iD_matchs` (`iD_matchs`),
  ADD KEY `FK_participer_id_etat` (`id_etat`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD KEY `FK_role_iD_joueurs` (`iD_joueurs`),
  ADD KEY `FK_role_iD_poste` (`iD_poste`);

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `joueurs`
--
ALTER TABLE `joueurs`
  ADD CONSTRAINT `FK_joueurs_id_statut` FOREIGN KEY (`iD_statut`) REFERENCES `joueurs_statut` (`iD_statut`);

--
-- القيود للجدول `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `FK_matchs_iD_lieus` FOREIGN KEY (`iD_lieus`) REFERENCES `lieus` (`iD_lieus`);

--
-- القيود للجدول `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `FK_participer_iD_joueurs` FOREIGN KEY (`iD_joueurs`) REFERENCES `joueurs` (`iD_joueurs`),
  ADD CONSTRAINT `FK_participer_iD_matchs` FOREIGN KEY (`iD_matchs`) REFERENCES `matchs` (`iD_matchs`),
  ADD CONSTRAINT `FK_participer_id_etat` FOREIGN KEY (`id_etat`) REFERENCES `etat_joueurs` (`id_etat`);

--
-- القيود للجدول `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `FK_role_iD_joueurs` FOREIGN KEY (`iD_joueurs`) REFERENCES `joueurs` (`iD_joueurs`),
  ADD CONSTRAINT `FK_role_iD_poste` FOREIGN KEY (`iD_poste`) REFERENCES `joueurs_poste` (`iD_poste`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
