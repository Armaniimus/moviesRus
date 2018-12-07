-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 nov 2018 om 14:44
-- Serverversie: 10.1.30-MariaDB
-- PHP-versie: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviesrus`
--

--
-- Gegevens worden geëxporteerd voor tabel `actor`
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

--
-- Gegevens worden geëxporteerd voor tabel `director`
--

INSERT INTO `director` (`dir_id`, `dir_fname`, `dir_lname`) VALUES
(201, 'Alfred', 'Hitchcock'),
(202, 'Jack', 'Clayton'),
(203, 'David', 'Lean'),
(204, 'Michael', 'Cimino'),
(205, 'Milos', 'Forman'),
(206, 'Ridley', 'Scott'),
(207, 'Stanley', 'Kubrick'),
(208, 'Bryan', 'Singer'),
(209, 'Roman', 'Polanski'),
(210, 'Paul', 'Thomas Anderson'),
(211, 'Woody', 'Allen'),
(212, 'Hayao', 'Miyazaki'),
(213, 'Frank', 'Darabont'),
(214, 'Sam', 'Mendes'),
(215, 'James', 'Cameron'),
(216, 'Gus', 'Van Sant'),
(217, 'John', 'Boorman'),
(218, 'Danny', 'Boyle'),
(219, 'Christopher', 'Nolan'),
(220, 'Richard', 'Kelly'),
(221, 'Kevin', 'Spacey'),
(222, 'Andrei', 'Tarkovsky'),
(223, 'Peter', 'Jackson');

--
-- Gegevens worden geëxporteerd voor tabel `genres`
--

INSERT INTO `genres` (`gen_id`, `gen_title`) VALUES
(1001, 'Action'),
(1002, 'Adventure'),
(1003, 'Animation'),
(1004, 'Biography'),
(1005, 'Comedy'),
(1006, 'Crime'),
(1007, 'Drama'),
(1008, 'Horror'),
(1009, 'Music'),
(1010, 'Mystery'),
(1011, 'Romance'),
(1012, 'Thriller'),
(1013, 'War');

--
-- Gegevens worden geëxporteerd voor tabel `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_title`, `mov_year`, `mov_time`, `mov_lang`, `mov_rt_rel`, `mov_rel_country`) VALUES
(901, 'Vertigo                                           ', 1958, 128, 'English', '0000-00-00', 'UK'),
(902, 'The Innocents                                     ', 1961, 100, 'English', '0000-00-00', 'SW'),
(903, 'Lawrence of Arabia                                ', 1962, 216, 'English', '0000-00-00', 'UK'),
(904, 'The Deer Hunter                                   ', 1978, 183, 'English', '0000-00-00', 'UK'),
(905, 'Amadeus                                           ', 1984, 160, 'English', '0000-00-00', 'UK'),
(906, 'Blade Runner                                      ', 1982, 117, 'English', '0000-00-00', 'UK'),
(907, 'Eyes Wide Shut                                    ', 1999, 159, 'English', '0000-00-00', 'UK'),
(908, 'The Usual Suspects                                ', 1995, 106, 'English', '0000-00-00', 'UK'),
(909, 'Chinatown                                         ', 1974, 130, 'English', '0000-00-00', 'UK'),
(910, 'Boogie Nights                                     ', 1997, 155, 'English', '0000-00-00', 'UK'),
(911, 'Annie Hall                                        ', 1977, 93, 'English', '0000-00-00', 'USA'),
(912, 'Princess Mononoke                                 ', 1997, 134, 'Japanese', '2019-10-01', 'UK'),
(913, 'The Shawshank Redemption                          ', 1994, 142, 'English', '0000-00-00', 'UK'),
(914, 'American Beauty                                   ', 1999, 122, 'English', '0000-00-00', 'UK'),
(915, 'Titanic                                           ', 1997, 194, 'English', '0000-00-00', 'UK'),
(916, 'Good Will Hunting                                 ', 1997, 126, 'English', '0000-00-00', 'UK'),
(917, 'Deliverance                                       ', 1972, 109, 'English', '0000-00-00', 'UK'),
(918, 'Trainspotting                                     ', 1996, 94, 'English', '0000-00-00', 'UK'),
(919, 'The Prestige                                      ', 2006, 130, 'English', '2010-11-06', 'UK'),
(920, 'Donnie Darko                                      ', 2001, 113, 'English', '0000-00-00', 'UK'),
(921, 'Slumdog Millionaire                               ', 2008, 120, 'English', '2009-01-09', 'UK'),
(922, 'Aliens                                            ', 1986, 137, 'English', '0000-00-00', 'UK'),
(923, 'Beyond the Sea                                    ', 2004, 118, 'English', '2026-11-04', 'UK'),
(924, 'Avatar                                            ', 2009, 162, 'English', '2017-12-09', 'UK'),
(925, 'Braveheart                                        ', 1995, 178, 'English', '0000-00-00', 'UK'),
(926, 'Seven Samurai                                     ', 1954, 207, 'Japanese', '0000-00-00', 'JP'),
(927, 'Spirited Away                                     ', 2001, 125, 'Japanese', '2012-09-03', 'UK'),
(928, 'Back to the Future                                ', 1985, 116, 'English', '0000-00-00', 'UK');

--
-- Gegevens worden geëxporteerd voor tabel `movie cast`
--

INSERT INTO `movie cast` (`act_id`, `mov_id`, `role`) VALUES
(101, 901, 'John Scottie Ferguson'),
(102, 902, 'Miss Giddens'),
(103, 903, 'T.E. Lawrence'),
(104, 904, 'Michael'),
(105, 905, 'Antonio Salieri'),
(106, 906, 'Rick Deckard'),
(107, 907, 'Alice Harford'),
(108, 908, 'McManus'),
(110, 910, 'Eddie Adams'),
(111, 911, 'Alvy Singer'),
(112, 912, 'San'),
(113, 913, 'Andy Dufresne'),
(114, 914, 'Lester Burnham'),
(115, 915, 'Rose DeWitt Bukater'),
(116, 916, 'Sean Maguire'),
(117, 917, 'Ed'),
(118, 918, 'Renton'),
(120, 920, 'Elizabeth Darko'),
(121, 921, 'Older Jamal'),
(122, 922, 'Ripley'),
(114, 923, 'Bobby Darin'),
(109, 909, 'J.J. Gittes'),
(119, 919, 'Alfred Borden');

--
-- Gegevens worden geëxporteerd voor tabel `movie_direction`
--

INSERT INTO `movie_direction` (`director_dir_id`, `movie_mov_id`) VALUES
(201, 901),
(202, 902),
(203, 903),
(204, 904),
(205, 905),
(206, 906),
(207, 907),
(208, 908),
(209, 909),
(210, 910),
(211, 911),
(212, 912),
(213, 913),
(214, 914),
(215, 915),
(216, 916),
(217, 917),
(218, 918),
(219, 919),
(220, 920),
(218, 921),
(215, 922),
(221, 923);

--
-- Gegevens worden geëxporteerd voor tabel `movie_genres`
--

INSERT INTO `movie_genres` (`mov_id`, `gen_id`) VALUES
(922, 1001),
(917, 1002),
(903, 1002),
(912, 1003),
(911, 1005),
(908, 1006),
(913, 1006),
(926, 1007),
(928, 1007),
(918, 1007),
(921, 1007),
(902, 1008),
(923, 1009),
(907, 1010),
(927, 1010),
(901, 1010),
(914, 1011),
(906, 1012),
(904, 1013);

--
-- Gegevens worden geëxporteerd voor tabel `rating`
--

INSERT INTO `rating` (`rev_id`, `mov_id`, `rev_stars`, `num_o_ratings`) VALUES
(9001, 901, 8, 263575),
(9002, 902, 8, 20207),
(9003, 903, 8, 202778),
(9005, 906, 8, 484746),
(9006, 924, 7, NULL),
(9007, 908, 9, 779489),
(9008, 909, NULL, 227235),
(9009, 910, 3, 195961),
(9010, 911, 8, 203875),
(9011, 912, 8, NULL),
(9013, 914, 7, 862618),
(9001, 915, 8, 830095),
(9014, 916, 4, 642132),
(9015, 925, 8, 81328),
(9016, 918, NULL, 580301),
(9017, 920, 8, 609451),
(9018, 921, 8, 667758),
(9019, 922, 8, 511613),
(9020, 923, 7, 13091);

--
-- Gegevens worden geëxporteerd voor tabel `reviewer`
--

INSERT INTO `reviewer` (`rev_id`, `rev_name`) VALUES
(9001, 'Righty Sock'),
(9002, 'Jack Malvern'),
(9003, 'Flagrant Baronessa'),
(9004, 'Alec Shaw'),
(9005,  NULL),
(9006, 'Victor Woeltjen'),
(9007, 'Simon Wright'),
(9008, 'Neal Wruck'),
(9009, 'Paul Monks'),
(9010, 'Mike Salvati'),
(9011,  NULL),
(9012, 'Wesley S. Walker'),
(9013, 'Sasha Goldshtein'),
(9014, 'Josh Cates'),
(9015, 'Krug Stillo'),
(9016, 'Scott LeBrun'),
(9017, 'Hannah Steele'),
(9018, 'Vincent Cadena'),
(9019, 'Brandt Sponseller'),
(9020, 'Richard Adams');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
