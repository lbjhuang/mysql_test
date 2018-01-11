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

/*out 输出*/
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

/*inout 输入输出*/
DELIMITER $$
CREATE PROCEDURE pr6(INOUT age INT)
  BEGIN
      SET age := age+10;
  END $$

SET @age= 20;  /*先设置age的值*/
CALL pr5(@age);   /*调用过程，输入输出age*/
SELECT @age;  /*打印age*/