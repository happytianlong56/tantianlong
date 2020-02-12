/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50554
Source Host           : localhost:3306
Source Database       : student04

Target Server Type    : MYSQL
Target Server Version : 50554
File Encoding         : 65001

Date: 2020-01-10 11:37:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_bin NOT NULL,
  `publish_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '不好，非常不好，用了一个多月，表笔插口就虚接了，每回都要用手按着才能用，联系客服还得给邮回去修，我说给我返10元我自己找人修还不行，我天天用表，一来一回10多天，根本不为顾客考虑，态度还恶劣，差评！', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('2', '36', '很好用，方便，量出来的数值也挺准的，大小也刚好合适\r\n', '2020-02-07 08:42:21');
INSERT INTO `comment` VALUES ('3', '37', '电流表很好用 小巧方便携带 第一次买感觉不错 推荐购买！！！\r\n', '2020-01-16 08:43:01');
INSERT INTO `comment` VALUES ('4', '37', '电流表很好用 小巧方便携带 第一次买感觉不错 推荐购买！！！\r\n', '2020-01-09 08:46:45');
INSERT INTO `comment` VALUES ('6', '38', '非常好用，下次还来！', '2020-01-10 08:50:45');
INSERT INTO `comment` VALUES ('7', '1', '好用！物流特别快。推荐购买哦。', '2020-01-24 08:51:34');
INSERT INTO `comment` VALUES ('8', '36', '很好的一次购物', '2020-01-08 08:53:06');
INSERT INTO `comment` VALUES ('9', '37', '不错的一次购物！', '2020-01-10 08:53:49');
INSERT INTO `comment` VALUES ('10', '38', '下次还继续买', '2020-01-10 08:54:21');
INSERT INTO `comment` VALUES ('11', '37', ' 不错的用户体验', '0000-00-00 00:00:00');
