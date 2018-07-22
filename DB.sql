-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 21, 2018 at 11:59 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flex`
--
CREATE DATABASE IF NOT EXISTS `flex` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `flex`;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `Car_Id` int(100) UNSIGNED NOT NULL,
  `Car` varchar(22) NOT NULL,
  `Car_Color` varchar(22) NOT NULL,
  `Year_of_manufacture` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Car_Id`, `Car`, `Car_Color`, `Year_of_manufacture`) VALUES
(1, 'ford focus', 'blue', '1993'),
(2, 'fiat', 'red', '1993'),
(3, 'golf', 'black', '1998'),
(4, 'fiat', 'red', '1998'),
(5, 'nissan', 'white', '1999'),
(6, 'fiat', 'red', '1999'),
(7, 'bmw', 'white', '1999'),
(8, 'nissan', 'white', '2000'),
(9, 'fiat', 'red', '2000'),
(10, 'bmw', 'white', '2000'),
(11, 'golf', 'black', '2003'),
(12, 'bmw', 'white', '2003'),
(13, 'golf', 'black', '2008'),
(14, 'ford focus', 'blue', '2008'),
(15, 'fiat', 'blue', '2008'),
(16, 'nissan', 'white', '2018'),
(17, 'fiat', 'blue', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `Rent_Id` int(100) UNSIGNED NOT NULL,
  `Rent_Name` varchar(22) NOT NULL,
  `Rent_Age` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`Rent_Id`, `Rent_Name`, `Rent_Age`) VALUES
(1, 'igor', '20'),
(2, 'irena', '37'),
(3, 'irena', '33'),
(4, 'mor', '27'),
(5, 'moran', '18'),
(6, 'roi', '51'),
(7, 'shalom', '43'),
(8, 'shir', '26'),
(9, 'yotam', '43');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `Car_Id` int(100) UNSIGNED DEFAULT NULL,
  `Rent_Id` int(100) UNSIGNED DEFAULT NULL,
  `Travel_Date` date NOT NULL,
  `Travel_From` varchar(22) NOT NULL,
  `Travel_To` varchar(22) NOT NULL,
  `Travel_Total` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`Car_Id`, `Rent_Id`, `Travel_Date`, `Travel_From`, `Travel_To`, `Travel_Total`) VALUES
(1, 9, '2018-01-15', 'ramat yishai', 'migdal haemek', '10'),
(1, 9, '2018-03-08', 'ramat yishai', 'migdal haemek', '12'),
(2, 8, '2017-12-12', 'raanana', 'herzlia', '18'),
(2, 7, '2018-03-11', 'tel aviv', 'haifa', '102'),
(3, 6, '2018-05-22', 'beer sheva', 'tel aviv', '121'),
(3, 6, '2017-06-27', 'beer sheva', 'tel aviv', '121'),
(4, 8, '2017-09-28', 'raanana', 'herzlia', '18'),
(4, 8, '2017-07-07', 'raanana', 'herzlia', '18'),
(5, 5, '2018-04-01', 'tel aviv', 'tel aviv', '28'),
(6, 1, '2018-01-22', 'tel aviv', 'haifa', '100'),
(6, 7, '2018-03-26', 'tel aviv', 'haifa', '102'),
(7, 1, '2017-10-01', 'haifa', 'haifa', '22'),
(8, 5, '2018-04-03', 'tel aviv', 'tel aviv', '28'),
(8, 5, '2017-05-07', 'tel aviv', 'tel aviv', '26'),
(9, 8, '2018-01-01', 'raanana', 'herzlia', '18'),
(9, 8, '2018-04-13', 'raanana', 'herzlia', '18'),
(10, 1, '2018-01-12', 'haifa', 'haifa', '22'),
(11, 6, '2017-10-12', 'beer sheva', 'tel aviv', '121'),
(11, 6, '2017-08-16', 'beer sheva', 'tel aviv', '121'),
(12, 1, '2018-05-22', 'beer sheva', 'tel aviv', '121'),
(12, 1, '2017-07-01', 'haifa', 'haifa', '22'),
(13, 6, '2018-02-27', 'beer sheva', 'tel aviv', '121'),
(14, 9, '2018-02-12', 'ramat yishai', 'migdal haemek', '12'),
(15, 2, '2018-03-02', 'jerusalem', 'tel aviv', '115'),
(15, 3, '2017-08-26', 'jerusalem', 'tel aviv', '56'),
(16, 5, '2018-04-14', 'tel aviv', 'tel aviv', '48'),
(16, 4, '2017-04-15', 'tel aviv', 'tel aviv', '26'),
(17, 2, '2017-11-11', 'jerusalem', 'tel aviv', '115'),
(17, 3, '2018-05-31', 'jerusalem', 'tel aviv', '56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Car_Id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`Rent_Id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD KEY `Car_Id` (`Car_Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `travel`
--
ALTER TABLE `travel`
  ADD CONSTRAINT `Car_Id` FOREIGN KEY (`Car_Id`) REFERENCES `car` (`Car_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
