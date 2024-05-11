-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 02:17 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cosmosimpex`
--

-- --------------------------------------------------------

--
-- Table structure for table `ns_achievements`
--

CREATE TABLE IF NOT EXISTS `ns_achievements` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `percentage` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_achievements`
--

INSERT INTO `ns_achievements` (`id`, `title`, `percentage`, `created`, `modified`) VALUES
(8, 'SaaS Development', '20', '2017-03-11 15:01:39', '2017-03-30 18:11:20'),
(9, 'Linux/Unix development', '70', '2017-03-11 15:02:43', '2017-03-30 17:32:06'),
(10, 'DNN Development Services', '58', '2017-03-11 16:53:45', '2017-03-30 17:32:19'),
(14, 'Mac OS X development', '90', '2017-03-30 17:33:00', '2017-03-30 17:33:00'),
(15, 'RIA Development', '36', '2017-03-30 17:33:12', '2017-03-30 17:33:12'),
(16, 'SugarCRM Development', '80', '2017-03-30 17:33:24', '2017-03-30 18:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `ns_authorized_menus`
--

CREATE TABLE IF NOT EXISTS `ns_authorized_menus` (
  `id` char(36) NOT NULL,
  `role_id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` char(36) DEFAULT NULL,
  `dominion_id` char(36) DEFAULT NULL,
  `plugin` varchar(100) DEFAULT NULL,
  `process_id` char(36) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinytext NOT NULL,
  `position` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_authorized_menus`
--

INSERT INTO `ns_authorized_menus` (`id`, `role_id`, `name`, `parent_id`, `dominion_id`, `plugin`, `process_id`, `icon`, `status`, `position`) VALUES
('54c4ce31-b0c0-42b7-be5b-0ac8f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Dashboard', '', '54cdc16d-7c28-42f6-8b40-00acf8defb25', NULL, '54cdc16d-3450-4586-99ba-00acf8defb25', '<i class="fa fa-dashboard"></i>', 'Active', 0),
('54c4d610-7e48-4303-a20f-0ac8f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'CMS Settings', '', '', '', '', '<i class="fa fa-fw fa-sitemap"></i>', 'Active', 10),
('54c4d655-6c6c-4695-9e79-0ac8f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Roles', '54c4d610-7e48-4303-a20f-0ac8f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', NULL, '54c4c4a1-30bc-4215-b2a5-0ac8f8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 0),
('54c4d6d0-c0ac-4bf0-93a0-0ac8f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Dominions', '54c4d610-7e48-4303-a20f-0ac8f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', NULL, '54c4c209-9494-40d7-8a06-0ac8f8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 1),
('54c4d954-c3f8-4f58-8d46-0ac8f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Permissions', '54c4d610-7e48-4303-a20f-0ac8f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', NULL, '54c4c3e8-2034-4562-8d34-0ac8f8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 3),
('54c4d9b9-9034-4620-bf9d-0ac8f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Authorize Menus', '54c4d610-7e48-4303-a20f-0ac8f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', NULL, '54c4c4f4-3690-40c5-8473-0ac8f8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 4),
('54c5bf67-b400-4291-9289-08b4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Member Management', '', '', NULL, '', '<i class="fa fa-fw fa-users"></i>', 'Active', 1),
('54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Cms', '', '', NULL, '', '<i class="fa fa-fw fa-gears"></i>', 'Active', 1),
('54ccab8f-bff4-4186-b857-0bf0f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Contents', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '', '54cca713-e388-4feb-836b-0bf0f8defb25', '<i class="fa fa-fw fa-tasks"></i>', 'Active', 0),
('54ccabce-b72c-4179-bb4a-0bf0f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Menus', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '', '54cca756-3c14-4d46-be18-0bf0f8defb25', '<i class="fa fa-fw fa-bars"></i>', 'Active', 1),
('54ccac56-faa0-4c31-80cc-0bf0f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Slider', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '', '54cca7f5-4180-4f2f-a916-0bf0f8defb25', '<i class="fa fa-fw fa-toggle-right"></i>', 'Active', 2),
('54ccac9e-e300-4fab-8789-0bf0f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Photo Gallery', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '', '54cca7dd-8884-43f0-9a0c-0bf0f8defb25', '<i class="fa fa-fw fa-camera"></i>', 'Active', 3),
('54cdd0f4-15f8-4506-9f0f-00acf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'News', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', 'News', '54cdd079-d5bc-46f5-b56e-00acf8defb25', '<i class="fa fa-fw fa-building-o"></i>', 'Draft', 4),
('54cde0bd-417c-4b76-a7c5-00acf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Related Link', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', 'NsRelatedLink', '54cde048-9fc4-4743-bf05-00acf8defb25', '<i class="fa fa-fw fa-tag"></i>', 'Draft', 5),
('54d70117-d22c-48ae-a2d2-080cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Site Configurations', '', '54d6ff93-8924-4b42-b3da-080cf8defb25', '', '54d6ff93-e5e4-4c1e-9705-080cf8defb25', '<i class="fa fa-fw fa-cog"></i>', 'Active', 8),
('54d9f672-2ba0-4b2e-a58c-06b4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Users', '', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '', '54c4c56a-9088-44fe-bedd-0ac8f8defb25', '<i class="fa fa-fw fa-users"></i>', 'Active', 9),
('54e16f0a-4380-446a-b9aa-0d50f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Promotion', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '', '54e16d3d-0f28-4109-92f1-0d50f8defb25', '<i class="fa fa-fw fa-file-text-o"></i>', 'Active', 6),
('54e16f62-92a4-479d-b2b8-0d50f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Events', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '', '54e16d66-1d6c-4529-86b9-0d50f8defb25', '<i class="fa fa-fw fa-calendar"></i>', 'Active', 7),
('54e16fd9-a778-465e-b7f4-0d50f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'SocialLinks', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '', '54e16d93-12ec-498f-89ce-0d50f8defb25', '<i class="fa fa-fw fa-shield"></i>', 'Active', 8),
('56542487-5580-48cd-becd-02b4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Contact us', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '', '56542433-0fb4-408a-b6f2-02b4f8defb25', '<i class="fa fa-dashboard"></i>', 'Active', 9),
('56cec9a5-f90c-4661-b303-0f8cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Product', '', '', '', '', '<i class="fa fa-fw fa-cog"></i>', 'Draft', 3),
('56cec9c1-5f8c-4a6c-950e-0f8cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Category', '56cec9a5-f90c-4661-b303-0f8cf8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '', '56cec915-7750-438c-80a6-0f8cf8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 1),
('56ceca29-00c8-4d8e-a4e8-0f8cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Product', '56cec9a5-f90c-4661-b303-0f8cf8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '', '56cec922-36bc-492d-be47-0f8cf8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 2),
('58c3b11d-e228-440e-8a8d-672cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Service', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '58c3b0f1-3d5c-4907-aa49-672cf8defb25', '', '58c3b0f1-30f8-497e-8232-672cf8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 6),
('58dcebb8-be54-46ed-8f87-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Achievements', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '58dceb8e-4838-4889-88cd-143cf8defb25', '', '58dceb8e-7a98-47d9-93e8-143cf8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 6);

-- --------------------------------------------------------

--
-- Table structure for table `ns_careers`
--

CREATE TABLE IF NOT EXISTS `ns_careers` (
`id` int(11) NOT NULL,
  `position_apply_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `subject` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_careers`
--

INSERT INTO `ns_careers` (`id`, `position_apply_id`, `first_name`, `last_name`, `phone_no`, `email`, `message`, `subject`, `file`, `status`, `created`, `modified`) VALUES
(15, 1, 'sunny', 'khan', '01924496004', 'ismail.khan.sunny@gmail.com', 'ismail.khan.sunny@gmail.com', 'career', '/img/frontend/Career/file/Career_file_160307125312.pdf', '', '2016-03-07 12:53:12', '2016-03-07 12:53:12'),
(16, 1, '', 'khan', '01924496004', 'ismail.khan.sunny@gmail.com', 'aa', 'career', '/img/frontend/Career/file/Career_file_160307125946.pdf', '', '2016-03-07 12:59:46', '2016-03-07 12:59:46'),
(17, 1, '66', '96', '112', '333@gamil.com', 'eeeeeee', 'ddddddddd', '/img/frontend/Career/file/Career_file_170401115705.pdf', '', '2017-04-01 11:57:05', '2017-04-01 11:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `ns_categories`
--

CREATE TABLE IF NOT EXISTS `ns_categories` (
`id` int(10) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `top_menu_serial` int(11) DEFAULT '0',
  `name` varchar(256) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL COMMENT 'category description',
  `slug` varchar(255) DEFAULT NULL,
  `code_name` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL COMMENT '1="Approved", 2="Pending", 3="Trush"'
) ENGINE=InnoDB AUTO_INCREMENT=610 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_categories`
--

INSERT INTO `ns_categories` (`id`, `parent_id`, `top_menu_serial`, `name`, `image`, `description`, `slug`, `code_name`, `created`, `modified`, `order`, `status`) VALUES
(1, NULL, 0, 'Clothing', '', '', NULL, '', '2017-04-01 13:33:49', '2017-04-01 13:33:49', 1, 'active'),
(2, 1, 0, 'Men', '', '', NULL, '', '2017-04-01 13:34:02', '2017-04-01 13:34:02', 1, 'active'),
(3, 1, 0, 'Women', '', '', NULL, '', '2017-04-01 13:34:14', '2017-04-01 13:34:14', 2, 'active'),
(4, 1, 0, 'KIds', '', '', NULL, '', '2017-04-01 13:34:41', '2017-04-01 13:34:41', 3, 'active'),
(606, NULL, 0, 'Electronics', '', '', NULL, '', '2017-04-01 13:57:41', '2017-04-01 13:57:41', 2, 'active'),
(607, 606, 0, 'Tablets, PCs', '', '', NULL, '', '2017-04-01 13:58:04', '2017-04-01 13:58:04', 1, 'active'),
(608, 606, 0, 'Cellphones ', '', '', NULL, '', '2017-04-01 13:58:24', '2017-04-01 13:58:24', 2, 'active'),
(609, 606, 0, 'Camera & Photos', '', '', NULL, '', '2017-04-01 13:58:42', '2017-04-01 13:58:42', 3, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ns_configurations`
--

CREATE TABLE IF NOT EXISTS `ns_configurations` (
  `id` char(36) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `google_analytics` varchar(255) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `address` text,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `status` tinytext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ns_configurations`
--

INSERT INTO `ns_configurations` (`id`, `image`, `title`, `slogan`, `meta_keywords`, `meta_description`, `google_analytics`, `domain`, `contact_email`, `address`, `phone`, `fax`, `status`, `created`, `modified`) VALUES
('52f85cf6-4ebc-4be9-b7d6-1064f8defb25', '/img/logo.png', 'Cosmosimpex', 'Cosmosimpex', 'Cosmosimpex', 'Cosmosimpex', 'Cosmosimpex', '', 'leo@nogorsolutions.com', 'Dhaka', '02-9582459, 02-9582561', 'info@cosmosimpex.com', '', '2014-02-10 11:00:38', '2017-03-07 18:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `ns_contactuses`
--

CREATE TABLE IF NOT EXISTS `ns_contactuses` (
  `id` char(36) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text,
  `shortdes` varchar(200) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `google_location` text NOT NULL,
  `meta_keyword` text,
  `meta_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_contactuses`
--

INSERT INTO `ns_contactuses` (`id`, `email`, `description`, `shortdes`, `mobile`, `fax`, `google_location`, `meta_keyword`, `meta_description`) VALUES
('56651ec5-de40-4f88-8242-0c68f8defb25', 'faruk@nogorsolutions.com ', '<p>4578 Marmora Road,Glasgow D04 89GR</p>\r\n\r\n<p><a href="callto:#">800-2345-678;</a> <a class="inset-left-10" href="callto:#">800-2345-679</a></p>\r\n\r\n<p>Mon-Sat 8:00 am to 8:00 pm</p>\r\n', '<p>Baitulkhair Builiding, 48/A,B Purana Paltan, Suite #902-A, Dhaka-1000</p>\r\n', '01705442788', 'N/A', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.292512145031!2d90.40676231495533!3d23.772595893845015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c779bd6ee47f%3A0x73b4315f5f970bda!2sNogor+Solutions+Limited!5e0!3m2!1sbn!2sbd!4v1489232283453" width="570" height="235" frameborder="0" style="border:0" allowfullscreen></iframe>', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ns_contents`
--

CREATE TABLE IF NOT EXISTS `ns_contents` (
  `id` char(36) NOT NULL,
  `menu_id` char(36) NOT NULL,
  `department_id` char(36) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `status` tinytext CHARACTER SET utf8 NOT NULL,
  `is_delete_able` varchar(10) NOT NULL DEFAULT 'yes',
  `type` varchar(20) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  `meta_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_contents`
--

INSERT INTO `ns_contents` (`id`, `menu_id`, `department_id`, `parent_id`, `title`, `slug`, `description`, `image`, `path`, `status`, `is_delete_able`, `type`, `created`, `modified`, `meta_keyword`, `meta_description`) VALUES
('58bfd19d-8f0c-417c-88f2-1ec0f8defb25', '', '', 0, 'Contain will Uload Soon', 'contain-will-uload-soon', '<p>Contain will Uload Soon</p>\r\n', '', NULL, 'published', 'yes', '', '2017-03-08 15:40:44', '2017-03-08 15:40:44', '', ''),
('58bfe95a-345c-4c5a-b57a-5c78f8defb25', '', '', 0, 'WELCOME', 'welcome-2', '<p>Swift specializes in business software development and creates both large enterprise business software, and small bespoke software applications for custom needs. Our experience allows us to create applications with high performance with the use of Microsoft .Net, C++, PHP, C#, Java, Flex, Delphi, Linux/Unix, and other technologies, programming languages and platforms.</p>\r\n\r\n<p>Swift specializes in business software development and creates both large enterprise business software, and small bespoke software applications for custom needs. Our experience allows us to create applications with high performance with the use of Microsoft .Net, C++, PHP, C#, Java, Flex, Delphi, Linux/Unix, and other technologies, programming languages and platforms.</p>\r\n', '/img/frontend/content/Content_image_170308052202.jpg', NULL, 'published', 'yes', 'welcome_text', '2017-03-08 17:22:02', '2017-03-08 17:30:23', '', ''),
('58bff775-2764-4274-a152-5c78f8defb25', '', '', 0, 'Testimonials', 'testimonials-2', '<blockquote class="offset-top-38">\r\n<div class="h3 text-center text-white">\r\n<p>&quot;Thanks a lot for the quick response and excellent service.<br class="hidden visible-lg-block" />\r\nWe are really impressed and your solution is excellent which made our life confortable!<br class="hidden visible-lg-block" />\r\nYour competence is simply justified!&quot;</p>\r\n</div>\r\n</blockquote>\r\n\r\n<p><span class="decoration text-uppercase text-white small text-bold">Marc Monllau, client</span></p>\r\n', '', NULL, 'published', 'yes', 'testimonials', '2017-03-08 18:22:13', '2017-03-29 13:02:18', '', ''),
('58c3dd54-b37c-4553-974d-672cf8defb25', '', '', 0, 'Crafting unique apps', 'crafting-unique-apps', '<h3 class="line-height-1 text-center text-white text-light">Each application that we produce is one-of-a-kind. Every new client is guaranteed to leave satisfied and inspired. Every new software is a masterpiece that is specifically created to reveal your business atmosphere.</h3>\r\n', '', NULL, 'published', 'yes', 'service_text', '2017-03-11 17:19:48', '2017-03-11 17:19:48', '', ''),
('58db82b5-be7c-417f-acc3-24b4f8defb25', '', '', 0, 'Competitive Advantages', 'competitive-advantages-2', '<h2 class="section-top-17 section-bottom-15">Competitive<br class="hidden visible-md-block visible-lg-block" />\r\nAdvantages</h2>\r\n\r\n<p><span class="small">Swift offers the following benefits for the clients<br class="hidden visible-md-block visible-lg-block" />\r\nworldwide:</span></p>\r\n', '', NULL, 'published', 'yes', 'competitive', '2017-03-29 15:47:33', '2017-03-29 15:52:19', '', ''),
('58df3d65-0390-483b-bb0f-16e8f8defb25', '', '', 0, 'Search Your Lifestyle here!', 'search-your-lifestyle-here', '<p><strong>Basumati </strong>is a society of ambitious creative people, each of whom are actively involved in helping industries around the world do something better, more efficiently and more productively. At Basumati, there is bound to be an opportunity for you to build the career you want at one of the most successful companies in history. We pride ourselves on being one of the industry-leaders, as well as a great place to work. Therefore, you definitely are welcome to search your lifestyles here!</p>\r\n', '/img/frontend/content/Content_image_170401114754.jpg', NULL, 'published', 'yes', 'carrer', '2017-04-01 11:40:53', '2017-04-01 11:47:54', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ns_content_files`
--

CREATE TABLE IF NOT EXISTS `ns_content_files` (
  `id` char(36) NOT NULL,
  `content_id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content_file` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ns_dominions`
--

CREATE TABLE IF NOT EXISTS `ns_dominions` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_dominions`
--

INSERT INTO `ns_dominions` (`id`, `name`) VALUES
('53141557-020c-4f2f-b628-0d43f8defb25', 'Pages'),
('53141565-e924-4ee7-b6ba-0939f8defb25', 'Permissions'),
('531415c7-d874-48b5-9b69-0931f8defb25', 'Profiles'),
('531415ff-0e3c-42d9-b5e2-0d43f8defb25', 'Users'),
('5316b4f6-80c4-4e4b-be27-0936f8defb25', 'Dominions'),
('5316e2f3-ac88-4b7c-923c-3e23f8defb25', 'AuthorizedMenus'),
('5316e4a7-965c-4213-9cab-3e22f8defb25', 'Roles'),
('5492b8c5-291c-452d-bc3a-0544f8defb25', 'Processes'),
('54cca713-a0e4-4f30-9a4f-0bf0f8defb25', 'Contents'),
('54cca742-705c-4bfe-a0b5-0bf0f8defb25', 'ContentFiles'),
('54cca756-6590-4af5-8154-0bf0f8defb25', 'Menus'),
('54cca7cd-7338-4689-8582-0bf0f8defb25', 'Photos'),
('54cca7dd-01e4-4789-9ab5-0bf0f8defb25', 'PhotoGalleries'),
('54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', 'Sliders'),
('54cca80d-764c-4264-a157-0bf0f8defb25', 'SliderContents'),
('54cdc16d-7c28-42f6-8b40-00acf8defb25', 'Dashboard'),
('54cdd079-ff38-45e0-8097-00acf8defb25', 'News'),
('54cde048-d1ec-4511-a442-00acf8defb25', 'RelatedLinks'),
('54d6ff93-8924-4b42-b3da-080cf8defb25', 'Configurations'),
('54e16d3d-6064-4b95-8a39-0d50f8defb25', 'Notices'),
('54e16d66-96cc-4569-b875-0d50f8defb25', 'Events'),
('54e16d93-c308-4d17-b666-0d50f8defb25', 'SocialLinks'),
('56542433-b44c-47a6-8701-02b4f8defb25', 'Contactuses'),
('56cec903-c010-41f6-b8db-0f8cf8defb25', 'Companies'),
('56cec915-1a2c-4a04-ab1f-0f8cf8defb25', 'Categories'),
('56cec922-b01c-4e05-af92-0f8cf8defb25', 'Products'),
('58c3b0f1-3d5c-4907-aa49-672cf8defb25', 'Services'),
('58dceb8e-4838-4889-88cd-143cf8defb25', 'Achievements');

-- --------------------------------------------------------

--
-- Table structure for table `ns_events`
--

CREATE TABLE IF NOT EXISTS `ns_events` (
  `id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `icon` varchar(200) DEFAULT NULL,
  `status` tinytext NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_events`
--

INSERT INTO `ns_events` (`id`, `title`, `slug`, `description`, `icon`, `status`, `created`) VALUES
('58c3e6af-ecf0-4205-ba17-672cf8defb25', ' Interactive design', 'interactive-design', '<p>Contain will Upload Soon</p>\r\n', '<i class="fa fa-book fa-fw" aria-hidden="true"></i>', '', '2017-03-11 17:59:43'),
('58c3e71b-34cc-4d05-983d-672cf8defb25', 'Brand Identity', 'brand-identity', '<p>Contain Will Upload Soon</p>\r\n', '<i class="fa fa-shield"></i> ', '', '2017-03-11 18:01:31'),
('58c3e77e-a874-490e-81ed-672cf8defb25', 'Motion Graphics', 'motion-graphics', '<p>Contain Will Upload Soon</p>\r\n', '<i class="fa fa-list" aria-hidden="true"></i>', '', '2017-03-11 18:03:10'),
('58c3e7c4-118c-4bc0-94e2-672cf8defb25', 'Canvas Animation', 'canvas-animation-2', '<p>Contain Will Upload Soon</p>\r\n', '<i class="fa  fa-adjust" aria-hidden="true"></i>', '', '2017-03-11 18:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `ns_menus`
--

CREATE TABLE IF NOT EXISTS `ns_menus` (
  `id` char(36) NOT NULL,
  `parent_id` char(36) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_id` varchar(36) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `is_delete_able` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_menus`
--

INSERT INTO `ns_menus` (`id`, `parent_id`, `type`, `position`, `title`, `content_id`, `slug`, `description`, `url`, `file`, `order`, `status`, `is_delete_able`, `created`, `modified`) VALUES
('58bfd267-8e24-4a6f-b99a-1ec0f8defb25', '', 'content', 'header', 'About', '58bfd19d-8f0c-417c-88f2-1ec0f8defb25', 'about-2', NULL, '', '', 2, 'active', 1, '2017-03-08 15:44:07', '2017-03-08 15:44:07'),
('58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25', '', 'external_link', 'header', 'APPAREL SERVICES', '58bfd19d-8f0c-417c-88f2-1ec0f8defb25', 'apparel-services', NULL, 'http://cosmosimpex.com/pages/service', '', 3, 'active', 1, '2017-03-08 15:44:27', '2017-03-30 14:52:13'),
('58bfd2d0-2848-41ab-8262-1ec0f8defb25', '', 'external_link', 'header', 'Contacts', '', 'contacts-2', NULL, 'http://cosmosimpex.com/pages/contact', '', 6, 'active', 1, '2017-03-08 15:45:52', '2017-03-29 16:02:18'),
('58db499a-4f7c-4dea-b8a5-4aad8f5f54cb', '58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25', 'content', 'header', 'Apparel Buying Agent', '58db95c3-4ac8-4007-bded-1f0a8f5f54cb', 'apparel-buying-agent-2', NULL, '', '', 1, 'inactive', 1, '2017-03-29 11:43:54', '2017-03-30 16:35:36'),
('58db49f5-95e0-48e4-ad50-22be8f5f54cb', '58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25', 'content', 'header', 'Textile Sourcing', '58db95de-c4d0-444d-bfd6-27a18f5f54cb', 'textile-sourcing-2', NULL, '', '', 7, 'active', 1, '2017-03-29 11:45:25', '2017-03-30 15:10:02'),
('58db4a26-f254-483c-8b97-289e8f5f54cb', '58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25', 'content', 'header', 'Machineries Indent', '58db9606-ff3c-48ae-89cb-2c008f5f54cb', 'machineries-indent-2', NULL, '', '', 10, 'active', 1, '2017-03-29 11:46:14', '2017-03-30 14:56:03'),
('58db4a48-8acc-423b-93d2-2c1d8f5f54cb', '58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25', 'content', 'header', 'Export & Outsourcing', '58db9631-d38c-4852-a8c6-54eb8f5f54cb', 'export-outsourcing-2', NULL, '', '', 11, 'active', 1, '2017-03-29 11:46:48', '2017-03-30 14:56:21'),
('58db4f36-d780-41aa-a67e-65948f5f54cb', '', 'content', 'header', 'Directory', '58dca5f1-4c04-4615-8389-73b68f5f54cb', 'directory', NULL, 'products/producrgroup', '', 4, 'active', 1, '2017-03-29 12:07:50', '2017-03-30 14:53:43'),
('58db8381-4748-4865-8583-61be8f5f54cb', '58bfd267-8e24-4a6f-b99a-1ec0f8defb25', 'content', 'header', 'Our Vision', '58bfd19d-8f0c-417c-88f2-1ec0f8defb25', 'our-vision-2', NULL, '', '', 1, 'active', 1, '2017-03-29 15:50:57', '2017-04-08 16:46:59'),
('58db84a4-b0a8-48bc-a7f0-041b8f5f54cb', '58bfd267-8e24-4a6f-b99a-1ec0f8defb25', 'content', 'header', 'Company Information', '58bfd19d-8f0c-417c-88f2-1ec0f8defb25', 'company-information-2', NULL, '', '', 2, 'inactive', 1, '2017-03-29 15:55:48', '2017-03-30 16:38:14'),
('58db8593-e480-405d-af04-27b48f5f54cb', '', 'external_link', 'header', 'Career', '', 'career-2', NULL, 'http://cosmosimpex.com/pages/carrer', '', 5, 'active', 1, '2017-03-29 15:59:47', '2017-04-01 18:10:43'),
('58dca5cc-9704-40fd-9622-26768f5f54cb', '58db4f36-d780-41aa-a67e-65948f5f54cb', 'content', 'header', 'Ready Made Garments', '58dca5f1-4c04-4615-8389-73b68f5f54cb', 'ready-made-garments-2', NULL, '', '', 1, 'active', 1, '2017-03-30 12:29:32', '2017-03-30 12:45:37'),
('58dca88e-079c-45ed-9cb2-04aa8f5f54cb', '58db4f36-d780-41aa-a67e-65948f5f54cb', 'content', 'header', 'Fabrics & Garments Accessories', '58dca5f1-4c04-4615-8389-73b68f5f54cb', 'fabrics-garments-accessories', NULL, '', '', 2, 'active', 1, '2017-03-30 12:41:18', '2017-03-30 12:50:45'),
('58dca8d2-73cc-4450-aa63-14ab8f5f54cb', '58db4f36-d780-41aa-a67e-65948f5f54cb', 'content', 'header', 'Machineries & Equipment', '58dca5f1-4c04-4615-8389-73b68f5f54cb', 'machineries-equipment-2', NULL, '', '', 3, 'active', 1, '2017-03-30 12:42:26', '2017-03-30 15:17:12'),
('58dca8f5-6d24-4776-b399-4ad58f5f54cb', '58db4f36-d780-41aa-a67e-65948f5f54cb', 'content', 'header', 'Petroleum Base Oils', '58dca5f1-4c04-4615-8389-73b68f5f54cb', 'petroleum-base-oils-2', NULL, '', '', 6, 'active', 1, '2017-03-30 12:43:01', '2017-03-30 15:16:14'),
('58dca965-8794-4201-ba32-049d8f5f54cb', '58db4f36-d780-41aa-a67e-65948f5f54cb', 'content', 'header', 'Jute Bags & Accessories', '58dca5f1-4c04-4615-8389-73b68f5f54cb', 'jute-bags-accessories-2', NULL, '', '', 5, 'inactive', 1, '2017-03-30 12:44:53', '2017-03-30 14:52:59'),
('58dcaa2a-7f28-4f40-a647-2cf58f5f54cb', '58db4f36-d780-41aa-a67e-65948f5f54cb', 'content', 'header', 'Software, Apps & Websites', '58dca5f1-4c04-4615-8389-73b68f5f54cb', 'software-apps-websites-2', NULL, '', '', 6, 'inactive', 1, '2017-03-30 12:48:10', '2017-03-30 14:53:06'),
('58dcc309-3fb0-40be-8d98-63278f5f54cb', '58bfd267-8e24-4a6f-b99a-1ec0f8defb25', 'content', 'header', 'Apparel Associates', '58dcc35a-ac98-4a47-8093-3cd28f5f54cb', 'apparel-associates-2', NULL, '', '', 4, 'active', 1, '2017-03-30 14:34:17', '2017-03-30 16:36:16'),
('58dcc89a-894c-400d-bfeb-4ec08f5f54cb', '58bfd267-8e24-4a6f-b99a-1ec0f8defb25', 'content', 'header', 'Apparel Work Style', '58dcc87f-7cd4-47b0-85a8-4a678f5f54cb', 'apparel-work-style-2', NULL, '', '', 5, 'active', 1, '2017-03-30 14:58:02', '2017-03-30 16:37:08'),
('58dcc8e1-73f4-4f71-8481-5adc8f5f54cb', '58bfd267-8e24-4a6f-b99a-1ec0f8defb25', 'content', 'header', 'Apparel Design Inputs', '58dcc4da-7f88-4bc6-ba55-7fc88f5f54cb', 'apparel-design-inputs-2', NULL, '', '', 6, 'active', 1, '2017-03-30 14:59:13', '2017-03-30 16:37:27'),
('58dcc991-4118-4a2b-8d59-5cb88f5f54cb', '58bfd267-8e24-4a6f-b99a-1ec0f8defb25', 'content', 'header', 'Our Strength', '58dcc970-508c-4ab5-88d4-580c8f5f54cb', 'our-strength', NULL, '', '', 3, 'active', 1, '2017-03-30 15:02:09', '2017-04-02 12:38:01'),
('58dcdee6-39e8-4bd5-8f1f-58cb8f5f54cb', '58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25', 'content', 'header', 'Sourcing & Product Development', '58bfe95a-345c-4c5a-b57a-5c78f8defb25', 'sourcing-product-development-2', NULL, '', '', 1, 'active', 1, '2017-03-30 16:33:10', '2017-04-08 14:24:00'),
('58dcdf1b-b7b4-4301-9bb6-62378f5f54cb', '58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25', 'content', 'header', 'Production & Quality Control', '58bfd19d-8f0c-417c-88f2-1ec0f8defb25', 'production-quality-control-2', NULL, '', '', 2, 'active', 1, '2017-03-30 16:34:03', '2017-04-08 14:31:18'),
('58dcdf57-ca88-4a42-bd9d-042c8f5f54cb', '58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25', 'content', 'header', 'Marchendising & Documentation', '58dca5f1-4c04-4615-8389-73b68f5f54cb', 'marchendising-documentation', NULL, '', '', 3, 'active', 1, '2017-03-30 16:35:03', '2017-03-30 16:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `ns_missions`
--

CREATE TABLE IF NOT EXISTS `ns_missions` (
  `id` char(36) NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinytext NOT NULL,
  `created` datetime NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_keyword` text,
  `meta_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_missions`
--

INSERT INTO `ns_missions` (`id`, `company_id`, `title`, `description`, `image`, `file`, `status`, `created`, `slug`, `meta_keyword`, `meta_description`) VALUES
('56c433fe-7234-469e-918a-0dc4f8defb25', 2, 'Automobile Services', '<p><strong>BDL</strong> is an integral part of Basumati group of companies where BDL is a manufacturing company in Bangladesh established in Savar, Dhaka in 2012, having its own distribution..</p>\r\n', '/img/frontend/Mission/image/Mission_image_160305061054.jpg', NULL, 'active', '2016-02-17 14:49:02', '', '', ''),
('56d6ad56-b4dc-4e3d-831e-8d05c0b99bfc', 3, 'Recipe', '<p><strong>Beef Nacho Casserole</strong></p>\r\n', '/img/frontend/Mission/image/Mission_image_160305060911.jpg', NULL, 'active', '2016-03-02 15:07:34', '', '', ''),
('56dacda5-49a8-42cc-bf14-4f31c0b99bfc', 2, 'Lubricants and Greases Manufacturer', '<p>lubricants and greases</p>\r\n', '/img/frontend/Mission/image/Mission_image_160305061429.jpg', NULL, 'active', '2016-03-05 18:14:29', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ns_news`
--

CREATE TABLE IF NOT EXISTS `ns_news` (
  `id` char(36) NOT NULL,
  `department_id` char(36) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_keyword` varchar(100) NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ns_notices`
--

CREATE TABLE IF NOT EXISTS `ns_notices` (
  `id` char(36) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `department_id` char(36) NOT NULL,
  `is_marquee` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `status` tinytext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created` datetime NOT NULL,
  `meta_keyword` varchar(100) NOT NULL,
  `meta_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_notices`
--

INSERT INTO `ns_notices` (`id`, `order`, `department_id`, `is_marquee`, `category`, `title`, `description`, `image`, `status`, `slug`, `start_date`, `end_date`, `created`, `meta_keyword`, `meta_description`) VALUES
('58bfed88-087c-411c-a5f6-5c78f8defb25', 1, '', 0, '', 'Top-class quality', '<p>To ensure bright quality of all the services offered, Swift implies quality management for each product development stage, including requirements management, development processes, product functionality and usability, delivery, and technical support.</p>\r\n', '/img/frontend/notice/Notice_image_170308053952.jpg', 'active', 'top-class-quality', '0000-00-00', '0000-00-00', '2017-03-08 17:39:52', '', ''),
('58bfedb8-8af4-4461-8910-5c78f8defb25', 2, '', 0, '', 'Great cost savings', '<p>Actual labor costs allow producing software at up to 60% lower cost than in other countries</p>\r\n', '/img/frontend/notice/Notice_image_170308054040.jpg', 'active', 'great-cost-savings', '0000-00-00', '0000-00-00', '2017-03-08 17:40:40', '', ''),
('58bfedf1-48cc-4830-93d3-5c78f8defb25', 3, '', 0, '', 'Complete suite of services', '<p>We undertake every aspect of your project: requirements management, product design and architecture, programming and development, quality assurance, documentation preparation, technical support, and maintenance</p>\r\n', '/img/frontend/notice/Notice_image_170308054137.jpg', 'active', 'complete-suite-of-services', '0000-00-00', '0000-00-00', '2017-03-08 17:41:37', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ns_permissions`
--

CREATE TABLE IF NOT EXISTS `ns_permissions` (
  `id` char(36) NOT NULL,
  `role_id` char(36) NOT NULL,
  `dominion_id` char(36) NOT NULL,
  `process_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_permissions`
--

INSERT INTO `ns_permissions` (`id`, `role_id`, `dominion_id`, `process_id`) VALUES
('54c4c67d-38f4-444c-b5d4-0ac8f8defb25', '53141678-618c-49b2-a33f-0931f8defb25', '53141557-020c-4f2f-b628-0d43f8defb25', '54c4c5c0-2ac8-42f2-b00f-0ac8f8defb25'),
('54c4ddf3-43f4-40dd-a71c-0ac8f8defb25', '54c4dc7b-d300-4893-9d61-0ac8f8defb25', '53141557-020c-4f2f-b628-0d43f8defb25', '54c4c5c0-2ac8-42f2-b00f-0ac8f8defb25'),
('54c4ddf3-78f4-4190-ad9f-0ac8f8defb25', '54c4dc7b-d300-4893-9d61-0ac8f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4a1-30bc-4215-b2a5-0ac8f8defb25'),
('54e16e08-0070-47d0-9701-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-c6c0-4ff3-9c5b-00acf8defb25'),
('54e16e08-022c-40d0-be9f-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-4954-41f2-b819-0bf0f8defb25'),
('54e16e08-022c-47f9-9051-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-4954-41a5-975c-0bf0f8defb25'),
('54e16e08-05a4-441b-b621-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c522-39a8-4c12-bfef-0ac8f8defb25'),
('54e16e08-0f6c-4761-8e0d-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-49bc-48a5-b614-0bf0f8defb25'),
('54e16e08-0f6c-4a81-8553-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-cff4-448d-bdbe-0bf0f8defb25'),
('54e16e08-12e4-4ce7-8afb-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4b8-9730-4089-9aa2-0ac8f8defb25'),
('54e16e08-1af0-429a-ba22-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-3f8c-4929-93a6-00acf8defb25'),
('54e16e08-1cac-406f-b3f3-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-c31c-479d-a6b6-0bf0f8defb25'),
('54e16e08-2830-4172-a1fe-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-9fc4-4743-bf05-00acf8defb25'),
('54e16e08-29ec-4a17-9fe2-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-0f24-4763-b5bf-0bf0f8defb25'),
('54e16e08-2f20-46c7-8018-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '53141557-020c-4f2f-b628-0d43f8defb25', '54c4c5c0-2ac8-42f2-b00f-0ac8f8defb25'),
('54e16e08-35d4-481c-a1c4-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54d6ff93-8924-4b42-b3da-080cf8defb25', '54d6ff93-e5e4-4c1e-9705-080cf8defb25'),
('54e16e08-3790-4d83-98a1-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-8884-43f0-9a0c-0bf0f8defb25'),
('54e16e08-38e8-4241-8f96-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c436-37f4-448b-a7b0-0ac8f8defb25'),
('54e16e08-3c60-41a7-8dd3-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c3f4-8e94-4d9c-880c-0ac8f8defb25'),
('54e16e08-4314-41b5-8bfd-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-95c8-44e6-8120-0d50f8defb25'),
('54e16e08-44d0-422b-8be6-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4180-4f2f-a916-0bf0f8defb25'),
('54e16e08-468c-4415-b27b-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c459-7ac0-41a0-b67f-0ac8f8defb25'),
('54e16e08-468c-44db-b7ae-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c44c-7d08-44df-ab3e-0ac8f8defb25'),
('54e16e08-49a0-4772-b7dd-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c56a-9088-44fe-bedd-0ac8f8defb25'),
('54e16e08-5054-405e-bd01-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-1d6c-4529-86b9-0d50f8defb25'),
('54e16e08-5210-4bcc-9fda-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-c820-4c5b-810d-0bf0f8defb25'),
('54e16e08-53cc-4063-9ba3-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-e388-4054-89af-0bf0f8defb25'),
('54e16e08-53cc-4d8f-a6a6-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-e388-4feb-836b-0bf0f8defb25'),
('54e16e08-56e0-41a2-8f73-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c58d-8878-4a29-8d8f-0ac8f8defb25'),
('54e16e08-5d94-46dc-84f1-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-3850-47d4-8db3-0d50f8defb25'),
('54e16e08-5f50-4953-bdaa-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-3094-4b97-b5f2-0bf0f8defb25'),
('54e16e08-5f50-4a96-835b-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-9cb4-4b30-8f1e-0bf0f8defb25'),
('54e16e08-610c-4833-88ed-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-f0c8-4fe3-b36e-0bf0f8defb25'),
('54e16e08-6484-4b0a-89be-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c363-d214-4b79-a6d6-0ac8f8defb25'),
('54e16e08-6484-4cd1-a76c-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c209-9494-40d7-8a06-0ac8f8defb25'),
('54e16e08-6ad4-4a16-ac78-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-12ec-498f-89ce-0d50f8defb25'),
('54e16e08-6c90-4b99-824e-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-4020-4af1-9c7a-00acf8defb25'),
('54e16e08-6c90-4e71-88f9-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cdc16d-7c28-42f6-8b40-00acf8defb25', '54cdc16d-3450-4586-99ba-00acf8defb25'),
('54e16e08-6e4c-4464-a88e-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-cb60-4572-9fc8-0bf0f8defb25'),
('54e16e08-71c4-471f-8bbb-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c3bb-cf48-4b59-9214-0ac8f8defb25'),
('54e16e08-71c4-4bf7-86f5-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c4f4-3690-40c5-8473-0ac8f8defb25'),
('54e16e08-7814-44b4-9b7b-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-998c-4fb8-8216-0d50f8defb25'),
('54e16e08-79d0-4215-bde9-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-c6c0-4bb8-b196-00acf8defb25'),
('54e16e08-7b8c-47cb-84ef-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-3c14-4d46-be18-0bf0f8defb25'),
('54e16e08-7f04-4851-b514-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c516-1500-4772-a6a9-0ac8f8defb25'),
('54e16e08-7f04-4c54-9f90-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c50b-6da0-46ca-8dfc-0ac8f8defb25'),
('54e16e08-8710-433d-81fe-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-d5bc-46f5-b56e-00acf8defb25'),
('54e16e08-8710-469d-892a-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-31e8-4f63-a755-00acf8defb25'),
('54e16e08-88cc-4b16-822d-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-c2b4-48a8-b48c-0bf0f8defb25'),
('54e16e08-8c44-4529-abdc-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4ad-67b0-4f7b-a179-0ac8f8defb25'),
('54e16e08-8c44-4800-8ae5-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4a1-30bc-4215-b2a5-0ac8f8defb25'),
('54e16e08-960c-4abb-9a6c-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-56fc-4dae-b25b-0bf0f8defb25'),
('54e16e08-9984-4664-8590-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4d0-6e60-4250-9c0e-0ac8f8defb25'),
('54e16e08-9984-48a2-885e-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4c5-58f8-4eea-902c-0ac8f8defb25'),
('54e16e08-a190-426e-beb4-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-3f8c-4c71-8212-00acf8defb25'),
('54e16e08-a34c-43bf-80a4-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-d05c-4636-904d-0bf0f8defb25'),
('54e16e08-a34c-46a9-9af0-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-d05c-4db0-8c25-0bf0f8defb25'),
('54e16e08-af34-428f-b2c4-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-b888-488d-89cb-00acf8defb25'),
('54e16e08-af34-4467-a0ca-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54d6ff93-8924-4b42-b3da-080cf8defb25', '54d6ff93-3784-4107-96a3-080cf8defb25'),
('54e16e08-b08c-4440-bd77-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-0f24-4e63-83dd-0bf0f8defb25'),
('54e16e08-b08c-4b40-97ff-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-1c64-4838-b5c8-0bf0f8defb25'),
('54e16e08-b5c0-44a6-bfa0-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c3db-5a50-48c3-9e9a-0ac8f8defb25'),
('54e16e08-b5c0-487e-b3f7-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c3e8-2034-4562-8d34-0ac8f8defb25'),
('54e16e08-bc74-46d2-8e39-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-1c68-433e-ba90-0d50f8defb25'),
('54e16e08-bc74-4e78-85d7-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-0f28-4109-92f1-0d50f8defb25'),
('54e16e08-be30-450f-b793-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4180-4018-a189-0bf0f8defb25'),
('54e16e08-be30-4ba5-bc61-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-95c4-41c2-8c05-0bf0f8defb25'),
('54e16e08-bf88-4e47-955f-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c441-4d5c-4b02-89ce-0ac8f8defb25'),
('54e16e08-c300-403c-a30b-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c419-20d8-425a-a9e6-0ac8f8defb25'),
('54e16e08-c9b4-427f-bfe0-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-a308-4c54-9574-0d50f8defb25'),
('54e16e08-c9b4-4887-9a0f-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-f2ec-4f40-be51-0d50f8defb25'),
('54e16e08-cb70-4019-b2d9-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4ec0-441f-8e8c-0bf0f8defb25'),
('54e16e08-cb70-4f03-8f58-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4ec0-4f6a-a001-0bf0f8defb25'),
('54e16e08-cd2c-4850-a665-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-6a28-454d-a77d-0bf0f8defb25'),
('54e16e08-d040-4795-891d-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c578-f5fc-4f2d-81a3-0ac8f8defb25'),
('54e16e08-d040-4918-a918-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c582-3944-4342-bf7f-0ac8f8defb25'),
('54e16e08-d6f4-4097-a57d-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-3850-4495-8e60-0d50f8defb25'),
('54e16e08-d6f4-4c1d-9a07-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-2b10-4353-9a8a-0d50f8defb25'),
('54e16e08-d8b0-4784-8172-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-3094-4b92-b5c7-0bf0f8defb25'),
('54e16e08-d8b0-4d3e-941b-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-2354-456a-b8cb-0bf0f8defb25'),
('54e16e08-da6c-47b0-8c58-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-f0c8-46ec-8f8a-0bf0f8defb25'),
('54e16e08-dde4-4a19-bd12-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c596-9608-4f82-b1f6-0ac8f8defb25'),
('54e16e08-e434-4252-8624-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-a40c-4d7b-a269-0d50f8defb25'),
('54e16e08-e5f0-40ca-b6fc-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-a9f4-4220-8e42-0bf0f8defb25'),
('54e16e08-e7ac-40f5-9161-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-5fa4-4076-ad2f-0bf0f8defb25'),
('54e16e08-e7ac-4c6d-8bfe-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-5200-4f36-90db-0bf0f8defb25'),
('54e16e08-eb24-4adb-af9d-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c3a6-dc68-48f6-99fe-0ac8f8defb25'),
('54e16e08-f174-4a86-bbc6-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-202c-44e7-858b-0d50f8defb25'),
('54e16e08-f174-4cf6-9fcc-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-2d6c-41dc-928a-0d50f8defb25'),
('54e16e08-f330-49e4-bce3-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-b980-419c-94a5-00acf8defb25'),
('54e16e08-f4ec-45b2-85fc-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-d904-45d8-9c69-0bf0f8defb25'),
('54e16e08-f4ec-4f6b-a048-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-e644-4c22-b232-0bf0f8defb25'),
('54e16e08-f864-4989-a0e9-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c500-ee4c-4068-9cac-0ac8f8defb25'),
('54e16e08-feb4-4cfe-80c1-0d50f8defb25', '54d9f5f6-49b4-430e-865c-06b4f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-a6cc-46f4-b4a7-0d50f8defb25'),
('58dceb9e-06c0-48e0-abd5-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdc16d-7c28-42f6-8b40-00acf8defb25', '54cdc16d-3450-4586-99ba-00acf8defb25'),
('58dceb9e-0a54-40eb-8672-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-fdf0-4949-8364-0f8cf8defb25'),
('58dceb9e-0a90-4c10-969e-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c3e8-2034-4562-8d34-0ac8f8defb25'),
('58dceb9e-0ab4-4214-8006-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4c5-58f8-4eea-902c-0ac8f8defb25'),
('58dceb9e-0ad0-4691-afe8-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54d6ff93-8924-4b42-b3da-080cf8defb25', '54d6ff93-e5e4-4c1e-9705-080cf8defb25'),
('58dceb9e-0cec-4acb-98b4-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-c820-4c5b-810d-0bf0f8defb25'),
('58dceb9e-0d68-44fc-8ef8-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-cbf8-490a-8cc2-0f8cf8defb25'),
('58dceb9e-0db8-40a3-a3c9-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-cff4-448d-bdbe-0bf0f8defb25'),
('58dceb9e-12ec-4245-bfe9-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4ec0-4f6a-a001-0bf0f8defb25'),
('58dceb9e-178c-42f5-86c1-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-3c14-4d46-be18-0bf0f8defb25'),
('58dceb9e-17d8-4724-a626-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58dceb8e-4838-4889-88cd-143cf8defb25', '58dceb8e-a098-46bb-b652-143cf8defb25'),
('58dceb9e-1810-44b5-b74b-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c578-f5fc-4f2d-81a3-0ac8f8defb25'),
('58dceb9e-1c0c-474d-99a8-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141557-020c-4f2f-b628-0d43f8defb25', '54c4c5c0-2ac8-42f2-b00f-0ac8f8defb25'),
('58dceb9e-1c4c-4236-83f9-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5652e0e4-7968-463e-8b2d-0f84f8defb25'),
('58dceb9e-21b4-4ccd-af29-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-a40c-4d7b-a269-0d50f8defb25'),
('58dceb9e-2368-4a12-82d2-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-a9f4-4220-8e42-0bf0f8defb25'),
('58dceb9e-25f8-43bb-9f26-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58c3b0f1-3d5c-4907-aa49-672cf8defb25', '58c3b0f1-f638-4798-8c87-672cf8defb25'),
('58dceb9e-2818-4e07-8a75-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-cb00-4990-8693-0f8cf8defb25'),
('58dceb9e-2aa0-4ee4-8541-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-3f8c-4929-93a6-00acf8defb25'),
('58dceb9e-2b6c-4907-a5de-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5652e0e4-0008-415e-95b7-0f84f8defb25'),
('58dceb9e-2c8c-4fce-a507-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54d6ff93-8924-4b42-b3da-080cf8defb25', '54d6ff93-3784-4107-96a3-080cf8defb25'),
('58dceb9e-2fb4-46c8-9a21-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-35b8-4521-a0e2-02b4f8defb25'),
('58dceb9e-30a8-4508-a54c-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58c3b0f1-3d5c-4907-aa49-672cf8defb25', '58c3b0f1-dac4-435d-924b-672cf8defb25'),
('58dceb9e-32b8-484e-9402-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-d5bc-46f5-b56e-00acf8defb25'),
('58dceb9e-33d4-4b6e-8677-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-d05c-4db0-8c25-0bf0f8defb25'),
('58dceb9e-356c-40ee-9efd-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4b8-9730-4089-9aa2-0ac8f8defb25'),
('58dceb9e-3638-4931-b62f-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4ec0-441f-8e8c-0bf0f8defb25'),
('58dceb9e-379c-4724-a352-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c363-d214-4b79-a6d6-0ac8f8defb25'),
('58dceb9e-3874-410d-9c9a-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-8490-46d1-a271-0f8cf8defb25'),
('58dceb9e-3958-429e-bdae-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5652e0e4-0008-4171-95cf-0f84f8defb25'),
('58dceb9e-3ba4-456e-bf71-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-5fd8-4c6c-8bd0-0f8cf8defb25'),
('58dceb9e-3fd4-471c-90ab-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58dceb8e-4838-4889-88cd-143cf8defb25', '58dceb8e-7a98-47d9-93e8-143cf8defb25'),
('58dceb9e-425c-4092-a30b-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-f2ec-4f40-be51-0d50f8defb25'),
('58dceb9e-4438-4804-96fa-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-3850-47d4-8db3-0d50f8defb25'),
('58dceb9e-4584-4848-91f9-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c56a-9088-44fe-bedd-0ac8f8defb25'),
('58dceb9e-4680-4bb6-a65f-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4a1-30bc-4215-b2a5-0ac8f8defb25'),
('58dceb9e-491c-4818-aaff-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4180-4f2f-a916-0bf0f8defb25'),
('58dceb9e-4a38-46ac-8139-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-9cb4-4b30-8f1e-0bf0f8defb25'),
('58dceb9e-52dc-4bb6-9c17-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4ad-67b0-4f7b-a179-0ac8f8defb25'),
('58dceb9e-54f8-4b11-8f34-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4180-4018-a189-0bf0f8defb25'),
('58dceb9e-5a6c-4024-ae81-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-31e8-4f63-a755-00acf8defb25'),
('58dceb9e-5ac0-40b9-9836-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c44c-7d08-44df-ab3e-0ac8f8defb25'),
('58dceb9e-5b68-461d-a99e-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-bd5c-42c1-8334-0f8cf8defb25'),
('58dceb9e-5fac-4af4-a816-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-4954-41a5-975c-0bf0f8defb25'),
('58dceb9e-6218-4524-be55-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58dceb8e-4838-4889-88cd-143cf8defb25', '58dceb8e-39b8-480b-9f94-143cf8defb25'),
('58dceb9e-6248-4660-be66-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-8884-43f0-9a0c-0bf0f8defb25'),
('58dceb9e-629c-4ce8-8a40-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54e435cb-c2b4-413b-81f6-0288f8defb25'),
('58dceb9e-6898-47e6-bc26-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58dceb8e-4838-4889-88cd-143cf8defb25', '58dceb8e-62a0-4896-b502-143cf8defb25'),
('58dceb9e-6a44-48ca-a1f5-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-4558-4692-882e-0f8cf8defb25'),
('58dceb9e-6ad4-465b-8134-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-0fb4-408a-b6f2-02b4f8defb25'),
('58dceb9e-6b70-44a2-8ce4-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-d05c-4636-904d-0bf0f8defb25'),
('58dceb9e-6bf8-4bf7-b9a6-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-b888-488d-89cb-00acf8defb25'),
('58dceb9e-6c34-4906-8f1c-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-3850-4495-8e60-0d50f8defb25'),
('58dceb9e-6cf4-410c-888f-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58c3b0f1-3d5c-4907-aa49-672cf8defb25', '58c3b0f1-b5e8-4e85-9bf0-672cf8defb25'),
('58dceb9e-6d74-406f-ba03-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-c6c0-4ff3-9c5b-00acf8defb25'),
('58dceb9e-6fe4-45d5-9919-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-5200-4f36-90db-0bf0f8defb25'),
('58dceb9e-70f8-4ab3-94d3-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-998c-4fb8-8216-0d50f8defb25'),
('58dceb9e-7424-4d70-b455-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c419-20d8-425a-a9e6-0ac8f8defb25'),
('58dceb9e-7554-4c36-bf71-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-3094-4b97-b5f2-0bf0f8defb25'),
('58dceb9e-7a04-45f6-9a7d-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-d904-45d8-9c69-0bf0f8defb25'),
('58dceb9e-7c34-431a-a7c2-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c459-7ac0-41a0-b67f-0ac8f8defb25'),
('58dceb9e-7da0-4736-ae45-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-6a28-454d-a77d-0bf0f8defb25'),
('58dceb9e-8010-4659-80a4-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c522-39a8-4c12-bfef-0ac8f8defb25'),
('58dceb9e-84b0-4fad-a5cc-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c3f4-8e94-4d9c-880c-0ac8f8defb25'),
('58dceb9e-8514-4cee-8603-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c441-4d5c-4b02-89ce-0ac8f8defb25'),
('58dceb9e-887c-40ec-b0aa-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-c31c-479d-a6b6-0bf0f8defb25'),
('58dceb9e-8b70-4a6a-9368-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-1c64-4838-b5c8-0bf0f8defb25'),
('58dceb9e-8e78-4258-be51-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-cb60-4572-9fc8-0bf0f8defb25'),
('58dceb9e-8f1c-448a-9676-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-4460-4879-959b-0f8cf8defb25'),
('58dceb9e-9294-4153-8dc9-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-95c4-41c2-8c05-0bf0f8defb25'),
('58dceb9e-92a0-434c-80b7-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-2b10-4353-9a8a-0d50f8defb25'),
('58dceb9e-9528-4139-ac22-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-a6cc-46f4-b4a7-0d50f8defb25'),
('58dceb9e-9700-4f4f-bbf7-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-c6c0-4bb8-b196-00acf8defb25'),
('58dceb9e-9890-487d-a991-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-2d6c-41dc-928a-0d50f8defb25'),
('58dceb9e-9904-41e9-bd6f-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-3094-4b92-b5c7-0bf0f8defb25'),
('58dceb9e-9930-4518-a2bd-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-f0c8-4fe3-b36e-0bf0f8defb25'),
('58dceb9e-9d94-4c7a-8a54-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-bc58-4b97-a9e7-02b4f8defb25'),
('58dceb9e-9fac-48e9-ba06-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-56fc-4dae-b25b-0bf0f8defb25'),
('58dceb9e-a05c-4285-bd35-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c58d-8878-4a29-8d8f-0ac8f8defb25'),
('58dceb9e-a0c4-4f1c-803a-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-4954-41f2-b819-0bf0f8defb25'),
('58dceb9e-a200-4db2-8551-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-4460-46dd-b102-0f8cf8defb25'),
('58dceb9e-a2bc-43a5-87e8-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-a308-4c54-9574-0d50f8defb25'),
('58dceb9e-a348-418a-8c9c-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c3a6-dc68-48f6-99fe-0ac8f8defb25'),
('58dceb9e-a360-43dd-b9a1-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-7750-438c-80a6-0f8cf8defb25'),
('58dceb9e-a3c0-4989-b58d-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c516-1500-4772-a6a9-0ac8f8defb25'),
('58dceb9e-a79c-4cdb-bab9-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-5fa4-4076-ad2f-0bf0f8defb25'),
('58dceb9e-a878-4a29-b0db-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c4f4-3690-40c5-8473-0ac8f8defb25'),
('58dceb9e-aa08-465f-9a32-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58c3b0f1-3d5c-4907-aa49-672cf8defb25', '58c3b0f1-5930-4337-bc46-672cf8defb25'),
('58dceb9e-ab70-4650-bd82-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c582-3944-4342-bf7f-0ac8f8defb25'),
('58dceb9e-ae3c-47eb-b4a7-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c436-37f4-448b-a7b0-0ac8f8defb25'),
('58dceb9e-b088-4e9b-af33-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c500-ee4c-4068-9cac-0ac8f8defb25'),
('58dceb9e-b13c-4af5-835b-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-1d6c-4529-86b9-0d50f8defb25'),
('58dceb9e-b3fc-4b29-b799-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-9fc4-4743-bf05-00acf8defb25'),
('58dceb9e-b4b0-48c6-ba16-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c50b-6da0-46ca-8dfc-0ac8f8defb25'),
('58dceb9e-b754-401d-8941-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-1c68-433e-ba90-0d50f8defb25'),
('58dceb9e-b8c0-46a1-acc5-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-95c8-44e6-8120-0d50f8defb25'),
('58dceb9e-bec0-45c4-9be7-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-0f24-4e63-83dd-0bf0f8defb25'),
('58dceb9e-bed4-4d45-882d-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-f0c8-46ec-8f8a-0bf0f8defb25'),
('58dceb9e-c288-463b-80ca-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-e644-4c22-b232-0bf0f8defb25'),
('58dceb9e-c2c8-4550-813a-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c3bb-cf48-4b59-9214-0ac8f8defb25'),
('58dceb9e-c3ac-4589-87e8-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-202c-44e7-858b-0d50f8defb25'),
('58dceb9e-c944-4373-a8cc-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-e388-4054-89af-0bf0f8defb25'),
('58dceb9e-ca94-4261-a80e-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-0b30-46dd-8367-0f8cf8defb25'),
('58dceb9e-cb30-43d6-bcb5-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c596-9608-4f82-b1f6-0ac8f8defb25'),
('58dceb9e-cc98-42e3-8d29-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-51f4-4096-a18d-02b4f8defb25'),
('58dceb9e-cf74-418b-9d75-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c209-9494-40d7-8a06-0ac8f8defb25'),
('58dceb9e-d4dc-4bed-8faf-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-b980-419c-94a5-00acf8defb25'),
('58dceb9e-d550-4423-b3fc-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-2354-456a-b8cb-0bf0f8defb25'),
('58dceb9e-d744-4cd8-b334-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5653fdc0-b2e8-47c1-a432-02b4f8defb25'),
('58dceb9e-da50-412e-93d3-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-e388-4feb-836b-0bf0f8defb25'),
('58dceb9e-dae8-4c64-8f59-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4d0-6e60-4250-9c0e-0ac8f8defb25'),
('58dceb9e-ddec-4b26-a65b-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-49bc-48a5-b614-0bf0f8defb25'),
('58dceb9e-defc-4487-9f57-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58dceb8e-4838-4889-88cd-143cf8defb25', '58dceb8e-06b0-409e-8d63-143cf8defb25'),
('58dceb9e-e5dc-4977-a146-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-36bc-492d-be47-0f8cf8defb25'),
('58dceb9e-e924-4810-8fc7-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-c2b4-48a8-b48c-0bf0f8defb25'),
('58dceb9e-e974-4bda-8786-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '58c3b0f1-3d5c-4907-aa49-672cf8defb25', '58c3b0f1-30f8-497e-8232-672cf8defb25'),
('58dceb9e-e9dc-49f1-9108-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-0f28-4109-92f1-0d50f8defb25'),
('58dceb9e-ec50-478b-8c43-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-e834-4529-a8f0-0f8cf8defb25'),
('58dceb9e-f110-4def-a2c8-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-3f8c-4c71-8212-00acf8defb25'),
('58dceb9e-f274-4c70-9a90-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-0f24-4763-b5bf-0bf0f8defb25'),
('58dceb9e-f378-4e69-bf8e-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-12ec-498f-89ce-0d50f8defb25'),
('58dceb9e-f49c-46c7-b4ad-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c3db-5a50-48c3-9e9a-0ac8f8defb25'),
('58dceb9e-f9c8-47cd-bdab-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5652e0e4-b1e0-40df-a69c-0f84f8defb25'),
('58dceb9e-fae4-436f-a302-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-4020-4af1-9c7a-00acf8defb25'),
('58dceb9e-fcc8-4f00-839a-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-35b8-4ee3-8d32-02b4f8defb25'),
('58dceb9e-ffec-460e-b3dc-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-fdf0-467d-b0ee-0f8cf8defb25'),
('58dceb9e-fffc-4c9d-970f-143cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-e678-4c7f-b41d-0f8cf8defb25');

-- --------------------------------------------------------

--
-- Table structure for table `ns_photos`
--

CREATE TABLE IF NOT EXISTS `ns_photos` (
  `id` varchar(36) NOT NULL,
  `photo_gallery_id` varchar(36) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ns_photos`
--

INSERT INTO `ns_photos` (`id`, `photo_gallery_id`, `image`, `caption`, `created`, `status`) VALUES
('567b8f9b-67ac-40fd-9072-0c14f8defb25', '567b768d-d160-4376-bed1-0c14f8defb25', '/img/frontend/album_photo/thumb/Photo_image_151224122427.jpg', 'first', '2015-12-24 12:24:27', 'active'),
('567b8fb0-0768-4cc6-9978-0c14f8defb25', '567b768d-d160-4376-bed1-0c14f8defb25', '/img/frontend/album_photo/thumb/Photo_image_151224122448.jpg', 'second', '2015-12-24 12:24:48', 'active'),
('5690c655-6638-43ac-b7d1-0e68f8defb25', '56790f8d-fe50-4711-b626-0e38f8defb25', '/img/frontend/album_photo/thumb/Photo_image_160109023533.jpg', 'aa', '2016-01-09 14:35:33', 'active'),
('56c55ae7-f73c-4e60-88c6-0288f8defb25', '567b7678-eb48-4174-8b71-0c14f8defb25', '/img/frontend/album_photo/thumb/Photo_image_160218114719.jpg', 'q', '2016-02-18 11:47:19', 'active'),
('585e6f3d-3068-4ae1-bcc8-0e70f8defb25', '567b6ca9-b728-4b99-b2d2-0c14f8defb25', '/img/frontend/album_photo/thumb/Photo_image_161224065109.jpg', 'aa', '2016-12-24 18:51:09', 'active'),
('585e6f47-9dbc-466a-af89-0e70f8defb25', '567b6ca9-b728-4b99-b2d2-0c14f8defb25', '/img/frontend/album_photo/thumb/Photo_image_161224065749.jpg', 'asd', '2016-12-24 18:51:19', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ns_photo_galleries`
--

CREATE TABLE IF NOT EXISTS `ns_photo_galleries` (
  `id` char(36) NOT NULL,
  `department_id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ns_position_applies`
--

CREATE TABLE IF NOT EXISTS `ns_position_applies` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_position_applies`
--

INSERT INTO `ns_position_applies` (`id`, `title`, `status`, `created`, `modified`) VALUES
(1, 'Officer', 'active', '2016-03-07 12:05:27', '2016-03-07 12:06:54'),
(2, 'Manager', 'active', '2016-03-07 12:06:37', '2016-03-07 12:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `ns_processes`
--

CREATE TABLE IF NOT EXISTS `ns_processes` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dominion_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_processes`
--

INSERT INTO `ns_processes` (`id`, `name`, `dominion_id`) VALUES
('54c4c209-9494-40d7-8a06-0ac8f8defb25', 'admin_index', '5316b4f6-80c4-4e4b-be27-0936f8defb25'),
('54c4c363-d214-4b79-a6d6-0ac8f8defb25', 'admin_add', '5316b4f6-80c4-4e4b-be27-0936f8defb25'),
('54c4c3a6-dc68-48f6-99fe-0ac8f8defb25', 'admin_edit', '5316b4f6-80c4-4e4b-be27-0936f8defb25'),
('54c4c3bb-cf48-4b59-9214-0ac8f8defb25', 'admin_delete', '5316b4f6-80c4-4e4b-be27-0936f8defb25'),
('54c4c3db-5a50-48c3-9e9a-0ac8f8defb25', 'admin_add', '53141565-e924-4ee7-b6ba-0939f8defb25'),
('54c4c3e8-2034-4562-8d34-0ac8f8defb25', 'admin_index', '53141565-e924-4ee7-b6ba-0939f8defb25'),
('54c4c3f4-8e94-4d9c-880c-0ac8f8defb25', 'admin_edit', '53141565-e924-4ee7-b6ba-0939f8defb25'),
('54c4c419-20d8-425a-a9e6-0ac8f8defb25', 'admin_delete', '53141565-e924-4ee7-b6ba-0939f8defb25'),
('54c4c436-37f4-448b-a7b0-0ac8f8defb25', 'admin_index', '5492b8c5-291c-452d-bc3a-0544f8defb25'),
('54c4c441-4d5c-4b02-89ce-0ac8f8defb25', 'admin_add', '5492b8c5-291c-452d-bc3a-0544f8defb25'),
('54c4c44c-7d08-44df-ab3e-0ac8f8defb25', 'admin_edit', '5492b8c5-291c-452d-bc3a-0544f8defb25'),
('54c4c459-7ac0-41a0-b67f-0ac8f8defb25', 'admin_delete', '5492b8c5-291c-452d-bc3a-0544f8defb25'),
('54c4c4a1-30bc-4215-b2a5-0ac8f8defb25', 'admin_index', '5316e4a7-965c-4213-9cab-3e22f8defb25'),
('54c4c4ad-67b0-4f7b-a179-0ac8f8defb25', 'admin_add', '5316e4a7-965c-4213-9cab-3e22f8defb25'),
('54c4c4b8-9730-4089-9aa2-0ac8f8defb25', 'admin_edit', '5316e4a7-965c-4213-9cab-3e22f8defb25'),
('54c4c4c5-58f8-4eea-902c-0ac8f8defb25', 'admin_delete', '5316e4a7-965c-4213-9cab-3e22f8defb25'),
('54c4c4d0-6e60-4250-9c0e-0ac8f8defb25', 'admin_view', '5316e4a7-965c-4213-9cab-3e22f8defb25'),
('54c4c4f4-3690-40c5-8473-0ac8f8defb25', 'admin_index', '5316e2f3-ac88-4b7c-923c-3e23f8defb25'),
('54c4c500-ee4c-4068-9cac-0ac8f8defb25', 'admin_add', '5316e2f3-ac88-4b7c-923c-3e23f8defb25'),
('54c4c50b-6da0-46ca-8dfc-0ac8f8defb25', 'admin_edit', '5316e2f3-ac88-4b7c-923c-3e23f8defb25'),
('54c4c516-1500-4772-a6a9-0ac8f8defb25', 'admin_delete', '5316e2f3-ac88-4b7c-923c-3e23f8defb25'),
('54c4c522-39a8-4c12-bfef-0ac8f8defb25', 'admin_view', '5316e2f3-ac88-4b7c-923c-3e23f8defb25'),
('54c4c56a-9088-44fe-bedd-0ac8f8defb25', 'admin_index', '531415ff-0e3c-42d9-b5e2-0d43f8defb25'),
('54c4c578-f5fc-4f2d-81a3-0ac8f8defb25', 'admin_add', '531415ff-0e3c-42d9-b5e2-0d43f8defb25'),
('54c4c582-3944-4342-bf7f-0ac8f8defb25', 'admin_edit', '531415ff-0e3c-42d9-b5e2-0d43f8defb25'),
('54c4c58d-8878-4a29-8d8f-0ac8f8defb25', 'admin_delete', '531415ff-0e3c-42d9-b5e2-0d43f8defb25'),
('54c4c596-9608-4f82-b1f6-0ac8f8defb25', 'admin_view', '531415ff-0e3c-42d9-b5e2-0d43f8defb25'),
('54c4c5c0-2ac8-42f2-b00f-0ac8f8defb25', 'admin_index', '53141557-020c-4f2f-b628-0d43f8defb25'),
('54cca713-6a28-454d-a77d-0bf0f8defb25', 'admin_edit', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25'),
('54cca713-e388-4054-89af-0bf0f8defb25', 'admin_add', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25'),
('54cca713-e388-4feb-836b-0bf0f8defb25', 'admin_index', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25'),
('54cca713-f0c8-46ec-8f8a-0bf0f8defb25', 'admin_view', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25'),
('54cca713-f0c8-4fe3-b36e-0bf0f8defb25', 'admin_delete', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25'),
('54cca742-5200-4f36-90db-0bf0f8defb25', 'admin_add', '54cca742-705c-4bfe-a0b5-0bf0f8defb25'),
('54cca742-5fa4-4076-ad2f-0bf0f8defb25', 'admin_view', '54cca742-705c-4bfe-a0b5-0bf0f8defb25'),
('54cca742-cb60-4572-9fc8-0bf0f8defb25', 'admin_index', '54cca742-705c-4bfe-a0b5-0bf0f8defb25'),
('54cca742-d904-45d8-9c69-0bf0f8defb25', 'admin_edit', '54cca742-705c-4bfe-a0b5-0bf0f8defb25'),
('54cca742-e644-4c22-b232-0bf0f8defb25', 'admin_delete', '54cca742-705c-4bfe-a0b5-0bf0f8defb25'),
('54cca756-3c14-4d46-be18-0bf0f8defb25', 'admin_index', '54cca756-6590-4af5-8154-0bf0f8defb25'),
('54cca756-4954-41a5-975c-0bf0f8defb25', 'admin_edit', '54cca756-6590-4af5-8154-0bf0f8defb25'),
('54cca756-4954-41f2-b819-0bf0f8defb25', 'admin_view', '54cca756-6590-4af5-8154-0bf0f8defb25'),
('54cca756-c2b4-48a8-b48c-0bf0f8defb25', 'admin_add', '54cca756-6590-4af5-8154-0bf0f8defb25'),
('54cca756-cff4-448d-bdbe-0bf0f8defb25', 'admin_delete', '54cca756-6590-4af5-8154-0bf0f8defb25'),
('54cca7cd-49bc-48a5-b614-0bf0f8defb25', 'admin_add', '54cca7cd-7338-4689-8582-0bf0f8defb25'),
('54cca7cd-56fc-4dae-b25b-0bf0f8defb25', 'admin_delete', '54cca7cd-7338-4689-8582-0bf0f8defb25'),
('54cca7cd-c31c-479d-a6b6-0bf0f8defb25', 'admin_index', '54cca7cd-7338-4689-8582-0bf0f8defb25'),
('54cca7cd-d05c-4636-904d-0bf0f8defb25', 'admin_view', '54cca7cd-7338-4689-8582-0bf0f8defb25'),
('54cca7cd-d05c-4db0-8c25-0bf0f8defb25', 'admin_edit', '54cca7cd-7338-4689-8582-0bf0f8defb25'),
('54cca7dd-0f24-4763-b5bf-0bf0f8defb25', 'admin_edit', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25'),
('54cca7dd-0f24-4e63-83dd-0bf0f8defb25', 'admin_add', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25'),
('54cca7dd-1c64-4838-b5c8-0bf0f8defb25', 'admin_delete', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25'),
('54cca7dd-8884-43f0-9a0c-0bf0f8defb25', 'admin_index', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25'),
('54cca7dd-95c4-41c2-8c05-0bf0f8defb25', 'admin_view', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25'),
('54cca7f5-4180-4018-a189-0bf0f8defb25', 'admin_add', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25'),
('54cca7f5-4180-4f2f-a916-0bf0f8defb25', 'admin_index', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25'),
('54cca7f5-4ec0-441f-8e8c-0bf0f8defb25', 'admin_view', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25'),
('54cca7f5-4ec0-4f6a-a001-0bf0f8defb25', 'admin_delete', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25'),
('54cca7f5-c820-4c5b-810d-0bf0f8defb25', 'admin_edit', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25'),
('54cca80d-2354-456a-b8cb-0bf0f8defb25', 'admin_add', '54cca80d-764c-4264-a157-0bf0f8defb25'),
('54cca80d-3094-4b92-b5c7-0bf0f8defb25', 'admin_delete', '54cca80d-764c-4264-a157-0bf0f8defb25'),
('54cca80d-3094-4b97-b5f2-0bf0f8defb25', 'admin_view', '54cca80d-764c-4264-a157-0bf0f8defb25'),
('54cca80d-9cb4-4b30-8f1e-0bf0f8defb25', 'admin_index', '54cca80d-764c-4264-a157-0bf0f8defb25'),
('54cca80d-a9f4-4220-8e42-0bf0f8defb25', 'admin_edit', '54cca80d-764c-4264-a157-0bf0f8defb25'),
('54cdc16d-3450-4586-99ba-00acf8defb25', 'admin_index', '54cdc16d-7c28-42f6-8b40-00acf8defb25'),
('54cdd079-4020-4af1-9c7a-00acf8defb25', 'admin_edit', '54cdd079-ff38-45e0-8097-00acf8defb25'),
('54cdd079-b980-419c-94a5-00acf8defb25', 'admin_add', '54cdd079-ff38-45e0-8097-00acf8defb25'),
('54cdd079-c6c0-4bb8-b196-00acf8defb25', 'admin_delete', '54cdd079-ff38-45e0-8097-00acf8defb25'),
('54cdd079-c6c0-4ff3-9c5b-00acf8defb25', 'admin_view', '54cdd079-ff38-45e0-8097-00acf8defb25'),
('54cdd079-d5bc-46f5-b56e-00acf8defb25', 'admin_index', '54cdd079-ff38-45e0-8097-00acf8defb25'),
('54cde048-31e8-4f63-a755-00acf8defb25', 'admin_add', '54cde048-d1ec-4511-a442-00acf8defb25'),
('54cde048-3f8c-4929-93a6-00acf8defb25', 'admin_delete', '54cde048-d1ec-4511-a442-00acf8defb25'),
('54cde048-3f8c-4c71-8212-00acf8defb25', 'admin_view', '54cde048-d1ec-4511-a442-00acf8defb25'),
('54cde048-9fc4-4743-bf05-00acf8defb25', 'admin_index', '54cde048-d1ec-4511-a442-00acf8defb25'),
('54cde048-b888-488d-89cb-00acf8defb25', 'admin_edit', '54cde048-d1ec-4511-a442-00acf8defb25'),
('54d6ff93-3784-4107-96a3-080cf8defb25', 'admin_edit', '54d6ff93-8924-4b42-b3da-080cf8defb25'),
('54d6ff93-e5e4-4c1e-9705-080cf8defb25', 'admin_view', '54d6ff93-8924-4b42-b3da-080cf8defb25'),
('54e16d3d-0f28-4109-92f1-0d50f8defb25', 'admin_index', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('54e16d3d-1c68-433e-ba90-0d50f8defb25', 'admin_edit', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('54e16d3d-95c8-44e6-8120-0d50f8defb25', 'admin_add', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('54e16d3d-a308-4c54-9574-0d50f8defb25', 'admin_delete', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('54e16d3d-f2ec-4f40-be51-0d50f8defb25', 'admin_view', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('54e16d66-1d6c-4529-86b9-0d50f8defb25', 'admin_index', '54e16d66-96cc-4569-b875-0d50f8defb25'),
('54e16d66-2b10-4353-9a8a-0d50f8defb25', 'admin_edit', '54e16d66-96cc-4569-b875-0d50f8defb25'),
('54e16d66-3850-4495-8e60-0d50f8defb25', 'admin_view', '54e16d66-96cc-4569-b875-0d50f8defb25'),
('54e16d66-3850-47d4-8db3-0d50f8defb25', 'admin_delete', '54e16d66-96cc-4569-b875-0d50f8defb25'),
('54e16d66-a40c-4d7b-a269-0d50f8defb25', 'admin_add', '54e16d66-96cc-4569-b875-0d50f8defb25'),
('54e16d93-12ec-498f-89ce-0d50f8defb25', 'admin_index', '54e16d93-c308-4d17-b666-0d50f8defb25'),
('54e16d93-202c-44e7-858b-0d50f8defb25', 'admin_edit', '54e16d93-c308-4d17-b666-0d50f8defb25'),
('54e16d93-2d6c-41dc-928a-0d50f8defb25', 'admin_view', '54e16d93-c308-4d17-b666-0d50f8defb25'),
('54e16d93-998c-4fb8-8216-0d50f8defb25', 'admin_add', '54e16d93-c308-4d17-b666-0d50f8defb25'),
('54e16d93-a6cc-46f4-b4a7-0d50f8defb25', 'admin_delete', '54e16d93-c308-4d17-b666-0d50f8defb25'),
('54e435cb-c2b4-413b-81f6-0288f8defb25', 'admin_change_password', '531415ff-0e3c-42d9-b5e2-0d43f8defb25'),
('5652e0e4-0008-415e-95b7-0f84f8defb25', 'admin_admission_view', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('5652e0e4-0008-4171-95cf-0f84f8defb25', 'admin_admission_delete', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('5652e0e4-7968-463e-8b2d-0f84f8defb25', 'admin_admission_edit', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('5652e0e4-b1e0-40df-a69c-0f84f8defb25', 'admin_admission_add', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('5653fdc0-b2e8-47c1-a432-02b4f8defb25', 'admin_admission_index', '54e16d3d-6064-4b95-8a39-0d50f8defb25'),
('56542433-0fb4-408a-b6f2-02b4f8defb25', 'admin_index', '56542433-b44c-47a6-8701-02b4f8defb25'),
('56542433-35b8-4521-a0e2-02b4f8defb25', 'admin_add', '56542433-b44c-47a6-8701-02b4f8defb25'),
('56542433-35b8-4ee3-8d32-02b4f8defb25', 'admin_edit', '56542433-b44c-47a6-8701-02b4f8defb25'),
('56542433-51f4-4096-a18d-02b4f8defb25', 'admin_view', '56542433-b44c-47a6-8701-02b4f8defb25'),
('56542433-bc58-4b97-a9e7-02b4f8defb25', 'admin_delete', '56542433-b44c-47a6-8701-02b4f8defb25'),
('56cec903-4558-4692-882e-0f8cf8defb25', 'admin_view', '56cec903-c010-41f6-b8db-0f8cf8defb25'),
('56cec903-5fd8-4c6c-8bd0-0f8cf8defb25', 'admin_edit', '56cec903-c010-41f6-b8db-0f8cf8defb25'),
('56cec903-cbf8-490a-8cc2-0f8cf8defb25', 'admin_add', '56cec903-c010-41f6-b8db-0f8cf8defb25'),
('56cec903-e678-4c7f-b41d-0f8cf8defb25', 'admin_delete', '56cec903-c010-41f6-b8db-0f8cf8defb25'),
('56cec903-e834-4529-a8f0-0f8cf8defb25', 'admin_index', '56cec903-c010-41f6-b8db-0f8cf8defb25'),
('56cec915-0b30-46dd-8367-0f8cf8defb25', 'admin_delete', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25'),
('56cec915-7750-438c-80a6-0f8cf8defb25', 'admin_index', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25'),
('56cec915-8490-46d1-a271-0f8cf8defb25', 'admin_edit', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25'),
('56cec915-fdf0-467d-b0ee-0f8cf8defb25', 'admin_view', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25'),
('56cec915-fdf0-4949-8364-0f8cf8defb25', 'admin_add', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25'),
('56cec922-36bc-492d-be47-0f8cf8defb25', 'admin_index', '56cec922-b01c-4e05-af92-0f8cf8defb25'),
('56cec922-4460-46dd-b102-0f8cf8defb25', 'admin_add', '56cec922-b01c-4e05-af92-0f8cf8defb25'),
('56cec922-4460-4879-959b-0f8cf8defb25', 'admin_edit', '56cec922-b01c-4e05-af92-0f8cf8defb25'),
('56cec922-bd5c-42c1-8334-0f8cf8defb25', 'admin_view', '56cec922-b01c-4e05-af92-0f8cf8defb25'),
('56cec922-cb00-4990-8693-0f8cf8defb25', 'admin_delete', '56cec922-b01c-4e05-af92-0f8cf8defb25'),
('58c3b0f1-30f8-497e-8232-672cf8defb25', 'admin_index', '58c3b0f1-3d5c-4907-aa49-672cf8defb25'),
('58c3b0f1-5930-4337-bc46-672cf8defb25', 'admin_view', '58c3b0f1-3d5c-4907-aa49-672cf8defb25'),
('58c3b0f1-b5e8-4e85-9bf0-672cf8defb25', 'admin_edit', '58c3b0f1-3d5c-4907-aa49-672cf8defb25'),
('58c3b0f1-dac4-435d-924b-672cf8defb25', 'admin_add', '58c3b0f1-3d5c-4907-aa49-672cf8defb25'),
('58c3b0f1-f638-4798-8c87-672cf8defb25', 'admin_delete', '58c3b0f1-3d5c-4907-aa49-672cf8defb25'),
('58dceb8e-06b0-409e-8d63-143cf8defb25', 'admin_edit', '58dceb8e-4838-4889-88cd-143cf8defb25'),
('58dceb8e-39b8-480b-9f94-143cf8defb25', 'admin_delete', '58dceb8e-4838-4889-88cd-143cf8defb25'),
('58dceb8e-62a0-4896-b502-143cf8defb25', 'admin_add', '58dceb8e-4838-4889-88cd-143cf8defb25'),
('58dceb8e-7a98-47d9-93e8-143cf8defb25', 'admin_index', '58dceb8e-4838-4889-88cd-143cf8defb25'),
('58dceb8e-a098-46bb-b652-143cf8defb25', 'admin_view', '58dceb8e-4838-4889-88cd-143cf8defb25');

-- --------------------------------------------------------

--
-- Table structure for table `ns_products`
--

CREATE TABLE IF NOT EXISTS `ns_products` (
`id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `features` text,
  `title` varchar(100) NOT NULL,
  `description` text,
  `order` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_products`
--

INSERT INTO `ns_products` (`id`, `image`, `category_id`, `slug`, `features`, `title`, `description`, `order`, `status`, `created`, `modified`) VALUES
(7, '/img/frontend/product/thumb/Product_image_170401012555.jpg', 607, 'industrial-engine-oil-2', NULL, 'Industrial Engine Oil ', '<p>&nbsp;</p>\r\n\r\n<p><strong>Pack Size:</strong> 4 Liter, 20 Liter &amp; 205 Liter</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Carton Size:</strong> 6X4 Liter, 1X20 Liter, 1X205 Liter</p>\r\n', 2, 'active', '2017-04-01 12:56:23', '2017-04-01 15:01:16'),
(8, '/img/frontend/product/thumb/Product_image_170401012717.jpg', 4, 'bopil-motor-engine-oil', NULL, 'BOPIL Motor Engine Oil ', '<div class="col-md-9 col-sm-6 col-xs-12 wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">\r\n<h5>&nbsp;</h5>\r\n\r\n<p>To be used for all types of Motor engines, i.e. motor driven all type of vehicles.</p>\r\n&nbsp;\r\n\r\n<p><strong>Pack Size:</strong> 5 Liter, 20 Liter &amp; 205 Liter</p>\r\n&nbsp;\r\n\r\n<p><strong>Carton Size:</strong> 6X5Liter, 1X20 Liter, 1X205 Liter</p>\r\n</div>\r\n', 2, 'active', '2017-04-01 13:27:17', '2017-04-01 13:27:17'),
(9, '/img/frontend/product/thumb/Product_image_170401012944.jpg', 4, 'bopil-4-stroke-engine-oil', NULL, 'BOPIL 4-Stroke Engine Oil ', '<div class="col-md-9 col-sm-6 col-xs-12 wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">\r\n<h5>&nbsp;</h5>\r\n\r\n<p>To be used for all types of 4-stroke Engine Oil.</p>\r\n&nbsp;\r\n\r\n<p><strong>Pack Size:</strong> 600ml and 1 Liter</p>\r\n&nbsp;\r\n\r\n<p><strong>Carton Size:</strong> 12X600ml and 12X1Liter</p>\r\n</div>\r\n', 3, 'active', '2017-04-01 13:29:44', '2017-04-01 13:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `ns_product_images`
--

CREATE TABLE IF NOT EXISTS `ns_product_images` (
  `id` char(36) NOT NULL,
  `position` varchar(20) DEFAULT NULL,
  `product_id` char(36) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_product_images`
--

INSERT INTO `ns_product_images` (`id`, `position`, `product_id`, `image`, `created`, `modified`) VALUES
('5860cca5-75f4-4537-9e35-0e70f8defb25', '0', '88', '/img/frontend/product/thumb/ProductImage_1__161226015413.PNG', '2016-12-26 13:54:13', '2016-12-26 14:16:56'),
('5860d1f8-43d4-4d68-9fbc-0e70f8defb25', '1', '88', '/img/frontend/product/thumb/ProductImage_2__161226021656.jpg', '2016-12-26 14:16:56', '2016-12-26 14:16:56'),
('5860f85b-3ec8-47b2-8815-0e70f8defb25', '0', '89', '/img/frontend/product/thumb/ProductImage_0__161227113612.jpg', '2016-12-26 17:00:43', '2016-12-27 11:36:12'),
('5860f85c-2fb4-4b73-8e8c-0e70f8defb25', '1', '89', '/img/frontend/product/thumb/ProductImage_1__161227113612.jpg', '2016-12-26 17:00:44', '2016-12-27 11:36:12'),
('5860f998-46e8-46bb-8e46-0e70f8defb25', '0', '90', '/img/frontend/product/thumb/ProductImage_0__161226053026.jpg', '2016-12-26 17:06:00', '2016-12-27 11:36:00'),
('5860fa2b-6e8c-48fc-9469-0e70f8defb25', '0', '91', '/img/frontend/product/thumb/ProductImage_0__170101070031.jpg', '2016-12-26 17:08:27', '2017-01-01 19:00:32'),
('5860fc09-ae20-4b63-a8ee-0e70f8defb25', '0', '92', '/img/frontend/product/thumb/ProductImage_0__161226053006.jpg', '2016-12-26 17:16:25', '2016-12-27 11:35:54'),
('5860fd07-5634-4817-af8e-0e70f8defb25', '0', '93', '/img/frontend/product/thumb/ProductImage_0__161227113550.jpg', '2016-12-26 17:20:39', '2017-01-02 15:42:22'),
('5860fda5-abc4-499e-8436-0e70f8defb25', '0', '94', '/img/frontend/product/thumb/ProductImage_0__161226052952.jpg', '2016-12-26 17:23:17', '2016-12-27 11:35:40'),
('5860fdc6-4538-4dd9-b5b2-0e70f8defb25', '0', '95', '/img/frontend/product/thumb/ProductImage_0__161226052930.jpg', '2016-12-26 17:23:50', '2016-12-27 17:10:42'),
('5860fe0c-debc-4451-a297-0e70f8defb25', '0', '96', '/img/frontend/product/thumb/ProductImage_0__161226052922.jpg', '2016-12-26 17:25:00', '2016-12-27 17:10:37'),
('5860fe2c-82ec-4890-8875-0e70f8defb25', '0', '97', '/img/frontend/product/thumb/ProductImage_0__170101065705.jpg', '2016-12-26 17:25:32', '2017-01-02 15:10:19'),
('5860fef2-42f4-4c40-975a-0e70f8defb25', '0', '98', '/img/frontend/product/thumb/ProductImage_0__161226052849.jpg', '2016-12-26 17:28:50', '2016-12-27 17:10:30'),
('5861001a-aa1c-403a-ba92-0e70f8defb25', '0', '99', '/img/frontend/product/thumb/ProductImage_0__161227113717.jpg', '2016-12-26 17:33:46', '2016-12-27 17:26:16'),
('58610059-ca4c-4bff-b14d-0e70f8defb25', '0', '100', '/img/frontend/product/thumb/ProductImage_0__161227113709.jpg', '2016-12-26 17:34:49', '2016-12-27 11:37:09'),
('58610137-f19c-4e0d-ad5d-0e70f8defb25', '0', '101', '/img/frontend/product/thumb/ProductImage_0__161227113659.jpg', '2016-12-26 17:38:31', '2017-01-01 15:30:24'),
('5861f75c-ad28-4cf9-bddc-0e70f8defb25', '0', '102', '/img/frontend/product/thumb/ProductImage_0__170101061358.jpg', '2016-12-27 11:08:44', '2017-01-01 18:13:59'),
('5861f76f-2080-4a87-91fa-0e70f8defb25', '7', '103', '/img/frontend/product/thumb/ProductImage_0__170101025333.jpg', '2016-12-27 11:09:03', '2017-01-02 15:10:34'),
('5861f780-9cc4-41f6-906e-0e70f8defb25', '0', '104', '/img/frontend/product/thumb/ProductImage_0__161228112337.jpg', '2016-12-27 11:09:20', '2016-12-28 11:23:37'),
('5861f7a2-8af8-4d46-8e27-0e70f8defb25', '0', '105', '/img/frontend/product/thumb/ProductImage_0__161227111201.jpg', '2016-12-27 11:09:54', '2016-12-27 11:16:30'),
('5861f959-1aa8-4cb9-b546-0e70f8defb25', '0', '106', '/img/frontend/product/thumb/ProductImage_0__161227111713.jpg', '2016-12-27 11:17:13', '2016-12-27 11:18:37'),
('5861fa29-ec04-4840-852b-0e70f8defb25', '0', '107', '/img/frontend/product/thumb/ProductImage_0__161227112040.jpg', '2016-12-27 11:20:41', '2016-12-27 11:20:41'),
('5862113d-5f84-4aa7-b7ce-0e70f8defb25', '1', '104', '/img/frontend/product/thumb/ProductImage_1__161227125909.jpg', '2016-12-27 12:59:09', '2016-12-28 11:23:37'),
('5862113d-a058-4b98-9e8f-0e70f8defb25', '2', '104', '/img/frontend/product/thumb/ProductImage_2__161227125909.jpg', '2016-12-27 12:59:09', '2016-12-28 11:23:37'),
('5868b891-77b0-4f90-88a1-4a06c0b99bfb', '1', '108', '/img/frontend/product/thumb/ProductImage_0__170101052922.jpg', '2017-01-01 14:06:41', '2017-01-02 14:29:11'),
('5868ef2d-9bfc-48c7-9050-49cac0b99bfb', '2', '109', '/img/frontend/product/thumb/ProductImage_0__170101060227.jpg', '2017-01-01 17:59:41', '2017-01-02 14:29:08'),
('5868f020-0dc4-4372-a266-4725c0b99bfb', '3', '110', '/img/frontend/product/thumb/ProductImage_0__170101060344.jpg', '2017-01-01 18:03:44', '2017-01-02 14:29:03'),
('5868f17b-0178-4a4a-9847-4c2cc0b99bfb', '0', '111', '/img/frontend/product/thumb/ProductImage_0__170101060931.jpg', '2017-01-01 18:09:31', '2017-01-02 14:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `ns_profiles`
--

CREATE TABLE IF NOT EXISTS `ns_profiles` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_profiles`
--

INSERT INTO `ns_profiles` (`id`, `user_id`, `name`, `address`) VALUES
('53155fa7-f6e0-4c5c-b1db-0e8ef8defb25', '53155fa7-0ce4-4508-8ccc-0e8ef8defb25', 'Site Admin', 'Bangladesh'),
('54754eab-cf14-48e8-8c9c-0df8f8defb25', '54754eab-865c-444d-9498-0df8f8defb25', 'Shahin Alam', 'Sherpur, Bogra'),
('54755679-3284-45aa-b346-0df8f8defb25', '54755679-3b30-46d7-b692-0df8f8defb25', 'Shahed Hasan', 'Dhaka'),
('547556b7-c250-41ff-98b5-0df8f8defb25', '547556b7-40e4-4dc9-ad7e-0df8f8defb25', 'Shah Jahan', 'Dhaka'),
('547556f3-ca58-4d48-b1a5-0df8f8defb25', '547556f3-1f0c-438e-a05c-0df8f8defb25', 'Rony Khan', 'Dhaka'),
('548d2057-a6a0-43f8-95bc-1250f8defb25', '548d2057-9154-4db2-b8c9-1250f8defb25', 'Shahed Hasab', 'Dhaka'),
('54c9faa5-5aac-45a4-bcdc-1cf4c0b99bef', '54c9faa4-27d8-4058-b987-1cf4c0b99bef', '2345678', 'gahah');

-- --------------------------------------------------------

--
-- Table structure for table `ns_related_links`
--

CREATE TABLE IF NOT EXISTS `ns_related_links` (
  `id` char(36) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `description` text,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_related_links`
--

INSERT INTO `ns_related_links` (`id`, `image`, `title`, `description`, `url`) VALUES
('54dae529-4f48-4df4-b9d5-0c48f8defb25', '/img/frontend/relatedlink/thumb/RelatedLink_image_151117115727.png', 'bangladesh army', '<p>bangladesh army</p>\r\n', 'http://www.army.mil.bd/'),
('564311dd-03dc-448a-92f1-0facf8defb25', '/img/frontend/relatedlink/thumb/RelatedLink_image_151117115628.jpg', 'bangladesh navy', '<p>ww</p>\r\n', 'http://www.navy.mil.bd/');

-- --------------------------------------------------------

--
-- Table structure for table `ns_roles`
--

CREATE TABLE IF NOT EXISTS `ns_roles` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinytext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ns_roles`
--

INSERT INTO `ns_roles` (`id`, `name`, `slug`, `status`, `created`, `modified`) VALUES
('53141664-f3c4-4696-b2b2-0d49f8defb25', 'Super Admin', 'super-admin', 'active', '2014-03-03 11:43:00', '2014-03-03 11:43:00'),
('53141678-618c-49b2-a33f-0931f8defb25', 'User', 'user', 'active', '2014-03-03 11:43:20', '2014-03-03 11:43:20'),
('54c4dc7b-d300-4893-9d61-0ac8f8defb25', 'Manager', 'manager', 'active', '2015-01-25 18:07:23', '2015-01-25 18:07:23'),
('54c5f455-6ad4-4ce3-aef5-08b4f8defb25', 'Member', 'member', 'active', '2015-01-26 14:01:25', '2015-01-26 14:01:25'),
('54d9f5f6-49b4-430e-865c-06b4f8defb25', 'Admin', 'admin', 'active', '2015-02-10 18:13:42', '2015-02-10 18:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `ns_services`
--

CREATE TABLE IF NOT EXISTS `ns_services` (
`id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `description` text,
  `icon` varchar(100) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_services`
--

INSERT INTO `ns_services` (`id`, `image`, `title`, `type`, `description`, `icon`, `status`, `created`, `modified`) VALUES
(6, NULL, 'import ', NULL, '<p>Contain will Upload Soon</p>\r\n', '<i aria-hidden="true" class="fa fa-picture-o"></i>', '', '2017-03-11 14:55:11', '2017-03-11 15:22:23'),
(7, NULL, 'Export', NULL, '<p>Contain Will Upload Soon</p>\r\n', '<i aria-hidden="true" class="fa fa-file-text-o"></i>', '', '2017-03-11 15:00:30', '2017-03-11 15:21:36'),
(8, NULL, 'It Consulting', NULL, '<p>Contain Will Upload Soon</p>\r\n', '<i aria-hidden="true" class="fa fa-pencil-square-o"></i>', '', '2017-03-11 15:01:39', '2017-03-11 15:22:01'),
(9, NULL, 'Java Development', NULL, '<p>Contain Will Upload Soon</p>\r\n', '<i aria-hidden="true" class="fa fa-th"></i>', '', '2017-03-11 15:02:43', '2017-03-11 15:21:03'),
(10, NULL, 'UX Design', NULL, '<p>Crafting unique experiences by enhancing usability, accessibility and pleasure of the user interaction.</p>\r\n', '<i class="fa fa-user" aria-hidden="true"></i>', '', '2017-03-11 16:53:45', '2017-03-11 16:53:45'),
(11, '/img/frontend/service_photo/thumb/Service_image_170329125724.jpg', 'Wearable Apps', NULL, '<p>Creating apps for the wearable devices that provide UX similar to mobile apps.</p>\r\n', '<i class="fa fa-clock-o" aria-hidden="true"></i>', '', '2017-03-11 16:54:16', '2017-03-29 12:57:24'),
(13, '/img/frontend/service_photo/thumb/Service_image_170329125610.PNG', '4', NULL, '<p>4</p>\r\n', NULL, '', '2017-03-29 12:49:40', '2017-03-29 12:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `ns_sliders`
--

CREATE TABLE IF NOT EXISTS `ns_sliders` (
  `id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `height` int(3) NOT NULL,
  `width` int(3) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  `position` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ns_sliders`
--

INSERT INTO `ns_sliders` (`id`, `title`, `slug`, `height`, `width`, `status`, `position`, `created`) VALUES
('547e9694-9dac-40b7-ad1c-0cf8f8defb25', 'Main Banner Slider', '', 646, 1440, 'active', 'home_page_top', '2014-12-03 10:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `ns_slider_contents`
--

CREATE TABLE IF NOT EXISTS `ns_slider_contents` (
  `id` char(36) NOT NULL,
  `slider_id` char(36) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `description` text,
  `order` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ns_slider_contents`
--

INSERT INTO `ns_slider_contents` (`id`, `slider_id`, `caption`, `description`, `order`, `image`, `status`) VALUES
('56d284b7-0e08-4d17-9f00-0a84f8defb25', '547e9694-9dac-40b7-ad1c-0cf8f8defb25', 'Delivering cost effective and high-quality software solutions ', NULL, 1, '/img/frontend/slider_content/thumb/SliderContent_image_170422044956.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ns_social_links`
--

CREATE TABLE IF NOT EXISTS `ns_social_links` (
  `id` char(36) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `social_type` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `order` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_social_links`
--

INSERT INTO `ns_social_links` (`id`, `type`, `social_type`, `image`, `icon`, `title`, `url`, `order`) VALUES
('585e5917-b8bc-404c-ac24-0e70f8defb25', 'header', '', '', 'fa fa-facebook', 'Facebook', 'https://www.facebook.com', 1),
('585e597f-2eb8-47fa-bd08-0e70f8defb25', 'header', '', '', 'fa-twitter', 'Twitter', 'https://www.twitter.com', 2),
('585e59a2-4050-41ee-91f2-0e70f8defb25', 'header', '', '', 'fa-skype', 'linkedin', 'https://www.linkedin.com', 3),
('585e59cd-b760-452b-afd3-0e70f8defb25', 'header', '', '', 'fa-google-plus', 'googleplus', 'https://www.google.com', 4),
('585e5a26-ba00-4c9f-9e07-0e70f8defb25', 'header', '', '', 'fa-instagram ', 'Facebook', 'https://www.facebook.com', 5),
('585e5a42-fb28-4900-92fb-0e70f8defb25', 'header', '', '', 'fa-vimeo-square', 'Twitter', 'https://www.twitter.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ns_users`
--

CREATE TABLE IF NOT EXISTS `ns_users` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `verified_code` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinytext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ns_users`
--

INSERT INTO `ns_users` (`id`, `username`, `password`, `email`, `role_id`, `verified_code`, `created`, `modified`, `status`) VALUES
('53155fa7-0ce4-4508-8ccc-0e8ef8defb25', 'userone', 'b24934f7095e7bc95bd50301a65c4be46efb3611', 'leo@nogorsolutions.com', '53141664-f3c4-4696-b2b2-0d49f8defb25', 5745, '2014-03-04 11:07:51', '2015-11-25 13:55:12', 'active'),
('53155fa7-0ce4-4508-8ccc-0e8ef8defb26', 'manager', '1a2a69280684c5cb64cccfe8ef451565d79c7fca', 'it06016@gmail.com', '54c4dc7b-d300-4893-9d61-0ac8f8defb25', 5745, '2014-03-04 11:07:51', '2015-01-28 12:53:51', 'inactive'),
('54c60b09-05e0-48d4-bbea-08b4f8defb25', 'tanvir', 'b24934f7095e7bc95bd50301a65c4be46efb3611', 'leo@nogorsolutions.com', '54c5f455-6ad4-4ce3-aef5-08b4f8defb25', 0, '2015-01-26 15:38:17', '2015-01-26 15:38:17', 'active'),
('54c889e3-b17c-40cc-8845-0decf8defb25', 'shahin', 'b24934f7095e7bc95bd50301a65c4be46efb3611', 'shahin@gmail.com', '54c5f455-6ad4-4ce3-aef5-08b4f8defb25', 0, '2015-01-28 13:04:03', '2015-01-28 13:04:03', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ns_achievements`
--
ALTER TABLE `ns_achievements`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_authorized_menus`
--
ALTER TABLE `ns_authorized_menus`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `ns_careers`
--
ALTER TABLE `ns_careers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_categories`
--
ALTER TABLE `ns_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_configurations`
--
ALTER TABLE `ns_configurations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_contactuses`
--
ALTER TABLE `ns_contactuses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_contents`
--
ALTER TABLE `ns_contents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_content_files`
--
ALTER TABLE `ns_content_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_dominions`
--
ALTER TABLE `ns_dominions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_events`
--
ALTER TABLE `ns_events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_menus`
--
ALTER TABLE `ns_menus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_missions`
--
ALTER TABLE `ns_missions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_news`
--
ALTER TABLE `ns_news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_notices`
--
ALTER TABLE `ns_notices`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_permissions`
--
ALTER TABLE `ns_permissions`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `ns_photos`
--
ALTER TABLE `ns_photos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_photo_galleries`
--
ALTER TABLE `ns_photo_galleries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_position_applies`
--
ALTER TABLE `ns_position_applies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_processes`
--
ALTER TABLE `ns_processes`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `ns_products`
--
ALTER TABLE `ns_products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_product_images`
--
ALTER TABLE `ns_product_images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_profiles`
--
ALTER TABLE `ns_profiles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_related_links`
--
ALTER TABLE `ns_related_links`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_roles`
--
ALTER TABLE `ns_roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_services`
--
ALTER TABLE `ns_services`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_sliders`
--
ALTER TABLE `ns_sliders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_slider_contents`
--
ALTER TABLE `ns_slider_contents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_social_links`
--
ALTER TABLE `ns_social_links`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns_users`
--
ALTER TABLE `ns_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ns_achievements`
--
ALTER TABLE `ns_achievements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ns_careers`
--
ALTER TABLE `ns_careers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ns_categories`
--
ALTER TABLE `ns_categories`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=610;
--
-- AUTO_INCREMENT for table `ns_position_applies`
--
ALTER TABLE `ns_position_applies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ns_products`
--
ALTER TABLE `ns_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ns_services`
--
ALTER TABLE `ns_services`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
