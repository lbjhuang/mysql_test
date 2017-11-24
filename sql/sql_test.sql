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


CREATE TABLE `im_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(120) NOT NULL DEFAULT '',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `goods_sn` char(15) NOT NULL DEFAULT '',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '0',
  `shop_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of im_goods
-- ----------------------------
INSERT INTO `im_goods` VALUES ('1', 'kd876', '4', '8', 'ecs000000', '1', '1388.00', '1665.60', '9');
INSERT INTO `im_goods` VALUES ('4', '诺基亚n85原装充电器', '8', '1', 'ecs000004', '17', '58.00', '69.60', '0');
INSERT INTO `im_goods` VALUES ('3', '诺基亚原装5800耳机', '8', '1', 'ecs000002', '24', '68.00', '81.60', '3');
INSERT INTO `im_goods` VALUES ('5', '索爱原装m2卡读卡器', '11', '7', 'ecs000005', '8', '20.00', '24.00', '3');
INSERT INTO `im_goods` VALUES ('6', '胜创kingmax内存卡', '11', '0', 'ecs000006', '15', '42.00', '50.40', '0');
INSERT INTO `im_goods` VALUES ('7', '诺基亚n85原装立体声耳机hs-82', '8', '1', 'ecs000007', '20', '100.00', '120.00', '0');
INSERT INTO `im_goods` VALUES ('8', '飞利浦9@9v', '3', '4', 'ecs000008', '1', '399.00', '478.79', '10');
INSERT INTO `im_goods` VALUES ('9', '诺基亚e66', '3', '1', 'ecs000009', '4', '2298.00', '2757.60', '20');
INSERT INTO `im_goods` VALUES ('10', '索爱c702c', '3', '7', 'ecs000010', '7', '1328.00', '1593.60', '11');
INSERT INTO `im_goods` VALUES ('11', '索爱c702c', '3', '7', 'ecs000011', '1', '1300.00', '0.00', '0');
INSERT INTO `im_goods` VALUES ('12', '摩托罗拉a810', '3', '2', 'ecs000012', '8', '983.00', '1179.60', '13');
INSERT INTO `im_goods` VALUES ('13', '诺基亚5320 xpressmusic', '3', '1', 'ecs000013', '8', '1311.00', '1573.20', '13');
INSERT INTO `im_goods` VALUES ('14', '诺基亚5800xm', '4', '1', 'ecs000014', '1', '2625.00', '3150.00', '6');
INSERT INTO `im_goods` VALUES ('15', '摩托罗拉a810', '3', '2', 'ecs000015', '3', '788.00', '945.60', '8');
INSERT INTO `im_goods` VALUES ('16', '恒基伟业g101', '2', '11', 'ecs000016', '0', '823.33', '988.00', '3');
INSERT INTO `im_goods` VALUES ('17', '夏新n7', '3', '5', 'ecs000017', '1', '2300.00', '2760.00', '2');
INSERT INTO `im_goods` VALUES ('18', '夏新t5', '4', '5', 'ecs000018', '1', '2878.00', '3453.60', '0');
INSERT INTO `im_goods` VALUES ('19', '三星sgh-f258', '3', '6', 'ecs000019', '12', '858.00', '1029.60', '7');
INSERT INTO `im_goods` VALUES ('20', '三星bc01', '3', '6', 'ecs000020', '12', '280.00', '336.00', '14');
INSERT INTO `im_goods` VALUES ('21', '金立 a30', '3', '10', 'ecs000021', '40', '2000.00', '2400.00', '4');
INSERT INTO `im_goods` VALUES ('22', '多普达touch hd', '3', '3', 'ecs000022', '1', '5999.00', '7198.80', '16');
INSERT INTO `im_goods` VALUES ('23', '诺基亚n96', '5', '1', 'ecs000023', '8', '3700.00', '4440.00', '17');
INSERT INTO `im_goods` VALUES ('24', 'p806', '3', '9', 'ecs000024', '100', '2000.00', '2400.00', '35');
INSERT INTO `im_goods` VALUES ('25', '小灵通/固话50元充值卡', '13', '0', 'ecs000025', '2', '48.00', '57.59', '0');
INSERT INTO `im_goods` VALUES ('26', '小灵通/固话20元充值卡', '13', '0', 'ecs000026', '2', '19.00', '22.80', '0');
INSERT INTO `im_goods` VALUES ('27', '联通100元充值卡', '15', '0', 'ecs000027', '2', '95.00', '100.00', '0');
INSERT INTO `im_goods` VALUES ('28', '联通50元充值卡', '15', '0', 'ecs000028', '0', '45.00', '50.00', '0');
INSERT INTO `im_goods` VALUES ('29', '移动100元充值卡', '14', '0', 'ecs000029', '0', '90.00', '0.00', '0');
INSERT INTO `im_goods` VALUES ('30', '移动20元充值卡', '14', '0', 'ecs000030', '9', '18.00', '21.00', '1');
INSERT INTO `im_goods` VALUES ('31', '摩托罗拉e8 ', '3', '2', 'ecs000031', '1', '1337.00', '1604.39', '5');
INSERT INTO `im_goods` VALUES ('32', '诺基亚n85', '3', '1', 'ecs000032', '4', '3010.00', '3612.00', '9');

SELECT goods_id, cat_id, shop_price, goods_name FROM im_goods WHERE cat_id = 3 AND (shop_price > 1000 OR shop_price > 3000) AND click_count > 10;
SELECT goods_id, cat_id, shop_price, goods_name FROM im_goods WHERE cat_id = 3 AND (shop_price BETWEEN 1000 AND 3000) AND click_count > 10;
SELECT goods_id, cat_id, shop_price, goods_name FROM im_goods WHERE shop_price > 100 AND click_count > 1 AND goods_name LIKE "诺基亚%";
SELECT goods_id, cat_id, shop_price, goods_name FROM im_goods WHERE shop_price > 100 AND click_count > 1 AND goods_name LIKE "_星%";

//满足价格在1000以上，点击数大于10的条件下，根据价格排序，根据分类id分组，并且组合记录字段，根据价格排序。
SELECT cat_id,
GROUP_CONCAT(CONCAT_WS('-----', goods_name, shop_price, click_count) ORDER BY shop_price DESC) AS named,
MAX(shop_price) AS max_price,
AVG (shop_price) AS avarage_price FROM im_goods
WHERE shop_price > 1000 AND click_count > 10 AND goods_name LIKE "诺基亚%"
GROUP BY cat_id
ORDER BY shop_price DESC ;

SELECT goods_id, cat_id, goods_name, shop_price FROM im_goods WHERE cat_id NOT IN (3,10) ORDER BY shop_price desc;

SELECT goods_id, cat_id, goods_name, shop_price FROM im_goods WHERE (shop_price > 1000 AND shop_price < 3000) OR (shop_price > 4000 AND shop_price < 5000);
SELECT goods_id, cat_id, goods_name, shop_price FROM im_goods WHERE (shop_price BETWEEN 1000 AND  3000) OR (shop_price BETWEEN 4000 AND 5000);

//把诺基亚开头商品名字替换成HTC
SELECT CONCAT('HTC', SUBSTRING(goods_name, 4)) FROM im_goods WHERE goods_name LIKE "诺基亚%";

//把商品价格保留与价格最近10位的数字，如115修改成110，3584改成3580
SELECT goods_name, shop_price, FLOOR(shop_price/10)*10 AS price FROM im_goods;