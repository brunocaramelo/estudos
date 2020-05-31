###
### Copy createdb.sql.example to createdb.sql
### then uncomment then set database name and username to create you need databases
#
# example: .env MYSQL_USER=appuser and need db name is myshop_db
#
CREATE DATABASE IF NOT EXISTS `webflux` ;
CREATE USER 'sandbox'@'%' IDENTIFIED BY 'sandbox';

GRANT ALL ON `webflux`.* TO 'sandbox'@'%' ;

FLUSH PRIVILEGES ;
