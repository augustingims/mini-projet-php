-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2019 at 10:49 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gestionstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` bigint(20) NOT NULL,
  `libeleCategorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libeleCategorie`) VALUES
(5, 'Analgésiques non opioïdes'),
(6, 'Analgésiques opioïdes'),
(7, 'Antigoutteux'),
(8, 'ANTIALLERGIQUES ET ANTIANAPHYLACTIQUES');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `idFournisseur` bigint(20) NOT NULL,
  `laboratoire` varchar(255) DEFAULT NULL,
  `descriptionlab` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`idFournisseur`, `laboratoire`, `descriptionlab`, `telephone`) VALUES
(1, 'CHEMICAL FARMA', 'Fournisseur de medicaments', '26363774433'),
(2, 'CHEMINEAU LABORATOIRES', 'Fournisseur de medicaments', '56768999'),
(3, 'CDM LAVOISIER CHAIX ET DU MARAIS LABORATOIRES', 'Fournisseur de medicaments', '6466738849'),
(4, 'NOVARTIS PHARMA', 'Fournisseur de medicaments', '789343444');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `idFournisseur` bigint(20) NOT NULL,
  `idproduit` bigint(20) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `quant` bigint(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`idFournisseur`, `idproduit`, `date`, `quant`) VALUES
(1, 102, '2019-08-04', 500),
(2, 100, '2019-08-03', 34);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `idproduit` bigint(20) NOT NULL,
  `libele` varchar(255) DEFAULT NULL,
  `prixunitaire` double DEFAULT NULL,
  `stock` bigint(20) DEFAULT NULL,
  `idCategorie` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idproduit`, `libele`, `prixunitaire`, `stock`, `idCategorie`) VALUES
(100, 'acide acétylsalicylique', 1200, 23, 5),
(101, 'ibuprofène', 1000, 4, 5),
(102, 'codéine', 800, 10, 6),
(103, 'morphine', 500, 9, 6),
(104, 'allopurinol', 600, 3, 7),
(105, 'chlorphénamine', 400, 4, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`idFournisseur`);

--
-- Indexes for table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`idFournisseur`,`idproduit`,`date`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idproduit`),
  ADD KEY `FK_CATEGORIE` (`idCategorie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `idFournisseur` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_CATEGORIE` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);
