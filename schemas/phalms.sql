/*
 Navicat Premium Data Transfer

 Source Server         : Mysql_lokal
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : localhost
 Source Database       : phalms

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : utf-8

 Date: 05/12/2017 09:51:37 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `file` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(555) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` int(5) DEFAULT NULL,
  `create_user` int(11) NOT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `description1` varchar(555) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `blog`
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `categories_id` int(10) unsigned NOT NULL,
  `updated` datetime DEFAULT NULL,
  `publish` int(10) NOT NULL,
  `publish_on` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `blog_categories`
-- ----------------------------
DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE `blog_categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `blog_categories`
-- ----------------------------
BEGIN;
INSERT INTO `blog_categories` VALUES ('0', 'news', 'news'), ('0', 'story', 'story');
COMMIT;

-- ----------------------------
--  Table structure for `email_confirmations`
-- ----------------------------
DROP TABLE IF EXISTS `email_confirmations`;
CREATE TABLE `email_confirmations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `code` char(32) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  `modifiedAt` int(10) unsigned DEFAULT NULL,
  `confirmed` char(1) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `email_confirmations`
-- ----------------------------
BEGIN;
INSERT INTO `email_confirmations` VALUES ('1', '5', 'bJfLbRf3vJeUeCjKytDsejJRvsL79fd6', '1491984699', null, 'N'), ('2', '6', 'RdRdwDVsAclgOv0rIM7YPu6b9zZfUo', '1491984874', null, 'N'), ('3', '7', 'yqjJxQMv4fO8G6RE2V6D6BdTA6qvjp43', '1491985012', null, 'N'), ('4', '6', 'JT3MoiRJwmna1U8TFfui5MpZtNEUsWEd', '1492048325', null, 'N'), ('5', '7', 'KBPQ7GWTfRjMWNaCvAucg8wCwKz9lC9', '1492048398', null, 'N'), ('6', '13', 'AsrqMNsWupOWyYrUYKQ6R5KQ0DRicV', '1493107318', null, 'N'), ('7', '14', 'TMzcdq57kjZGCMSn51zd8jBkldQvSsJ', '1493107625', null, 'N'), ('8', '15', 'sTKF7003coffhjAguGAWIXrFRZIv1mGE', '1493107870', null, 'N'), ('9', '16', 'gNrrzSm1LY9xffDLxVnxMi1iKJ5NJr', '1493107943', null, 'N');
COMMIT;

-- ----------------------------
--  Table structure for `failed_logins`
-- ----------------------------
DROP TABLE IF EXISTS `failed_logins`;
CREATE TABLE `failed_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned DEFAULT NULL,
  `ipAddress` char(15) NOT NULL,
  `attempted` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `failed_logins`
-- ----------------------------
BEGIN;
INSERT INTO `failed_logins` VALUES ('1', '0', '127.0.0.1', '1492048710'), ('2', '0', '127.0.0.1', '1492048728'), ('3', '0', '127.0.0.1', '1492048741'), ('4', '0', '127.0.0.1', '1492048768'), ('5', '0', '127.0.0.1', '1492048777'), ('6', '0', '127.0.0.1', '1492741180'), ('7', '0', '127.0.0.1', '1492741189'), ('8', '0', '127.0.0.1', '1494207086'), ('9', '0', '127.0.0.1', '1494207101'), ('10', '0', '127.0.0.1', '1494377198'), ('11', '0', '127.0.0.1', '1494377204'), ('12', '0', '127.0.0.1', '1494554469');
COMMIT;

-- ----------------------------
--  Table structure for `gallery`
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `description` text,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `gallery`
-- ----------------------------
BEGIN;
INSERT INTO `gallery` VALUES ('1', 'Kegiatan', 'kegiatan', 'kegiatan', '1', null, '2017-04-17 10:09:00', '2017-04-17 14:20:51'), ('2', 'testing', 'testing', 'testing', '1', null, '2017-04-17 12:27:12', null), ('3', 'jalan jalan', 'jalan-jalan', 'mari jalan jalan<br>', '1', null, '2017-05-09 08:07:08', null);
COMMIT;

-- ----------------------------
--  Table structure for `image`
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `description` text,
  `gallery_id` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `image`
-- ----------------------------
BEGIN;
INSERT INTO `image` VALUES ('21', 'tetot', '524aab37dcb4c3829df5f26a737b9831.jpg', 'testing', '1', null, null, '2017-04-17 14:20:25', '2017-04-17 14:20:51');
COMMIT;


-- ----------------------------
--  Table structure for `modules`
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `publish` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `page`
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `categories_id` int(10) unsigned NOT NULL,
  `updated` datetime DEFAULT NULL,
  `publish` int(10) NOT NULL,
  `publish_on` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pages_users` (`users_id`),
  KEY `fk_pages_categories` (`categories_id`),
  CONSTRAINT `fk_pages_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagess_categories` FOREIGN KEY (`categories_id`) REFERENCES `page_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `page`
-- ----------------------------
BEGIN;
INSERT INTO `page` VALUES ('77', 'Beasiswa Dai dan Imam Masjid', 'beasiswa-dai-dan-imam-masjid', 'test', '2017-04-17 08:44:14', '1', '1', '2017-04-26 09:35:55', '1', '1970-01-01 07:00:00', null), ('78', 'Pelatihan Dai dan Mubaligh Ramadhan', 'pelatihan-dai-dan-mubaligh-ramadhan', 'test', '2017-04-18 09:57:51', '1', '1', '2017-04-26 09:37:32', '1', '1970-01-01 07:00:00', '0fe4f8b5958db18606f528ab05035c91.jpg'), ('79', 'Pelatihan Da\'i Terjemahan Qur\'an', 'pelatihan-dai-terjemahan-quran', '', '2017-04-18 09:58:24', '1', '1', null, '1', '1970-01-01 07:00:00', null), ('80', 'Kegiatan Studi Islam Intensif', 'kegiatan-studi-islam-intensif', '', '2017-04-18 09:58:58', '1', '1', null, '1', '1970-01-01 07:00:00', null), ('81', 'Pengiriman Dai Pelosok Negeri', 'pengiriman-dai-pelosok-negeri', 'x', '2017-04-18 09:59:37', '1', '1', '2017-04-21 10:56:27', '1', '1970-01-01 07:00:00', '1b360dc6d1e366c0d79c8f6525ec0317.png');
COMMIT;

-- ----------------------------
--  Table structure for `page_categories`
-- ----------------------------
DROP TABLE IF EXISTS `page_categories`;
CREATE TABLE `page_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `page_categories`
-- ----------------------------
BEGIN;
INSERT INTO `page_categories` VALUES ('1', 'Improve Human Quality', 'improve-human-quality'), ('2', 'Economy Power Resource', 'economy-power-resource'), ('3', 'Social Care Program', 'sosial-care-program'), ('4', 'Profile', 'profile');
COMMIT;

-- ----------------------------
--  Table structure for `password_changes`
-- ----------------------------
DROP TABLE IF EXISTS `password_changes`;
CREATE TABLE `password_changes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `ipAddress` char(15) NOT NULL,
  `userAgent` varchar(48) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `password_changes`
-- ----------------------------
BEGIN;
INSERT INTO `password_changes` VALUES ('1', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv', '1492074854'), ('2', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv', '1492074897');
COMMIT;

-- ----------------------------
--  Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profilesId` int(10) unsigned NOT NULL,
  `resource` varchar(16) NOT NULL,
  `action` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profilesId` (`profilesId`)
) ENGINE=InnoDB AUTO_INCREMENT=335 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `permissions`
-- ----------------------------
BEGIN;
INSERT INTO `permissions` VALUES ('1', '3', 'users', 'index'), ('2', '3', 'users', 'search'), ('3', '3', 'profiles', 'index'), ('4', '3', 'profiles', 'search'), ('36', '2', 'users', 'index'), ('37', '2', 'users', 'search'), ('38', '2', 'users', 'edit'), ('39', '2', 'users', 'create'), ('40', '2', 'users', 'delete'), ('41', '2', 'users', 'list'), ('42', '2', 'users', 'changePassword'), ('43', '2', 'profiles', 'index'), ('44', '2', 'profiles', 'search'), ('45', '2', 'profiles', 'edit'), ('46', '2', 'profiles', 'create'), ('47', '2', 'profiles', 'delete'), ('48', '2', 'permissions', 'index'), ('271', '1', 'users', 'index'), ('272', '1', 'users', 'search'), ('273', '1', 'users', 'edit'), ('274', '1', 'users', 'create'), ('275', '1', 'users', 'delete'), ('276', '1', 'users', 'list'), ('277', '1', 'users', 'get'), ('278', '1', 'users', 'changePassword'), ('279', '1', 'profiles', 'index'), ('280', '1', 'profiles', 'list'), ('281', '1', 'profiles', 'search'), ('282', '1', 'profiles', 'edit'), ('283', '1', 'profiles', 'create'), ('284', '1', 'profiles', 'get'), ('285', '1', 'profiles', 'delete'), ('286', '1', 'banner', 'index'), ('287', '1', 'banner', 'list'), ('288', '1', 'banner', 'search'), ('289', '1', 'banner', 'edit'), ('290', '1', 'banner', 'create'), ('291', '1', 'banner', 'get'), ('292', '1', 'banner', 'delete'), ('293', '1', 'gallery', 'index'), ('294', '1', 'gallery', 'list'), ('295', '1', 'gallery', 'search'), ('296', '1', 'gallery', 'edit'), ('297', '1', 'gallery', 'create'), ('298', '1', 'gallery', 'get'), ('299', '1', 'gallery', 'delete'), ('300', '1', 'gallery', 'imagelist'), ('301', '1', 'gallery', 'imagecreate'), ('302', '1', 'gallery', 'imageedit'), ('303', '1', 'gallery', 'imagedelete'), ('304', '1', 'program', 'index'), ('305', '1', 'program', 'list'), ('306', '1', 'program', 'search'), ('307', '1', 'program', 'location'), ('308', '1', 'program', 'edit'), ('309', '1', 'program', 'create'), ('310', '1', 'program', 'get'), ('311', '1', 'program', 'delete'), ('312', '1', 'program', 'download'), ('313', '1', 'service', 'index'), ('314', '1', 'service', 'list'), ('315', '1', 'service', 'search'), ('316', '1', 'service', 'edit'), ('317', '1', 'service', 'create'), ('318', '1', 'service', 'get'), ('319', '1', 'service', 'delete'), ('320', '1', 'blog', 'index'), ('321', '1', 'blog', 'list'), ('322', '1', 'blog', 'search'), ('323', '1', 'blog', 'edit'), ('324', '1', 'blog', 'create'), ('325', '1', 'blog', 'get'), ('326', '1', 'blog', 'delete'), ('327', '1', 'page', 'index'), ('328', '1', 'page', 'list'), ('329', '1', 'page', 'search'), ('330', '1', 'page', 'edit'), ('331', '1', 'page', 'create'), ('332', '1', 'page', 'get'), ('333', '1', 'page', 'delete'), ('334', '1', 'permissions', 'index');
COMMIT;

-- ----------------------------
--  Table structure for `profiles`
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `active` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `profiles`
-- ----------------------------
BEGIN;
INSERT INTO `profiles` VALUES ('1', 'Administrators', 'Y'), ('2', 'Users', 'Y'), ('3', 'Read-Only', 'Y');
COMMIT;

-- ----------------------------
--  Table structure for `remember_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `remember_tokens`;
CREATE TABLE `remember_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `token` char(32) NOT NULL,
  `userAgent` varchar(120) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `reset_passwords`
-- ----------------------------
DROP TABLE IF EXISTS `reset_passwords`;
CREATE TABLE `reset_passwords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `code` varchar(48) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  `modifiedAt` int(10) unsigned DEFAULT NULL,
  `reset` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `reset_passwords`
-- ----------------------------
BEGIN;
INSERT INTO `reset_passwords` VALUES ('1', '10', 'WPqxWEl2uut4FTqaboqJao8kl2i833TF', '1492056577', null, 'N');
COMMIT;

-- ----------------------------
--  Table structure for `success_logins`
-- ----------------------------
DROP TABLE IF EXISTS `success_logins`;
CREATE TABLE `success_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `ipAddress` char(15) NOT NULL,
  `userAgent` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `success_logins`
-- ----------------------------
BEGIN;
INSERT INTO `success_logins` VALUES ('1', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('2', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('3', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('4', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('5', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30'), ('6', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30'), ('7', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('8', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('9', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('10', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('11', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('12', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('13', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30'), ('14', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('15', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('16', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('17', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('18', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('19', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('20', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('21', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('22', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('23', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('24', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('25', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('26', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('27', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('28', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('29', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('30', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('31', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('32', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/52.0'), ('33', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('34', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('35', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30'), ('36', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('37', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('38', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30'), ('39', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30'), ('40', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('41', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('42', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30'), ('43', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30'), ('44', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('45', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('46', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('47', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:53.0) Gecko/20100101 Firefox/53.0'), ('48', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30'), ('49', '1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `mustChangePassword` char(1) DEFAULT NULL,
  `profilesId` int(10) unsigned NOT NULL,
  `banned` char(1) NOT NULL,
  `suspended` char(1) NOT NULL,
  `active` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profilesId` (`profilesId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'Dwi Agus', 'dwiagus@zakatforlife.com', '$2y$08$NHUwdytqZGg3cjFwbG90YujYBnIFYhyJSKBO3i8Z.ZfoJgR67nkdC', 'N', '1', 'N', 'N', 'Y'), ('10', 'Parno', 'parno@parno.com', '$2y$08$cEh2YU1UbkFhTkNobGJxN.o8hP9dDEyQJEJTE4i/AJ0EtYduv..56', 'N', '2', 'N', 'N', 'N'), ('11', 'dwi', 'dwi@dwi.dw', '$2y$08$dVJPRFQxUmRJOEpJWCtheebi0f8S/Z0oAlD9kXFNVa27P.JiGWrRu', 'N', '1', 'N', 'N', 'N');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
