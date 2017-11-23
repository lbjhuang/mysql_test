use company;

/*备份数据库*/
mysqldump -u root -p company > E:/mysqldata/companydb.sql

/*备份数据表*/
mysqldump -u root -p company t_employee > E:/mysqldata/t_employee.sql
mysqldump -u root -p company user > E:/mysqldata/user.sql
/*备份多个数据库*/
mysqldump -u root -p --databases company book > e:/mysqldata/dbs.sql

/*备份服务器中所有数据库*/
mysqldump -u root -p --all-databases > e:/mysqldata/alldbs.sql

/*还原数据库中的表----source命令*/
use company
source e:/mysqldata/user.sql










