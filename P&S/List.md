# Problem & Solution List

## Problem#1) Report Patient Queue List Output: "... incompatible with sql_mode=only_full_group_by"

> Error Number: 1055
> Expression #3 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'usbong_kms.t2.transaction_id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by

### Answer (Part 1):

<img src="https://github.com/usbong/KMS/blob/master/Screenshots/Database/usbongKMSDBSqlGlobalModeV20220716.jpg" width="80%">

> mysql> SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));

### Reference:
https://stackoverflow.com/questions/23921117/disable-only-full-group-by;<br/>
last accessed: 20220716<br/>
answer by: Eyo Okon Eyo, 20160316T1111<br/>
comment by: nawfal, 20160521T0347

### Answer (Part 2):

2.1) Add the following COMMAND in `/etc/mysql/mysql.conf.d/mysqld.cnf` for the Computer Server to remember without reminder

#### note `mysqld.cnf` with the `d` after `mysql`

> The MySQL database server configuration file. <br/>

<br/>

> [mysql]<br/>
> sql_mode = "STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION"

2.2) Execute the following COMMAND in Terminal Window:

> sudo service mysql restart

### Reference:
https://stackoverflow.com/questions/23921117/disable-only-full-group-by;<br/>
last accessed: 20220717<br/>
answer by: breq, 20160516T0713<br/>
comment by: tristanbailey, 20210115T1447

## Problem#2) Auto-import SQL Commands to build DB Output: "The BLOB, TEXT, GEOMETRY, and JSON data types cannot be assigned a default value."

### Answer:
CHANGE columns classified as `text` to `varchar(30)`;<br/>
where: `30` : MAX variable character count;<br/>
reminder: DEFAULT value in `text` NOT accepted in Linux UBUNTU Machine as non-XAMPP Web Server 

### Reference:
https://stackoverflow.com/questions/16141727/change-text-column-default-from-null-to-empty-string;<br/>
last accessed: 20220716<br/>
answer by: Salman A, 20130422T0809<br/>

## Problem#3) "MySQL Error: : 'Access denied for user 'root'@'localhost'"

### Answer:
Execute the following COMMANDS in Terminal Window:<br/> 
<br/>
<b>sudo vi /etc/mysql/mysql.conf.d/mysqld.cnf</b><br/>
<b>add: the following text</b>

> [mysqld]<br/>
> skip-grant-tables

<b>sudo service mysql restart</b>

### Reference:
https://stackoverflow.com/questions/41645309/mysql-error-access-denied-for-user-rootlocalhost;
last accessed: 20220727
answer by: PYK, 20220301T0507; edited 20220311T1730


