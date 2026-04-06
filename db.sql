-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2026 at 12:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db9`
--
CREATE DATABASE IF NOT EXISTS `db9` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db9`;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` char(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address_line1` varchar(150) NOT NULL,
  `address_line2` varchar(150),
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `register_date` date NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO customers (Name, Email, Phone_number, Gender, Address_line1, Address_line2, city, state, Post_code, Register_Date, Password) VALUES
('Angela Chin Jie Mei', 'angela.chin@gmail.com', '0184388295', 'Female', 'No. 15, Jalan Burma', 'Jelutong', 'George Town', 'Pulau Pinang', '10450', '2024-07-23', 'St4WxH28'),
('Lim Ming Ming', 'lim.ming@email.com', '0123456789', 'Female', '12, Jalan SS2/72', 'Taman Bahagia', 'Petaling Jaya', 'Selangor', '47300', '2023-05-12', 'Ax7mKp29'),
('Nur Aisyah binti Abdullah', 'nuraisyah@email.com', '0112345678', 'Female', '45, Jalan Merbuk', 'Taman Desa', 'Kuala Lumpur', 'WP Kuala Lumpur', '58100', '2023-07-23', 'Qw8ZtL41'),
('Tan Wei Jie', 'tan.weijie@email.com', '0167890123', 'Male', '8, Lorong Batu 5', 'Off Jalan Ipoh', 'Kuala Lumpur', 'WP Kuala Lumpur', '51200', '2023-09-15', 'Mn3RsY67'),
('Siti Nurhaliza binti Ahmad', 'siti.nur@email.com', '0198765432', 'Female', '22, Jalan Kenanga 3', 'Taman Mutiara', 'Johor Bahru', 'Johor', '81200', '2024-01-10', 'Lp9VbX52'),
('Muhammad Faiz bin Rosli', 'faiz.rosli@email.com', '0134567890', 'Male', '7, Persiaran Seri Alam', 'Bandar Baru', 'Seri Alam', 'Johor', '81750', '2023-11-20', 'Tg6HjK83'),
('Kumar a/l Subramaniam', 'kumar.subra@email.com', '0176543210', 'Male', '66, Jalan Taming Sari', 'Taman Len Sen', 'Sungai Petani', 'Kedah', '08000', '2024-02-14', 'Zx4CvB90'),
('Wong Li Li', 'wong.lili@email.com', '0181234567', 'Female', '33, Jalan Bunga Raya', 'Taman Jaya', 'George Town', 'Penang', '11600', '2023-06-05', 'Yu7IoP15'),
('Ahmad Zulkarnain bin Mohd Noor', 'ahmad.zul@email.com', '0145678901', 'Male', '101, Jalan Puchong', 'Bandar Kinrara', 'Puchong', 'Selangor', '47100', '2023-08-19', 'Er5TyU62'),
('Priya a/p Rajendran', 'priya.rajen@email.com', '0191234567', 'Female', '5, Jalan Bunga Tanjung', 'Taman Segar', 'Cheras', 'Selangor', '43200', '2023-12-01', 'Ws3DfG48'),
('Chong Kok Weng', 'chong.kok@email.com', '0129876543', 'Male', '29, Jalan Jelutong', 'Taman Sentosa', 'Ipoh', 'Perak', '30100', '2024-03-22', 'Qa2PlM79'),
('Norazlin binti Hamid', 'norazlin.hamid@email.com', '0165432109', 'Female', '88, Jalan Cempaka', 'Taman Ria', 'Seremban', 'Negeri Sembilan', '70300', '2023-10-30', 'Bn8MkL34'),
('Vigneswaran a/l Muthusamy', 'vignes@email.com', '0118765432', 'Male', '14, Jalan Bunga Kertas', 'Taman Mutiara', 'Melaka', 'Melaka', '75460', '2023-04-17', 'Vc1XzA56'),
('Lee Siew Mei', 'lee.siew@email.com', '0172345678', 'Female', '3, Jalan Gasing', 'Seksyen 5', 'Petaling Jaya', 'Selangor', '46000', '2024-01-25', 'Rt9YuI20'),
('Muhammad Firdaus bin Zainal', 'firdaus.zain@email.com', '0198765123', 'Male', '72, Jalan Seri Petaling', 'Bandar Baru Sri Petaling', 'Kuala Lumpur', 'WP Kuala Lumpur', '57000', '2023-09-09', 'Fg6HjK71'),
('Tan Choon Hwa', 'tan.choon@email.com', '0123456712', 'Male', '41, Jalan SS22/23', 'Damansara Jaya', 'Petaling Jaya', 'Selangor', '47400', '2023-07-18', 'Lo3PqR88'),
('Nur Fatin binti Khairul', 'nur.fatin@email.com', '0167890345', 'Female', '18, Jalan Dedap 13', 'Taman Johor Jaya', 'Johor Bahru', 'Johor', '81100', '2023-11-02', 'Ij5KlM42'),
('Ravi a/l Krishnan', 'ravi.krish@email.com', '0187654321', 'Male', '55, Jalan Perak', 'Taman Permata', 'Kuala Lumpur', 'WP Kuala Lumpur', '50450', '2024-02-28', 'Nh7BgV19'),
('Khoo Ai Ling', 'khoo.ai@email.com', '0131234567', 'Female', '9, Jalan Keruing', 'Taman Sri Petaling', 'Kuala Lumpur', 'WP Kuala Lumpur', '57000', '2023-05-30', 'Uk2JmN63'),
('Amirul Hakim bin Azman', 'amirul.hakim@email.com', '0192345678', 'Male', '27, Jalan Penaga', 'Bandar Sunway', 'Subang Jaya', 'Selangor', '47500', '2023-12-15', 'Yt4RfD27'),
('Teoh Bee Hoon', 'teoh.bh@email.com', '0113456789', 'Female', '99, Lebuhraya Thean Teik', 'Taman Greenview', 'George Town', 'Penang', '11500', '2024-01-03', 'Ed8SwQ91'),
('Hafizah binti Yusoff', 'hafizah.yusoff@email.com', '0178901234', 'Female', '16, Jalan Setia Tropika', 'Taman Setia Tropika', 'Johor Bahru', 'Johor', '81200', '2023-10-11', 'Za1XcV75'),
('Ng Chee Kian', 'ng.chee@email.com', '0145678234', 'Male', '35, Jalan USJ 10/1', 'Subang Jaya', 'Selangor', '47620', '2023-06-27', 'Po6LkJ33'),
('Nadia binti Rashid', 'nadia.rashid@email.com', '0121234567', 'Female', '61, Jalan SS2/24', 'Taman Paramount', 'Petaling Jaya', 'Selangor', '47300', '2024-03-05', 'Mn9BvC84'),
('Karthik a/l Ramasamy', 'karthik.rama@email.com', '0162345678', 'Male', '24, Jalan Bunga Angkasa', 'Taman Bukit Serdang', 'Seri Kembangan', 'Selangor', '43300', '2023-08-14', 'Gh2FjK50'),
('Chua Mei Ling', 'chua.mei@email.com', '0193456789', 'Female', '48, Jalan Tasek', 'Taman Mutiara', 'Kuantan', 'Pahang', '25300', '2023-09-27', 'Tr7YuI61'),
('Zainal bin Abidin', 'zainal.abidin@email.com', '0189012345', 'Male', '74, Jalan Putra 1', 'Taman Putra', 'Kulim', 'Kedah', '09000', '2024-01-19', 'Df4GhJ29'),
('Farah binti Mohd Ali', 'farah.ali@email.com', '0112345670', 'Female', '2, Jalan Bukit 11/2', 'Taman Bukit Mewah', 'Kajang', 'Selangor', '43000', '2023-11-28', 'Cv8BnM47'),
('Looi Kim Fatt', 'looi.kim@email.com', '0176543219', 'Male', '39, Lorong Batu Tiga', 'Taman Sentosa', 'Klang', 'Selangor', '41200', '2023-07-07', 'Qw5ErT92'),
('Shanti a/p Letchumanan', 'shanti.letch@email.com', '0127890123', 'Female', '84, Jalan SS3/59', 'Taman Universiti', 'Petaling Jaya', 'Selangor', '47300', '2024-02-11', 'As3DfG68'),
('Razali bin Othman', 'razali.othman@email.com', '0198765430', 'Male', '52, Jalan Keramat', 'Taman Keramat', 'Kuala Lumpur', 'WP Kuala Lumpur', '54200', '2023-12-22', 'Zx6CvB14'),
('Goh Siew Ling', 'goh.siew@email.com', '0145678902', 'Female', '17, Jalan 4/91', 'Taman Shamelin', 'Cheras', 'WP Kuala Lumpur', '56100', '2023-05-05', 'Ui9OpL73'),
('Mohan a/l Vellu', 'mohan.vellu@email.com', '0134567891', 'Male', '63, Jalan Meranti Jaya', 'Bandar Puchong Jaya', 'Puchong', 'Selangor', '47170', '2024-03-18', 'Pl2OkM58'),
('Nurul Hidayah binti Idris', 'nurul.hidayah@email.com', '0167890124', 'Female', '11, Jalan Setia 4', 'Taman Setia Indah', 'Johor Bahru', 'Johor', '81100', '2023-10-09', 'Ko7IjN36'),
('Wong Kah Chun', 'wong.kah@email.com', '0113456780', 'Male', '96, Jalan Song', 'Taman Song', 'Kuching', 'Sarawak', '93350', '2023-06-15', 'Jh4HgF21'),
('Linda a/p Selvaraj', 'linda.selva@email.com', '0181234560', 'Female', '30, Jalan Anggerik 23', 'Taman Anggerik', 'Shah Alam', 'Selangor', '40460', '2023-08-25', 'Yg8TfR69'),
('Syed Haqim bin Syed Hassan', 'syed.haqim@email.com', '0178901235', 'Male', '77, Jalan Bayan', 'Taman Bayan Lepas', 'Bayan Lepas', 'Penang', '11900', '2024-01-28', 'Re5WqE80'),
('Cheah Pei Shan', 'cheah.peishan@email.com', '0192345679', 'Female', '44, Jalan Gambus', 'Taman Gambut', 'Muar', 'Johor', '84000', '2023-09-18', 'Ty3UiO94'),
('Mazlan bin Kassim', 'mazlan.kassim@email.com', '0123456713', 'Male', '70, Jalan Kuchai Lama', 'Taman Kuchai', 'Kuala Lumpur', 'WP Kuala Lumpur', '58200', '2023-11-11', 'Op6AsD12'),
('Lim Hui Ying', 'lim.huiying@email.com', '0165432110', 'Female', '26, Jalan SS15/4', 'Subang Jaya', 'Petaling Jaya', 'Selangor', '47500', '2024-02-20', 'Sd9FgH55'),
('Ismail bin Mat Zin', 'ismail.matzin@email.com', '0198765124', 'Male', '82, Jalan Kledang', 'Taman Kledang', 'Ipoh', 'Perak', '30100', '2023-12-03', 'Fg1HjK77'),
('Ooi Ai Lee', 'ooi.ailee@email.com', '0118765433', 'Female', '15, Jalan Sri Pelangi', 'Taman Pelangi', 'Johor Bahru', 'Johor', '80400', '2023-07-30', 'Hj7KlM31'),
('Shahrul Nizam bin Roslan', 'shahrul.nizam@email.com', '0145678235', 'Male', '60, Jalan 2/76C', 'Desa Pandan', 'Kuala Lumpur', 'WP Kuala Lumpur', '55100', '2023-10-22', 'Jk4LmN65'),
('Chan Sook Yee', 'chan.sookyee@email.com', '0187654322', 'Female', '38, Jalan PJS 8/5', 'Bandar Sunway', 'Petaling Jaya', 'Selangor', '46150', '2024-03-10', 'Kl8NmO40'),
('Arul a/l Muniandy', 'arul.muni@email.com', '0123456780', 'Male', '21, Jalan Kempas 6', 'Taman Kempas', 'Johor Bahru', 'Johor', '81200', '2023-05-19', 'Lm2OpQ76'),
('Nur Shafiqah binti Zulkifli', 'shafiqah.zul@email.com', '0167890346', 'Female', '93, Jalan Intan 1', 'Taman Intan', 'Klang', 'Selangor', '41400', '2023-09-05', 'Nm5QrS89'),
('Liew Chee Meng', 'liew.chee@email.com', '0191234568', 'Male', '56, Jalan Harmoni', 'Taman Harmoni', 'Batu Pahat', 'Johor', '83000', '2024-01-15', 'Op3StU53'),
('Rina binti Sulaiman', 'rina.sulaiman@email.com', '0176543211', 'Female', '47, Jalan Besar', 'Pekan Lama', 'Seremban', 'Negeri Sembilan', '70000', '2023-11-20', 'Qr6UvW24'),
('Yap Kok Wai', 'yap.kokwai@email.com', '0134567892', 'Male', '68, Jalan SS2/66', 'Taman Bahagia', 'Petaling Jaya', 'Selangor', '47300', '2023-08-12', 'St9WxY60'),
('Fong Li Na', 'fong.lina@email.com', '0129876544', 'Female', '19, Jalan Delima 3', 'Taman Delima', 'Johor Bahru', 'Johor', '81200', '2024-02-05', 'Uv7YzA11'),
('Hisham bin Ibrahim', 'hisham.ibrahim@email.com', '0112345671', 'Male', '73, Jalan Sg Besi', 'Taman Sg Besi', 'Kuala Lumpur', 'WP Kuala Lumpur', '57100', '2023-06-28', 'Wx2AbC45'),
('Tan Ai Ling', 'tan.ailing@email.com', '0198765431', 'Female', '100, Jalan Ampang', 'Taman U Thant', 'Kuala Lumpur', 'WP Kuala Lumpur', '55000', '2023-12-12', 'Yz5CdE78'),
('Vijay a/l Maniam', 'vijay.maniam@email.com', '0165432111', 'Male', '32, Jalan Permai 12', 'Taman Permai', 'Cheras', 'Selangor', '43200', '2023-07-21', 'Ab8EfG66'),
('Nur Khairunnisa binti Azmi', 'khairunnisa.azmi@email.com', '0181234561', 'Female', '50, Jalan Dagang 3', 'Taman Dagang', 'Ampang', 'Selangor', '68000', '2024-03-25', 'Cd1GhI23'),
('Leong Wai Keong', 'leong.waikeong@email.com', '0178901236', 'Male', '28, Jalan Maju', 'Taman Maju', 'Kluang', 'Johor', '86000', '2023-09-14', 'Ef4IjK59'),
('Aishah binti Mustafa', 'aishah.mustafa@email.com', '0145678903', 'Female', '65, Jalan Tembaga', 'Taman Tembaga', 'Ipoh', 'Perak', '30200', '2023-10-01', 'Gh7KlL82'),
('Rashid bin Karim', 'rashid.karim@email.com', '0123456782', 'Male', '91, Jalan Berjaya', 'Taman Berjaya', 'Petaling Jaya', 'Selangor', '47300', '2024-01-07', 'Ij2MnO38'),
('Chong Sook Fun', 'chong.sookfun@email.com', '0192345680', 'Female', '13, Jalan Perindustrian', 'Taman Perindustrian', 'Kulim', 'Kedah', '09000', '2023-11-19', 'Kl5OpP97'),
('Heng Chee How', 'heng.cheehow@email.com', '0118765434', 'Male', '37, Jalan Gemilang', 'Taman Gemilang', 'Seri Kembangan', 'Selangor', '43300', '2023-05-25', 'Mn8QrR13'),
('Norhayati binti Ariffin', 'norhayati.ariffin@email.com', '0167890347', 'Female', '80, Jalan Kenanga', 'Taman Kenanga', 'Kuantan', 'Pahang', '25200', '2024-02-18', 'Op6StS49'),
('Koh Tze Ming', 'koh.tzeming@email.com', '0176543212', 'Male', '42, Jalan SS2/55', 'Taman University', 'Petaling Jaya', 'Selangor', '47300', '2023-08-08', 'Qr3UvT72'),
('Salmah binti Daud', 'salmah.daud@email.com', '0121234568', 'Female', '23, Jalan Penchala', 'Taman Tun Dr Ismail', 'Kuala Lumpur', 'WP Kuala Lumpur', '60000', '2023-12-29', 'St9WxU20'),
('Ravindran a/l Murugiah', 'ravi.murugiah@email.com', '0198765125', 'Male', '54, Jalan Sri Putra', 'Taman Putra Perdana', 'Puchong', 'Selangor', '47100', '2024-03-02', 'Uv4YzV68'),
('Yusnita binti Hassan', 'yusnita.hassan@email.com', '0134567893', 'Female', '86, Jalan SS9A/12', 'Sungai Way', 'Petaling Jaya', 'Selangor', '47300', '2023-07-16', 'Wx7AbW51'),
('Foo Joo Liang', 'foo.jooliang@email.com', '0187654323', 'Male', '67, Jalan Batu Uban', 'Taman Batu Uban', 'George Town', 'Penang', '11700', '2023-09-29', 'Yz2CdX84'),
('Saraswathy a/p Veeran', 'saras.veeran@email.com', '0113456781', 'Female', '31, Jalan Cerdas', 'Taman Connaught', 'Cheras', 'WP Kuala Lumpur', '56000', '2024-01-22', 'Ab5EfY36'),
('Azman bin Jamaludin', 'azman.jamal@email.com', '0178901237', 'Male', '76, Jalan Wangsa 2/5', 'Wangsa Maju', 'Kuala Lumpur', 'WP Kuala Lumpur', '53300', '2023-10-14', 'Cd8GhZ95'),
('Loh Siew Yee', 'loh.siewyee@email.com', '0145678236', 'Female', '49, Jalan SS14/2', 'Subang Jaya', 'Selangor', '47500', '2023-12-06', 'Ef3IjA27'),
('Kamal bin Ariffin', 'kamal.ariffin@email.com', '0123456783', 'Male', '95, Jalan Sultan Ismail', 'Taman City', 'Kuala Lumpur', 'WP Kuala Lumpur', '50250', '2024-02-27', 'Gh6KlB62'),
('Grace a/p Lawrence', 'grace.lawrence@email.com', '0165432112', 'Female', '10, Jalan KPB', 'Taman Kajang Perdana', 'Kajang', 'Selangor', '43000', '2023-11-10', 'Ij9MnC48'),
('Nguyen Van Minh', 'nguyen.minh@email.com', '0192345681', 'Male', '87, Jalan Tun Razak', 'Taman Sri Tebrau', 'Johor Bahru', 'Johor', '80050', '2023-06-20', 'Kl4OpD70'),
('Noorlaila binti Sapuan', 'noorlaila.sapuan@email.com', '0118765435', 'Female', '34, Jalan Bistari', 'Taman Bistari', 'Melaka', 'Melaka', '75200', '2024-03-15', 'Mn7QrE39'),
('Sim Yeow Hong', 'sim.yeowhong@email.com', '0181234562', 'Male', '58, Jalan Chempaka', 'Taman Chempaka', 'Klang', 'Selangor', '41100', '2023-09-02', 'Op2StF85'),
('Tong Siew Kuan', 'tong.siewkuan@email.com', '0129876545', 'Female', '25, Jalan 9/23E', 'Taman Danau Kota', 'Setapak', 'WP Kuala Lumpur', '53300', '2023-07-25', 'Qr5UvG16'),
('Muniandy a/l Subramaniam', 'muniandy.subra@email.com', '0176543213', 'Male', '79, Jalan SS2/6', 'Taman Bahagia', 'Petaling Jaya', 'Selangor', '47300', '2024-01-11', 'St8WxH57'),
('Lai Yoke Peng', 'lai.yokepeng@email.com', '0198765432', 'Female', '64, Jalan Lapangan Terbang', 'Taman Lapangan Terbang', 'Kota Kinabalu', 'Sabah', '88600', '2023-10-27', 'Uv3YzI91'),
('Mohamad Fazli bin Sahar', 'fazli.sahar@email.com', '0167890348', 'Male', '4, Jalan Perdana 5/1', 'Taman Perdana', 'Kulai', 'Johor', '81000', '2023-12-18', 'Wx6AbJ22'),
('Wee Su Lin', 'wee.sulin@email.com', '0134567894', 'Female', '69, Jalan Puchong Permai 1', 'Puchong Permai', 'Puchong', 'Selangor', '47150', '2024-02-08', 'Yz9CdK74'),
('Haron bin Mat', 'haron.mat@email.com', '0112345672', 'Male', '83, Jalan Hujan', 'Taman OUG', 'Kuala Lumpur', 'WP Kuala Lumpur', '58200', '2023-05-14', 'Ab4EfL60'),
('Chang Moi Lin', 'chang.moilin@email.com', '0187654324', 'Female', '43, Jalan SS18/6', 'Subang Jaya', 'Selangor', '47500', '2023-11-23', 'Cd7GhM33'),
('Viknes a/l Shanmugam', 'viknes.shan@email.com', '0178901238', 'Male', '51, Jalan SS3/33', 'Taman Universiti', 'Petaling Jaya', 'Selangor', '47300', '2023-08-29', 'Ef2IjN58'),
('Norliza binti Mohamad', 'norliza.mohamad@email.com', '0145678904', 'Female', '20, Jalan Bukit 1', 'Taman Bukit Indah', 'Johor Bahru', 'Johor', '81200', '2024-03-20', 'Gh5KlO86'),
('Saw Chooi Peng', 'saw.chooipeng@email.com', '0123456784', 'Male', '97, Jalan SS2/34', 'Taman Megah', 'Petaling Jaya', 'Selangor', '47300', '2023-09-17', 'Ij8MnP41'),
('Chew Siew Choo', 'chew.siewchoo@email.com', '0198765126', 'Female', '36, Jalan Setia 3', 'Taman Setia Eco Gardens', 'Johor Bahru', 'Johor', '81100', '2023-06-09', 'Kl3OpQ79'),
('Mastura binti Omar', 'mastura.omar@email.com', '0165432113', 'Female', '78, Jalan Semenyih', 'Taran Semenyih', 'Semenyih', 'Selangor', '43500', '2024-01-30', 'Mn6QrR25'),
('Kee Soon Huat', 'kee.soonhuat@email.com', '0118765436', 'Male', '59, Jalan SS2/10', 'Taman Paramount', 'Petaling Jaya', 'Selangor', '47300', '2023-10-05', 'Op9StS64'),
('Nur Nadia binti Zainuddin', 'nur.nadia@email.com', '0181234563', 'Female', '46, Jalan Pelangi 2', 'Taman Pelangi', 'Johor Bahru', 'Johor', '80400', '2023-12-24', 'Qr4UvT18'),
('Saravanan a/l Arumugam', 'saravanan.arum@email.com', '0176543214', 'Male', '75, Jalan Bayu 3', 'Taman Bayu Perdana', 'Klang', 'Selangor', '41200', '2024-02-14', 'St7WxU90'),
('Tan See Leng', 'tan.seeleng@email.com', '0129876546', 'Male', '53, Jalan Sri Sentosa 5', 'Taman Sri Sentosa', 'Kuala Lumpur', 'WP Kuala Lumpur', '58000', '2023-07-12', 'Uv2YzV53'),
('Low Hui Min', 'low.huimin@email.com', '0192345682', 'Female', '62, Jalan SS4/2', 'Kelana Jaya', 'Petaling Jaya', 'Selangor', '47301', '2023-11-30', 'Wx5AbW87'),
('Zulkifli bin Abdullah', 'zulkifli.abdullah@email.com', '0145678237', 'Male', '81, Jalan Mawar', 'Taman Mawar', 'Kluang', 'Johor', '86000', '2024-03-08', 'Yz8CdX21'),
('Lum Weng Chee', 'lum.wengchee@email.com', '0167890349', 'Female', '6, Jalan SS9C/1', 'Sungai Way', 'Petaling Jaya', 'Selangor', '47300', '2023-05-28', 'Ab3EfY66'),
('Chai Siew Ching', 'chai.siewching@email.com', '0134567895', 'Female', '94, Jalan Gombak', 'Taman Gombak', 'Kuala Lumpur', 'WP Kuala Lumpur', '53000', '2023-09-21', 'Cd6GhZ42'),
('Halim bin Yaacob', 'halim.yaacob@email.com', '0112345673', 'Male', '71, Jalan Cempaka Sari', 'Taman Cempaka', 'Shah Alam', 'Selangor', '40400', '2024-01-17', 'Ef9IjA73'),
('Ong Pei Wen', 'ong.peiwen@email.com', '0187654325', 'Female', '85, Jalan SS2/5', 'Taman Bahagia', 'Petaling Jaya', 'Selangor', '47300', '2023-10-31', 'Gh4KlB15'),
('Jagan a/l Mariappan', 'jagan.maria@email.com', '0178901239', 'Male', '40, Jalan Sg Buloh', 'Taman Sg Buloh', 'Sg Buloh', 'Selangor', '47000', '2023-12-14', 'Ij7MnC98'),
('Azlina binti Hashim', 'azlina.hashim@email.com', '0123456785', 'Female', '89, Jalan Tawakal', 'Taman Tawakal', 'Johor Bahru', 'Johor', '80200', '2024-02-23', 'Kl2OpD30'),
('Yeoh Beng Hock', 'yeoh.benghock@email.com', '0198765127', 'Male', '57, Jalan SS20/10', 'Damansara Kim', 'Petaling Jaya', 'Selangor', '47400', '2023-06-18', 'Mn5QrE55'),
('Roslina binti Samad', 'roslina.samad@email.com', '0165432114', 'Female', '98, Jalan Air Panas', 'Taman Air Panas', 'Setapak', 'WP Kuala Lumpur', '53200', '2023-08-03', 'Op8StF77'),
('Lai Chee Seng', 'lai.cheeseng@email.com', '0145678905', 'Male', '1, Jalan Seri Bintang', 'Taman Seri Bintang', 'Cheras', 'WP Kuala Lumpur', '56000', '2024-03-29', 'Qr1UvG69');

-- --------------------------------------------------------

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



