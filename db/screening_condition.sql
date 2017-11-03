-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 02, 2017 at 09:48 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `screening_condition`
--

-- --------------------------------------------------------

--
-- Table structure for table `index_screen`
--

CREATE TABLE `index_screen` (
  `tube` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buffer` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precipitant` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `index_screen`
--

INSERT INTO `index_screen` (`tube`, `position`, `salt`, `buffer`, `precipitant`) VALUES
('1', 'a1', '', '0.1 M Citric acid pH 3.5', '2.0 M Ammonium sulfate'),
('10', 'a10', '', '0.1 M BIS-TRIS pH 6.5', '3.0 M Sodium chloride'),
('11', 'a11', '', '0.1 M HEPES pH 7.5', '3.0 M Sodium chloride'),
('12', 'a12', '', '0.1 M Tris pH 8.5', '3.0 M Sodium chloride'),
('13', 'b1', '', '0.1 M BIS-TRIS pH 5.5', '0.3 M Magnesium formate dihydrate'),
('14', 'b2', '', '0.1 M BIS-TRIS pH 6.5', '0.5 M Magnesium formate dihydrate'),
('15', 'b3', '', '0.1 M HEPES pH 7.5', '0.5 M Magnesium formate dihydrate'),
('16', 'b4', '', '0.1 M Tris pH 8.5', '0.3 M Magnesium formate dihydrate'),
('17', 'b5', '', 'None - pH 5.6', '1.26 M Sodium phosphate monobasic monohydrate, 0.14 M Potassium phosphate dibasic\n'),
('18', 'b6', '', 'None - pH 6.9', '0.49 M Sodium phosphate monobasic monohydrate, 0.91 M Potassium phosphate dibasic'),
('19', 'b7', '', 'None - pH 8.2', '0.056 M Sodium phosphate monobasic monohydrate, 1.344 M Potassium phosphate dibasic\n'),
('2', 'a2', '', '0.1 M Sodium acetate trihydrate pH 4.5', '2.0 M Ammonium sulfate'),
('20', 'b8', '', '0.1 M HEPES pH 7.5', '1.4 M Sodium citrate tribasic dihydrate'),
('21', 'b9', '', 'None', '1.8 M Ammonium citrate tribasic pH 7.0'),
('22', 'b10', '', 'None', '0.8 M Succinic acid pH 7.0'),
('23', 'b11', '', 'None', '2.1 M DL-Malic acid pH 7.0'),
('24', 'b12', '', 'None', '2.8 M Sodium acetate trihydrate pH 7.0'),
('25', 'c1', '', 'None', '3.5 M Sodium formate pH 7.0'),
('26', 'c2', '', 'None', '1.1 M Ammonium tartrate dibasic pH 7.0'),
('27', 'c3', '', 'None', '2.4 M Sodium malonate pH 7.0'),
('28', 'c4', '', 'None', '35% v/v Tacsimate TM pH 7.0'),
('29', 'c5', '', 'None', '60% v/v Tacsimate TM pH 7.0'),
('3', 'a3', '', '0.1 M BIS-TRIS pH 5.5', '2.0 M Ammonium sulfate'),
('30', 'c6', '0.1 M Sodium chloride', '0.1 M BIS-TRIS pH 6.5', '1.5 M Ammonium sulfate'),
('31', 'c7', '0.8 M Potassium sodium tartrate tetrahydrate', '0.1 M Tris pH 8.5', '0.5% w/v Polyethylene glycol monomethyl ether 5,000'),
('32', 'c8', '1.0 M Ammonium sulfate', '0.1 M BIS-TRIS pH 5.5', '1% w/v Polyethylene glycol 3,350'),
('33', 'c9', '1.1 M Sodium malonate pH 7.0', '0.1 M HEPES pH 7.0', '0.5% v/v Jeffamine ? ED-2001 pH 7.0'),
('34', 'c10', '1.0 M Succinic acid pH 7.0', '0.1 M HEPES pH 7.0', '1% w/v Polyethylene glycol monomethyl ether 2,000'),
('35', 'c11', '1.0 M Ammonium sulfate', '0.1 M HEPES pH 7.0', '0.5% w/v Polyethylene glycol 8,000'),
('36', 'c12', '15% v/v Tacsimate TM pH 7.0', '0.1 M HEPES pH 7.0', '2% w/v Polyethylene glycol 3,350'),
('37', 'd1', '', 'None', '25% w/v Polyethylene glycol 1,500'),
('38', 'd2', '', '0.1 M HEPES pH 7.0', '30% v/v Jeffamine ? M-600 ? pH 7.0'),
('39', 'd3', '', '0.1 M HEPES pH 7.0', '30% v/v Jeffamine ? ED-2001 pH 7.0'),
('4', 'a4', '', '0.1 M BIS-TRIS pH 6.5', '2.0 M Ammonium sulfate'),
('40', 'd4', '', '0.1 M Citric acid pH 3.5', '25% w/v Polyethylene glycol 3,350'),
('41', 'd5', '', '0.1 M Sodium acetate trihydrate pH 4.5', '25% w/v Polyethylene glycol 3,350'),
('42', 'd6', '', '0.1 M BIS-TRIS pH 5.5', '25% w/v Polyethylene glycol 3,350'),
('43', 'd7', '', '0.1 M BIS-TRIS pH 6.5', '25% w/v Polyethylene glycol 3,350'),
('44', 'd8', '', '0.1 M HEPES pH 7.5', '25% w/v Polyethylene glycol 3,350'),
('45', 'd9', '', '0.1 M Tris pH 8.5', '25% w/v Polyethylene glycol 3,350'),
('46', 'd10', '', '0.1 M BIS-TRIS pH 6.5', '20% w/v Polyethylene glycol monomethyl ether 5,000'),
('47', 'd11', '', '0.1 M BIS-TRIS pH 6.5', '28% w/v Polyethylene glycol monomethyl ether 2,000'),
('48', 'd12', '0.2 M Calcium chloride dihydrate', '0.1 M BIS-TRIS pH 5.5', '45% v/v (+/-)-2-Methyl-2,4-pentanediol'),
('49', 'e1', '0.2 M Calcium chloride dihydrate', '0.1 M BIS-TRIS pH 6.5', '45% v/v (+/-)-2-Methyl-2,4-pentanediol'),
('5', 'a5', '', '0.1 M HEPES pH 7.5', '2.0 M Ammonium sulfate'),
('50', 'e2', '0.2 M Ammonium acetate', '0.1 M BIS-TRIS pH 5.5', '45% v/v (+/-)-2-Methyl-2,4-pentanediol'),
('51', 'e3', '0.2 M Ammonium acetate', '0.1 M BIS-TRIS pH 6.5', '45% v/v (+/-)-2-Methyl-2,4-pentanediol'),
('52', 'e4', '0.2 M Ammonium acetate', '0.1 M HEPES pH 7.5', '45% v/v (+/-)-2-Methyl-2,4-pentanediol'),
('53', 'e5', '0.2 M Ammonium acetate', '0.1 M Tris pH 8.5', '45% v/v (+/-)-2-Methyl-2,4-pentanediol'),
('54', 'e6', '0.05 M Calcium chloride dihydrate', '0.1 M BIS-TRIS pH 6.5', '30% v/v Polyethylene glycol monomethyl ether 550'),
('55', 'e7', '0.05 M Magnesium chloride hexahydrate', '0.1 M HEPES pH 7.5', '30% v/v Polyethylene glycol monomethyl ether 550'),
('56', 'e8', '0.2 M Potassium chloride', '0.05 M HEPES pH 7.5', '35% v/v Pentaerythritol propoxylate (5/4 PO/OH)'),
('57', 'e9', '0.05 M Ammonium sulfate', '0.05 M BIS-TRIS pH 6.5', '30% v/v Pentaerythritol ethoxylate (15/4 EO/OH)'),
('58', 'e10', '', '0.1 M BIS-TRIS pH 6.5', '45% v/v Polypropylene glycol P 400'),
('59', 'e11', '0.02 M Magnesium chloride hexahydrate', '0.1 M HEPES pH 7.5', '22% w/v Poly(acrylic acid sodium salt) 5,100'),
('6', 'a6', '', '0.1 M Tris pH 8.5', '2.0 M Ammonium sulfate'),
('60', 'e12', '0.01 M Cobalt(II) chloride hexahydrate', '0.1 M Tris pH 8.5', '20% w/v Polyvinylpyrrolidone K 15'),
('61', 'f1', '0.2 M L-Proline', '0.1 M HEPES pH 7.5', '10% w/v Polyethylene glycol 3,350'),
('62', 'f2', '0.2 M Trimethylamine N-oxide dihydrate', '0.1 M Tris pH 8.5', '20% w/v Polyethylene glycol monomethyl ether 2,000'),
('63', 'f3', '5% v/v Tacsimate TM pH 7.0', '0.1 M HEPES pH 7.0', '10% w/v Polyethylene glycol monomethyl ether 5,000'),
('64', 'f4', '0.005 M Cobalt(II) chloride hexahydrate, 0.005 M Nickel(II) chloride hexahydrate, 0.005 M Cadmium chloride hydrate, 0.005 M Magnesium chloride hexahydrate\n\n\n ', '0.1 M HEPES pH 7.5', '12% w/v Polyethylene glycol 3,350'),
('65', 'f5', '0.1 M Ammonium acetate', '0.1 M BIS-TRIS pH 5.5', '17% w/v Polyethylene glycol 10,000'),
('66', 'f6', '0.2 M Ammonium sulfate', '0.1 M BIS-TRIS pH 5.5', '25% w/v Polyethylene glycol 3,350'),
('67', 'f7', '0.2 M Ammonium sulfate', '0.1 M BIS-TRIS pH 6.5', '25% w/v Polyethylene glycol 3,350'),
('68', 'f8', '0.2 M Ammonium sulfate', '0.1 M HEPES pH 7.5', '25% w/v Polyethylene glycol 3,350'),
('69', 'f9', '0.2 M Ammonium sulfate', '0.1 M Tris pH 8.5', '25% w/v Polyethylene glycol 3,350'),
('7', 'a7', '', '0.1 M Citric acid pH 3.5', '3.0 M Sodium chloride'),
('70', 'f10', '0.2 M Sodium chloride', '0.1 M BIS-TRIS pH 5.5', '25% w/v Polyethylene glycol 3,350'),
('71', 'f11', '0.2 M Sodium chloride', '0.1 M BIS-TRIS pH 6.5', '25% w/v Polyethylene glycol 3,350'),
('72', 'f12', '0.2 M Sodium chloride', '0.1 M HEPES pH 7.5', '25% w/v Polyethylene glycol 3,350'),
('73', 'g1', '0.2 M Sodium chloride', '0.1 M Tris pH 8.5', '25% w/v Polyethylene glycol 3,350'),
('74', 'g2', '0.2 M Lithium sulfate monohydrate', '0.1 M BIS-TRIS pH 5.5', '25% w/v Polyethylene glycol 3,350'),
('75', 'g3', '0.2 M Lithium sulfate monohydrate', '0.1 M BIS-TRIS pH 6.5', '25% w/v Polyethylene glycol 3,350'),
('76', 'g4', '0.2 M Lithium sulfate monohydrate', '0.1 M HEPES pH 7.5', '25% w/v Polyethylene glycol 3,350'),
('77', 'g5', '0.2 M Lithium sulfate monohydrate', '0.1 M Tris pH 8.5', '25% w/v Polyethylene glycol 3,350'),
('78', 'g6', '0.2 M Ammonium acetate', '0.1 M BIS-TRIS pH 5.5', '25% w/v Polyethylene glycol 3,350'),
('79', 'g7', '0.2 M Ammonium acetate', '0.1 M BIS-TRIS pH 6.5', '25% w/v Polyethylene glycol 3,350'),
('8', 'a8', '', '0.1 M Sodium acetate trihydrate pH 4.5', '3.0 M Sodium chloride'),
('80', 'g8', '0.2 M Ammonium acetate', '0.1 M HEPES pH 7.5', '25% w/v Polyethylene glycol 3,350'),
('81', 'g9', '0.2 M Ammonium acetate', '0.1 M Tris pH 8.5', '25% w/v Polyethylene glycol 3,350'),
('82', 'g10', '0.2 M Magnesium chloride hexahydrate', '0.1 M BIS-TRIS pH 5.5', '25% w/v Polyethylene glycol 3,350'),
('83', 'g11', '0.2 M Magnesium chloride hexahydrate', '0.1 M BIS-TRIS pH 6.5', '25% w/v Polyethylene glycol 3,350'),
('84', 'g12', '0.2 M Magnesium chloride hexahydrate', '0.1 M HEPES pH 7.5', '25% w/v Polyethylene glycol 3,350'),
('85', 'h1', '0.2 M Magnesium chloride hexahydrate', '0.1 M Tris pH 8.5', '25% w/v Polyethylene glycol 3,350'),
('86', 'h2', '0.2 M Potassium sodium tartrate tetrahydrate', 'None', '20% w/v Polyethylene glycol 3,350'),
('87', 'h3', '0.2 M Sodium malonate pH 7.0', 'None', '20% w/v Polyethylene glycol 3,350'),
('88', 'h4', '0.2 M Ammonium citrate tribasic pH 7.0', 'None', '20% w/v Polyethylene glycol 3,350'),
('89', 'h5', '0.1 M Succinic acid pH 7.0', 'None', '15% w/v Polyethylene glycol 3,350'),
('9', 'a9', '', '0.1 M BIS-TRIS pH 5.5', '3.0 M Sodium chloride'),
('90', 'h6', '0.2 M Sodium formate', 'None', '20% w/v Polyethylene glycol 3,350'),
('91', 'h7', '0.15 M DL-Malic acid pH 7.0', 'None', '20% w/v Polyethylene glycol 3,350'),
('92', 'h8', '0.1 M Magnesium formate dihydrate', 'None', '15% w/v Polyethylene glycol 3,350'),
('93', 'h9', '0.05 M Zinc acetate dihydrate', 'None', '20% w/v Polyethylene glycol 3,350'),
('94', 'h10', '0.2 M Sodium citrate tribasic dihydrate', 'None', '20% w/v Polyethylene glycol 3,350'),
('95', 'h11', '0.1 M Potassium thiocyanate', 'None', '30% w/v Polyethylene glycol monomethyl ether 2,000'),
('96', 'h12', '0.15 M Potassium bromide', 'None', '30% w/v Polyethylene glycol monomethyl ether 2,000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `index_screen`
--
ALTER TABLE `index_screen`
  ADD PRIMARY KEY (`tube`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
