-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2019 at 01:26 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pruser`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int(40) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(80) NOT NULL,
  `food_calories` double NOT NULL,
  `food_fat` double NOT NULL,
  `food_carbohydrate` double NOT NULL,
  `food_protein` double NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_calories`, `food_fat`, `food_carbohydrate`, `food_protein`) VALUES
(1, 'chicken', 7.8, 7.8, 7.9, 9.8);

-- --------------------------------------------------------

--
-- Table structure for table `user_meal`
--

CREATE TABLE IF NOT EXISTS `user_meal` (
  `user_id` bigint(20) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_serving` int(11) NOT NULL,
  `meal_number` int(11) NOT NULL,
  `meal_time` date NOT NULL,
  `calories` double NOT NULL,
  `fats` double NOT NULL,
  `carbohydrates` double NOT NULL,
  `proteins` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_meal`
--

INSERT INTO `user_meal` (`user_id`, `food_id`, `food_serving`, `meal_number`, `meal_time`, `calories`, `fats`, `carbohydrates`, `proteins`) VALUES
(1, 1, 2, 101, '2019-03-25', 2.5, 4.6, 7.5, 7.8),
(0, 0, 0, 0, '0000-00-00', 5940, 181.5, 660, 165);

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE IF NOT EXISTS `user_registration` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(80) NOT NULL,
  `user_email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `question` varchar(80) NOT NULL,
  `answer` varchar(80) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_id`, `user_name`, `user_email`, `password`, `question`, `answer`) VALUES
(1, 'Pratiksha', 'pratiksha@gmail.com', '123', 'favorite color', 'pink'),
(2, 'Harsali Dorle', 'harsali@gmail.com', '1234', 'Place of birth', 'nagpur');

-- --------------------------------------------------------

--
-- Table structure for table `user_specs`
--

CREATE TABLE IF NOT EXISTS `user_specs` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `height` int(80) NOT NULL,
  `weight` int(80) NOT NULL,
  `gender` varchar(80) NOT NULL,
  `age` int(80) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user_specs`
--

INSERT INTO `user_specs` (`user_id`, `height`, `weight`, `gender`, `age`) VALUES
(1, 165, 42, 'female', 20),
(2, 168, 488, 'female', 24),
(3, 165, 42, 'female', 20),
(4, 165, 42, 'female', 20),
(5, 165, 42, 'female', 20),
(6, 165, 42, 'female', 20),
(7, 165, 42, 'female', 20),
(8, 165, 42, 'female', 20),
(9, 165, 42, 'female', 20),
(10, 165, 42, 'female', 20),
(11, 165, 42, 'female', 20),
(12, 165, 42, 'female', 20),
(13, 165, 42, 'female', 20),
(14, 165, 42, 'female', 20),
(15, 165, 42, 'female', 20),
(16, 165, 42, 'female', 20),
(17, 165, 42, 'female', 20),
(18, 165, 42, 'male', 25),
(19, 165, 42, 'female', 20),
(20, 161, 31, 'male', 27),
(21, 165, 42, 'female', 20);
