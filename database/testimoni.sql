/*
Navicat MySQL Data Transfer

Source Server         : localmysql
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : wg_circle

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2018-03-19 15:13:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `testimoni`
-- ----------------------------
DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `user` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of testimoni
-- ----------------------------
INSERT INTO `testimoni` VALUES ('2', 'Testimoni Fitria Meilisa - WG Circle Closing Fee, Commission Fee, Bonus Trip', 'Testimoni Dhiana - WG Circle, Cara Mudah, Reward Banyak, Cair Cepat', '', 'Testimoni', '2017-09-09 15:55:53', '2018-03-19 07:20:23', 'http://wgcircle.com/wp-content/uploads/2016/07/Testimoni-Dhiana-WG-Circle-Cara-Mudah-Reward-Banyak-Cair-Cepat.mp4');
