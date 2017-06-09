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

 Date: 05/24/2017 14:58:12 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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

SET FOREIGN_KEY_CHECKS = 1;
