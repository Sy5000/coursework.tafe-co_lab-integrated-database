-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 15, 2023 at 06:49 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `co_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `hostID` int(11) NOT NULL,
  `hostName` varchar(255) NOT NULL,
  `hostBio` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`hostID`, `hostName`, `hostBio`) VALUES
(1, 'Costa Georgiadis', 'Costa Georgiadis is a landscape architect who has an all-consuming passion for plants and people - he knows how to bring out the best in both of them, and takes great pleasure in bringing them together.\r\n\r\nCosta believes in embracing and celebrating mother natures cycles and seasons and nurturing her balance, beauty and bounty organically. His holistic approach is all about gardening the soil and the soul.'),
(2, 'Ron Swanson', 'Ron Swanson i­s an avid outdoorsman and craftsman — enjoying hunting, fishing, and woodworking. His go to drink is Lagavulin Scotch Whiskey (single malt) and favorite foods consist of any breakfast food, especially bacon.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `firstName`, `lastName`, `email`) VALUES
(1, 'test', '$2y$10$1GK10ehgeVXarQf7tsllzOYsjYjtz.QCmVQIh.dt884t21aO04WyS', 'test', 'test', 'test@test.test'),
(2, 'TestAccount', '$2y$10$vUD50wc3aLzJbYj.ss3BoeqaQZixiz2.DwTYvSyk/B4bvtZu1eZY6', 'test', 'test', 'test@test.com'),
(3, 'TestAccount', '$2y$10$2grPzkRaUV04vmYwfucMZOI07bNW0QzQr3bfNphR8KpFNb.dVLWFy', 'test', 'test', 'test@test.com'),
(4, 'LKnope', '$2y$10$0DoZPqK5OuQLZXZxzCm8D.gZQJ72JyG29u1z5At82K.NMjVDjiqm6', 'Leslie', 'Knope', 'L.Knope@parksdept.com'),
(5, 'test', '$2y$10$iirjfkWHcniTqF4PDslzPeF8biosWbRmP0bp6NFXO7IRB.40XAZJq', 'test', 'test', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venueID` int(11) NOT NULL,
  `venueTitle` varchar(256) NOT NULL,
  `venueDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venueID`, `venueTitle`, `venueDescription`) VALUES
(1, 'The loft', 'An intimate but adaptable creative space located on the first floor. Suitable for up to 30 guests'),
(2, 'The Warehouse', 'The main hall is a large and modern creative space. Great for larger conferences or more hands on workshop functions. Suitable for up to 60 guests'),
(3, 'The Basement', 'Multiple sound treated recording/rehearsal rooms and studios with modern production suites');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `workshopID` int(11) NOT NULL,
  `workshopTitle` varchar(256) NOT NULL,
  `workshopDescription` text,
  `workshopImage` varchar(50) DEFAULT NULL,
  `workshopTimetable` varchar(255) DEFAULT NULL,
  `workshopCost` decimal(6,2) NOT NULL,
  `hostID` int(11) DEFAULT NULL,
  `venueID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`workshopID`, `workshopTitle`, `workshopDescription`, `workshopImage`, `workshopTimetable`, `workshopCost`, `hostID`, `venueID`) VALUES
(1, 'House Plant Propagation', 'Calling all house plant enthusiasts! This Brisbane workshop is for you.\r\nAre you looking to expand your indoor garden? Why not join our upcoming houseplant propagation class, We\'ll teach you all the tips and tricks to propagate your plants and create new ones. It\'s an excellent opportunity to learn new skills and meet fellow plant enthusiasts.', 'bonsai001.jpg', 'Mondays : 10-11.30am', '59.99', 2, 3),
(2, 'Friday Night Jam', 'An informal music session with an emphasis on collaboration. All styles, instruments/vocals and abilities welcome.', 'jam001.jpg', 'Friday nights : 6-9pm', '0.00', 1, 3),
(3, 'Intermediate Ceramics', 'Ceramics classes teach the skills students need to create their own pieces of artwork, and cover topics ranging from art history to sculpture.', 'loft001.jpg', 'Wednesdays : 2-4pm', '55.00', 1, 1),
(5, 'Intermediate Woodwork Skills', 'If you are looking to expand your woodworking knowledge or looking for somewhere to start take a look at our intermediate class.\r\n\r\nThe courses is suitable for beginners, right through to intermediate woodworkers.', 'woodwork001.jpg', 'Fridays : 9-12am', '70.00', 2, 2),
(9, 'Advanced woodwork', 'Join our advanced woodworking class to sharpen your skills, learn new techniques, and create beautiful pieces. Connect with other enthusiasts and expand your knowledge of this timeless craft.', 'woodwork001.jpg', 'Thursdays : 12-3pm', '75.00', 1, 2),
(11, 'Bakery for Beginners', 'Are you interested in learning how to bake delicious bread and pastries from scratch? Our beginner\'s bakery class is the perfect opportunity for you to expand your baking skills and knowledge. You will learn new techniques, recipes, and tips to impress your family and friends with your home-baked goods. Discover the joy of baking today!', 'baking001.jpg', 'Mondays : 12-4pm', '19.99', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`hostID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venueID`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`workshopID`),
  ADD KEY `hostConstraint` (`hostID`),
  ADD KEY `venueConstraint` (`venueID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `host`
--
ALTER TABLE `host`
  MODIFY `hostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `workshopID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `hostConstraint` FOREIGN KEY (`hostID`) REFERENCES `host` (`hostID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venueConstraint` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
