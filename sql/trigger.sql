/*触发器*/
/**
需求：当买了一个或几个商品的时候，对应库存减少几个
分析：
  监视谁：order表
  监视动作：insert动作
  触发时间：之后
  触发事件：update
 */

/*修改结尾符合为$,否则mysql默认分号;结束符，使得触发器的sql语句的时候遇到分号就结束了，触发器语句还没写完*/

delimiter $
CREATE trigger t1
after
insert
on im_order_goods
for each row
begin
  update im_goods set goods_number=goods_number-NEW.goods_number WHERE goods_id = NEW.goods_id;  /*NEW关键字代表新行的row*/
end
$
SHOW TRIGGERS;
DROP TRIGGER t1

    /**
    商品库存减少，在插入之前，如果下了个订单的该商品数量大于商品库存，则直接把库存设为减少当前数量，即为0
     */
DELIMITER $
CREATE TRIGGER t2
  BEFORE
  INSERT
  ON im_order_goods

  FOR EACH ROW
  BEGIN
    DECLARE num INT;
    SELECT goods_number as num FROM im_goods WHERE goods_id = NEW.goods_id;
    if NEW.goods_number > num THEN
      SET NEW.goods_number = num;
    END IF;
    UPDATE im_goods SET goods_number = goods_number - NEW.goods_number WHERE goods_id = NEW.goods_id;
  END $
DELIMITER $


