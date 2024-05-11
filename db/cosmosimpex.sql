-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 07:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apex`
--

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
('54cdd0f4-15f8-4506-9f0f-00acf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'News', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', 'News', '54cdd079-d5bc-46f5-b56e-00acf8defb25', '<i class="fa fa-fw fa-building-o"></i>', 'Active', 4),
('54cde0bd-417c-4b76-a7c5-00acf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Related Link', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', 'NsRelatedLink', '54cde048-9fc4-4743-bf05-00acf8defb25', '<i class="fa fa-fw fa-tag"></i>', 'Draft', 5),
('54d70117-d22c-48ae-a2d2-080cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Site Configurations', '', '54d6ff93-8924-4b42-b3da-080cf8defb25', '', '54d6ff93-e5e4-4c1e-9705-080cf8defb25', '<i class="fa fa-fw fa-cog"></i>', 'Active', 8),
('54d9f672-2ba0-4b2e-a58c-06b4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Users', '', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '', '54c4c56a-9088-44fe-bedd-0ac8f8defb25', '<i class="fa fa-fw fa-users"></i>', 'Active', 9),
('54e16f0a-4380-446a-b9aa-0d50f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Promotion', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '', '54e16d3d-0f28-4109-92f1-0d50f8defb25', '<i class="fa fa-fw fa-file-text-o"></i>', 'Active', 6),
('54e16f62-92a4-479d-b2b8-0d50f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Events', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '', '54e16d66-1d6c-4529-86b9-0d50f8defb25', '<i class="fa fa-fw fa-calendar"></i>', 'Draft', 7),
('54e16fd9-a778-465e-b7f4-0d50f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'SocialLinks', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '', '54e16d93-12ec-498f-89ce-0d50f8defb25', '<i class="fa fa-fw fa-shield"></i>', 'Active', 8),
('56542487-5580-48cd-becd-02b4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Contact us', '54cca9d2-8fb4-47f5-b371-0bf0f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '', '56542433-0fb4-408a-b6f2-02b4f8defb25', '<i class="fa fa-dashboard"></i>', 'Active', 9),
('56cec9a5-f90c-4661-b303-0f8cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Product', '', '', '', '', '<i class="fa fa-fw fa-cog"></i>', 'Active', 3),
('56cec9c1-5f8c-4a6c-950e-0f8cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Category', '56cec9a5-f90c-4661-b303-0f8cf8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '', '56cec915-7750-438c-80a6-0f8cf8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 1),
('56ceca29-00c8-4d8e-a4e8-0f8cf8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', 'Product', '56cec9a5-f90c-4661-b303-0f8cf8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '', '56cec922-36bc-492d-be47-0f8cf8defb25', '<i class="fa fa-fw fa-folder-open"></i>', 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ns_categories`
--

CREATE TABLE IF NOT EXISTS `ns_categories` (
`id` int(11) NOT NULL,
  `footer_show` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `homepage_serial` int(11) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `using_brand` varchar(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

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
('52f85cf6-4ebc-4be9-b7d6-1064f8defb25', '/img/logo.png', 'apex-husain', 'apex-husain', 'apex-husain', 'apex-husain', 'apex-husain', '', 'leo@nogorsolutions.com', 'Dhaka', '02-9582459, 02-9582561', 'info@apex-husain.com', '', '2014-02-10 11:00:38', '2017-02-08 12:41:08');

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
('56651ec5-de40-4f88-8242-0c68f8defb25', 'faruk@nogorsolutions.com ', '<div class="title-footer"><span>Corporate Office Address</span></div>\r\n\r\n<p>Address: Baitulkhair Builiding, 48/A,B Purana Paltan, Suite #902-A, Dhaka-1000</p>\r\n\r\n<p>Telephone: 02-9582459, 02-9582561</p>\r\n\r\n<p>Email: info@goldenstar.com, admin@goldenstar.com, sales@goldenstar.com</p>\r\n\r\n<div class="title-footer"><span>Factory Address</span></div>\r\n\r\n<p>Address: Baitulkhair Builiding, 48/A,B Purana Paltan, Suite #902-A, Dhaka-1000</p>\r\n', '<p>Baitulkhair Builiding, 48/A,B Purana Paltan, Suite #902-A, Dhaka-1000</p>\r\n', '01705442788', 'N/A', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7306.00010517131!2d90.46536327426578!3d23.71169216157116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b70abed44b75%3A0x4b94bcb774fb6573!2sKonapara%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1482572569352" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>', '', '');

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
('56cec922-b01c-4e05-af92-0f8cf8defb25', 'Products');

-- --------------------------------------------------------

--
-- Table structure for table `ns_events`
--

CREATE TABLE IF NOT EXISTS `ns_events` (
  `id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinytext NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('58673364-7a0c-4970-ac24-0e70f8defb25', '', 'content', 'header', 'About', '56c59eff-196c-4417-b55a-0288f8defb25', 'about-2', NULL, '', '', 1, 'active', 1, '2016-12-31 10:26:12', '2016-12-31 11:07:37'),
('58673382-a84c-45ab-8c05-0e70f8defb25', '', 'external_link', 'header', 'Products', '56c59eff-196c-4417-b55a-0288f8defb25', 'products-2', NULL, '/pages/category', '', 2, 'active', 1, '2016-12-31 10:26:42', '2017-01-01 02:08:43'),
('586733a0-7620-48e0-b1dc-0e70f8defb25', '', 'external_link', 'header', 'Gallary', '', 'gallary-2', NULL, '/pages/get_all_albums', '', 3, 'active', 1, '2016-12-31 10:27:12', '2017-01-01 02:08:34'),
('586733bb-1550-45a7-b591-0e70f8defb25', '58673364-7a0c-4970-ac24-0e70f8defb25', 'content', 'header', 'Chairmanâ€™s Message', '56c59eff-196c-4417-b55a-0288f8defb25', 'chairman-s-message', NULL, '', '', 1, 'active', 1, '2016-12-31 10:27:39', '2016-12-31 11:09:54'),
('586733d0-be94-4845-947b-0e70f8defb25', '58673364-7a0c-4970-ac24-0e70f8defb25', 'content', 'header', 'Company Profile', '5867b02e-71e0-4c70-830c-4d82a2fb501b', 'company-profile-2', NULL, '', '', 2, 'active', 1, '2016-12-31 10:28:00', '2017-01-01 02:46:22'),
('586733e0-7de4-4399-9f63-0e70f8defb25', '58673364-7a0c-4970-ac24-0e70f8defb25', 'content', 'header', 'Vision & Mission', '58681819-7274-481c-84f3-95b2c0b99bfb', 'vision-mission-2', NULL, '', '', 2, 'active', 1, '2016-12-31 10:28:16', '2017-01-01 02:46:12'),
('58673c0a-e294-4b10-ab00-0e70f8defb25', '', 'external_link', 'header', 'Promotion', '56c59eff-196c-4417-b55a-0288f8defb25', 'promotion-2', NULL, '/pages/view_all_notice', '', 4, 'active', 1, '2016-12-31 11:03:06', '2017-01-01 02:08:19'),
('58673c26-805c-428c-8463-0e70f8defb25', '', 'external_link', 'header', 'News ', '56c59eff-196c-4417-b55a-0288f8defb25', 'news-2', NULL, '/pages/view_all_news', '', 5, 'active', 1, '2016-12-31 11:03:34', '2017-01-01 02:07:51'),
('58673de9-2d18-4790-98b4-0e70f8defb25', '58673364-7a0c-4970-ac24-0e70f8defb25', 'content', 'header', 'Sister Concern', '56c59eff-196c-4417-b55a-0288f8defb25', 'sister-concern', NULL, '', '', 4, 'active', 1, '2016-12-31 11:11:05', '2016-12-31 11:11:05'),
('5868cd27-4168-4272-97d1-4478c0b99bfb', '', 'external_link', 'header', 'Contact ', '', 'contact-2', NULL, '/pages/contact', '', 7, 'active', 1, '2017-01-01 15:34:31', '2017-01-01 15:36:23'),
('586a271f-d058-4afb-a6bc-0e70f8defb25', '', 'content', 'footer', 'Who We Are', '56c59eff-196c-4417-b55a-0288f8defb25', 'who-we-are', NULL, '', '', 1, 'active', 1, '2017-01-02 16:10:39', '2017-01-02 16:10:39'),
('586a274a-1b04-4486-9ed3-0e70f8defb25', '586a271f-d058-4afb-a6bc-0e70f8defb25', 'content', 'footer', 'Chairman''s Message', '56c59eff-196c-4417-b55a-0288f8defb25', 'chairman-s-message', NULL, '', '', 1, 'active', 1, '2017-01-02 16:11:22', '2017-01-02 16:11:22'),
('586a2766-b890-4e02-a06e-0e70f8defb25', '586a271f-d058-4afb-a6bc-0e70f8defb25', 'content', 'footer', 'Company Profile', '5867b02e-71e0-4c70-830c-4d82a2fb501b', 'company-profile-2', NULL, '', '', 2, 'active', 1, '2017-01-02 16:11:50', '2017-01-02 16:11:50'),
('586a277d-3060-4126-a4d0-0e70f8defb25', '586a271f-d058-4afb-a6bc-0e70f8defb25', 'content', 'footer', 'Vision & Mission', '58681819-7274-481c-84f3-95b2c0b99bfb', 'vision-mission-2', NULL, '', '', 3, 'active', 1, '2017-01-02 16:12:13', '2017-01-02 16:12:13');

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
('56dd25f5-0164-405d-a108-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c441-4d5c-4b02-89ce-0ac8f8defb25'),
('56dd25f5-0320-4125-8121-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c3e8-2034-4562-8d34-0ac8f8defb25'),
('56dd25f5-0ea4-4cbe-96bc-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c459-7ac0-41a0-b67f-0ac8f8defb25'),
('56dd25f5-0ea4-4eb8-9231-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-6a28-454d-a77d-0bf0f8defb25'),
('56dd25f5-1060-45d9-9c44-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c56a-9088-44fe-bedd-0ac8f8defb25'),
('56dd25f5-1da0-4782-b9f4-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c582-3944-4342-bf7f-0ac8f8defb25'),
('56dd25f5-1da0-4f07-b759-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c58d-8878-4a29-8d8f-0ac8f8defb25'),
('56dd25f5-2924-42dc-b532-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-e388-4feb-836b-0bf0f8defb25'),
('56dd25f5-2ae0-41e8-81f0-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54e435cb-c2b4-413b-81f6-0288f8defb25'),
('56dd25f5-3664-4b60-a1ee-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-f0c8-4fe3-b36e-0bf0f8defb25'),
('56dd25f5-3820-4c1d-8749-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c209-9494-40d7-8a06-0ac8f8defb25'),
('56dd25f5-43a4-43e9-9abc-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-cb60-4572-9fc8-0bf0f8defb25'),
('56dd25f5-43a4-4dee-b00f-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-5fa4-4076-ad2f-0bf0f8defb25'),
('56dd25f5-4560-4e29-9c65-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c3a6-dc68-48f6-99fe-0ac8f8defb25'),
('56dd25f5-4560-4f30-a1a1-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c3bb-cf48-4b59-9214-0ac8f8defb25'),
('56dd25f5-5148-4bb7-be57-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-e644-4c22-b232-0bf0f8defb25'),
('56dd25f5-5304-4738-89fe-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c516-1500-4772-a6a9-0ac8f8defb25'),
('56dd25f5-5304-4ea2-b83e-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c50b-6da0-46ca-8dfc-0ac8f8defb25'),
('56dd25f5-5e88-4574-9d22-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-4954-41f2-b819-0bf0f8defb25'),
('56dd25f5-6044-4e77-86c4-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4ad-67b0-4f7b-a179-0ac8f8defb25'),
('56dd25f5-6d84-4637-a39b-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4c5-58f8-4eea-902c-0ac8f8defb25'),
('56dd25f5-7ac4-4306-b41f-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c436-37f4-448b-a7b0-0ac8f8defb25'),
('56dd25f5-7c80-41ab-8516-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c3db-5a50-48c3-9e9a-0ac8f8defb25'),
('56dd25f5-8804-4d86-990b-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5492b8c5-291c-452d-bc3a-0544f8defb25', '54c4c44c-7d08-44df-ab3e-0ac8f8defb25'),
('56dd25f5-89c0-44d4-88af-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c419-20d8-425a-a9e6-0ac8f8defb25'),
('56dd25f5-89c0-4dbf-8749-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141565-e924-4ee7-b6ba-0939f8defb25', '54c4c3f4-8e94-4d9c-880c-0ac8f8defb25'),
('56dd25f5-9544-4282-8409-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-e388-4054-89af-0bf0f8defb25'),
('56dd25f5-9700-42ad-9250-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c578-f5fc-4f2d-81a3-0ac8f8defb25'),
('56dd25f5-a440-4bbf-9d46-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '531415ff-0e3c-42d9-b5e2-0d43f8defb25', '54c4c596-9608-4f82-b1f6-0ac8f8defb25'),
('56dd25f5-afc4-41e5-83ac-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca713-a0e4-4f30-9a4f-0bf0f8defb25', '54cca713-f0c8-46ec-8f8a-0bf0f8defb25'),
('56dd25f5-bd04-466a-ba8f-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-5200-4f36-90db-0bf0f8defb25'),
('56dd25f5-bec0-4b3c-b46e-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316b4f6-80c4-4e4b-be27-0936f8defb25', '54c4c363-d214-4b79-a6d6-0ac8f8defb25'),
('56dd25f5-caa8-41aa-96cd-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca742-705c-4bfe-a0b5-0bf0f8defb25', '54cca742-d904-45d8-9c69-0bf0f8defb25'),
('56dd25f5-cc00-4d2b-b972-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c500-ee4c-4068-9cac-0ac8f8defb25'),
('56dd25f5-cc00-4e14-a4c3-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c4f4-3690-40c5-8473-0ac8f8defb25'),
('56dd25f5-d7e8-48d9-bc91-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-4954-41a5-975c-0bf0f8defb25'),
('56dd25f5-d7e8-4c22-9a45-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-3c14-4d46-be18-0bf0f8defb25'),
('56dd25f5-d9a4-47d0-91fb-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e2f3-ac88-4b7c-923c-3e23f8defb25', '54c4c522-39a8-4c12-bfef-0ac8f8defb25'),
('56dd25f5-d9a4-4b43-919b-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4a1-30bc-4215-b2a5-0ac8f8defb25'),
('56dd25f5-dcb8-4490-a764-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '53141557-020c-4f2f-b628-0d43f8defb25', '54c4c5c0-2ac8-42f2-b00f-0ac8f8defb25'),
('56dd25f5-e6e4-45ea-b000-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4b8-9730-4089-9aa2-0ac8f8defb25'),
('56dd25f5-f424-425d-a0c4-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '5316e4a7-965c-4213-9cab-3e22f8defb25', '54c4c4d0-6e60-4250-9c0e-0ac8f8defb25'),
('56dd25f6-00b0-4cb6-9fa8-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-3850-47d4-8db3-0d50f8defb25'),
('56dd25f6-026c-4052-af8a-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-3f8c-4c71-8212-00acf8defb25'),
('56dd25f6-026c-4781-9f35-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-9fc4-4743-bf05-00acf8defb25'),
('56dd25f6-0428-4d66-8db4-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-cff4-448d-bdbe-0bf0f8defb25'),
('56dd25f6-0428-4fa5-b0e6-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca756-6590-4af5-8154-0bf0f8defb25', '54cca756-c2b4-48a8-b48c-0bf0f8defb25'),
('56dd25f6-0a78-4bc2-a34e-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd1b4d-5cfc-40c3-a982-01d4f8defb25', '56dd1b4d-5b40-49f5-a772-01d4f8defb25'),
('56dd25f6-0a78-4ebd-bec2-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd1b4d-5cfc-40c3-a982-01d4f8defb25', '56dd1b4d-6880-49d0-bce1-01d4f8defb25'),
('56dd25f6-0c34-4d69-a395-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-e834-4529-a8f0-0f8cf8defb25'),
('56dd25f6-0df0-4197-878f-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-a40c-4d7b-a269-0d50f8defb25'),
('56dd25f6-0fac-4084-9880-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54d6ff93-8924-4b42-b3da-080cf8defb25', '54d6ff93-3784-4107-96a3-080cf8defb25'),
('56dd25f6-1168-4a6b-9d56-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-c31c-479d-a6b6-0bf0f8defb25'),
('56dd25f6-1168-4fb0-8f08-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-d05c-4636-904d-0bf0f8defb25'),
('56dd25f6-17b8-4a51-8637-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd1b4d-5cfc-40c3-a982-01d4f8defb25', '56dd1b4d-ef84-4f25-b656-01d4f8defb25'),
('56dd25f6-1974-435e-89f8-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-0b30-46dd-8367-0f8cf8defb25'),
('56dd25f6-1b30-4c81-9be8-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-2d6c-41dc-928a-0d50f8defb25'),
('56dd25f6-1b30-4eb1-8512-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-998c-4fb8-8216-0d50f8defb25'),
('56dd25f6-1cec-4075-9801-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54d6ff93-8924-4b42-b3da-080cf8defb25', '54d6ff93-e5e4-4c1e-9705-080cf8defb25'),
('56dd25f6-1ea8-4388-96d8-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-0f24-4e63-83dd-0bf0f8defb25'),
('56dd25f6-26b4-4c01-b68d-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-8490-46d1-a271-0f8cf8defb25'),
('56dd25f6-2870-4822-971c-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-35b8-4521-a0e2-02b4f8defb25'),
('56dd25f6-2a2c-4f21-a5d9-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-1c68-433e-ba90-0d50f8defb25'),
('56dd25f6-2be8-4882-8a36-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-8884-43f0-9a0c-0bf0f8defb25'),
('56dd25f6-33f4-4cd5-824f-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-fdf0-4949-8364-0f8cf8defb25'),
('56dd25f6-35b0-460c-83ce-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-35b8-4ee3-8d32-02b4f8defb25'),
('56dd25f6-376c-420e-96f0-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-a308-4c54-9574-0d50f8defb25'),
('56dd25f6-3928-45d2-8466-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4180-4f2f-a916-0bf0f8defb25'),
('56dd25f6-3928-4afa-8ae1-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4180-4018-a189-0bf0f8defb25'),
('56dd25f6-4198-45c6-ab66-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-4460-4879-959b-0f8cf8defb25'),
('56dd25f6-4198-4a3c-bfba-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-4460-46dd-b102-0f8cf8defb25'),
('56dd25f6-4354-4489-8754-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565faf57-2e68-4b33-92c7-08d8f8defb25', '565faf57-122c-40a0-912d-08d8f8defb25'),
('56dd25f6-4354-45b5-af02-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565faf57-2e68-4b33-92c7-08d8f8defb25', '565faf57-04ec-4294-9f19-08d8f8defb25'),
('56dd25f6-44ac-43d7-a5a9-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5652e0e4-0008-415e-95b7-0f84f8defb25'),
('56dd25f6-4668-4ba4-9844-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-2354-456a-b8cb-0bf0f8defb25'),
('56dd25f6-4668-4fe6-878a-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-c820-4c5b-810d-0bf0f8defb25'),
('56dd25f6-4ed8-4ae6-a72e-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-cb00-4990-8693-0f8cf8defb25'),
('56dd25f6-5094-452c-a9ef-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565fba8d-7f9c-4b2f-a977-08d8f8defb25', '565fba8d-7de0-41b3-93ca-08d8f8defb25'),
('56dd25f6-5094-4c90-93fc-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565faf57-2e68-4b33-92c7-08d8f8defb25', '565faf57-f7ac-4c36-ada1-08d8f8defb25'),
('56dd25f6-5250-41ca-83ed-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5652e0e4-7968-463e-8b2d-0f84f8defb25'),
('56dd25f6-53a8-4831-b26f-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-9cb4-4b30-8f1e-0bf0f8defb25'),
('56dd25f6-5c18-4115-8352-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56d287d2-c9e4-4fc1-a696-0a84f8defb25', '56d287d2-916c-4983-a4d5-0a84f8defb25'),
('56dd25f6-5c18-4f48-913d-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56d287d2-c9e4-4fc1-a696-0a84f8defb25', '56d287d2-9eac-429a-869d-0a84f8defb25'),
('56dd25f6-5dd4-4937-bcb3-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565fba8d-7f9c-4b2f-a977-08d8f8defb25', '565fba8d-f740-41bb-a0bc-08d8f8defb25'),
('56dd25f6-5f90-42f3-b456-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5652e0e4-b1e0-40df-a69c-0f84f8defb25'),
('56dd25f6-614c-400b-acb2-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdc16d-7c28-42f6-8b40-00acf8defb25', '54cdc16d-3450-4586-99ba-00acf8defb25'),
('56dd25f6-6958-42af-9382-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56d287d2-c9e4-4fc1-a696-0a84f8defb25', '56d28c88-d79c-4684-a917-0a84f8defb25'),
('56dd25f6-6b14-4a5a-982e-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-4558-4692-882e-0f8cf8defb25'),
('56dd25f6-6cd0-4c70-b049-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-1d6c-4529-86b9-0d50f8defb25'),
('56dd25f6-6e8c-42f7-8665-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-b980-419c-94a5-00acf8defb25'),
('56dd25f6-6e8c-49f2-ac0f-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-c6c0-4bb8-b196-00acf8defb25'),
('56dd25f6-7698-404a-a962-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd19d8-2b0c-4705-9757-01d4f8defb25', '56dd19d8-2794-49fc-a0d2-01d4f8defb25'),
('56dd25f6-7698-4f10-9f1d-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd19d8-2b0c-4705-9757-01d4f8defb25', '56dd19d8-1c10-4f0c-a72a-01d4f8defb25'),
('56dd25f6-7a10-41f7-a2ea-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-3850-4495-8e60-0d50f8defb25'),
('56dd25f6-7bcc-4102-b3a5-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-3f8c-4929-93a6-00acf8defb25'),
('56dd25f6-7bcc-4816-a891-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-31e8-4f63-a755-00acf8defb25'),
('56dd25f6-83d8-41cc-be6e-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd19d8-2b0c-4705-9757-01d4f8defb25', '56dd19d8-ae34-4024-9084-01d4f8defb25'),
('56dd25f6-8594-4c0d-863d-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-e678-4c7f-b41d-0f8cf8defb25'),
('56dd25f6-890c-49f2-bcf2-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cde048-d1ec-4511-a442-00acf8defb25', '54cde048-b888-488d-89cb-00acf8defb25'),
('56dd25f6-8ac8-483c-bdf1-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-56fc-4dae-b25b-0bf0f8defb25'),
('56dd25f6-8ac8-4e88-b38d-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-49bc-48a5-b614-0bf0f8defb25'),
('56dd25f6-9118-4be4-aa5c-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd1b4d-5cfc-40c3-a982-01d4f8defb25', '56dd1b4d-d4a0-48f7-bcc8-01d4f8defb25'),
('56dd25f6-9118-4dc0-9dfd-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd1b4d-5cfc-40c3-a982-01d4f8defb25', '56dd1b4d-e1e0-4352-9302-01d4f8defb25'),
('56dd25f6-9490-47e6-affb-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-202c-44e7-858b-0d50f8defb25'),
('56dd25f6-9490-4d9c-8e19-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-12ec-498f-89ce-0d50f8defb25'),
('56dd25f6-9808-4894-a2d1-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-0f24-4763-b5bf-0bf0f8defb25'),
('56dd25f6-9808-4eee-908c-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7cd-7338-4689-8582-0bf0f8defb25', '54cca7cd-d05c-4db0-8c25-0bf0f8defb25'),
('56dd25f6-a014-40a5-8b35-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-7750-438c-80a6-0f8cf8defb25'),
('56dd25f6-a1d0-4745-b4af-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d93-c308-4d17-b666-0d50f8defb25', '54e16d93-a6cc-46f4-b4a7-0d50f8defb25'),
('56dd25f6-a1d0-4d9b-9d96-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-0fb4-408a-b6f2-02b4f8defb25'),
('56dd25f6-a38c-4d78-a552-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-0f28-4109-92f1-0d50f8defb25'),
('56dd25f6-a548-4185-9449-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-1c64-4838-b5c8-0bf0f8defb25'),
('56dd25f6-ad54-4bc6-b046-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec915-1a2c-4a04-ab1f-0f8cf8defb25', '56cec915-fdf0-467d-b0ee-0f8cf8defb25'),
('56dd25f6-b0cc-4253-bee8-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-95c8-44e6-8120-0d50f8defb25'),
('56dd25f6-b288-4c69-a675-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7dd-01e4-4789-9ab5-0bf0f8defb25', '54cca7dd-95c4-41c2-8c05-0bf0f8defb25'),
('56dd25f6-baf8-4764-a8d8-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-36bc-492d-be47-0f8cf8defb25'),
('56dd25f6-bc50-474c-b7f7-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-bc58-4b97-a9e7-02b4f8defb25'),
('56dd25f6-bc50-492f-abef-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56542433-b44c-47a6-8701-02b4f8defb25', '56542433-51f4-4096-a18d-02b4f8defb25'),
('56dd25f6-be0c-4582-8c54-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '54e16d3d-f2ec-4f40-be51-0d50f8defb25'),
('56dd25f6-bfc8-450b-88f3-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4ec0-4f6a-a001-0bf0f8defb25'),
('56dd25f6-bfc8-4592-96d6-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca7f5-bae0-4e5b-bd7c-0bf0f8defb25', '54cca7f5-4ec0-441f-8e8c-0bf0f8defb25'),
('56dd25f6-c838-44fc-b43d-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec922-b01c-4e05-af92-0f8cf8defb25', '56cec922-bd5c-42c1-8334-0f8cf8defb25'),
('56dd25f6-c9f4-4341-bb92-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565faf57-2e68-4b33-92c7-08d8f8defb25', '565faf57-8b8c-4136-b377-08d8f8defb25'),
('56dd25f6-c9f4-4842-9fcb-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565faf57-2e68-4b33-92c7-08d8f8defb25', '565faf57-7e4c-480d-8753-08d8f8defb25'),
('56dd25f6-cb4c-4391-ad34-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5652e0e4-0008-4171-95cf-0f84f8defb25'),
('56dd25f6-cd08-4a28-8684-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-3094-4b92-b5c7-0bf0f8defb25'),
('56dd25f6-cd08-4f7f-bf34-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-3094-4b97-b5f2-0bf0f8defb25'),
('56dd25f6-d578-4ba2-90fb-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56d287d2-c9e4-4fc1-a696-0a84f8defb25', '56d287d2-0c88-4103-9c28-0a84f8defb25'),
('56dd25f6-d578-4f94-bf6e-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56d287d2-c9e4-4fc1-a696-0a84f8defb25', '56d287d2-254c-40c8-8e42-0a84f8defb25'),
('56dd25f6-d734-405d-8ac3-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565fba8d-7f9c-4b2f-a977-08d8f8defb25', '565fba8d-7de0-4dc5-935d-08d8f8defb25'),
('56dd25f6-d734-4859-95d6-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565fba8d-7f9c-4b2f-a977-08d8f8defb25', '565fba8d-7de0-4e35-800a-08d8f8defb25'),
('56dd25f6-daac-4b59-8c93-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cca80d-764c-4264-a157-0bf0f8defb25', '54cca80d-a9f4-4220-8e42-0bf0f8defb25'),
('56dd25f6-e2b8-49a9-b37b-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56d287d2-c9e4-4fc1-a696-0a84f8defb25', '56d287d2-abec-4bf3-9fe9-0a84f8defb25'),
('56dd25f6-e474-415d-8032-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '565fba8d-7f9c-4b2f-a977-08d8f8defb25', '565fba8d-f740-4f72-aabf-08d8f8defb25'),
('56dd25f6-e630-4581-b557-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d3d-6064-4b95-8a39-0d50f8defb25', '5653fdc0-b2e8-47c1-a432-02b4f8defb25'),
('56dd25f6-e7ec-4fca-af19-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-4020-4af1-9c7a-00acf8defb25'),
('56dd25f6-eff8-4e43-afb1-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd19d8-2b0c-4705-9757-01d4f8defb25', '56dd19d8-1a54-405c-a4f1-01d4f8defb25'),
('56dd25f6-f1b4-4061-9d1d-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-5fd8-4c6c-8bd0-0f8cf8defb25'),
('56dd25f6-f370-4bdf-9db3-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54e16d66-96cc-4569-b875-0d50f8defb25', '54e16d66-2b10-4353-9a8a-0d50f8defb25'),
('56dd25f6-f52c-49cb-a3de-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-d5bc-46f5-b56e-00acf8defb25'),
('56dd25f6-f52c-4b4f-b9a2-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '54cdd079-ff38-45e0-8097-00acf8defb25', '54cdd079-c6c0-4ff3-9c5b-00acf8defb25'),
('56dd25f6-fd38-4e4e-9a4f-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56dd19d8-2b0c-4705-9757-01d4f8defb25', '56dd19d8-a0f4-414b-a286-01d4f8defb25'),
('56dd25f6-fef4-42ed-87a1-01d4f8defb25', '53141664-f3c4-4696-b2b2-0d49f8defb25', '56cec903-c010-41f6-b8db-0f8cf8defb25', '56cec903-cbf8-490a-8cc2-0f8cf8defb25');

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

--
-- Dumping data for table `ns_photo_galleries`
--

INSERT INTO `ns_photo_galleries` (`id`, `department_id`, `title`, `image`, `created`, `status`) VALUES
('567b7678-eb48-4174-8b71-0c14f8defb25', '', 'fifth', '/img/frontend/album/thumb/PhotoGallery_image_161224064926.jpg', '2015-12-24 10:37:12', 'active'),
('567b768d-d160-4376-bed1-0c14f8defb25', '', 'asdf', '/img/frontend/album/thumb/PhotoGallery_image_161224064923.jpg', '2015-12-24 10:37:33', 'active');

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
('56cec922-cb00-4990-8693-0f8cf8defb25', 'admin_delete', '56cec922-b01c-4e05-af92-0f8cf8defb25');

-- --------------------------------------------------------

--
-- Table structure for table `ns_products`
--

CREATE TABLE IF NOT EXISTS `ns_products` (
`id` int(11) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `features` text,
  `upcoming_product` tinyint(4) NOT NULL DEFAULT '0',
  `highlighted_product` tinyint(4) NOT NULL DEFAULT '0',
  `new_arrival` tinyint(4) NOT NULL DEFAULT '0',
  `price` varchar(200) DEFAULT NULL,
  `brand` varchar(200) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `model` varchar(200) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

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
('547e9694-9dac-40b7-ad1c-0cf8f8defb25', 'Main Banner Slider', '', 368, 1000, 'active', 'home_page_top', '2014-12-03 10:50:28');

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
('56d2846f-68f0-4445-9ae4-0a84f8defb25', '547e9694-9dac-40b7-ad1c-0cf8f8defb25', 'Golden Star Banner Image', NULL, 3, '/img/frontend/slider_content/thumb/SliderContent_image_161231070031.jpg', 'active'),
('56d2848d-522c-41b5-baf8-0a84f8defb25', '547e9694-9dac-40b7-ad1c-0cf8f8defb25', 'Goden Star Banner Image', NULL, 1, '/img/frontend/slider_content/thumb/SliderContent_image_161231070116.jpg', 'active'),
('56d284b7-0e08-4d17-9f00-0a84f8defb25', '547e9694-9dac-40b7-ad1c-0cf8f8defb25', '2', NULL, 2, '/img/frontend/slider_content/thumb/SliderContent_image_161231045209.jpg', 'active'),
('5867ac54-cb78-401b-b049-4f72a2fb501b', '547e9694-9dac-40b7-ad1c-0cf8f8defb25', 'Golden Star Banner Image', NULL, 4, '/img/frontend/slider_content/thumb/SliderContent_image_161231070212.jpg', 'active');

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
('585e5917-b8bc-404c-ac24-0e70f8defb25', 'header', '', '', '<i class="fa fa-facebook"></i>', 'Facebook', 'https://www.facebook.com', 1),
('585e597f-2eb8-47fa-bd08-0e70f8defb25', 'header', '', '', '<i class="fa fa-twitter"></i>', 'Twitter', 'https://www.twitter.com', 2),
('585e59a2-4050-41ee-91f2-0e70f8defb25', 'header', '', '', '<i class="fa fa-linkedin"></i>', 'linkedin', 'https://www.linkedin.com', 3),
('585e59cd-b760-452b-afd3-0e70f8defb25', 'header', '', '', '<i class="fa fa-google-plus"></i>', 'googleplus', 'https://www.google.com', 4),
('585e5a26-ba00-4c9f-9e07-0e70f8defb25', 'footer', '', '', '<i class="fa fa-facebook"></i>', 'Facebook', 'https://www.facebook.com', 1),
('585e5a42-fb28-4900-92fb-0e70f8defb25', 'footer', '', '', '<i class="fa fa-twitter"></i>', 'Twitter', 'https://www.twitter.com', 2),
('585e5a5d-d8b0-483a-b71a-0e70f8defb25', 'footer', '', '', '<i class="fa fa-linkedin"></i>', 'linkedin', 'https://www.twitter.com', 3),
('585e5a7f-25d0-40ee-a015-0e70f8defb25', 'footer', '', '', '<i class="fa fa-google-plus"></i>', 'Google Plus', 'https://www.google.com', 4);

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
-- Indexes for table `ns_authorized_menus`
--
ALTER TABLE `ns_authorized_menus`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `ns_categories`
--
ALTER TABLE `ns_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `ns_products`
--
ALTER TABLE `ns_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
