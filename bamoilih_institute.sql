-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2017 at 04:43 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bamoilih_institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(200) NOT NULL,
  `cedit` int(200) NOT NULL,
  `debit` int(200) NOT NULL,
  `balence` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `cedit`, `debit`, `balence`) VALUES
(1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `id` int(255) NOT NULL,
  `ac_name` varchar(255) NOT NULL,
  `ac_number` varchar(255) NOT NULL,
  `ac_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `ac_name`, `ac_number`, `ac_detail`) VALUES
(10, 'Sonali Bank', '33005519', 'Sarulia, Demra, Dhaka'),
(12, 'Dutch Bangla Bank Ltd. ', '1971100010827 ', 'Matuail Branch, Dhaka-1361');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `username` varchar(80) NOT NULL,
  `pass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `ad_id` int(255) NOT NULL,
  `fld0` varchar(255) NOT NULL,
  `fld1` varchar(255) NOT NULL,
  `fld2` varchar(255) NOT NULL,
  `fld3` varchar(255) NOT NULL,
  `fld4` varchar(255) NOT NULL,
  `fld5` varchar(255) NOT NULL,
  `fld6` varchar(255) NOT NULL,
  `fld7` varchar(255) NOT NULL,
  `fld8` varchar(255) NOT NULL,
  `fld9` varchar(255) NOT NULL,
  `fld10` varchar(255) NOT NULL,
  `fld11` varchar(255) NOT NULL,
  `fld12` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admission_date`
--

CREATE TABLE `admission_date` (
  `admission_id` int(10) NOT NULL,
  `admission_date` varchar(255) NOT NULL,
  `admission_time` varchar(255) NOT NULL,
  `admission_t&c` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_date`
--

INSERT INTO `admission_date` (`admission_id`, `admission_date`, `admission_time`, `admission_t&c`) VALUES
(1, '10th Decembar, 2016', '10:00 A.M.', '<p>sadfsdf</p>');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(80) NOT NULL,
  `place` varchar(80) NOT NULL,
  `size` varchar(80) NOT NULL,
  `file` varchar(80) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `place`, `size`, `file`, `link`) VALUES
(1, 'Home page', '336 X 280', '0', 'https://www.facebook.com/bamoilhsc/'),
(2, 'Login Page - Left', '160 X 600', '2.gif', 'facebook.com/bamoilihsc'),
(3, 'Login Page - Right', '160 X 600', '3.png', 'facebook.com/bamoilihsc'),
(4, 'Login Page - Bottom', '970 X 250', '0', 'https://www.facebook.com/bamoilhsc/'),
(5, 'Admission Page - Left', '120 X 600', '5.png', 'https://www.facebook.com/bamoilhsc/'),
(6, 'Admission Page - Right', '120 X 600', '6.png', 'https://www.facebook.com/bamoilhsc/'),
(7, 'Admission Page - Bottom ', '728 X 90', '0', 'https://www.facebook.com/bamoilhsc/'),
(8, 'Download Admit Card - Left', '120 X 600', '8.png', 'https://www.facebook.com/bamoilhsc/'),
(9, 'Download Admit Card - Right', '120 X 600', '9.png', 'https://www.facebook.com/bamoilhsc/'),
(10, 'Download Admit Card - Bottom', '970 X 250', '0', 'https://www.facebook.com/bamoilhsc/');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(222) NOT NULL,
  `app_subject` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `app_type` varchar(255) NOT NULL,
  `app_body` text NOT NULL,
  `app_stats` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendence_temp`
--

CREATE TABLE `attendence_temp` (
  `id` int(255) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mob` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence_temp`
--

INSERT INTO `attendence_temp` (`id`, `student_id`, `name`, `mob`) VALUES
(1, '101', 'Md. Golam Faruque', '8801552358980'),
(2, '845661', 'MD.SAIFULLAH ', '880 01913085092'),
(3, '1064025', 'Md. Ahid Uddin', '880 1716434156'),
(4, '1914366506', 'Sharifa Rashid', '880 01914366506');

-- --------------------------------------------------------

--
-- Table structure for table `bank_transaction`
--

CREATE TABLE `bank_transaction` (
  `id` int(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `ac_number` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `des` varchar(222) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_transaction`
--

INSERT INTO `bank_transaction` (`id`, `invoice`, `ac_number`, `type`, `des`, `amount`, `date`) VALUES
(6, '0001', '33005519', 'D', 'Balance B/D', '1165052', '12/31/2015'),
(7, '153910', '33005519', 'D', 'Student\'s Salary', '985050', '01/03/2016'),
(8, '153892', '33005519', 'D', 'Student\'s Salary', '71025', '01/04/2016'),
(9, '153893', '33005519', 'D', 'Student\'s Salary', '226205', '01/05/2016'),
(10, '153894', '33005519', 'D', 'Student\'s Salary', '138425', '01/06/2016'),
(11, '153895', '33005519', 'D', 'Student\'s Salary', '117925', '01/07/2016'),
(12, '153896', '33005519', 'D', 'Student\'s Salary', '168000', '01/10/2016'),
(13, '153897', '33005519', 'D', 'Student\'s Salary', '78200', '01/11/2016'),
(14, '153898', '33005519', 'D', 'Student\'s Salary', '66505', '01/12/2016'),
(15, '506360662', '33005519', 'W', 'Teacher Salary & Expense', '415000', '01/13/2016'),
(16, '506360663', '33005519', 'W', 'Expense', '55000', '01/13/2016');

-- --------------------------------------------------------

--
-- Table structure for table `birth_sms`
--

CREATE TABLE `birth_sms` (
  `id` int(1) NOT NULL,
  `sms` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birth_sms`
--

INSERT INTO `birth_sms` (`id`, `sms`) VALUES
(1, 'Happy Birthday dear student\r\nMay you life be the best\r\nI wish you a successful future and full marks in your test\r\nHappy Birthday');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `borrower_type` varchar(255) NOT NULL,
  `borrower_id` varchar(255) NOT NULL,
  `date_borrow` varchar(222) NOT NULL,
  `return_date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cedit_and_debit`
--

CREATE TABLE `cedit_and_debit` (
  `id` int(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `trans_for` varchar(255) NOT NULL,
  `for_id` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(200) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `numeric_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `numeric_value`) VALUES
(1, 'Three', 3),
(2, 'Four', 4),
(3, 'Five', 5),
(9, 'Six-boy', 6),
(10, 'Six-Girl', 6),
(11, 'Seven-boy', 7),
(12, 'Seven-Gril', 7),
(13, 'Eight-boy', 8),
(14, 'Eight-Girl', 8),
(15, 'Nine-boy (Arts)', 9),
(16, 'Nine-boy (Commerce)', 9),
(17, 'Nine-boy (Science)', 9),
(18, 'Ten-boy (arts)', 10),
(19, 'Ten-boy (Commerce)', 10),
(20, 'Ten-boy (Science)', 10),
(23, 'XI-Secreterial', 11),
(24, 'XI-Computer', 11),
(25, 'XII-Secreterial', 12),
(26, 'XII-Computer', 12);

-- --------------------------------------------------------

--
-- Table structure for table `class_fee`
--

CREATE TABLE `class_fee` (
  `id` int(20) NOT NULL,
  `class` varchar(200) NOT NULL,
  `fee` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_fee`
--

INSERT INTO `class_fee` (`id`, `class`, `fee`) VALUES
(1, 'Three', 250),
(2, 'Four', 250),
(3, 'Five', 250),
(9, 'Six-boy', 330),
(10, 'Six-Girl', 330),
(11, 'Seven-boy', 350),
(12, 'Seven-Gril', 350),
(13, 'Eight-boy', 350),
(14, 'Eight-Girl', 350),
(15, 'Nine-boy (Arts)', 390),
(16, 'Nine-boy (Commerce)', 390),
(17, 'Nine-boy (Science)', 390),
(18, 'Ten-boy (arts)', 390),
(19, 'Ten-boy (Commerce)', 390),
(20, 'Ten-boy (Science)', 390),
(23, 'XI-Secreterial', 430),
(24, 'XI-Computer', 430),
(25, 'XII-Secreterial', 430),
(26, 'XII-Computer', 430);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(255) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `das` text NOT NULL,
  `file` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `due`
--

CREATE TABLE `due` (
  `id` int(255) NOT NULL,
  `student_id` int(80) NOT NULL,
  `month_no` int(80) NOT NULL,
  `month_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `due`
--

INSERT INTO `due` (`id`, `student_id`, `month_no`, `month_name`) VALUES
(1, 1761001, 3, ' January, February, March.'),
(2, 1761002, 3, ' January, February, March.'),
(3, 1761003, 3, ' January, February, March.'),
(4, 1761004, 3, ' January, February, March.'),
(5, 1761005, 3, ' January, February, March.'),
(6, 1761006, 3, ' January, February, March.'),
(7, 1761007, 3, ' January, February, March.'),
(8, 1761008, 3, ' January, February, March.'),
(9, 1761009, 3, ' January, February, March.'),
(10, 17610010, 3, ' January, February, March.'),
(11, 17610011, 3, ' January, February, March.'),
(12, 17610012, 3, ' January, February, March.'),
(13, 17610013, 3, ' January, February, March.'),
(14, 17610014, 3, ' January, February, March.'),
(15, 17610015, 3, ' January, February, March.'),
(16, 17610016, 3, ' January, February, March.');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`id`, `title`, `file`) VALUES
(3, 'à¦¹à§®à¦š', 'ebook/201703161489642757.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `event_year` int(4) NOT NULL,
  `event_month` int(2) NOT NULL,
  `event_day` int(2) NOT NULL,
  `event_hour` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_description`, `event_year`, `event_month`, `event_day`, `event_hour`) VALUES
(2, 'march', 2017, 2, 17, 10);

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `exam_id` int(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`exam_id`, `exam_type`, `per`) VALUES
(2, '1st Model Test Exam', 25),
(3, '2nd Terminal Exam', 25),
(4, 'Final ', 50);

-- --------------------------------------------------------

--
-- Table structure for table `fee_management`
--

CREATE TABLE `fee_management` (
  `id` int(200) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `description` varchar(222) NOT NULL,
  `amount` varchar(222) NOT NULL,
  `date` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_management`
--

INSERT INTO `fee_management` (`id`, `invoice`, `student_id`, `description`, `amount`, `date`) VALUES
(3, '101', '628', 'Month Fee for February', '430', '03/18/2017'),
(4, '101', '628', 'Session', '1500', '03/18/2017');

-- --------------------------------------------------------

--
-- Table structure for table `final_result`
--

CREATE TABLE `final_result` (
  `id` int(80) NOT NULL,
  `student_id` int(80) NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `student_section` varchar(80) NOT NULL,
  `detail` text NOT NULL,
  `total_mark` varchar(80) NOT NULL,
  `gpa` varchar(5) NOT NULL,
  `grade` varchar(80) NOT NULL,
  `stats` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_pass`
--

CREATE TABLE `forgot_pass` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`) VALUES
(11, 'School');

-- --------------------------------------------------------

--
-- Table structure for table `group_type`
--

CREATE TABLE `group_type` (
  `group_id` int(255) NOT NULL,
  `group_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_type`
--

INSERT INTO `group_type` (`group_id`, `group_name`) VALUES
(1, 'General'),
(2, 'Science'),
(3, 'Arts'),
(5, 'Commerce'),
(6, 'Secretarial Science '),
(7, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `headline`
--

CREATE TABLE `headline` (
  `headline_id` int(10) NOT NULL,
  `headline_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headline`
--

INSERT INTO `headline` (`headline_id`, `headline_text`) VALUES
(1, 'à¦¬à¦¾à¦®à§ˆà¦² à¦†à¦‡à¦¡à¦¿à§Ÿà¦¾à¦² à¦¹à¦¾à¦‡ à¦¸à§à¦•à§à¦² à¦à¦¨à§à¦¡ à¦•à¦²à§‡à¦œà§‡ à¦†à¦ªà¦¨à¦¾à¦•à§‡ à¦¸à§à¦¬à¦¾à¦—à¦¤à¦®');

-- --------------------------------------------------------

--
-- Table structure for table `headmaster_info`
--

CREATE TABLE `headmaster_info` (
  `head_id` int(10) NOT NULL,
  `head_name` varchar(255) NOT NULL,
  `head_pic` varchar(255) NOT NULL,
  `head_sign` varchar(255) NOT NULL,
  `head_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headmaster_info`
--

INSERT INTO `headmaster_info` (`head_id`, `head_name`, `head_pic`, `head_sign`, `head_message`) VALUES
(1, 'Md. Golam Faruque', '201703161489644212.jpg', 's201703161489644212.jpg', '<p>Under Construction</p>');

-- --------------------------------------------------------

--
-- Table structure for table `institute_history`
--

CREATE TABLE `institute_history` (
  `his_id` int(10) NOT NULL,
  `hs_pic` varchar(225) NOT NULL,
  `his_history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_history`
--

INSERT INTO `institute_history` (`his_id`, `hs_pic`, `his_history`) VALUES
(1, '201703071488856174.jpg', '<p>abcd</p>');

-- --------------------------------------------------------

--
-- Table structure for table `institute_info`
--

CREATE TABLE `institute_info` (
  `id` int(10) NOT NULL,
  `ins_logo` varchar(200) NOT NULL,
  `ins_name` varchar(255) NOT NULL,
  `ins_subtitle` varchar(255) NOT NULL,
  `ins_phone` varchar(255) NOT NULL,
  `ins_add` varchar(255) NOT NULL,
  `ins_web_link` varchar(255) NOT NULL,
  `ins_fb` varchar(255) NOT NULL,
  `ins_gp` varchar(255) NOT NULL,
  `ins_twe` varchar(255) NOT NULL,
  `ins_Latitude` varchar(255) NOT NULL,
  `ins_Longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_info`
--

INSERT INTO `institute_info` (`id`, `ins_logo`, `ins_name`, `ins_subtitle`, `ins_phone`, `ins_add`, `ins_web_link`, `ins_fb`, `ins_gp`, `ins_twe`, `ins_Latitude`, `ins_Longitude`) VALUES
(1, '201702231487834477.jpg', 'Bamoil Ideal High School and College       ', 'à¦†à¦—à¦¾à¦®à§€à¦° à¦¶à§à¦°à§ à¦à¦–à¦¾à¦¨à§‡à¦‡', '+8801624268798', 'Bamoil Bazar, Sarulia, Demra, Dhaka', 'http://bamoilihsc.edu.bd/', 'facebook.com/bamoilihsc', '', '', '23.7147865', '90.4833395');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group_class` varchar(255) NOT NULL,
  `quentity` int(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `book_name`, `subject`, `class`, `group_class`, `quentity`) VALUES
(1, 'Bangla', 'Bangla', 'Three', 'General', 10);

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id` int(80) NOT NULL,
  `link` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `link`, `name`) VALUES
(1, 'http://www.moedu.gov.bd/', 'à¦¶à¦¿à¦•à§à¦·à¦¾ à¦®à¦¨à§à¦¤à§à¦°à¦¨à¦¾à¦²à§Ÿ'),
(2, 'http://www.teachers.gov.bd/', 'à¦¶à¦¿à¦•à§à¦·à¦• à¦¬à¦¾à¦¤à¦¾à§Ÿà¦¨'),
(4, 'http://www.dshe.gov.bd/', 'à¦®à¦¾à¦§à§à¦¯à¦®à¦¿à¦• à¦“ à¦‰à¦šà§à¦š à¦¶à¦¿à¦•à§à¦·à¦¾ à¦…à¦§à¦¿à¦¦à¦ªà§à¦¤à¦°'),
(5, 'http://www.nctb.gov.bd/', 'à¦œà¦¾à¦¤à§€à§Ÿ à¦¶à¦¿à¦•à§à¦·à¦¾à¦•à§à¦°à¦® à¦“ à¦ªà¦¾à¦ à§à¦¯à¦ªà§à¦¸à§à¦¤à¦• à¦¬à§‹à¦°à§à¦¡'),
(6, 'http://www.bangladesh.gov.bd/', 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¤à¦¥à§à¦¯ à¦¬à¦¾à¦¤à¦¾à¦¯à¦¼à¦¨'),
(7, 'http://www.joygovtghs.edu.bd/student_results', 'à¦œà§Ÿà¦ªà§à¦°à¦¹à¦¾à¦Ÿ à¦¸à¦°à¦•à¦¾à¦°à¦¿ à¦¬à¦¾à¦²à¦¿à¦•à¦¾ à¦‰à¦šà§à¦š à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à§Ÿà§‡à¦° à¦¸à¦•à¦² à¦°à§‡à¦œà¦¾à¦²à§à¦Ÿ à¦…à¦¨à§à¦¸à¦¨à§à¦§à¦¾à¦¨'),
(8, 'http://www.rajshahieducationboard.gov.bd/', 'à¦°à¦¾à¦œà¦¶à¦¾à¦¹à§€ à¦¶à¦¿à¦•à§à¦·à¦¾ à¦¬à§‹à¦°à§à¦¡'),
(9, 'http://mmc.e-service.gov.bd/', 'à¦®à¦¾à¦²à§à¦Ÿà¦¿à¦®à¦¿à¦¡à¦¿à¦¯à¦¼à¦¾ à¦•à§à¦²à¦¾à¦¸à¦°à§à¦® à¦®à§à¦¯à¦¾à¦¨à§‡à¦œà¦®à§‡à¦¨à§à¦Ÿ à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦®');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `class_group` varchar(255) NOT NULL,
  `year` int(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `pair` int(10) NOT NULL,
  `p1w` int(20) NOT NULL,
  `p2w` int(20) NOT NULL,
  `t1` int(20) NOT NULL,
  `p1m` int(20) NOT NULL,
  `p2m` int(20) NOT NULL,
  `t2` int(20) NOT NULL,
  `p1p` int(20) NOT NULL,
  `p2p` int(20) NOT NULL,
  `t3` int(20) NOT NULL,
  `total` int(11) NOT NULL,
  `grade_total` int(20) NOT NULL,
  `grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `class`, `exam_type`, `class_group`, `year`, `subject`, `pair`, `p1w`, `p2w`, `t1`, `p1m`, `p2m`, `t2`, `p1p`, `p2p`, `t3`, `total`, `grade_total`, `grade`) VALUES
(1, '20071', 'Three', '1st Model Test Exam', 'General', 2017, 'Bangla', 1, 75, 45, 120, 0, 0, 0, 0, 0, 0, 120, 60, 'A-'),
(2, '20071', 'Three', '1st Model Test Exam', 'General', 2017, 'English', 1, 75, 55, 130, 0, 0, 0, 0, 0, 0, 130, 65, 'A-'),
(3, '20071', 'Three', '1st Model Test Exam', 'General', 2017, 'Mathematics', 0, 0, 0, 70, 0, 0, 0, 0, 0, 0, 70, 70, 'A'),
(4, '20071', 'Three', '1st Model Test Exam', 'General', 2017, 'Islam and Moral Education', 0, 0, 0, 80, 0, 0, 0, 0, 0, 0, 80, 80, 'A+'),
(5, '20071', 'Three', '1st Model Test Exam', 'General', 2017, 'Hindu & Moral Education', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'F'),
(6, '20071', 'Three', '1st Model Test Exam', 'General', 2017, 'Bangladesh & Bishaw Porichoy', 0, 0, 0, 55, 0, 0, 0, 0, 0, 0, 55, 55, 'B'),
(7, '20071', 'Three', '1st Model Test Exam', 'General', 2017, 'Generel Science', 0, 0, 0, 50, 0, 0, 0, 0, 0, 0, 50, 50, 'B'),
(8, '1761001', 'Ten-boy (Science)', '1st Model Test Exam', 'Science', 2017, 'Bangla 1st Paper', 1, 56, 0, 56, 17, 0, 17, 0, 0, 0, 73, 37, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `massage_group`
--

CREATE TABLE `massage_group` (
  `id` int(222) NOT NULL,
  `user_one` int(20) NOT NULL,
  `user_two` int(20) NOT NULL,
  `hash` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `massage_group`
--

INSERT INTO `massage_group` (`id`, `user_one`, `user_two`, `hash`) VALUES
(1, 2, 1, 410226573),
(2, 3, 1, 185365491),
(3, 4, 3, 867079166),
(4, 7, 2, 1502283392);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user_name`, `name`, `type`, `pic`) VALUES
(2, 'Ahid', 'Md. Ahid Uddin', 'T', '201702231487831538.jpg'),
(3, 'saifullah ', 'MD.SAIFULLAH ', 'T', '201702231487842132.jpg'),
(6, 'sharifa rashid', 'Sharifa Rashid', 'T', '201703101489159595.jpg'),
(7, 'Golam Faruque', 'Md. Golam Faruque', 'T', '201703161489642102.jpg'),
(12, 'rajib420', 'Rajib', 'S', '201703181489822390.jpg'),
(13, 'masud', 'Masud', 'S', '201703181489823324.jpg'),
(14, 'mubin', 'Mubin Mia', 'S', '201703181489825340.jpg'),
(15, 'SAZZAD -UL- ISLAM JUHBERY', 'SAZZAD -UL- ISLAM JUHBERY', 'S', '201703191489908295.jpg'),
(16, 'SAZZAD-UL ISLAM JUBERY', 'SAZZAD-UL ISLAM JUBERY', 'S', '201703191489910616.jpg'),
(17, 'UMMAT HASAN RAHIM', 'UMMAT HASAN RAHIM', 'S', '201703191489910803.jpg'),
(18, 'Nazim Hossain Rana', 'Nazim Hossain Rana', 'S', '201703191489910997.jpg'),
(19, 'Saiful Islam Shuvo', 'Saiful Islam Shuvo', 'S', '201703191489911480.jpg'),
(20, 'Md. Saiful Islam', 'Md. Saiful Islam', 'S', '201703191489911687.jpg'),
(21, 'MD. NAZMUL HASAN ', 'MD. NAZMUL HASAN ', 'S', '201703191489912418.jpg'),
(22, 'S.M. KAMRUL HASSAN ARVY', 'S.M. KAMRUL HASSAN ARVY', 'S', '201703191489912695.jpg'),
(23, 'MD. NADIM MAHMOOD ', ' MD. NADIM MAHMOOD ', 'S', '201703191489912965.jpg'),
(24, 'MD. ABDULLAH AL RAHAD ', 'MD. ABDULLAH AL RAHAD ', 'S', '201703191489913153.jpg'),
(25, 'SAIFUL ISLAM ASIF ', 'SAIFUL ISLAM ASIF ', 'S', '201703191489913293.jpg'),
(26, 'SHAKIL AHMED SOYKAT ', 'SHAKIL AHMED SOYKAT ', 'S', '201703191489913564.jpg'),
(27, 'NAIM ASHRAF CHOWDUR ', 'NAIM ASHRAF CHOWDUR ', 'S', '201703191489913830.jpg'),
(28, 'RIDOY KUMAR DASH ', 'RIDOY KUMAR DASH ', 'S', '201703191489914022.jpg'),
(29, 'MEHEDI HASAN MUNNA ', 'MEHEDI HASAN MUNNA ', 'S', '201703191489914237.jpg'),
(30, 'MD. ENAYATUR RAHMAN ', 'MD. ENAYATUR RAHMAN ', 'S', '201703191489914506.jpg'),
(31, 'PIASH AHAMMED ', 'PIASH AHAMMED ', 'S', '201703191489914782.jpg'),
(32, 'parvez5500', 'MASOOM PARVEZ', 'T', '201704051491424486.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `group_hash` int(22) NOT NULL,
  `from_id` int(22) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `group_hash`, `from_id`, `message`) VALUES
(1, 410226573, 2, 'He'),
(2, 410226573, 1, 'Hello'),
(3, 185365491, 3, 'poioioi'),
(4, 867079166, 4, 'Hello'),
(5, 1502283392, 7, 'hi ');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(222) NOT NULL,
  `notice_cat` int(222) NOT NULL,
  `notice_name` varchar(222) NOT NULL,
  `notice_date` varchar(222) NOT NULL,
  `notice_path` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_cat`, `notice_name`, `notice_date`, `notice_path`) VALUES
(6, 1, 'à§¨à§¦à§§à§­ à¦¸à¦¾à¦²à§‡à¦° à¦¹à¦¾à¦« à¦«à§à¦°à¦¿ à¦¸à¦®à§Ÿ à¦¸à¦‚à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦¨à§‹à¦Ÿà¦¿à¦¶', '07-03-2017', 'notice/201703071488855588.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `office_management`
--

CREATE TABLE `office_management` (
  `id` int(80) NOT NULL,
  `name` varchar(200) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_management`
--

INSERT INTO `office_management` (`id`, `name`, `detail`, `amount`, `date`) VALUES
(1, 'Appayan', 'sf ', 50, '03/18/2017');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `degignation` varchar(222) NOT NULL,
  `number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `optional_subject`
--

CREATE TABLE `optional_subject` (
  `id` int(80) NOT NULL,
  `student_id` int(60) NOT NULL,
  `class` varchar(80) NOT NULL,
  `main` varchar(60) NOT NULL,
  `optional` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `optional_subject`
--

INSERT INTO `optional_subject` (`id`, `student_id`, `class`, `main`, `optional`) VALUES
(1, 50001, 'XI-Secreterial', 'Chosse a subject', 'Chosse a subject'),
(2, 1761006, 'Ten-boy (Science)', 'Chosse a subject', 'Chosse a subject');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(80) NOT NULL,
  `page_detail` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_detail`) VALUES
(1, '<p>pta</p>'),
(2, '<h1 style=\"width: 751px; margin: 15px auto; color: #000000; font-size: 20px;\">Chairman- M.A Rashid</h1>\r\n<p>&nbsp;</p>'),
(3, '<h1 style=\"width: 751px; margin: 15px auto; color: #000000; font-size: 20px;\">Edit Class activities</h1>'),
(4, '<h1 style=\"width: 751px; margin: 15px auto; color: #000000; font-size: 20px;\">Edit Annual program</h1>'),
(5, '<h1 style=\"width: 751px; margin: 15px auto; color: #000000; font-size: 20px;\">Edit Curriculum</h1>'),
(6, '<h1 style=\"width: 751px; margin: 15px auto; color: #000000; font-size: 20px;\">Edit Courses</h1>'),
(7, '<h1 style=\"width: 751px; margin: 15px auto; color: #000000; font-size: 20px;\">Edit Documentary</h1>'),
(8, '<h1 style=\"text-align: center;\"><span style=\"text-decoration: underline;\">à¦¬à§‡à¦¤à¦¨ à¦†à¦¦à¦¾à§Ÿà§‡à¦° à¦¸à¦®à§Ÿ à¦¸à§‚à¦šà§€ à¦“ à¦¨à¦¿à§Ÿà¦®à¦¾à¦¬à¦²à§€&nbsp;</span></h1>\r\n<p>&nbsp;</p>\r\n<h2><strong>à§§à¥¤ à¦®à¦¾à¦¸à¦¿à¦• à¦¬à§‡à¦¤à¦¨ à¦ªà¦°à¦¬à¦°à§à¦¤à§€ à¦®à¦¾à¦¸à§‡à¦° à§§ à¦¥à§‡à¦•à§‡ à§§à§¦ à¦¤à¦¾à¦°à¦¿à¦–à§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦ªà¦°à¦¿à¦¶à§‹à¦§ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡à¥¤&nbsp;</strong></h2>\r\n<p>&nbsp;</p>\r\n<h2><strong>à§¨à¥¤ à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦¿à¦¤ à¦¤à¦¾à¦°à¦¿à¦–à§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦œà¦®à¦¾ à¦¦à¦¿à¦¤à§‡ à¦¬à§à¦¯à¦°à§à¦¥ à¦¹à¦²à§‡ à¦ªà§à¦°à¦¤à¦¿ à¦®à¦¾à¦¸à§‡à¦° à¦œà¦¨à§à¦¯ à§¦à§« à¦Ÿà¦¾à¦•à¦¾ à¦œà¦°à¦¿à¦®à¦¾à¦¨à¦¾à¦¸à¦¹ à¦œà¦®à¦¾ à¦¦à¦¿à¦¤à§‡ à¦¹à¦¬à§‡à¥¤&nbsp;</strong></h2>\r\n<p>&nbsp;</p>\r\n<h2><strong>à§©à¥¤ à¦¬à§‡à¦¤à¦¨ à¦¬à¦¹à¦¿ à¦¹à¦¾à¦°à¦¿à§Ÿà§‡ à¦—à§‡à¦²à§‡ à¦¬à¦¾ à¦¨à¦·à§à¦Ÿ à¦¹à¦²à§‡ à¦…à¦§à§à¦¯à¦•à§à¦· à¦¬à¦°à¦¾à¦¬à¦° à¦†à¦¬à§‡à¦¦à¦¨à¦ªà§‚à¦°à§à¦¬à¦• à§«à§¦ à¦Ÿà¦¾à¦•à¦¾ à¦œà¦°à¦¿à¦®à¦¾à¦¨à¦¾ à¦ªà§à¦°à¦¦à¦¾à¦¨ à¦¸à¦¾à¦ªà§‡à¦•à§à¦·à§‡ à¦¨à¦¤à§à¦¨ à¦¬à¦¹à¦¿ à¦¸à¦‚à¦—à§à¦°à¦¹ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡à¥¤&nbsp;</strong></h2>\r\n<p>&nbsp;</p>\r\n<h2><strong>à§ªà¥¤ à¦ªà¦°à§€à¦•à§à¦·à¦¾à¦° à¦†à¦—à§‡ à¦¸à¦®à¦¸à§à¦¤ à¦ªà¦¾à¦“à¦¨à¦¾à¦¦à¦¿ à¦ªà¦°à¦¿à¦¶à§‹à¦§ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡à¥¤&nbsp;</strong></h2>\r\n<p>&nbsp;</p>\r\n<h2><strong>à§«à¥¤ à¦¨à¦¤à§à¦¨ à¦¶à¦¿à¦•à§à¦·à¦¾à¦¬à¦°à§à¦·à§‡à¦° à¦¬à§‡à¦¤à¦¨à¦¾à¦¦à¦¿ à¦ªà§à¦°à¦¦à¦¾à¦¨à§‡à¦° à¦ªà§‚à¦°à§à¦¬à§‡ à¦¬à¦¿à¦—à¦¤ à¦¬à¦›à¦°à§‡à¦° à¦¬à§‡à¦¤à¦¨ à¦†à¦¦à¦¾à§Ÿ à¦¬à¦‡ à¦œà¦®à¦¾ &nbsp;à¦¦à¦¾à¦¨ à¦ªà§‚à¦°à§à¦¬à¦• à¦¨à¦¤à§à¦¨ à¦¬à¦›à¦°à§‡à¦° à¦¬à¦‡ à¦¸à¦‚à¦—à§à¦°à¦¹ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡à¥¤&nbsp;</strong></h2>\r\n<p>&nbsp;</p>\r\n<h2><strong>à§¬à¥¤ à¦ªà§à¦°à¦¤à¦¿ à¦¬à¦›à¦° à¦œà¦¾à¦¨à§à§Ÿà¦¾à¦°à§€ à¦®à¦¾à¦¸à§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦¬à§‡à¦¤à¦¨à¦¸à¦¹ à¦¬à¦¾à§Žà¦¸à¦°à¦¿à¦• à¦¸à§‡à¦¶à¦¨ à¦«à¦¿ à¦ªà¦°à¦¿à¦¶à§‹à¦§ à¦•à¦°à§‡ à¦¸à§à¦¬ à¦¸à§à¦¬ à¦¶à§à¦°à§‡à¦£à¦¿à¦¤à§‡ à¦¤à¦¾à¦¦à§‡à¦° à¦¨à¦¾à¦® à¦¤à¦¾à¦²à¦¿à¦•à¦¾à¦­à§à¦•à§à¦¤ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡à¥¤ à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦¿à¦¤ à¦¸à¦®à§Ÿà§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦¤à¦¾à¦²à¦¿à¦•à¦¾à¦­à§à¦•à§à¦¤ à¦•à¦°à¦¤à§‡ à¦¬à§à¦¯à¦°à§à¦¥ à¦¹à¦²à§‡ à¦¤à¦¾à¦¦à§‡à¦° à¦¸à§à¦¥à¦²à§‡ à¦¨à¦¤à§à¦¨ à¦›à¦¾à¦¤à§à¦°/à¦›à¦¾à¦¤à§à¦°à§€ à¦­à¦°à§à¦¤à¦¿ à¦•à¦°à¦¾à¦¨à§‹ à¦¹à¦¬à§‡à¥¤&nbsp;</strong></h2>'),
(9, '<h1 style=\"width: 751px; margin: 15px auto; color: #000000; font-size: 20px;\">Edit Hostel Page</h1>');

-- --------------------------------------------------------

--
-- Table structure for table `pass_fail`
--

CREATE TABLE `pass_fail` (
  `id` int(80) NOT NULL,
  `student_id` int(80) NOT NULL,
  `class` varchar(80) NOT NULL,
  `class_group` varchar(80) NOT NULL,
  `year` int(20) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `total` int(80) NOT NULL,
  `full_mark` int(80) NOT NULL,
  `grade` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass_fail`
--

INSERT INTO `pass_fail` (`id`, `student_id`, `class`, `class_group`, `year`, `subject`, `total`, `full_mark`, `grade`) VALUES
(1, 20071, 'Three', 'General', 2017, 'Bangla', 120, 200, 'A-'),
(2, 20071, 'Three', 'General', 2017, 'English', 130, 200, 'A-'),
(3, 20071, 'Three', 'General', 2017, 'Mathematics', 70, 100, 'A'),
(4, 20071, 'Three', 'General', 2017, 'Islam and Moral Education', 80, 100, 'A+'),
(5, 20071, 'Three', 'General', 2017, 'Hindu & Moral Education', 0, 100, 'F'),
(6, 20071, 'Three', 'General', 2017, 'Bangladesh & Bishaw Porichoy', 55, 100, 'B'),
(7, 20071, 'Three', 'General', 2017, 'Generel Science', 50, 100, 'B'),
(8, 1761001, 'Ten-boy (Science)', 'Science', 2017, 'Bangla 1st Paper', 73, 200, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `album_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `file_name`, `caption`, `album_id`) VALUES
(33, '201702231487838955.jpg', 'No Caption', 11),
(34, '201702231487839037.jpg', '', 11);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `class_group` varchar(255) NOT NULL,
  `year` int(20) NOT NULL,
  `total` int(255) NOT NULL,
  `gpa` varchar(5) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `stats` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_id`, `class`, `exam_type`, `class_group`, `year`, `total`, `gpa`, `grade`, `stats`) VALUES
(1, '20071', 'Three', '1st Model Test Exam', 'General', 2017, 505, '0', 'F', 'Fail'),
(2, '1761001', 'Ten-boy (Science)', '1st Model Test Exam', 'Science', 2017, 73, '1', 'D', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(20) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `basic` int(80) NOT NULL,
  `huse_rent` varchar(80) NOT NULL,
  `provident` varchar(80) NOT NULL,
  `kollan` varchar(80) NOT NULL,
  `medical` int(80) NOT NULL,
  `lunch` int(80) NOT NULL,
  `tada` int(80) NOT NULL,
  `total_salary` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `teacher_id`, `basic`, `huse_rent`, `provident`, `kollan`, `medical`, `lunch`, `tada`, `total_salary`) VALUES
(1, 0, 0, '0', '0', '0', 0, 0, 0, '0'),
(2, 0, 0, '0', '0', '0', 0, 0, 0, '0'),
(3, 0, 0, '0', '0', '0', 0, 0, 0, '0'),
(4, 0, 0, '0', '0', '0', 0, 0, 0, '0'),
(5, 0, 0, '0', '0', '0', 0, 0, 0, '0'),
(6, 0, 0, '0', '0', '0', 0, 0, 0, '0'),
(7, 0, 0, '0', '0', '0', 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sec_id` int(20) NOT NULL,
  `sec_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec_id`, `sec_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(20) NOT NULL,
  `shift_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift_name`) VALUES
(1, 'Morning'),
(2, 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(100) NOT NULL,
  `slider_file` varchar(255) NOT NULL,
  `slider_img_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_file`, `slider_img_text`) VALUES
(6, '16143777_645151979001429_7122029584325857305_o.jpg', 'Yarly sports'),
(7, '10422259_420434724806490_7554000659268629570_n.jpg', 'S.S.C');

-- --------------------------------------------------------

--
-- Table structure for table `sms_config`
--

CREATE TABLE `sms_config` (
  `id` int(1) NOT NULL,
  `username` varchar(80) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_config`
--

INSERT INTO `sms_config` (`id`, `username`, `pass`, `sender`) VALUES
(1, 'EDUSOLUTION', '123456', 'School');

-- --------------------------------------------------------

--
-- Table structure for table `sms_group`
--

CREATE TABLE `sms_group` (
  `id` int(255) NOT NULL,
  `group_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_group_contact`
--

CREATE TABLE `sms_group_contact` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(111) NOT NULL,
  `sms_group` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(255) NOT NULL,
  `fld0` varchar(255) NOT NULL,
  `fld1` varchar(255) NOT NULL,
  `fld2` int(255) NOT NULL,
  `fld3` varchar(255) NOT NULL,
  `fld4` varchar(255) NOT NULL,
  `fld5` varchar(255) NOT NULL,
  `fld7` varchar(255) NOT NULL,
  `fld8` varchar(255) NOT NULL,
  `fld9` varchar(255) NOT NULL,
  `fld10` varchar(255) NOT NULL,
  `fld11` varchar(255) NOT NULL,
  `fld12` varchar(255) NOT NULL,
  `fld13` varchar(255) NOT NULL,
  `fld14` varchar(255) NOT NULL,
  `fld15` varchar(255) NOT NULL,
  `fld16` varchar(255) NOT NULL,
  `fld17` varchar(255) NOT NULL,
  `fld18` varchar(255) NOT NULL,
  `fld19` varchar(255) NOT NULL,
  `fld20` varchar(255) NOT NULL,
  `fld21` varchar(255) NOT NULL,
  `fld22` varchar(255) NOT NULL,
  `fld23` varchar(255) NOT NULL,
  `fld24` varchar(255) NOT NULL,
  `fld25` varchar(255) NOT NULL,
  `fld26` varchar(255) NOT NULL,
  `fld27` varchar(255) NOT NULL,
  `fld28` varchar(255) NOT NULL,
  `fld29` varchar(255) NOT NULL,
  `fld30` varchar(255) NOT NULL,
  `fld31` varchar(255) NOT NULL,
  `fld32` varchar(255) NOT NULL,
  `fld33` varchar(255) NOT NULL,
  `fld34` varchar(255) NOT NULL,
  `fld35` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `class_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fld0`, `fld1`, `fld2`, `fld3`, `fld4`, `fld5`, `fld7`, `fld8`, `fld9`, `fld10`, `fld11`, `fld12`, `fld13`, `fld14`, `fld15`, `fld16`, `fld17`, `fld18`, `fld19`, `fld20`, `fld21`, `fld22`, `fld23`, `fld24`, `fld25`, `fld26`, `fld27`, `fld28`, `fld29`, `fld30`, `fld31`, `fld32`, `fld33`, `fld34`, `fld35`, `class`, `shift`, `section`, `class_group`) VALUES
(8, '201703181489825340.jpg', 'Md. Mubin', 628, 'mubin', '123@gmail.com', '818f6def372d34cd9bf4ce55c3f6bfbe', '880 1534961088', 'Male', '10/12/2000', 'Islam', '', 'Bangladeshi', 'Bamoil, Demra, Dhaka', 'Bamoil, Demra, Dhaka', 'Bamoil Ideal High school & college (BM)', '', '', 'Md. Mohasin ', 'Business', '..............', 'Bamoil Bazar,Demra,Dhaka.', '8801916117105', '..............', 'Shahanaj Begum', 'Housewife', '...............', 'Bamoil,Demra,Dhaka.', '8801986056975', '..................', 'Md. Mohasin ', 'Business', '...............', 'Bamoil,Demra,Dhaka.', ' 8801986056975', '...............', 'XI-Computer', 'Day', 'A', 'Secretarial Science'),
(10, '201703191489910616.jpg', 'SAZZAD-UL ISLAM JUBERY', 1761001, 'SAZZAD-UL ISLAM JUBERY', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1819038851', 'Male', '03/24/2002', 'Islam', '', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'Md. Rafiqul Islam Munshi', '', '', '', '880 ', '', 'Moshammat Eyasmian Akter', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(11, '201703191489910803.jpg', 'UMMAT HASAN RAHIM', 1761002, 'UMMAT HASAN RAHIM', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '8801190378416', 'Male', '02/15/2003', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'KALAM MEYA', '', '', '', '880 ', '', 'KULSUM AKHTER', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(12, '201703191489910997.jpg', 'Nazim Hossain Rana', 1761003, 'Nazim Hossain Rana', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1845858966', 'Male', '01/05/2003', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'Md. Helal Mia ', '', '', '', '880 ', '', 'Nasima Akter', '', '', '', '880 ', '', 'Md. Helal Mia', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(13, '201703191489911480.jpg', 'Saiful Islam Shuvo', 1761004, 'Saiful Islam Shuvo', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1939034943', 'Male', '02/09/2003', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'Md. Monir Hossain', '', '', '', '880 ', '', 'Shilpy Begum', '', '', '', '880 ', '', 'Md. Monir Hossain', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(14, '201703191489911687.jpg', 'Md. Saiful Islam', 1761005, 'Md. Saiful Islam', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1624269452', 'Male', '03/25/2001', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'Md. Rafiqul Islam', '', '', '', '880 ', '', 'Tahmina Begum', '', '', '', '880 ', '', 'Rafiqul Islam', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(15, '201703191489912418.jpg', 'MD. NAZMUL HASAN ', 1761006, 'MD. NAZMUL HASAN ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1971318411', 'Male', '07/15/2002', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'MD. SANAULLAH ', '', '', '', '880 ', '', 'RASHEDA BEGUM ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Choose a Shift', 'Choose a Section', 'Choose a Group'),
(16, '201703191489912695.jpg', 'S.M. KAMRUL HASSAN ARVY', 1761007, 'S.M. KAMRUL HASSAN ARVY', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1746757901', 'Male', '08/28/2002', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'ABDUL QUDDUS BSHAH ', '', '', '', '880 ', '', 'FATEMA AKTER ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(17, '201703191489912965.jpg', ' MD. NADIM MAHMOOD ', 1761008, 'MD. NADIM MAHMOOD ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1817078019', 'Male', '09/018/2002', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'MD.ABDUS SALAM ', '', '', '', '880 ', '', 'MS KOLPONA BEGUM', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(18, '201703191489913153.jpg', 'MD. ABDULLAH AL RAHAD ', 1761009, 'MD. ABDULLAH AL RAHAD ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1718592324', 'Male', '02/14/2002', 'Islam', 'B+', '', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'MD. KHALILIUR RAHMAN MOLLA ', '', '', '', '880 ', '', 'MORSHEDA BEGUM ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Choose a Shift', 'Choose a Section', 'Choose a Group'),
(19, '201703191489913293.jpg', 'SAIFUL ISLAM ASIF ', 17610010, 'SAIFUL ISLAM ASIF ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 ', 'Male', '04/13/2003', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'MD.AMIR HOSSAIN ', '', '', '', '880 ', '', 'AYASHA BEGUM ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(20, '201703191489913564.jpg', 'SHAKIL AHMED SOYKAT ', 17610011, 'SHAKIL AHMED SOYKAT ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 ', 'Male', '02/14/2003', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'MD. kABIR HOSSAIN ', '', '', '', '880 ', '', 'SHAHANUR BEGUM ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(21, '201703191489913830.jpg', 'NAIM ASHRAF CHOWDUR ', 17610012, 'NAIM ASHRAF CHOWDUR ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1838210237', 'Male', '07/04/2002', 'Islam', '', '', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'BASARAT ALI', '', '', '', '880 ', '', 'SUMSUN NAHAR ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Morning', 'A', 'General'),
(22, '201703191489914022.jpg', 'RIDOY KUMAR DASH ', 17610013, 'RIDOY KUMAR DASH ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1717572179', 'Male', '05/13/2003', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'RATAN BABU ', '', '', '', '880 ', '', 'BHAROTI RANI ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(23, '201703191489914237.jpg', 'MEHEDI HASAN MUNNA ', 17610014, 'MEHEDI HASAN MUNNA ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1922180184', 'Male', '10/05/2002', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'MIZANUR RAHAMAN ', '', '', '', '880 ', '', 'MOSAMMAT JAHANARA ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(24, '201703191489914506.jpg', 'MD. ENAYATUR RAHMAN ', 17610015, 'MD. ENAYATUR RAHMAN ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 ', 'Male', '11/30/1998', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'MD. MOSHILIR RAHMAN', '', '', '', '880 ', '', 'PARVIN  AKTER RINA ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science'),
(25, '201703191489914782.jpg', 'PIASH AHAMMED ', 17610016, 'PIASH AHAMMED ', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '880 1920494499', 'Male', '01/20/2003', 'Islam', 'B+', 'Bangladeshi', 'Bamoil, sarulia, Demra, Dhaka -1361', 'Bamoil, sarulia, Demra, Dhaka -1361', '', '', '', 'MD. TOFAZZAL HOSSAIN ', '', '', '', '880 ', '', 'KOHINOOR AKTER ', '', '', '', '880 ', '', '', '', '', '', ' ', '', 'Ten-boy (Science)', 'Day', 'A', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendence`
--

CREATE TABLE `student_attendence` (
  `id` int(255) NOT NULL,
  `student_id` int(200) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(80) NOT NULL,
  `day` int(11) NOT NULL,
  `p_or_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendence`
--

INSERT INTO `student_attendence` (`id`, `student_id`, `year`, `month`, `day`, `p_or_a`) VALUES
(1, 20071, 2017, 1, 1, 1),
(2, 20071, 2017, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `pair` int(10) NOT NULL,
  `type` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `class_group` varchar(255) NOT NULL,
  `fmark` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `pair`, `type`, `class`, `class_group`, `fmark`) VALUES
(1, 'Bangla', 1, 1, 'Three', 'General', 100),
(2, 'English', 1, 1, 'Three', 'General', 100),
(3, 'Mathematics', 0, 1, 'Three', 'General', 100),
(6, 'Bangladesh & Bishaw Porichoy', 0, 1, 'Three', 'General', 100),
(7, 'Generel Science', 0, 1, 'Three', 'General', 100),
(8, 'Islam/Hindu & Moral Education', 0, 1, '', 'General', 100),
(9, 'Islam/Hindu & Moral Education', 0, 1, 'Three', 'General', 100),
(10, 'Bangla 1st Paper', 1, 1, 'Nine-boy (Commerce)', 'Science', 100),
(11, 'Bangla 2nd Paper', 1, 1, 'Nine-boy (Commerce)', 'Science', 100),
(12, 'Bangla 1st Paper', 1, 1, 'Ten-boy (Science)', 'Science', 100);

-- --------------------------------------------------------

--
-- Table structure for table `s_m_p`
--

CREATE TABLE `s_m_p` (
  `id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `month` int(80) NOT NULL,
  `year` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_m_p`
--

INSERT INTO `s_m_p` (`id`, `student_id`, `month`, `year`) VALUES
(1, 628, 1, 2017),
(2, 628, 2, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `tc`
--

CREATE TABLE `tc` (
  `id` int(222) NOT NULL,
  `field0` varchar(255) NOT NULL,
  `field1` varchar(255) NOT NULL,
  `field2` varchar(255) NOT NULL,
  `field3` varchar(255) NOT NULL,
  `field4` varchar(255) NOT NULL,
  `field5` varchar(255) NOT NULL,
  `field6` varchar(255) NOT NULL,
  `field7` varchar(255) NOT NULL,
  `field8` varchar(255) NOT NULL,
  `field9` varchar(255) NOT NULL,
  `field10` varchar(255) NOT NULL,
  `field11` varchar(255) NOT NULL,
  `field12` varchar(255) NOT NULL,
  `field13` varchar(255) NOT NULL,
  `field14` varchar(255) NOT NULL,
  `field15` varchar(255) NOT NULL,
  `field16` varchar(255) NOT NULL,
  `field17` varchar(255) NOT NULL,
  `field18` varchar(255) NOT NULL,
  `student_id` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(255) NOT NULL,
  `tld0` varchar(255) NOT NULL,
  `tld1` varchar(255) NOT NULL,
  `tld2` int(255) NOT NULL,
  `tld3` varchar(255) NOT NULL,
  `tld4` varchar(255) NOT NULL,
  `tld5` varchar(255) NOT NULL,
  `tld6` varchar(255) NOT NULL,
  `tld7` varchar(255) NOT NULL,
  `tld9` varchar(255) NOT NULL,
  `tld10` varchar(255) NOT NULL,
  `tld11` varchar(255) NOT NULL,
  `tld12` varchar(255) NOT NULL,
  `tld13` varchar(255) NOT NULL,
  `tld14` varchar(255) NOT NULL,
  `tld15` varchar(255) NOT NULL,
  `tld16` varchar(255) NOT NULL,
  `tld17` varchar(255) NOT NULL,
  `tld18` varchar(255) NOT NULL,
  `tld19` varchar(255) NOT NULL,
  `tld20` varchar(255) NOT NULL,
  `tld21` varchar(255) NOT NULL,
  `tld22` varchar(255) NOT NULL,
  `tld23` varchar(255) NOT NULL,
  `tld24` varchar(255) NOT NULL,
  `tld25` varchar(255) NOT NULL,
  `tld26` varchar(255) NOT NULL,
  `tld27` varchar(255) NOT NULL,
  `tld28` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `tld0`, `tld1`, `tld2`, `tld3`, `tld4`, `tld5`, `tld6`, `tld7`, `tld9`, `tld10`, `tld11`, `tld12`, `tld13`, `tld14`, `tld15`, `tld16`, `tld17`, `tld18`, `tld19`, `tld20`, `tld21`, `tld22`, `tld23`, `tld24`, `tld25`, `tld26`, `tld27`, `tld28`, `type`) VALUES
(2, '201702231487831538.jpg', 'Md. Ahid Uddin', 1064025, 'Md. Fazlul Haque', 'Mst. Azimun Nesa', 'Ahid', 'ahid195@gmail.com', '26abdb4687899c6c7751062c8b21b180', '880 1716434156', 'Male', '09/21/1980', 'Islam', 'A+', 'Bangladeshi', 'Bamoil, Sarulia, Demra, Dhaka-1361', 'Vill+Post# Baherchar, P.S# Rangabali, Dist# Patuakhali', 'Assistant Teacher', 'Physical Education', '02/14/2011', '02/14/2011', 'Bamoil', 'N/A', '2697688602038', '1064025', 'N/A', 'N/A', 'Permanent', 'Physical Education, Accounting, Math', 'Govt.'),
(3, '201702231487842132.jpg', 'MD.SAIFULLAH ', 845661, 'KARI ABDUS SATTER ', 'PAYARA BEGUM ', 'saifullah ', 'saifullah1081@gmail.com', 'cddc6ae8be9b58daccc150798c88912b', '880 01913085092', 'Male', '10/30/1981', 'Islam ', 'B+', 'Bangladshi ', 'Bamoil, Sharulia, Demra , Dhaka-1361', 'shamspur, Dogashe, Sreegangor, Munshegonj ', 'Computer Demonastator ', 'Computer ', '17/01/2003', '19/01/2003', 'Bamoil ', 'Bamoil Ideal High School and College (BM) ', '5918447762231', '845661', 'None ', 'None ', 'Higher secondary ', 'Higher secondary ', 'Govt.'),
(5, '201703101489159595.jpg', 'Sharifa Rashid', 1914366506, 'Abdur Rashid', 'Shoheli akther', 'sharifa rashid', 'sarifashorif@gmail.com', '38e43b0a8a82774c50f0346791f4f068', '880 01914366506', 'Female', '02June 1980', 'Islam ', 'O+', 'Bangladeshi ', '1333,Matrikunja,Nurpur,Dania.kadamtoli,Dhaka', '1333,Matrikunja,Nurpur,Dania,Kadamtoli,Dhaka', 'Assistant Teacher ', 'ICT', '28may2006', '02June 2006', 'Bamoil ideal high school and college ', 'Bamoil ideal high school and college ', '261763537328', '1038790', '', '', 'School section ', 'class 3to10', 'Govt.'),
(6, '201703161489642102.jpg', 'Md. Golam Faruque', 101, 'Abdur Rob Jomaddar', 'Rajia Begum', 'Golam Faruque', 'golamfaruque8g@gmail.com', 'd4c3830c5c821e721357bc885ead4d4c', '8801552358980', 'Male', '11/01/1965', 'Islam', 'B+', 'Bangladeshi', 'Dania, Shyampur, Dhaka', 'Patuakhali', 'Principal', '-', '', '', 'Bamoil', '', '', '', '', '', '', '', 'Govt.'),
(7, '201704051491424486.jpg', 'MASOOM PARVEZ', 16, 'MD. NURUL ISLAM', 'NAJNEEN ISLAM', 'parvez5500', 'masoomparvez5500@gmail.com', '9e27690b46d316b97ffa2cb70079c6b8', '880 01675031049', 'Male', '25/12/1990', 'ISLAM', 'O+', 'BANGLADESHI', 'MATUAIL WEST PARA, MRIDHABARI, JATRABARI , DHAKA.', 'MATUAIL WEST PARA, MRIDHABARI, JATRABARI , DHAKA.', 'LECTURER', 'FINANCE, ACCOUNTING', '18/10/2016', '10/10/2016', 'BAMOIL, DHAKA.', 'BAMOIL IDEAL HIGH SCHOOL & COLLEGE', '', '', '', '', '', '', 'unkown');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendence`
--

CREATE TABLE `teacher_attendence` (
  `id` int(255) NOT NULL,
  `teacher_id` int(255) NOT NULL,
  `year` int(255) NOT NULL,
  `month` int(255) NOT NULL,
  `day` int(222) NOT NULL,
  `p_or_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendence`
--

INSERT INTO `teacher_attendence` (`id`, `teacher_id`, `year`, `month`, `day`, `p_or_a`) VALUES
(26, 202, 2016, 1, 1, 0),
(27, 345, 2016, 1, 1, 1),
(28, 1064025, 2017, 2, 2, 1),
(29, 1064025, 2017, 2, 2, 1),
(30, 1064025, 2017, 2, 2, 1),
(31, 1064025, 2017, 2, 2, 1),
(32, 1064025, 2017, 2, 2, 1),
(33, 1102580, 2017, 1, 1, 1),
(34, 1064025, 2017, 1, 1, 1),
(35, 845661, 2017, 1, 1, 1),
(36, 845661, 2017, 1, 1, 1),
(37, 1064025, 2017, 1, 1, 1),
(38, 1102580, 2017, 1, 1, 1),
(39, 1102580, 2017, 1, 1, 1),
(40, 1102580, 2017, 1, 1, 1),
(41, 1102580, 2017, 1, 1, 1),
(42, 1102580, 2017, 1, 1, 1),
(43, 845661, 2017, 2, 23, 1),
(44, 1064025, 2017, 2, 23, 1),
(45, 1102580, 2017, 2, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int(255) NOT NULL,
  `trans_name` varchar(200) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `cost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_manage`
--

CREATE TABLE `user_manage` (
  `id` int(6) NOT NULL,
  `name` varchar(80) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `user_id` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_manage`
--

INSERT INTO `user_manage` (`id`, `name`, `full_name`, `user_id`) VALUES
(1, 'web', 'Website', 0),
(3, 'reg', 'Registration', 0),
(4, 'ex', 'Exam', 0),
(5, 'acc', 'Accounts', 0),
(6, 'add', 'Online Admission', 0),
(7, 'sms', 'SMS', 0),
(8, 'lib', 'Library', 0),
(9, 'att', 'Attendance', 0);

-- --------------------------------------------------------

--
-- Table structure for table `workingday`
--

CREATE TABLE `workingday` (
  `id` int(80) NOT NULL,
  `year` int(80) NOT NULL,
  `month` int(80) NOT NULL,
  `working_day` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workingday`
--

INSERT INTO `workingday` (`id`, `year`, `month`, `working_day`) VALUES
(1, 2017, 2, 1),
(2, 2017, 3, 1),
(3, 2017, 1, 25),
(4, 2017, 4, 1),
(5, 2017, 5, 1),
(6, 2017, 6, 1),
(7, 2017, 7, 1),
(8, 2017, 8, 1),
(9, 2017, 9, 1),
(10, 2017, 10, 1),
(11, 2017, 11, 1),
(12, 2017, 12, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `admission_date`
--
ALTER TABLE `admission_date`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `attendence_temp`
--
ALTER TABLE `attendence_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_transaction`
--
ALTER TABLE `bank_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_sms`
--
ALTER TABLE `birth_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cedit_and_debit`
--
ALTER TABLE `cedit_and_debit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_fee`
--
ALTER TABLE `class_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due`
--
ALTER TABLE `due`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `fee_management`
--
ALTER TABLE `fee_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_result`
--
ALTER TABLE `final_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_pass`
--
ALTER TABLE `forgot_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_type`
--
ALTER TABLE `group_type`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `headline`
--
ALTER TABLE `headline`
  ADD PRIMARY KEY (`headline_id`);

--
-- Indexes for table `headmaster_info`
--
ALTER TABLE `headmaster_info`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `institute_history`
--
ALTER TABLE `institute_history`
  ADD PRIMARY KEY (`his_id`);

--
-- Indexes for table `institute_info`
--
ALTER TABLE `institute_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `massage_group`
--
ALTER TABLE `massage_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `office_management`
--
ALTER TABLE `office_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optional_subject`
--
ALTER TABLE `optional_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass_fail`
--
ALTER TABLE `pass_fail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `sms_config`
--
ALTER TABLE `sms_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_group`
--
ALTER TABLE `sms_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_group_contact`
--
ALTER TABLE `sms_group_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_attendence`
--
ALTER TABLE `student_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `s_m_p`
--
ALTER TABLE `s_m_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc`
--
ALTER TABLE `tc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_attendence`
--
ALTER TABLE `teacher_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_manage`
--
ALTER TABLE `user_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workingday`
--
ALTER TABLE `workingday`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `ad_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admission_date`
--
ALTER TABLE `admission_date`
  MODIFY `admission_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `app_id` int(222) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendence_temp`
--
ALTER TABLE `attendence_temp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bank_transaction`
--
ALTER TABLE `bank_transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `birth_sms`
--
ALTER TABLE `birth_sms`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cedit_and_debit`
--
ALTER TABLE `cedit_and_debit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `class_fee`
--
ALTER TABLE `class_fee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `due`
--
ALTER TABLE `due`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `exam_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fee_management`
--
ALTER TABLE `fee_management`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `final_result`
--
ALTER TABLE `final_result`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forgot_pass`
--
ALTER TABLE `forgot_pass`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `group_type`
--
ALTER TABLE `group_type`
  MODIFY `group_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `headline`
--
ALTER TABLE `headline`
  MODIFY `headline_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `headmaster_info`
--
ALTER TABLE `headmaster_info`
  MODIFY `head_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `institute_history`
--
ALTER TABLE `institute_history`
  MODIFY `his_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `institute_info`
--
ALTER TABLE `institute_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `massage_group`
--
ALTER TABLE `massage_group`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `office_management`
--
ALTER TABLE `office_management`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `optional_subject`
--
ALTER TABLE `optional_subject`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pass_fail`
--
ALTER TABLE `pass_fail`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sec_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sms_group`
--
ALTER TABLE `sms_group`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sms_group_contact`
--
ALTER TABLE `sms_group_contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `student_attendence`
--
ALTER TABLE `student_attendence`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `s_m_p`
--
ALTER TABLE `s_m_p`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tc`
--
ALTER TABLE `tc`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teacher_attendence`
--
ALTER TABLE `teacher_attendence`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_manage`
--
ALTER TABLE `user_manage`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `workingday`
--
ALTER TABLE `workingday`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
