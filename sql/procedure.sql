use company;

/*1 创建一个存储过程*/
DELIMITER $$
create procedure proc_emplo_sal ()
comment '查询所有雇员的工资'
begin
  select sal from t_employee;
end $$


/*调用这个存储过程*/
call proc_emplo_sal ();

/*显示当前所有存储过程*/
show PROCEDURE status;


/*2  declare申明变量： 变量名 变量类型*/
DELIMITER $$
CREATE PROCEDURE pr1
  BEGIN
    DECLARE age INT DEFAULT 22;
    DECLARE height INT DEFAULT 180;
    SELECT concat('20年后年龄是',age+20,'身高是',height);
  END $$

/*3 if then else endif语句*/
CREATE PROCEDURE pr2
  BEGIN
    DECLARE age INT DEFAULT 22;
    IF age >= 18 THEN
      SELECT '你已经成年';
    ELSE
      SELECT '未成年';
    END IF;
  END $$


/*4 创建一个带in参数的存储过程*/
DELIMITER $$
create procedure delete_row (in p_id int)
  comment'根据id删除表记录'
  begin
    delete from user where id = p_id;
  end $$
DELIMITER $$

call delete_row(2);

CREATE PROCEDURE pr3(width int, height int)
  BEGIN
    SELECT concat('你的面积是', width*height) as area;
    IF width > height THEN
      SELECT '你很胖' as comment;
    ELSE
      SELECT '你很瘦' as comment;
    END IF;
  END $$

CALL pr3(20, 55);

/*5 while n前面的数字的和*/
CREATE PROCEDURE pr4(IN n INT)
  BEGIN
      DECLARE num INT DEFAULT 0;
      DECLARE total INT DEFAULT 0;
      WHILE num < n+1 DO
        SET total := total + num;
        SET num := num+1;
      END WHILE;

    SELECT total;
  END $$

/*6 out 输出*/
DELIMITER $$
CREATE PROCEDURE pr5(IN n INT, OUT total INT)
  BEGIN
    DECLARE num INT DEFAULT 0;
    SET total := 0;
    WHILE num < n+1 DO
      SET total := total + num;
      SET num := num+1;
    END WHILE;
  END $$


CALL pr5(100, @total);   /*输出total*/
SELECT @total;  /*打印total*/

/*7 inout 输入输出*/
DELIMITER $$
CREATE PROCEDURE pr6(INOUT age INT)
  BEGIN
      SET age := age+10;
  END $$

SET @age= 20;  /*先设置age的值*/
CALL pr5(@age);   /*调用过程，输入输出age*/
SELECT @age;  /*打印age*/


/*8 case 分支*/
DELIMITER $$
CREATE PROCEDURE pr7()
  BEGIN
    DECLARE pos INT DEFAULT 0;
    SET pos := floor(5*rand());    /*rand()产生0-1随机数*/
    CASE pos
      WHEN 1 THEN SELECT 'fall in the sea';
      WHEN 2 THEN SELECT 'fall in the hill';
      ELSE SELECT 'I do not know';
    END CASE;
  END $$


/*9 游标*/
/*游标实际上是一种能从包括多条数据记录的结果集中每次提取一条记录的机制。
    游标充当指针的作用。
    尽管游标能遍历结果中的所有行，但他一次只指向一行，权限定位到一行记录而不是整个结果集。
    游标的作用就是用于对查询数据库所返回的记录进行遍历，以便进行相应的操作。*/
DELIMITER $$
CREATE PROCEDURE pr8()
  BEGIN
    DECLARE row_goods_id INT;
    DECLARE row_number INT;
    DECLARE row_goods_name VARCHAR(20);
    DECLARE get_goods CURSOR FOR SELECT goods_id, goods_number, goods_name FROM im_goods;    /*声明一个游标*/

    OPEN get_goods;    /*打开一个游标*/
    FETCH get_goods INTO row_goods_id, row_number, row_goods_name;  /*fetch 取值*/
    SELECT concat(row_goods_id,':',row_goods_name,':',row_number);  /*打印赋值好的变量*/
    CLOSE get_goods;   /*关闭游标*/

  END $$


/*10 循环游标*/
DELIMITER $$
CREATE PROCEDURE pr9()
  BEGIN
    DECLARE row_goods_id INT;
    DECLARE row_number INT;
    DECLARE row_goods_name VARCHAR(20) CHARACTER SET utf8;  /*存储过程中变量声明中，如果有中文，先声明变量字符集，否则命令行输出的时候可能出现汉字变成??*/
    DECLARE summary INT DEFAULT 0;
    DECLARE i INT DEFAULT 1;

    DECLARE get_goods CURSOR FOR SELECT goods_id, goods_number, goods_name FROM im_goods;    /*声明一个游标*/
    SELECT count(*)  INTO summary FROM im_goods;     /*统计总行数放在summary里面*/

    OPEN get_goods;    /*打开游标*/
    REPEAT             /*repeat循环打印每行记录*/
      SET i := i+1;
      FETCH get_goods INTO row_goods_id, row_number, row_goods_name;  /*fetch 取值*/
      SELECT concat(row_goods_id,':',row_goods_name,':',row_number);  /*打印赋值好的变量的连接字符串*/
    UNTIL i >= summary END REPEAT;
    CLOSE get_goods;   /*关闭游标*/

  END $$


