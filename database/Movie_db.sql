-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 02:34 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedb`
--

DROP DATABASE if exists moviesRus;
CREATE DATABASE moviesRus;
USE moviesRus;

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `act_id` int(11) NOT NULL,
  `act_fname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act_lname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act_gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`act_id`, `act_fname`, `act_lname`, `act_gender`) VALUES
(101, 'James               ', 'Stewart             ', 'M'),
(102, 'Deborah             ', 'Kerr                ', 'F'),
(103, 'Peter               ', 'OToole              ', 'M'),
(104, 'Robert              ', 'De Niro             ', 'M'),
(105, 'F. Murray           ', 'Abraham             ', 'M'),
(106, 'Harrison            ', 'Ford                ', 'M'),
(107, 'Nicole              ', 'Kidman              ', 'F'),
(108, 'Stephen             ', 'Baldwin             ', 'M'),
(109, 'Jack                ', 'Nicholson           ', 'M'),
(110, 'Mark                ', 'Wahlberg            ', 'M'),
(111, 'Woody               ', 'Allen               ', 'M'),
(112, 'Claire              ', 'Danes               ', 'F'),
(113, 'Tim                 ', 'Robbins             ', 'M'),
(114, 'Kevin               ', 'Spacey              ', 'M'),
(115, 'Kate                ', 'Winslet             ', 'F'),
(116, 'Robin               ', 'Williams            ', 'M'),
(117, 'Jon                 ', 'Voight              ', 'M'),
(118, 'Ewan                ', 'McGregor            ', 'M'),
(119, 'Christian           ', 'Bale                ', 'M'),
(120, 'Maggie              ', 'Gyllenhaal          ', 'F'),
(121, 'Dev                 ', 'Patel               ', 'M'),
(122, 'Sigourney           ', 'Weaver              ', 'F'),
(123, 'David               ', 'Aston               ', 'M'),
(124, 'Ali                 ', 'Astin               ', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `dir_id` int(11) NOT NULL,
  `dir_fname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dir_lname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`dir_id`, `dir_fname`, `dir_lname`) VALUES
(201, 'Alfred              ', 'Hitchcock           '),
(202, 'Jack                ', 'Clayton             '),
(203, 'David               ', 'Lean                '),
(204, 'Michael             ', 'Cimino              '),
(205, 'Milos               ', 'Forman              '),
(206, 'Ridley              ', 'Scott               '),
(207, 'Stanley             ', 'Kubrick             '),
(208, 'Bryan               ', 'Singer              '),
(209, 'Roman               ', 'Polanski            '),
(210, 'Paul                ', 'Thomas Anderson     '),
(211, 'Woody               ', 'Allen               '),
(212, 'Hayao               ', 'Miyazaki            '),
(213, 'Frank               ', 'Darabont            '),
(214, 'Sam                 ', 'Mendes              '),
(215, 'James               ', 'Cameron             '),
(216, 'Gus                 ', 'Van Sant            '),
(217, 'John                ', 'Boorman             '),
(218, 'Danny               ', 'Boyle               '),
(219, 'Christopher         ', 'Nolan               '),
(220, 'Richard             ', 'Kelly               '),
(221, 'Kevin               ', 'Spacey              '),
(222, 'Andrei              ', 'Tarkovsky           '),
(223, 'Peter               ', 'Jackson             ');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `gen_id` int(11) NOT NULL,
  `gen_title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`gen_id`, `gen_title`) VALUES
(1001, 'Action              '),
(1002, 'Adventure           '),
(1003, 'Animation           '),
(1004, 'Biography           '),
(1005, 'Comedy              '),
(1006, 'Crime               '),
(1007, 'Drama               '),
(1008, 'Horror              '),
(1009, 'Music               '),
(1010, 'Mystery             '),
(1011, 'Romance             '),
(1012, 'Thriller            '),
(1013, 'War                 ');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mov_id` int(11) NOT NULL,
  `mov_title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mov_year` int(11) DEFAULT NULL,
  `mov_time` int(11) DEFAULT NULL,
  `mov_lang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mov_dt_rel` date DEFAULT NULL,
  `mov_rel_country` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_title`, `mov_year`, `mov_time`, `mov_lang`, `mov_dt_rel`, `mov_rel_country`) VALUES
(901, 'Vertigo                                           ', 1958, 128, 'English        ', '1958-08-24', 'UK   '),
(902, 'The Innocents                                     ', 1961, 100, 'English        ', '1962-02-19', 'SW   '),
(903, 'Lawrence of Arabia                                ', 1962, 216, 'English        ', '1962-12-11', 'UK   '),
(904, 'The Deer Hunter                                   ', 1978, 183, 'English        ', '1979-03-08', 'UK   '),
(905, 'Amadeus                                           ', 1984, 160, 'English        ', '1985-01-07', 'UK   '),
(906, 'Blade Runner                                      ', 1982, 117, 'English        ', '1982-09-09', 'UK   '),
(907, 'Eyes Wide Shut                                    ', 1999, 159, 'English        ', '0000-00-00', 'UK   '),
(908, 'The Usual Suspects                                ', 1995, 106, 'English        ', '1995-08-25', 'UK   '),
(909, 'Chinatown                                         ', 1974, 130, 'English        ', '1974-08-09', 'UK   '),
(910, 'Boogie Nights                                     ', 1997, 155, 'English        ', '1998-02-16', 'UK   '),
(911, 'Annie Hall                                        ', 1977, 93,  'English        ', '1977-04-20', 'USA  '),
(912, 'Princess Mononoke                                 ', 1997, 134, 'Japanese       ', '2001-10-19', 'UK   '),
(913, 'The Shawshank Redemption                          ', 1994, 142, 'English        ', '1995-02-17', 'UK   '),
(914, 'American Beauty                                   ', 1999, 122, 'English        ', '0000-00-00', 'UK   '),
(915, 'Titanic                                           ', 1997, 194, 'English        ', '1998-01-23', 'UK   '),
(916, 'Good Will Hunting                                 ', 1997, 126, 'English        ', '1998-06-03', 'UK   '),
(917, 'Deliverance                                       ', 1972, 109, 'English        ', '1982-10-05', 'UK   '),
(918, 'Trainspotting                                     ', 1996, 94, 'English         ', '1996-02-23', 'UK   '),
(919, 'The Prestige                                      ', 2006, 130, 'English        ', '2006-11-10', 'UK   '),
(920, 'Donnie Darko                                      ', 2001, 113, 'English        ', '0000-00-00', 'UK   '),
(921, 'Slumdog Millionaire                               ', 2008, 120, 'English        ', '2009-01-09', 'UK   '),
(922, 'Aliens                                            ', 1986, 137, 'English        ', '1986-08-29', 'UK   '),
(923, 'Beyond the Sea                                    ', 2004, 118, 'English        ', '2004-11-26', 'UK   '),
(924, 'Avatar                                            ', 2009, 162, 'English        ', '2009-12-17', 'UK   '),
(925, 'Braveheart                                        ', 1995, 178, 'English        ', '1995-09-08', 'UK   '),
(926, 'Seven Samurai                                     ', 1954, 207, 'Japanese       ', '1954-04-26', 'JP   '),
(927, 'Spirited Away                                     ', 2001, 125, 'Japanese       ', '2003-09-12', 'UK   '),
(928, 'Back to the Future                                ', 1985, 116, 'English        ', '1985-12-04', 'UK   ');

-- --------------------------------------------------------

--
-- Table structure for table `movie_cast`
--

CREATE TABLE `movie_cast` (
  `mov_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_cast`
--

INSERT INTO `movie_cast` (`mov_id`, `act_id`, `role`) VALUES
(901, 101, 'John Scottie Ferguson         '),
(902, 102, 'Miss Giddens                  '),
(903, 103, 'T.E. Lawrence                 '),
(904, 104, 'Michael                       '),
(905, 105, 'Antonio Salieri               '),
(906, 106, 'Rick Deckard                  '),
(907, 107, 'Alice Harford                 '),
(908, 108, 'McManus                       '),
(909, 109, 'J.J. Gittes                   '),
(910, 110, 'Eddie Adams                   '),
(911, 111, 'Alvy Singer                   '),
(912, 112, 'San                           '),
(913, 113, 'Andy Dufresne                 '),
(914, 114, 'Lester Burnham                '),
(915, 115, 'Rose DeWitt Bukater           '),
(916, 116, 'Sean Maguire                  '),
(917, 117, 'Ed                            '),
(918, 118, 'Renton                        '),
(919, 119, 'Alfred Borden                 '),
(920, 120, 'Elizabeth Darko               '),
(921, 121, 'Older Jamal                   '),
(922, 122, 'Ripley                        '),
(923, 114, 'Bobby Darin                   ');

-- --------------------------------------------------------

--
-- Table structure for table `movie_direction`
--

CREATE TABLE `movie_direction` (
  `mov_id` int(11) NOT NULL,
  `dir_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_direction`
--

INSERT INTO `movie_direction` (`mov_id`, `dir_id`) VALUES
(901, 201),
(902, 202),
(903, 203),
(904, 204),
(905, 205),
(906, 206),
(907, 207),
(908, 208),
(909, 209),
(910, 210),
(911, 211),
(912, 212),
(913, 213),
(914, 214),
(915, 215),
(916, 216),
(917, 217),
(918, 218),
(919, 219),
(920, 220),
(921, 218),
(922, 215),
(923, 221);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `mov_id` int(11) NOT NULL,
  `gen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`mov_id`, `gen_id`) VALUES
(901, 1010),
(902, 1008),
(903, 1002),
(904, 1013),
(906, 1012),
(907, 1010),
(908, 1006),
(911, 1005),
(912, 1003),
(913, 1006),
(914, 1011),
(917, 1002),
(918, 1007),
(921, 1007),
(922, 1001),
(923, 1009),
(926, 1007),
(927, 1010),
(928, 1007);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `mov_id` int(11) NOT NULL,
  `rev_id` int(11) NOT NULL,
  `rev_stars` decimal(4,2) DEFAULT NULL,
  `num_o_ratings` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`mov_id`, `rev_id`, `rev_stars`, `num_o_ratings`) VALUES
(901, 9001, '8.40', 263575),
(902, 9002, '7.90', 20207),
(903, 9003, '8.30', 202778),
(906, 9005, '8.20', 484746),
(908, 9007, '7.30', 779489),
(909, 9008, '8.60', 227235),
(910, 9009, NULL, 195961),
(911, 9010, '3.00', 203875),
(912, 9011, '8.10', 0),
(914, 9013, '8.40', 862618),
(915, 9001, '7.00', 830095),
(916, 9014, '7.70', 642132),
(918, 9016, '4.00', 580301),
(920, 9017, NULL, 609451),
(921, 9018, '8.10', 667758),
(922, 9019, '8.00', 511613),
(923, 9020, '8.40', 13091),
(924, 9006, '6.70', 0),
(925, 9015, '7.70', 81328);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `rev_id` int(11) NOT NULL,
  `rev_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`rev_id`, `rev_name`) VALUES
(9001, 'Righty Sock                   '),
(9002, 'Jack Malvern                  '),
(9003, 'Flagrant Baronessa            '),
(9004, 'Alec Shaw                     '),
(9005, NULL),
(9006, 'Victor Woeltjen               '),
(9007, 'Simon Wright                  '),
(9008, 'Neal Wruck                    '),
(9009, 'Paul Monks                    '),
(9010, 'Mike Salvati                  '),
(9011, NULL),
(9012, 'Wesley S. Walker              '),
(9013, 'Sasha Goldshtein              '),
(9014, 'Josh Cates                    '),
(9015, 'Krug Stillo                   '),
(9016, 'Scott LeBrun                  '),
(9017, 'Hannah Steele                 '),
(9018, 'Vincent Cadena                '),
(9019, 'Brandt Sponseller             '),
(9020, 'Richard Adams                 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`act_id`),
  ADD UNIQUE KEY `act_id_UNIQUE` (`act_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`dir_id`),
  ADD UNIQUE KEY `dir_id_UNIQUE` (`dir_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`gen_id`),
  ADD UNIQUE KEY `gen_id_UNIQUE` (`gen_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mov_id`),
  ADD UNIQUE KEY `mov_id_UNIQUE` (`mov_id`);

--
-- Indexes for table `movie_cast`
--
ALTER TABLE `movie_cast`
  ADD PRIMARY KEY (`mov_id`,`act_id`),
  ADD KEY `fk_movie_has_actor_actor1_idx` (`act_id`),
  ADD KEY `fk_movie_has_actor_movie_idx` (`mov_id`);

--
-- Indexes for table `movie_direction`
--
ALTER TABLE `movie_direction`
  ADD PRIMARY KEY (`mov_id`,`dir_id`),
  ADD KEY `fk_movie_has_director_director1_idx` (`dir_id`),
  ADD KEY `fk_movie_has_director_movie1_idx` (`mov_id`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`mov_id`,`gen_id`),
  ADD KEY `fk_movie_has_genres_genres1_idx` (`gen_id`),
  ADD KEY `fk_movie_has_genres_movie1_idx` (`mov_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`mov_id`,`rev_id`),
  ADD KEY `fk_movie_has_reviewer_reviewer1_idx` (`rev_id`),
  ADD KEY `fk_movie_has_reviewer_movie1_idx` (`mov_id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`rev_id`),
  ADD UNIQUE KEY `rev_id_UNIQUE` (`rev_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `dir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `mov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=929;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9021;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_cast`
--
ALTER TABLE `movie_cast`
  ADD CONSTRAINT `fk_movie_has_actor_actor1` FOREIGN KEY (`act_id`) REFERENCES `actor` (`act_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movie_has_actor_movie` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `movie_direction`
--
ALTER TABLE `movie_direction`
  ADD CONSTRAINT `fk_movie_has_director_director1` FOREIGN KEY (`dir_id`) REFERENCES `director` (`dir_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movie_has_director_movie1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `fk_movie_has_genres_genres1` FOREIGN KEY (`gen_id`) REFERENCES `genres` (`gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movie_has_genres_movie1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_movie_has_reviewer_movie1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movie_has_reviewer_reviewer1` FOREIGN KEY (`rev_id`) REFERENCES `reviewer` (`rev_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
