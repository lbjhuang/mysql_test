use company;

/*1 创建一个视图*/
#视图的好处：1简化查询语 2可以实现权限控制，把表的权限封闭,但是开放相应的视图权限,视图里只开放部分数据
#主要功能是来查询或计算得到特定的结果用来调用的，视图数据是随着物理表变化而变化的，一般不对视图数据直接用sq语句做修改
create view view_employee_data as
        select ename,job,Hiredate from t_employee;

select * from view_employee_data;

create view view_count as select count(*) from t_employee;  /*封装count*/
select * from view_count;

create view view_order as select ename, job from t_employee order by empno desc;  /*封装order*/
select ename from view_order;

show tables;  /*通过show tables 查看数据库的表，上面创建的视图也会被选择出来，因为视图是虚拟的表，也算表*/

show create view view_employee_data;  /*查看指定的视图*/

drop view view_employee_data; /*删除视图*/

alter view view_order as select ename, job, sal from t_employee order;  /*修改视图结构*/


update view view_order set sal = 9888 where id = 66 /*修改或删除视图数据，列一一对应关系的条件下会影响到物理表数据，不过一般不会去修改，要做修改直接修改物理表列数据*/

#说明/
/*把创建好的视图当做一个表来查询，实际上创建一个视图就是创建了一张虚拟的表，虚拟表是用特殊算法实现对真实表的数据的一种映射，封装了查询语句，调用即可获取数据
如果视图上的列和物理表上的列是一一对应的，则他的数据结果会随着物理表的数据改变【增删改等】而改变
如果视图上的某一个列是通过物理表的几个列运算得到的综合结果，则列不可以直接拿来用update view set XX = YY 的方式直接更新，因为他不知道到底在物理表该怎么修改。
而这个视图的XX列只能随着与之关联的物理表上的几个列的数据改变重新计算才会改变--- 比如一个计算三个未成年人身高平均值，不能直接update view height_data set avgHeight = yy 类似方式修改视图数据，只能通过三个人身高的改变而重新计算来改变他数值
