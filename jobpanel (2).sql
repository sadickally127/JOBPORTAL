-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 08:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_master`
--

CREATE TABLE `application_master` (
  `ApplicationId` int(11) NOT NULL,
  `JobseekerId` int(11) NOT NULL,
  `NewsId` int(11) NOT NULL,
  `JobseekerResume` blob NOT NULL,
  `JobseekerEmail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_master`
--

INSERT INTO `application_master` (`ApplicationId`, `JobseekerId`, `NewsId`, `JobseekerResume`, `JobseekerEmail`) VALUES
(12, 24, 6, 0x61737369676e375f323032325f726f7574696e675f616c6c2e706466, 'lubuva@gmail.com'),
(13, 24, 5, 0x61737369676e375f323032325f726f7574696e675f616c6c2e706466, 'lubuva@gmail.com'),
(17, 24, 5, 0x61737369676e375f323032325f726f7574696e675f616c6c2e706466, 'lubuva@gmail.com'),
(18, 24, 8, 0x61737369676e375f323032325f726f7574696e675f616c6c2e706466, 'lubuva@gmail.com'),
(19, 24, 9, 0x414e535745525320464f52205448452d494e444956494455414c2041535349474e4d454e54205155455354494f4e532e706466, 'lubuva@gmail.com'),
(20, 24, 12, 0x61737369676e375f323032325f726f7574696e675f616c6c2e706466, 'lubuva@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employer_reg`
--

CREATE TABLE `employer_reg` (
  `employerId` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ContactPerson` varchar(255) DEFAULT NULL,
  `Area_work` varchar(255) DEFAULT NULL,
  `Question` varchar(255) DEFAULT NULL,
  `Answer` varchar(255) DEFAULT NULL,
  `Mobile` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer_reg`
--

INSERT INTO `employer_reg` (`employerId`, `email`, `CompanyName`, `City`, `Address`, `password`, `ContactPerson`, `Area_work`, `Question`, `Answer`, `Mobile`) VALUES
(19, 'sadickally@gmail.com', 'CRYPTO COMPANY LTD', 'Dodma', 'Makutupora, Dodoma, Tanzania.', '4321', 'SADICK R. ALLY', 'Makutupora', 'What is Your Pet Name?', 'Jupyter', 784092596),
(21, 'tinubu@gmail.com', 'CRYPTO COMPANY LTD', 'Arusha', 'Mianzini, Arusha, Tanzania.', '4321', 'ABIOLA TINUBU', 'Mianzini ', 'What is Your Pet Name?', 'Pluto', 784092596),
(22, 'chabu@gmail.com', 'UMRAH INSURANCE COMPANY LTD', 'Daressalaam', 'Manzese, Daressalaam, Tanzania.', '1234', 'MOHAMMED CHABU', 'Manzese', 'What is the Name of Your First School?', 'Sanawari Juu', 784092596),
(23, 'djohn@gmail.com', 'DADAZ FASHION', 'Arusha', 'Njiro, Arusha, Tanzania', '1234', 'DARIAH JOHN', 'Njiro', 'Who is Your Favourite Person?', 'Sister', 784094567);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_reg`
--

CREATE TABLE `jobseeker_reg` (
  `jobseekerId` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Resume` blob DEFAULT NULL,
  `ResumeURL` varchar(255) NOT NULL,
  `Question` varchar(255) DEFAULT NULL,
  `Answer` varchar(255) DEFAULT NULL,
  `Mobile` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker_reg`
--

INSERT INTO `jobseeker_reg` (`jobseekerId`, `email`, `FullName`, `City`, `Address`, `password`, `Gender`, `Birthdate`, `Resume`, `ResumeURL`, `Question`, `Answer`, `Mobile`) VALUES
(20, 'mariam@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(24, 'lubuva@gmail.com', 'DAMIAN LUBUVA', 'Arusha', 'Mianzini, Arusha, Tanzania.', '4321', 'Male', '2024-04-03', 0x61737369676e375f323032325f726f7574696e675f616c6c2e706466, 'ruploads/assign7_2022_routing_all.pdf', 'Who is Your Favourite Person?', 'Dad', 784092596),
(25, 'ajuma@gmail.com', 'ASHA JUMA', 'Arusha', 'Mianzini, Arusha, Tanzania.', '5678', 'Female', '2000-11-16', 0x47524f55502041535349474e4d454e54202d20204954552030373230312e706466, 'ruploads/GROUP ASSIGNMENT -  ITU 07201.pdf', 'What is the Name of Your First School?', 'Uhuru', 784092596);

-- --------------------------------------------------------

--
-- Table structure for table `news_master`
--

CREATE TABLE `news_master` (
  `NewsId` int(11) NOT NULL,
  `EmployerId` int(11) DEFAULT NULL,
  `Company` varchar(255) DEFAULT NULL,
  `JobTitle` varchar(255) DEFAULT NULL,
  `JobNews` blob DEFAULT NULL,
  `JobNewsUrl` varchar(255) NOT NULL,
  `NewsDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_master`
--

INSERT INTO `news_master` (`NewsId`, `EmployerId`, `Company`, `JobTitle`, `JobNews`, `JobNewsUrl`, `NewsDate`) VALUES
(10, 19, 'GEITA GOLD MINES', 'MINE CONTRACTOR', NULL, 'localhost/jobpanel/Employer/uploads/assign7_2022_routing_all.pdf', '2024-04-02'),
(12, 19, 'MASAI CURIOSITY SHOP', 'SHOPKEEPER', NULL, 'localhost/jobpanel/Employer/uploads/DATABASE ASSIGNMENT.pdf', '2024-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Status` enum('Jobseeker','Employer') DEFAULT NULL,
  `JobseekerId` int(11) DEFAULT NULL,
  `EmployerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`userId`, `username`, `FullName`, `email`, `password`, `Status`, `JobseekerId`, `EmployerId`) VALUES
(19, 'sadickally@gmail.com', 'SADICK ALLY', 'sadickally@gmail.com', '4321', 'Employer', NULL, NULL),
(20, 'mariam@gmail.com', 'MARIAM M. RASHID', 'mariam@gmail.com', '4321', 'Jobseeker', NULL, NULL),
(21, 'tinubu@gmail.com', 'DAMIAN TINUBU', 'tinubu@gmail.com', '4321', 'Employer', NULL, NULL),
(22, 'chabu@gmail.com', 'MOHAMMED CHABU', 'chabu@gmail.com', '1234', 'Employer', NULL, NULL),
(23, 'djohn@gmail.com', 'DARIA JOHN', 'djohn@gmail.com', '1234', 'Employer', NULL, NULL),
(24, 'lubuva@gmail.com', 'DAMIAN LUBUVA', 'lubuva@gmail.com', '4321', 'Jobseeker', NULL, NULL),
(25, 'ajuma@gmail.com', 'ASHA JUMA', 'ajuma@gmail.com', '5678', 'Jobseeker', NULL, NULL);

--
-- Triggers `user_master`
--
DELIMITER $$
CREATE TRIGGER `after_user_insert` AFTER INSERT ON `user_master` FOR EACH ROW BEGIN
    DECLARE inserted_user_id INT;

    
    SELECT NEW.userId INTO inserted_user_id;

    
    IF NEW.Status = 'Jobseeker' THEN
        INSERT INTO jobseeker_reg (JobseekerId, email, password, FullName) VALUES (inserted_user_id, NEW.email, NEW.password, NEW.FullName);
    ELSEIF NEW.Status = 'Employer' THEN
        INSERT INTO employer_reg (EmployerId, email, password) VALUES (inserted_user_id, NEW.email, NEW.password);
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_master`
--
ALTER TABLE `application_master`
  ADD PRIMARY KEY (`ApplicationId`);

--
-- Indexes for table `employer_reg`
--
ALTER TABLE `employer_reg`
  ADD PRIMARY KEY (`employerId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jobseeker_reg`
--
ALTER TABLE `jobseeker_reg`
  ADD PRIMARY KEY (`jobseekerId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `news_master`
--
ALTER TABLE `news_master`
  ADD PRIMARY KEY (`NewsId`),
  ADD KEY `fk_employer` (`EmployerId`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `JobseekerId` (`JobseekerId`),
  ADD KEY `EmployerId` (`EmployerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_master`
--
ALTER TABLE `application_master`
  MODIFY `ApplicationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employer_reg`
--
ALTER TABLE `employer_reg`
  MODIFY `employerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jobseeker_reg`
--
ALTER TABLE `jobseeker_reg`
  MODIFY `jobseekerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `news_master`
--
ALTER TABLE `news_master`
  MODIFY `NewsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news_master`
--
ALTER TABLE `news_master`
  ADD CONSTRAINT `fk_employer` FOREIGN KEY (`EmployerId`) REFERENCES `employer_reg` (`employerId`);

--
-- Constraints for table `user_master`
--
ALTER TABLE `user_master`
  ADD CONSTRAINT `user_master_ibfk_1` FOREIGN KEY (`JobseekerId`) REFERENCES `jobseeker_reg` (`jobseekerId`),
  ADD CONSTRAINT `user_master_ibfk_2` FOREIGN KEY (`EmployerId`) REFERENCES `employer_reg` (`employerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
