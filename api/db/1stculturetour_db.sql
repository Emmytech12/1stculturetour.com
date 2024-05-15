-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 05:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1stculturetour_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert_tab`
--

CREATE TABLE `alert_tab` (
  `sn` int(11) NOT NULL,
  `alert_id` varchar(255) NOT NULL,
  `alert_detail` varchar(255) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `computer` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `seen_status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tab`
--

CREATE TABLE `blog_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(20) NOT NULL,
  `blog_id` varchar(50) NOT NULL,
  `blog_title` mediumtext NOT NULL,
  `blog_url` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `blog_summary` text NOT NULL,
  `blog_detail` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `blog_pix` varchar(255) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_tab`
--

INSERT INTO `blog_tab` (`sn`, `cat_id`, `blog_id`, `blog_title`, `blog_url`, `seo_keywords`, `blog_summary`, `blog_detail`, `status_id`, `blog_pix`, `staff_id`, `views`, `created_time`, `updated_time`) VALUES
(1, '009', 'BLOG00120240109103625', '10 Safety Tips for Taking Your Kids on Vacation', '10-safety-tips-for-taking-your-kids-on-vacation', '10 Safety Tips for Taking Your Kids on Vacation\r\n', 'Traveling opens your mind and broadens your perspective. It’s also one of the best activities you can do with your kids. But family vacations require a lot of planning', '<p><span style=\"color: #6e6361; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Traveling opens your mind and broadens your perspective. It&rsquo;s also one of the best activities you can do with your kids. But family vacations require a lot of planning&mdash;from finding the right location to making sure your kids are happy and safe. No matter where you plan on traveling to next, follow these ten safety tips when you go on vacation with kids.</span></p>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">1. Do your research</h2>\r\n</div>\r\n</div>\r\n<div class=\"text-content text-content--align-default text--p-medium component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"text-content\">\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem; margin: 0px 0px 0px !important 0px;\">Every destination has its appeal, but not every place is safe for kids. Before you decide on your next family trip, do some research on the location you want to visit. If you&rsquo;re going abroad, take a close look at the crime rates in the area and make sure you get the appropriate vaccines. If you&rsquo;re staying local, it&rsquo;s still a good idea to do a&nbsp;<a style=\"box-sizing: border-box; appearance: none; color: #4dacbd; text-decoration: underline; margin: 0px 0px 0px !important 0px;\" href=\"https://www.safewise.com/blog/confirm-safety-neighboorhood-online-tools/\" rel=\"false\">quick background check on the area</a>&nbsp;for any potential danger.</p>\r\n</div>\r\n<div class=\"page-anchor component-margin--none \" style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"page-anchor\"><a id=\"Check_insurance\" class=\"page_anchor\" style=\"box-sizing: border-box; appearance: none; color: inherit; text-decoration: inherit; margin: 0px 0px 0px !important 0px;\" name=\"Check_insurance\" data-label=\"Checkinsurance\" data-anchor=\"Check_insurance\"></a></div>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">2. Check your insurance</h2>\r\n</div>\r\n</div>\r\n<div class=\"text-content text-content--align-default text--p-medium component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"text-content\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">Not all health insurance companies offer coverage abroad. Read your insurance policy closely, and if you can&rsquo;t find details about your international coverage, it&rsquo;s worth giving your insurance provider a call.</p>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem; margin: 0px 0px 0px !important 0px;\">You can also purchase supplemental medical insurance. Although no one wants to focus on what could go wrong, it&rsquo;s always better to be safe when traveling with small kids. If you&rsquo;re traveling within the country, check if the hospitals nearby take your insurance.</p>\r\n</div>\r\n<div class=\"page-anchor component-margin--none \" style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"page-anchor\"><a id=\"Practice_safety\" class=\"page_anchor\" style=\"box-sizing: border-box; appearance: none; color: inherit; text-decoration: inherit; margin: 0px 0px 0px !important 0px;\" name=\"Practice_safety\" data-label=\"Practicesafety\" data-anchor=\"Practice_safety\"></a></div>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">3. Practice safety</h2>\r\n</div>\r\n</div>\r\n<div class=\"text-content text-content--align-default text--p-medium component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"text-content\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">As the old adage goes, practice makes perfect. And although you can&rsquo;t foresee every possible scenario that could go wrong, it&rsquo;s good to have the basics down.&nbsp;<a style=\"box-sizing: border-box; appearance: none; color: #4dacbd; text-decoration: underline; margin: 0px 0px 0px !important 0px;\" href=\"https://www.safewise.com/how-to-prepare-kids-for-emergencies/\" rel=\"false\">Help your kids prepare for emergencies</a>&nbsp;by practicing what to do. You can advise them to seek the help of another parent with children, stay put until someone finds them, or meet you at a specific spot.</p>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem; margin: 0px 0px 0px !important 0px;\">Whatever plan you put in place, go through it with your children a few times so they remember exactly what to do&nbsp;<a style=\"box-sizing: border-box; appearance: none; color: #4dacbd; text-decoration: underline; margin: 0px 0px 0px !important 0px;\" href=\"https://www.safewise.com/new-york-crowd-crush-safety/\">when panic sets in</a>. It&rsquo;s also good practice to wear noticeable clothing that is easy to spot in a crowd, such as bright colors and distinct patterns.</p>\r\n</div>\r\n<div class=\"page-anchor component-margin--none \" style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"page-anchor\"><a id=\"Child_proof\" class=\"page_anchor\" style=\"box-sizing: border-box; appearance: none; color: inherit; text-decoration: inherit; margin: 0px 0px 0px !important 0px;\" name=\"Child_proof\" data-label=\"Childproof\" data-anchor=\"Child_proof\"></a></div>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">4. Child proof everything</h2>\r\n</div>\r\n</div>\r\n<div class=\"text-content text-content--align-default text--p-medium component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"text-content\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">Young children like exploring&mdash;everything. And by&nbsp;<a style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #4dacbd; text-decoration: underline;\" href=\"https://www.safewise.com/resources/baby-proofing-guide/\" rel=\"false\">child proofing</a>&nbsp;the space where you&rsquo;re staying, you can let them wander around without worrying about their safety. Taking preventative measures&mdash;such as blocking off certain areas with a&nbsp;<a style=\"box-sizing: border-box; appearance: none; color: #4dacbd; text-decoration: underline; margin: 0px 0px 0px !important 0px;\" href=\"https://www.safewise.com/resources/baby-gates-buyers-guide/\" rel=\"false\">baby gate</a>&nbsp;and covering outlets&mdash;drastically reduces the chance that your little ones will get hurt.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">If you don&rsquo;t want to pack everything with you, call the hotel or the place you&rsquo;ll be staying to see what options they have for child proofing the room.</p>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem; margin: 0px 0px 0px !important 0px;\">And along the lines of keeping your kids safe, if you happen to be traveling with young kids in the car, it&rsquo;s worth investing in a&nbsp;<a style=\"box-sizing: border-box; appearance: none; color: #4dacbd; text-decoration: underline; margin: 0px 0px 0px !important 0px;\" href=\"https://www.safewise.com/resources/carseat-buyers-guide/\" rel=\"false\">safe car seat</a>.</p>\r\n</div>\r\n<div class=\"page-anchor component-margin--none \" style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"page-anchor\"><a id=\"Track_kids\" class=\"page_anchor\" style=\"box-sizing: border-box; appearance: none; color: inherit; text-decoration: inherit; margin: 0px 0px 0px !important 0px;\" name=\"Track_kids\" data-label=\"Trackkids\" data-anchor=\"Track_kids\"></a></div>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">5. Track your kids</h2>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Kids always find ways to pull disappearing acts. Luckily, with&nbsp;<a style=\"box-sizing: border-box; appearance: none; color: #4dacbd; text-decoration: underline; margin: 0px 0px 0px !important 0px;\" href=\"https://www.safewise.com/resources/wearable-gps-tracking-devices-for-kids-guide/\" rel=\"false\">kids&rsquo; wearable tracking devices</a>, you&rsquo;ll know exactly where to find them. Now you can visit busy tourist attractions, crowded theme parks, and more without the constant anxiety of possibly losing your child.</p>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; margin: 0px 0px 0px !important 0px;\">These wearable GPS devices come with a wide range of capabilities so you can decide just how much protection you need. They also come in fun colors and designs, and some even include games, making them more appealing to your kids.</p>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; margin: 0px 0px 0px !important 0px;\">&nbsp;</p>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">6. Keep kids occupied</h2>\r\n</div>\r\n</div>\r\n<div class=\"text-content text-content--align-default text--p-medium component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"text-content\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">Idle hands make mischief. Especially when they&rsquo;re adorable little kid hands. An easy fix is to keep toys and movies handy when traveling. It&rsquo;s natural for kids to get antsy and fussy on long trips and layovers, but keeping them occupied can prevent them from getting into trouble.</p>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem; margin: 0px 0px 0px !important 0px;\">If you don&rsquo;t want your kids staring at a screen all day, you can play board games with them or read them a story. This is also a great way to get your kids tired so they can nap&mdash;making the trip more enjoyable for everyone.</p>\r\n</div>\r\n<div class=\"page-anchor component-margin--none \" style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"page-anchor\"><a id=\"Pack_medical_kit\" class=\"page_anchor\" style=\"box-sizing: border-box; appearance: none; color: inherit; text-decoration: inherit; margin: 0px 0px 0px !important 0px;\" name=\"Pack_medical_kit\" data-label=\"Packmedicalkit\" data-anchor=\"Pack_medical_kit\"></a></div>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">7. Pack a medical kit</h2>\r\n</div>\r\n</div>\r\n<div class=\"text-content text-content--align-default text--p-medium component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"text-content\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">Kids will be kids. And scrapes, falls, and bruises are part of growing up. When you&rsquo;re traveling with kids, having a&nbsp;<a style=\"box-sizing: border-box; appearance: none; color: #4dacbd; text-decoration: underline; margin: 0px 0px 0px !important 0px;\" href=\"https://www.safewise.com/blog/essentials-diy-first-aid-kit/\" rel=\"false\">medical first aid kit</a>&nbsp;could come in handy. Pack your kit with the essentials such as Band-Aids, disinfectant spray, and ibuprofen.</p>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem; margin: 0px 0px 0px !important 0px;\">Depending on where you plan on traveling, you might want to customize what you bring in the kit. Think of your location and the most likely ways your kids might get hurt, and pack ahead of time.</p>\r\n</div>\r\n<div class=\"page-anchor component-margin--none \" style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"page-anchor\"><a id=\"Create_ID_cards\" class=\"page_anchor\" style=\"box-sizing: border-box; appearance: none; color: inherit; text-decoration: inherit; margin: 0px 0px 0px !important 0px;\" name=\"Create_ID_cards\" data-label=\"CreateIDcards\" data-anchor=\"Create_ID_cards\"></a></div>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">8. Create information cards</h2>\r\n</div>\r\n</div>\r\n<div class=\"text-content text-content--align-default text--p-medium component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"text-content\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">Equip your kids with information cards. In the event that you and your kids get separated, these information cards could make all the difference. Include your important numbers, names, where you&rsquo;re staying, and anything else that&rsquo;s important.</p>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem; margin: 0px 0px 0px !important 0px;\">Some of this information will depend on what kind of vacation you&rsquo;re on and where you&rsquo;re staying, so make sure to update them for each trip. Your kids will easily be able to hand these cards to an adult or police officer to help them find you.</p>\r\n</div>\r\n<div class=\"page-anchor component-margin--none \" style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"page-anchor\"><a id=\"Have_a_plan\" class=\"page_anchor\" style=\"box-sizing: border-box; appearance: none; color: inherit; text-decoration: inherit; margin: 0px 0px 0px !important 0px;\" name=\"Have_a_plan\" data-label=\"Haveaplan\" data-anchor=\"Have_a_plan\"></a></div>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">9. Have a plan B</h2>\r\n</div>\r\n</div>\r\n<div class=\"text-content text-content--align-default text--p-medium component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"text-content\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">Hope for the best and prepare for the worst. This might sound a bit dramatic, but there&rsquo;s nothing quite as reassuring as having a plan B. And it goes hand in hand with practicing safety. Having an alternative plan is useful when the unexpected happens.</p>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem; margin: 0px 0px 0px !important 0px;\">Go over your plan with your kids, and have them recite it back to you so you know they&rsquo;re always prepared. It might even be helpful to point out where they could run for help, such as a nearby police station or community building, if something does happen.</p>\r\n</div>\r\n<div class=\"page-anchor component-margin--none \" style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"page-anchor\"><a id=\"Make_an_itinerary\" class=\"page_anchor\" style=\"box-sizing: border-box; appearance: none; color: inherit; text-decoration: inherit; margin: 0px 0px 0px !important 0px;\" name=\"Make_an_itinerary\" data-label=\"Makeanitinerary\" data-anchor=\"Make_an_itinerary\"></a></div>\r\n<div class=\"heading component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; appearance: none; color: #000000; font-family: \'Open Sans\', sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"heading\">\r\n<div class=\"clwp-heading-container clwp-heading-container--default clwp-heading-container--align-default\" style=\"box-sizing: border-box; appearance: none; display: block; margin: 0px 0px 0px !important 0px;\">\r\n<h2 class=\"clwp-heading clwp-heading--h2\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; appearance: none; font-weight: 800; font-family: \'Nunito Sans\', sans-serif; color: #524a49; font-size: 1.875rem; line-height: 2.5rem;\">10. Make a child-friendly itinerary</h2>\r\n</div>\r\n</div>\r\n<div class=\"text-content text-content--align-default text--p-medium component-margin--medium \" style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" data-widget=\"text-content\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">Find places your kids will enjoy as much as you. Traveling with kids can be a bit of a compromise. They can&rsquo;t do everything you might want to do, but if you plan ahead and create an itinerary that includes them, you can find places that you&rsquo;ll both enjoy.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">If you have a specific destination in mind, ask the resort or hotel what kind of kids&rsquo; activities it offers and what things you should anticipate with a child on the trip before you book.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">The more planning you put into your family vacation, the less likely that something will go wrong. As part of your planning, you might also consider your modes of transportation. If you&rsquo;re driving, take a look at these&nbsp;<a style=\"box-sizing: border-box; margin: 0px; appearance: none; color: #4dacbd; text-decoration: underline;\" href=\"https://www.safewise.com/blog/road-trip-safety-tips/\" rel=\"false\">road trip safety tips</a>, and if you don&rsquo;t have one, consider packing a&nbsp;<a style=\"box-sizing: border-box; appearance: none; color: #4dacbd; text-decoration: underline; margin: 0px 0px 0px !important 0px;\" href=\"https://www.safewise.com/resources/best-car-emergency-kits/\" rel=\"false\">car emergency kit</a>.&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.25rem; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 1rem; line-height: 1.6875rem;\">In general, traveling with your kids requires a bit more research and preparedness, but it&rsquo;s also incredibly rewarding. Keep these safety tips in mind next time you travel and enjoy watching your kids explore the world.</p>\r\n</div>\r\n<p style=\"box-sizing: border-box; appearance: none; font-family: \'Open Sans\', sans-serif; font-weight: 400; color: #6e6361; font-size: 16px; line-height: 1.6875rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; margin: 0px 0px 0px !important 0px;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>', '1', 'BLOG00120240109103625_659d1399c9bc0.jpg', 'STF00220231222013400', 4, '2024-01-09 10:36:25', '2024-01-21 22:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `culture_cat_tab`
--

CREATE TABLE `culture_cat_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `statistics` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `culture_cat_tab`
--

INSERT INTO `culture_cat_tab` (`sn`, `cat_id`, `category_name`, `statistics`, `status_id`, `created_time`, `updated_time`) VALUES
(1, 'CULCAT00120240108061450', 'HISTORICAL BUILDINGS AND MONUMENTS', 0, 1, '2024-01-08 18:14:50', '2024-01-08 17:14:50'),
(2, 'CULCAT00220240108061501', 'MUSEUMS AND ARTS GALLERIES', 0, 1, '2024-01-08 18:15:01', '2024-01-08 17:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `culture_tab`
--

CREATE TABLE `culture_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `page_id` varchar(50) NOT NULL,
  `page_title` mediumtext NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `page_summary` text NOT NULL,
  `page_detail` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `page_pix` varchar(255) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `culture_tab`
--

INSERT INTO `culture_tab` (`sn`, `cat_id`, `page_id`, `page_title`, `page_url`, `seo_keywords`, `page_summary`, `page_detail`, `status_id`, `page_pix`, `staff_id`, `views`, `created_time`, `updated_time`) VALUES
(1, 'CULCAT00120240108061450', 'CULT00120240108061552', 'Cathedral Church of Christ, Lagos State, Nigeria', 'cathedral-church-of-christ-lagos-state-nigeria', 'Cathedral Church of Christ, Lagos State, Nigeria', 'T is rare for a church to celebrate One hundred and fifty years anniversary in Africa, but that was exactly what the Cathedral Church of Christ, Diocese of Lagos', '<h2>Cathedral Church of Christ, Lagos State, Nigeria</h2>\r\n<p>T is rare for a church to celebrate One hundred and fifty years anniversary in Africa, but that was exactly what the Cathedral Church of Christ, Diocese of Lagos, Marina did recently. The faithful trooped out to the church to mark the event with pomp and pageantry.<br /><br /><br />It was a remarkable event. Last Sunday the incumbent provost, Very Reverend Adebola Ayodeji Ojofeitimi from Ilesha in Osun state announced that the 150th anniversary will be rounded off on December 10 while a church will be planted around Okun Ajah in Lekki to be name in honour of Bishop Samuel Ajayi Crowther next month.<br /><br /><br />Earlier Provosts of the Church include&nbsp; Adelakun Williamson Howells (1951-1960), Festus Oluwole Segun ( 1960-1970), Samuel Hugh Akinsope Johnson (1970-1995), Adebola Olusegun Okubadejo (1995-1998), Thomas Akinola Jaiyeola Oluwole (1999- 2002), Oluyinka Ibikunle Omololu (2002-2009) and&nbsp; Babatunde Colenso Akinpelu Johnson (2009 to 2016) .<br /><br />The Provost Wardens of the Church were R.A.O. Martins (1946-1950), G.O. Laja (1951-1955), Alphaeus Martins (1956-1961), E.V. Badejo(1962-1970),D. O. Asekun (1970-1975), Bode Peters(1975-1980), Ayo Otuyalo (1980-1985), V. Akin Thompson (1985-1990), Kola Ramos(1990-1993), F.T. Durand (1993-1995),E.O.G. Moore (1995-1999), Muyiwa Oyewole (1999-2003), Gbola Akinola (2003-2011), Damola Dacosta (2011-2013) and Jide Ladeinde(2013 to date).<br /><br />Honouring Bishop Ajayi Crowther(1806-1891) is a good thing. For on June 29 1864 he was consecrated the Bishop Western Equatorial Africa by the Archbishop of Canterbury in Canterbury Cathedral, becoming the first African Anglican Bishop. His son, Archdeacon Dandeson Crowther was also a prominent churchman in the lower Niger area while his daughter was the mother of Herbert Samuel Heelas Macaulay (1864-1946), a Nigerian Surveyor and Politician.<br /><br />The foundation stone of the Cathedral Church of Christ, Marina was laid on March 29, 1867 by Mr. John Hawley Glover, administrator of the then Lagos in the presence of Henry Doherty and John Ogunbunmi&nbsp; who were then Wardens of the Church.<br /><br />Bishops that have served in the church include Rev. Melville Jones (1919-1940), Lesilie Gordon Vining(1940-1953),Leslie Gordon Vining (1951-1955), Adelakun Williamson Howells (1955-1963),Seth Irunsewe Kale (1963-1974), Festus Oluwole Segun (1975-1985), Joseph Abiodun Adetiloye (1985-1999) and Ephraim Adebola Ademowo (2000 to date)<br /><br />And the following have served as people&rsquo;s warden in the church. They are E. M. Agbebi (1907-1909), C.B. Olumuyiwa (1919-1923),D.T. Sasegbon (1923-1935), A.A. Bajulaiye (1936-1941),E. A.. Pearce (1946-1947), J.A. Curtis (1948-1952), Adeniji-Williams (1953),F. O.. Campbell(1955-1967), J. G. Ayodele(1967-1970),A. O. Oredugba(1970-1975), D.B.O. Ogutuga (1975-1981), S. A. Makinwa (1981-1987), S. A. Durojaiye (1987-1989),John Balogun(1989-1996), F. A. Adwunmi (1996-1999),Goke Ademiluyi (1999-2002), Rotimi Odugbesan (2002-2010), Gbolahan Ayodele (2010-2015) and Olugbolaga Ajayi (2015 to date).<br /><br />On January 1926, the stained glass window at the High Altar of the church were presented by Mr. E.M.E. Agbebi in memory of his late brother and his wife, Mr.&amp; Mrs. G. D. Agbebi and, his father-in-law, Dr. Obadiah Johnson. He also donated to the Cathedral the stained window at the altar of the Lady Chapel in memory of his late brother, Mr Folarin Agbebi.<br /><br /><br />In 1920, the following members were members of the Church building committee. They were M.S. Cole, J.H. Doherty,E.O. Moore, P.H. Williams,E.M.E. Agbebi,G.D. Agbebi, G.T. Bikersteth, J.R.R. McEwen,F.T. Wey,T.K.E. Phillips,S.H. Pearce, Adeniyi Jones,F.G. Martins, M.A. Akinsemoyin, Victor Coker,T.J. Carew, C.B. Olumuyiwa,I.A. Ogunmodede, A.E. Norman- Williams, J.T. Nelson-Cole, Z.I. Renner and D. Sasegbon.<br /><br />Related News<br />Reconnecting to the global radar (6), By Eric Teniola<br />Reconnecting to the global radar (5) By Eric Teniola<br />Reconnecting to the global radar (4), By Eric Teniola<br />On September 10, 1958, the terrazzo flooring of the church was donated by the Jones family in honour of Dr. C.C. Adeniyi Jones.<br /><br />When Queen Elizabeth II and her husband Prince Phillip came to Nigeria on January 28 1956, they worshipped at the church and on Independence Day 1960, Princess Alexandria who represented the Queen also worshipped in the church.<br /><br />The following served as the Vicar&rsquo;s Warden of the church. They are M.T. Robbin(1907-1916), M.T. Ogunmefun(1917-1922), F.T. Wey(1923-1924), M.O. H. Obafemi(1925-1926), J.R.O. McEwen(1928-1929), H. S. A. Thomas (1930-1931), A. A. Bajulaiye (1932-1935), E.A. Pearse(1936), N.O. Dixon (1938-1939) and J. A. Adeniji (1940-1945).<br /><br />On April 19, 1969, General Yakubu Gowon the then Head of State married his wife, Victoria Zakari in the church.<br /><br /><br />At present the church has a 64 stop, 4 manual pipe organ which was dedicated on May 2, 2010.<br /><br />On a normal Sunday, the Church conducts four services&mdash;7.15am, 9.15am, 11.15am and 5pm. On entry to the Church one is captivated by the beauty of its architecture. It is the oldest Anglican Cathedral in the Church of the Nigeria Communion and one of the most beautiful Cathedrals in Africa. It was designed by Architect Benjamin Bagaondogi. At present, the church attendance is high owing to the recently designed policy of the Provost, Very Reverend Adebola&nbsp; Ojofeitimi who has involved Youths and Church societies in the administration of the Cathedral.<br /><br />While church attendance is falling in England, church attendance is rising in Nigeria. What a paradox.<br /><br />According to a recent report I read by Mr. Harriet Sherwood, a religious correspondent, &ldquo;The number of people attending Church of England services each week has for the first time dropped below 1 million &ndash; accounting for less than 2% of the population &ndash; with Sunday attendances falling to 760,000.<br /><br />The statistics, published on Tuesday, reflect the C of E&rsquo;s steady decline over recent decades in the face of growing secularism and religious diversity, and the ageing profile of its worshippers. Numbers attending church services have fallen by 12% in the past decade, to less than half the levels of the 1960s. The figures from the church&rsquo;s latest annual survey of attendance show that a weekly average of 980,000 people attended its 16,000 churches during October 2014, comprising 830,000 adults and 150,000 children. The vast majority attended on a Sunday, and there is likely to be some double-counting in the weekly figure.<br /><br /><br />Numbers shot up at Christmas, with 2.4 million attending a festive service in 2014. The church conducted 130,000 baptisms in the year, down 12% since 2004; 50,000 marriages, down 19%; and 146,000 funerals, down 29%.<br /><br />The church said it was not surprised by the latest figures. &ldquo;While the recent trend of the past decade continues, it has been anticipated and is being acted on radically,&rdquo; said Graham James, bishop of Norwich.<br /><br />&ldquo;We do not expect that trend to change imminently or immediately over the next few years due to demographics. We lose approximately 1% of our churchgoers to death each year. Given the age profile of the C of E, the next few years will continue to have downward pressure as people die or become housebound and unable to attend church.&rdquo;<br /><br />Speaking at the opening of the Anglican primates&rsquo; meeting in Canterbury, the archbishop of Canterbury, Justin Welby, said: &ldquo;In some parts of the Communion decline in numbers has been a pattern for many years. In England our numbers have been falling at about 1% every year since world war two &hellip; The culture [is] becoming anti-Christian, whether it is on matters of sexual morality, or the care for people at the beginning or the end of life. It is easy to paint a very gloomy picture.&rdquo;</p>', '1', 'CULT00120240108061552_659c2dc87b4dd.jpg', 'STF00220231222013400', 3, '2024-01-08 18:15:52', '2024-01-15 22:35:20'),
(2, 'CULCAT00220240108061501', 'CULT00220240108061632', 'Nike art gallery, Lagos State Nigeria', 'nike-art-gallery-lagos-state-nigeria', 'Nike art gallery, Lagos State Nigeria', 'Nike is a multi-talented individual with a wide range of enduring fortitude. In her early life as a village girl, she was a stage dancer and later became an actress', '<h2>Nike art gallery, Lagos State Nigeria</h2>\r\n<p>Chief (Mrs.) Nike Monica Okundaye popularly known and called &ldquo;MAMA NIKE&rdquo; by her numerous fans, was born on the 23rd May 1951 at a very quiet and hilly village of Ogidi-Ijumu in Kogi State of Nigeria. She is the Owner/Curator of the Nike Art Galleries at Lagos, Osogbo, Ogidi-Ijumu and Abuja. She is also an accomplished professional artist, a painter, a textile artist, weaver, embroiderand an awards winner at many national and international art shows. Nike is a member of many nationa and international bodies including Society of Nigerian Artists, ASA of USA and Canada, ACASA, Society of Nigerian Women Artists, Member of Osun Support Grove, Board member of the National Heritage Council of Nigeria, Member of the Board of Trustee of Osun State Centre For Black Culture and International understanding, etc. She is also principally a social entrepreneur and a well know philanthropist championing the cause of the neglected Nigerian rural women suing art as a tool to accomplish these nobel missions.<br /><br />Nike is a multi-talented individual with a wide range of enduring fortitude. In her early life as a village girl, she was a stage dancer and later became an actress featuring as a lead actress in a local Yoruba film, &ldquo;Ayaba&rdquo;. In addition, she has also participated in many documentary films including &ldquo;KINDRED SPIRITS&rdquo; sponsored and produced by Smithsonian Museum in Washington DC and a CNN feature documentary film &ldquo;AFRICAN VOICES&rdquo;.<br /><br />Nike Center for Art and Culture in Osogbo offers free of charge trainings to all Nigerians in various forms of arts. The center was established in 1983, by Nike solely from her earnings as an artist and without governmental assistance. Nike opened this center with 20 young girls who were marching the streets in Osogbo aimlessly and who had no hopes for the future. In their tender age, Nike withdrew these girls from the streets and provided them with free food, free materials and free accommodation at her residence at Osogbo and taught them how to use their hands to earn decent livings through the art. So far, over 3000 young Nigerians have been trained in the center and who are now earning their decent livings through art. Many African countries now send their students to study textile art at the center.<br /><br />The Nike Center for Art and Culture, Osogbo now admits undergraduate students from many universities in Nigeria for their industrial training programs in textile design. This center also now admits students from all over Europe, Canada and the United States of America. International scholars and other researchers in traditional African art and culture also visit the center from time to time for their research works into Yoruba \"Adire\" fabric processing and African traditional dyeing methods.<br /><br />In 1996, Nike also established a textile (Aso-Oke) weaving center at Ogidi-Ijumu near Kabba in Kogi State for the women of the village, employing and empowering more than 200 women in the weaving center. In June 2002, Nike established an Art and Culture research center at Piwoyi village, FCT Abuja with an art gallery and a textile museum, the first of its kind in Nigeria which provides a functional platform for research into Nigerian traditional textile industry in the Federal Capital Territory area of Abuja. In furtherance of these noble endeavors, Nike is currently the managing director and founder of the following organizations in Nigeria; \"Nike Art Productions Limited\" which she incorporated in 1994, \"Nike Art Gallery Limited\" which she incorporated in 2007 and the \"Nike Research Centre for Art and Culture Limited\" which she incorporated in 2007. Also in 2007, Nike founded the \"Nike Art and Culture Foundation\" with some notable eminent Nigerians as trustees, with the main aims and objectives of fostering Nigerian cultural heritage.</p>', '1', 'CULT00220240108061632_659c2df070012.jpg', 'STF00220231222013400', 1, '2024-01-08 18:16:32', '2024-01-14 18:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `entertainment_cat_tab`
--

CREATE TABLE `entertainment_cat_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `statistics` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entertainment_cat_tab`
--

INSERT INTO `entertainment_cat_tab` (`sn`, `cat_id`, `category_name`, `statistics`, `status_id`, `created_time`, `updated_time`) VALUES
(0, 'ECAT00120240105030842', 'AMUSEMENT AND RECREATION PARKS', 0, 1, '2024-01-05 15:08:42', '2024-01-05 14:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `entertainment_tab`
--

CREATE TABLE `entertainment_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `page_id` varchar(255) NOT NULL,
  `page_title` mediumtext NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `page_summary` text NOT NULL,
  `page_detail` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `page_pix` varchar(255) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entertainment_tab`
--

INSERT INTO `entertainment_tab` (`sn`, `cat_id`, `page_id`, `page_title`, `page_url`, `seo_keywords`, `page_summary`, `page_detail`, `status_id`, `page_pix`, `staff_id`, `views`, `created_time`, `updated_time`) VALUES
(0, 'ECAT00120240105030842', 'ENT00120240105042100', 'Magicland Amusement Park', 'magicland-amusement-park', 'Magicland Amusement Park', 'Magic Land has been around for a while now! It’s one of the oldest Amusement Parks in Abuja. It’s also one of the most affordable, rides for both Kids and Adult', '<h2>Magicland Amusement Park</h2>\r\n<p style=\"box-sizing: inherit; border: 0px; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.8; font-family: \'Open Sans\', serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 1.4rem; font-style: normal; font-weight: 400; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; word-break: break-word; color: #3f3f46; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Magic Land has been around for a while now! It&rsquo;s one of the oldest Amusement Parks in Abuja. It&rsquo;s also one of the most affordable. There are rides for both Kids and Adults!</p>\r\n<div class=\"code-block code-block-7\" style=\"box-sizing: inherit; border: 0px; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: inherit; font-family: \'Open Sans\', serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px; font-style: normal; font-weight: 400; margin: 8px 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: #3f3f46; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; clear: both;\">&nbsp;</div>\r\n<p style=\"box-sizing: inherit; border: 0px; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.8; font-family: \'Open Sans\', serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 1.4rem; font-style: normal; font-weight: 400; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; word-break: break-word; color: #3f3f46; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Entrance is N300 for children and N500 for adults. An additional fee ranging from about 500-700 is charged on the various ride here. A lot of the rides are unfortunately not functioning, this place could use some maintenance, rides are squeaking</p>\r\n<div class=\"code-block code-block-9\" style=\"box-sizing: inherit; border: 0px; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: inherit; font-family: \'Open Sans\', serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px; font-style: normal; font-weight: 400; margin: 8px 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: #3f3f46; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; clear: both;\"><img src=\"../../api/uploaded_files/entertainment_pix/other_pix/ENT00120240105042100-1-6599994dc6fea4.33996245.jpg\" alt=\"\" width=\"100%\" height=\"400\" /></div>\r\n<p style=\"box-sizing: inherit; border: 0px; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.8; font-family: \'Open Sans\', serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 1.4rem; font-style: normal; font-weight: 400; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; word-break: break-word; color: #3f3f46; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Nevertheless, the Arcade looks great, probably one of the best parts of this place. Games here on average cost N500. You have to purchase coins to play, these cost N100 each.</p>\r\n<p style=\"box-sizing: inherit; border: 0px; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.8; font-family: \'Open Sans\', serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 1.4rem; font-style: normal; font-weight: 400; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; word-break: break-word; color: #3f3f46; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">With the festive period upon us, here&rsquo;s a very budget friendly place to go.</p>\r\n<p style=\"box-sizing: inherit; border: 0px; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.8; font-family: \'Open Sans\', serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 1.4rem; font-style: normal; font-weight: 400; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; word-break: break-word; color: #3f3f46; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">There&rsquo;s food and drinks here too.</p>\r\n<p style=\"box-sizing: inherit; border: 0px; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 1.8; font-family: \'Open Sans\', serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 1.4rem; font-style: normal; font-weight: 400; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; word-break: break-word; color: #3f3f46; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">LOCATION: No. 1, Kukwaba Hills, Constitution Ave, Wuye from 10am. Best to visit on weekends or holidays</p>\r\n<p>&nbsp;</p>', '1', 'ENT00120240105042100_65994a3e7d199.jpg', 'STF00220231222013400', 3, '2024-01-05 16:21:00', '2024-01-15 15:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `event_tab`
--

CREATE TABLE `event_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `page_id` varchar(50) NOT NULL,
  `page_title` mediumtext NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `page_summary` text NOT NULL,
  `page_detail` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `page_pix` varchar(255) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_tab`
--

INSERT INTO `event_tab` (`sn`, `cat_id`, `page_id`, `page_title`, `page_url`, `seo_keywords`, `page_summary`, `page_detail`, `status_id`, `page_pix`, `staff_id`, `views`, `created_time`, `updated_time`) VALUES
(1, '', 'ET00120240103123203', '32nd Ogunola Day Celebration 2023: IPara Remo Shines In Grand Tradition', '32nd-ogunola-day-celebration-2023-ipara-remo-shines-in-grand-tradition', '32nd Ogunola Day Celebration 2023: IPara Remo Shines In Grand Tradition', 'The grand finale of Oguola Day Celebration, a socio-cultural annual festival was well attended by Ipara Remo\'s sons and daughters at home and abroad ', '<h2>32nd Ogunola Day Celebration 2023: IPara Remo Shines In Grand Tradition</h2>\r\n<p>The grand finale of Oguola Day Celebration, a socio-cultural annual festival was well attended by Ipara Remo\'s sons and daughters at home and, abroad and other distinguished invited guests.</p>\r\n<p>The Oguola Day Celebration is usually a week-long annual socio-cultural festival that brings all sons and daughters of Ipara Remo at home and abroad together to celebrate and showcase the founder\'s legacy, the people, culture, arts, traditions and religions in line with various growth and development of the people and community.</p>\r\n<p>The founder of Ipara Remo in the early part of the history of Yoruba people was called OGUOLA with his wife called OROYE about 12 A.D. It was asserted and believed that he was of Royal&nbsp; blood from Ile-Ife in Osun State.</p>\r\n<p>The Grand finale of this year\'s event was held on Saturday, 18th November, 2023 at United Primary School, Playground Ipara Remo, Ogun State.</p>\r\n<p>The 2023 annual socio-cultural festival featured the launching of Two and fifty million naira (N250,000,000:00) Onipara\'s Palace Fundraising and various activities, programs and projects. It was a week-long annual socio-cultural festival. The grand finale featured different traditional age groups, clubs, associations, youth associations, artisans associations, market men and women associations in their various colorful attires that paid royal homage to the community\'s Royal father, His Royal Highness, Alayeluwa Oba Taiwo Taiwo, Amororo II, Onipara of Ipara Remo in form of showing their allegiance to the royal father.</p>\r\n<p>His Excellency, Prince Dapo Abiodun, CON, the Executive Governor of Ogun State as the Special Guest of honour was ably represented at the event by the Executive Chairman, Remo North Local Government, Ogun State, Hon. (Prince) Adedapo Odunsi.</p>\r\n<p>The 2023 Oguola Day Celebration was chaired by Dr. Seinde Fadeni with Engr. Wole Ogunsanya as the Chief Launcher.</p>\r\n<p>Mr. Sammy Ogunjimi and Otunba Seni Adetu were the Chief Launcher and Co-Launcher of Onipara\'s Palace Fundraising respectively. While Aremo (Dr.) Yemi Ogunbiyi, the Balogun of Ipara Remo was the Chief host.</p>\r\n<p>The Royal father in attendance were: HRH, Oba A. A. Mayungbe, Odemo of Isara Remo, HRH, Adetunji Amidu Osho, Alaye-Ode, Ode Remo, HRH, Sikiru A. A. Adeyiga, Onirolu of Irolu, HRH, Oba M. S. L. Ginsanrin, Odofin of Soyindo, HRH, Oba Kolawole Adesina Adeyemi, Nebula of Ibido, HRH, Oba James O. Salihu, Ologere of Ogere Remo, HRH, Oba Lukman Salami, Ebi of Edina, HRH, Oba Mukaila Akanji Olabinjo, Eleposo of Eposo, HRH, Oba S. O. Kalejaiye, Nloku of Iraye, HRH, Oba Musiliu Oriyomi Soile, Radanuwa of Idado and HRH, Lukman Allison, Alabama of Agura and the Oloris of HRHs in Remoland were royally entertained by Ayaba Folake Taiwo, Olori of Onipara of Ipara Remo.</p>\r\n<p>Also in attendance were; Onipara In-Council (Ipara Chiefs), Ipara Remo Council of Baales, Ipara (Remo) Community Development Association.</p>\r\n<p>The 2023 Oguola Day Celebration Central Working Committee was chaired by Chief (Mrs.) Olusola Adebukunola Ogunsanya-Abisoye while Prof. Kolawole Soyebo was the Secretary with other distinguished sons and daughters of Ipara Remo as Executive Council members and sub-committees members.</p>\r\n<p>&nbsp;</p>', '1', 'ET00120240103123203_65949cf353468.jpg', 'STF00220231222013400', 8, '2024-01-03 00:32:03', '2024-01-24 17:44:06'),
(2, '', 'ET00220240108054919', '33rd Lafose Day Celebration 2023: Ode Remo Shines In Grand Tradition', '', '', '', '', '1', 'ET00220240108054919_659c278f248cc.jpg', 'STF00220231222013400', 1, '2024-01-08 17:49:19', '2024-01-15 10:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `faq_tab`
--

CREATE TABLE `faq_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `faq_id` varchar(100) NOT NULL,
  `faq_question` varchar(255) NOT NULL,
  `faq_answer` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_tab`
--

INSERT INTO `faq_tab` (`sn`, `cat_id`, `faq_id`, `faq_question`, `faq_answer`, `status_id`, `created_time`, `updated_time`) VALUES
(1, '009', 'FAQ00120240109085504', 'Can I find information of tourist destinations on your platform?', '<p>Absolutely! We prioritize your safety. Check the \'Safety\' section for travel advisories, local guidelines, and safety measures implemented at each destination.</p>', '1', '2024-01-09 08:55:04', '2024-01-09 17:40:35'),
(2, '009', 'FAQ00220240109085605', 'Who We Are', '<p>We are a dedicated online service provider with a reliable outstanding online class service.</p>', '1', '2024-01-09 08:56:05', '2024-01-09 07:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `natural_tourism_product_cat_tab`
--

CREATE TABLE `natural_tourism_product_cat_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `statistics` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `natural_tourism_product_cat_tab`
--

INSERT INTO `natural_tourism_product_cat_tab` (`sn`, `cat_id`, `category_name`, `statistics`, `status_id`, `created_time`, `updated_time`) VALUES
(1, 'NTPCAT00120240108075302', 'WILDLIFE', 0, 1, '2024-01-08 19:53:02', '2024-01-08 18:53:02'),
(2, 'NTPCAT00220240108075311', 'BEACHES', 0, 1, '2024-01-08 19:53:11', '2024-01-08 18:53:11'),
(3, 'NTPCAT00320240108075321', 'ISLANDS', 0, 1, '2024-01-08 19:53:21', '2024-01-08 18:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `natural_tourism_product_tab`
--

CREATE TABLE `natural_tourism_product_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `page_title` mediumtext NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `page_summary` text NOT NULL,
  `page_detail` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `page_pix` varchar(255) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `natural_tourism_product_tab`
--

INSERT INTO `natural_tourism_product_tab` (`sn`, `cat_id`, `page_id`, `page_title`, `page_url`, `seo_keywords`, `page_summary`, `page_detail`, `status_id`, `page_pix`, `staff_id`, `views`, `created_time`, `updated_time`) VALUES
(1, 'NTPCAT00120240108075302', 'NTP00120240108075601', 'Yankari Game Reserve, Bauchi State, Nigeria', 'yankari-game-reserve-bauchi-state-nigeria', 'Yankari Game Reserve, Bauchi State, Nigeria', 'The Yankari Game Reserve (Bauchi State) is one of Nigeria’s best known travel destinations. I was there sometime in 2014, and the memories still stay.', '<article class=\"meteredContent\" style=\"box-sizing: inherit; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<div class=\"l\" style=\"box-sizing: inherit; display: block;\">\r\n<div class=\"l\" style=\"box-sizing: inherit; display: block;\">\r\n<section style=\"box-sizing: inherit;\">\r\n<div style=\"box-sizing: inherit;\">\r\n<div class=\"gs gt gu gv gw\" style=\"box-sizing: inherit; word-break: break-word; overflow-wrap: break-word;\">\r\n<div class=\"ab ca\" style=\"box-sizing: inherit; display: flex; justify-content: center;\">\r\n<div class=\"ch bg fw fx fy fz\" style=\"box-sizing: inherit; width: 680px; min-width: 0px; margin: 0px 24px; max-width: 680px;\">\r\n<h2 class=\"pw-post-body-paragraph nm nn gz no b np nq nr ns nt nu nv nw nx ny nz oa ob oc od oe of og oh oi oj gs bj\" style=\"box-sizing: inherit; margin: 2.14em 0px -0.46em; font-weight: 400; color: #242424; word-break: break-word; font-style: normal; line-height: 32px; letter-spacing: -0.003em; font-family: source-serif-pro, Georgia, Cambria, \'Times New Roman\', Times, serif; font-size: 20px;\"><strong class=\"no ha\" style=\"box-sizing: inherit; font-weight: bold; font-family: source-serif-pro, Georgia, Cambria, \'Times New Roman\', Times, serif;\"><em class=\"ok\" style=\"box-sizing: inherit; font-style: italic;\">Yankari Game Reserve, Bauchi State, Nigeria</em></strong></h2>\r\n<p id=\"4dfb\" class=\"pw-post-body-paragraph nm nn gz no b np nq nr ns nt nu nv nw nx ny nz oa ob oc od oe of og oh oi oj gs bj\" style=\"box-sizing: inherit; margin: 2.14em 0px -0.46em; font-weight: 400; color: #242424; word-break: break-word; font-style: normal; line-height: 32px; letter-spacing: -0.003em; font-family: source-serif-pro, Georgia, Cambria, \'Times New Roman\', Times, serif; font-size: 20px;\" data-selectable-paragraph=\"\"><strong class=\"no ha\" style=\"box-sizing: inherit; font-weight: bold; font-family: source-serif-pro, Georgia, Cambria, \'Times New Roman\', Times, serif;\"><em class=\"ok\" style=\"box-sizing: inherit; font-style: italic;\">The Yankari Game Reserve (Bauchi State) is one of Nigeria&rsquo;s best known travel destinations. I was there sometime in 2014, and the memories still stay, including the sights and sound one experience on the way there. But rather than tell you another story, I wanted my travel buddies to do the talking. So this is a mini-guide for what you&rsquo;re likely to see &mdash; and feel &mdash; when you visit or stay there &mdash; through the eyes of those who&rsquo;ve been there and done that</em></strong></p>\r\n<p id=\"1b8f\" class=\"pw-post-body-paragraph nm nn gz no b np nq nr ns nt nu nv nw nx ny nz oa ob oc od oe of og oh oi oj gs bj\" style=\"box-sizing: inherit; margin: 2.14em 0px -0.46em; font-weight: 400; color: #242424; word-break: break-word; font-style: normal; line-height: 32px; letter-spacing: -0.003em; font-family: source-serif-pro, Georgia, Cambria, \'Times New Roman\', Times, serif; font-size: 20px;\" data-selectable-paragraph=\"\">I have always wondered what the Yankari Game Reserve looked like, especially considering its reputation as one of the most popular tourist attractions in Nigeria. It covers an area of more than 2,000 sqkm. The serenity could not be mistaken; neither will tourists fail to appreciate the tranquil ambience of the reserve.</p>\r\n<p id=\"c543\" class=\"pw-post-body-paragraph nm nn gz no b np nq nr ns nt nu nv nw nx ny nz oa ob oc od oe of og oh oi oj gs bj\" style=\"box-sizing: inherit; margin: 2.14em 0px -0.46em; font-weight: 400; color: #242424; word-break: break-word; font-style: normal; line-height: 32px; letter-spacing: -0.003em; font-family: source-serif-pro, Georgia, Cambria, \'Times New Roman\', Times, serif; font-size: 20px;\" data-selectable-paragraph=\"\">We settled quickly into the business of wandering around. The reserve boasts of one of the most well stocked artifacts museum, well curated and information nicely presented to capture the highs and lows of the game reserve: hoofs of exotic birds, skins of wild animals; tools of poachers who used to trouble the reserve. I was impressed with the guides and staff who showed us around.</p>\r\n<p id=\"675c\" class=\"pw-post-body-paragraph nm nn gz no b np nq nr ns nt nu nv nw nx ny nz oa ob oc od oe of og oh oi oj gs bj\" style=\"box-sizing: inherit; margin: 2.14em 0px -0.46em; font-weight: 400; color: #242424; word-break: break-word; font-style: normal; line-height: 32px; letter-spacing: -0.003em; font-family: source-serif-pro, Georgia, Cambria, \'Times New Roman\', Times, serif; font-size: 20px;\" data-selectable-paragraph=\"\">And what is a reserve without the wildlife? We drove through the picturesque wild, came across a jubilant tribe of monkeys. On our way to the legendary pre-historic caves, it was a beautifully weird experience, realizing that behind those small holes, a long gone civilization had existed. Our journey literally came to halt at the Wikki warm spring. I couldn&rsquo;t help but get a dip, relishing its therapeutic effect &mdash;&nbsp;<strong class=\"no ha\" style=\"box-sizing: inherit; font-weight: bold; font-family: source-serif-pro, Georgia, Cambria, \'Times New Roman\', Times, serif;\"><em class=\"ok\" style=\"box-sizing: inherit; font-style: italic;\">Anefiok Akpan</em></strong></p>\r\n<figure class=\"om on oo op oq nc mz na paragraph-image\" style=\"box-sizing: inherit; margin: 56px auto 0px; clear: both;\">\r\n<div class=\"nd ne fg nf bg ng\" style=\"box-sizing: inherit; width: 680px; position: relative; cursor: zoom-in; z-index: auto; transition: transform 300ms cubic-bezier(0.2, 0, 0.2, 1) 0s;\" tabindex=\"0\" role=\"button\">\r\n<div class=\"mz na ol\" style=\"box-sizing: inherit; margin-left: auto; margin-right: auto; max-width: 1000px;\"><picture style=\"box-sizing: inherit;\"><source style=\"box-sizing: inherit;\" type=\"image/webp\" /><source style=\"box-sizing: inherit;\" data-testid=\"og\" /><img class=\"bg mg nh c\" style=\"box-sizing: inherit; vertical-align: middle; background-color: #ffffff; width: 680px; max-width: 100%; height: auto;\" role=\"presentation\" src=\"https://miro.medium.com/v2/resize:fit:700/1*Vmx38_ZlwrHpY-iSROmr9Q.jpeg\" alt=\"\" width=\"700\" height=\"467\" /></picture></div>\r\n</div>\r\n<figcaption class=\"ni fc nj mz na nk nl be b bf z dt\" style=\"box-sizing: inherit; font-weight: 400; line-height: 20px; font-family: sohne, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; color: #6b6b6b; text-align: center; margin-left: auto; margin-right: auto; margin-top: 10px; max-width: 728px;\" data-selectable-paragraph=\"\">Wikki Warm Spring</figcaption>\r\n</figure>\r\n<p id=\"a7c3\" class=\"pw-post-body-paragraph nm nn gz no b np nq nr ns nt nu nv nw nx ny nz oa ob oc od oe of og oh oi oj gs bj\" style=\"box-sizing: inherit; margin: 2.14em 0px -0.46em; font-weight: 400; color: #242424; word-break: break-word; font-style: normal; line-height: 32px; letter-spacing: -0.003em; font-family: source-serif-pro, Georgia, Cambria, \'Times New Roman\', Times, serif; font-size: 20px;\" data-selectable-paragraph=\"\">The journey from Bauchi State capital to the Yankari Games Reserve is about 1hr30mins, covering a distance of 110km. We visited the museums and saw preserved skins, skulls and skeletal system of animals such as the wolf and cheetah. The reserve has hostel accommodation for researchers and tourists. A truck took us into the reserve (natural habitat), where animals are allowed to reproduce naturally without any human interference or aid. We met a handful of animals &mdash; from Impala to Monkeys &mdash; which depend on a stream that runs through the reserve.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n</div>\r\n</article>\r\n<div class=\"ab ca\" style=\"box-sizing: inherit; display: flex; justify-content: center; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<div class=\"ch bg fw fx fy fz\" style=\"box-sizing: inherit; width: 680px; min-width: 0px; margin: 0px 24px; max-width: 680px;\"><br class=\"Apple-interchange-newline\" /><br /></div>\r\n</div>\r\n<p>&nbsp;</p>', '1', 'NTP00120240108075601_659c4541037a6.jpg', 'STF00220231222013400', 1, '2024-01-08 19:56:01', '2024-01-14 19:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `page_views_tab`
--

CREATE TABLE `page_views_tab` (
  `sn` int(11) NOT NULL,
  `page_category` varchar(100) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `page_session` varchar(255) NOT NULL,
  `system` varchar(100) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_views_tab`
--

INSERT INTO `page_views_tab` (`sn`, `page_category`, `page_id`, `page_session`, `system`, `ip_address`, `date`) VALUES
(1, 'BLOG', 'BLOG00120240109103625', 'PS00120240114123742', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-13 23:37:52'),
(2, 'TA', 'TA00120240102011804', 'PS00120240114123742', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-13 23:38:11'),
(3, 'TA', 'TA00220240102103604', 'PS00120240114123742', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-13 23:38:37'),
(4, 'TA', 'TA00220240102103604', 'PS00220240114123912', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-13 23:39:21'),
(5, 'TA', 'TA00320240112010113', '', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 00:08:02'),
(6, 'TA', 'TA00220240102103604', '', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 00:18:06'),
(7, 'TA', 'TA00120240102011804', '', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 00:18:13'),
(8, 'TA', 'TA00420240112010607', '', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 00:40:41'),
(9, 'TA', 'TA00120240102011804', 'PS03320240114063035', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 17:39:31'),
(10, 'CUL', 'CULT00120240108061552', 'PS03420240114070824', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 18:11:51'),
(11, 'CUL', 'CULT00220240108061632', 'PS03420240114070824', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 18:13:00'),
(12, 'ENT', 'ENT00120240105042100', 'PS03520240114073017', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 18:30:40'),
(13, 'EVENT', 'ET00120240103123203', 'PS03520240114073017', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 18:39:47'),
(14, 'EVENT', 'ET00120240103123203', 'PS03620240114074008', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 18:40:10'),
(15, 'SPORT', 'SPT00120240108112303', 'PS03620240114074008', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 18:53:29'),
(16, 'NT', 'NTP00120240108075601', 'PS03720240114080500', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 19:06:10'),
(17, 'TRA', 'TRA00120240108065424', 'PS03720240114080500', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 19:13:06'),
(18, 'TRA', 'TRA00320240108070410', 'PS03720240114080500', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 19:13:13'),
(19, 'TD', 'TD00120240103013624', 'PS03720240114080500', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 19:20:52'),
(20, 'TA', 'TA00120240102011804', 'PS03920240114082621', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-14 21:43:39'),
(21, 'TA', 'TA00220240102103604', 'PS04720240115113610', 'DESKTOP-GFL284C', '192.168.43.85', '2024-01-15 10:36:12'),
(22, 'EVENT', 'ET00120240103123203', 'PS04720240115113610', 'DESKTOP-GFL284C', '192.168.43.85', '2024-01-15 10:41:07'),
(23, 'EVENT', 'ET00120240103123203', '', 'DESKTOP-GFL284C', '192.168.43.85', '2024-01-15 10:47:38'),
(24, 'EVENT', 'ET00220240108054919', '', 'DESKTOP-GFL284C', '192.168.43.85', '2024-01-15 10:48:06'),
(25, 'TD', 'TD00220240108055210', '', 'DESKTOP-GFL284C', '192.168.43.85', '2024-01-15 10:48:44'),
(26, 'TD', 'TD00120240103013624', '', 'DESKTOP-GFL284C', '192.168.43.85', '2024-01-15 10:48:48'),
(27, 'TA', 'TA00220240102103604', 'PS05020240115034956', 'DESKTOP-GFL284C', '192.168.0.129', '2024-01-15 14:53:22'),
(28, 'TA', 'TA00120240102011804', 'PS05220240115040059', 'DESKTOP-GFL284C', '192.168.0.186', '2024-01-15 15:16:36'),
(29, 'TA', 'TA00220240102103604', 'PS05220240115040059', 'DESKTOP-GFL284C', '192.168.0.186', '2024-01-15 15:17:35'),
(30, 'ENT', 'ENT00120240105042100', 'PS05220240115040059', 'DESKTOP-GFL284C', '192.168.0.186', '2024-01-15 15:19:44'),
(31, 'ENT', 'ENT00120240105042100', 'PS05420240115043333', 'DESKTOP-GFL284C', '192.168.0.106', '2024-01-15 15:36:12'),
(32, 'EVENT', 'ET00120240103123203', 'PS05420240115043333', 'DESKTOP-GFL284C', '192.168.0.106', '2024-01-15 15:50:05'),
(33, 'CUL', 'CULT00120240108061552', '', 'DESKTOP-GFL284C', '192.168.0.106', '2024-01-15 15:51:56'),
(34, 'BLOG', 'BLOG00120240109103625', 'PS06220240115074443', 'DESKTOP-GFL284C', '::1', '2024-01-15 18:45:23'),
(35, 'TA', 'TA00220240102103604', 'PS06720240115094356', 'DESKTOP-GFL284C', '192.168.0.129', '2024-01-15 20:44:07'),
(36, 'EVENT', 'ET00120240103123203', 'PS06620240115093050', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-15 22:15:50'),
(37, 'EVENT', 'ET00120240103123203', 'PS06920240115112234', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-15 22:22:37'),
(38, 'TA', 'TA00220240102103604', 'PS06920240115112234', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-15 22:23:53'),
(39, 'TA', 'TA00120240102011804', 'PS06920240115112234', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-15 22:31:36'),
(40, 'CUL', 'CULT00120240108061552', 'PS06920240115112234', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-15 22:35:20'),
(41, 'TA', 'TA00120240102011804', 'PS07020240117013201', 'DESKTOP-GFL284C', '::1', '2024-01-17 14:21:07'),
(42, 'BLOG', 'BLOG00120240109103625', 'PS07120240118094657', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-19 07:23:50'),
(43, 'TA', 'TA00120240102011804', 'PS07320240121111150', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-21 22:24:23'),
(44, 'BLOG', 'BLOG00120240109103625', 'PS07320240121111150', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-21 22:25:42'),
(45, 'TA', 'TA00120240102011804', 'PS08820240124063932', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-24 17:39:59'),
(46, 'TA', 'TA00220240102103604', 'PS08820240124063932', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-24 17:43:03'),
(47, 'EVENT', 'ET00120240103123203', 'PS08820240124063932', 'DESKTOP-GFL284C', '127.0.0.1', '2024-01-24 17:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `setup_backend_settings_tab`
--

CREATE TABLE `setup_backend_settings_tab` (
  `sn` int(11) NOT NULL,
  `backend_setting_id` varchar(10) NOT NULL,
  `smtp_host` varchar(100) NOT NULL,
  `smtp_username` varchar(100) NOT NULL,
  `smtp_password` varchar(100) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `support_email` varchar(100) NOT NULL,
  `payment_key` text NOT NULL,
  `currency_id` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_backend_settings_tab`
--

INSERT INTO `setup_backend_settings_tab` (`sn`, `backend_setting_id`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `sender_name`, `support_email`, `payment_key`, `currency_id`, `date`) VALUES
(1, 'BK_ID001', 'mail.agrohandlers.com', 'info@agrohandlers.com', '1971@@@ademorinola12', 465, 'AgroHandlers', 'afootech2016@gmail.com', 'pk_test_2c6df6d5a7b837ab3b3152750562b1b139155ffd', 'NGN', '2023-11-17 02:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `setup_categories_tab`
--

CREATE TABLE `setup_categories_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(50) NOT NULL,
  `cat_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_categories_tab`
--

INSERT INTO `setup_categories_tab` (`sn`, `cat_id`, `cat_desc`) VALUES
(1, '001', 'TOURISM ATTRACTIONS'),
(2, '002', 'ENTERTAINMENT'),
(3, '003', 'SPORT'),
(4, '004', 'CULTURE'),
(5, '005', 'EVENT'),
(6, '006', 'TRADITION'),
(7, '007', 'TOURIST DESTINATIONS '),
(8, '008', 'NATURAL TOURISM PRODUCTS'),
(9, '009', 'GENERAL');

-- --------------------------------------------------------

--
-- Table structure for table `setup_counter_tab`
--

CREATE TABLE `setup_counter_tab` (
  `sn` int(11) NOT NULL,
  `counter_id` varchar(100) NOT NULL,
  `counter_discription` varchar(225) NOT NULL,
  `counter_value` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_counter_tab`
--

INSERT INTO `setup_counter_tab` (`sn`, `counter_id`, `counter_discription`, `counter_value`) VALUES
(1, 'STF', 'STAFF ID COUNT', 3),
(2, 'FAQ', 'FAQ ID COUNT', 2),
(3, 'BLOG', 'BLOG ID COUNT', 1),
(4, 'ALT', 'OPERATION ALERT', 0),
(5, 'TA', 'TOURISM ATTRACTION COUNT', 4),
(6, 'TD', 'TOURISM DESTINATION COUNT', 2),
(7, 'ET', 'EVENT COUNT', 2),
(15, 'ECAT', 'ENTERTAINMENT CATEGORY COUNT', 0),
(16, 'ENT', 'ENTERTAINMENT COUNT', 0),
(17, 'SPCAT', 'SPORT CATEGORY COUNT', 0),
(18, 'SPT', 'SPORT COUNT', 0),
(19, 'CULCAT', 'CULTURE CATEGORY COUNT', 2),
(20, 'CULT', 'CULTURE COUNT', 2),
(21, 'TRACAT', 'TRADITION CATEGORY COUNT', 2),
(22, 'TRA', 'TRADITION COUNT', 3),
(23, 'NTPCAT', 'NATURALTOURISM PRODUCT CATEGORY', 3),
(24, 'NTP', 'NATURAL TOURISM PRODUCT', 1),
(25, 'VID', 'VIDEO COUNT', 4),
(26, 'PS', 'PAGE SESSION COUNT', 94);

-- --------------------------------------------------------

--
-- Table structure for table `setup_role_tab`
--

CREATE TABLE `setup_role_tab` (
  `sn` int(11) NOT NULL,
  `role_id` varchar(50) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_role_tab`
--

INSERT INTO `setup_role_tab` (`sn`, `role_id`, `role_name`) VALUES
(1, '1', 'STAFF'),
(2, '2', 'ADMIN'),
(3, '3', 'SUPER ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `setup_status_tab`
--

CREATE TABLE `setup_status_tab` (
  `sn` int(10) UNSIGNED NOT NULL,
  `status_id` varchar(100) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_status_tab`
--

INSERT INTO `setup_status_tab` (`sn`, `status_id`, `status_name`) VALUES
(1, '1', 'ACTIVE'),
(2, '2', 'SUSPEND'),
(3, '3', 'PENDING'),
(4, '4', 'INACTIVE'),
(5, '5', 'SUCCESS'),
(6, '6', 'CANCELLED'),
(7, '7', 'FAILED');

-- --------------------------------------------------------

--
-- Table structure for table `sport_cat_tab`
--

CREATE TABLE `sport_cat_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `statistics` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sport_cat_tab`
--

INSERT INTO `sport_cat_tab` (`sn`, `cat_id`, `category_name`, `statistics`, `status_id`, `created_time`, `updated_time`) VALUES
(0, 'SPCAT00120240108112216', 'GOLF', 0, 1, '2024-01-08 11:22:16', '2024-01-08 10:22:16'),
(0, 'SPCAT00120240108022740', 'TENNIS', 0, 1, '2024-01-08 14:27:40', '2024-01-08 13:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `sport_tab`
--

CREATE TABLE `sport_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `page_title` mediumtext NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `page_summary` text NOT NULL,
  `page_detail` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `page_pix` varchar(255) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport_tab`
--

INSERT INTO `sport_tab` (`sn`, `cat_id`, `page_id`, `page_title`, `page_url`, `seo_keywords`, `page_summary`, `page_detail`, `status_id`, `page_pix`, `staff_id`, `views`, `created_time`, `updated_time`) VALUES
(0, 'SPCAT00120240108112216', 'SPT00120240108112303', 'Over 200 golfers set for 2023 Ikeja Golf Club tournament', 'over-200-golfers-set-for-2023-ikeja-golf-club-tournament', 'Over 200 golfers set for 2023 Ikeja Golf Club tournament', 'The Club Captain, Sina Akinyemi, told journalists yesterday at the Ikeja Golf Club that the championship would be special, as it coincides with the 55th anniversary', '<p style=\"max-width: 1280px; box-sizing: border-box; line-height: 1.75; margin-top: 0px; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Over 200 golfers are expected to challenge for glory at the 2023 Ikeja Golf Club Championship.The Club Captain, Sina Akinyemi, told journalists yesterday at the Ikeja Golf Club that the championship would be special, as it coincides with the 55th anniversary of the club.</p>\r\n<div class=\"ad-align-none\" style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<div class=\"gcol\" style=\"max-width: 1280px; box-sizing: border-box;\">\r\n<div class=\"widget widget_guardian_ad_widget\" style=\"max-width: 1280px; box-sizing: border-box;\">\r\n<div class=\"ad-section\" style=\"max-width: 1280px; box-sizing: border-box; min-width: 300px; margin: 15px auto; display: flex; justify-content: center;\">\r\n<div id=\"gdn-dfp-2\" class=\"dfp-ad ad-container\" style=\"max-width: 1280px; box-sizing: border-box; position: relative; text-align: center;\" data-google-query-id=\"CLaSos3GzYMDFSmaJwIdC7QFfg\">\r\n<div id=\"google_ads_iframe_/79805449/TGN_Desktop_0__container__\" style=\"max-width: 1280px; box-sizing: border-box; border: 0pt none;\">\r\n<div id=\"w2g-slot2\" class=\"w2g w2g-slot2-loaded\" style=\"max-width: 1280px; box-sizing: border-box;\">\r\n<div id=\"/26225854,79805449/Dotaudience/guardian.ng/300x250\" style=\"max-width: 1280px; box-sizing: border-box;\" data-google-query-id=\"CImm4d_OzYMDFeaxJwIdpB4CFA\">\r\n<div id=\"google_ads_iframe_/26225854,79805449/Dotaudience/guardian.ng/300x250_0__container__\" style=\"max-width: 1280px; box-sizing: border-box; border: 0pt none;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&ldquo;The Ikeja Golf Club is at the heart of the city of Lagos. We are set to host our yearly pinnacle event, the Golf Club Championship, between November 20 and November 26. This edition is special because Ikeja Golf Club is 55 years old,&rdquo; he stated.</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Also speaking, the Club&rsquo;s Competitions Secretary, Jenkins Alumona, stated that the Ikeja Golf Championship is expected to host over 200 golfers from Ikeja Golf Club and other prestigious golf clubs in the country.</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Outlining activities for the week-long event, he disclosed that staff and caddies will raise the curtain on the championship on November 20. This will be followed by veterans and professional golfers on November 21.</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Women golfers will compete on November 22, after which a special kitty and auction night will hold on November 23. The main championship will commence on November 24 with guest players on Handicap 19 and above.</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">The men&rsquo;s competition for golfers on Handicap 1 and 18 will hold on November 25, with golfers with the best scores proceeding to challenge at the grand finale holding on November 26.</span></p>\r\n<div class=\"ad-align-none\" style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<div class=\"gcol\" style=\"max-width: 1280px; box-sizing: border-box;\">\r\n<div class=\"widget widget_guardian_ad_widget\" style=\"max-width: 1280px; box-sizing: border-box;\">\r\n<div class=\"ad-section\" style=\"max-width: 1280px; box-sizing: border-box; min-width: 300px; margin: 15px auto; display: flex; justify-content: center;\">\r\n<div id=\"gdn-dfp-3\" class=\"dfp-ad ad-container\" style=\"max-width: 1280px; box-sizing: border-box; position: relative; text-align: center;\" data-google-query-id=\"CLeSos3GzYMDFSmaJwIdC7QFfg\">\r\n<div id=\"google_ads_iframe_/79805449/TGN_Desktop_1__container__\" style=\"max-width: 1280px; box-sizing: border-box; border: 0pt none;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;</span><br style=\"max-width: 1280px; box-sizing: border-box; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Akinyemi also announced that this year&rsquo;s championship will witness the phased commissioning of the Integrated Golf Range Project, a legacy project started by the incumbent committee.</span></p>\r\n<p style=\"max-width: 1280px; box-sizing: border-box; line-height: 1.75; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;</p>\r\n<p style=\"max-width: 1280px; box-sizing: border-box; line-height: 1.75; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">He explained that the Integrated Golf Range Project is a state-of-the-art facility that will improve golfing experience for members of the Ikeja Golf Club.</p>\r\n<p style=\"max-width: 1280px; box-sizing: border-box; line-height: 1.75; color: #000000; font-family: Merriweather, serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">&ldquo;This project is set to place Ikeja Golf Club on the map of the golf world,&rdquo; he added. On his part, Alumona added that the Integrated Golf Range Project will improve competition among golfers.<br style=\"max-width: 1280px; box-sizing: border-box;\" />&nbsp;<br style=\"max-width: 1280px; box-sizing: border-box;\" />&ldquo;This edition will be the last easy edition for the winner because next year, the short range will be opened and golfers can practice before they play and this reduces the advantage of the highly skilled golfers,&rdquo; he noted.<br style=\"max-width: 1280px; box-sizing: border-box;\" />&nbsp;<br style=\"max-width: 1280px; box-sizing: border-box;\" />The Integrated Golf Range Project will include Long and Short Game Areas, Practice Range, Virtual Golf Simulation Zone, Lounge, 60-vehicle capacity car park with roof netting among other facilities.<br style=\"max-width: 1280px; box-sizing: border-box;\" />&nbsp;<br style=\"max-width: 1280px; box-sizing: border-box;\" />The competition is supported by ADL Solutions, Express payment, Prime metro, and Golf view hotels. Other committee members in attendance at the press conference were Babatunde Ojo and Seun Aderibigbe, vice-captain and treasurer respectively.</p>\r\n<p>&nbsp;</p>', '1', 'SPT00120240108112303_659bde9498351.webp', 'STF00220231222013400', 1, '2024-01-08 11:23:03', '2024-01-14 18:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tab`
--

CREATE TABLE `staff_tab` (
  `sn` int(11) NOT NULL,
  `access_key` varchar(255) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(225) NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tab`
--

INSERT INTO `staff_tab` (`sn`, `access_key`, `hash_id`, `staff_id`, `fullname`, `mobile`, `email`, `address`, `status_id`, `role_id`, `password`, `otp`, `passport`, `last_login`, `created_time`, `updated_time`) VALUES
(1, '959f73faa77b04d601142f4a1be90430', '1282e7f70de3510cf88bfe6c5fe922c7', 'STF0000', 'AFOLABI ABAYOMI', '09151404598', 'afolabitaiwoabayomi112@gmail.com', '12, KOTCO ROAD, ODE REMO, OGUN STATE', '1', 3, 'a8a57c904bdad4ea533613416fed8a18', 958437, 'friends.png', '2024-01-07 06:12:07', '0000-00-00 00:00:00', '2024-01-07 06:12:07'),
(4, '693387dc07e71083abbd87cb60b2d8b8', '', 'STF00120231222013128', 'MIKE AFOLABI', '09055066744', 'afoootechglobal@gmail.com', '12, KOTCO ROAD, ODE REMO', '1', 2, 'a8a57c904bdad4ea533613416fed8a18', 0, '', '2024-01-02 09:24:57', '2023-12-22 13:31:28', '2024-01-02 09:24:57'),
(5, '32c1ddc2edd78e28cfaabfc88dedb6e3', '', 'STF00220231222013400', 'EMMANUEL PAUL', '0905506744', 'seunemmanuel107@gmail.com', '12, KOTCO ROAD, ODE REMO, OGUN STATE', '1', 3, 'c50f061085d695dde5773039032267f6', 0, '', '2024-01-28 15:52:14', '2023-12-22 13:34:00', '2024-01-28 15:52:14'),
(6, '', '', 'STF00320231222084938', 'SEUN AFOLABI', '09055066744', 'seun@gmail.com', '12, KOTCO ROAD, ODE REMO, OGUN STATE', '1', 2, 'e923329e32387198127d14642270b286', 0, '', '2023-12-22 19:27:52', '2023-12-22 20:49:38', '2023-12-22 19:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_attraction_tab`
--

CREATE TABLE `tourism_attraction_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `page_id` varchar(50) NOT NULL,
  `page_title` mediumtext NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `page_summary` text NOT NULL,
  `page_detail` longtext NOT NULL,
  `seo_pix` varchar(255) NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `page_pix` varchar(255) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourism_attraction_tab`
--

INSERT INTO `tourism_attraction_tab` (`sn`, `cat_id`, `page_id`, `page_title`, `page_url`, `seo_keywords`, `page_summary`, `page_detail`, `seo_pix`, `status_id`, `page_pix`, `staff_id`, `views`, `created_time`, `updated_time`) VALUES
(1, '', 'TA00120240102011804', 'Olumo Rock Tourist Complex, Ikija, Abeokuta, Ogun State', 'olumo-rock-tourist-complex-ikija-abeokuta-ogun-state', 'Olumo Rock Tourist Complex, Ikija, Abeokuta, Ogun State', 'Welcome to Olumo Rock, your gateway to unforgettable tour experiences. We are passionate about curating tourism that go beyond the ordinary', '<h2>Olumo Rock Tourist Complex, Ikija, Abeokuta, Ogun State</h2>\r\n<p>Olumo Rock is located in the city of Abeokuta, Ogun State, Nigeria. Historically, the rock was a natural fortress for the Egbas during inter-tribal warfare in the 19th century. It provided protection to the Egba people when they needed it, and is now held in high esteem by the members of the clan. The mountain, one of the most popular tourist destinations in Nigeria, sits in the heart of Abeokuta &ndash; a name which means &ldquo;Under the rock&rdquo; in the Yoruba language. The rock has a height of 137 meters above sea level. Abeokuta was originally inhabited by the Egbas, who the rock provided with sanctuary and gave a vantage point to monitor the enemy&rsquo;s advance, leading to eventual triumph in war. The town of Abeokuta eventually grew as these new settlers spread out from this location.</p>\r\n<p>Olumo Rock was discovered in the Nineteenth-century by a hunter who sorts refuge in the Rock during an intertribal conflict. At the time, the Oyo Empire was disintegrating, and this hunter, a leader of the Egba refugees, was on the run and found refuge beneath the Rock</p>\r\n<p>Olumo Rock is located in Abeokuta, Ogun state. Its name is coined from combining two words, &ldquo;Olu&rdquo;, which means deity, and &ldquo;Mo&rdquo;, which means moulded. The Egba clan believed that the Rock provided protection and defence for them during the conflict; this is why the Olumo Rock is highly esteemed by this clan, as it gave them a clear view of their approaching enemies during war and helped the Egba people gain victory. On the 3rd of February, 1976, Olumo Rock was commissioned as a tourist centre by former Nigeria President Olusegun Obasanjo. Over the years, many facilities have been implemented to make the Olumo Rock tourism experience exciting. The Olumo Rock is as high as 137 metres. Even though not so high compared to the Zuma Rock in Abuja, an elevator has been mounted for those who want to skip the fun part of climbing the stairs.</p>\r\n<h3>What you&rsquo;d find at the Olumo Rock Tourist Centre</h3>\r\n<p>Over the years, many facilities have been implemented to make the Olumo Rock tourism experience exciting. The Olumo Rock is as high as 137 metres. Even though not so high compared to the Zuma Rock in Abuja, an elevator has been mounted for those who want to skip the fun part of climbing the stairs.</p>\r\n<h3>1. Caves and Tunnels:</h3>\r\n<p><img src=\"../../../../1stculturetour.com/all-images/body-pix/olumo6.jpg\" alt=\"\" width=\"100%\" height=\"400\" /></p>\r\n<p>At the Olumo Rock tourist centre, there are caves and tunnels that you might want to explore right at the base of the Rock. One of the caves is called &ldquo;Iya Orisa&rdquo;, which means Mother of the Gods. The people believe that this deity dwells in that cave.</p>\r\n<h3>2. Shrine:</h3>\r\n<p><img src=\"../../../../1stculturetour.com/all-images/body-pix/olumo4.jpg\" alt=\"\" width=\"100%\" height=\"400\" /></p>\r\n<p>The indigenes of Egba built a shrine where they worship the deity and make sacrifices to it. Some shrines are specific for healing practices, while others are for more diabolic and spiritual exercises like sacrificing to the deity and paying due homage. While you are on tourism, it would be wise to stay away from the shrine as acting in ignorance could bring inevitable consequences that you may not be able to bear.</p>\r\n<h3>3. Museum:</h3>\r\n<p>The Museum is one place you should not miss out on while exploring. The Olumo Rock Museum has a record of all the old things that happened around and in Olumo Rock and Abeokuta in general. You will find an exhibition of crafted images, photographs, and everything on the history and culture of Abeokuta.</p>\r\n<h3>4.Cable Car:</h3>\r\n<p>If you want a stress-free tour, you prefer to sit and watch; a cable car is available to drive you from the base of the Rock to its top. All you need to do is, sit pretty and enjoy the view.</p>\r\n<h3>5. Garden:</h3>\r\n<p>Remember that proposal you&rsquo;ve been planning? The garden would be an excellent place to make it. With beautiful and colourful flowers, which could make it almost impossible for your proposal to go wrong.</p>\r\n<h3>6. Picnic spot:</h3>\r\n<p>If you decide to have homemade meals while you connect with your family, friends, or team members, the Picnic spot is a good space, with excellent views around to make your hangout private in a public place.</p>\r\n<h3>7. Restaurants:</h3>\r\n<p>You probably are like me, who does not like to travel with so much luggage. That&rsquo;s Ok. You do not need to worry about your feeding because, at Olumo Rock tourist centre, various restaurants have various meals to suit your cravings.</p>\r\n<h3>8. Convenience Rooms:</h3>\r\n<p>There are convenience rooms around the tourist centre. If you need to make yourself convenient, you don&rsquo;t need to worry about finding toilets and bathrooms.</p>\r\n<h3>9. Hotels:</h3>\r\n<p>You probably intend to experience every beauty that Olumo Rock offers, and you might be unable to cover all these in a day. There are affordable hotels where you can lodge for as long as you intend.</p>\r\n<p>10. Theatre:</p>\r\n<p>Last but not the least on this list. It has an outdoor theatre where cultural activities, music concerts, and performances are held.</p>\r\n<h3>Conclusion</h3>\r\n<p>You have gone through this ride with us, and I&rsquo;m sure you had your seat belt on the entire time. One beautiful thing about a visit to Olumo Rock is that it gives you a &ldquo;want to be back again&rdquo; experience at a very affordable price.</p>\r\n<p>&nbsp;</p>', '', '1', 'TA00120240102011804_6593fefcd3dc6.jpg', 'STF00220231222013400', 9, '2024-01-02 13:18:04', '2024-01-24 17:40:00'),
(2, '', 'TA00220240102103604', 'Lekki Conservation Center, Lekki, Lagos State', 'lekki-conservation-center-lekki-lagos-state', 'Lekki Conservation Center, Lekki, Lagos State', 'Lekki conservation centre (LCC) is one of the numerous nature conservation projects to help protect the flora and fauna of the Nigerian ecosystem. ', '<p>Lekki conservation centre (LCC) is one of the numerous nature conservation projects to help protect the flora and fauna of the Nigerian ecosystem. Built-in 1990 by Chevron Corporation and currently being run and managed by the Nigerian Conservation Foundation (NCF), the centre covers an estimated 78 hectares of land. The reserve has a scintillating view of lush greenery, wetlands and boulevard of palm trees offering a picturesque sight. The tranquil environment is really therapeutic, a good place to relax from the hustle and bustle of Lagos.</p>\r\n<h3>History of Lekki Conservation Centre</h3>\r\n<p>Lekki conservation centre was established in 1990 as an initiative to create a natural habitat for plants and animals to help protect biodiversity and promote environmental conservation in Nigeria.</p>\r\n<h3>What is the Best Time To Visit the Lekki Conservation Centre?</h3>\r\n<p>The best time to visit is during the dry season especially if you want to engage in any recreational activity. The centre gets muddy during the raining season and the canopy walk gets slippery when it rains hence canopy walks are not allowed during rainy days. Thus, the period between November and March is the best time to visit this relaxation centre, as the dry season falls within this period. In the event that you visit the Lekki Conservation Centre during the rainy season, be prepared to get your feet wet because of the mini moody walkways. As such, it would be ideal and safer if you wear comfortable footwear like sandals or trainers, not slippers or heels, especially if you want to get on the canopy.</p>\r\n<h3>How to Get to Lekki Conservation Centre</h3>\r\n<h3>The LLC contacts and address</h3>\r\n<p>Address: Km 19 Lekki - Epe Expressway, Lekki Peninsula II, Lekki</p>\r\n<p>Email: lcc@ncfnigeria.org</p>\r\n<p>Phone: 0812 755 6291, 0909 546 0479</p>\r\n<p>Hours: 8:30am ? 5pm</p>\r\n<h3>Transportation guide</h3>\r\n<p>By Air: In the event that you?re coming by air, board an aeroplane from anywhere in Nigeria to the Murtala Muhammed Airport, Lagos. From the terminal, board a taxi straight to the Lekki Conservation Centre.</p>\r\n<p>By Land (Public/private transport): From anywhere you are in Lagos, you can board a taxi to this relaxation centre. Alternatively, if you want to go there by intra-city bus, board a bus to either Obalende or CMS Park. From any of these locations, board a bus heading to Lekki/Ajah, stop at Chevron Bus stop and walk to the centre.</p>\r\n<h3>Things to do at Lekki Conservation Centre</h3>\r\n<p>The Lekki Conservation centre has a lot of interesting places you can visit and things you can do, some of which include; Tree House, Nature Station, Bird Hide, Swamp Lookout Station, Rotunda, 96-Seater Gazebos, Koi &amp; Tilapia ponds, Beach Volleyball courts &amp; Spectators? pavilion, Barbecue joints, and gym facilities.</p>\r\n<h3>1. Take a Walk on the Canopy Walkway</h3>\r\n<p><img src=\"../../../../1stculturetour.com/all-images/body-pix/lekki2.jpg\" alt=\"\" width=\"100%\" height=\"400\" /></p>\r\n<p>Known as the longest canopy walk in Africa, the 401-metre long canopy walk is suspended at a height of 22.5 feet above the ground. If you are scared of heights, this is certainly a good way to face your fears and conquer them. The Canopy walk offers a panoramic view of the whole nature reserve. As you take your walk of fame, you are greeted with a mesmerizing view of the various animals in the reserve. The most common amongst them are monkeys and birds.</p>\r\n<p>The general advice was given to all taking the canopy walk; avoid looking down if you still want to keep your composure. There?s only one entry into and exit out of the long bridge so if you are taking the walk, ensure you have the guts to see it through to the end. Only individuals within the age of 14-65 are allowed on the canopy walk.</p>\r\n<p>With a token fee of 1000 Naira, you will be afforded the opportunity of taking this canopy walk, albeit taking the canopy walkway is not allowed when it?s raining.</p>\r\n<p>&nbsp;</p>', '', '1', 'TA00220240102103604_659481c4bbd51.jpg', 'STF00220231222013400', 9, '2024-01-02 22:36:04', '2024-01-24 17:43:03'),
(3, '', 'TA00320240112010113', 'Ibudo Asa, Ipara Remo, Ogun State', '', '', '', '', '', '1', 'TA00320240112010113_65a08149bff0d.webp', 'STF00220231222013400', 1, '2024-01-12 01:01:13', '2024-01-14 00:08:02'),
(4, '', 'TA00420240112010607', 'Ahum Waterfall', '', '', '', '', '', '1', 'TA00420240112010607_65a0826f71178.jpg', 'STF00220231222013400', 1, '2024-01-12 01:06:07', '2024-01-15 09:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_destination_tab`
--

CREATE TABLE `tourism_destination_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `page_id` varchar(50) NOT NULL,
  `page_title` mediumtext NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `page_summary` text NOT NULL,
  `page_detail` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `page_pix` varchar(255) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourism_destination_tab`
--

INSERT INTO `tourism_destination_tab` (`sn`, `cat_id`, `page_id`, `page_title`, `page_url`, `seo_keywords`, `page_summary`, `page_detail`, `status_id`, `page_pix`, `staff_id`, `views`, `created_time`, `updated_time`) VALUES
(1, '', 'TD00120240103013624', 'Egypt (Cairo)', 'egypt-cairo', 'egypt-cairo', 'Egypt, country located in the northeastern corner of Africa. Egypt\'s heartland, the Nile River valley and delta, was the home of one of the principal civilizations', '<h2><strong style=\"box-sizing: border-box; font-weight: var(--font-weight-bold);\">Egypt (Cairo)</strong></h2>\r\n<p class=\"topic-paragraph\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: var(--paragraph-margin-bottom); font-size: 1.125rem; line-height: 1.6; overflow-wrap: break-word; font-family: Georgia, serif; color: #1a1a1a; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Egypt, country located in the northeastern corner of Africa. Egypt&rsquo;s heartland, the Nile River valley and delta, was the home of one of the principal civilizations of the ancient Middle East and, like Mesopotamia farther east, was the site of one of the world&rsquo;s earliest urban and literate societies. Pharaonic Egypt thrived for some 3,000 years through a series of native dynasties that were interspersed with brief periods of foreign rule. After Alexander the Great conquered the region in 323 BCE, urban Egypt became an integral part of the Hellenistic world. Under the Greek Ptolemaic dynasty, an advanced literate society thrived in the city of Alexandria, but what is now Egypt was conquered by the Romans in 30 BCE. It remained part of the Roman Republic and Empire and then part of Rome&rsquo;s successor state, the Byzantine Empire, until its conquest by Arab Muslim armies in 639&ndash;642 CE.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"assemblies\" style=\"box-sizing: border-box; --floated-module-margin: 0 0 20px 20px; --floated-module-width: 300px; display: flex; min-width: 280px; clear: right; float: right; margin: var(--floated-module-margin); max-width: var(--floated-module-width); color: #1a1a1a; font-family: -apple-system, BlinkMacSystemFont, \'Helvetica Neue\', \'Segoe UI\', Roboto, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<div class=\"w-100\" style=\"box-sizing: border-box; width: 300px;\">\r\n<figure class=\"md-assembly card print-false\" style=\"box-sizing: border-box; --card-background-color: var(--white); --card-border-width: var(--border-width); --card-border-color: var(--border-color); --card-border-radius: var(--border-radius); --card-box-shadow: var(--box-shadow); --card-font-size: var(--font-size-base); --card-line-height: var(--line-height-sm); --card-padding-x: 20px; --card-padding-y: 20px; --card-media-horizontal-min-width: 100px; background-color: #ffffff; border: var(--card-border-width) solid var(--card-border-color); border-radius: var(--card-border-radius); box-shadow: var(--card-box-shadow); font-size: var(--card-font-size); line-height: var(--card-line-height); margin: 0px 0px 1rem;\" data-assembly-id=\"208617\" data-asm-type=\"image\">\r\n<div class=\"md-assembly-wrapper card-media\" style=\"box-sizing: border-box; overflow: hidden; border-top-left-radius: inherit; border-top-right-radius: inherit;\" data-type=\"image\"><a class=\"position-relative d-flex align-items-center justify-content-center media-overlay-link card-media\" style=\"box-sizing: border-box; color: var(--link-color); text-decoration: var(--link-decoration); overflow: hidden; display: flex; position: relative; align-items: center; justify-content: center; border-radius: inherit; cursor: pointer; min-height: 160px;\" href=\"https://cdn.britannica.com/33/183633-050-7CC58F2A/World-Data-Locator-Map-Egypt.jpg\" data-href=\"/media/1/180382/208617\"><img style=\"box-sizing: border-box; max-width: 100%; vertical-align: middle; max-height: 100%; width: 298px; display: block; height: auto;\" src=\"https://cdn.britannica.com/33/183633-050-7CC58F2A/World-Data-Locator-Map-Egypt.jpg\" alt=\"Egypt\" data-width=\"1600\" data-height=\"1533\" /><button class=\"magnifying-glass btn btn-circle position-absolute shadow btn-white\" style=\"box-sizing: border-box; margin: 0px; font-family: var(--btn-font-family); font-size: var(--btn-font-size); line-height: var(--btn-line-height); overflow: visible; text-transform: none; appearance: button; --btn-active-bg: #cccccc; --btn-active-border-color: #8c8c8c; --btn-active-color: #1a1a1a; --btn-bg: #fff; --btn-border-color: #bfbfbf; --btn-border-radius-xs: 0.5rem; --btn-border-radius: 0.5rem; --btn-border-radius-sm: 0.5rem; --btn-border-radius-lg: 0.5rem; --btn-border-radius-xl: 0.5rem; --btn-border-width: var(--border-width); --btn-color: #1a1a1a; --btn-disabled-opacity: 0.65; --btn-hover-bg: #dfdfdf; --btn-hover-border-color: #9f9f9f; --btn-hover-color: #1a1a1a; --btn-hover-text-decoration: none; --btn-font-size-xs: 0.75rem; --btn-font-size: 1rem; --btn-font-size-sm: 0.875rem; --btn-font-size-lg: 1.125rem; --btn-font-size-xl: 1.25rem; --btn-font-weight: 600; --btn-line-height: 1.4; --btn-padding-x-xs: 1.25em; --btn-padding-x: 1.25em; --btn-padding-x-sm: 1.25em; --btn-padding-x-lg: 1.25em; --btn-padding-x-xl: 1.25em; --btn-padding-y-xs: 0.75em; --btn-padding-y: 0.75em; --btn-padding-y-sm: 0.75em; --btn-padding-y-lg: 0.75em; --btn-padding-y-xl: 0.75em; align-items: center; background-color: var(--btn-bg); border: var(--btn-border-width) solid var(--btn-border-color); border-radius: 50%; color: var(--btn-color); cursor: pointer; display: inline-flex; font-weight: var(--btn-font-weight); justify-content: center; padding: 0px; text-decoration: var(--btn-text-decoration); user-select: none; vertical-align: middle; white-space: var(--btn-white-space); --btn-circle-radius: 2em; height: var(--btn-circle-radius); width: var(--btn-circle-radius); position: absolute; box-shadow: var(--box-shadow);\" aria-label=\"Zoom in\"></button></a></div>\r\n<figcaption class=\"card-body\" style=\"box-sizing: border-box; font-size: var(--card-font-size); padding: var(--card-padding-y) var(--card-padding-x) var(--card-padding-y) var(--card-padding-x);\"><a class=\"md-assembly-title font-weight-bold mb-5 d-inline-block font-16 font-sans-serif media-overlay-link\" style=\"box-sizing: border-box; color: var(--link-color); text-decoration: var(--link-decoration); display: inline-block; font-family: var(--font-family-sans-serif); font-size: 16px; font-weight: var(--font-weight-bold); margin-bottom: 5px; cursor: pointer;\" href=\"https://cdn.britannica.com/33/183633-050-7CC58F2A/World-Data-Locator-Map-Egypt.jpg\" data-href=\"/media/1/180382/208617\">Egypt</a></figcaption>\r\n</figure>\r\n</div>\r\n</div>\r\n<p class=\"topic-paragraph\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: var(--paragraph-margin-bottom); font-size: 1.125rem; line-height: 1.6; overflow-wrap: break-word; font-family: Georgia, serif; color: #1a1a1a; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Until the Muslim conquest, great continuity had typified Egyptian rural life. Despite the incongruent ethnicity of successive ruling groups and the cosmopolitan nature of Egypt&rsquo;s larger urban centres, the language and culture of the rural, agrarian masses&mdash;whose lives were largely measured by the annual rise and fall of the Nile River, with its annual inundation&mdash;had changed only marginally throughout the centuries. Following the conquests, both urban and rural culture began to adopt elements of Arab culture, and an Arabic vernacular eventually replaced the Egyptian language as the common means of spoken discourse. Moreover, since that time, Egypt&rsquo;s history has been part of the broader Islamic world, and though Egyptians continued to be ruled by foreign elite&mdash;whether Arab, Kurdish, Circassian, or Turkish&mdash;the country&rsquo;s cultural milieu remained predominantly Arab.</p>\r\n<p><br />Egypt eventually became one of the intellectual and cultural centres of the Arab and Islamic world, a status that was fortified in the mid-13th century when Mongol armies sacked Baghdad and ended the Abbasid caliphate. The Mamluk sultans of Egypt, under whom the country thrived for several centuries, established a pseudo-caliphate of dubious legitimacy. But in 1517 the Ottoman Empire defeated the Mamluks and established control over Egypt that lasted until 1798, when Napoleon I led a French army in a short occupation of the country.</p>\r\n<p><strong><img src=\"https://unitedguidestravel.com/wp-content/uploads/2023/04/a-camel-at-the-great-pyramids-of-giza-800x450.jpg.webp\" alt=\"\" width=\"100%\" height=\"400\" /></strong></p>\r\n<p>The French occupation, which ended in 1801, marked the first time a European power had conquered and occupied Egypt, and it set the stage for further European involvement. Egypt&rsquo;s strategic location has always made it a hub for trade routes between Africa, Europe, and Asia, but this natural advantage was enhanced in 1869 by the opening of the Suez Canal, connecting the Mediterranean Sea to the Red Sea. The concern of the European powers (namely France and the United Kingdom, which were major shareholders in the canal) to safeguard the canal for strategic and commercial reasons became one of the most important factors influencing the subsequent history of Egypt. The United Kingdom occupied Egypt in 1882 and continued to exert a strong influence on the country until after World War II (1939&ndash;45).<br /><br /><br /><br /></p>', '1', 'TD00120240103013624_659554c81203a.jpg', 'STF00220231222013400', 2, '2024-01-03 13:36:24', '2024-01-15 10:48:48'),
(2, '', 'TD00220240108055210', 'South Africa (Cape Town)', '', '', '', '', '1', 'TD00220240108055210_659c283a99841.jpg', 'STF00220231222013400', 1, '2024-01-08 17:52:10', '2024-01-15 10:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_products_pix_tab`
--

CREATE TABLE `tourism_products_pix_tab` (
  `sn` int(11) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `tourism_product_pix` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourism_products_pix_tab`
--

INSERT INTO `tourism_products_pix_tab` (`sn`, `page_id`, `tourism_product_pix`) VALUES
(1, 'TA00120240102011804', 'TA00120240102011804-0-65941d286614f.jpg,TA00120240102011804-1-65941d2869823.jpg,TA00120240102011804-2-65941d286bd4a.jpg,TA00120240102011804-3-65941d286dcc5.jpg,TA00120240102011804-4-65941d286fe51.jpg,TA00120240102011804-5-65941d2872183.jpg,TA00120240102011804-6-65941d2876789.jpg,TA00120240102011804-7-65941d2878890.jpg'),
(2, 'TA00220240102103604', 'TA00220240102103604-0-659482c0dd7ed.jpg,TA00220240102103604-1-659482c0ddf88.jpg,TA00220240102103604-2-659482c0de7b7.jpg,TA00220240102103604-3-659482c0deff2.jpg,TA00220240102103604-5-659482c0e009f.jpg'),
(3, 'ET00120240103123203', 'ET00120240103123203-0-6594a00ab647f.jpg,ET00120240103123203-1-6594a00abe33a.jpg,ET00120240103123203-2-6594a00ac0184.jpg,ET00120240103123203-3-6594a00ac2676.jpg,ET00120240103123203-4-6594a00ac46c2.jpg,ET00120240103123203-5-6594a00ac63e3.jpg,ET00120240103123203-6-6594a00ac8213.jpg,ET00120240103123203-7-6594a00aca1bc.jpg,ET00120240103123203-8-6594a00acc183.jpg,ET00120240103123203-9-6594a00acdf5a.jpg,ET00120240103123203-11-6594a00ad1d6c.jpg,ET00120240103123203-12-6594a00ad3da4.jpg,ET00120240103123203-13-6594a00ad5cc4.jpg,ET00120240103123203-0-65a146a49eeec0.25276734.jpg'),
(4, 'TD00120240103013624', 'TD00120240103013624-0-659558f2a32d6.jpg,TD00120240103013624-1-659558f2a732d.jpg,TD00120240103013624-2-659558f2a8715.jpg,TD00120240103013624-3-659558f2a9eb9.jpg,TD00120240103013624-4-659558f2ab2a0.jpg'),
(7, 'ENT00120240105042100', 'ENT00120240105042100-0-659999420c779.jpg,ENT00120240105042100-0-6599994dc54c82.41188242.jpg,ENT00120240105042100-1-6599994dc6fea4.33996245.jpg,ENT00120240105042100-2-6599994dd4cc22.48160450.jpg'),
(8, 'SPT00120240108112303', 'SPT00120240108112303-0-659bd6101f7d9.jpg,SPT00120240108112303-1-659bd61027329.jpg,SPT00120240108112303-0-659bdf65e5d4c8.72512012.webp'),
(10, 'CULT00120240108125357', 'CULT00120240108125357-0-659bed834e14b.jpg,CULT00120240108125357-1-659bed834ed48.jpg,CULT00120240108125357-2-659bed834f8ae.jpg'),
(11, 'CULT00120240108014836', 'CULT00120240108014836-0-659bf2168b5c7.jpg,CULT00120240108014836-1-659bf2168d2e7.jpg,CULT00120240108014836-2-659bf2168e77d.jpg,CULT00120240108014836-3-659bf2168f7d3.jpg'),
(12, 'CULT00120240108061552', 'CULT00120240108061552-0-659c2e8d70c72.jpg,CULT00120240108061552-1-659c2e8d72e04.jpg,CULT00120240108061552-2-659c2e8d73db8.jpg'),
(13, 'CULT00220240108061632', 'CULT00220240108061632-0-659c2ea9cd171.jpg,CULT00220240108061632-1-659c2ea9cebe9.jpg,CULT00220240108061632-2-659c2ea9cff32.jpg,CULT00220240108061632-3-659c2ea9d1998.jpg'),
(14, 'TRA00220240108070305', 'TRA00220240108070305-0-659c3cbd6b4f3.jpg,TRA00220240108070305-1-659c3cbd71cf4.jpg,TRA00220240108070305-2-659c3cbd72597.webp'),
(15, 'TRA00320240108070410', 'TRA00320240108070410-0-659c3ffd08b61.webp,TRA00320240108070410-1-659c3ffd094e4.jpg,TRA00320240108070410-2-659c3ffd09cb4.jpeg'),
(16, 'TRA00120240108065424', 'TRA00120240108065424-0-659c4569347b75.89884931.jpg'),
(17, 'NTP00120240108075601', 'NTP00120240108075601-0-659cf42defd5c.jpg,NTP00120240108075601-1-659cf42e0a140.jpg,NTP00120240108075601-2-659cf42e0b9b8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_products_tab`
--

CREATE TABLE `tourism_products_tab` (
  `sn` int(11) NOT NULL,
  `tourism_products_id` varchar(255) NOT NULL,
  `tourism_products_name` varchar(255) NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `tourism_products_summary` text NOT NULL,
  `tourism_products_url` varchar(255) NOT NULL,
  `tourism_products_pix` varchar(100) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourism_products_tab`
--

INSERT INTO `tourism_products_tab` (`sn`, `tourism_products_id`, `tourism_products_name`, `status_id`, `tourism_products_summary`, `tourism_products_url`, `tourism_products_pix`, `staff_id`, `created_time`, `updated_time`) VALUES
(1, 'TP0001', 'Tourist Attraction', '1', 'A tourist attraction is a place of interest where tourists visit, typically for its inherent or exhibited cultural value, historical significance, natural or built beauty', 'tourist-attractions', 'tourist-attraction.jpg', '', '2023-12-25 06:34:00', '2024-01-04 16:40:34'),
(2, 'TP0002', 'Entertainments', '1', 'Entertainment has been a part of human culture since the beginning of civilization. It has been used to pass down stories, educate, and even to bring people', 'entertainment', 'entertainment.jpeg', '', '2023-12-25 06:34:00', '2024-01-04 16:42:22'),
(3, 'TP0003', 'Sport', '1', 'Sports tourism refers to travel which involves either observing or participating in a sporting event while staying apart from the tourists\' usual environment', 'sport', 'sport.jpeg', '', '2023-12-25 06:34:00', '2024-01-04 16:42:32'),
(4, 'TP0004', 'Culture', '1', 'Culture is a system of learned and shared beliefs, language, norms, values, and symbols that groups use to identify themselves and provide a framework', 'culture', 'culture.jpg', '', '2023-12-25 06:34:00', '2024-01-04 16:40:55'),
(5, 'TP0005', 'Tradition', '1', 'Tradition reinforces values such as freedom, faith, integrity, a good education, personal responsibility, a strong work ethic, and the value of being selfless', 'tradition', 'tradition.webp', '', '2023-12-25 06:34:00', '2024-01-04 16:41:06'),
(6, 'TP0006', 'Natural Tourism Products', '1', 'Natural tourism – responsible travel to natural areas, which conserves the environment and improves the welfare of local people....', 'natural-tourism-products', 'natural-tourism-products.jpg', '', '2023-12-25 06:34:00', '2024-01-04 16:41:43'),
(7, 'TP0007', 'Tourist Destination', '1', 'A tourist destination is a city, town, or other area that is significantly dependent on revenues from tourism, or \"a country, state, region, city, or town which is marketed...', 'tourist-destination', 'tourist-destination.webp', '', '2023-12-25 06:34:00', '2024-01-04 16:42:00'),
(8, 'TP0008', 'Events', '1', 'Events is the act of organising and promoting an event in a town, region, or country in the hope to attract domestic and/or international tourists', 'event', 'event.jpg', '', '2023-12-25 06:34:00', '2024-01-04 16:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_product_video_tab`
--

CREATE TABLE `tourism_product_video_tab` (
  `sn` int(11) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `video_id` varchar(100) NOT NULL,
  `video_title` text NOT NULL,
  `video_url` text NOT NULL,
  `status_id` varchar(10) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourism_product_video_tab`
--

INSERT INTO `tourism_product_video_tab` (`sn`, `page_id`, `video_id`, `video_title`, `video_url`, `status_id`, `staff_id`, `created_time`, `updated_time`) VALUES
(1, 'TA00220240102103604', 'VID00120240110054656', 'Lekki Conservation Center, Lekki, Lagos State', 'https://www.youtube.com/embed/zMxmmX-nAHU', '1', 'STF00220231222013400', '2024-01-10 17:46:56', '2024-01-10 18:29:49'),
(2, 'TA00120240102011804', 'VID00220240110054734', 'Olumo Rock Tourist Complex, Ikija, Abeokuta, Ogun State', 'https://www.youtube.com/embed/oGF1lKqIXjk', '1', 'STF00220231222013400', '2024-01-10 17:47:34', '2024-01-10 16:47:34'),
(3, 'TA00220240102103604', 'VID00320240110073355', 'Lekki Conservation Center, Lekki, Lagos State', 'https://youtu.be/XLec7M44aBg?t=10', '1', 'STF00220231222013400', '2024-01-10 19:33:55', '2024-01-10 18:33:55'),
(4, 'TA00220240102103604', 'VID00420240112123133', 'you', 'https://www.youtube.com/embed/zMxmmX-nAHy', '1', 'STF00220231222013400', '2024-01-12 12:31:33', '2024-01-14 17:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `tradition_cat_tab`
--

CREATE TABLE `tradition_cat_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `statistics` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tradition_cat_tab`
--

INSERT INTO `tradition_cat_tab` (`sn`, `cat_id`, `category_name`, `statistics`, `status_id`, `created_time`, `updated_time`) VALUES
(1, 'TRACAT00120240108065031', 'FAIRS AND FESTIVALS', 0, 1, '2024-01-08 18:50:31', '2024-01-08 17:50:31'),
(2, 'TRACAT00220240108065051', 'ARTS AND HANDICRAFTS', 0, 1, '2024-01-08 18:50:51', '2024-01-08 17:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `tradition_tab`
--

CREATE TABLE `tradition_tab` (
  `sn` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `page_title` mediumtext NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `page_summary` text NOT NULL,
  `page_detail` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `page_pix` varchar(255) NOT NULL,
  `staff_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tradition_tab`
--

INSERT INTO `tradition_tab` (`sn`, `cat_id`, `page_id`, `page_title`, `page_url`, `seo_keywords`, `page_summary`, `page_detail`, `status_id`, `page_pix`, `staff_id`, `views`, `created_time`, `updated_time`) VALUES
(0, 'TRACAT00220240108065051', 'TRA00120240108065424', 'Aso Oke, Yoruba, Nigeria', 'aso-oke-yoruba-nigeria', 'Aso Oke, Yoruba, Nigeria', 'Ashoké (aso oke) is the most prestigious hand-woven cloth of the Yoruba people of southwestern Nigeria. The name literally means \"top cloth\".', '<h2>Aso Oke, Yoruba, Nigeria</h2>\r\n<p>Ashok&eacute; (aso oke) is the most prestigious hand-woven cloth of the Yoruba people of southwestern Nigeria. The name literally means \"top cloth\". While single pieces of ashoke are sometimes worn on a daily basis, complete ashoke outfits are worn during major ceremonies such as weddings, funerals, naming ceremonies and important religious festivals. The men wear ashoke in the form of agbadas (a three-piece outfit consisting of pants (shokoto), an embroidered pull-over shirt (dashiki), and a large pull-over robe (agbada). the women wear it in the form of head ties (gele), blouses (buba), and sarong skirts (iro). Traditionally, it was woven from three materials - cotton, a red imported silk called alari, and a domestic wild raw silk called sanyan. Today these materials are often replaced by rayon and metallic lurex.<br /><br />What traditionally gave ashoke its prestige was not only its beauty but people\'s knowledge of how costly, difficult and time consuming it was to produce. For instance, the traditional indigo colored ashoke often required that the hand-spun thread be dyed up to fourteen times to achieve the deep blues desired. Furthermore, special techniques had to be used to make the threads colorfast so that they would not damage the lighter colored threads or embroidery when washed. The wild raw silk ashoke called sanyan required that thousands of moth cocoons be collected and their silk carefully unraveled and spun into thread. These types of labor intensive activities were common prerequisites before the actual weaving and hand embroidering could begin. When selling ashoke, market women will often discuss in detail the cost and effort required in making a specific piece and will compare and contrast it with others.<br /><br />Technically, ashoke is what is known as a double-heddle narrow loom men\'s weave (although in some parts of Yoruba land it is woven by women). The cloth is made by weaving one forty foot or more four inch band of cloth. This long piece is then taken to a tailor who cuts it into pieces, sews it together, and sometimes hand embroiders it.<br /><br />By purchasing this cloth you are not only acquiring a rare, one-of-a-kind piece of cloth from a very famous West African weaving tradition. You are also encouraging weavers to maintain the skill and knowledge necessary to continue this art form.<br /><br />Above text courtesy of Robert Clyne.</p>', '1', 'TRA00120240108065424_659c36d091ec4.jpg', 'STF00220231222013400', 1, '2024-01-08 18:54:24', '2024-01-14 19:13:06'),
(0, 'TRACAT00120240108065031', 'TRA00220240108070305', 'Eyo Masquerade Festival, Yoruba Culture Tradition', 'eyo-masquerade-festival-yoruba-culture-tradition', 'Eyo Masquerade Festival, Yoruba Culture Tradition', 'Eyo masquerade, also known as Adamu Orisa Play, is a prominent cultural and traditional festival in Yoruba culture. It is considered one of the oldest masquerade', '<h2>Eyo Masquerade Festival, Yoruba Culture Tradition</h2>\r\n<p>Eyo masquerade, also known as Adamu Orisa Play, is a prominent cultural and traditional festival in Yoruba culture. It is considered one of the oldest masquerade traditions in Nigeria and is deeply rooted in Yoruba cultural beliefs and practices.<br /><br />There are two types of Eyo masquerade: the Adimu Orisa and the Eyo Olokun. The Adimu Orisa Eyo is believed to represent the spirits of the dead, while the Eyo Olokun is associated with the sea god Olokun. Both types of Eyo masquerade have unique roles and symbolic significance in Yoruba culture.<br /><br />The Eyo masquerade is usually made up of a group of people wearing white robes, with their faces and heads covered by a mask made from papier-m&acirc;ch&eacute; or cloth. They carry long sticks and wear hats with brightly coloured tassels. They move slowly and gracefully, with each step accompanied by the rhythmic sound of a drum.<br /><br />Eyo masquerades come out during special events and occasions such as the burial of an important Yoruba chief or king, the installation of a new chief, or during the annual Eyo festival, which is held in Lagos. The Eyo festival is a major event that attracts visitors from all over Nigeria and beyond. During the festival, the masquerades dance and perform in the streets, accompanied by drumming and singing.<br /><br />The Eyo masquerade has several taboos associated with it. For example, women are not allowed to look at the masquerade, and it is considered disrespectful to touch or speak to the masquerade while it is performing. Additionally, it is believed that the masquerade brings bad luck to anyone who sees it without permission, so it is important to seek permission before viewing the masquerade.<br /><br />In Yoruba culture, the Eyo masquerade is believed to represent the spirits of the dead, and its appearance is seen as a sign of respect for the ancestors. The masquerade is also believed to bring good luck and blessings to the community, and its appearance is seen as a symbol of unity and solidarity among the people. Overall, the Eyo masquerade is an important and deeply symbolic tradition in Yoruba culture.<br /><br />In terms of depictions in society and in films, the Eyo masquerade has been portrayed in various ways. In Yoruba society, the masquerade is usually depicted as a revered figure, and its appearance is seen as a sign of respect for the ancestors. During the annual Eyo festival in Lagos, drumming and singing accompany the masquerades, and the streets are usually filled with people who come to watch the performance.<br /><br />In films, the Eyo masquerade has been portrayed in various ways. In some movies, the masquerade is depicted as a mysterious and mystical figure, while in others; it is portrayed as a symbol of tradition and cultural heritage. For example, in the Nigerian film &lsquo;Eyo Festival&rsquo;, the masquerades are depicted as powerful and revered figures, and the film highlights the importance of the festival in Yoruba culture.<br />Overall, the Eyo masquerade has played an important role in Yoruba culture for centuries, and its myths and depictions in society and in films have helped to promote and preserve the cultural heritage of the Yoruba people.</p>', '1', 'TRA00220240108070305_659c38d983fed.webp', 'STF00220231222013400', 0, '2024-01-08 19:03:05', '2024-01-08 18:18:33'),
(0, 'TRACAT00120240108065031', 'TRA00320240108070410', 'Argungu Fishing Festival, Kebbi State, Nigeria', 'argungu-fishing-festival-kebbi-state-nigeria', 'Argungu Fishing Festival, Kebbi State, Nigeria', 'The Argungu International Fishing and Cultural Festival, popularly referred to as the Argungu Fishing Festival, is held over four days between February and March ', '<h2>Argungu Fishing Festival, Kebbi State, Nigeria</h2>\r\n<p>The Argungu International Fishing and Cultural Festival, popularly referred to as the Argungu Fishing Festival, is held over four days between February and March every year. The Kebbawa people of Argungu are fishermen and farmers, rice being the main crop grown. After the rice is harvested, the fishing begins, and the festival takes place. <br /><br />History<br /><br />The Emir of Kebbi in Argungu and the Sultanate of Sokoto had been against each other for over a hundred years. However, a simple gesture of diplomacy changed the course of history. In 1925, Mallam Hassan Dan-Mu&rsquo;azu, the District Head of Dange, learned from his subjects that the twentieth Emir of Argungu had set up camp on the outskirt of his district headquarters. He was on a journey to Kaduna and decided to lodge there for the night. In a show of diplomacy, Mallam Hassan Dan-Mu&rsquo;azu decided to visit the Emir and pay his respects. It was testified that this visit led to a strong bond of friendship between the two leaders. <br /><br />In 1931, Mallam Hassan became the 16th Sultan of Sokoto, and in 1934, he decided to revisit the Emir of Argungu. To honor him, the Emir of Argungu organized a grand reception culminating in the staging of the now centuries-old fishing festival. The Emir died shortly, and he was succeeded by his first son, Muhammadu Saani. Immediately after his coronation, the new Emir of Argungu decided to return the visit of the Sultan, which his father, unfortunately, could not do. During the visit, both rulers realized that the Sultan&rsquo;s initial visit and the grand fishing event where they made a public appearance had unexpected benefits. It played a vital role in reducing tensions and decreasing the cross-border raids between their neighboring communities. &nbsp;<br /><br />Location<br /><br />The festival takes place at Argungu town in Kebbi state, the north-west geopolitical zone of Nigeria. The town is on the Sokoto river and is the seat of the Argungu emirate. It is held at four venues within Argungu; the Kabanci for the aquatic cultural activities, the township stadium for agricultural exhibition, and the grand fishing at Matan Fada river, which is about 50 metres wide and 50 feet deep. <br /><br />Religious Rites <br /><br />The religious rites associated with the festival are regarded as its essence, for through them prayers are offered to gods and ancestors for protection and prosperity. The rites, primarily the sacrifice of a goat, hens, fruits, and vegetables, are performed by the Homa, Sarkin, Ruwa, and Jirgi at the Sokoto river the day before the festival starts. &nbsp;<br /><br />Cultural Activities<br /><br />Before the fishing starts, an impressive display of aquatic cultural activities takes place - canoe race, swimming on a gourd and with a clay pot balanced on the head, diving competitions, wild duck hunting, fishing with bare hands, and water relays. Wrestling and boxing competitions, archery, motor rally, arts and crafts and agricultural exhibitions, local music, and dance troops are non-aquatic cultural activities.<br /><br />Grand Fishing <br /><br />The major event, which is the fishing competition, takes place on the fourth and final day of the festival and lasts for an hour. The Homa signals the start of the competition, after which thousands of fishermen dive into the river to hunt for the biggest fish. The use of modern fishing equipment is not allowed; thus, traditional nets and gourds are used. After that, singers rent the air with traditional Kebbawa rhythms. Another sect rattles huge gourds filled with seeds to drive the fish to shallow waters. <br /><br />Argungun<br /><br />Ten-year Hiatus<br /><br />The festival was suspended in 2009 due to insecurity in the northwestern states of Nigeria and did not take place for ten years. However, it resurfaced in 2020, displaying newer glory and hosting the Executive President of Nigeria.<br /><br />Relevance<br />In 2016 the festival was inscribed on the UNESCO Representative List of the Intangible Cultural Heritage of Humanity in recognition of its being a heritage of &lsquo;outstanding universal value&rsquo; that ought to be preserved for present and future generations. <br /><br />The festival is important for conserving the fish in the Matan Fada river, thus ensuring the economic viability of the community&rsquo;s fishery.&nbsp; The religious rites associated with the festival are also considered a celebration of life. <br />&nbsp;<br />Local legends about the festival<br /><br />The Argungu Festival comes with its share of mystery and supernatural events. The custodian of the Matan Fada River is called Hussaini Makwashe or Dangalidaman Makwashe (doubles as the Sarkin Ruwa: river fishing official). Until he okays the commencement of the festival, no one can catch any fish in the river. The fishes reportedly remain invisible to fishermen until the Hussaini Makwashe invites the fishes to the festival. A month before the festival, invitations are extended to fishes in other rivers connected to the Matan Fada River. They must arrive early before the competition else; they will not be allowed to partake in the competition. The Makwashe is also in covenant with the crocodiles in the river. A day before the fishing festival, he directs them to hide until it is over. <br /><br />Argungun<br /><br />Tourism<br />The Argungu Festival is one of the tourist events not just in the north but in Nigeria as a whole. It attracts thousands of guests from all over the world, thereby being a significant source of foreign exchange. It further boosts the hospitality industry in Kebbi state. The tourism importance of this festival was felt when it was suspended, but its reemergence signifies prosperity for Nigeria, Kebbi state, and Argungu town. <br /><br />Sources<br />Daily Trust<br />Refined NG<br />MBBA Global<br />Pressreader<br />UNESCO<br /><br /><br /></p>', '1', 'TRA00320240108070410_659c391a88d6c.jpg', 'STF00220231222013400', 1, '2024-01-08 19:04:10', '2024-01-14 19:13:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert_tab`
--
ALTER TABLE `alert_tab`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `seen_status` (`seen_status`),
  ADD KEY `user_id` (`staff_id`);

--
-- Indexes for table `blog_tab`
--
ALTER TABLE `blog_tab`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `user_id` (`staff_id`);

--
-- Indexes for table `culture_cat_tab`
--
ALTER TABLE `culture_cat_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `culture_tab`
--
ALTER TABLE `culture_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `event_tab`
--
ALTER TABLE `event_tab`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `user_id` (`staff_id`);

--
-- Indexes for table `faq_tab`
--
ALTER TABLE `faq_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `natural_tourism_product_cat_tab`
--
ALTER TABLE `natural_tourism_product_cat_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `natural_tourism_product_tab`
--
ALTER TABLE `natural_tourism_product_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `page_views_tab`
--
ALTER TABLE `page_views_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_backend_settings_tab`
--
ALTER TABLE `setup_backend_settings_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_categories_tab`
--
ALTER TABLE `setup_categories_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_counter_tab`
--
ALTER TABLE `setup_counter_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_role_tab`
--
ALTER TABLE `setup_role_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_status_tab`
--
ALTER TABLE `setup_status_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_tab`
--
ALTER TABLE `staff_tab`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `hash_id` (`hash_id`);

--
-- Indexes for table `tourism_attraction_tab`
--
ALTER TABLE `tourism_attraction_tab`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `user_id` (`staff_id`);

--
-- Indexes for table `tourism_destination_tab`
--
ALTER TABLE `tourism_destination_tab`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `user_id` (`staff_id`);

--
-- Indexes for table `tourism_products_pix_tab`
--
ALTER TABLE `tourism_products_pix_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tourism_products_tab`
--
ALTER TABLE `tourism_products_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tourism_product_video_tab`
--
ALTER TABLE `tourism_product_video_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tradition_cat_tab`
--
ALTER TABLE `tradition_cat_tab`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert_tab`
--
ALTER TABLE `alert_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_tab`
--
ALTER TABLE `blog_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `culture_cat_tab`
--
ALTER TABLE `culture_cat_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `culture_tab`
--
ALTER TABLE `culture_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_tab`
--
ALTER TABLE `event_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq_tab`
--
ALTER TABLE `faq_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `natural_tourism_product_cat_tab`
--
ALTER TABLE `natural_tourism_product_cat_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `natural_tourism_product_tab`
--
ALTER TABLE `natural_tourism_product_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_views_tab`
--
ALTER TABLE `page_views_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `setup_backend_settings_tab`
--
ALTER TABLE `setup_backend_settings_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_categories_tab`
--
ALTER TABLE `setup_categories_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setup_counter_tab`
--
ALTER TABLE `setup_counter_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `setup_role_tab`
--
ALTER TABLE `setup_role_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_status_tab`
--
ALTER TABLE `setup_status_tab`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff_tab`
--
ALTER TABLE `staff_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tourism_attraction_tab`
--
ALTER TABLE `tourism_attraction_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tourism_destination_tab`
--
ALTER TABLE `tourism_destination_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tourism_products_pix_tab`
--
ALTER TABLE `tourism_products_pix_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tourism_products_tab`
--
ALTER TABLE `tourism_products_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tourism_product_video_tab`
--
ALTER TABLE `tourism_product_video_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tradition_cat_tab`
--
ALTER TABLE `tradition_cat_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
