-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 06:30 PM
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
(2, 'chloe', 'chlospency@gmail.com', '$2y$10$OHQgHl8Qtv2H5u/fdJeKK.3lVpZ4x5T2yS3NRSr.gPHY5.zjabD96', '2025-03-28 05:22:46', '2025-03-28 05:22:46'),
(3, 'Kimberly Puno', 'kppuno@gmail.com', 'b6cb572e168a99f5209eae6a906cf65c', '2025-03-28 10:54:17', '2025-03-28 10:54:17'),
(4, 'claire', 'eagania@student.hau.edu.ph', '17d3e80bafe890a279d7334941988b1d', '2025-03-28 13:50:50', '2025-03-28 13:50:50'),
(5, 'Elisha Claire', 'chlospency@gmail.com', '17d3e80bafe890a279d7334941988b1d', '2025-03-28 14:52:24', '2025-03-28 14:52:24');

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
(5, 'Network Security', 'Mike Johnson', 'Programming', 700, 1, 'uploads/Network Security - 2006 - Douligeris.pdf', '../book_covers/security.png', 'This is an amazing book.'),
(9, 'Managing Built Heritage', 'Stephen Bond', 'Fiction', 200, 2, 'uploads/Breaking the Book - 2015 - Mandell.pdf', '../book_covers/decision.png', 'description');

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

--
-- Dumping data for table `borrowedbooks`
--

INSERT INTO `borrowedbooks` (`Borrow_ID`, `User_ID`, `Book_ID`, `BorrowedDate`, `ReturnDate`, `Fine`, `Status`) VALUES
(1, 7, 5, '2025-03-28', '2025-04-04', 0, ''),
(2, 7, 5, '2025-03-28', '2025-04-04', 0, ''),
(3, 7, 5, '2025-03-28', '2025-04-04', 0, '');

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
(17, 'Queen', 'chlospency@gmail.com', 'ihaivrbairabra', '2025-03-26 15:37:03'),
(18, 'wooowwwww', 'jadequeen386@gmail.com', 'pleasee workkkk', '2025-03-26 15:40:26'),
(20, 'Elisha Claire A. Gania', 'elizarobinson1905@gmail.com', 'wnj6', '2025-03-26 15:46:57'),
(22, 'jadie', 'elizarobinson1905@gmail.com', 'yesssss', '2025-03-26 15:49:51'),
(23, 'claire', 'jadequeen386@gmail.com', 'lastttt', '2025-03-26 15:52:12'),
(24, 'claire', 'jadequeen386@gmail.com', 'Hello! From the other side, do you hear me?', '2025-03-26 15:52:30'),
(25, 'jaden queen', 'jadequeen386@gmail.com', 'superr lasttt', '2025-03-26 15:53:23'),
(26, 'chloe', 'jadequeen386@gmail.com', 'pleasseeee workkkk', '2025-03-28 10:58:49'),
(27, 'chloe', 'jadequeen386@gmail.com', 'Hello! Please add more bookss!', '2025-03-28 16:11:50'),
(28, 'chloe', 'jadequeen386@gmail.com', 'hello there', '2025-03-28 18:14:16');

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
(5, 'Elisha Claire', 'elishaclairegania@gmail.com', '2025-03-28 15:10:46'),
(7, 'Elisha Claire', 'chlospency@gmail.com', '2025-03-28 17:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `personalrecords`
--

CREATE TABLE `personalrecords` (
  `Record_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Admin_ID` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Type` enum('Student','Employee') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `purchasedbooks`
--

INSERT INTO `purchasedbooks` (`Purchased_ID`, `User_ID`, `Book_ID`, `PurchasedDate`, `Price`) VALUES
(1, 7, 5, '2025-03-28', 0),
(2, 7, 5, '2025-03-28', 0),
(3, 7, 5, '2025-03-28', 0),
(4, 7, 5, '2025-03-28', 0);

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
(6, 'Jade Queen', 'jadequeen386@gmail.com', '$2y$10$iBwuXux.7PLOJQXjOuU2Vu1tgL8Kl5sUhlW1aCqvcbaogfIk0NTJG', 'Student', '2025-03-28 11:32:25'),
(7, 'eliza robinson', 'elizarobinson1905@gmail.com', '$2y$10$oq8G05jPwQCnK9BmYOymPuIgq54xEoSaprENKY0t01pL4oS9Bjiue', 'Employee', '2025-03-28 11:33:04');

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
  ADD KEY `Book_ID` (`Book_ID`),
  ADD KEY `User_ID` (`User_ID`);

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
-- Indexes for table `personalrecords`
--
ALTER TABLE `personalrecords`
  ADD PRIMARY KEY (`Record_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `purchasedbooks`
--
ALTER TABLE `purchasedbooks`
  ADD PRIMARY KEY (`Purchased_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Book_ID` (`Book_ID`);

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
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  MODIFY `Borrow_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personalrecords`
--
ALTER TABLE `personalrecords`
  MODIFY `Record_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasedbooks`
--
ALTER TABLE `purchasedbooks`
  MODIFY `Purchased_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `borrowedbooks_ibfk_1` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`),
  ADD CONSTRAINT `borrowedbooks_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `personalrecords`
--
ALTER TABLE `personalrecords`
  ADD CONSTRAINT `personalrecords_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `personalrecords_ibfk_2` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`);

--
-- Constraints for table `purchasedbooks`
--
ALTER TABLE `purchasedbooks`
  ADD CONSTRAINT `purchasedbooks_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `purchasedbooks_ibfk_2` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
