use company;

select e.ename as employeename, e.job as job from t_employee e;
/*左外连接查询*/
select e.ename employeename, e.job job, l.ename leadername from t_employee e left join t_employee l on e.MGR=l.empno;
