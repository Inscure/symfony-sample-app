-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 19 Kwi 2014, 21:05
-- Wersja serwera: 5.6.12-log
-- Wersja PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `symfony`
--
CREATE DATABASE IF NOT EXISTS `symfony` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `symfony`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `name`, `surname`, `city`, `street`, `number`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'testuser', 'testuser', 'test@example.com', 'test@example.com', '', '', '', '', NULL, 1, 'rwvft9bb9iscowkcsok440o0ksgog84', '3ceqDmDoSJraLrVs94qPyy3b2bQMYMulYsOGYYDujdSMs9MfTQzQSd6ZAV/H7x+MGxBp/+booewMlD1O6urDlA==', '2014-01-19 16:34:27', 0, 0, NULL, 'nmDl5Il7YHYNEBVmvHrrnixSDyybXRD920c-S8MuO0I', '2014-01-18 14:54:04', 'a:0:{}', 0, NULL),
(2, 'Inscure', 'inscure', 'drimer.eco@gmail.com', 'drimer.eco@gmail.com', 'aaaacas', 'asfdsdfsdfca', 'sdfsdca', 'fsdfsdfca', 33, 1, 'i6ezejgu2x444gs8s0s0ssc0w008ogk', 'zdx3m5QQ4b3fpQEvUiDBzsI1a8AP32ut+Dnu4kF1QcWf2IcVyuy2Qfb3cgrkFN8Cs8kBjy5cg8Q/WUoNL5W73w==', '2014-01-20 18:39:57', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(3, 'test', 'test', 'test@a.pl', 'test@a.pl', '', '', '', '', NULL, 1, 'f16nu5puh08cc8kcs0cc888w4wk0oco', '5qYwzuUyvaUp1DfvPVwx3qj16nJvhPM0wo0+W/54snl20hI1dsS/AjgL2UX0IF8OuZXftse6CNc7y6JL4WOJaA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(4, 'testa', 'testa', 'test@wp.pl', 'test@wp.pl', 'sdsfd', 'fdsfsdfsd', 'fsdfsd', 'fsdfsd', 5, 1, '88alg9s4xm88osog0c8ocockw04wc4s', 'MwCKIQBTVPijQ6kqMC48PgnQAFJaReb3UnUIgW54lnF6src7EVrhqUpx1jSZdGyV5KQpRB3VOG6o437LDZveNQ==', '2014-01-20 03:50:21', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(5, 'dfsdfdf', 'dfsdfdf', 'dsdasdasd@wp.pl', 'dsdasdasd@wp.pl', NULL, NULL, NULL, NULL, NULL, 1, 'y2zr0b03p8g0owgk4k4gsok80g48c0', 'hHys+ZAF6vF3zoKqyrrYa9AK6QrYx6xFDV/EBAmBk5LD1sIBVqv883MsN/+LHGmFYPDt83veDYihEGs0J6jFXA==', '2014-01-20 04:55:16', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(6, 'tester', 'tester', 'tester@gmail.com', 'tester@gmail.com', 'aaaa', 'bbbb', 'fdsfsdf', 'dfsdfdsf', 12, 1, 'acwlf0j7bew4oswc404scwkc0gw4swg', '45vORIcaJR5fr7xNUiiMNWrRRe0AcJJYTfWCkD8pkphknBT1n4RJFzbOxSiWDf4IkEhmtgPJ0qBEpq8sYO7RIg==', '2014-01-20 10:53:05', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(7, 'admin', 'admin', 'admin@admin.pl', 'admin@admin.pl', NULL, NULL, NULL, NULL, NULL, 1, 'lxl134lb5c04skg0k0ogwgs48wwogss', 'OWLeiHAGya2njrSSvXcgVEklsQ98+GdP+5t6tmFS1UNzBif3c4q18c1L8oZZVq4K1aAT4kEBGJvx6yRwmXavvg==', '2014-04-19 21:04:44', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`) VALUES
(6, 'sdasdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam euismod mi, non lobortis justo porta nec. Nullam tincidunt at neque quis tempor. Donec hendrerit nulla quis mi convallis, vitae pharetra metus lobortis. Duis eget arcu eu neque tempus ', 3),
(8, 'sdasdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam euismod mi, non lobortis justo porta nec. Nullam tincidunt at neque quis tempor. Donec hendrerit nulla quis mi convallis, vitae pharetra metus lobortis. Duis eget arcu eu neque tempus ', 3),
(9, 'sdasdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam euismod mi, non lobortis justo porta nec. Nullam tincidunt at neque quis tempor. Donec hendrerit nulla quis mi convallis, vitae pharetra metus lobortis. Duis eget arcu eu neque tempus ', 3),
(10, 'sdasdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam euismod mi, non lobortis justo porta nec. Nullam tincidunt at neque quis tempor. Donec hendrerit nulla quis mi convallis, vitae pharetra metus lobortis. Duis eget arcu eu neque tempus ', 3),
(14, 'sdasdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam euismod mi, non lobortis justo porta nec. Nullam tincidunt at neque quis tempor. Donec hendrerit nulla quis mi convallis, vitae pharetra metus lobortis. Duis eget arcu eu neque tempus ', 3),
(15, 'sdasdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam euismod mi, non lobortis justo porta nec. Nullam tincidunt at neque quis tempor. Donec hendrerit nulla quis mi convallis, vitae pharetra metus lobortis. Duis eget arcu eu neque tempus ', 3),
(17, 'sdasdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam euismod mi, non lobortis justo porta nec. Nullam tincidunt at neque quis tempor. Donec hendrerit nulla quis mi convallis, vitae pharetra metus lobortis. Duis eget arcu eu neque tempus ', 3),
(18, 'sdasdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam euismod mi, non lobortis justo porta nec. Nullam tincidunt at neque quis tempor. Donec hendrerit nulla quis mi convallis, vitae pharetra metus lobortis. Duis eget arcu eu neque tempus ', 3),
(19, 'sdasdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam euismod mi, non lobortis justo porta nec. Nullam tincidunt at neque quis tempor. Donec hendrerit nulla quis mi convallis, vitae pharetra metus lobortis. Duis eget arcu eu neque tempus ', 3),
(20, 'qq', 'qqq', 3.43),
(23, 'a', 'd', 3),
(24, 'sdas', 'dasdsadsad', 3),
(25, 'dfsdf', 'sdfsdf', 5),
(26, 'dsfsd', 'fsdfsdf', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
