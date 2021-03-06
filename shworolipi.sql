-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 07:06 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shworolipi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `song_id` int(6) NOT NULL,
  `playlist_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`song_id`, `playlist_id`) VALUES
(0, 49),
(0, 76),
(0, 78),
(0, 79),
(0, 83),
(0, 87),
(0, 88),
(1, 0),
(1, 16),
(1, 48),
(1, 50),
(1, 58),
(1, 60),
(1, 61),
(1, 64),
(1, 65),
(1, 70),
(1, 90),
(1, 91),
(1, 96),
(1, 97),
(1, 99),
(1, 115),
(1, 117),
(1, 118),
(2, 0),
(2, 16),
(2, 43),
(2, 50),
(2, 53),
(2, 58),
(2, 60),
(2, 66),
(2, 90),
(2, 91),
(2, 92),
(2, 96),
(2, 105),
(2, 112),
(2, 113),
(2, 115),
(2, 117),
(2, 118),
(2, 120),
(3, 43),
(3, 49),
(3, 53),
(3, 58),
(3, 61),
(3, 63),
(3, 65),
(3, 68),
(3, 70),
(3, 91),
(3, 92),
(3, 96),
(3, 99),
(3, 112),
(3, 117),
(3, 119),
(4, 0),
(4, 16),
(4, 49),
(4, 50),
(4, 60),
(4, 61),
(4, 63),
(4, 64),
(4, 66),
(4, 68),
(4, 96),
(4, 97),
(4, 100),
(4, 105),
(4, 117),
(4, 120),
(5, 49),
(5, 64),
(6, 63),
(7, 66),
(7, 70),
(8, 63),
(8, 97),
(9, 0),
(9, 16),
(9, 53),
(9, 97),
(10, 49),
(10, 63),
(11, 63),
(11, 96),
(11, 120),
(12, 96),
(13, 53),
(15, 49),
(15, 117),
(16, 54),
(16, 117),
(17, 53),
(17, 54),
(18, 16),
(18, 53),
(18, 54),
(19, 49),
(19, 53),
(21, 61),
(22, 49),
(23, 49),
(24, 49),
(24, 97),
(25, 66),
(27, 59),
(27, 61),
(27, 96),
(28, 59),
(28, 61),
(29, 53),
(29, 59),
(48, 50);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(6) NOT NULL,
  `email_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email_address`, `password`, `name`) VALUES
(1, 'shworolipi1001@gmail.com', 'skylark', 'নিশাত তাসনিম নিলয়'),
(2, 'shworolipi1002@gmail.com', 'skylark', 'আকিব আজমাঈন ');

-- --------------------------------------------------------

--
-- Table structure for table `creates`
--

CREATE TABLE `creates` (
  `member_id` int(6) NOT NULL,
  `playlist_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deletes`
--

CREATE TABLE `deletes` (
  `song_ID` int(6) NOT NULL,
  `admin_ID` int(6) NOT NULL,
  `title_Bengali` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `artist` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `popularity` int(6) NOT NULL,
  `mood` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deletes`
--

INSERT INTO `deletes` (`song_ID`, `admin_ID`, `title_Bengali`, `artist`, `genre`, `popularity`, `mood`) VALUES
(3, 2, 'আমার পরাণ যাহা চায়', 'ইন্দ্রাণী সেন', 'রবীন্দ্রসঙ্গীত', 3, 'প্রেম,');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(6) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `email`, `password`, `name`, `date_of_birth`, `gender`, `phone_number`, `hash`, `active`) VALUES
(1, 'test@gmail.com', '35da272a34fb216670e69fc079888697', 'আকিব', '1996-10-03', 'পুরুষ', '01762534251', '38913e1d6a7b94cb0f55994f679f5956', 1),
(24, 'aminiloynishat@gmail.com', 'iit123', '', '0000-00-00', '', NULL, '9b70e8fe62e40c570a322f1b0b659098', 1),
(29, 'redoykhan555@gmail.com', '12345678', '', '0000-00-00', '', NULL, '99c5e07b4d5de9d18c350cdf64c5aa3d', 1),
(32, 'test2@gmail.com', 'test', '', '0000-00-00', '', NULL, 'cfcd208495d565ef66e7dff9f98764da', 1),
(44, 'test3@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', '', '0000-00-00', '', NULL, '39059724f73a9969845dfe4146c5660e', 0),
(46, 'aquibazmain123@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', '', '0000-00-00', 'পুরুষ', '', 'fbd7939d674997cdb4692d34de8633c4', 1),
(47, 'bsse0718@iit.du.ac.bd', '35fa51c1439c7c5ce5a0d563a410bda9', 'আকিব', '2016-12-06', 'পুরুষ', '০১৮', '17e62166fc8586dfa4d1bc0e1742c08b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mood`
--

CREATE TABLE `mood` (
  `song_id` int(6) NOT NULL,
  `mood_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mood`
--

INSERT INTO `mood` (`song_id`, `mood_name`) VALUES
(0, 'আনন্দ'),
(0, 'উৎসব'),
(0, 'প্রেম'),
(0, 'বৃষ্টি'),
(0, 'ভক্তি'),
(2, 'আনন্দ'),
(2, 'সকাল'),
(4, 'প্রেম'),
(5, 'প্রেম'),
(6, 'প্রেম'),
(6, 'ভক্তি'),
(7, 'প্রেম'),
(7, 'বৃষ্টি'),
(8, 'আনন্দ'),
(10, 'বৃষ্টি'),
(11, 'আনন্দ'),
(11, 'বৃষ্টি'),
(12, 'প্রেম'),
(12, 'রজনী'),
(13, 'বিরহ'),
(14, 'প্রেম'),
(14, 'বিরহ'),
(15, 'প্রেম'),
(15, 'রজনী'),
(17, 'প্রেম'),
(18, 'প্রেম'),
(19, 'বিরহ'),
(20, 'বিরহ'),
(21, 'ভক্তি'),
(22, 'ভক্তি'),
(23, 'প্রেম'),
(25, 'বিরহ'),
(27, 'রজনী'),
(29, 'বৃষ্টি'),
(29, 'রজনী'),
(30, 'প্রেম'),
(34, 'প্রেম'),
(34, 'বিরহ'),
(41, 'প্রেম'),
(41, 'বৃষ্টি'),
(42, 'উৎসব'),
(43, 'বিয়ে'),
(46, 'প্রেম'),
(46, 'বিরহ'),
(47, 'প্রেম'),
(47, 'রজনী'),
(48, 'আনন্দ'),
(48, 'উৎসব'),
(49, 'প্রেম'),
(49, 'ভক্তি');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `playlist_id` int(6) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`playlist_id`, `name`, `member_id`) VALUES
(21, 'আমার গান', 2),
(22, 'আমার ভালোলাগা', 24),
(49, 'রবীন্দ্র-১', 1),
(53, 'রবীন্দ্র-২', 1),
(54, 'নজরুল', 1),
(58, 'মন খারাপের মনে', 1),
(59, 'ধ্বংস', 1),
(60, 'আনন্দের মনে', 1),
(62, 'আমার পছন্দ', 1),
(64, 'hellop', 29),
(66, 'পছন্দ-১', 1),
(70, 'আমার গান', 47);

-- --------------------------------------------------------

--
-- Table structure for table `remove`
--

CREATE TABLE `remove` (
  `admin_id` int(6) NOT NULL,
  `member_id` int(6) NOT NULL,
  `email_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `reason` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `remove`
--

INSERT INTO `remove` (`admin_id`, `member_id`, `email_address`, `reason`) VALUES
(2, 2, 'test2@gmail.com', ''),
(2, 4, 'test3@gmail.com', ''),
(2, 7, 'test4@gmail.com', ''),
(2, 14, 'test3@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `song_id` int(6) NOT NULL,
  `title_English` varchar(50) CHARACTER SET latin1 NOT NULL,
  `title_Bengali` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `artist` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `lyric` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `popularity` int(6) NOT NULL,
  `mood` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`song_id`, `title_English`, `title_Bengali`, `artist`, `genre`, `lyric`, `popularity`, `mood`, `admin_id`) VALUES
(1, 'aguner poroshmoni.mp3', 'আগুনের পরশমণি ছোঁয়াও প্রাণে', 'শ্রীকান্ত আচার্য্য', 'রবীন্দ্রসঙ্গীত', 'আগুনের পরশমণি ছোঁয়াও প্রাণে।\r\nএ জীবন পুণ্য কর দহন-দানে॥\r\nআমার এই দেহখানি তুলে ধরো,\r\nতোমার ওই দেবালয়ের প্রদীপ করো--\r\nনিশিদিন আলোক-শিখা জ্বলুক গানে॥\r\nআঁধারের গায়ে গায়ে পরশ তব\r\nসারা রাত ফোটাক তারা নব নব।\r\nনয়নের দৃষ্টি হতে ঘুচবে কালো,\r\nযেখানে পড়বে সেথায় দেখবে আলো--\r\nব্যথা মোর উঠবে জ্বলে ঊর্ধ্ব-পানে॥', 5, 'ভক্তি,', 2),
(2, 'alo amar alo.mp3', 'আলো আমার আলো', 'ইন্দ্রাণী সেন', 'রবীন্দ্রসঙ্গীত', 'আলো আমার, আলো ওগো, আলো ভুবন-ভরা।\r\nআলো নয়ন-ধোওয়া আমার, আলো হৃদয়-হরা॥\r\nনাচে আলো নাচে, ও ভাই,    আমার প্রাণের কাছে--\r\nবাজে আলো বাজে, ও ভাই    হৃদয়বীণার মাঝে--\r\nজাগে আকাশ, ছোটে বাতাস, হাসে সকল ধরা॥\r\nআলোর স্রোতে পাল তুলেছে হাজার প্রজাপতি।\r\nআলোর ঢেউয়ে উঠল নেচে মল্লিকা মালতী।\r\nমেঘে মেঘে সোনা, ও ভাই,    যায় না মানিক গোনা--\r\nপাতায় পাতায় হাসি, ও ভাই,    পুলক রাশি রাশি--\r\nসুরনদীর কূল ডুবেছে সুধা-নিঝর-ঝরা॥', 18, 'আনন্দ,সকাল,', 2),
(3, 'amaro porano jaha chay.mp3', 'আমার পরাণ যাহা চায়', 'ইন্দ্রাণী সেন', 'রবীন্দ্রসঙ্গীত', 'আমার পরাণ যাহা চায়\r\nতুমি তাই তুমি তাই গো।\r\n\r\nতোমা ছাড়া আর এ জগতে\r\nমোর কেহ নাই, কিছু নাই গো।।\r\n\r\nতুমি সুখ যদি নাহি পাও\r\nযাও, সুখের সন্ধানে যাও\r\nআমি তোমারে পেয়েছি হৃদয়মাঝে\r\nআর কিছু নাহি চাই গো।।\r\n\r\nআমি তোমার বিরহে রহিব বিলীন\r\nতোমাতে করিব বাস\r\nদীর্ঘ দিবস, দীর্ঘ রজনী\r\nদীর্ঘ বরষ মাস।\r\n\r\nযদি আর-কারে ভালোবাস\r\nযদি আর ফিরে নাহি আস\r\nতবে তুমি যাহা চাও তাই যেন পাও\r\nআমি যত দুখ পাই গো।।', 1, 'প্রেম,', 2),
(4, 'bhalobashi bhalobashi.mp3', 'ভালোবাসি ভালোবাসি', 'ইন্দ্রাণী সেন', 'রবীন্দ্রসঙ্গীত', 'ভালোবাসি ভালোবাসি\r\nএই সুরে কাছে দূরে জলে স্থলে বাজায়\r\nবাজায় বাঁশি\r\nভালোবাসি ভালোবাসি\r\nআকাশে কার বুকের মাঝে ব্যথা বাজে\r\nদিগন্তে কার কালো আঁখি\r\nআঁখির জলে যায় ভাসি\r\nভালোবাসি\r\nভালোবাসি ভালোবাসি\r\nসেই সূরে সাগর কূলে বাঁধন খুলে\r\nঅতল রোদন উঠে দুলে\r\nসেই সূরে সাগর কূলে বাঁধন খুলে\r\nঅতল রোদন উঠে দুলে\r\nসেই সুরে বাজে মনে অকারনে\r\nভুলে যাওয়া গানের বাণী\r\nভোলা দিনের কাঁদন\r\nকাঁদন হাসি\r\nভালোবাসি ভালোবাসি\r\nভালোবাসি ভালোবাসি!!\r\nএই সুরে কাছে দূরে জলে স্থলে বাজায়\r\nবাজায় বাঁশি\r\nভালোবাসি ভালোবাসি …', 5, 'প্রেম,', 2),
(5, 'bhalobeshe shokhi nribhito jotone.mp3', 'ভালোবেসে সখী নিভৃতে যতনে', 'শান', 'রবীন্দ্রসঙ্গীত', 'ভালোবেসে সখী নিভৃতে যতনে\r\nআমার নামটি লিখো– তোমার\r\nমনের মন্দিরে।\r\n\r\nআমার পরানে যে গান বাজিছে\r\nতাহার তালটি শিখো– তোমার\r\nচরণমঞ্জীরে।।\r\n\r\nধরিয়া রাখিয়ো সোহাগে আদরে\r\nআমার মুখর পাখি– তোমার\r\nপ্রাসাদপ্রাঙ্গণ।।\r\n\r\nমনে ক’রে সখী, বাঁধিয়া রাখিয়ো\r\nআমার হাতের রাখী– তোমার\r\nকনককঙ্কণে॥\r\n\r\nআমার লতার একটি মুকুল\r\nভুলিয়া তুলিয়া রেখো– তোমার\r\nঅলকবন্ধনে।\r\n\r\nআমার স্মরণ শুভ-সিন্দুরে\r\nএকটি বিন্দু এঁকো– তোমার\r\nললাটচন্দনে।\r\n\r\nআমার মনের মোহের মাধুরী\r\nমাখিয়া রাখিয়া দিয়ো– তোমার\r\nঅঙ্গসৌরভে।\r\n\r\nআমার আকুল জীবনমরণ\r\nটুটিয়া লুটিয়া নিয়ো– তোমার\r\nঅতুল গৌরব।।', 3, 'প্রেম,', 2),
(6, 'chokher aloy dekhechhilem.mp3', 'চোখের আলোয় দেখেছিলেম', 'ইন্দ্রাণী সেন', 'রবীন্দ্রসঙ্গীত', 'চোখের আলোয় দেখেছিলেম চোখের বাহিরে।\r\nঅন্তরে আজ দেখব, যখন আলোক নাহি রে।।\r\nধরায় যখন দাও না ধরা\r\nহৃদয় তখন তোমায় ভরা।।\r\n\r\nএখন তোমার আপন আলোয় তোমায় চাহি রে।।\r\nচোখের আলোয় দেখেছিলেম চোখের বাহিরে।\r\n\r\nতোমায় নিয়ে খেলেছিলেম খেলার ঘরেতে\r\nখেলার পুতুল ভেঙে গেছে প্রলয় ঝড়েতে।।\r\n\r\nথাক তবে সেই কেবল খেলা,\r\nহোক-না এখন প্রাণের মেলা ।।\r\n\r\nতারের বীণা ভাঙল, হৃদয়-বীণায় গাহি রে।\r\nচোখের আলোয় দেখেছিলেম চোখের বাহিরে।\r\nঅন্তরে আজ দেখব, যখন আলোক নাহি রে।', 2, 'প্রেম,ভক্তি,', 2),
(7, 'ei meghla dine ekla.mp3', 'এই মেঘলা দিনে একলা', 'হেমন্ত মুখোপাধ্যায়', 'রবীন্দ্রসঙ্গীত', 'এই মেঘলা দিনে একলা\r\nঘরে থাকেনা তো মন\r\nকাছে যাবো কবে পাবো\r\nওগো তোমার নিমন্ত্রণ।।\r\n\r\nযুঁথী বনে ঐ হাওয়া\r\nকরে শুধু আসা যাওয়া।\r\n\r\nহায় হায়রে দিন যায়রে\r\nভরে আঁধারে ভুবন\r\nকাছে যাবো কবে পাবো\r\nওগো তোমার নিমন্ত্রণ।।\r\n\r\nশুধু ঝরে ঝর ঝর\r\nআজ বারি সারাদিন\r\nআজ যেন মেঘে মেঘে\r\nহলো মন যে উদাসীন।\r\n\r\nআজ আমি ক্ষণে ক্ষণে\r\nকি যে ভাবি আনমনে।\r\n\r\nতুমি আসবে ওগো হাসবে\r\nকবে হবে সে মিলন\r\nকাছে যাবো কবে পাবো\r\nওগো তোমার নিমন্ত্রণ।।', 2, 'প্রেম,বৃষ্টি,', 2),
(8, 'ektuku chhoa lage.mp3', 'একটুকু ছোঁয়া লাগে', 'শ্রীকান্ত আচার্য্য', 'রবীন্দ্রসঙ্গীত', 'একটুকু ছোঁয়া লাগে\r\nএকটুকু কথা শুনি\r\nতাই দিয়ে মনে মনে\r\nরচি মম ফাল্গুনি ।।\r\n\r\nএকটুকু ছোঁয়া লাগে একটুকু কথা শুনি।\r\n\r\nকিছু পলাশের নেশা\r\nকিছু বা চাঁপায় মেশা।।\r\nতাই দিয়ে সুরে সুরে\r\nরঙে রসে জাল বুনি।।\r\nরচি মম ফাল্গুনি।\r\n\r\nএকটুকু ছোঁয়া লাগে\r\nএকটুকু কথা শুনি।\r\n\r\nযেটুকু কাছেতে আসে ক্ষণিকের ফাঁকে ফাঁকে\r\nচকিত মনের কোণে স্বপনের ছবি আঁকে ।।\r\nযেটুকু যায়রে দূরে\r\nভাবনা কাঁপায় সুরে।।\r\nতাই নিয়ে যায় বেলা\r\nনূপুরের তাল গুনি ।।\r\nরচি মম ফাল্গুনি।\r\n\r\nএকটুকু ছোঁয়া লাগে\r\nএকটুকু কথা শুনি\r\nতাই দিয়ে মনে মনে\r\nরচি মম ফাল্গুনি ।।', 1, 'আনন্দ,', 2),
(9, 'jokhon porbena mor payer chinho.mp3', 'যখন পড়বে না মোর পায়ের চিহ্ন', 'হেমন্ত মুখোপাধ্যায়', 'রবীন্দ্রসঙ্গীত', 'যখন পড়বে না মোর পায়ের চিহ্ন এই বাটে,\r\nআমি বাইব না মোর খেয়াতরী এই ঘাটে,\r\nচুকিয়ে দেব বেচা কেনা,\r\nমিটিয়ে দেব গো, মিটিয়ে দেব লেনাদেনা,\r\nবন্ধ হবে আনাগোনা এই হাটে-\r\nতখন আমায় নাইবা মনে রাখলে,\r\nতারার পানে চেয়ে চেয়ে নাইবা আমায় ডাকলে\r\n\r\nযখন জমবে ধূলা তানপুরাটার তারগুলায়,\r\nকাঁটালতা উঠবে ঘরের দ্বারগুলায়, আহা,\r\nফুলের বাগান ঘন ঘাসের পরবে সজ্জা বনবাসের,\r\nশ্যাওলা এসে ঘিরবে দিঘির ধারগুলায়-\r\nতখন আমায় নাইবা মনে রাখলে,\r\nতারার পানে চেয়ে চেয়ে নাইবা আমায় ডাকলে\r\n\r\nতখন এমনি করেই বাজবে বাঁশি এই নাটে,\r\nকাটবে দিন কাটবে,\r\nকাটবে গো দিন আজও যেমন দিন কাটে, আহা,\r\nঘাটে ঘাটে খেয়ার তরী এমনি সে দিন উঠবে ভরি-\r\nচরবে গরু খেলবে রাখাল ওই মাঠে.\r\nতখন আমায় নাইবা মনে রাখলে,\r\nতারার পানে চেয়ে চেয়ে নাইবা আমায় ডাকলে\r\n\r\nতখন কে বলে গো সেই প্রভাতে নেই আমি.\r\nসকল খেলায় করবে খেলা এই আমি - আহা,\r\nনতুন নামে ডাকবে মোরে, বাধবে নতুন বাহু-ডোরে,\r\nআসব যাব চিরদিনের সেই আমি.\r\nতখন আমায় নাইবা মনে রাখলে,\r\nতারার পানে চেয়ে চেয়ে নাইবা আমায় ডাকলে ।', 0, '', 2),
(10, 'mono moro megher shongi.mp3', 'মন মোর মেঘের সঙ্গী', 'হেমন্ত মুখোপাধ্যায়', 'রবীন্দ্রসঙ্গীত', 'মন মোর মেঘের সঙ্গী,\r\nউড়ে চলে দিগ্‌দিগন্তের পানে\r\nনিঃসীম শূন্যে শ্রাবণবর্ষণসঙ্গীতে\r\nরিমিঝিম   রিমিঝিম   রিমিঝিম॥\r\nমন মোর হংসবলাকার পাখায় যায় উড়ে\r\nক্বচিৎ ক্বচিৎ চকিত তড়িত-আলোকে।\r\nঝঞ্জনমঞ্জীর বাজায় ঝঞ্ঝা রুদ্র আনন্দে।\r\nকলো-কলো কলমন্দ্রে নির্ঝরিণী\r\nডাক দেয় প্রলয়-আহ্বানে॥\r\nবায়ু বহে পূর্বসমুদ্র হতে\r\nউচ্ছল ছলো-ছলো তটিনীতরঙ্গে।\r\nমন মোর ধায় তারি মত্ত প্রবাহে\r\nতাল-তমাল-অরণ্যে\r\nক্ষুব্ধ শাখার আন্দোলনে॥', 1, 'বৃষ্টি,', 2),
(11, 'mor bhabonare ki haoay matalo.mp3', 'মোর ভাবনারে কি হাওয়ায় মাতালো', 'হেমন্ত মুখোপাধ্যায়', 'রবীন্দ্রসঙ্গীত', 'মোর ভাবনারে কি হাওয়ায় মাতালো\r\nদোলে মন দোলে অকারণ হরষে।।\r\nহৃদয় ও গগনে সজলও ঘন\r\nনবীনও মেঘে রসের ও ধারা বরষে\r\nমোর ভাবনারে কি হাওয়ায় মাতালো\r\nদোলে মন দোলে অকারণ হরষে।\r\nতাহারে দেখি না যে দেখি না\r\nশুধু মনে মনে ক্ষণে ক্ষণে ঐ শোনা যায়\r\nবাজে অলকিত তার চরণে।।\r\nরুনু রুনু রুনু রুনু নূপুর ও ধ্বনি\r\nমোর ভাবনারে কি হাওয়ায় মাতালো\r\nদোলে মন দোলে অকারণ হরষে।।\r\n\r\nগোপনও স্বপনে ছাইলও\r\nঅপরসও আঁচলেরও নব নীলিমায়\r\nউড়ে যায় বাদলের ও এই বাতাসে\r\nতার ছায়াময় এলো কেশ আকাশে\r\nসে যে মনও মোর দিলো আকুলি\r\nজল ভেজা কেতকীর দূর সুবাসে\r\nমোর ভাবনারে কি হাওয়ায় মাতালো\r\nদোলে মন দোলে অকারণ হরষে।।\r\nহৃদয় ও গগনে সজলও ঘন\r\nনবীনও মেঘে রসের ও ধারা বরষে\r\nমোর ভাবনারে কি হাওয়ায় মাতালো\r\nদোলে মন দোলে অকারণ হরষে।।', 0, 'আনন্দ,বৃষ্টি,', 2),
(12, 'na chahile jare paoa jay.mp3', 'না চাহিলে যারে পাওয়া যায়', 'ইন্দ্রাণী সেন', 'রবীন্দ্রসঙ্গীত', 'না চাহিলে যারে পাওয়া যায়\r\nতেয়াগিলে আসে হাতে\r\nদিবসে সে ধন হারায়েছি\r\nআমি পেয়েছি আঁধারও রাতে\r\nনা চাহিলে যারে পাওয়া যায়\r\n\r\nনা দেখিবে তারে\r\nপরশিবে না গো\r\nতারি পানে প্রাণ মেলে দিয়ে জাগো\r\nজাগো জাগো\r\nতারায় তারায় রবে তারি বাণী\r\nকুসুমে ফুটিবে প্রাতে\r\nনা চাহিলে যারে পাওয়া যায়\r\n\r\nতারি লাগি যত ফেলেছি অশ্রুজল\r\nবীণা বাদিনীর শতদল দলে\r\nকরিছে সে টলোমল\r\nমোর গানে গানে\r\nপলকে পলকে ঝলসি উঠিছে\r\nঝলকে ছলকে শান্ত হাসির\r\nঅরুণও আলোকে ভাতিছে নয়ন পাতে\r\n\r\nনা চাহিলে যারে পাওয়া যায়', 0, 'প্রেম,রজনী,', 2),
(13, 'purono shei diner kotha.mp3', 'পুরানো সেই দিনের কথা', 'সমবেত(হেমন্ত মুখোপাধ্যায়)', 'রবীন্দ্রসঙ্গীত', 'পুরানো সেই দিনের কথা ভুলবি কি রে হায়।\r\nও সেই চোখে দেখা, প্রাণের কথা,\r\nসে কি ভোলা যায়।।\r\n\r\nআয় আর একটিবার আয় রে সখা\r\nপ্রাণের মাঝে আয়।\r\nমোরা সুখের দুখের কথা কব\r\nপ্রাণ জুড়াবে তায়।\r\n\r\nমোরা ভোরের বেলা ফুল তুলেছি, দুলেছি দোলায়\r\nবাজিয়ে বাঁশি গান গেয়েছি বকুলের তলায়।\r\n\r\nহায় মাঝে হল ছাড়াছাড়ি, গেলেম কে কোথায়\r\nআবার দেখা যদি হল, সখা, প্রাণের মাঝে আয়।', 1, 'বিরহ,', 2),
(14, 'shedin dujone.mp3', 'সেদিন দুজনে', 'হেমন্ত মুখোপাধ্যায়', 'রবীন্দ্রসঙ্গীত', 'সেদিন দুজনে দুলেছিনু বনে\r\nফুলডোরে বাঁধা ঝুলনা।\r\n\r\nসেই স্মৃতিটুকু কভু ক্ষণে ক্ষণে\r\nযেন জাগে মনে, ভুলো না।।\r\n\r\nসেদিন বাতাসে ছিল তুমি জানো\r\nআমারই মনের প্রলাপ জড়ানো\r\nআকাশে আকাশে আছিল ছড়ানো\r\nতোমার হাসির তুলনা।।\r\n\r\nযেতে যেতে পথে পূর্ণিমারাতে\r\nচাঁদ উঠেছিল গগনে।\r\n\r\nদেখা হয়েছিল তোমাতে আমাতে\r\nকী জানি কী মহা লগনে।\r\n\r\nএখন আমার বেলা নাহি আর\r\nবহিব একাকী বিরহের ভার\r\nবাঁধিনু যে রাখী পরানে তোমার\r\nসে রাখী খুলো না, খুলো না।।', 0, 'প্রেম,বিরহ,', 2),
(15, 'tumi kon kanoner phul.mp3', 'তুমি কোন কাননের ফুল', 'শ্রীকান্ত আচার্য্য', 'রবীন্দ্রসঙ্গীত', 'তুমি কোন কাননের ফুল, কোন গগনের তারা।\r\nতোমায় কোথায় দেখেছি যেন কোন স্বপনের পারা।।\r\n\r\nকবে তুমি গেয়েছিলে, আঁখির পানে চেয়েছিলে\r\nভুলে গিয়েছি।\r\nশুধু মনের মধ্যে জেগে আছে ওই নয়নের তারা।।\r\n\r\nতুমি কথা কোয়ো না, তুমি চেয়ে চলে যাও।\r\nএই চাঁদের আলোতে তুমি হেসে গ’লে যাও।\r\nআমি ঘুমের ঘোরে চাঁদের পানে চেয়ে থাকি মধুর প্রাণে,\r\nতোমার আঁখির মতন দুটি তারা ঢালুক কিরণধারা।।', 0, 'প্রেম,রজনী,', 2),
(16, 'ajo modhuro bashori baje.mp3', 'আজো মধুর বাঁশরী বাজে', 'মুহাম্মদ রাফি', 'নজরুলগীতি', 'আজো মধুর বাঁশরী বাজে\r\nবাজে – মধুর বাঁশরী বাজে\r\nগোধুলী লগনে বুকের মাঝে ।।\r\nমধুর বাঁশরী বাজে\r\nবাজে – মধুর বাঁশরী বাজে\r\n\r\nআজো মনে হয় সহসা কখন\r\nজলে ভরা দু’টি ডাগর নয়ন ।।\r\nক্ষনিকের ভুলে সেই চাঁপা ফুলে\r\nফেলে ছুটে যাওয়া লাজে\r\nআজো মধুর বাঁশরী বাজে\r\nবাজে – মধুর বাঁশরী বাজে\r\n\r\nহারানো দিন বুঝি আসিবে না ফিরে\r\nমন কাঁদে কেন স্মৃতির তীরে ।\r\nম ন কাঁ দে ।। কে-ন\r\nহারানো দিন বুঝি আসিবে না ফিরে\r\nমন কাঁদে কেন স্মৃতির তীরে ।\r\n\r\nতবু মাঝে মাঝে আশা জাগে কেন\r\nআমি ভুলিয়াছি ভুলেনি সে যেন\r\nগোমতীর তীরে পাতার কুটিরে\r\nআজো সে পথ চাহে সাঝে\r\n\r\nআজো মধুর বাঁশরী বাজে\r\nবাজে – মধুর বাঁশরী বাজে\r\nমধুর বাঁশরী বাজে', 0, '', 2),
(17, 'alga koro go khopar badhon.mp3', 'আলগা করো গো খোঁপার বাঁধন', 'মুহাম্মদ রাফি', 'নজরুলগীতি', 'আলগা করো গো খোঁপার বাঁধন\r\nদিল ওহি মেরা ফাস গ্যেয়ি।\r\nবিনোদ বেণীর জরীণ ফিতায়\r\nআন্ধা ইশক মেরা কাছ গ্যেয়ি।।\r\n\r\nতোমার কেশের গন্ধে কখন\r\nলুকায়ে আসিলো লোভী আমার মন।\r\nবেহুঁশ ওকার গিরপরি হাতো ম্যে\r\nবাজুবন্দ ম্যে বাছ গ্যেয়ি।।\r\n\r\nকানেরও দুলে প্রান রাখিলে বিধিয়া\r\nআঁখফিরা দিয়া চরিকার নিন্দিয়া।\r\n\r\nদেহের ও দেউড়িতে বেরাতে আসিয়া\r\nঅর নেহি ও ওয়াপাস গ্যেয়ি।।', 0, 'প্রেম,', 2),
(18, 'amar aponar cheye apon je jon.mp3', 'আমার আপনার চেয়ে আপন যে জন', 'অন্বেষা দাসগুপ্ত', 'নজরুলগীতি', 'আমার আপনার চেয়ে আপন যে জন\r\nখুঁজি তারে আমি আপনায়\r\nআমি শুনি যেন তার চরণের ধ্বনি\r\nআমারি পিয়াসী বাসনায়।\r\n\r\nআমার মনের তৃষিত আকাশে\r\nফেরে সে চাতক আকুল পিয়াসে\r\nকভু সে চকোর সুধাচোর আসে\r\nনিশীথে স্বপনে জোছনায়।\r\n\r\nআমার মনের পিয়াল তমালে\r\nহেরি তারে স্নেহ মেঘশ্যাম\r\nঅশনি আলোতে হেরি তারে থির\r\nবিজুলি উজল অভিরাম।\r\n\r\nআমারি রচিত কাননে বসিয়া\r\nপরাণ প্রিয়ারে মালিকা রচিয়া\r\nসে মালা সহসা দেখিনু জাগিয়া\r\nআপনারই গলে দোলে হায়।।', 1, 'প্রেম,', 2),
(19, 'amay nohe go.MP3', 'আমায় নহে গো ভালোবাসো শুধু', 'ফিরোজা বেগম', 'নজরুলগীতি', 'আমায় নহে গো ভালোবাসো শুধু\r\nভালোবাসো মোর গান\r\nবনের পাখিরে কে চিনে রাখে\r\nগান হলে অবসান ।\r\n\r\nচাঁদেরে কে চায় জোসনা সবাই যাচে\r\nগীত শেষে বীণা পড়ে থাকে ধূলি মাঝে\r\nতুমি বুঝিবে না\r\nআলো দিতে কত পোড়ে\r\nকত প্রদীপের প্রাণ ।\r\n\r\nযে কাটা লতার আখিঁজল\r\nফুল হয়ে উঠে ফুটে\r\nফুল নিয়ে তার দিয়েছো কি কিছু\r\nশূন্য পত্র পুটে ।\r\n\r\nসবাই তৃষ্ণা মেটায় নদীর জলে\r\nকি তৃষা জাগে সে নদীর হিয়া তলে\r\nবেদনার মহা সাগরের কাছে করো সন্ধান ।', 1, 'বিরহ,', 2),
(20, 'ami chirotore dure chole jabo.MP3', 'আমি চিরতরে দূরে চলে যাব', 'অজয় চক্রবর্তী', 'নজরুলগীতি', 'আমি চিরতরে দূরে চলে যাব,\r\nতবু আমারে দেবনা ভুলিতে।\r\nআমি বাতাস হইয়া জড়াইব কেশে,\r\nবেণী যাবে যবে খুলিতে।।\r\nতবু আমারে দেবনা ভুলিতে।\r\n\r\nতোমার সুরের নেশায় যখন\r\nঝিমাবে আকাশ কাঁদিবে পবন,\r\nরোদন হইয়া আসিব তখন তোমার বক্ষে দুলিতে।\r\nতবু আমারে দেবনা ভুলিতে।\r\n\r\nআসিবে তোমার পরমোৎসবে কত প্রিয়জন কে জানে,\r\nমনে প’ড়ে যাবে–কোন্‌ সে ভিখারী পায়নি ভিক্ষা এখানে।\r\nতোমার কুঞ্জ-পথে যেতে, হায়!\r\nচমকি’ থামিয়া যাবে বেদনায়\r\nদেখিবে, কে যেন ম’রে পরে আছে\r\nতোমার পথের ধূলিতে।\r\nতবু আমারে দেবনা ভুলিতে।\r\n\r\nআমি চিরতরে দূরে চলে যাব,\r\nতবু আমারে দেবনা ভুলিতে।', 0, 'বিরহ,', 2),
(21, 'anjoli loho mor.mp3', 'অঞ্জলি লহ মোর সঙ্গীতে', 'অনুরাধা পাড়োয়াল', 'নজরুলগীতি', 'অঞ্জলি লহ মোর সঙ্গীতে\r\nপ্রদীপ-শিখা সম কাঁপিছে প্রাণ মম\r\nতোমায়, হে সুন্দর, বন্দিতে!\r\nসঙ্গীতে সঙ্গীতে।।\r\nতোমার দেবালয়ে কি সুখে কি জানি\r\nদু’লে দু’লে ওঠে আমার দেহখানি\r\nআরতি-নৃত্যের ভঙ্গীতে।\r\nসঙ্গীতে সঙ্গীতে।।\r\nপুলকে বিকশিল প্রেমের শতদল\r\nগন্ধে রূপে রসে টলিছে টলমল।\r\nতোমার মুখে চাহি আমার বাণী যত\r\nলুটাইয়া পড়ে ঝরা ফুলের মতো\r\nতোমার পদতলে রঞ্জিতে।\r\nসঙ্গীতে সঙ্গীতে।।', 0, 'ভক্তি,', 2),
(22, 'khelicho e bissho loye.mp3', 'খেলিছ এ বিশ্ব লয়ে', 'অনুপ জালোটা', 'নজরুলগীতি', 'খেলিছ এ বিশ্ব লয়ে\r\nবিরাট শিশু আনমনে।\r\nপ্রলয় সৃষ্টি তব পুতুল খেলা\r\nনিরজনে প্রভু নিরজনে।।\r\n\r\nশূণ্যে মহা আকাশে\r\nতুমি মগ্ন লীলা বিলাসে\r\nভাঙ্গিছ গড়িছ নীতি ক্ষণে ক্ষণে\r\nনিরজনে প্রভু নিরজনে।।\r\n\r\nতারকা রবি শশী খেলনা তব হে উদাসী\r\nপড়িয়া আছে রাঙা পায়ের কাছেরাশি রাশি।\r\n\r\nনিত্য তুমি হে উদার\r\nসুখে-দুখে অবিকার।\r\nহাসিছ খেলিছ তুমি আপন সনে\r\nনিরজনে প্রভু নিরজনে।।', 0, 'ভক্তি,', 2),
(23, 'mor ghum ghore.MP3', 'মোর ঘুমঘোরে এলে মনোহর', 'ফিরোজা বেগম', 'নজরুলগীতি', 'মোর ঘুমঘোরে এলে মনোহর নমো নম, নমো নম, নমো নম।\r\nশ্রাবণ–মেঘে নাচে নটবর রমঝম, রমঝম, ঝমরম।\r\n(ঝমঝম, রমঝম, রমঝম)।।\r\nশিয়রে বসি চুপিচুপি চুমিলে নয়ন\r\nমোর বিকশিল আবেশে তনু নীপ–সম, নিরুপম, মনোরম।।\r\nমোর ফুলবনে ছিল যত ফুল\r\nভরি ডালি দিনু ঢালি’ দেবতা মোর\r\nহায় নিলে না সে ফুল, ছি ছি বেভুল,\r\nনিলে তুলি’ খোঁপা খুলি’ কুসুম–ডোর।\r\nস্বপনে কী যে কয়েছি তাই গিয়াছ চলি’,\r\nজাগিয়া কেঁদে ডাকি দেবতায় প্রিয়তম, প্রিয়তম, প্রিয়তম।।', 0, 'প্রেম,', 2),
(24, 'mora ar jonome.mp3', 'মোরা আর জনমে', 'ধীরেন বসু', 'নজরুলগীতি', 'মোরা আর জনমে হংস-মিথুন ছিলাম\r\nছিলাম নদীর চরে\r\nযুগলরূপে এসেছি গো আবার মাটির ঘরে।।\r\n\r\nতমাল তরু চাঁপা-লতার মত\r\nজড়িয়ে কত জনম হ’ল গত\r\nসেই বাঁধনের চিহ্ন আজো জাগে\r\nজাগে হিয়ার থরে থরে।।\r\n\r\nবাহুর ডোরে বেঁধে আজো ঘুমের ঘোরে যেন\r\nঝড়ের বন-লতার মত লুটিয়ে কাঁদ কেন\r\nবনের কপোত কপোতাক্ষীর তীরে\r\nপাখায় পাখায় বাঁধা ছিলাম নীড়ে\r\nচিরতরে হ’ল ছাড়াছাড়ি\r\nনিঠুর ব্যাধের শরে।।', 1, '', 2),
(25, 'noyon bhora jol.MP3', 'নয়ন ভরা জল গো তোমার', 'ফিরোজা বেগম', 'নজরুলগীতি', 'নয়ন ভরা জল গো তোমার আঁচল ভরা ফুল\r\nফুল নেব না অশ্রু নেব ভেবে হই আকুল।।\r\n\r\nফুল যদি নিই তোমার হাতে\r\nজল রবে গো নয়ন পাতে\r\nঅশ্রু নিলে ফুটবে না আর প্রেমের মুকুল।।\r\n\r\nমালা যখন গাঁথ তখন পাওয়ার সাধ যে জাগে\r\nমোর বিরহে কাঁদ যখন আরও ভালো লাগে।\r\n\r\nপেয়ে তোমায় যদি হারাই\r\nদূরে দূরে থাকি গো তাই\r\nফুল ফোটায়ে যায় গো চলে চঞ্চল বুলবুল।।', 0, 'বিরহ,', 2),
(26, 'porodeshi megh.MP3', 'পরদেশী মেঘ', 'অজয় চক্রবর্তী', 'নজরুলগীতি', 'পরদেশী মেঘ যাও রে ফিরে।\r\nবলিও আমার পরদেশী রে।।\r\n\r\nসে দেশে যবে বাদল ঝরে\r\nকাঁদে না কি প্রাণ একেলা ঘরে,\r\nবিরহ-ব্যাথা নাহি কি সেথা\r\nবাজে না বাঁশী নদীর তীরে।।\r\n\r\nবাদল রাতে ডাকিলে পিয়া পিয়া পাপিয়া\r\nবেদনায় ভরে ওঠে না কি রে কাহারো হিয়া?\r\nফোটে যবে ফুল ওঠে যবে চাঁদ\r\nজাগে না সেথা কি প্রাণে কোন সাধ?\r\nদেয় না কেহ গুরু গঞ্জনা\r\nসে দেশে বুঝি কুলবতী রে।।', 0, '', 2),
(27, 'priyo amono rat.mp3', 'প্রিয় এমন রাত', 'ফিরোজা বেগম', 'নজরুলগীতি', 'প্রিয় এমন রাত যেন যায় না বৃথাই\r\nপরি চাঁপা ফুলের শাড়ি খয়েরী টিপ,\r\nজাগি বাতায়নে জ্বালি আঁখি প্রদীপ,\r\nমালা চন্দন দিয়ে মোর থালা সাজাই।।\r\nতুমি আসিবে বলে সুদূর অতিথি\r\nজাগে চাঁদের তৃষা লয়ে কৃষ্ণা তিথি,\r\nকভু ঘরে আসি কভু বাহিরে চাই।।\r\nআজি আকাশে বাতাসে কানাকানি,\r\nজাগে বনে বনে নব ফুলের বাণী,\r\nআজি আমার কথা যেন বলিতে পাই।।', 0, 'রজনী,', 2),
(28, 'priyo jai jai bolo na.mp3', 'প্রিয় যাই যাই বলো না', 'অনুরাধা পাড়োয়াল', 'নজরুলগীতি', 'প্রিয় যাই যাই বলো না, না না না\r\nআর করো না ছলনা, না না না।।\r\nআজো মুকুলিকা মোর হিয়া মাঝে\r\nনা-বলা কত কথা বাজে,\r\nঅভিমানে লাজে বলা যে হল না।।\r\nকেন শরমে বাধিল কে জানে\r\nআঁখি তুলিতে নারিনু আঁখি পানে।\r\nপ্রথম প্রণয়-ভীরু কিশোরী\r\nযত অনুরাগ তত লাজে মরি,\r\nএত আশা সাধ চরণে দলো না।।', 0, '', 2),
(29, 'shaono rate jodi.mp3', 'শাওন রাতে যদি', 'মান্না দে', 'নজরুলগীতি', 'শাওন রাতে যদি স্মরণে আসে মোরে\r\nবাহিরে ঝড় বহে নয়নে বারি ঝরে।।\r\n\r\nভুলিও স্মৃতি মম নিশিথ স্বপন সম।\r\n\r\nআঁচলের গাথা মালা ফেলিও পথ পরে\r\nবাহিরে ঝড় বহে নয়নে বারি ঝরে।।\r\n\r\nঝরিবে পূবালী বায় গহন দূর বনে\r\nরহিবে চাহি তুমি একেলা বাতায়নে\r\n\r\nবিরহী কুহু কেকা গাহিবে নীপ শাঁখে\r\nযমুনা নদী পাড়ে শুনিবে কে যেন ডাকে।\r\n\r\nবিজলী দ্বীপ শিখা খুঁজিবে তোমায় প্রিয়া\r\nদু’হাতে ঢেকো আঁখি যদি গো জলে ভরে\r\nবাহিরে ঝড় বহে নয়নে বারি ঝরে।।', 0, 'বৃষ্টি,রজনী,', 2),
(30, 'tumi shundor tai.mp3', 'তুমি সুন্দর তাই চেয়ে থাকি প্র', 'সতীনাথ মুখোপাধ্যায়', 'নজরুলগীতি', 'তুমি সুন্দর তাই চেয়ে থাকি প্রিয়\r\nসেকি মোর অপরাধ?\r\n\r\nচাঁদেরে হেরিয়া কাঁদে চকোরিণী\r\nবলে না তো কিছু চাঁদ।।\r\n\r\nচেয়ে’ চেয়ে’ দেখি ফোটে যবে ফুল\r\nফুল বলে না তো সে আমার ভুল\r\nমেঘ হেরি’ ঝুরে’ চাতকিনী\r\nমেঘ করে না তো প্রতিবাদ।।\r\n\r\nজানে সূর্যেরে পাবে না\r\nতবু অবুঝ সূর্যমুখী\r\nচেয়ে’ চেয়ে’ দেখে তার দেবতারে\r\nদেখিয়াই সে যে সুখী।।\r\n\r\nহেরিতে তোমার রূপ-মনোহর\r\nপেয়েছি এ আঁখি, ওগো সুন্দর।\r\nমিটিতে দাও হে প্রিয়তম মোর\r\nনয়নের সেই সাধ।।', 0, 'প্রেম,', 2),
(31, 'agun lagaia dilo kone.mp3', 'আগুন লাগাইয়া দিলো কনে', 'সেলিম চৌধুরী', 'লোকগীতি', 'আগুন লাগাইয়া দিলো কনে\r\nহাছন রাজার মনে ।\r\nনিভে নার উনো আগুন\r\nজ্বলে দিলো জানে ।\r\n\r\nধপ ধপ করি উঠলো আগুন\r\nধইলো আমার প্রাণে\r\nসুরমা নদীর জল দিলে\r\nনিভে না সে কেনে ।\r\n\r\nলাগাইলো লাগাইলো আগুন\r\nআমার মনমোহনে\r\nবাঁচিনা গো বাঁচি না গো\r\nপ্রাণ বন্ধু বিহনে ।\r\n\r\nজ্বলিয়া জ্বলিয়া যায়রে আগুন\r\nকিসে নাই মানে ,\r\nবুঝিয়া দ্যাখরে হাছন রাজা\r\nধইলো না তোর ধনে ।', 0, '', 2),
(32, 'ami opar hoye boshe achi.mp3', 'আমি অপার হয়ে বসে আছি', 'ফরিদা পারভীন', 'লোকগীতি', 'আমি অপার হয়ে বসে আছি\r\nও হে দয়াময়,\r\nপারে লয়ে যাও আমায়।।\r\nআমি একা রইলাম ঘাটে\r\nভানু সে বসিল পাটে-\r\n(আমি) তোমা বিনে ঘোর সংকটে\r\nনা দেখি উপায়।।\r\nনাই আমার ভজন-সাধন\r\nচিরদিন কুপথে গমন-\r\nনাম শুনেছি পতিত-পাবন\r\nতাইতে দিই দোহাই।।\r\nঅগতির না দিলে গতি\r\nঐ নামে রবে অখ্যাতি-\r\nলালন কয়, অকুলের পতি\r\nকে বলবে তোমায়।।', 0, '', 2),
(33, 'baula ke banailo re.mp3', 'বাউলা কে বানাইলো', 'সেলিম চৌধুরী', 'লোকগীতি', 'বাউলা কে বানাইলো রে\r\nহাছন রাজারে বাউলা\r\nকে বানাইলো রে॥\r\n\r\nবানাইলো বানাইলো বাউলা,\r\nতার নাম হয় যে মাওলা|\r\nদেখিয়া তার রুপের ঝলক\r\nহাসন রাজা হইলো আউলা||\r\n\r\nহাসন রাজা হইলো বাউল,\r\nপ্রাণ বন্দের কারণে|\r\nবন্দু বিনে হাসন রাজার\r\nঅন্য নাহি মানে||\r\n\r\nহাসন রাজা গাইছে গান\r\nহাতে তালি দিয়া,\r\nসাক্ষাতে দাঁড়াইয়া শোনে\r\nহাসন রাজার প্রিয়া||\r\n\r\nবাউলা কে বানাইলো রে,\r\nহাসন রাজারে\r\nবাউলা কে বানাইলো রে॥', 0, '', 2),
(34, 'Likhte Parina kono gaan.mp3', 'লিখতে পারিনা কোন গান', 'জেমস', 'আধুনিক', 'লিখতে পারিনা কোন গান আজ তুমি ছাড়া\r\nভাবতে পারিনা কোন কিছু আর তুমি ছাড়া।\r\nকিযে যন্ত্রনা এই পথচলা (২)\r\nবিরহ স্মৃতি তোমাকে ঘিরে তুমি জাননা।\r\nলিখতে পারিনা কোন গান আজ তুমি ছাড়া\r\nভাবতে পারিনা কোন কিছু আর তুমি ছাড়া।\r\nকিযে যন্ত্রনা এই পথচলা\r\nবিরহ স্মৃতি তোমাকে ঘিরে তুমি জাননা।\r\nহারানো দিনগুলিতে ছিলে তুমি জড়িয়ে\r\nএই মনের সীমান্তে ছিল সুখ ছড়িয়ে\r\nহারানো দিনগুলিতে ছিলে তুমি জড়িয়ে\r\nএই মনের সীমান্তে ছিল সুখ ছড়িয়ে\r\nকিযে যন্ত্রনা এই পথচলা\r\nবিরহ স্মৃতি তোমাকে ঘিরে তুমি জাননা।\r\nলিখতে পারিনা কোন গান আজ তুমি ছাড়া\r\nভাবতে পারিনা কোন কিছু আর তুমি ছাড়া।\r\nআকাশে চাঁদ ছিল একা\r\nপাহাড়ি ঝর্ণা ঝরা\r\nতাদের মনেতে ব্যথা ছিল কিনা বুঝিনি\r\nআকাশে চাঁদ ছিল একা\r\nপাহাড়ি ঝর্ণা ঝরা\r\nতাদের মনেতে ব্যথা ছিল কিনা বুঝিনি\r\nসে ব্যথা বোঝার আগে\r\nহারিয়ে তোমাকে\r\nতোমাকে হারিয়ে বেদনা ঝরেছে হৃদয়ে\r\nকিযে বেদনা তুমি বোঝনা\r\nতোমাকে ভুলে থাকা কোনদিন বুঝি হল না।\r\nলিখতে পারিনা কোন গান আজ তুমি ছাড়া\r\nভাবতে পারিনা কোন কিছু আর তুমি ছাড়া।\r\nকিযে যন্ত্রনা এই পথচলা (২)\r\nবিরহ স্মৃতি তোমাকে ঘিরে তুমি জাননা।\r\nলিখতে পারিনা কোন গান আজ তুমি ছাড়া\r\nভাবতে পারিনা কোন কিছু আর তুমি ছাড়া।', 9, 'প্রেম,বিরহ,', 2),
(35, 'jat gelo jat gelo bole.mp3', 'জাত গেল জাত গেল বলে', 'ফরিদা পারভীন', 'লোকগীতি', 'জাত গেল জাত গেল বলে\r\nএকি আজব কারখানা\r\nসত্য কাজে কেউ নয় রাজি\r\nসবি দেখি তা না-না-না।।\r\nআসবার কালে কি জাত ছিলে\r\nএসে তুমি কি জাত নিলে,\r\nকি জাত হবা যাবার কালে\r\nসে কথা ভেবে বল না।।\r\nব্রাহ্মণ চন্ডাল চামার মুচি\r\nএক জলেই সব হয় গো শুচি,\r\nদেখে শুনে হয় না রুচি\r\nযমে তো কাকেও ছাড়বে না।।\r\nগোপনে যে বেশ্যার ভাত খায়,\r\nতাতে ধর্মের কি ক্ষতি হয়।\r\nলালন বলে জাত কারে কয়\r\nএ ভ্রম তো গেল না।।', 0, '', 2),
(36, 'khachar vetor ochin pakhi.mp3', 'খাঁচার ভিতর অচিন পাখি', 'ফরিদা পারভীন', 'লোকগীতি', 'খাঁচার ভিতর অচিন পাখি\r\nকেমনে আসে যায়\r\nআমি ধরতে পারলে মন বেড়ি\r\nদিতাম পাখির পায়\r\n\r\nআট কুঠরীর ওই দরজাটা\r\nমধ্যে মধ্যে ঝরকা কাটা\r\nতার উপরে সদর কোঠা\r\nআয়না মহল তায়\r\n\r\nকপালের খেল নইলে কি আর\r\nপাখিটির এমন ব্যবহার\r\nখাচা ভেঙ্গে পাখি আমার\r\nকোনখানে পালায়\r\n\r\nমন তুই রইলি খাচার আশে\r\nখাঁচা যে তোর কাঁচা বাশে\r\nকোনদিন খাচা পড়বে খশে\r\nফকির লালন কেঁদে কয়', 0, '', 2),
(37, 'loke bole bole re.mp3', 'লোকে বলে বলেরে', 'সেলিম চৌধুরী', 'লোকগীতি', 'লোকে বলে বলেরে\r\nঘর-বাড়ি ভালা নাই আমার\r\nকি ঘর বানাইমু আমি শূণ্যের মাঝার।।\r\n\r\nভালা কইরা ঘর বানাইয়া\r\nকয়দিন থাকমু আর।\r\nআয়না দিয়া চাইয়া দেখি\r\nপাকনা চুল আমার।।\r\n\r\nএ ভাবিয়া হাসন রাজায়\r\nঘর-দুয়ার না বান্ধে।\r\nকোথায় নিয়া রাখব আল্লায়\r\nতাই ভাবিয়া কান্দে।।\r\n\r\nজানত যদি হাসন রাজা\r\nবাঁচব কতদিন।\r\nবানাইত দালান-কোঠা\r\nকরিয়া রঙিন।।', 0, '', 2),
(38, 'milon hobe koto dine.mp3', 'মিলন হবে কত দিনে', 'লতিফ শাহ', 'লোকগীতি', 'মিলন হবে কত দিনে\r\nআমার মনের মানুষের সনে।।\r\nচাতক প্রায় অহর্নিশি\r\nচেয়ে আছি কালো শশী\r\nহব বলে চরণ-দাসী,\r\nও তা হয় না কপাল-গুণে।।\r\nমেঘের বিদ্যুৎ মেঘেই যেমন\r\nলুকালে না পাই অন্বেষণ,\r\nকালারে হারায়ে তেমন\r\nঐ রূপ হেরি এ দর্পণে।।\r\nযখন ও-রূপ স্মরণ হয়,\r\nথাকে না লোক-লজ্জার ভয়-\r\nলালন ফকির ভেবে বলে সদাই\r\n(ঐ) প্রেম যে করে সে জানে।।', 0, '', 2),
(39, 'shob loke koy.mp3', 'সব লোকে কয় লালন কী জাত', 'বিউটি', 'লোকগীতি', 'সব লোকে কয় লালন কী জাত সংসারে ।।\r\nলালন কয় জাতের কী রূপ\r\nআমি দেখলাম না দুই নজরে।\r\nসব লোকে কয় লালন কী জাত সংসারে ।।\r\n\r\nকেউ মালা’য় কেউ তছবি গলায়,\r\nতাইতে যে জাত ভিন্ন বলায়\r\nযাওয়া কিম্বা আসার বেলায়\r\nজাতের চিহ্ন রয় কার রে\r\nসব লোকে কয় লালন কী জাত সংসারে ।।\r\n\r\nযদি ছুন্নত দিলে হয় মুসলমান,\r\nনারীর তবে কি হয় বিধান,\r\nবামণ চিনি পৈতা প্রমাণ,\r\nবামণি চিনে কিসে রে\r\nসব লোকে কয় লালন কী জাত সংসারে ।।\r\n\r\nজগত্ বেড়ে জেতের কথা,\r\nলোকে গৌরব করে যথা তথা\r\nলালন সে জেতের ফাতা ঘুচিয়াছে সাধ বাজারে’\r\nসব লোকে কয় লালন কী জাত সংসারে ।।', 0, '', 2),
(40, 'shona bondhe amare.mp3', 'সোনা বন্ধে আমারে', 'সেলিম চৌধুরী', 'লোকগীতি', 'সোনা বন্ধে আমারে দেওয়ানা বানাইলো\r\nসোনা বন্ধে আমারে পাগল করিল।\r\nআরে না জানি কি মন্ত্র করি জাদু করিল।।\r\n\r\nকবে ক’নে হইল আমার তার সংগে দেখা\r\nঅংশীদার নাইরে তার সে তো হয় একা ।।\r\n\r\nরূপের ঝলক দেখিয়া তার আমি হইলাম ফানা\r\nসেই অবধি লাগল আমার শ্যাম পিরিতির টানা।।\r\n\r\nহাসন রাজা হইল পাগল লোকের হইল জানা\r\nনাচে নাচে পালায় পালায় আর গায় গানা।।\r\n\r\nমুখ চাইয়া হাসে আমার যত আরি পরী\r\nদেখিয়াছি বন্ধের রূপ ভুলিতে না পারি।।', 0, '', 2),
(41, 'Aj tomar mon kharap meye by Akib.mp3', 'আজ তোমার মন খারাপ মেয়ে', 'আকিব আজমাঈন', 'আধুনিক', 'আজ তোমার মন খারাপ মেয়ে\r\nতুমি আনমনে বসে আছো\r\nআকাশ পানে দৃষ্টি উদাস\r\nআমি তোমার জন্য এনে দেব মেঘ থেকে বৃষ্টির ঝিরি ঝিরি হাওয়া\r\nসেই হাওয়ায় ভেসে যাবে তুমি\r\nসেই হাওয়ায় ভেসে যাবে তুমি\r\n\r\nআজ তোমার মন খারাপ মেয়ে\r\nতুমি আনমনে বসে আছো\r\nআকাশ পানে দৃষ্টি উদাস\r\nআমি তোমার জন্য এনে দেব\r\nমেঘ থেকে বৃষ্টির ঝিরি ঝিরি হাওয়া\r\nসেই হাওয়ায় ভেসে যাবে তুমি\r\nসেই হাওয়ায় ভেসে যাবে তুমি\r\n\r\nআজ তোমার চোখের কোণে জল\r\nবৃষ্টিও অবিরাম কাঁদে\r\nতোমার সাথে সাথে আমার পথে পথে\r\nআমি তোমার জন্য এনে দেব\r\nরোদেলা সে পাখিকে করে দেব তোমার আপনজন\r\nপরী তুমি ভাসবে মেঘের ভাঁজে\r\nপরী তুমি ভাসবে মেঘের ভাঁজে\r\n\r\nআজ তোমার জোসনা হারায় আলো\r\nপ্রজাপতির ডানায় বিষাদ করে ভর\r\nযখন তখন বিষাদ করে ভর\r\nআজ তোমার জোসনা হারায় আলো\r\nপ্রজাপতির ডানায় বিষাদ করে ভর\r\nযখন তখন বিষাদ করে ভর\r\nআমি তোমার জন্য এনে দেব\r\nঅঝর শ্রাবণ আকাশ ছোয়া জল জোসনা\r\nপরী তুমি ভাসবে মেঘের ভাঁজে\r\nপরী তুমি ভাসবে মেঘের ভাঁজে\r\n\r\nআজ তোমার মন খারাপ মেয়ে\r\nতুমি আনমনে বসে আছো\r\nআকাশ পানে দৃষ্টি উদাস\r\nআমি তোমার জন্য এনে দেব\r\nমেঘ থেকে বৃষ্টির ঝিরি ঝিরি হাওয়া\r\nসেই হাওয়ায় ভেসে যাবে তুমি\r\nসেই হাওয়ায় ভেসে যাবে তুমি', 0, 'প্রেম,বৃষ্টি,', 2),
(42, 'ailo ailo ailo re.mp3', 'আইল আইল রে', 'ইশতিয়াক', 'আধুনিক', 'আইল আইল রে...\r\nরঙ্গে ভরা বৈশাখ আমার আইলরে\r\nমামা রা সবাই গান টা সুনেন\r\n\r\nআইলো আইলো রে রঙ্গে ভরা বৈশাখ আবার আইলো রে\r\nপাগলা মনে রঙ্গিন চোখে, নাগরদোলায় বছর ঘুরে\r\nএকতারাটার সুরটা বুকে, হাজার তালের বাউল সুরে\r\nদেশটা জুড়ে খুশির ঝড়ে একটা কথাই সবার মনে\r\nআইলো আইলো রে \r\nআইলো আইলো রে রঙ্গে ভরা বৈশাখ আবার আইলো রে\r\n\r\nলাল পাড়ের ওই শাড়ির আচল, আলতা পায়ে খুশির নাচন\r\nইলশে ভাজা পান্তা খাওয়া, সব বাধার আজ খুলছে বাঁধন\r\nপাগলা মনের খুশির ভিড়ে বৈশাখী রঙ লাগলো প্রাণে\r\nআইলো আইলো রে \r\nআইলো আইলো রে রঙ্গে ভরা বৈশাখ আবার আইলো রে\r\n\r\nগাছের ডালে আমের মুকুল, আকাশ মেঘে সাজলো দুপুর\r\nহালখাতা সব হিসেব শেষে, আসলো বছর নতুন বেশে\r\nএক বাণীতে সব বাঙ্গালি খুশির মেলায় দেশটা হাসে\r\nআইলো আইলো রে \r\nআইলো আইলো রে রঙ্গে ভরা বৈশাখ আবার আইলো রে\r\nপাগলা মনে রঙ্গিন চোখে নাগরদোলায় বছর ঘুরে\r\nএকতারাটার সুরটা বুকে হাজার তালের বাউল সুরে\r\nদেশটা জুড়ে খুশির ঝড়ে একটা কথাই সবার মনে\r\nআইলো আইলো রে \r\nআইলো আইলো রে রঙ্গে ভরা বৈশাখ আবার আইলো রে', 2, 'উৎসব,', 2),
(43, 'Holud bato mehndi.mp3', 'হলুদ বাট মেহেদী বাট', 'সমবেত', 'লোকগীতি', 'লিরিক সংযুক্ত করা হবে', 0, 'বিয়ে,', 2),
(44, 'Ami banglay gaan gai.mp3', 'আমি বাংলায় গান গাই', 'মাহ্‌মুদুজ্জামান বাবু', 'দেশাত্মবোধক গান', 'আমি বাংলায় গান গাই, আমি বাংলার গান গাই \r\nআমি আমার আমিকে চিরদিন-এই বাংলায় খুঁজে পাই।। \r\nআমি বাংলায় দেখি স্বপ্ন, আমি বাংলায় বাঁধি সুর \r\nআমি এই বাংলার মায়া ভরা পথে, হেটেছি এতটা দূর, \r\nবাংলা আমার জীবনানন্দ, বাংলা প্রাণের সুখ \r\nআমি একবার দেখি, বার বার দেখি, দেখি বাংলার মুখ।। \r\n\r\nআমি বাংলায় কথা কই, আমি বাংলার কথা কই \r\nআমি বাংলায় ভাসি, বাংলায় হাসি, বাংলায় জেগে রই \r\nআমি বাংলায় মাতি উল্লাসে, করি বাংলায় হাহাকার \r\nআমি সব দেখেশুনে খেপে গিয়ে-করি বাংলায় চিৎকার, \r\nবাংলা আমার দৃপ্ত স্লোগান, ক্ষিপ্ত তীর ধনুক \r\nআমি একবার দেখি, বার বার দেখি, দেখি বাংলার মুখ।। \r\n\r\nআমি বাংলায় ভালোবাসি, আমি বাংলাকে ভালোবাসি \r\nআমি তারই হাত ধরে সারা পৃথিবীর-মানুষের কাছে আসি \r\nআমি যা কিছু মহান বরণ করেছি বিনম্র শ্রদ্ধায় \r\nমিশে তেরো নদী, সাত সাগরের জল গঙ্গায়-পদ্মায় \r\nবাংলা আমার তৃষ্ণার জল, তৃপ্ত শেষ চুমুক \r\nআমি একবার দেখি, বার বার দেখি, দেখি বাংলার মুখ।।', 0, '', 2),
(45, 'O amar bangla ma.mp3', 'ও আমার বাংলা মা তোর', 'ফাহমিদা নবী', 'দেশাত্মবোধক গান', 'ও আমার বাংলা মা তোর\r\nআকুল করা রূপের সুধায়\r\nহৃদয় আমার যায় জুড়িয়ে।।\r\n\r\nফাগুনে তোর কৃষ্ণচূড়া\r\nপলাশ বনে কিসের হাসি।\r\nচৈতি রাতের উদাস সুরে\r\nরাখাল বাজায় বাঁশের বাঁশি।।\r\n\r\nবোশেখে তোর রূদ্র ভয়াল\r\nকেতুন উড়ায় কালবোশেখি\r\nজষ্ঠি মাসে বনে বনে\r\nআম- কাঠালের হাট বসে কী\r\n\r\nশ্যমল মেঘের ভেলায় চড়ে\r\nআষাঢ় নামে তোমার বুকে।\r\nশ্রাবনধারায় বর্ষাতে তুই\r\nসিনান করিস পরম সুখে।।', 0, '', 2),
(46, 'aaj dujone.MP3', 'আজ দুজনার দুটি পথ ওগো', 'শ্রীকান্ত আচার্য্য', 'আধুনিক', 'আজ দুজনার দুটি পথ ওগো\r\nদুটি দিকে গেছে বেঁকে।\r\nতোমার ও পথ আলোয় ভরানো জানি\r\nআমার এ পথ আঁধারে আছে যে ঢেকে…আজ.\r\nসেই শপথের মালা খুলে\r\nআমারে গেছ যে ভুলে\r\nতোমারেই তবু দেখি বারে বারে\r\nআজ শুধু দূরে থেকে..আজ\r\nআমার এ কূল ছাড়ি\r\nতব বিশ্বরণের খেয়া ভরা পালে\r\nঅকূলে দিয়েছি পাড়ি।\r\nআজ যতবার দীপ জ্বালি\r\nআলো নয় পাই কালি\r\nএ বেদনা তবু সহি হাসি মুখে\r\nনিজেরে লুকায়ে রেখে', 0, 'প্রেম,বিরহ,', 2),
(47, 'Tumi robe nirobe.mp3', 'তুমি রবে নীরবে', 'আকিব আজমাঈন', 'রবীন্দ্রসঙ্গীত', 'তুমি রবে নীরবে হৃদয়ে মম\r\nনিবিড় নিভৃত পূর্ণিমানিশীথিনী-সম॥\r\n          মম জীবন যৌবন    মম অখিল ভুবন\r\n     তুমি    ভরিবে গৌরবে নিশীথিনী-সম॥\r\nজাগিবে একাকী     তব করুণ আঁখি,\r\n     তব অঞ্চলছায়া মোরে রহিবে ঢাকি।\r\n          মম দুঃখবেদন    মম সফল স্বপন\r\n     তুমি    ভরিবে সৌরভে নিশীথিনী-সম॥', 15, 'প্রেম,রজনী,', 2),
(48, 'Esho He Boishakh.mp3', 'এসো হে বৈশাখ', 'কাদেরী কিবরিয়া', 'রবীন্দ্রসঙ্গীত', 'এসো, এসো, এসো হে বৈশাখ\r\nতাপসনিশ্বাসবায়ে মুমূর্ষুরে দাও উড়ায়ে,\r\nবৎসরের আবর্জনা দূর হয়ে যাক\r\nযাক পুরাতন স্মৃতি, যাক ভুলে যাওয়া গীতি,\r\nঅশ্রুবাষ্প সুদূরে মিলাক।\r\nমুছে যাক গ্লানি, ঘুচে যাক জরা,\r\nঅগ্নিস্নানে শুচি হোক ধরা\r\nরসের আবেশরাশি শুষ্ক করি দাও আসি,\r\nআনো আনো আনো তব প্রলয়ের শাঁখ\r\nমায়ার কুজ্ঝটিজাল যাক দূরে যাক।', 15, 'উৎসব,আনন্দ,', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`song_id`,`playlist_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `creates`
--
ALTER TABLE `creates`
  ADD PRIMARY KEY (`member_id`,`playlist_id`);

--
-- Indexes for table `deletes`
--
ALTER TABLE `deletes`
  ADD PRIMARY KEY (`song_ID`,`admin_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `mood`
--
ALTER TABLE `mood`
  ADD PRIMARY KEY (`song_id`,`mood_name`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlist_id`);

--
-- Indexes for table `remove`
--
ALTER TABLE `remove`
  ADD PRIMARY KEY (`admin_id`,`member_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlist_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `song_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
