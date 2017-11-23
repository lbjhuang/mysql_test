use company;

/*创建一个视图*/
create view view_employee_data as
        select ename,job,Hiredate from t_employee;

select * from view_employee_data;  /*把创建好的视图当做一个表来查询，实际上创建一个视图就是创建了一张虚拟的表，封装了查询语句，调用即可获取数据*/

create view view_count as select count(*) from t_employee;  /*封装count*/
select * from view_count;

create view view_order as select ename, job from t_employee order by empno desc;  /*封装order*/
select ename from view_order;

show tables;  /*通过show tables 查看数据库的表，上面创建的视图也会被选择出来，因为视图是虚拟的表，也算表*/

show create view view_employee_data;  /*查看指定的视图*/

drop view view_employee_data; /*删除视图*/

alter view view_order as select ename, job, sal from t_employee order;  /*修改视图*/