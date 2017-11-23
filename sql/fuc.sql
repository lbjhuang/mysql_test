use company;

/*创建一个自定义函数*/
create function f1()
returns varchar(30)
return date_format(now(), '%Y年%m月%d日 %H分:%i分:%s秒');  /*选择当前时间*/

select f1(); /*调用*/

/*创建一个带参数的函数*/
create function f2(num1 smallint unsigned, num2 smallint unsigned)
returns float(20)  /*申明函数返回类型和长度*/
return (num1+num2)/2; /*返回值*/

select f2(); /*调用*/














