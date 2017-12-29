create table t_dept(
  deptno int,
  dname varchar (20),
  loc varchar(40),
  INDEX index_deptno(deptno)
);



create INDEX index_loc on t_dept (loc);  #添加一个索引

alter table t_dept add id int first;  #添加字段

create UNIQUE INDEX index_id on t_dept (id);  #唯一索引

drop INDEX index_id on t_dept;  /*删除索引*/
