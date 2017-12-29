-- noinspection SqlNoDataSourceInspectionForFile

CREATE table `account`(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  money FLOAT(8,2) NOT NULL,
  PRIMARY KEY (id)
)engine=innodb charset=utf8

INSERT INTO account VALUES ('1','huang','2000'),('2','marry','1500')

/*事务开启*/
start TRANSACTION
UPDATE account SET money=money+500 WHERE id=1
UPDATE account SET money=money-500 WHERE id=2
COMMIT  /*ROLLBACK:回滚*/
/*事务提交：不到commit这一步不会提交处理结果*/