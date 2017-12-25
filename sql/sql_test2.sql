CREATE TABLE IF NOT EXISTS `employee` (
  `id`INT AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `age` TINYINT UNSIGNED COMMENT '年龄', #tinyint可以有无符号表示，unsigned无符号就是告诉mysql这个字段用tinyint中不包括从0开始，如果存入负数等会报错out of range
  `em_sn` TINYINT(5) UNSIGNED ZEROFILL COMMENT '工号',   #zerofill 0填充
  `salary` FLOAT(8,2) UNSIGNED COMMENT '工资', #浮点数float和double有精度损失  DECIMAL 没有
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;