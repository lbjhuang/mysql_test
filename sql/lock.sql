use company;

/*锁*/
lock table t_employee read; /*给这个表加上一共享锁，即读锁*/

lock table t_employee write; /*给这个表加上一排他锁，即写锁*/

insert into t_employee values('9978','sam','Clerk','7566','2017-03-02','3000','200','10');












