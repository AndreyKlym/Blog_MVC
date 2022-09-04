Some progect
По материалам книги
Доступ к MySQL с использованием PHP

Запросы к базе данных MySQL с помощью PHP
стр. 257

+--------------------+
| Database           |
+--------------------+
| classics           |
| db_test            |
| db_test_3          |
| db_ua              |
| example_db         |
| information_schema |
| lara8              |
| my_web             |
| mysql              |
| performance_schema |
| sys                |
| test               |
| university         |
+--------------------+
13 rows in set (0.01 sec)


publications:
CREATE DATABASE publications;

CREATE TABLE classics (
  author VARCHAR(128),
  title VARCHAR(128),
  type VARCHAR(16),
  year CHAR(4)) ENGINE MyISAM;


DELETE FROM classics WHERE isbn=9781598184895;