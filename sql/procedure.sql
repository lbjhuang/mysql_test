use company;

/*创建一个存储过程*/
DELIMITER $$
create procedure proc_emplo_sal ()
comment '查询所有雇员的工资'
begin
  select sal from t_employee;
end $$
  DELIMITER;

/*调用这个存储过程*/
  call proc_emplo_sal ();


/*创建一个带in参数的存储过程*/
DELIMITER $$
create procedure delete_row (in p_id int)
comment'根据id删除表记录'
begin
  delete from user where id = p_id;
end $$
DELIMITER;

cal delete_row(2);

