-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2021 at 05:11 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurantmanagementapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `profile_pic` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `dob` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `profile_pic`, `name`, `email`, `gender`, `dob`) VALUES
('jamy', '1234', '', '', '', '', '2021-07-31 19:25:09'),
('admin', 'admin', '6119f00abaf2b0.50454374.jpg', 'Rice', 'abcde@gmail.com', 'Male', '2021-07-22 19:30:17'),
('asdasd', 'asdasdad', 'null', 'asdasd', 'asdad', '', '2021-08-10 00:00:00'),
('asdasd', 'asdasd', 'null', 'dasd', 'asdasd', 'Male', '2021-08-03 00:00:00'),
('asasdas', 'asasas', 'null', 'asda', 'asdsa', 'Male', '2021-08-02 00:00:00'),
('ASas', 'ASas', 'null', 'sASas', 'as', 'Female', '2021-08-02 00:00:00'),
('jhon', 'asdfghjkl', 'null', 'Rice', 'abcde@gmail.com', 'Male', '2021-08-16 00:00:00'),
('aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'null', 'aaaaaaaaaaaaaaaaaaa', 'umsi@umich.edu', 'Male', '2021-08-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CId` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `tokenID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CId`, `FullName`, `Email`, `Password`, `Gender`, `Image`, `tokenID`) VALUES
(3, 'abcde', 'abcde@gmail.com', '$2y$10$ZMDjcHox.MSLPjkryiZpX.OxO.55uLWBIhFuepW4VUl6nNEFOF9i6', 'Male', '../../uploads/customer/1629182496rice.jpg', '7a8663a634a368f0f046986947f464cf');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `P_id` int(11) NOT NULL,
  `P_Name` varchar(255) NOT NULL,
  `P_Desc` varchar(255) NOT NULL,
  `P_Category` varchar(255) NOT NULL,
  `P_Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `SId` int(11) NOT NULL,
  `FoodName` varchar(255) NOT NULL,
  `FoodDescription` varchar(255) NOT NULL,
  `FoodImage` varchar(255) NOT NULL,
  `FId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`SId`, `FoodName`, `FoodDescription`, `FoodImage`, `FId`) VALUES
(92, 'Rice', 'Biggest source of carbs', '../../uploads/stuff/1629281759rice.jpg', 2),
(92, 'Veggies', 'Very good for body', '../../uploads/stuff/1629281855veggies 1.png', 3),
(84, 'Papaya', 'very good', '../../uploads/stuff/1629281933veggies 1.png', 4),
(92, 'Mango', 'Very Tasty', '../../uploads/stuff/1629290174veggies 1.png', 5),
(92, 'Jackfruit', 'yummy', '../../uploads/stuff/1629293850rice.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `SId` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Designation` varchar(8) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `FavoriteFoods` varchar(255) NOT NULL,
  `tokenID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`SId`, `FullName`, `Email`, `Password`, `Gender`, `Designation`, `Image`, `FavoriteFoods`, `tokenID`) VALUES
(70, 'fghij', 'fghij@gmail.com', '$2y$10$Nne2jxZYsUwaaUa3lX8wpe7v7piXDWdjeT9FlgSRi6O5eAxnb6q/2', 'Female', 'Waiter', '../../uploads/stuff/1628990314rice.jpg', 'local$fast-food', 'f49c8ee8f61b27915a17e7ff2f4a247e'),
(77, 'qrstu', 'qrstu@gmail.com', '$2y$10$ew/u0dshBs.70/HWMJEzhu.FX2LulIEfb9kJbTwlRk7BMin8iF.oa', 'Male', 'Manager', '../../uploads/stuff/1629072195spiral.jpeg', 'chinese$local$fast-food', '6fb01c3383a9b068ab5236d00c7b4e97'),
(84, 'abcde', 'abcde@gmail.com', '$2y$10$qtyb.pngaTdZZ.IoWjYxj..kxh.pgRqvdtvw0FEauz5LegzETaxLe', 'Male', 'Chef', '../../uploads/stuff/1629073951veggies 1.png', 'chinese', '657a3ebfec610783fcafc223804660f0'),
(93, 'Shahed Chowdhury Omi', 'umsi@umich.edu', '$2y$10$MCSwfhic0OPOnl1Eo7//4OvmS8xiybUsolnw5SCPJIAu..quchUpa', 'Male', 'Manager', '../../uploads/stuff/1629293605spiral.jpeg', 'local$fast-food', '35dcff5282f54ee65a209378203d9b01');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `SupplyItem` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `uimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`username`, `password`, `firstname`, `email`, `address`, `dob`, `gender`, `SupplyItem`, `interest`, `uimage`) VALUES
('toy', '123', 'Toy', 'toy@gmail.com', '123456', '123456', 'male', 'qwerty', 'qwerty', 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`FId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`SId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `P_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `FId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `SId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
