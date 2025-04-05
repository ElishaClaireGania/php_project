-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2025 at 03:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Name`, `Email`, `Password`, `Created_At`, `Updated_At`) VALUES
(2, 'Chloe Spencer', 'chlospency@gmail.com', '$2y$10$OHQgHl8Qtv2H5u/fdJeKK.3lVpZ4x5T2yS3NRSr.gPHY5.zjabD96', '2025-03-28 05:22:46', '2025-04-05 13:52:12'),
(6, 'Jade Queen', 'jadequeen386@gmail.com', '17d3e80bafe890a279d7334941988b1d', '2025-04-04 19:04:59', '2025-04-04 19:04:59'),
(8, 'Elisha Claire', 'elishaclairegania@gmail.com', '17d3e80bafe890a279d7334941988b1d', '2025-04-05 13:57:47', '2025-04-05 13:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_ID` int(11) NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Genre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Price` int(11) NOT NULL DEFAULT 0,
  `Quantity` int(11) NOT NULL,
  `PDFURL` varchar(255) NOT NULL,
  `ImageURL` varchar(255) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_ID`, `Title`, `Author`, `Genre`, `Price`, `Quantity`, `PDFURL`, `ImageURL`, `Description`) VALUES
(11, 'Quicksand', 'Nerell', 'Education', 300, 3, 'uploads/book_67e7c151958c31.88546888.pdf', '../book_covers/book_67e7c151957e87.76276324.png', 'Women are empowered by the confidence that comes from the Lord Jesus Christ'),
(12, 'Network Security', 'Stephen Bond', 'Programming', 400, 3, 'uploads/book_67e7cc5dae5bc0.02851955.pdf', '../book_covers/book_67e7cc5dae5991.45201878.png', 'Network security is important to prevent any personal information from getting leaked.');

-- --------------------------------------------------------

--
-- Table structure for table `borrowedbooks`
--

CREATE TABLE `borrowedbooks` (
  `Borrow_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Book_ID` int(11) NOT NULL,
  `BorrowedDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `Fine` int(11) NOT NULL,
  `Status` enum('Returned','Not Returned') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `MessageDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`ID`, `Name`, `Email`, `Message`, `MessageDate`) VALUES
(32, 'Elisha Claire', 'elishaclairegania@gmail.com', 'Hello! This is the BEST e-library ever!!! Hands down to you devs!', '2025-04-04 19:43:57'),
(33, 'Elisha Claire', 'elishaclairegania@gmail.com', 'Hello! This is the BEST e-library ever!!! Hands down to you devs!', '2025-04-04 19:44:06'),
(34, 'Elisha Claire', 'chlospency@gmail.com', 'Me again!!!', '2025-04-04 19:44:29'),
(35, 'Eliza Robin', 'elizarobinson1905@gmail.com', 'Are there new bookss??', '2025-04-04 19:45:12'),
(36, 'Chloe Spencer', 'chlospency@gmail.com', 'Is there a discount for students? or like long time members?', '2025-04-04 19:46:33'),
(37, 'Chloe Spencer', 'chlospency@gmail.com', 'Is there a discount for students? or like long time members?', '2025-04-04 19:48:32'),
(38, 'Chloe Spencer', 'chlospency@gmail.com', 'Is there a discount for students? or like long time members?', '2025-04-04 19:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `sub_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`sub_id`, `name`, `email`, `subscribed_at`) VALUES
(9, 'Chloe Spencer', 'chlospency@gmail.com', '2025-04-04 17:16:03'),
(10, 'Elisha Claire', 'elishaclairegania@gmail.com', '2025-04-04 17:20:26'),
(11, 'Jade Queen', 'jadequeen386@gmail.com', '2025-04-04 17:20:55'),
(12, 'Eliza Robin', 'elizarobinson1905@gmail.com', '2025-04-04 17:22:12'),
(13, 'Elizabeth Williams', 'eagania@student.hau.edu.ph', '2025-04-04 17:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedbooks`
--

CREATE TABLE `purchasedbooks` (
  `Purchased_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Book_ID` int(11) NOT NULL,
  `PurchasedDate` date NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` enum('Student','Employee') NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Name`, `Email`, `Password`, `Type`, `Created_At`) VALUES
(5, 'Elisha Claire', 'elishaclairegania@gmail.com', '$2y$10$6i1ZZcxLLefMp712rIjZH.eqL85.6fvjrZFtFPbK.TFJ58KVbvdSK', 'Student', '2025-03-27 22:30:55'),
(6, 'Jade Queen', 'jadequeen386@gmail.com', '$2y$10$iBwuXux.7PLOJQXjOuU2Vu1tgL8Kl5sUhlW1aCqvcbaogfIk0NTJG', 'Student', '2025-03-28 11:32:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  ADD PRIMARY KEY (`Borrow_ID`),
  ADD KEY `borrowedbooks_ibfk_1` (`Book_ID`),
  ADD KEY `borrowedbooks_ibfk_2` (`User_ID`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `purchasedbooks`
--
ALTER TABLE `purchasedbooks`
  ADD PRIMARY KEY (`Purchased_ID`),
  ADD KEY `purchasedbooks_ibfk_1` (`User_ID`),
  ADD KEY `purchasedbooks_ibfk_2` (`Book_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  MODIFY `Borrow_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchasedbooks`
--
ALTER TABLE `purchasedbooks`
  MODIFY `Purchased_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  ADD CONSTRAINT `borrowedbooks_ibfk_1` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowedbooks_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchasedbooks`
--
ALTER TABLE `purchasedbooks`
  ADD CONSTRAINT `purchasedbooks_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchasedbooks_ibfk_2` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
