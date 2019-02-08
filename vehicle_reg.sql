-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 08:08 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vehicle_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPhone` bigint(50) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userPhone` (`userPhone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`userId`, `userName`, `userEmail`, `userPhone`, `userPass`) VALUES
(1, 'oranu kingsley', 'kingsleykrowned@gmail.com', 2348161613797, '99e317d5bf77be8a76ee97e02bb29021bd7472759db0fd1c88d1cc774bb11e0c');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `contact_Address` varchar(200) NOT NULL,
  `userPhone` bigint(20) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `dlicenceReg` varchar(50) NOT NULL,
  `vehicle_Name` varchar(50) NOT NULL,
  `vehicle_Model` varchar(50) NOT NULL,
  `vehicle_regNumber` varchar(50) NOT NULL,
  `vehicle_Engine` varchar(50) NOT NULL,
  `vehiclePlate` varchar(20) NOT NULL,
  `verificationNumber` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `contact_Address`, `userPhone`, `occupation`, `dlicenceReg`, `vehicle_Name`, `vehicle_Model`, `vehicle_regNumber`, `vehicle_Engine`, `vehiclePlate`, `verificationNumber`) VALUES
(1, 'SEXRDCTFVGBHJ', 'xrdctfvgyhubjn@dcfvg.com', 'xrdcfvghnj', 1234567890, 'sxdtfcgvhb', 'ctmhybunjk', 'fcgvhbjnk', 'fgvhjbnkl', 'esxrdctfvgunhji', 'rdcftvghubnj', 'o8i765dredfg', 'esxrdctfvgunhjio8i765dredfg'),
(2, 'dcftgvhuji', 'gololo2017@gmail.com', 'rdctfvhybgunj', 0, 'dctfvygbhunji', 'dctfvygbhunj', 'fvghbjnk', 'fvghbjunkl', 'fvgbhnjk', 'gfvhbjnkm', 'cfvghbnjkm', 'fvgbhnjkcfvghbnjkm'),
(3, 'tcfvhybgunji', 'dcfmgvhnj@gmail.com', 'xrdctfvgybh', 0, 'g hbjnmk', 'ydctufmygvkbuhli', 'yjghbjnkmuky', 'gv blyhugvk,jhnk', 'lbhj, nluykgvhj', 'ubhyljkmguyhoi', 'ogyuhlnjku', 'lbhj, nluykgvhjogyuhlnjku'),
(4, 'rdcymbgunh', 'rdctfvgkunhj@gmail.com', 'sxrdctfvgybhun', 0, 'klnhuijmk', 'vfgybunhjmok,', 'vgybunhjimko', 'gbnhjimko,l', 'tfvgnuhjmk', 'tfvnhumk,', 'gybunhjmkl', 'tfvgnuhjmkgybunhjmkl'),
(5, 'etfvrhyu', 'dgtfvnkhb@cfvgbhnj.com', 'rxdctfvgybunhj', 0, 'yrdctfvhunji', 'ukhylnjmotrhdb ,', 'jnkvjgfjfhbjk', 'kgjfghb njm,', 'lubhmluiygtvhjb', 'uiykhvguiyhvg', 'bluyhvghbnm', 'lubhmluiygtvhjbbluyhvghbnm'),
(6, 'oranu kingsley', 'rdchygtfvnuj@sxer.com', 'wserdcfvtg', 2348012345678, 'dcfvgth', 'xsdcrfvgbhj', 'sdfvgbhnj', 'cdfvgbnhj', 'cfvgbnhj', 'dcfvgbnhj', 'cfvgbnhj', 'cfvgbnhjcfvgbnhj'),
(7, 'dgtfvhnj', 'hdcfvgbnhjm@dcfv.com', 'dcfvgbhnj', 0, 'cfvgbnhj', 'fvgbhnjmk', 'fcvgbhnj', 'fvgbhnjmk', 'fvgbhnjmk', 'fvgbhnjm', 'fcvgbhnjmk', 'fvgbhnjmkfcvgbhnjmk'),
(8, 'sexrdctfvygbhunj', 'futminna@gmail.com', 'srdcfvgyhuj', 3546789087, 'rctfvhuybni', 'ctfygvbhunjimk', 'fvghbnjmk', 'fgvhjnmkl', 'NG358MN', 'xrdctfvygbhunjik', 'AAA121NG', 'NG358MNAAA121NG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
