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
