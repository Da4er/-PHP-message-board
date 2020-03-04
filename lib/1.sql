/*
Navicat MySQL Data Transfer

Source Server         : Da4er
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : comment_database

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-03-03 20:28:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '../upload/4.jpg');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pub_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('3', '', 'c22a40fc1112b3de6ae058169b9f2b20', '6666', '11212', '2020-03-02');
INSERT INTO `user` VALUES ('4', 'admin', 'admin', '6666', '11212', '2020-03-02');
INSERT INTO `user` VALUES ('5', 'da4er', '789', '6666', './upload/3.jpg', '2020-03-02');
INSERT INTO `user` VALUES ('6', '5555', '6074c6aa3488f3c2dddff2a7ca821aab', 'happyctfd@mail.buuoj.cn', './upload/3.jpg', '2020-03-02');
INSERT INTO `user` VALUES ('7', '45369', '202cb962ac59075b964b07152d234b70', '11@qq.com', './upload/3.jpg', '2020-03-02');
INSERT INTO `user` VALUES ('8', 'sdsd', 'qwead', '6666', './upload/3.jpg', '2020-03-02');
INSERT INTO `user` VALUES ('9', '$username', '$passowrd', '$email', '$picture', '2020-03-02');
INSERT INTO `user` VALUES ('10', '$username1', '$passowrd1', '$emai111l', '$picture', '2020-03-02');
INSERT INTO `user` VALUES ('11', '$username2', '$passowrd4', '$emai111l', '$picture', '2020-03-02');
INSERT INTO `user` VALUES ('12', 'Administrators', '315eb115d98fcbad39ffc5edebd669c9', '345@qq.com', './upload/3.jpg', '2020-03-02');
INSERT INTO `user` VALUES ('13', 'da4ers', '896', '', './upload/3.jpg', '2020-03-02');
INSERT INTO `user` VALUES ('14', 'qwe', '250cf8b51c773f3f8dc8b4be867a9a02', '3@qq.com', '/upload/images/2020_03_03/Upload_2020_03_03_07_18_56_574097.jpg', '2020-03-03');
