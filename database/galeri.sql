/*
Navicat MySQL Data Transfer

Source Server         : localmysql
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : wg_circle

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2018-03-19 15:05:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `galeri`
-- ----------------------------
DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL,
  `user` varchar(50) NOT NULL,
  `updated_at` timestamp NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of galeri
-- ----------------------------
INSERT INTO `galeri` VALUES ('1', 'Reuni Akbar Undip', 'Kabupaten Karawang akan mengarahkan penataan ruangnya untuk menjadikan pertanian dan industri sebaga', '/upload/images/Reuni-Akbar-Undip-1.jpeg', '2018-03-19 07:07:20', '', '2018-03-19 07:08:05');
