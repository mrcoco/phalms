/*
 Navicat Premium Data Transfer

 Source Server         : Mysql_lokal
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : localhost
 Source Database       : zakat

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : utf-8

 Date: 04/21/2017 13:20:10 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `donation`
-- ----------------------------
DROP TABLE IF EXISTS `donation`;
CREATE TABLE `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(555) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `confirmation` int(11) NOT NULL,
  `donation` decimal(10,0) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `program_id` int(11) DEFAULT NULL,
  `approve` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `donation`
-- ----------------------------
BEGIN;
INSERT INTO `donation` VALUES ('1', 'Dwi Agus', 'dwiagus@cempakaweb.com', 'Jl Godean', 'BNI', '123456789', '0', '100000', '2017-04-20 14:56:54', '14', '0');
COMMIT;

-- ----------------------------
--  Table structure for `program`
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `benefit` varchar(50) NOT NULL,
  `requirement` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location` int(11) NOT NULL,
  PRIMARY KEY (`id`,`title`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `program`
-- ----------------------------
BEGIN;
INSERT INTO `program` VALUES ('14', 'pembangunan Masjid bantul', 'testing', null, '3', '2017-04-01', '2017-04-30', '500', '100000', '1', '1', '2017-04-20 10:24:28', '2017-04-20 11:27:57', '1');
COMMIT;

-- ----------------------------
--  Table structure for `program_categories`
-- ----------------------------
DROP TABLE IF EXISTS `program_categories`;
CREATE TABLE `program_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `program_categories`
-- ----------------------------
BEGIN;
INSERT INTO `program_categories` VALUES ('1', 'Bantuan Usaha', 'bantuan-usaha'), ('2', 'Pengobatan Gratis', 'pengobatan-gratis'), ('3', 'Pembangunan Masjid', 'pembangunan-masjid');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
