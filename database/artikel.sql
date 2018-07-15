/*
Navicat MySQL Data Transfer

Source Server         : localmysql
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : wg_circle

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2018-03-19 15:13:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `artikel`
-- ----------------------------
DROP TABLE IF EXISTS `artikel`;
CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user` varchar(200) NOT NULL,
  `picture` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of artikel
-- ----------------------------
INSERT INTO `artikel` VALUES ('1', 'Karawang, Industri dan Transportasinya', '<p>Kabupaten Karawang akan mengarahkan penataan ruangnya untuk menjadikan pertanian dan industri sebagai basis ekonomi wilayah. Dalam pengembangannya, Karawang akan berupaya mensinergikan kedua sektor tersebut, sehingga tidak terjadi alih fungsi lahan pertanian menjadi kawasan industri. Saat ini, Karawang memegang peranan sebagai penghasil padi terbesar di Provinsi Jawa Barat. Namun, pengembangan industri yang memberi kontribusi lebih dari 50% terhadap PDRB Kabupaten Karawang juga tak kalah pentingnya. Dengan berbasis pada sektor pertanian dan industri, Karawang memiliki program pertahanan lahan pangan berkelanjutan, dan optimalisasi pemanfaatan kawasan industri. Namun demikian, lahan pertanian yang tersebar di kawasan perdesaan bagian utara Karawang pada saat ini menghadapi beberapa ancaman. Antara lain, perkembangan perkotaan, terjadinya banjir, menurunnya irigasi serta rencana pembangunan jalan lintas utara Jawa Barat dan rencana pembangunan pelabuhan Cilamaya. Hal ini mendasari upaya pertahanan lahan pertanian dengan meminimalkan potensi alih fungsi lahan pertanian menjadi fungsi peruntukan dan penggunaan lainnya seperti industri. Pemerintah akan melakukan pengembangan sektor tersebut yang dilakukan pada lahan-lahan marginal yang tandus di bagian selatan Kabupaten Karawang. Pihaknya juga menjamin diupayakannya optimalisasi lahan untuk kawasan industri, dan tidak ada alih fungsi lahan pertanian dalam pengembangan tersebut. Kabupaten Karawang akan mengarahkan penataan ruangnya untuk menjadikan pertanian dan industri sebagai basis ekonomi wilayah. Dalam pengembangannya, Karawang akan berupaya mensinergikan kedua sektor tersebut, sehingga tidak terjadi alih fungsi lahan pertanian menjadi kawasan industri. Saat ini, Karawang memegang peranan sebagai penghasil padi terbesar di Provinsi Jawa Barat. Namun, pengembangan industri yang memberi kontribusi lebih dari 50% terhadap PDRB Kabupaten Karawang juga tak kalah pentingnya. Dengan berbasis pada sektor pertanian dan industri, Karawang memiliki program pertahanan lahan pangan berkelanjutan, dan optimalisasi pemanfaatan kawasan industri. Namun demikian, lahan pertanian yang tersebar di kawasan perdesaan bagian utara Karawang pada saat ini menghadapi beberapa ancaman. Antara lain, perkembangan perkotaan, terjadinya banjir, menurunnya irigasi serta rencana pembangunan jalan lintas utara Jawa Barat dan rencana pembangunan pelabuhan Cilamaya. Hal ini mendasari upaya pertahanan lahan pertanian dengan meminimalkan potensi alih fungsi lahan pertanian menjadi fungsi peruntukan dan penggunaan lainnya seperti industri. Pemerintah akan melakukan pengembangan sektor tersebut yang dilakukan pada lahan-lahan marginal yang tandus di bagian selatan Kabupaten Karawang. Pihaknya juga menjamin diupayakannya optimalisasi lahan untuk kawasan industri, dan tidak ada alih fungsi lahan pertanian dalam pengembangan tersebut.</p>\r\n', 'Artikel', '2017-07-03 02:46:56', '2018-03-19 07:53:55', '', '/upload/images/Slide1.jpg');
INSERT INTO `artikel` VALUES ('2', 'Yuk, kenali Potensi Kota Karawang!', 'Potensi Kabupaten Karawang, Jawa Barat, semakin berkembang mengingat kawasan industri di daerah ini juga terus tumbuh. Padahal, dulu Karawang lebih dikenal sebagai daerah pertanian atau lumbung padi nasional', 'Artikel', '2018-03-19 05:17:01', '2018-03-19 05:17:01', '', '/upload/images/DJI_0011-1-1024x768.jpg');
