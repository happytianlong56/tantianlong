/*
Navicat MySQL Data Transfer

Source Server         : phpmysql
Source Server Version : 50554
Source Host           : localhost:3306
Source Database       : student04

Target Server Type    : MYSQL
Target Server Version : 50554
File Encoding         : 65001

Date: 2020-02-03 18:26:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '123456');
INSERT INTO `admin` VALUES ('2', '谭天龙', '111111');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(200) CHARACTER SET utf8 NOT NULL,
  `publish_time` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '习主席带领我们前进', '2020-01-04');
INSERT INTO `comment` VALUES ('2', '1', '习书记说的千真万确', '2020-01-03');
INSERT INTO `comment` VALUES ('3', '1', '总书记的思想带动全世界人名走向幸福', '2020-01-02');
INSERT INTO `comment` VALUES ('4', '1', '习主席讲话真深刻！非常有意义', '2020-01-01');
INSERT INTO `comment` VALUES ('5', '1', '仓鼠仓鼠在', '2019-12-31');
INSERT INTO `comment` VALUES ('6', '1', '844', '2019-12-30');
INSERT INTO `comment` VALUES ('7', '1', '从在市场上', '2019-12-29');
INSERT INTO `comment` VALUES ('8', '1', '5645', '2019-12-26');
INSERT INTO `comment` VALUES ('9', '1', '9848', '2019-11-27');
INSERT INTO `comment` VALUES ('10', '1', '561651', '2019-10-16');
INSERT INTO `comment` VALUES ('11', '1', '常州市常州市', '2019-08-23');
INSERT INTO `comment` VALUES ('26', '2', '防守打法', '2020-01-22');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '你的小学在哪里上？');
INSERT INTO `question` VALUES ('2', '你的最好朋友的姓名？');
INSERT INTO `question` VALUES ('3', '你的最有纪念意义的日期？');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nickname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 NOT NULL,
  `question` int(2) NOT NULL,
  `answer` varchar(100) CHARACTER SET utf8 NOT NULL,
  `logintime` datetime NOT NULL,
  `lasttime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '732494393@qq.com', '谭天龙', '5656', '2', '小明', '2020-01-08 08:41:06', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES ('2', '2', '2', '2', '2', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vote
-- ----------------------------
INSERT INTO `vote` VALUES ('1', '卢敏放', '具有丰富的快消品和乳业企业管理经验，对中国及全球市场有充分理解和丰富知识。', '蒙牛注重将企业社会责任（CSR）管理理念融入供应链管理中，打造“你中有我、再生循环”的生态圈共赢成长模式。', '蒙牛集团CEO', 'upload/20200123200304.jpg', '12', '12', '1');
INSERT INTO `vote` VALUES ('2', '潘刚', '中国人民大学经济学博士，第十二届全国政协委员，全国工商联副主席，全国青联副主席，中国青年企业家协会会长。', '在董事长潘刚的带领下，伊利通过整合全球优质自然资源和智力资源，打造全球智慧链，助推企业快速发展。', '伊利集团董事长、总裁', 'upload/20200123201058jfif', 'https://mp.weixin.qq.com/s?__biz=MjM5NzY4MzQyMQ==&mid=2650081095&idx=2&sn=4105005addcb22b1b98f4635439a6b75&chksm=bed7eef589a067e38701d5bdca0648bcd612337e35eeeee5079c58c95fc0178667fe87ece7a6&mpshare=1&', '15', '1');
INSERT INTO `vote` VALUES ('3', '孙丽军', '孙丽军女士现为SAP全球副总裁、大中华区首席营销官。她连续多年被权威媒体评为最佳CMO ，并在众多权威杂志上发表文章，涵盖大数据营销、体育营销、文化与领导力等领域。孙女士毕业于清华大学，获得工程学士和硕士学位，她还拥有法国HEC/伦敦商学院的MBA。', 'SAP大中华区营销部践行3P战略，在重塑品牌(Perception )、推动业务增长(Portfolio)和打造面向未来的营销团队(People)上寻求突破，实现从CMO到CGO的华丽转身。', 'SAP全球副总裁,大中华区首席营销官', 'upload/20200123201119.jpg', '28', '33', '1');

-- ----------------------------
-- Table structure for 学生
-- ----------------------------
DROP TABLE IF EXISTS `学生`;
CREATE TABLE `学生` (
  `学号` char(12) NOT NULL COMMENT '学号',
  `班号` char(8) NOT NULL,
  `性别` bit(1) NOT NULL,
  `出生日期` datetime DEFAULT NULL,
  `手机号` char(11) DEFAULT NULL,
  `照片` varchar(255) DEFAULT NULL,
  `姓名` varchar(20) NOT NULL,
  PRIMARY KEY (`学号`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 学生
-- ----------------------------
INSERT INTO `学生` VALUES ('B201903001', '1903B', '\0', '1990-02-12 00:00:00', '13895234512', null, '李国英');
INSERT INTO `学生` VALUES ('B201903002', '1903B', '', '1999-08-10 09:38:09', '15235689478', null, '高海旭');
INSERT INTO `学生` VALUES ('B201903003', '1903B', '', '1999-11-15 09:41:23', '13562487952', null, '郭大川');
INSERT INTO `学生` VALUES ('B201903004', '1903B', '', '1999-09-09 00:00:00', '13512345678', null, '宋世杰');
INSERT INTO `学生` VALUES ('B201903005', '1903B', '', '1999-06-06 00:00:00', '15115896426', '', '李婧');
INSERT INTO `学生` VALUES ('B201903006', '1903B', '', '2017-07-15 00:00:00', '15115897895', 'upload/20200103085056.jpg', '李四');
INSERT INTO `学生` VALUES ('B201903007', '1903B', '\0', '2020-01-01 08:14:39', '18812345678', null, '张三');
INSERT INTO `学生` VALUES ('B201903008', '1903B', '\0', '2019-11-27 08:15:37', '12112345678', null, '王五');
INSERT INTO `学生` VALUES ('B201903009', '1903B', '\0', '2020-01-04 08:16:20', '13112345678', null, '田滢滢');
INSERT INTO `学生` VALUES ('B201903010', '1903B', '', '2020-01-06 08:17:26', '13212345654', null, '吴绍坤');
INSERT INTO `学生` VALUES ('B201903011', '1903B', '\0', '2019-12-07 08:18:52', '15312345455', null, '宋文博');
INSERT INTO `学生` VALUES ('B201903033', '1903B', '', '2020-01-22 00:00:00', '13546542095', 'upload/20200123163238.jpg', 'tantianl');

-- ----------------------------
-- Table structure for 成绩
-- ----------------------------
DROP TABLE IF EXISTS `成绩`;
CREATE TABLE `成绩` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `学号` char(12) NOT NULL,
  `课程编号` varchar(20) NOT NULL,
  `成绩` tinyint(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `学号` (`学号`),
  KEY `课程` (`课程编号`),
  CONSTRAINT `课程_ibfk_2` FOREIGN KEY (`课程编号`) REFERENCES `课程` (`课程编号`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `成绩_ibfk_1` FOREIGN KEY (`学号`) REFERENCES `学生` (`学号`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 成绩
-- ----------------------------
INSERT INTO `成绩` VALUES ('2', 'B201903001', 'B01', '95');
INSERT INTO `成绩` VALUES ('3', 'B201903001', 'B02', '90');
INSERT INTO `成绩` VALUES ('4', 'B201903002', 'B01', '88');
INSERT INTO `成绩` VALUES ('5', 'B201903003', 'B01', '90');
INSERT INTO `成绩` VALUES ('6', 'B201903003', 'B03', '92');
INSERT INTO `成绩` VALUES ('7', 'B201903001', 'B03', '94');
INSERT INTO `成绩` VALUES ('8', 'B201903002', 'B03', '78');
INSERT INTO `成绩` VALUES ('9', 'B201903003', 'B04', '89');
INSERT INTO `成绩` VALUES ('10', 'B201903003', 'B02', '56');

-- ----------------------------
-- Table structure for 新闻
-- ----------------------------
DROP TABLE IF EXISTS `新闻`;
CREATE TABLE `新闻` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `标题` varchar(100) COLLATE utf8_bin NOT NULL,
  `肩题` varchar(300) COLLATE utf8_bin NOT NULL,
  `栏目名称` int(11) NOT NULL,
  `作者` varchar(20) COLLATE utf8_bin NOT NULL,
  `时间` datetime NOT NULL,
  `图片` varchar(255) COLLATE utf8_bin NOT NULL,
  `内容` varchar(4000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `栏目名称` (`栏目名称`),
  CONSTRAINT `新闻_ibfk_1` FOREIGN KEY (`栏目名称`) REFERENCES `栏目` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of 新闻
-- ----------------------------
INSERT INTO `新闻` VALUES ('1', '新年首次全面降准今起落地 8000亿红包谁会受益？', '原标题：新年首次全面降准今起落地 8000亿红包谁会受益？', '1', '中国新闻网', '2020-01-06 00:00:00', 'upload/20200120122437.jpg', '中新网客户端北京1月6日电(记者 李金磊)1月6日，央行新年首次全面降准正式落地。此次降准释放长期资金约8000多亿元，如此大的红包，谁会从中受益？');
INSERT INTO `新闻` VALUES ('5', '中考体育分提至100分 云南:缓解体育课被挤占情况', '原标题：中考体育分提至100分 云南:缓解体育课被挤占情况', '2', '环球网', '2020-01-04 00:00:00', 'upload/20200120122458jpeg', '近日，云南省教育厅发布《关于进一步深化高中阶段学校考试招生制度改革的实施意见》（以下称《实施意见》），“中考体育与语文、数学、英语并列100分的消息”刷爆了云南中小学生家长的朋友圈。根据新规，未来云南初中生中考时，除了传统的语文、英语、数学三门主科，还要考查物理、历史等11门的成绩，其中体育考试和三门主科一样，在总分700分中占100分。');
INSERT INTO `新闻` VALUES ('6', '武汉共发现不明原因病毒性肺炎59例 排除SARS等', '原标题：武汉共发现不明原因病毒性肺炎59例 排除SARS等', '3', '中国新闻网', '2020-01-03 00:00:00', 'upload/20200120122516.jpg', '通报称，流行病学调查显示，部分患者为武汉市华南海鲜城(华南海鲜批发市场)经营户。截至目前，初步调查表明，未发现明确的人传人证据，未发现医务人员感染。已排除流感、禽流感、腺病毒、传染性非典型肺炎(SARS)和中东呼吸综合征(MERS)等呼吸道病原。病原鉴定和病因溯源工作仍在进一步进行中');

-- ----------------------------
-- Table structure for 栏目
-- ----------------------------
DROP TABLE IF EXISTS `栏目`;
CREATE TABLE `栏目` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `栏目编号` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  `栏目名称` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `栏目名称` (`栏目名称`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of 栏目
-- ----------------------------
INSERT INTO `栏目` VALUES ('1', 'bw01', '北网新闻');
INSERT INTO `栏目` VALUES ('2', 'bw02', '北网公告');
INSERT INTO `栏目` VALUES ('3', 'bw03', '北网热点');
INSERT INTO `栏目` VALUES ('4', 'jw01', '教务新闻');
INSERT INTO `栏目` VALUES ('11', 'jw02', '教务公告');
INSERT INTO `栏目` VALUES ('12', 'jw03', '教务热点');

-- ----------------------------
-- Table structure for 班主任
-- ----------------------------
DROP TABLE IF EXISTS `班主任`;
CREATE TABLE `班主任` (
  `班主任ID` int(11) NOT NULL AUTO_INCREMENT,
  `班主任姓名` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `手机` char(11) NOT NULL,
  PRIMARY KEY (`班主任ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 班主任
-- ----------------------------
INSERT INTO `班主任` VALUES ('1', '侯老师', '13012345678');
INSERT INTO `班主任` VALUES ('2', '王老师', '13012345671');
INSERT INTO `班主任` VALUES ('3', '肖老师', '13012345672');
INSERT INTO `班主任` VALUES ('4', '赵老师', '13012348888');

-- ----------------------------
-- Table structure for 班级
-- ----------------------------
DROP TABLE IF EXISTS `班级`;
CREATE TABLE `班级` (
  `班号` char(8) CHARACTER SET utf8 NOT NULL COMMENT '班号',
  `教室` char(3) CHARACTER SET utf8 NOT NULL COMMENT '教室号',
  `班主任` int(11) NOT NULL COMMENT '班主任编号，外键，对应班主任表中的班主任id',
  `班长` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '班长姓名',
  PRIMARY KEY (`班号`),
  KEY `班主任` (`班主任`),
  CONSTRAINT `班级_ibfk_1` FOREIGN KEY (`班主任`) REFERENCES `班主任` (`班主任ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of 班级
-- ----------------------------
INSERT INTO `班级` VALUES ('1903B', '318', '1', '李国英');
INSERT INTO `班级` VALUES ('1904B', '412', '3', '谢小强');
INSERT INTO `班级` VALUES ('1905B', '231', '2', '李四');
INSERT INTO `班级` VALUES ('1907B', '541', '1', '张额');

-- ----------------------------
-- Table structure for 课程
-- ----------------------------
DROP TABLE IF EXISTS `课程`;
CREATE TABLE `课程` (
  `课程编号` varchar(20) NOT NULL,
  `课程名` varchar(20) NOT NULL,
  PRIMARY KEY (`课程编号`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程表';

-- ----------------------------
-- Records of 课程
-- ----------------------------
INSERT INTO `课程` VALUES ('A01', 'Java基础');
INSERT INTO `课程` VALUES ('B01', 'HTML+CSS基础');
INSERT INTO `课程` VALUES ('B02', 'HTML+JS基础');
INSERT INTO `课程` VALUES ('B03', 'JS中级');
INSERT INTO `课程` VALUES ('B04', 'JS高级');
INSERT INTO `课程` VALUES ('B05', 'JS面向对象');
INSERT INTO `课程` VALUES ('B06', 'jQuery+ajax');
INSERT INTO `课程` VALUES ('B07', 'PHP+mysql');
