-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2013 at 12:07 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
GRANT ALL PRIVILEGES ON movies.* TO 'webuser'@'localhost' identified by '12345';

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) DEFAULT NULL,
  `link` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `link`) VALUES
(1, 'http://content9.flixster.com/movie/11/16/77/11167739_det.jpg'),
(2, 'http://content7.flixster.com/movie/11/16/77/11167789_det.jpg'),
(3, 'http://content9.flixster.com/movie/11/16/83/11168351_det.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(50) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `lead_actor` varchar(50) NOT NULL,
  `lead_actress` varchar(50) NOT NULL,
  `MPAA` varchar(5) NOT NULL,
  `run_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `movie_title`, `genre`, `lead_actor`, `lead_actress`, `MPAA`, `run_time`) VALUES
(1, 'Identity Thief ', 'comedy', 'Jason Bateman', 'Melissa McCarthy', 'R', 111),
(2, 'Safe Haven ', 'Drama', 'Josh Duhamel', 'Julianne Hough', 'PG-13', 115),
(3, 'A Good Day to Die Hard', 'Action', 'Bruce Willis', 'Mary Elizabeth Winstead', 'R', 97);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `movie` int(11) NOT NULL,
  `review` blob NOT NULL,
  `rating` int(11) NOT NULL,
  `review_date` date NOT NULL,
  PRIMARY KEY (`movie`),
  FOREIGN KEY (`movie`) REFERENCES movie(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`movie`, `review`, `rating`, `review_date`) VALUES
(1, 0x556e6c696d697465642066756e6473206861766520616c6c6f776564204469616e6120284d634361727468792920746f206c697665206974207570206f6e20746865206f7574736b69727473206f66204d69616d692c2077686572652074686520717565656e206f662072657461696c206275797320776861746576657220737472696b6573206865722066616e63792e205468657265206973206f6e6c79206f6e6520676c697463683a2054686520494420736865206973207573696e6720746f2066696e616e6365207468657365207370726565732072656164732053616e647920426967656c6f7720506174746572736f6e2e2e2e2e616e642069742062656c6f6e677320746f20616e206163636f756e7473207265702028426174656d616e292077686f206c697665732068616c66776179206163726f73732074686520552e532e2057697468206f6e6c79206f6e65207765656b20746f2068756e7420646f776e2074686520636f6e20617274697374206265666f72652068697320776f726c6420696d706c6f6465732c20746865207265616c2053616e647920426967656c6f7720506174746572736f6e20686561647320736f75746820746f20636f6e66726f6e742074686520776f6d616e207769746820616e20616c6c2d616363657373207061737320746f20686973206c6966652e20416e6420617320686520617474656d70747320746f2062726962652c20636f617820616e64207772616e676c65206865722074686520322c303030206d696c657320746f2044656e7665722c206f6e652065617379207461726765742077696c6c20646973636f766572206a75737420686f7720746f75676820697420697320746f2067657420796f7572206e616d65206261636b2e, 8, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`) VALUES
(1, 'admin', '348162101fc6f7e624681b7400b085eeac6df7bd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
