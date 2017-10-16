-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 01:06 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helping_peopel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `department` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `imagepath` text COLLATE utf8_unicode_ci NOT NULL,
  `Lastlogin` date NOT NULL,
  `dep` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `department`, `phone`, `email`, `password`, `imagepath`, `Lastlogin`, `dep`) VALUES
(1, 'Ahmad', 'maga', '66667666', 'aaa@aa.a', '1112', '', '0000-00-00', ''),
(3, 'ali', 'gov', '44545455666', 'sa@gov.sa', '123', '', '0000-00-00', 'yes'),
(4, 'fefe', 'dfdf', '4545453', 'aasa@gffd.n', '123', '', '0000-00-00', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`id`, `name`, `phone`, `des`, `type`) VALUES
(1, 'uuuui', '222232', 'ssdsxdss', 'waiting'),
(2, 'sfsf', '34234', 'xfxsf', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `initiative`
--

CREATE TABLE `initiative` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `id_voluntray` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `servestype` text COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `hours` text COLLATE utf8_unicode_ci NOT NULL,
  `filepath` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `initiative`
--

INSERT INTO `initiative` (`id`, `name`, `id_voluntray`, `type`, `servestype`, `des`, `phone`, `hours`, `filepath`) VALUES
(1, '1', '1', 'company', 'dsf', 'fsdfsf', '34343', '33', ''),
(2, 'ma.compressed.pdf', '', 'Paresnal', 'يبيبيب', 'يسيقبسيبقسيب', '343434', '3434', 'files/team_ma.compressed.pdf'),
(3, 'wewewew', '', 'Paresnal', 'regfgf', '34erwser', '434343', '22', 'files/team_ma.compressed.pdf'),
(4, 'wewewew', '', 'Paresnal', 'regfgf', '34erwser', '434343', '22', 'files/team_ma.compressed.pdf'),
(5, 'hfyrty', '', 'Paresnal', 'fgdfsgdsg', 'fhfghfdhg', '121213', '3', 'files/team_Scan.pdf'),
(6, 'hfyrty', '', 'Paresnal', 'fgdfsgdsg', 'fhfghfdhg', '121213', '3', 'files/team_Scan.pdf'),
(7, 'hfyrty', '', 'Paresnal', 'fgdfsgdsg', 'fhfghfdhg', '121213', '3', 'files/team_Scan.pdf'),
(8, 'fsdfsdf', '', 'Paresnal', 'rgrfg', 'ewrdfs', '32323', 'dfs', 'files/team_ReportComp2.pdf'),
(9, 'fsdfsdf', '', 'Paresnal', 'rgrfg', 'ewrdfs', '32323', 'dfs', 'files/team_ReportComp2.pdf'),
(10, 'fsdfsdf', '', 'Paresnal', 'rgrfg', 'ewrdfs', '32323', 'dfs', 'files/team_ReportComp2.pdf'),
(11, 'fsdfsdf', '', 'Paresnal', 'rgrfg', 'ewrdfs', '32323', 'dfs', 'files/team_ReportComp2.pdf'),
(12, 'fsdfsdf', '', 'Paresnal', 'rgrfg', 'ewrdfs', '32323', 'dfs', 'files/team_ReportComp2.pdf'),
(13, 'dsfsdfsd', '1', 'company', '34', 'dxsfdxsf', '343434', '4343', 'files/team_Scan.pdf'),
(14, 'dsfsdfsd', '1', 'company', '34', 'dxsfdxsf', '343434', '4343', 'files/team_Scan.pdf'),
(15, 'dfdf', '1', 'company', 'dfdf', 'cvgdcfgdfgdfgd', '4545', '4', 'files/team_ReportComp2.pdf'),
(16, 'ghgfhfgh', '1', 'company', 'fbvhgfhfg', 'hfhghghcf', 'tyfyghfg', '5t', 'files/team_ma.compressed.pdf'),
(17, 'ghgfhfgh', '1', 'company', 'fbvhgfhfg', 'hfhghghcf', 'tyfyghfg', '5t', 'files/team_ma.compressed.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `it`
--

CREATE TABLE `it` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `department` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `it`
--

INSERT INTO `it` (`id`, `name`, `email`, `phone`, `password`, `department`) VALUES
(1, 'itahmad', 'it@le.c', '123', '123', 'it');

-- --------------------------------------------------------

--
-- Table structure for table `kinds`
--

CREATE TABLE `kinds` (
  `id` int(11) NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kinds`
--

INSERT INTO `kinds` (`id`, `type`, `name`) VALUES
(1, 'h', 'Personal'),
(2, 'h', 'investment'),
(3, 'h', 'pk');

-- --------------------------------------------------------

--
-- Table structure for table `pay_way`
--

CREATE TABLE `pay_way` (
  `id` int(11) NOT NULL,
  `id_voluntray` int(11) NOT NULL,
  `bankNmae` text COLLATE utf8_unicode_ci NOT NULL,
  `AccountNumber` text COLLATE utf8_unicode_ci NOT NULL,
  `IBAN` text COLLATE utf8_unicode_ci NOT NULL,
  `descr` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pay_way`
--

INSERT INTO `pay_way` (`id`, `id_voluntray`, `bankNmae`, `AccountNumber`, `IBAN`, `descr`) VALUES
(1, 1, '554r', '33336565656855', 'r44', '54'),
(2, 33, 'sdsds', '2323243456565676778799', 'sa2323453423', 'ddx'),
(3, 28, 'fddd', '2323243456565676778799', 'dsds', '2223');

-- --------------------------------------------------------

--
-- Table structure for table `requirestorder`
--

CREATE TABLE `requirestorder` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_voluntray` int(50) NOT NULL,
  `name_voluntray` text COLLATE utf8_unicode_ci NOT NULL,
  `name_applay` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_applay` text COLLATE utf8_unicode_ci NOT NULL,
  `name_po` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone_po` text COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `resoun` text COLLATE utf8_unicode_ci NOT NULL,
  `dates` date NOT NULL,
  `goal` int(11) NOT NULL,
  `havemo` int(11) NOT NULL,
  `Type` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requirestorder`
--

INSERT INTO `requirestorder` (`id`, `id_user`, `id_voluntray`, `name_voluntray`, `name_applay`, `phone_applay`, `name_po`, `phone_po`, `des`, `status`, `location`, `resoun`, `dates`, `goal`, `havemo`, `Type`) VALUES
(1, 1, 1, 'wr', '33333', '55555', '333', '3333', '3333', 'Done', '3333', '', '2017-09-09', 3000, 3000, 'pk'),
(2, 1, 1, 'wr', 'wewe', '222222', 'wqwqwq', '22222', '22wwws', 'accept', '33333', '', '2017-09-09', 0, 0, ''),
(4, 1, 1, 'wr', 'fff', '333', 'fe', '333', 'eeee', 'accept', 'fff', '', '2017-09-09', 0, 0, ''),
(10, 1, 1, 'wr', 'eed', 'dds', '2df', '333', 'eedde2', 'accept', '222', '', '2017-09-09', 3333, 1500, ''),
(11, 1, 1, 'mod', '', '0568508989', 'ddddw', '33', 'iiiiiiiiiiiii', 'accept', '54', '', '0000-00-00', 0, 0, ''),
(12, 1, 1, 'mod', '', '0568508989', 'eeee3ee3eer', '3333332', 'fffc', 'accept', 'fccccccc', '', '0000-00-00', 400000, 30000, ''),
(13, 1, 1, 'wr', '555t', '55555', 'ttttttttttttttttttttttt', '5555555555555555555', 'ttttttttttttttttt', 'accept', 'gggggggggggg', '', '2017-09-12', 3333, 1902, ''),
(14, 1, 1, 'mod', '', '0568508989', 'dw', '2', 'dw', 'accept', 'dw', '', '0000-00-00', 99, 9, ''),
(15, 1, 1, 'wr', '3334', '3434', 'eeee222222222ed', '232323', 'ddffdd', 'accept', '444444', '', '2017-09-14', 3333, 333, ''),
(17, 1, 1, 'wr', '2323', '2222', 'eqeqe', '222221', 'ssss', 'accept', 'wewe', '', '2017-09-14', 222, 32, ''),
(18, 1, 1, 'wr', '2323', '32323', 'tesyttt', '3232', 'wsewewse', 'accept', '44444', '', '2017-09-14', 2223, 222, ''),
(19, 1, 1, 'wr', '32323', '32323', 'cd', 'dddc', 'ssdss', 'not accept', 'ssssd', 'dont care', '2017-09-14', 0, 0, ''),
(20, 1, 1, 'wr', '2232332', '333323', '33232wd', '222', 'wewe', 'accept', 'we', '', '2017-09-14', 333, 33, ''),
(21, 1, 1, 'wr', 'gf', '444', '444trg', '444', '4444', 'Done', 'rrrr', '', '2017-09-14', 3334, 3334, ''),
(22, 1, 1, 'mod', '', '0568508989', '12', '12', '12', 'not accept', '12', '', '0000-00-00', 12, 555, ''),
(23, 5, 28, 'wwwwwwwwwewwefv', 'sdsfggbb', '1234', 'sdasasffdfccsdw', '9999899382', 'dsds', 'accept', 'sdesd', '', '2017-09-26', 10000, 500, ''),
(24, 6, 33, 'qqqwqqasdccdvvkvfk', '3333', '33333', 'ايجار', '589656', 'عائلة متعففه ', 'accept', 'حائل', '', '2017-10-04', 15000, 11000, 'investment'),
(25, 2, 8, 'eeefded', '', '33332', 'محمد خالد', '056889895', 'سجين دين بمبلغ 50000', 'accept', 'حائل', '', '0000-00-00', 50000, 15000, ''),
(26, 0, 0, '', 'dsfsfs', '232132', 'dfdfeefew', '22232113', 'sfsfsdaf', 'accept', 'sdfsdf', '', '2017-10-08', 0, 0, 'Personal'),
(27, 14, 0, 'ali', 'zsdszd', '1212', 'sadsadsad', '12121212', '\\zdsadsaz\\dasd', 'waiting', 'sdsaD\\zd', '', '2017-10-08', 0, 0, 'Personal'),
(28, 1, 0, '', '', '0568508989', 'علي', '', 'سجين ', 'Done', '', '', '0000-00-00', 150000, 150000, 'pk'),
(29, 14, 0, 'ali', '232', '32', 'dsadsa', '32323', 'asas', 'waiting', '323s', '', '2017-10-10', 0, 0, 'Personal'),
(30, 0, 0, '', 'sad', '23', 'sada', '231', 'asd', 'new', 'asd', '', '2017-10-12', 0, 0, 'Personal'),
(31, 15, 0, '', '', '123', 'خالد فهد', '', 'سجين دين ', 'accept', '', '', '0000-00-00', 10000, 5000, 'pk');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `id_voluntray` int(11) NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `role` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `id_voluntray`, `des`, `status`, `id_user`, `role`) VALUES
(1, 1, 'dfdfdf', 'solved', 1, 'admin'),
(2, 1, 'dvdsfdf', 'solved', 1, 'voluntray'),
(3, 6, 'sdsd', 'solved', 6, 'voluntray'),
(4, 15, 'dfsfsf', 'solved', 16, 'user'),
(5, 28, 'sd', 'solved', 5, 'user'),
(6, 28, 'sd', 'solved', 5, 'user'),
(7, 28, 'ftdfd', 'solved', 5, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `id_voluntary` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `Lastlogin` date NOT NULL,
  `dep` text COLLATE utf8_unicode_ci NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `id_voluntary`, `phone`, `Lastlogin`, `dep`, `id_admin`) VALUES
(1, 'mod', 'aasaa@gml.k', '123', '1', '0568508989', '0000-00-00', 'yes', 0),
(2, 'eeefded', 'dddss@gans.cx', '123', '8', '33332', '0000-00-00', '', 0),
(3, 'A1', 'a1@hotmail.com', 'Aa123456', '27', '123', '0000-00-00', '', 0),
(5, 'saw', 'saw3@s.com', '123', '28', '22323', '0000-00-00', '', 0),
(6, 'sak', 'ask@abdxax.com', '123', '33', '1233', '0000-00-00', '', 0),
(7, 'wsf', 'wsswsddf@g.ck', '123', '33', '22232', '0000-00-00', '', 0),
(11, 'fahad', 'fa@gov.sa', '123', '', '1232', '0000-00-00', 'yes', 3),
(12, 'ja1', 'aljarallahabdulrahman@gmail.com', '123', '', '05685089898', '0000-00-00', 'yes', 3),
(13, 'Ali@gov.sa', 'Ali@gov.sa', '123', '', '3434', '0000-00-00', 'yes', 3),
(14, 'fahads', 'fs@gov.sa', '123', '', '123', '0000-00-00', 'yes', 3),
(15, 'saad', 'sad@gov.sa', '123', '', '123', '0000-00-00', 'yes', 14),
(16, 'kahlad', 'kh@gmail.com', '123', '', '123', '0000-00-00', 'yes', 15);

-- --------------------------------------------------------

--
-- Table structure for table `userall`
--

CREATE TABLE `userall` (
  `id` int(11) NOT NULL,
  `email` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `role` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `volcom` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userall`
--

INSERT INTO `userall` (`id`, `email`, `role`, `password`, `volcom`) VALUES
(1, 'aaa@aa.a', 'admin', '1112', ''),
(2, 'wre@m.o', 'voluntray', '123', ''),
(3, 'aasaa@gml.k', 'user', '123', 'wr'),
(4, 'fahd@gma.il.com', 'voluntray', '123', ''),
(5, 'rrr@rrr.l', 'voluntray', '444', ''),
(6, 'ddd@ff.com', 'voluntray', '123456', ''),
(7, 'a@dd.com', 'voluntray', '123', ''),
(8, 'ww@we.w', 'voluntray', '123', ''),
(9, 'wddw@cc.com', 'voluntray', '123', ''),
(10, 'ee3ee@w.x', 'voluntray', '123', ''),
(11, 'dddss@gans.cx', 'user', '123', '2rre'),
(12, 'wwwe@wwwe.c', 'voluntray', '123', ''),
(13, 'asasas@wwew.k', 'voluntray', '123', ''),
(14, 'qdqdqdq@xxx.k', 'voluntray', '123', ''),
(16, 'sallxx1@gmail.com', 'voluntray', '123', ''),
(24, 'aishah-almaghrabi@hotmail.com', 'voluntray', 'Aa123456', ''),
(26, 'wwedfgnhnhn@f.com', 'voluntray', '1234', ''),
(30, 'abdxax@gmail.com', 'voluntray', '123', ''),
(32, 'saw3@s.com', 'user', '123', 'wwwwwwwwwewwefv'),
(33, 'ask@abdxax.com', 'user', '123', 'qqqwqqasdccdvvkvfk'),
(34, 'wsswsddf@g.ck', 'user', '123', 'qqqwqqasdccdvvkvfk'),
(42, 'fa@gov.sa', 'voluntray', '123', ''),
(43, 'aljarallahabdulrahman@gmail.com', 'voluntray', '123', ''),
(44, 'sa@gov.sa', 'admin', '123', ''),
(45, 'Ali@gov.sa', 'user', '123', ''),
(46, 'fs@gov.sa', 'user', '123', ''),
(47, 'sad@gov.sa', 'user', '123', ''),
(48, 'kh@gmail.com', 'user', '123', ''),
(49, 'it@le.c', 'it', '123', ''),
(50, 'aasa@gffd.n', 'admin', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `voluntarycomp`
--

CREATE TABLE `voluntarycomp` (
  `id` int(11) NOT NULL,
  `name_voluntray` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `descri` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `manage_name` text COLLATE utf8_unicode_ci NOT NULL,
  `imagepath` text COLLATE utf8_unicode_ci NOT NULL,
  `Lastlogin` date NOT NULL,
  `createby` text COLLATE utf8_unicode_ci NOT NULL,
  `website` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voluntarycomp`
--

INSERT INTO `voluntarycomp` (`id`, `name_voluntray`, `email`, `password`, `descri`, `phone`, `manage_name`, `imagepath`, `Lastlogin`, `createby`, `website`) VALUES
(1, 'wr', 'wre@m.o', '123', 'pld', '232323', 'dddyuhhjh', '../images/wrinfo1-1.png', '2017-10-04', 'Ahmad', 'www.wr.c'),
(3, '444rrrrr', 'rrr@rrr.l', '444', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(5, 'صيص', 'ddd@ff.com', '123456', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(7, 'ww', 'a@dd.com', '123', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(8, '2rre', 'ww@we.w', '123', 'dcdcd', '5554', 'dcdc', '../images/2rreuoh.jpg', '2017-10-04', 'Ahmad', 'ddd'),
(10, 'ص', 'wddw@cc.com', '123', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(12, '3e', 'ee3ee@w.x', '123', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(13, 'dffdf', 'wwwe@wwwe.c', '123', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(14, 'sdsdds', 'asasas@wwew.k', '123', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(15, 'xwxdffdf', 'qdqdqdq@xxx.k', '123', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(17, 'سلطان ', 'sallxx1@gmail.com', '123', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(28, 'wwwwwwwwwewwefv', 'ewe@ggg.v', '1234', 'dfdffdsggnb', '33333', '3333dfdfscv', '../images/wwwwwwwwwewwefvpo.png', '2017-10-04', 'Ahmad', ''),
(33, 'qqqwqqasdccdvvkvfk', 'abdxax@gmail.com', '123', 'sssssssssssssddddddddd', '3333333', 'ddddsddsd', '../images/qqqwqqasdccdvvkvfkid_gov_pdf-1.png', '2017-10-04', 'Ahmad', 'erere@gmail.com'),
(35, 'hhghghgshsg', 'xaxbad@gmail.com', '123', '', '', '', '', '0000-00-00', 'Ahmad', ''),
(36, 'dfddfdf', 'aljarallahabdulrahman@gmail.com', '123', '', '', '', '', '0000-00-00', 'Ahmad', '');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `postion` text COLLATE utf8_unicode_ci NOT NULL,
  `imagepath` text COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `name`, `postion`, `imagepath`, `des`) VALUES
(1, 'wwewew', 'ewewewe', '../images/2rreuoh.jpg', 'شاكرين لهم جهودهم و املين من الله التوفيق لهم و كتب الله اجرهم و غفر الله ذنبهم و جزاهم الله خير عن كل افراج كربة للمحتاج و الله ةلي التةفيق '),
(2, 'sdfdf', 'fdyhfdtyfd', '../images/wrinfo1-1.png', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `initiative`
--
ALTER TABLE `initiative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it`
--
ALTER TABLE `it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinds`
--
ALTER TABLE `kinds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_way`
--
ALTER TABLE `pay_way`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_voluntray` (`id_voluntray`);

--
-- Indexes for table `requirestorder`
--
ALTER TABLE `requirestorder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_po` (`name_po`),
  ADD UNIQUE KEY `name_po_2` (`name_po`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userall`
--
ALTER TABLE `userall`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `voluntarycomp`
--
ALTER TABLE `voluntarycomp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_voluntray` (`name_voluntray`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `initiative`
--
ALTER TABLE `initiative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `it`
--
ALTER TABLE `it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kinds`
--
ALTER TABLE `kinds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pay_way`
--
ALTER TABLE `pay_way`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `requirestorder`
--
ALTER TABLE `requirestorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `userall`
--
ALTER TABLE `userall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `voluntarycomp`
--
ALTER TABLE `voluntarycomp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
