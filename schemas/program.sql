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

 Date: 04/18/2017 16:01:08 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `program`
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `benefit` varchar(50) NOT NULL,
  `requirement` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL,
  `create_user` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `program_categories`
-- ----------------------------
DROP TABLE IF EXISTS `program_categories`;
CREATE TABLE `program_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `program_categories`
-- ----------------------------
BEGIN;
INSERT INTO `program_categories` VALUES ('1', 'Bantuan Usaha', 'bantuan-usaha');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
