use company;

select empno, ename, job, MGR, Hiredate, sal from t_employee;

select job from t_employee;
select distinct job from t_employee;

select ename, sal*12 from t_employee;  /*四则运算*/
select ename, sal*12 as yearSalary from t_employee;  /*取别名*/
select concat(ename, '雇员的年薪是：' sal*12) yearSalary from t_employee;

/*条件数据查询*/
select ename, job, sal from t_employee where job='SalesMan';    /*and*/
select ename, job, sal from t_employee where job='SalesMan' and sal>2500;

select ename, job, sal from t_employee where sal between 2500 and 3000;  /*between*/
select ename, job, sal from t_employee where sal not between 2500 and 3000;

select ename, job from t_employee where comm is null;   /*null*/
select ename, job from t_employee where comm is not null;

select ename, job from t_employee where empno in (7369, 7499, 7839);  /*in集合*/
select ename, job from t_employee where empno not in (7369, 7499, 7839);

select ename, job from t_employee where ename like 's%';  /*like x%第一个字母为x的，不区分x的大小写*/
select ename, job from t_employee where not ename like 'S%';

select ename, job from t_employee where ename like '_c%';  /*第二个字母为c*/
select ename, job from t_employee where ename not like '_c%';

select ename, job from t_employee where sal like '%5%'; /*sal字段的值中间包含5的*/
select ename, job from t_employee where sal like '%%'; /*匹配所有的记录*/

select ename, job from t_employee order by sal; /*排序*/
select ename, job from t_employee order by sal desc; /*倒序排序*/
select ename, sal from t_employee order by sal desc limit 1;
select ename, job, sal, Hiredate from t_employee order by sal, Hiredate desc; /*优先sal排序，相同的sal则按照Hiredate倒序排序*/


select ename, job, sal from t_employee where sal>2500 limit 3;  /*limit*/
select ename, job, sal from t_employee where sal>2500 limit 1,3;
select ename, job, sal, Hiredate from t_employee where sal>2500 order by Hiredate desc limit 1,3;

select count(*) as number from t_employee where sal>2500;  /*统计满足sal大于2500的记录的总数目取名number*/
select avg(sal) as average from t_employee where ename like 's%'; /*平均sal*/
select sum(sal) as sumSalary from t_employee;  /*总共sal*/
select max(sal) as maxSalary from t_employee;  /*最大sal*/

select * from t_employee group by MGR; /*group 分组*/
select MGR, group_concat(ename) as enames, count(ename) as number from t_employee group by MGR;
select MRG, group_concat(ename) as enames, count(ename) as number, avg(sal) as averageSal from t_employee group by MGR having avg(sal) > 2700;  /*本来根据MGR分成4个组，但是加上了having条件限制为查询出平均工资sal大于2700的分组，则输出了3个分组*/