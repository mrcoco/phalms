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

 Date: 05/24/2017 13:49:51 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
