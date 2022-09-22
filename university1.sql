-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 07:24 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `distribution_subject`
--

CREATE TABLE `distribution_subject` (
  `id` int(11) NOT NULL,
  `name_subject` varchar(50) NOT NULL,
  `name_tetcher` varchar(100) NOT NULL,
  `type_certifcate_unv` varchar(15) NOT NULL,
  `department` varchar(15) NOT NULL,
  `batch` varchar(5) NOT NULL,
  `study_year` varchar(15) NOT NULL,
  `semester` varchar(4) NOT NULL,
  `number_of_hour_subject` varchar(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `year` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `complete_and_end_subject` varchar(10) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribution_subject`
--

INSERT INTO `distribution_subject` (`id`, `name_subject`, `name_tetcher`, `type_certifcate_unv`, `department`, `batch`, `study_year`, `semester`, `number_of_hour_subject`, `username`, `year`, `date`, `hours`, `complete_and_end_subject`) VALUES
(1, 'لغة عربية', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '3', 'عصام الدين محمد', '22', '2022-05-25', '01:05:25', 'none'),
(2, 'لغة انجليزية', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '3', 'عصام الدين محمد', '22', '2022-05-25', '01:05:51', 'none'),
(3, 'حسبان1', 'محمد معتصم الهادي', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '3', 'عصام الدين محمد', '22', '2022-05-27', '10:05:41', 'none'),
(4, 'لغات برمجة', 'مصعب الصادق محمد', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '4', 'عصام الدين محمد', '22', '2022-05-27', '10:05:01', 'none'),
(5, 'قواعد بيانات', 'عيسى محمد معتصم', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '4', 'عصام الدين محمد', '22', '2022-05-27', '10:05:23', 'none'),
(19, 'هياكل بيانات', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '4', 'عصام الدين محمد', '22', '2022-06-02', '10:06:47', 'none'),
(20, 'فيزياء', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '4', 'عصام الدين محمد', '22', '2022-06-05', '12:06:31', 'none'),
(21, 'oop', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', '4', 'عصام الدين محمد', '22', '2022-06-07', '08:06:19', 'none'),
(22, 'DB', 'محمد معتصم الهادي', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', '4', 'عصام الدين محمد', '22', '2022-06-07', '08:06:35', 'none'),
(23, 'OS', 'ياسر محمد احمد', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', '4', 'عصام الدين محمد', '22', '2022-06-07', '08:06:56', 'none'),
(24, 'calculas2', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', '3', 'عصام الدين محمد', '22', '2022-06-07', '08:06:14', 'none'),
(25, 'alogrithm', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', '4', 'عصام الدين محمد', '22', '2022-06-07', '08:06:34', 'none'),
(26, 'معمارية حاسوب', 'بشير عبد الملك', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', '4', 'عصام الدين محمد', '22', '2022-06-07', '08:06:36', 'none'),
(27, 'برمجة هيكلية 2', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', '4', 'عصام الدين محمد', '22', '2022-06-23', '01:06:03', 'none'),
(28, 'قواعد بيانات 2', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', '4', 'عصام الدين محمد', '22', '2022-06-23', '01:06:23', 'none'),
(29, 'جبر خطي', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', '3', 'عصام الدين محمد', '22', '2022-06-23', '01:06:45', 'none'),
(30, 'رياضيات متقطعة', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', '3', 'عصام الدين محمد', '22', '2022-06-23', '01:06:05', 'none'),
(31, 'هياكل بيانات', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', '4', 'عصام الدين محمد', '22', '2022-06-23', '01:06:29', 'none'),
(32, 'لغة عربية', 'aisha', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '3', 'bssa abdo', '22', '2022-07-26', '12:07:13', 'none'),
(33, 'oop', 'aisha', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '4', 'bssa abdo', '22', '2022-07-26', '12:07:42', 'none'),
(34, 'هياكل بيانات', 'aisha', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '4', 'bssa abdo', '22', '2022-07-26', '12:07:03', 'none'),
(35, 'alogrithm', 'aisha', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', '4', 'bssa abdo', '22', '2022-07-26', '12:07:22', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `distribution_tetcher_exams`
--

CREATE TABLE `distribution_tetcher_exams` (
  `id` int(11) NOT NULL,
  `name_subject` varchar(50) NOT NULL,
  `name_tetcher` varchar(100) NOT NULL,
  `type_certificate` varchar(15) NOT NULL,
  `department` varchar(15) NOT NULL,
  `batch` varchar(5) NOT NULL,
  `study_year` varchar(15) NOT NULL,
  `semester` varchar(4) NOT NULL,
  `type_exam` varchar(15) NOT NULL,
  `date_of_exam` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `year` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribution_tetcher_exams`
--

INSERT INTO `distribution_tetcher_exams` (`id`, `name_subject`, `name_tetcher`, `type_certificate`, `department`, `batch`, `study_year`, `semester`, `type_exam`, `date_of_exam`, `username`, `year`, `date`, `hours`) VALUES
(1, 'لغة عربية', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-05-28', 'عصام الدين محمد', '22', '2022-05-27', '11:05:56'),
(2, 'لغة انجليزية', 'محمد معتصم الهادي', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-05-28', 'عصام الدين محمد', '22', '2022-05-27', '11:05:06'),
(3, 'حسبان1', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-05-29', 'عصام الدين محمد', '22', '2022-05-27', '11:05:38'),
(4, 'لغة عربية', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'sub_exams', '2022-05-28', 'عصام الدين محمد', '22', '2022-05-28', '03:05:26'),
(5, 'حسبان1', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'sub_exams', '2022-05-29', 'عصام الدين محمد', '22', '2022-05-29', '09:05:12'),
(6, 'فيزياء', 'محمدالفاتح محمد', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-06-01', 'عصام الدين محمد', '22', '2022-06-01', '08:06:54'),
(8, 'قواعد بيانات', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-06-01', 'عصام الدين محمد', '22', '2022-06-01', '08:06:06'),
(9, 'لغات برمجة', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-06-02', 'عصام الدين محمد', '22', '2022-06-02', '10:06:23'),
(10, 'هياكل بيانات', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-06-02', 'عصام الدين محمد', '22', '2022-06-02', '10:06:58'),
(11, 'فيزياء', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-06-05', 'عصام الدين محمد', '22', '2022-06-05', '12:06:09'),
(12, 'oop', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', 'normal', '2022-06-07', 'عصام الدين محمد', '22', '2022-06-07', '08:06:10'),
(13, 'DB', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', 'normal', '2022-06-07', 'عصام الدين محمد', '22', '2022-06-07', '08:06:35'),
(14, 'OS', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', 'normal', '2022-06-07', 'عصام الدين محمد', '22', '2022-06-07', '08:06:21'),
(15, 'calculas2', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', 'normal', '2022-06-07', 'عصام الدين محمد', '22', '2022-06-07', '08:06:56'),
(16, 'alogrithm', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', 'normal', '2022-06-07', 'عصام الدين محمد', '22', '2022-06-07', '08:06:18'),
(17, 'معمارية حاسوب', 'حسن عصمت', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', 'normal', '2022-06-07', 'عصام الدين محمد', '22', '2022-06-07', '08:06:40'),
(18, 'معمارية حاسوب', 'بشير عبد الملك', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', 'normal', '2022-06-15', 'عصام الدين محمد', '22', '2022-06-15', '09:06:18'),
(19, 'برمجة هيكلية 2', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', 'normal', '2022-06-23', 'عصام الدين محمد', '22', '2022-06-23', '01:06:26'),
(20, 'هياكل بيانات', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', 'normal', '2022-06-23', 'عصام الدين محمد', '22', '2022-06-23', '01:06:51'),
(21, 'قواعد بيانات 2', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', 'normal', '2022-06-23', 'عصام الدين محمد', '22', '2022-06-23', '01:06:21'),
(22, 'جبر خطي', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', 'normal', '2022-06-23', 'عصام الدين محمد', '22', '2022-06-23', '01:06:49'),
(23, 'رياضيات متقطعة', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الثانية', '3', 'normal', '2022-06-23', 'عصام الدين محمد', '22', '2022-06-23', '01:06:46'),
(24, 'DB', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-06-26', 'عصام الدين محمد', '22', '2022-06-26', '10:06:05'),
(25, 'قواعد بيانات 2', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '2', 'الاولى', '1', 'normal', '2022-06-26', 'عصام الدين محمد', '22', '2022-06-26', '11:06:27'),
(26, 'لغة عربية', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '2', 'normal', '2022-06-26', 'عصام الدين محمد', '22', '2022-06-26', '11:06:12'),
(27, 'رياضيات متقطعة', 'افراح الوسيلة', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-06-27', 'عصام الدين محمد', '22', '2022-06-27', '11:06:34'),
(28, 'رياضيات متقطعة', 'bssa', 'بكلاريوس', 'تقنية معلومات', '4', 'الثانية', '4', 'normal', '2022-06-29', '', '22', '2022-07-06', '12:07:57'),
(29, 'لغة عربية', 'aisha', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-07-26', 'bssa abdo', '22', '2022-07-26', '12:07:25'),
(30, 'oop', 'aisha', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-07-26', 'bssa abdo', '22', '2022-07-26', '12:07:48'),
(31, 'هياكل بيانات', 'aisha', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-07-26', 'bssa abdo', '22', '2022-07-26', '12:07:17'),
(32, 'alogrithm', 'aisha', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'normal', '2022-07-26', 'bssa abdo', '22', '2022-07-26', '12:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `academic_qualification` varchar(100) NOT NULL,
  `type_of_jop` varchar(40) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '0000',
  `date_of_add` varchar(30) NOT NULL,
  `hours` varchar(20) NOT NULL,
  `del` varchar(5) NOT NULL DEFAULT 'no',
  `take_salary` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `full_name`, `phone_number`, `email`, `address`, `academic_qualification`, `type_of_jop`, `salary`, `username`, `password`, `date_of_add`, `hours`, `del`, `take_salary`) VALUES
(12, 'bssa ', '0934678244', 'bsheer@gmail.com', 'المعمورة', 'بكاليريوس محاسبة', 'Accountant', '90000', 'bssa2', '0000', '2022-07-02', '12:07:00', 'no', 'yes'),
(13, 'bsheer', '09999123', 'bsheer@gmail.com', 'omdorman', 'بكاليريوس تقنية معلومات', 'Human Resource', '90000', 'basheer', '0000', '2022-07-02', '12:07:04', 'no', 'no'),
(14, 'bssa abdo', '09999123', 'omer@gmail.com', 'omdorman', 'بكاليريوس تقنية معلومات', 'Registered', '100000', 'bssareg', '0000', '2022-07-02', '01:07:41', 'no', 'no'),
(15, 'm7med', 'w345789', 'bsheer@gmail.com', 'المعمورة', 'بكاليريوس تقنية معلومات', 'Human Resource', '40000', 'm7med', '0000', '2022-07-05', '07:07:31', 'no', 'no'),
(16, 'snhoory', '3456789', 'bsheer@gmail.com', 'المعمورة', 'بكاليريوس تقنية معلومات', 'Human Resource', '100000', 'snhoory', '0000', '2022-07-05', '07:07:04', 'no', 'no'),
(17, 'bssa3', '0934678244', 'bssa@gmia.coml', 'الصحافة', 'بكاليريوس تقنية معلومات', 'Registered', '100000', 'bssa3', '0000', '2022-07-06', '12:07:07', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `type_exp` varchar(30) NOT NULL,
  `distnation_expens` varchar(100) NOT NULL,
  `value_exp` varchar(50) NOT NULL,
  `exp_from` varchar(20) NOT NULL,
  `date_of_exp` date NOT NULL,
  `hours_of_exp` time NOT NULL,
  `name_accountant` varchar(100) NOT NULL,
  `check_accountant` varchar(20) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `username`, `type_exp`, `distnation_expens`, `value_exp`, `exp_from`, `date_of_exp`, `hours_of_exp`, `name_accountant`, `check_accountant`) VALUES
(1, '', 'elecronic', 'company', '20000', 'bank_safe', '2022-06-30', '05:06:39', 'snhory_acc', 'done'),
(2, 'ahmed ammar', 'elecronic', 'company', '20000', 'bank_safe', '2022-06-30', '05:06:39', 'snhory_acc', 'done'),
(3, '', 'فاتورة مياه', 'company', '300', 'bank_safe', '2022-06-30', '07:06:28', 'snhory_acc', 'done'),
(4, 'ahmed ammar', 'فاتورة مياه', 'company', '300', 'bank_safe', '2022-06-30', '07:06:28', 'snhory_acc', 'done'),
(5, '', 'فاتورة كهرباء', 'كافتريا', '1000', 'bank_safe', '2022-06-30', '07:06:36', 'snhory_acc', 'done'),
(6, 'ahmed ammar', 'فاتورة كهرباء', 'كافتريا', '1000', 'bank_safe', '2022-06-30', '07:06:36', 'snhory_acc', 'done'),
(7, '', 'فاتورة كهرباء', 'كافتريا', '1000', 'unv_safe', '2022-06-30', '07:06:46', 'snhory_acc', 'done'),
(8, 'ahmed ammar', 'فاتورة كهرباء', 'كافتريا', '1000', 'bank_safe', '2022-06-30', '07:06:46', 'snhory_acc', 'done'),
(9, 'ahmed ammar', 'فاتورة مياهuuu', 'ffffff', '6000', 'unv_safe', '2022-06-30', '07:06:27', 'snhory_acc', 'done'),
(10, 'ahmed ammar', 'فاتورة مياه', 'وزارة المياه', '100', 'bank_safe', '2022-06-30', '07:06:52', 'snhory_acc', 'done'),
(11, 'ahmed ammar', 'فاتورة كهرباء', 'وزارة المياه', '12000', 'bank_safe', '2022-07-01', '02:07:54', 'bssa', 'done'),
(12, 'ahmed ammar', 'فاتورة كهرباء', 'fddddd', '1000', 'unv_safe', '2022-07-01', '02:07:43', 'bssa', 'done'),
(13, 'bsheer', '<input>', '<hr>', '1000', '', '2022-07-05', '07:07:27', '', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `feeding`
--

CREATE TABLE `feeding` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `value_of_feeding` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feeding`
--

INSERT INTO `feeding` (`id`, `user_name`, `value_of_feeding`, `date`) VALUES
(63, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(64, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(65, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(66, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(67, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(68, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(69, 'محمد عبدالمتعال', '1000', '2022-04-12'),
(70, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(71, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(72, 'محمد عبدالمتعال', '1000', '2022-04-12'),
(73, 'محمد عبدالمتعال', '1000', '2022-04-12'),
(74, 'محمد عبدالمتعال', '500', '2022-04-12'),
(75, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(76, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(77, 'محمد عبدالمتعال', '500', '2022-04-12'),
(78, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(79, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(80, 'محمد عبدالمتعال', '500', '2022-04-12'),
(81, 'محمد عبدالمتعال', '500', '2022-04-12'),
(82, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(83, 'محمد عبدالمتعال', '500', '2022-04-12'),
(84, 'محمد عبدالمتعال', '500', '2022-04-12'),
(85, 'محمد عبدالمتعال', '20000', '2022-04-12'),
(86, 'محمد عبدالمتعال', '2000', '2022-04-12'),
(87, 'محمد عبدالمتعال', '1000', '2022-04-12'),
(88, 'محمد عبدالمتعال', '7000', '2022-04-12'),
(89, 'محمد عبدالمتعال', '1000', '2022-04-13'),
(90, 'محمد عبدالمتعال', '2000', '2022-05-18'),
(91, 'محمد عبدالمتعال', '10000', '2022-05-19'),
(92, 'محمد عبدالمتعال', '2000', '2022-07-01'),
(93, 'محمد عبدالمتعال', '2000', '2022-07-01'),
(94, 'محمد عبدالمتعال', '1000', '2022-07-01'),
(95, 'محمد عبدالمتعال', '1000', '2022-07-01'),
(96, 'محمد عبدالمتعال', '700', '2022-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `fees_for_batchs`
--

CREATE TABLE `fees_for_batchs` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `type_certificate` varchar(50) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `register_fee` int(11) NOT NULL,
  `year_fee` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fees_for_batchs`
--

INSERT INTO `fees_for_batchs` (`id`, `department`, `type_certificate`, `batch`, `register_fee`, `year_fee`, `username`, `date`, `hours`) VALUES
(2, 'تقنية معلومات', 'بكلاريوس', '1', 1500, 250000, 'احمد عمار صديق', '2022-05-18', '07:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `fisal_bank`
--

CREATE TABLE `fisal_bank` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `ipan_code` varchar(10) NOT NULL,
  `balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fisal_bank`
--

INSERT INTO `fisal_bank` (`id`, `account_name`, `account_number`, `ipan_code`, `balance`) VALUES
(1, 'mohammed ahmed', '1234567', '1212', '54247500');

-- --------------------------------------------------------

--
-- Table structure for table `khartoum_bank`
--

CREATE TABLE `khartoum_bank` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `ipan_code` varchar(10) NOT NULL,
  `balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khartoum_bank`
--

INSERT INTO `khartoum_bank` (`id`, `account_name`, `account_number`, `ipan_code`, `balance`) VALUES
(1, 'moaz sal3a', '2345678', '1313', '69992603000');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `name_of_take` varchar(100) NOT NULL,
  `type_of_job` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `value_of_loans` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `loan_from` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status_of_discount_from_salary` varchar(5) NOT NULL DEFAULT 'no',
  `account_name` varchar(100) NOT NULL,
  `check_accountant` varchar(100) DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `name_of_take`, `type_of_job`, `phone_number`, `value_of_loans`, `username`, `loan_from`, `date`, `status_of_discount_from_salary`, `account_name`, `check_accountant`) VALUES
(55, 'احمد عمار صديق', 'deputy_managing_director', '099991233', '40000', 'محمد عبد المتعال', 'unv_safe', '2022-04-07', 'yes', 'snhory_acc', 'done'),
(56, 'احمد عمار صديق', 'deputy_managing_director', '099991233', '1', 'محمد عبد المتعال', 'unv_safe', '2022-04-07', 'yes', 'bssa', 'done'),
(57, 'محمد عبد المتعال', 'accounting', '099999945', '29000', 'محمد عبد المتعال', 'bank_safe', '2022-04-08', 'yes', 'bssa ', 'done'),
(58, 'محمد عبد المتعال', 'accounting', '099999945', '2000', 'محمد عبد المتعال', 'bank_safe', '2022-04-08', 'yes', 'bssa', 'done'),
(59, 'بشير عبد الملك', 'accounting', '0934678244', '29000', 'محمد عبد المتعال', '', '2022-04-09', 'yes', '', 'none'),
(60, 'بشير عبد الملك', 'accounting', '0934678244', '1000', 'محمد عبد المتعال', '', '2022-04-09', 'yes', '', 'none'),
(61, 'حسن عصمت', 'tetcher', '0934678244', '50000', 'محمد عبد المتعال', '', '2022-04-09', 'yes', '', 'none'),
(62, 'حسن عصمت', 'tetcher', '0934678244', '40000', 'محمد عبد المتعال', '', '2022-04-09', 'yes', '', 'none'),
(63, 'محمد عبد المتعال', 'accounting', '099999945', '20000', 'محمد عبد المتعال', '', '2022-04-10', 'yes', '', 'none'),
(64, 'محمد عبد المتعال', 'accounting', '099999945', '5000', 'محمد عبد المتعال', '', '2022-04-10', 'yes', '', 'none'),
(65, 'محمد عبد المتعال', 'accounting', '099999945', '29000', 'محمد عبد المتعال', '', '2022-04-10', 'yes', '', 'none'),
(66, 'ياسر محمد', 'worker', '3456545', '1000', 'محمد عبد المتعال', '', '2022-04-12', 'yes', '', 'none'),
(67, 'بشير عبد الملك', 'accounting', '0934678244', '5000', 'محمد عبد المتعال', '', '2022-04-13', 'yes', '', 'none'),
(68, 'عمر حامد حسن حامد', 'accounting', '09326744', '30000', 'محمد عبد المتعال', 'bank_safe', '2022-04-18', 'no', 'snhory_acc', 'done'),
(69, 'احمد عمار صديق', 'deputy_managing_director', '099991233', '4000', 'محمد عبد المتعال', '', '2022-05-18', 'yes', '', 'none'),
(70, 'افراح الوسيلة', 'accounting', '09765434', '10000', 'محمد عبد المتعال', '', '2022-05-19', 'yes', '', 'none'),
(71, 'snhoory', 'General Manager', '099991233', '5000', 'محمد عبد المتعال', '', '2022-06-30', 'yes', '', 'none'),
(72, 'snhoory', 'General Manager', '099991233', '1000', 'snhory', '', '2022-06-30', 'yes', '', 'none'),
(73, 'افراح الوسيلة', 'tetcher', '09765443', '1000', 'محمد عبد المتعال', '', '2022-06-30', 'no', '', 'none'),
(74, 'snhoory', 'General Manager', '099991233', '30000', 'snhory', '', '2022-07-01', 'no', '', 'none'),
(75, 'snhoory', 'General Manager', '099991233', '200', 'snhory', '', '2022-07-01', 'no', '', 'none'),
(76, 'snhoory', 'General Manager', '099991233', '200', 'snhory', '', '2022-07-01', 'no', '', 'none'),
(77, 'hassen', 'tetcher', '0934678244', '', 'snhory', '', '2022-07-01', 'yes', '', 'none'),
(78, 'bssa ', 'Accountant', '0934678244', '30000', '', '', '2022-07-05', 'yes', '', 'none'),
(79, 'hassen', 'tetcher', '0934678244', '', '', '', '2022-07-05', 'no', '', 'none'),
(80, 'hassen', 'tetcher', '0934678244', '', '', '', '2022-07-05', 'no', '', 'none'),
(81, 'bssa ', 'Accountant', '0934678244', '30000', '', '', '2022-07-05', 'yes', '', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `medical_exam_doctors`
--

CREATE TABLE `medical_exam_doctors` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '0000',
  `admin_add` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `del` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_exam_doctors`
--

INSERT INTO `medical_exam_doctors` (`id`, `full_name`, `phone_number`, `email`, `address`, `specialization`, `username`, `password`, `admin_add`, `date`, `hours`, `del`) VALUES
(1, 'snhoory', '0934678244', 'bsheer@gmail.com', 'omdorman', 'Optics', 'snhoory', '0000', '', '2022-07-06', '11:07:52', 'no'),
(2, 'bssa', '09999123', 'siddig@gmail.com', 'omdorman', 'GP', 'bssa', '0000', '', '2022-07-06', '11:07:29', 'no'),
(4, 'snhoory', '08999123', 'siddig@gmail.com', 'omdorman', 'Psychologist', 'snhoory4', '0000', '', '2022-07-06', '11:07:14', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `med_doctor`
--

CREATE TABLE `med_doctor` (
  `id` int(11) NOT NULL,
  `form_number` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `college` varchar(50) NOT NULL,
  `answer_q1` varchar(200) NOT NULL,
  `answer_q2` varchar(200) NOT NULL,
  `answer_q3` varchar(200) NOT NULL,
  `answer_q4` varchar(200) NOT NULL,
  `result_bloode` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `med_doctor`
--

INSERT INTO `med_doctor` (`id`, `form_number`, `name`, `college`, `answer_q1`, `answer_q2`, `answer_q3`, `answer_q4`, `result_bloode`, `date`, `hours`, `year`) VALUES
(1, '234567', 'عمر حامح عمر مرغني', 'كلية دراسات الحاسوب', 'no', 'no', 'no', 'no', '', '2022-04-27', '01:04:38', '22'),
(2, '12345678', 'احمد عمار صديق مصطفى', 'كلية دراسات الحاسوب', 'no', 'no', 'no', 'no', '', '2022-04-27', '01:04:00', '22'),
(7, '31001913', 'محمد عبدالمتعال الحسين احمد', 'دراسات الحاسوب', 'لا', 'لا', 'لا', 'الشيب', 'o+', '2022-05-12', '10:05:37', '22'),
(8, '997654', 'عمر حامد مرغني محمد', 'كلية دراسات الحاسوب', 'لا', 'لا', 'لا', 'لا', 'A+', '2022-05-14', '02:05:31', '22'),
(9, '555999', 'يوسف خالد احمد', 'كلية دراسات الحاسوب', 'لا', 'لا', 'لا', 'نعم السكري', 'A+', '2022-05-19', '01:05:26', '22'),
(10, '559955', 'بشير عبدالملك عوض الكريم', 'كلية دراسات الحاسوب', 'لا', 'لا', 'لا', 'جلحات', 'O+', '2022-06-09', '01:06:24', '22');

-- --------------------------------------------------------

--
-- Table structure for table `med_optics`
--

CREATE TABLE `med_optics` (
  `id` int(11) NOT NULL,
  `form_number` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `college` varchar(50) NOT NULL,
  `answer_q1` varchar(5) NOT NULL,
  `answer_q2` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `med_optics`
--

INSERT INTO `med_optics` (`id`, `form_number`, `name`, `college`, `answer_q1`, `answer_q2`, `date`, `hours`, `year`) VALUES
(1, '12345678', 'احمد عمار صديق مصطفى', 'كلية دراسات الحاسوب', '6', 'ليس لديه اي اصابة', '2022-04-26', '05:04:41', '22'),
(3, '234567', 'عمر حامح عمر مرغني', 'كلية دراسات الحاسوب', '6', 'no', '2022-04-27', '01:04:26', '22'),
(4, '31001913', 'محمد عبدالمتعال الحسين احمد', 'دراسات الحاسوب', '6', 'لا', '2022-05-12', '10:05:53', '22'),
(5, '997654', 'عمر حامد مرغني محمد', 'كلية دراسات الحاسوب', '6', 'لا', '2022-05-14', '02:05:04', '22'),
(6, '555999', 'يوسف خالد احمد', 'كلية دراسات الحاسوب', '6', 'لا', '2022-05-19', '01:05:13', '22'),
(7, '559955', 'بشير عبدالملك عوض الكريم', 'كلية دراسات الحاسوب', '6', 'لا', '2022-06-09', '01:06:55', '22');

-- --------------------------------------------------------

--
-- Table structure for table `med_psychologist`
--

CREATE TABLE `med_psychologist` (
  `id` int(11) NOT NULL,
  `form_number` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `college` varchar(20) NOT NULL,
  `answer_q1` varchar(5) NOT NULL,
  `answer_q2` varchar(100) NOT NULL,
  `answer_q3` varchar(100) NOT NULL,
  `answer_q4` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `med_psychologist`
--

INSERT INTO `med_psychologist` (`id`, `form_number`, `name`, `college`, `answer_q1`, `answer_q2`, `answer_q3`, `answer_q4`, `date`, `hours`, `year`) VALUES
(1, '12345678', 'احمد عمار صديق مصطفى', 'كلية دراسات الحاسوب', '6', 'no', 'no', 'no', '2022-04-27', '01:04:15', '22'),
(2, '234567', 'عمر حامح عمر مرغني', 'كلية دراسات الحاسوب', '5', 'no', 'no', 'no', '2022-04-27', '02:04:45', '22'),
(3, '31001913', 'محمد عبدالمتعال الحسين احمد', 'دراسات الحاسوب', '2', 'لا', 'لا', 'لا', '2022-05-12', '10:05:07', '22'),
(4, '997654', 'عمر حامد مرغني محمد', 'كلية دراسات الحاسوب', '4', 'لا', 'لا', 'نعم', '2022-05-14', '02:05:49', '22'),
(5, '555999', 'يوسف خالد احمد', 'كلية دراسات الحاسوب', '2', 'لا', 'لا', 'لا', '2022-05-19', '01:05:09', '22'),
(6, '559955', 'بشير عبدالملك عوض الكريم', 'كلية دراسات الحاسوب', '4', 'لا', 'لا', 'لا', '2022-06-09', '01:06:40', '22');

-- --------------------------------------------------------

--
-- Table structure for table `monye_safe`
--

CREATE TABLE `monye_safe` (
  `id` int(1) NOT NULL,
  `bank_safe` int(11) NOT NULL,
  `unv_safe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monye_safe`
--

INSERT INTO `monye_safe` (`id`, `bank_safe`, `unv_safe`) VALUES
(1, 1000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `mustahqat`
--

CREATE TABLE `mustahqat` (
  `id` int(11) NOT NULL,
  `name_of_take` varchar(100) NOT NULL,
  `type_jop` varchar(20) NOT NULL,
  `value_mustahqat` varchar(20) NOT NULL,
  `type_safe` varchar(30) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `date_of_mus` date NOT NULL,
  `hours_of_mus` time NOT NULL,
  `accountant_name` varchar(100) NOT NULL,
  `check_accountant` varchar(20) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mustahqat`
--

INSERT INTO `mustahqat` (`id`, `name_of_take`, `type_jop`, `value_mustahqat`, `type_safe`, `user_name`, `date_of_mus`, `hours_of_mus`, `accountant_name`, `check_accountant`) VALUES
(29, 'ahmed ammar', 'emp', '10000', 'bank_safe', 'aahmed', '2022-06-30', '11:06:42', 'snhory_acc', 'done'),
(30, 'faddv', 'emp', '10000', 'bank_safe', 'aahmed', '2022-07-01', '02:07:18', 'bssa', 'done'),
(31, 'ahmed ammar', 'tetcher', '10000', 'bank_safe', 'aahmed', '2022-07-01', '04:07:37', 'bssa', 'done'),
(32, 'ahmed ammar', 'worker', '300', 'bank_safe', 'aahmed', '2022-07-01', '05:07:33', 'bssa', 'done'),
(33, 'وجدان محمد', 'tetcher', '300', 'bank_safe', 'aahmed', '2022-07-01', '05:07:37', 'bssa', 'done'),
(34, 'وجدان محمد', 'worker', '5000', 'unv_safe', 'aahmed', '2022-07-01', '05:07:00', 'bssa', 'done'),
(35, '', 'emp', '', '', 'aahmed', '2022-07-05', '06:07:43', '', 'none'),
(36, 'ahmed ammar', 'emp', '10000', '', 'aahmed', '2022-07-05', '09:07:37', '', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `new_std_form_info`
--

CREATE TABLE `new_std_form_info` (
  `id` int(11) NOT NULL,
  `form_number` varchar(20) NOT NULL,
  `name_std` varchar(100) NOT NULL,
  `college` varchar(150) NOT NULL,
  `type_certificate_unv` varchar(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `type_certifcate` varchar(100) NOT NULL,
  `course` varchar(10) NOT NULL,
  `certifcate_rate` varchar(10) NOT NULL,
  `set_number` varchar(10) NOT NULL,
  `nationality_number` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nationality` varchar(10) NOT NULL,
  `religion` varchar(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `area` varchar(10) NOT NULL,
  `home_number` varchar(10) NOT NULL,
  `name_of_guardian` varchar(100) NOT NULL,
  `jop_guardian` varchar(50) NOT NULL,
  `relatuve_relation` varchar(10) NOT NULL,
  `phone_of_guardian` varchar(20) NOT NULL,
  `phone_std` varchar(20) NOT NULL,
  `email_std` varchar(100) NOT NULL,
  `name_closest_relative` varchar(100) NOT NULL,
  `address_closest_relative` varchar(50) NOT NULL,
  `phone_closest_relative` varchar(20) NOT NULL,
  `personal_photo` varchar(300) NOT NULL,
  `photo_nationality_number` varchar(300) NOT NULL,
  `name_of_brother` varchar(100) NOT NULL,
  `univirsity_number` varchar(50) NOT NULL,
  `card_photo` varchar(300) NOT NULL,
  `name_of_father_police` varchar(100) NOT NULL,
  `services_certificate` varchar(300) NOT NULL,
  `name_of_fater_unv` varchar(100) NOT NULL,
  `services_certificate_unv` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `year` varchar(5) NOT NULL,
  `review` varchar(10) NOT NULL DEFAULT 'none',
  `notes_not_submit` varchar(500) NOT NULL,
  `descount_rate` varchar(50) NOT NULL DEFAULT '0%',
  `optic` varchar(10) NOT NULL DEFAULT 'none',
  `doctor` varchar(10) NOT NULL DEFAULT 'none',
  `psychologist` varchar(10) NOT NULL DEFAULT 'none',
  `interview` varchar(8) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_std_form_info`
--

INSERT INTO `new_std_form_info` (`id`, `form_number`, `name_std`, `college`, `type_certificate_unv`, `department`, `type_certifcate`, `course`, `certifcate_rate`, `set_number`, `nationality_number`, `gender`, `nationality`, `religion`, `state`, `city`, `area`, `home_number`, `name_of_guardian`, `jop_guardian`, `relatuve_relation`, `phone_of_guardian`, `phone_std`, `email_std`, `name_closest_relative`, `address_closest_relative`, `phone_closest_relative`, `personal_photo`, `photo_nationality_number`, `name_of_brother`, `univirsity_number`, `card_photo`, `name_of_father_police`, `services_certificate`, `name_of_fater_unv`, `services_certificate_unv`, `date`, `hours`, `year`, `review`, `notes_not_submit`, `descount_rate`, `optic`, `doctor`, `psychologist`, `interview`) VALUES
(1, '12345678', 'احمد عمار صديق مصطفى', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'ثانوية', 'ادبي', '80%', '7788', '118579654', 'male', 'مسلم', 'مانشيستر', 'بحري', 'الشعبية', '434', 'الصادق  صد', 'محامي', 'محامي', 'اب', '09876545', '0987654345', 'ahme@gmail.com', 'ياسر صديق', 'امدرمان', '098766456', '6261ee30a0966.jpg', '6261ee30a0f99.png', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '2022-04-22', '01:04:16', '22', 'good', '', '0%', 'done', 'none', 'done', 'done'),
(2, '234567', 'عمر حامح عمر مرغني', 'كلية دراسات الحاسوب', 'دبلوم', 'تقنية المعلومات', 'ثانوية', 'ادبي', '70%', '87665', '4356789', 'male', 'مسلم', 'جبل اولياء', 'الجبل', 'الجبل', '456', 'حامد مرغني', 'في الشرطة', 'في الشرطة', 'اب', '09987654', '09876543', 'omer@gmail.com', 'حسن حامد', 'الجبل', '0987654', '62684ce69acc9.png', '62684ce69dc00.png', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '2022-04-26', '09:04:58', '22', 'good', '', '0%', 'done', 'done', 'done', 'none'),
(3, '31001913', 'محمد عبدالمتعال الحسين احمد', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية المعلومات', 'ثانوية', 'علمي', '77%', '13000', '34789045789', 'male', 'مسلم', 'مانشيستر', 'لندن', 'الشعبية', '114', '', 'محامي', 'محامي', 'اب', '09876545', '0987654345', 'omer@gmail.com', 'حسن حامد', 'امدرمان', '0987654222', '627d6d95b8dc5.jpg', '627d6d95b9153.jpg', 'ريان عبد المتعال', '1731001913', '627d6d95b058b.png', 'none', 'none', 'none', 'none', '2022-05-12', '10:05:01', '22', 'good', '', '10%', 'done', 'done', 'done', 'none'),
(4, '997654', 'عمر حامد مرغني محمد', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'ثانوية', 'ادبي', '79.9%', '978654', '1234589', 'male', 'مسلم', 'مانشيستر', 'الجبل', 'الجبل', '114', 'حامد مرغني', 'اعمال حره', 'اعمال حره', 'اب', '09987654', '0926271827', 'omer@gmail.com', 'ياسر صديق', 'الجبل', '0987654222', '627fa1497c847.jpg', '627fa1497ceb4.jpg', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '2022-05-14', '02:05:09', '22', 'good', '', '0%', 'done', 'done', 'done', 'none'),
(5, '555999', 'يوسف خالد احمد', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'ثانوية', 'ادبي', '80%', '19000', '12345890', 'male', 'مسلم', 'جبل اولياء', 'الجبل', 'الجبل', '565', 'الصادق  صد', 'اعمال حره', 'اعمال حره', 'اب', '87543245', '0926271827', 'yosif@gmail.com', 'حسن حامد', 'امدرمان', '45678765', '6286276fbbc79.jpg', '6286276fcfa2e.jpg', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '2022-05-19', '01:05:07', '22', 'bad', '35', '0%', 'done', 'done', 'done', 'done'),
(6, '559955', 'بشير عبدالملك عوض الكريم', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'ثانوية', 'علمي', '75%', '88889', '987654123', 'male', 'مسلم', 'الخرطوم', 'الخرطوم', 'المعموره', '1199', 'عبدالملك ع', 'كابتن', 'كابتن', 'اب', '0901234376', '0902444525', 'basheercrash@hotmail.com', 'الصومالي', 'المعموره', '09065275687', '62a1df0946cfb.jpg', '62a1df094d23e.jpg', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '2022-06-09', '01:06:41', '22', 'none', '', '0%', 'none', 'none', 'none', 'none'),
(7, 'fy', 'yt', 'كلية دراسات الحاسوب', 'بكلاريوس', 'tfu', '', 'ryd', 'rydr', 'rdy', 'ryd', 'ryd', 'rhg', 'dr', 'yu', 'rd', 'yut', 'yrt', 'yrd', '', 'yrd', 'rytf', 'tgy', 'ftdr', 'rd', 'dr', 'rd', 'ydrk', 'ryd', 'ytf', 'rdyt', 'rdy', 'dry', '', 'yrdkt', 'ert', '2022-07-26', '23:34:22', '22', 'none', '', '0%', 'none', 'none', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `new_std_like_api`
--

CREATE TABLE `new_std_like_api` (
  `id` int(11) NOT NULL,
  `form_number` varchar(50) NOT NULL,
  `name_std` varchar(100) NOT NULL,
  `univirsity` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `type_certificate_unv` varchar(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `type_certifcate` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `certifcate_rate` varchar(10) NOT NULL,
  `set_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_std_like_api`
--

INSERT INTO `new_std_like_api` (`id`, `form_number`, `name_std`, `univirsity`, `college`, `type_certificate_unv`, `department`, `type_certifcate`, `course`, `certifcate_rate`, `set_number`) VALUES
(1, '12345678', 'احمد عمار صديق مصطفى', 'جامعة الرباط الوطني', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'ثانوية', 'ادبي', '80%', '7788'),
(4, '31001913', 'محمد عبدالمتعال الحسين احمد', 'جامعة الرباط الوطني', 'دراسات الحاسوب', 'بكلاريوس', 'تقنية المعلومات', 'ثانوية', 'علمي', '77%', '13000'),
(5, '42224', 'بشير عبدالملك محمد بشير', 'جامعة الرباط الوطني', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية المعلومات', 'ثانوية', 'ادبي', '75%', '87353'),
(6, '997654', 'عمر حامد مرغني محمد', 'حامعة الرباط الوطني', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'ثانوية', 'ادبي', '79.9%', '978654'),
(7, '555999', 'يوسف خالد احمد', 'جامعة الرباط الوطني', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'ثانوية', 'ادبي', '80%', '19000'),
(8, '559955', 'بشير عبدالملك عوض الكريم', 'جامعة الرباط الوطني', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'ثانوية', 'علمي', '75%', '88889'),
(9, '232323', 'ahmed yasir siddig ', 'جامعة الرباط الوطني', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'ثانوية', 'علمي', '80%', '87765');

-- --------------------------------------------------------

--
-- Table structure for table `safe_monye`
--

CREATE TABLE `safe_monye` (
  `id` int(11) NOT NULL,
  `type_of_safe` varchar(20) NOT NULL,
  `total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `safe_monye`
--

INSERT INTO `safe_monye` (`id`, `type_of_safe`, `total`) VALUES
(1, 'bank_safe', 7114501),
(2, 'unv_safe', 7564499);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `type_of_jop` varchar(20) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `value_loan` varchar(100) NOT NULL,
  `value_salary` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `accountant_name` varchar(100) NOT NULL,
  `check_accountant` varchar(10) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `name`, `phone_number`, `type_of_jop`, `salary`, `value_loan`, `value_salary`, `date`, `accountant_name`, `check_accountant`) VALUES
(27, 'حسن عصمت', '0934678244', 'tetcher', '', '', '0', '2022-04-09', 'snhory_acc', 'done'),
(28, 'حسن عصمت', '0934678244', 'tetcher', '', '', '90000', '2022-04-09', 'bssa', 'done'),
(29, 'احمد عمار صديق', '099991233', 'deputy_managing_dire', '', '', '-1', '2022-04-10', 'bssa', 'done'),
(30, 'محمد عبد المتعال', '099999945', 'accounting', '', '', '-1000', '2022-04-10', 'bssa', 'done'),
(31, 'بشير عبد الملك', '0934678244', 'accounting', '', '', '0', '2022-04-10', '', 'done'),
(32, 'محمد عبد المتعال', '099999945', 'accounting', '', '', '5000', '2022-04-10', 'snhory_acc', 'done'),
(33, 'احمد عمار صديق', '099991233', 'deputy_managing_dire', '', '', '40000', '2022-04-10', 'bssa ', 'done'),
(34, 'محمد عبد المتعال', '099999945', 'accounting', '', '', '1000', '2022-04-10', 'bssa ', 'done'),
(35, 'بشير عبد الملك', '0934678244', 'accounting', '', '', '30000', '2022-04-13', 'bssa', 'done'),
(36, 'احمد عمار صديق', '099991233', 'deputy_managing_dire', '', '', '36000', '2022-05-18', 'bssa ', 'done'),
(37, 'افراح الوسيلة', '09765434', 'accounting', '', '', '90000', '2022-05-19', '', 'none'),
(38, 'snhoory', '099991233', 'General Manager', '40000', '6000', '34000', '2022-07-01', '', 'none'),
(39, 'افراح الوسيلة', '09765434', 'accounting', '100000', '', '', '2022-07-01', '', 'none'),
(40, 'بشير عبد الملك', '09999123', 'worker', '', '', '40000', '2022-07-01', '', 'none'),
(41, 'ahmed ammar', '09876543', 'Human Resource', '2000000', '', '', '2022-07-01', '', 'none'),
(42, 'bssa', '091111111', 'tetcher', '100000', '', '', '2022-07-01', '', 'none'),
(46, 'nagla mohammed', '01465365744', 'accountant', '80000', '', '', '2022-07-01', '', 'none'),
(47, 'عيسى محمد معتصم', '09784322', 'tetcher', '60000', '', '60000', '2022-07-01', '', 'none'),
(48, 'عيسى محمد معتصم', '09784322', 'tetcher', '60000', '', '60000', '2022-07-01', '', 'none'),
(49, 'بشير عبد الملك', '012387361', 'tetcher', '50000', '', '50000', '2022-07-01', '', 'none'),
(50, 'snhoory', '099991233', 'General Manager', '40000', '', '40000', '2022-07-01', '', 'none'),
(51, 'افراح الوسيلة', '09765434', 'accounting', '100000', '', '100000', '2022-07-01', 'snhory_acc', 'done'),
(52, '', '091267845', 'tetcher', '60000', '', '60000', '2022-07-01', '', 'none'),
(53, 'hassen', '0934678244', 'tetcher', '90000', '0', '90000', '2022-07-01', '', 'none'),
(54, 'ياسر محمد احمد', '095678234', 'tetcher', '3000', '', '3000', '2022-07-01', '', 'none'),
(55, 'ياسر محمد احمد', '095678234', 'tetcher', '3000', '', '3000', '2022-07-01', '', 'none'),
(56, 'bssa ', '0934678244', 'Accountant', '90000', '60000', '30000', '2022-07-05', 'bssa ', 'done'),
(57, 'ياسر محمد', '3456545', 'worker', '4000', '1000', '3000', '2022-07-26', '', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `scientific_affairs_admins`
--

CREATE TABLE `scientific_affairs_admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '0000',
  `admin_add` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `del` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scientific_affairs_admins`
--

INSERT INTO `scientific_affairs_admins` (`id`, `full_name`, `phone_number`, `email`, `address`, `username`, `password`, `admin_add`, `date`, `hours`, `del`) VALUES
(1, 'snhoory', '0934678255', 'siddig@gmail.com', 'burry', 'snhoory', '0000', '', '2022-07-06', '11:07:43', 'no'),
(2, 'bssa', '23456', 'ane@gmail.com', 'omdorman', 'bssa54', '0000', 'snhoory', '2022-07-26', '12:07:31', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `scientific_affairs_employes`
--

CREATE TABLE `scientific_affairs_employes` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `academic_qualification` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '0000',
  `date_of_add` varchar(30) NOT NULL,
  `hours` varchar(20) NOT NULL,
  `del` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scientific_affairs_employes`
--

INSERT INTO `scientific_affairs_employes` (`id`, `full_name`, `phone_number`, `email`, `address`, `academic_qualification`, `username`, `password`, `date_of_add`, `hours`, `del`) VALUES
(1, 'حسن عصمت', '09346782477', 'bsheer@gmail.com', 'omdorman', 'بكاليريوس تقنية معلومات', 'hsco', '0000', '2022-07-06', '12:07:48', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `std_reg_fees`
--

CREATE TABLE `std_reg_fees` (
  `id` int(11) NOT NULL,
  `unv_id` varchar(50) NOT NULL,
  `name_std` varchar(100) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `type_certifcate_unv` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `reg_for_semester` varchar(5) NOT NULL,
  `total_pay` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `std_reg_fees`
--

INSERT INTO `std_reg_fees` (`id`, `unv_id`, `name_std`, `batch`, `type_certifcate_unv`, `department`, `status`, `reg_for_semester`, `total_pay`, `date`, `time`) VALUES
(1, '1-22-00012239', 'احمد عمار صديق مصطفى', '1', 'بكلاريوس', 'تقنية معلومات', 'التسجيل ودفع رسوم السمستر الاول', '1', '125000', '2022-06-26', '05:06:54'),
(2, '1-22-00012239', 'احمد عمار صديق مصطفى', '1', 'بكلاريوس', 'تقنية معلومات', 'التسجيل ودفع رسوم السمستر الثاني', '2', '125000', '2022-06-26', '07:06:06'),
(3, '1-22-00013381', 'يوسف خالد احمد', '1', 'بكلاريوس', 'تقنية معلومات', 'التسجيل ودفع رسوم السمستر الاول', '1', '126500', '2022-06-26', '10:06:45'),
(4, '1-22-00015192', 'بشير عبدالملك عوض الكريم', '1', 'بكلاريوس', 'تقنية معلومات', 'التسجيل ودفع رسوم السمستر الاول', '1', '126500', '2022-06-27', '11:06:05'),
(5, '1-22-00015192', 'بشير عبدالملك عوض الكريم', '1', 'بكلاريوس', 'تقنية معلومات', 'التسجيل ودفع رسوم السمستر الثاني', '2', '125000', '2022-06-27', '11:06:57'),
(6, '1-22-00015192', 'بشير عبدالملك عوض الكريم', '1', 'بكلاريوس', 'تقنية معلومات', 'التسجيل ودفع رسوم السمستر الاول', '1', '126500', '2022-06-27', '11:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `unv_id` varchar(25) NOT NULL,
  `name_std` varchar(100) NOT NULL,
  `college` varchar(50) NOT NULL,
  `type_certifcate_unv` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `personal_photo` varchar(255) NOT NULL,
  `descount_rate` int(10) NOT NULL,
  `note_about_descount` varchar(100) NOT NULL,
  `batch` int(5) NOT NULL,
  `year_admisson` int(5) NOT NULL,
  `register_fee` int(50) NOT NULL,
  `year_fee` int(50) NOT NULL,
  `confirm_pay_s1` varchar(10) NOT NULL DEFAULT 'none',
  `confirm_pay_s2` varchar(10) NOT NULL DEFAULT 'none',
  `confirm_pay_s3` varchar(10) NOT NULL DEFAULT 'none',
  `confirm_pay_s4` varchar(10) NOT NULL DEFAULT 'none',
  `confirm_pay_s5` varchar(10) NOT NULL DEFAULT 'none',
  `confirm_pay_s6` varchar(10) NOT NULL DEFAULT 'none',
  `confirm_pay_s7` varchar(10) NOT NULL DEFAULT 'none',
  `confirm_pay_s8` varchar(10) NOT NULL DEFAULT 'none',
  `GPA_S1` varchar(10) NOT NULL DEFAULT '0.00',
  `GPA_S2` varchar(10) NOT NULL DEFAULT 'none',
  `GPA_S3` varchar(10) NOT NULL DEFAULT 'none',
  `GPA_S4` varchar(10) NOT NULL DEFAULT 'none',
  `GPA_S5` varchar(10) NOT NULL DEFAULT 'none',
  `GPA_S6` varchar(10) NOT NULL DEFAULT 'none',
  `GPA_S7` varchar(10) NOT NULL DEFAULT 'none',
  `GPA_S8` varchar(10) NOT NULL DEFAULT 'none',
  `TGPA_S2` varchar(10) NOT NULL DEFAULT 'none',
  `TGPA_S3` varchar(10) NOT NULL DEFAULT 'none',
  `TGPA_S4` varchar(10) NOT NULL DEFAULT 'none',
  `TGPA_S5` varchar(10) NOT NULL DEFAULT 'none',
  `TGPA_S6` varchar(10) NOT NULL DEFAULT 'none',
  `TGPA_S7` varchar(10) NOT NULL DEFAULT 'none',
  `TGPA_S8` varchar(10) NOT NULL DEFAULT 'none',
  `TGPA` varchar(10) NOT NULL DEFAULT '0.00',
  `password` varchar(50) NOT NULL DEFAULT '0000',
  `date` date NOT NULL,
  `hours` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `unv_id`, `name_std`, `college`, `type_certifcate_unv`, `department`, `gender`, `phone_number`, `email`, `personal_photo`, `descount_rate`, `note_about_descount`, `batch`, `year_admisson`, `register_fee`, `year_fee`, `confirm_pay_s1`, `confirm_pay_s2`, `confirm_pay_s3`, `confirm_pay_s4`, `confirm_pay_s5`, `confirm_pay_s6`, `confirm_pay_s7`, `confirm_pay_s8`, `GPA_S1`, `GPA_S2`, `GPA_S3`, `GPA_S4`, `GPA_S5`, `GPA_S6`, `GPA_S7`, `GPA_S8`, `TGPA_S2`, `TGPA_S3`, `TGPA_S4`, `TGPA_S5`, `TGPA_S6`, `TGPA_S7`, `TGPA_S8`, `TGPA`, `password`, `date`, `hours`) VALUES
(7, '1-22-00012239', 'احمد عمار صديق مصطفى', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'male', '0987654345', 'ahme@gmail.com', '6261ee30a0966.jpg', 0, 'لا توجد ملاحظة', 1, 2022, 1500, 250000, 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '3.04', '3.73913043', '2.72222222', 'none', 'none', 'none', 'none', 'none', '3.375', '3.16711755', 'none', 'none', 'none', 'none', 'none', '3.04', '1234567', '0000-00-00', '00:00:00'),
(8, '1-22-00013381', 'يوسف خالد احمد', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'male', '0926271827', 'yosif@gmail.com', '6286276fbbc79.jpg', 0, 'لا توجد ملاحظة', 1, 2022, 1500, 250000, 'done', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '3.2', '3.32608695', 'none', 'none', 'none', 'none', 'none', 'none', '3.10416666', 'none', 'none', 'none', 'none', 'none', 'none', '3.10416666', '0000', '0000-00-00', '00:00:00'),
(9, '1-22-00015192', 'بشير عبدالملك عوض الكريم', 'كلية دراسات الحاسوب', 'بكلاريوس', 'تقنية معلومات', 'male', '0902444525', 'basheercrash@hotmail.com', '62a1df0946cfb.jpg', 0, 'لا توجد ملاحظة', 1, 2022, 1500, 250000, 'done', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '0.00', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '0.00', '0000', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name_subject` varchar(100) NOT NULL,
  `number_hours_subject` varchar(5) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name_subject`, `number_hours_subject`, `user_name`, `date`, `hour`) VALUES
(1, 'لغة عربية', '3', 'عصام الدين محمد', '2022-05-25', '10:05:03'),
(2, 'لغة انجليزية', '3', 'عصام الدين محمد', '2022-05-25', '10:05:23'),
(3, 'حسبان1', '3', 'عصام الدين محمد', '2022-05-25', '10:05:00'),
(4, 'حسبان2', '3', 'عصام الدين محمد', '2022-05-25', '10:05:30'),
(5, 'لغات برمجة', '4', 'عصام الدين محمد', '2022-05-25', '10:05:47'),
(6, 'قواعد بيانات', '4', 'عصام الدين محمد', '2022-05-25', '10:05:01'),
(7, 'هياكل بيانات', '4', 'عصام الدين محمد', '2022-05-25', '10:05:13'),
(8, 'محاسبة', '3', 'عصام الدين محمد', '2022-05-25', '10:05:55'),
(9, 'فيزياء', '4', 'عصام الدين محمد', '2022-05-25', '10:05:15'),
(10, 'oop', '4', 'عصام الدين محمد', '2022-06-07', '08:06:05'),
(11, 'DB', '4', 'عصام الدين محمد', '2022-06-07', '08:06:19'),
(12, 'OS', '4', 'عصام الدين محمد', '2022-06-07', '08:06:47'),
(13, 'calculas2', '3', 'عصام الدين محمد', '2022-06-07', '08:06:14'),
(14, 'alogrithm', '4', 'عصام الدين محمد', '2022-06-07', '08:06:29'),
(15, 'معمارية حاسوب', '4', 'عصام الدين محمد', '2022-06-07', '08:06:45'),
(16, 'برمجة هيكلية 2', '4', 'عصام الدين محمد', '2022-06-23', '01:06:55'),
(17, 'قواعد بيانات 2', '4', 'عصام الدين محمد', '2022-06-23', '01:06:22'),
(18, 'جبر خطي', '3', 'عصام الدين محمد', '2022-06-23', '01:06:37'),
(19, 'رياضيات متقطعة', '3', 'عصام الدين محمد', '2022-06-23', '01:06:54'),
(20, 'مهارات اتصالات', '3', 'عصام الدين محمد', '2022-06-23', '01:06:21'),
(21, 'econmec', '2', 'bssa3', '2022-07-06', '02:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `submit_std_and_result_subjects`
--

CREATE TABLE `submit_std_and_result_subjects` (
  `id` int(11) NOT NULL,
  `unv_id` varchar(100) NOT NULL,
  `name_std` varchar(100) NOT NULL,
  `type_certifcate_unv` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `batch` varchar(5) NOT NULL,
  `study_year` varchar(10) NOT NULL,
  `semester` varchar(3) NOT NULL,
  `name_subject` varchar(50) NOT NULL,
  `come_to_exam_in_first_time` varchar(5) NOT NULL,
  `come_to_exam_in_second_time` varchar(10) NOT NULL DEFAULT 'none',
  `degree_exam` varchar(10) NOT NULL,
  `degree_exam2` varchar(10) NOT NULL,
  `type_exam` varchar(10) NOT NULL,
  `type_exam2` varchar(10) NOT NULL DEFAULT 'none',
  `number_of_hour_subject` varchar(5) NOT NULL,
  `number_of_points` varchar(10) NOT NULL,
  `number_of_points_2` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `check_tetcher` varchar(10) NOT NULL DEFAULT 'none',
  `check_tetcher2` varchar(10) NOT NULL DEFAULT 'none',
  `status_exam` varchar(11) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submit_std_and_result_subjects`
--

INSERT INTO `submit_std_and_result_subjects` (`id`, `unv_id`, `name_std`, `type_certifcate_unv`, `department`, `batch`, `study_year`, `semester`, `name_subject`, `come_to_exam_in_first_time`, `come_to_exam_in_second_time`, `degree_exam`, `degree_exam2`, `type_exam`, `type_exam2`, `number_of_hour_subject`, `number_of_points`, `number_of_points_2`, `date`, `hour`, `check_tetcher`, `check_tetcher2`, `status_exam`) VALUES
(1, '1-22-00013381', 'يوسف خالد احمد', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'لغة عربية', 'yes', 'none', '90', '', 'normal', 'none', '3', '12', '', '2022-07-26', '12:07:34', 'done', 'none', 'none'),
(2, '1-22-00015192', 'بشير عبدالملك عوض الكريم', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'لغة عربية', 'yes', 'none', '83', '', 'normal', 'none', '3', '10.5', '', '2022-07-26', '12:07:04', 'done', 'none', 'none'),
(3, '1-22-00013381', 'يوسف خالد احمد', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'oop', 'yes', 'none', '90', '', 'normal', 'none', '4', '16', '', '2022-07-26', '12:07:44', 'done', 'none', 'none'),
(4, '1-22-00015192', 'بشير عبدالملك عوض الكريم', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'oop', 'yes', 'none', '70', '', 'normal', 'none', '4', '12', '', '2022-07-26', '12:07:52', 'done', 'none', 'none'),
(5, '1-22-00013381', 'يوسف خالد احمد', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'هياكل بيانات', 'yes', 'none', '80', '', 'normal', 'none', '4', '14', '', '2022-07-26', '12:07:07', 'done', 'none', 'none'),
(6, '1-22-00015192', 'بشير عبدالملك عوض الكريم', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'هياكل بيانات', 'yes', 'none', '80', '', 'normal', 'none', '4', '14', '', '2022-07-26', '12:07:16', 'done', 'none', 'none'),
(7, '1-22-00013381', 'يوسف خالد احمد', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'alogrithm', 'yes', 'none', '60', '', 'normal', 'none', '4', '10', '', '2022-07-26', '12:07:46', 'done', 'none', 'none'),
(8, '1-22-00015192', 'بشير عبدالملك عوض الكريم', 'بكلاريوس', 'تقنية معلومات', '1', 'الاولى', '1', 'alogrithm', 'yes', 'none', '50', '', 'normal', 'none', '4', '8', '', '2022-07-26', '12:07:53', 'done', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `tetchers`
--

CREATE TABLE `tetchers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `academic_qualification1` varchar(50) NOT NULL,
  `academic_qualification2` varchar(50) NOT NULL DEFAULT 'none',
  `academic_qualification3` varchar(50) NOT NULL DEFAULT 'none',
  `salary` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '0000',
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `del` varchar(5) NOT NULL DEFAULT 'no',
  `take_salary` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tetchers`
--

INSERT INTO `tetchers` (`id`, `full_name`, `phone_number`, `email`, `address`, `academic_qualification1`, `academic_qualification2`, `academic_qualification3`, `salary`, `username`, `password`, `date`, `hours`, `del`, `take_salary`) VALUES
(1, 'hassen', '0934678244', '7sco@gmail.com', 'modk', 'it', 'network', '', '90000', 'hsco', '', '2022-04-05', '11:04:33', 'no', 'yes'),
(2, '', '091267845', 'mohamed@gmail.com', 'الصحافة', 'بكاليريوس تقنية معلومات', 'بكلاريوس شبكات', '', '60000', 'mohamed', '', '2022-05-25', '01:05:09', 'no', 'yes'),
(3, 'مصعب الصادق محمد', '09887653', 'mosab@gmail.com', 'امدرمان', 'بكاليريوس تقنية معلومات', 'بكلاريوس شبكات', '', '90000', 'mosab', '156789', '2022-05-25', '01:05:33', 'yes', 'no'),
(4, 'عيسى محمد معتصم', '09784322', 'easa@gmail.com', 'amsd', 'بكلاريوس نظم معلومات', '', '', '60000', 'easa123', '56782', '2022-05-25', '01:05:51', 'no', 'yes'),
(6, 'ياسر محمد احمد', '095678234', 'yasir@gmail.com', 'بحري', 'بكلاريوس محاسبة', '', '', '3000', 'yasir9999', '96372yasir', '2022-05-25', '01:05:44', 'no', 'yes'),
(7, 'بشير عبد الملك', '012387361', 'bsheer@gmail.com', 'المعمورة', 'بكاليريوس تقنية معلومات', '', '', '50000', 'bshaa13', '5637bsha', '2022-05-25', '01:05:53', 'no', 'yes'),
(8, 'محمدالفاتح محمد', '0922223443', 'alfatih@gmail.com', 'المعمورة', 'بكاليريوس تقنية معلومات', '', '', '50000', 'alfatih', '87643', '2022-05-25', '01:05:00', 'no', 'no'),
(9, 'افراح الوسيلة', '09765443', 'afra@gmail.com', 'امدرمان', 'ماجستير', '', '', '100000', 'afrah', '1234', '2022-06-05', '12:06:39', 'no', 'no'),
(10, 'bssa', '091111111', 'bssa@gmail.com', 'alsahafa', 'bechaliros IT', '', '', '100000', 'bssa', '0000', '2022-06-28', '11:06:27', 'no', 'yes'),
(11, 'aisha', '9876543456', 'ausg@gmail.com', 'المعمورة', 'بكاليريوس تقنية معلومات', '', '', '50000', 'aish', '0000', '2022-07-26', '12:07:13', 'no', 'no'),
(12, 'm7med', '234567', 'bssa@gmail.com', 'alshafa', 'bechaliros IT', '', '', '100000000', 'm7med', '0000', '2022-07-28', '06:07:50', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name_worker` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(20) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `hours` time NOT NULL,
  `del` varchar(4) NOT NULL DEFAULT 'no',
  `take_salary` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name_worker`, `phone_number`, `address`, `salary`, `date`, `hours`, `del`, `take_salary`) VALUES
(1, 'ياسر محمد', '3456545', 'بحري', '4000', '2022-04-04', '06:04:30', 'no', 'yes'),
(2, 'صديق عبدالله', '6789', 'بحري', '300', '2022-04-04', '06:04:29', 'yes', 'no'),
(3, 'محمدعبدو', '', '', '', '2022-04-08', '07:04:06', 'yes', 'no'),
(4, 'بشير عبد الملك', '09999123', 'الصحافة', '40000', '2022-04-08', '07:04:23', 'no', 'yes'),
(5, 'بشير عبد الملك', '0934678244', 'المعمورة', '50000', '2022-06-28', '12:06:29', 'no', 'yes'),
(6, '', '', '', '', '2022-06-28', '12:06:37', 'yes', 'no'),
(7, 'Hassan', '2343456543', 'kh2', '-2345', '2022-06-28', '09:06:20', 'yes', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribution_subject`
--
ALTER TABLE `distribution_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribution_tetcher_exams`
--
ALTER TABLE `distribution_tetcher_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeding`
--
ALTER TABLE `feeding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_for_batchs`
--
ALTER TABLE `fees_for_batchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fisal_bank`
--
ALTER TABLE `fisal_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khartoum_bank`
--
ALTER TABLE `khartoum_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_exam_doctors`
--
ALTER TABLE `medical_exam_doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `med_doctor`
--
ALTER TABLE `med_doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `form_number` (`form_number`);

--
-- Indexes for table `med_optics`
--
ALTER TABLE `med_optics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_psychologist`
--
ALTER TABLE `med_psychologist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monye_safe`
--
ALTER TABLE `monye_safe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mustahqat`
--
ALTER TABLE `mustahqat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_std_form_info`
--
ALTER TABLE `new_std_form_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_std_like_api`
--
ALTER TABLE `new_std_like_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safe_monye`
--
ALTER TABLE `safe_monye`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scientific_affairs_admins`
--
ALTER TABLE `scientific_affairs_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `scientific_affairs_employes`
--
ALTER TABLE `scientific_affairs_employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_reg_fees`
--
ALTER TABLE `std_reg_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unv_id` (`unv_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_std_and_result_subjects`
--
ALTER TABLE `submit_std_and_result_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tetchers`
--
ALTER TABLE `tetchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distribution_subject`
--
ALTER TABLE `distribution_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `distribution_tetcher_exams`
--
ALTER TABLE `distribution_tetcher_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feeding`
--
ALTER TABLE `feeding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `fees_for_batchs`
--
ALTER TABLE `fees_for_batchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fisal_bank`
--
ALTER TABLE `fisal_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khartoum_bank`
--
ALTER TABLE `khartoum_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `medical_exam_doctors`
--
ALTER TABLE `medical_exam_doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `med_doctor`
--
ALTER TABLE `med_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `med_optics`
--
ALTER TABLE `med_optics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `med_psychologist`
--
ALTER TABLE `med_psychologist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `monye_safe`
--
ALTER TABLE `monye_safe`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mustahqat`
--
ALTER TABLE `mustahqat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `new_std_form_info`
--
ALTER TABLE `new_std_form_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `new_std_like_api`
--
ALTER TABLE `new_std_like_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `safe_monye`
--
ALTER TABLE `safe_monye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `scientific_affairs_admins`
--
ALTER TABLE `scientific_affairs_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scientific_affairs_employes`
--
ALTER TABLE `scientific_affairs_employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `std_reg_fees`
--
ALTER TABLE `std_reg_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `submit_std_and_result_subjects`
--
ALTER TABLE `submit_std_and_result_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tetchers`
--
ALTER TABLE `tetchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
