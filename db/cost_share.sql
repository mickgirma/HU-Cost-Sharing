
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cost_share`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) DEFAULT NULL,
  `adminImage` varchar(150) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(1, 'Natural Science'),
(2, 'Social Science'),
(5, 'freshman');

-- --------------------------------------------------------

--
-- Table structure for table `costshareform`
--

CREATE TABLE `costshareform` (
  `id` int(11) NOT NULL,
  `collegeName` varchar(150) NOT NULL,
  `tuitionFee` int(11) NOT NULL,
  `foodExpenseFee` int(11) NOT NULL,
  `beddingExpenseFee` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'disable',
  `action` varchar(50) NOT NULL DEFAULT 'waiting '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costshareform`
--

INSERT INTO `costshareform` (`id`, `collegeName`, `tuitionFee`, `foodExpenseFee`, `beddingExpenseFee`, `userId`, `total`, `year`, `status`, `action`) VALUES
(10, '7', 6520, 3210, 420, 12, '10150', '2015', 'active', 'waiting '),
(11, '6', 5201, 7410, 520, 12, '13131', '2015', 'active', 'waiting '),
(19, '2', 1025, 1478, 2587, 12, '5090', '2015', 'active', 'waiting '),
(20, '10', 1478, 1587, 1236, 12, '4301', '2015', 'active', 'waiting '),
(22, '10', 1500, 500, 600, 12, '2600', '2015', 'active', 'waiting '),
(23, '2', 2500, 600, 200, 12, '3300', '2016', 'active', 'waiting '),
(24, '12', 1200, 1600, 600, 12, '3400', '2015', 'active', 'waiting '),
(26, '13', 500, 500, 600, 12, '1600', '2015', 'active', 'waiting ');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `send_to` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `user_id`, `send_to`, `title`, `message`, `date`) VALUES
(14, 14, 'stud ToCollege', ' fashion designer', 'hello', '2023-06-30 00:01:45'),
(16, 16, 'Data_Analyst', 'i am University ', 'sdf', '2023-06-30 00:10:00'),
(18, 13, 'sendToUniversity', 'Hey University', 'For University', '2023-06-30 00:57:43'),
(21, 16, 'Data_Analyst', 'java and php 2020 new download now 100% working', 'java and php 2020 new download now 100% working', '2023-07-04 06:16:24'),
(23, 14, 'stud ToCollege', 'make website', 'make websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake websitemake website', '2023-07-04 06:22:44'),
(24, 13, 'send ToUniversity', 'java', 'demo', '2023-07-04 06:38:19'),
(25, 19, 'stud ToCollege', 'Costshare', 'eskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnmeskawn cost share alderesegnm', '2023-07-07 04:22:25'),
(27, 13, 'send ToUniversity', 'To University Register', 'hello University Register', '2021-07-07 05:10:45'),
(28, 16, 'Data_Analyst', 'To College Register', 'Hey Register', '2023-07-07 05:15:36'),
(30, 12, 'send ToUniversity', 'Mai Header', 'demo', '2023-08-16 06:55:08'),
(32, 59, 'send Tostudent', 'from admin', 'you are fill form', '2023-08-17 02:48:59'),
(33, 16, 'Data_Analyst', 'hey college', 'demo', '2023-08-19 02:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `studentcostfill`
--

CREATE TABLE `studentcostfill` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `userPhoto` varchar(200) NOT NULL,
  `parentFullName` varchar(150) NOT NULL,
  `parentRegion` varchar(50) NOT NULL DEFAULT 'none',
  `parentZone` varchar(50) NOT NULL DEFAULT 'none',
  `parentWoreda` varchar(50) NOT NULL DEFAULT 'none',
  `parentCity` varchar(50) NOT NULL,
  `parentHouseNumber` int(11) NOT NULL,
  `parentPostalBox` int(11) NOT NULL,
  `schoolName` varchar(150) NOT NULL,
  `schoolRegion` varchar(50) NOT NULL DEFAULT 'none',
  `schoolKebele` varchar(50) NOT NULL DEFAULT 'none',
  `schoolWoreda` varchar(50) NOT NULL DEFAULT 'none',
  `schoolCity` varchar(50) NOT NULL,
  `schoolCompletedDate` date NOT NULL,
  `departmentType` varchar(100) NOT NULL,
  `departmentName` varchar(100) NOT NULL,
  `departmentYear` varchar(100) NOT NULL,
  `collegeStartDate` date NOT NULL,
  `studentStatus` varchar(100) NOT NULL DEFAULT 'active',
  `servicesInKind` varchar(60) NOT NULL,
  `servicesInCash` varchar(60) NOT NULL,
  `withDrawDate` date DEFAULT NULL,
  `cost_stat` varchar(10) NOT NULL DEFAULT 'on',
  `graduated` varchar(50) NOT NULL DEFAULT 'no',
  `cost_dep_name` varchar(200) DEFAULT NULL,
  `send_graduate` varchar(200) NOT NULL DEFAULT 'no',
  `numRow` varchar(100) NOT NULL DEFAULT 'no',
  `numRow1` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `studentcostfill`
--

INSERT INTO `studentcostfill` (`id`, `user_id`, `userPhoto`, `parentFullName`, `parentRegion`, `parentZone`, `parentWoreda`, `parentCity`, `parentHouseNumber`, `parentPostalBox`, `schoolName`, `schoolRegion`, `schoolKebele`, `schoolWoreda`, `schoolCity`, `schoolCompletedDate`, `departmentType`, `departmentName`, `departmentYear`, `collegeStartDate`, `studentStatus`, `servicesInKind`, `servicesInCash`, `withDrawDate`, `cost_stat`, `graduated`, `cost_dep_name`, `send_graduate`, `numRow`, `numRow1`) VALUES
(54, 64, '../images/17543053pic.png', 'Ayda Woldemariyam Tezera', '52', '41', '08', 'Akaki', 79, 454, 'Yade Child Development Center', '45', '20', '07', 'Akaki', '2021-08-23', '5', '13', 'Forth Year', '2021-08-18', 'active', 'Bedding', 'Food', '0000-00-00', 'off', 'Yes', '2', 'Yes', 'no', ''),
(55, 64, '../images/1049030638pic.png', 'Ayda Woldemariyam Tezera', '52', '41', '08', 'Akaki', 23, 454, 'Yade Child Development Center', '45', '20', '07', 'Akaki', '2021-08-10', '1', '2', 'Forth Year', '2021-08-17', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'Yes', 'no', ''),
(56, 65, '../images/746558157pic.png', 'Ayda Woldemariyam Tezera', '52', '41', '08', 'Akaki', 34, 454, 'Yade Child Development Center', '45', '20', '07', 'Akaki', '2021-08-24', '5', '13', 'Forth Year', '2021-08-17', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'no', NULL, 'no', 'no', ''),
(57, 65, '../images/1979088391pic.png', 'Azalech Woldemariyam Tezera', '52', '41', '08', 'Akaki', 23, 454, 'Yade Child School', '45', '20', '07', 'Akaki', '2021-08-10', '1', '2', 'Forth Year', '2021-08-10', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'no', NULL, 'no', 'no', ''),
(58, 65, '../images/1933884812pic.png', 'Ayda Woldemariyam Tezera', '52', '41', '08', 'Akaki', 34, 454, 'Yade Child Development Center', '45', '20', '07', 'Akaki', '2021-08-20', '1', '2', 'Forth Year', '2021-08-25', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'no', NULL, 'no', 'no', ''),
(59, 64, '../images/6963057pic.jpg', 'abel berhanu', 'Addis Abeba', '34', '34', 'Adis Abeba', 23, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-09', '1', '2', 'Forth Year', '2021-08-10', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'Yes', 'no', ''),
(60, 64, '../images/1015760862pic.jpg', 'abel berhanu', 'Addis Abeba', '34', '34', 'Adis Abeba', 23, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-09', '1', '2', 'Forth Year', '2021-08-10', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'Yes', 'no', ''),
(61, 64, '../images/618901609pic.png', 'abel berhanu', 'Addis Abeba', '34', '34', 'Adis Abeba', 23, 0, 'Raguale Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-11', '1', '2', 'First Year', '2021-08-10', 'active', 'Food', 'Bedding', '0000-00-00', 'on', 'Yes', '2', 'Yes', 'no', ''),
(62, 68, '../images/1122078172pic.png', 'demo raki zemedkun', '52', '41', '08', 'Akaki', 45, 454, 'AKPS Child Development Center', '52', '20', '07', 'Akaki', '2021-08-31', '5', '13', 'Second Year', '2021-08-16', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '10', 'Yes', 'no', ''),
(63, 68, '../images/788227498pic.png', 'demo raki zemedkun', '52', '41', '08', 'Akaki', 345, 454, 'Yade Child Development Center', '45', '20', '07', 'Akaki', '2021-08-25', '1', '10', 'Second Year', '2021-08-10', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '10', 'Yes', 'no', ''),
(64, 68, '../images/1899606343pic.png', 'demo raki zemedkun', '52', '41', '08', 'Akaki', 78, 454, 'Yade Child Development Center', '45', '20', '07', 'Akaki', '2021-08-17', '1', '10', 'Second Year', '2021-08-10', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '10', 'Yes', 'no', ''),
(65, 68, '../images/967632080pic.png', 'demo raki zemedkun', '52', '41', '08', 'Akaki', 67, 454, 'Yade Child Development Center', '45', '20', '07', 'Akaki', '2021-08-10', '1', '10', 'Second Year', '2021-08-17', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '10', 'Yes', 'no', ''),
(66, 69, '../images/695241032pic.jpg', 'adanech abel berhanu', 'Addis Abeba', '34', '34', 'Adis Abeba', 68, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-16', '5', '13', 'Third Year', '2021-08-16', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '12', 'Yes', 'no', ''),
(67, 69, '../images/1137161493pic.jpg', 'adanech abel berhanu', 'Addis Abeba', '34', '34', 'Adis Abeba', 46, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-10', '2', '12', 'Third Year', '2021-08-25', 'active', 'Food', 'Bedding', '2021-08-16', 'off', 'Yes', '12', 'Yes', 'no', ''),
(68, 69, '../images/850064855pic.jpg', 'abel berha', 'Addis Abeba', '34', '34', 'Adis Abeba', 78, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-18', '2', '12', 'First Year', '2021-08-22', 'active', 'Bedding', 'Food', '0000-00-00', 'on', 'Yes', '12', 'Yes', 'no', ''),
(72, 72, '../images/235774434pic.jpg', 'tesfa berhanu', 'Addis Abeba', '34', '34', 'Adis Abeba', 78, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-10', '5', '13', 'Second Year', '2021-08-18', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'no', '13', 'no', 'no', ''),
(78, 72, '../images/276374807pic.jpg', 'tesfa berhanu', 'Addis Abeba', '34', '34', 'Adis Abeba', 78, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-10', '1', '2', 'Second Year', '2021-08-24', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'no', '13', 'no', 'no', 'yes'),
(81, 76, '../images/1158626071pic.jpg', 'abel berhanu', 'Addis Abeba', '34', '34', 'Adis Abeba', 34, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-09-13', '5', '13', 'Second Year', '2021-08-10', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'no', '2', 'no', 'yes', ''),
(82, 76, '../images/1556794770pic.png', 'abel berhanu', 'Addis Abeba', '34', '34', 'Adis Abeba', 34, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-09-13', '1', '2', 'Second Year', '2021-08-10', 'active', 'Food', 'Bedding', '0000-00-00', 'on', 'no', '2', 'no', 'no', ''),
(83, 77, '../images/519056457pic.png', 'Hiwot tegegn', 'Addis Abeba', '34', '34', 'Adis Abeba', 34, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-12', '5', '13', 'Forth Year', '2021-08-24', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'no', 'yes', 'no'),
(84, 77, '../images/75337055pic.jpg', 'Hiwot tegegn', 'Addis Abeba', '34', '34', 'Adis Abeba', 34, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-12', '1', '2', 'Forth Year', '2021-08-24', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'no', 'no', 'yes'),
(85, 77, '../images/1087656620pic.', 'Hiwot tegegn', 'Addis Abeba', '34', '34', 'Adis Abeba', 34, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-12', '1', '2', 'Forth Year', '2021-08-24', 'active', 'none', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'no', 'no', 'no'),
(86, 77, '../images/694560965pic.png', 'Hiwot tegegn', 'Addis Abeba', '34', '34', 'Adis Abeba', 34, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-12', '1', '2', 'Forth Year', '2021-08-24', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'no', 'no', 'no'),
(87, 77, '../images/46444787pic.', 'Hiwot tegegn', 'Addis Abeba', '34', '34', 'Adis Abeba', 34, 0, 'Addis Ketema', 'Addis Abeba', '34', '34', 'Adis Abeba', '2021-08-12', '1', '2', 'Fifth Year', '2021-08-24', 'active', 'Bedding', 'Food', '0000-00-00', 'on', 'Yes', '2', 'no', 'no', 'no'),
(88, 87, '../images/2096678866pic.png', 'sufi Woldemariyam Tezera', 'addis', '41', '08', 'Akaki', 34, 454, 'Yade Child School', 'akaki', '20', '07', 'Akaki', '2021-08-18', '5', '13', 'Forth Year', '2021-08-17', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'no', 'yes', 'no'),
(89, 87, '../images/1569922139pic.png', 'sufi Woldemariyam Tezera', 'addis', '41', '08', 'Akaki', 34, 454, 'Yade Child School', 'akaki', '20', '07', 'Akaki', '2021-08-18', '1', '2', 'Forth Year', '2021-08-17', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'no', 'no', 'yes'),
(90, 87, '../images/1776540205pic.png', 'sufi Woldemariyam Tezera', 'addis', '41', '08', 'Akaki', 34, 454, 'Yade Child School', 'akaki', '20', '07', 'Akaki', '2021-08-18', '1', '2', 'Forth Year', '2021-08-17', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'no', 'no', 'no'),
(91, 87, '../images/835699065pic.png', 'sufi Woldemariyam Tezera', 'addis', '41', '08', 'Akaki', 34, 454, 'Yade Child School', 'akaki', '20', '07', 'Akaki', '2021-08-18', '1', '2', 'Forth Year', '2021-08-17', 'active', 'Food', 'Bedding', '0000-00-00', 'off', 'Yes', '2', 'no', 'no', 'no'),
(92, 87, '../images/2141568718pic.png', 'sufi Woldemariyam Tezera', 'addis', '41', '08', 'Akaki', 34, 454, 'Yade Child School', 'akaki', '20', '07', 'Akaki', '2021-08-18', '1', '2', 'Fifth Year', '2021-08-17', 'active', 'Food', 'Bedding', '0000-00-00', 'on', 'Yes', '2', 'no', 'no', 'no'),
(93, 91, '../images/897567164pic.png', 'Ayda Woldemariyam Tezera', 'addis', '41', '08', 'Akaki', 87, 454, 'Yade Child Development Center', 'adds', '20', '07', 'Akaki', '2021-08-19', '5', '13', 'Second Year', '2021-08-10', 'active', 'Bedding', 'Food', '2021-08-09', 'off', 'no', '13', 'no', 'yes', 'no');

-- --------------------------------------------------------
--
-- Table structure for table `studentcostshareyear`
--

CREATE TABLE `studentcostshareyear` 
(
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` varchar(200) NOT NULL,
  `yearName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `studentcostshareyear`
INSERT INTO `studentcostshareyear` (`id`, `user_id`, `year`, `yearName`) VALUES
(3, 8, '4', 'Forth Year'),
(4, 9, '4', 'Forth Year'),
(5, 10, '4', 'Forth Year'),
(6, 11, '3', 'Third Year'),
(7, 12, '1', 'First Year'),
(8, 14, '4', 'Forth Year'),
(9, 15, '2', 'Second Year'),
(10, 16, '1', 'First Year'),
(11, 17, '1', 'First Year'),
(12, 18, '1', 'First Year'),
(13, 19, '1', 'First Year'),
(14, 20, '2', 'Second Year'),
(15, 21, '2', 'Second Year'),
(16, 22, '1', 'First Year'),
(17, 23, '1', 'First Year'),
(18, 24, '1', 'First Year'),
(19, 25, '1', 'First Year'),
(20, 26, '1', 'First Year'),
(21, 27, '2', 'Second Year'),
(22, 28, '1', 'First Year'),
(23, 29, '2', 'Second Year'),
(24, 30, '1', 'First Year'),
(25, 31, '1', 'First Year'),
(26, 32, '1', 'First Year'),
(27, 33, '1', 'First Year'),
(28, 34, '1', 'First Year');

-- Table structure for table `stud_year`
CREATE TABLE `stud_year` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `stud_year`
--

INSERT INTO `stud_year` (`id`, `user_id`, `year`, `status`) VALUES
(1, 24, '2023', 'on'),
(2, 28, '2023', 'on'),
(3, 28, '2023', 'on'),
(4, 28, '2023', 'on'),
(5, 28, '2023', 'on'),
(6, 28, '2023', 'on'),
(7, 28, '2023', 'on'),
(8, 29, '2023', 'on'),
(9, 30, '2023', 'on'),
(10, 30, '2023', 'on'),
(11, 43, '2023', 'on'),
(12, 48, '2023', 'on'),
(13, 49, '2023', 'on'),
(14, 49, '2023', 'on'),
(15, 58, '2023', 'on'),
(16, 58, '2023', 'on'),
(17, 57, '2023', 'on'),
(18, 60, '2023', 'on'),
(19, 60, '2023', 'on'),
(20, 60, '2023', 'on'),
(21, 60, '2023', 'on'),
(22, 61, '2023', 'on'),
(23, 61, '2023', 'on'),
(24, 61, '2023', 'on'),
(25, 61, '2023', 'on'),
(26, 61, '2023', 'on'),
(27, 47, '2023', 'on'),
(28, 47, '2023', 'on'),
(29, 62, '2023', 'on'),
(30, 62, '2023', 'on'),
(31, 47, '2023', 'on'),
(32, 62, '2023', 'on'),
(33, 47, '2023', 'on'),
(34, 63, '2023', 'on'),
(35, 63, '2023', 'on'),
(36, 64, '2023', 'on'),
(37, 64, '2023', 'on'),
(38, 64, '2023', 'on'),
(39, 65, '2023', 'on'),
(40, 65, '2023', 'on'),
(41, 65, '2023', 'on'),
(42, 64, '2023', 'on'),
(43, 64, '2023', 'on'),
(44, 64, '2023', 'on'),
(45, 68, '2023', 'on'),
(46, 68, '2023', 'on'),
(47, 68, '2023', 'on'),
(48, 68, '2023', 'on'),
(49, 69, '2023', 'on'),
(50, 69, '2023', 'on'),
(51, 69, '2023', 'on'),
(52, 71, '2023', 'on'),
(53, 71, '2023', 'on'),
(54, 71, '2023', 'on'),
(55, 72, '2023', 'on'),
(56, 72, '2023', 'on'),
(57, 72, '2023', 'on'),
(58, 72, '2023', 'on'),
(59, 72, '2023', 'on'),
(60, 72, '2023', 'on'),
(61, 72, '2023', 'on'),
(62, 72, '2023', 'on'),
(63, 73, '2023', 'on'),
(64, 76, '2023', 'on'),
(65, 76, '2023', 'on'),
(66, 77, '2023', 'on'),
(67, 77, '2023', 'on'),
(68, 77, '2023', 'on'),
(69, 77, '2023', 'on'),
(70, 77, '2023', 'on'),
(71, 87, '2023', 'on'),
(72, 87, '2023', 'on'),
(73, 87, '2023', 'on'),
(74, 87, '2023', 'on'),
(75, 87, '2023', 'on'),
(76, 91, '2023', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subcategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryId`, `subcategoryName`) VALUES
(1, 1, 'College of computing and informatics'),
(2, 1, 'College of Engineering'),
(3, 1, 'College of Computational science'),
(5, 2, 'College of social science and humanity'),
(8, 2, 'College of educational and behavioral science '),
(9, 2, 'College of school of low'),
(10, 1, 'College of health science'),
(11, 1, 'College of Agricultural science'),
(12, 2, 'College of business and economics'),
(13, 5, 'Fresh Man');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullName` varchar(70) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `userPhoto` varchar(150) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'Data_Analyst',
  `studentID` varchar(50) DEFAULT NULL,
  `FreshStudent` varchar(11) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullName`, `userName`, `phoneNumber`, `Gender`, `password`, `userPhoto`, `role`, `studentID`, `FreshStudent`, `college`, `status`, `date`) VALUES
(12, 'Ashu Gamechu', 'ashu', '0912783387', 'Male', 'ashu', 'offer11.jpg', 'Inland_Revenue', NULL, NULL, NULL, 'active', '2023-06-23'),
(13, 'Zemenu Taye ', 'zeme', '0919956874', 'Male', 'zeme', 'avatar4.png', 'Data_Analyst', NULL, NULL, NULL, 'active', '2023-06-23'),
(16, 'admin', 'admin', '', 'Male', 'admin', 'avatar4.png', 'admin', NULL, NULL, NULL, 'active', '2023-06-24'),
(47, 'Munewer Aliyi', 'muni', '092457896', 'Male', 'muni', 'screencapture-ecyo-event-netlify-app-2023-01-29-13_02_41.png', 'Student', '', NULL, 'College of school of low', 'suspend', '2023-08-03'),
(59, 'Munir Mifta', 'man', '0911309125', 'Male', 'man', '../images/109274439man.jpg', 'Fresh_Man', '', '', '', 'active', '2023-08-10'),
(62, 'Ayele Awulacho', 'stud', '0911309125', 'Male', 'stud', '../images/1634686314stud.jpg', 'Student', 'RCD/1002/200', 'No', '', 'active', '2023-08-10'),
(63, 'Ashanafi Fareja', 'stud2', '0911309125', 'Male', 'stud2', '../images/585745462stud2.png', 'Student', 'RCD/12/200', 'Yes', '', 'active', '2023-08-10'),
(64, 'Abdulwahab Heiyreden', 'stud4', '0911309125', 'Male', 'stud4', '../images/35456287stud4.png', 'Student', 'RCD/1002/200', 'No', '', 'active', '2023-08-11'),
(65, 'Kenesa Ejera', 'stud5', '0911309125', 'Male', 'stud5', '../images/26209399stud5.jpg', 'Student', 'RCD/1002/200', 'No', '', 'active', '2023-08-11'),
(66, 'Sella Dawit', 'eng', '0966527596', 'Female', 'eng', '../images/1688562941eng.png', 'Data_Analyst', '', '', 'College of Engineering', 'active', '2023-08-11'),
(67, 'Semira Mulugeta', 'health', '0911309125', 'Female', 'health', '../images/467390099health.png', 'Data_Analyst', '', '', 'College of health science', 'active', '2023-08-12'),
(68, 'Mulate Molla', 'stud6', '0911309125', 'Male', 'stud6', '../images/1485743884stud6.jpg', 'Student', 'RCD/12/200', 'No', '', 'active', '2023-08-12'),
(69, 'Mintesnot Zowdu', 'stud8', '0911309125', 'Male', 'stud8', '../images/718143595stud8.jpg', 'Student', 'RCD/12/20045', 'No', '', 'active', '2023-08-12'),
(70, 'Andualem Waleleny', 'eco', '0966527596', 'Male', 'eco', '../images/1790979609eco.png', 'Data_Analyst', '', '', 'College of business and economics', 'active', '2023-08-12'),
(71, 'Misale felema', 'elsa', '0911309125', 'Male', 'elsa', '../images/1059276050elsa.jpg', 'Student', 'RCD/12/20088', 'No', '', 'active', '2023-08-15'),
(72, 'Yilqal kestela', 'addis', '0925417896', 'Male', 'addis', '../images/1612111516addis.png', 'Student', 'rcd/345/34', 'No', '', 'active', '2023-08-16'),
(73, 'Yoseph Ergana', 'danit', '0966527596', 'Male', 'natidanit', '../images/785198481danit.', 'Student', '12/2020/rcdss', 'No', '', 'active', '2023-08-16'),
(87, 'Mokenent Worku', 'new12', '0966527596', 'Male', 'new12', '../images/1616122396new12.png', 'Student', '12/2020/rcd/4', 'No', '', 'active', '2023-08-19'),
(88, 'Muaz Nureden', 'fresh12', '0911309125', 'Male', 'fresh12', '../images/1083450852fresh12.png', 'Data_Analyst', '', '', 'Fresh Man', 'active', '2023-08-19'),
(89, 'Temralech berhanu', 'stud12', '0911309125', 'Female', 'stud12', '../images/49410576stud12.png', 'Data_Analyst', '', '', 'College of Engineering', 'active', '2023-08-19'),
(90, 'Teshome kebru', 'ashenafi', '0911309125', 'Male', 'ashenafi', '../images/707140169ashenafi.png', 'Data_Analyst', '', '', 'Fresh Man', 'active', '2023-08-22'),
(91, 'Eskiyas Tewelde ', 'eskiyas', '0911309125', 'Male', 'eskiyas', '../images/798240454eskiyas.jpg', 'Student', 'RCD/12/200234', 'No', '', 'active', '2023-08-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costshareform`
--
ALTER TABLE `costshareform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentcostfill`
--
ALTER TABLE `studentcostfill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentcostshareyear`
--
ALTER TABLE `studentcostshareyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_year`
--
ALTER TABLE `stud_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `costshareform`
--
ALTER TABLE `costshareform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `studentcostfill`
--
ALTER TABLE `studentcostfill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `studentcostshareyear`
--
ALTER TABLE `studentcostshareyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `stud_year`
--
ALTER TABLE `stud_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
