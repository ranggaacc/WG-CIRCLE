/*
Navicat MySQL Data Transfer

Source Server         : localmysql
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : wg_circle

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2018-03-19 15:13:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `event`
-- ----------------------------
DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `picture` text,
  `user` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `penyelenggara` varchar(150) DEFAULT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of event
-- ----------------------------
INSERT INTO `event` VALUES ('1', 'Topping Off Tamansari Mahogany – Karawang', 'Kabupaten Karawang akan mengarahkan penataan ruangnya untuk menjadikan pertanian dan industri sebagai basis ekonomi wilayah. Dalam pengembangannya, Karawang akan berupaya mensinergikan kedua sektor tersebut, sehingga tidak terjadi alih fungsi lahan pertanian menjadi kawasan industri. Saat ini, Karawang memegang peranan sebagai penghasil padi terbesar di Provinsi Jawa Barat. Namun, pengembangan industri yang memberi kontribusi lebih dari 50% terhadap PDRB Kabupaten Karawang juga tak kalah pentingnya', '2017-09-09 16:05:29', '/upload/images/Topping-Off-Tamansari-Mahogany-Karawang-4.jpeg', null, null, '2018-03-19', 'Wika Gedung', 'Karawang');
