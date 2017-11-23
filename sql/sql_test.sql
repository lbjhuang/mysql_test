//分组条件筛选（统计每一个title的数量并用group_concat把所有id和title组合选出来）
CREATE TABLE `im_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(11) DEFAULT '0' COMMENT '父级id',
  `create_time` int(11) DEFAULT '0',
  PRIMARY KEY (`cate_id`),
  KEY `key_pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of im_category
-- ----------------------------
INSERT INTO `im_category` VALUES ('1', '数码', '0', '1510068491');
INSERT INTO `im_category` VALUES ('2', '手机', '1', '1510052491');
INSERT INTO `im_category` VALUES ('3', '华为', '2', '1510012491');
INSERT INTO `im_category` VALUES ('4', '电脑', '1', '1510012091');
INSERT INTO `im_category` VALUES ('5', '联想', '4', '1510072764');
INSERT INTO `im_category` VALUES ('7', '酷派', '2', '1510072826');
INSERT INTO `im_category` VALUES ('8', '服装', '0', '1510107152');
INSERT INTO `im_category` VALUES ('9', '宠物', '0', '1510199888');
INSERT INTO `im_category` VALUES ('10', '狗狗', '9', '1510199904');

SELECT COUNT(title) AS title_num, GROUP_CONCAT(CONCAT_WS(':',cate_id,title) SEPARATOR ', ') AS id_title, pid from im_category where create_time >= 1510052491 GROUP BY pid;