-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 20, 2023 at 04:35 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `NumberOfSeats` int(11) NOT NULL,
  `Timestamp` datetime NOT NULL,
  `Status` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ShowID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `CinemaID` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `TotalCinemaHalls` int(11) NOT NULL,
  `CityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`CinemaID`, `Name`, `TotalCinemaHalls`, `CityID`) VALUES
(1, 'Cinema A', 3, 1),
(2, 'Cinema B', 2, 4),
(3, 'Cinema C', 1, 7),
(4, 'Cinema D', 3, 2),
(5, 'Cinema E', 1, 8),
(6, 'Cinema F', 2, 5),
(7, 'Cinema G', 3, 10),
(8, 'Cinema H', 1, 9),
(9, 'Cinema I', 2, 3),
(10, 'Cinema J', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cinema_hall`
--

CREATE TABLE `cinema_hall` (
  `CinemaHallID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `TotalSeats` int(11) NOT NULL,
  `CinemaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cinema_hall`
--

INSERT INTO `cinema_hall` (`CinemaHallID`, `Name`, `TotalSeats`, `CinemaID`) VALUES
(1, 'Hall A', 140, 1),
(2, 'Hall B', 140, 1),
(3, 'Hall C', 140, 1),
(4, 'Hall X', 140, 2),
(5, 'Hall Y', 140, 2),
(6, 'Hall Z', 140, 3),
(7, 'Hall P', 140, 4),
(8, 'Hall Q', 140, 4),
(9, 'Hall R', 140, 5),
(10, 'Hall M', 140, 6),
(11, 'Hall N', 140, 7),
(12, 'Hall O', 140, 8),
(13, 'Hall S', 140, 9),
(14, 'Hall T', 140, 10),
(15, 'Hall U', 140, 10),
(16, 'Hall V', 140, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cinema_seat`
--

CREATE TABLE `cinema_seat` (
  `CinemaSeatID` int(11) NOT NULL,
  `SeatNumber` int(11) NOT NULL,
  `Type` int(11) NOT NULL,
  `CinemaHall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityID` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Province` varchar(64) NOT NULL,
  `ZipCode` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityID`, `Name`, `Province`, `ZipCode`) VALUES
(1, 'Bangkok', 'Bangkok', '10100'),
(2, 'Chiang Mai', 'Chiang Mai', '50000'),
(3, 'Phuket', 'Phuket', '83000'),
(4, 'Pattaya', 'Chon Buri', '20150'),
(5, 'Krabi', 'Krabi', '81000'),
(6, 'Hua Hin', 'Prachuap Khiri Khan', '77110'),
(7, 'Ayutthaya', 'Phra Nakhon Si Ayutthaya', '13000'),
(8, 'Koh Samui', 'Surat Thani', '84320'),
(9, 'Pai', 'Mae Hong Son', '58130'),
(10, 'Nakhon Ratchasima', 'Nakhon Ratchasima', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `MovieID` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Description` varchar(512) NOT NULL,
  `Language` varchar(64) NOT NULL,
  `ReleaseDate` datetime NOT NULL,
  `Country` varchar(64) NOT NULL,
  `Genre` varchar(20) NOT NULL,
  `Img_url` varchar(255) DEFAULT NULL,
  `Duration` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`MovieID`, `Title`, `Description`, `Language`, `ReleaseDate`, `Country`, `Genre`, `Img_url`, `Duration`) VALUES
(0, 'The Lord of the Rings: The Fellowship of the Ring', 'One ring to rule them all', 'English', '2001-12-19 00:00:00', 'New Zealand', 'Adventure', NULL, 178),
(1, 'Inception', 'A mind-bending heist thriller', 'English', '2010-07-08 00:00:00', 'United States', 'Sci-Fi', NULL, 148),
(2, 'The Shawshank Redemption', 'A story of hope and redemption', 'English', '1994-09-23 00:00:00', 'United States', 'Drama', NULL, 142),
(3, 'Pulp Fiction', 'Quentin Tarantino\'s iconic film', 'English', '1994-10-14 00:00:00', 'United States', 'Crime', NULL, 154),
(4, 'The Dark Knight', 'The rise of the Batman', 'English', '2008-07-18 00:00:00', 'United States', 'Action', NULL, 152),
(5, 'Schindler\'s List', 'The story of a man who saved lives', 'English', '1993-12-15 00:00:00', 'United States', 'Biography', NULL, 195),
(6, 'Forrest Gump', 'Life is like a box of chocolates', 'English', '1994-07-06 00:00:00', 'United States', 'Drama', NULL, 142),
(7, 'The Matrix', 'Welcome to the real world', 'English', '1999-03-31 00:00:00', 'United States', 'Action', NULL, 136),
(8, 'Fight Club', 'The first rule of Fight Club is...', 'English', '1999-10-15 00:00:00', 'United States', 'Drama', NULL, 139),
(9, 'The Godfather', 'An offer you can\'t refuse', 'English', '1972-03-24 00:00:00', 'United States', 'Crime', NULL, 175);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Timestamp` datetime NOT NULL,
  `DiscountCouponID` int(11) NOT NULL,
  `RemoteTransactionID` int(11) NOT NULL,
  `PaymentMethod` int(11) NOT NULL,
  `BookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `ShowID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `CinemaHallID` int(11) NOT NULL,
  `MovieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`ShowID`, `Date`, `StartTime`, `EndTime`, `CinemaHallID`, `MovieID`) VALUES
(1, '2023-12-01', '09:00:00', '11:58:00', 1, 0),
(2, '2023-12-01', '12:00:00', '14:28:00', 2, 1),
(3, '2023-12-02', '14:30:00', '17:32:00', 3, 2),
(4, '2023-12-02', '18:00:00', '20:34:00', 4, 3),
(5, '2023-12-03', '08:45:00', '11:16:00', 5, 4),
(6, '2023-12-03', '12:30:00', '15:45:00', 6, 5),
(7, '2023-12-04', '16:00:00', '18:22:00', 7, 6),
(8, '2023-12-04', '19:30:00', '21:46:00', 8, 7),
(9, '2023-12-05', '11:15:00', '13:31:00', 9, 8),
(10, '2023-12-05', '14:00:00', '16:19:00', 10, 9),
(11, '2023-12-06', '17:45:00', '20:40:00', 11, 0),
(12, '2023-12-06', '21:00:00', '23:35:00', 12, 1),
(13, '2023-12-07', '13:20:00', '16:17:00', 13, 2),
(14, '2023-12-07', '17:45:00', '20:01:00', 14, 3),
(15, '2023-12-08', '10:30:00', '13:11:00', 15, 4),
(16, '2023-12-08', '14:45:00', '17:00:00', 1, 5),
(17, '2023-12-09', '15:30:00', '17:52:00', 2, 6),
(18, '2023-12-09', '18:15:00', '21:30:00', 3, 7),
(19, '2023-12-10', '12:00:00', '14:19:00', 4, 8),
(20, '2023-12-10', '15:00:00', '17:55:00', 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `screening_seat`
--

CREATE TABLE `screening_seat` (
  `ShowSeatID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `CinemaSeatID` int(11) NOT NULL,
  `ShowID` int(11) NOT NULL,
  `BookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Phone` varchar(16) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD UNIQUE KEY `UserID` (`UserID`,`ShowID`),
  ADD KEY `UserID_2` (`UserID`,`ShowID`),
  ADD KEY `ShowID` (`ShowID`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`CinemaID`),
  ADD UNIQUE KEY `CityID` (`CityID`);

--
-- Indexes for table `cinema_hall`
--
ALTER TABLE `cinema_hall`
  ADD PRIMARY KEY (`CinemaHallID`),
  ADD KEY `CinemaID` (`CinemaID`);

--
-- Indexes for table `cinema_seat`
--
ALTER TABLE `cinema_seat`
  ADD PRIMARY KEY (`CinemaSeatID`),
  ADD KEY `CinemaHall` (`CinemaHall`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityID`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`MovieID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `BookingID` (`BookingID`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`ShowID`),
  ADD UNIQUE KEY `CinemaHallID` (`CinemaHallID`,`MovieID`),
  ADD KEY `CinemaHallID_2` (`CinemaHallID`,`MovieID`),
  ADD KEY `MovieID` (`MovieID`);

--
-- Indexes for table `screening_seat`
--
ALTER TABLE `screening_seat`
  ADD PRIMARY KEY (`ShowSeatID`),
  ADD KEY `CinemaSeatID` (`CinemaSeatID`,`ShowID`,`BookingID`),
  ADD KEY `ShowID` (`ShowID`),
  ADD KEY `BookingID` (`BookingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `CinemaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cinema_hall`
--
ALTER TABLE `cinema_hall`
  MODIFY `CinemaHallID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cinema_seat`
--
ALTER TABLE `cinema_seat`
  MODIFY `CinemaSeatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `MovieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `ShowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `screening_seat`
--
ALTER TABLE `screening_seat`
  MODIFY `ShowSeatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ShowID`) REFERENCES `screening` (`ShowID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `cinema`
--
ALTER TABLE `cinema`
  ADD CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`);

--
-- Constraints for table `cinema_hall`
--
ALTER TABLE `cinema_hall`
  ADD CONSTRAINT `cinema_hall_ibfk_1` FOREIGN KEY (`CinemaID`) REFERENCES `cinema` (`CinemaID`);

--
-- Constraints for table `cinema_seat`
--
ALTER TABLE `cinema_seat`
  ADD CONSTRAINT `cinema_seat_ibfk_1` FOREIGN KEY (`CinemaHall`) REFERENCES `cinema_hall` (`CinemaHallID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`);

--
-- Constraints for table `screening`
--
ALTER TABLE `screening`
  ADD CONSTRAINT `screening_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movie` (`MovieID`),
  ADD CONSTRAINT `screening_ibfk_2` FOREIGN KEY (`CinemaHallID`) REFERENCES `cinema_hall` (`CinemaHallID`);

--
-- Constraints for table `screening_seat`
--
ALTER TABLE `screening_seat`
  ADD CONSTRAINT `screening_seat_ibfk_1` FOREIGN KEY (`ShowID`) REFERENCES `screening` (`ShowID`),
  ADD CONSTRAINT `screening_seat_ibfk_2` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`),
  ADD CONSTRAINT `screening_seat_ibfk_3` FOREIGN KEY (`CinemaSeatID`) REFERENCES `cinema_seat` (`CinemaSeatID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
