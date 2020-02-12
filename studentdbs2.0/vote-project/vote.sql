/*
Navicat MySQL Data Transfer

Source Server         : 本地连接
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : user

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-09-19 09:25:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for vote
-- ----------------------------
DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '候选人姓名',
  `summary` varchar(255) DEFAULT NULL COMMENT '候选人简历',
  `caseshow` varchar(255) DEFAULT NULL COMMENT '案例简介',
  `position` varchar(100) DEFAULT NULL COMMENT '职位',
  `pic` char(255) DEFAULT NULL COMMENT '照片',
  `url` char(200) DEFAULT NULL COMMENT '案例链接',
  `votenum` int(10) DEFAULT '0' COMMENT '得票数',
  `status` tinyint(11) NOT NULL DEFAULT '1' COMMENT '是否有效',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vote
-- ----------------------------
INSERT INTO `vote` VALUES ('1', '卢敏放', '具有丰富的快消品和乳业企业管理经验，对中国及全球市场有充分理解和丰富知识。', '蒙牛注重将企业社会责任（CSR）管理理念融入供应链管理中，打造“你中有我、再生循环”的生态圈共赢成长模式。', '蒙牛集团CEO', '20170919104520_wiOR.jpg', '#', '12', '1');
INSERT INTO `vote` VALUES ('2', '潘刚', '中国人民大学经济学博士，第十二届全国政协委员，全国工商联副主席，全国青联副主席，中国青年企业家协会会长。', '在董事长潘刚的带领下，伊利通过整合全球优质自然资源和智力资源，打造全球智慧链，助推企业快速发展。', '伊利集团董事长、总裁', '20170919104709_9xWB.jpg', 'https://mp.weixin.qq.com/s?__biz=MjM5NzY4MzQyMQ==&mid=2650081095&idx=2&sn=4105005addcb22b1b98f4635439a6b75&chksm=bed7eef589a067e38701d5bdca0648bcd612337e35eeeee5079c58c95fc0178667fe87ece7a6&mpshare=1&', '114', '1');
INSERT INTO `vote` VALUES ('3', '孙丽军', '孙丽军女士现为SAP全球副总裁、大中华区首席营销官。她连续多年被权威媒体评为最佳CMO ，并在众多权威杂志上发表文章，涵盖大数据营销、体育营销、文化与领导力等领域。孙女士毕业于清华大学，获得工程学士和硕士学位，她还拥有法国HEC/伦敦商学院的MBA。', 'SAP大中华区营销部践行3P战略，在重塑品牌(Perception )、推动业务增长(Portfolio)和打造面向未来的营销团队(People)上寻求突破，实现从CMO到CGO的华丽转身。', 'SAP全球副总裁,大中华区首席营销官', '20170919105042_sdRI.jpg', '#', '33', '1');
