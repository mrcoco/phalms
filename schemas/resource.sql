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

 Date: 05/20/2017 17:07:20 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `resource`
-- ----------------------------
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `resource`
-- ----------------------------
BEGIN;
INSERT INTO `resource` VALUES ('1', 'banner', 'index'), ('2', 'banner', 'list'), ('3', 'banner', 'edit'), ('4', 'banner', 'get'), ('5', 'banner', 'create'), ('6', 'banner', 'delete'), ('7', 'blog_category', 'index'), ('8', 'blog_category', 'all'), ('9', 'blog_category', 'list'), ('10', 'blog_category', 'create'), ('11', 'blog_category', 'edit'), ('12', 'blog_category', 'delete'), ('13', 'blog', 'index'), ('14', 'blog', 'list'), ('15', 'blog', 'create'), ('16', 'blog', 'edit'), ('17', 'blog', 'get'), ('18', 'blog', 'delete'), ('19', 'page_category', 'index'), ('20', 'page_category', 'all'), ('21', 'page_category', 'list'), ('22', 'page_category', 'create'), ('23', 'page_category', 'edit'), ('24', 'page_category', 'delete'), ('25', 'page', 'index'), ('26', 'page', 'list'), ('27', 'page', 'create'), ('28', 'page', 'edit'), ('29', 'page', 'get'), ('30', 'page', 'delete'), ('31', 'base', 'index'), ('46', 'gallery', 'list'), ('47', 'gallery', 'imagelist'), ('48', 'gallery', 'index'), ('49', 'gallery', 'gallery'), ('50', 'gallery', 'image'), ('51', 'gallery', 'imagecreate'), ('52', 'gallery', 'imageedit'), ('53', 'gallery', 'imagedelete'), ('54', 'gallery', 'get'), ('55', 'gallery', 'create'), ('56', 'gallery', 'edit'), ('57', 'gallery', 'delete'), ('58', 'gallery', 'index'), ('59', 'generator', 'index'), ('66', 'menu', 'index'), ('67', 'menu', 'list'), ('68', 'menu', 'create'), ('69', 'menu', 'edit'), ('70', 'menu', 'get'), ('71', 'menu', 'delete'), ('72', 'modules', 'index'), ('73', 'modules', 'list'), ('74', 'modules', 'edit'), ('75', 'modules', 'get'), ('76', 'modules', 'delete'), ('82', 'permissions', 'index'), ('83', 'profiles', 'index'), ('84', 'profiles', 'list'), ('85', 'profiles', 'search'), ('86', 'profiles', 'create'), ('87', 'profiles', 'edit'), ('88', 'profiles', 'delete'), ('92', 'users', 'index'), ('93', 'users', 'list'), ('94', 'users', 'create'), ('95', 'users', 'get'), ('96', 'users', 'edit'), ('97', 'users', 'delete'), ('98', 'users', 'changePassword');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
