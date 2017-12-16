-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 01:24 PM
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
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `id` int(11) NOT NULL,
  `id_gov` int(20) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `house_type` text COLLATE utf8_unicode_ci NOT NULL,
  `rent` text COLLATE utf8_unicode_ci NOT NULL,
  `Monthly_income` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`id`, `id_gov`, `name`, `phone`, `house_type`, `rent`, `Monthly_income`) VALUES
(1, 1094906623, ' vvbfgfgf', 0, 'شقة', 'لا', '2000'),
(2, 1094906599, 'wqwqwq', 2555568, 'بيت', 'نعم', '12'),
(3, 23232323, 'dsds', 323232, 'بيت', 'نعم', '23');

-- --------------------------------------------------------

--
-- Table structure for table `detl_benef`
--

CREATE TABLE `detl_benef` (
  `id` int(11) NOT NULL,
  `id_govs` int(11) NOT NULL,
  `id_vo` int(11) NOT NULL,
  `help_type` text COLLATE utf8_unicode_ci NOT NULL,
  `helps_mon` text COLLATE utf8_unicode_ci NOT NULL,
  `statuses` text COLLATE utf8_unicode_ci NOT NULL,
  `end_helps` text COLLATE utf8_unicode_ci NOT NULL,
  `resoun` text COLLATE utf8_unicode_ci NOT NULL,
  `Notes` text COLLATE utf8_unicode_ci NOT NULL,
  `files_paths` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detl_benef`
--

INSERT INTO `detl_benef` (`id`, `id_govs`, `id_vo`, `help_type`, `helps_mon`, `statuses`, `end_helps`, `resoun`, `Notes`, `files_paths`) VALUES
(1, 23232323, 39, 'عينية', '1212', 'NO', '2017-12-12 23:27:29', 'صض', '', '../files/volun123232323ReportComp.pdf'),
(2, 23232323, 39, 'عينية', '1212', 'NO', '2017-12-12 23:27:29', 'صض', '', '../files/volun223232323ReportComp.pdf');

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
(23, 'علي فهد ', '', 'Paresnal', '', 'ترفيهي للاطفال', '055555556', '3', 'files/team_1my cv .pdf'),
(24, 'مشاري العنزي ', '', 'Paresnal', '', 'شرح مادة 222', '0568508989', '2', 'files/team_2ma.compressed.pdf'),
(25, 'فريق بيارق ', '', 'Paresnal', 'خدمة مجتمع', 'تصوير', '0568508989', '2', 'files/team_32017-03-01-PHOTO-00000018 (1).pdf'),
(26, 'فريق بسمة فرح ', '', 'Paresnal', 'ترفيهي', 'تقديم يوم مميز ترفيهي للأطفال ', '0568508989', '3', 'files/team_4ReportComp2.pdf'),
(27, 'جمعية احسان ', '39', 'company', '2323', 'zdssd', '', '221', 'files/team_resources.pdf');

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
(1, 'itahmad', 'it@le.c', '123', '202cb962ac59075b964b07152d234b70', 'it');

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
(3, 'h', 'pk'),
(4, 'team', 'خدمة مجتمع '),
(5, 'team', 'تعليمي '),
(6, 'team', 'ترفيهي'),
(7, 'team', 'تثقيفي ');

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `id` int(11) NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `option_name` text COLLATE utf8_unicode_ci NOT NULL,
  `Note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `type`, `option_name`, `Note`) VALUES
(1, 'help2', 'pk', ''),
(2, 'help', 'investment', ''),
(3, 'help', 'Personal', ''),
(4, 'voluntary', 'تعليمي ', ''),
(5, 'voluntary', 'ثقافي', ''),
(6, 'voluntary', 'ترفيهي ', ''),
(7, 'voluntary', 'رياضي ', '');

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
(3, 28, 'fddd', '2323243456565676778799', 'dsds', '2223'),
(4, 38, 'ghghh', '11111111111111', '1111111111111111', 'www'),
(5, 39, 'الراجحي', '45545454445444', '44444444445', '');

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
(33, 17, 39, 'احمد خالد ', '', '05685454', 'محمد خالد ', '0568508898', 'سي', 'Done', 'سي', '', '0000-00-00', 10000, 10000, 'Personal'),
(34, 17, 39, 'احمد خالد ', '', '05685454', '', '', 'توزيع الكسوة الشتتوية ', 'accept', '', '', '0000-00-00', 4000, 1000, 'investment');

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
(1, 'mod', 'aasaa@gml.k', '123', '1', '0568508989', '0000-00-00', '', 0),
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
(16, 'kahlad', 'kh@gmail.com', '123', '', '123', '0000-00-00', 'yes', 15),
(17, 'احمد خالد ', 'bbbb@bb.b', '202cb962ac59075b964b07152d234b70', '39', '05685454', '2017-12-06', '', 0);

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
(49, 'it@le.c', 'it', '202cb962ac59075b964b07152d234b70', ''),
(53, 'aaaa@aa.a', 'voluntray', '202cb962ac59075b964b07152d234b70', ''),
(54, 'bbbb@bb.b', 'user', '202cb962ac59075b964b07152d234b70', 'جمعية احسان ');

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
(39, 'جمعية احسان ', 'aaaa@aa.a', '202cb962ac59075b964b07152d234b70', 'جمعية خيرية تدعم الانسان ', '0165661179', 'عبدالرحمن', '../images/volurefaq.jpg', '2017-12-06', 'جمعية رفاق ', '');

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
(11, 'عبدالرحمن', 'مهندس برمجيات ', '../images/words_2017-03-01-PHOTO-00000018 (1).jpg', 'مجهود رائع ');

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
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_gov` (`id_gov`);

--
-- Indexes for table `detl_benef`
--
ALTER TABLE `detl_benef`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `option`
--
ALTER TABLE `option`
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
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detl_benef`
--
ALTER TABLE `detl_benef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `initiative`
--
ALTER TABLE `initiative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `it`
--
ALTER TABLE `it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kinds`
--
ALTER TABLE `kinds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pay_way`
--
ALTER TABLE `pay_way`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `requirestorder`
--
ALTER TABLE `requirestorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `userall`
--
ALTER TABLE `userall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `voluntarycomp`
--
ALTER TABLE `voluntarycomp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
