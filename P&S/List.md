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

## Problem#4) Cannot anymore log into mysql even with CORRECT username and password

### Example:

"MySQL Error: : 'Access denied for user 'root'@'localhost'"

### Additional Note:

CAUSE to be due to system upgrade, where: installation of `mysql-server-8.0` is NOT YET COMPLETE

### Answer:

Execute the following COMMANDS in Terminal Window (of Computer Server):<br/> 
<br/>
<b>
sudo mysqld_safe --skip-grant-tables --skip-networking &<br/>
sudo mysql -uroot<br/>
</b>

#### //------------------------------
#### @MySQL Monitor
#### //------------------------------

<b>
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';<br/>
GRANT ALL PRIVILEGES ON \*.\* TO 'admin'@'localhost' WITH GRANT OPTION;<br/>
quit;
</b>
  
### Reference:
https://askubuntu.com/questions/1131286/problem-in-accessing-to-mysql;
last accessed: 20220828
answer by: FloT, 20190404T2042


## Problem#5) IMPORT of .sql DB file causes "Incorrect format parameter" ERROR 

<img src="https://github.com/usbong/KMS/blob/master/P%26S/res/phpMyAdminIncorrectFormatParameterErrorV20230103T1034.jpg" width="80%">

### Additional Note:

.mysql DB File Size @<b>20.4MB</b> of SQL code (computer instructions)

### Answer:

1) Execute the following COMMAND in Terminal Window (of Computer Server):<br/> 
<b>sudo vi php.ini</b>

2) Edit to update the following to be <b>64M</b>

> upload_max_filesize=<b>2M</b>

upload_max_filesize=<b>64M</b>

> post_max_size=<b>8M</b>

post_max_size=<b>64M</b>

### Reference:
https://stackoverflow.com/questions/50690076/phpmyadmin-error-incorrect-format-parameter;<br/>
last accessed: 20230103<br/>
answer by: FloT, 20180607T1658<br/>
edited by: shireef khatab, 20200529T1240


## Problem#6) Cannot create new database due to "No Privileges"


<img src="https://github.com/usbong/KMS/blob/master/P%26S/res/phpMyAdminNoPrivilegesErrorV20230103T1256.jpg" width="80%">


### Answer:

<b>
sudo mysqld_safe --skip-grant-tables --skip-networking &<br/>
sudo mysql -uroot<br/>
</b>  

#### //------------------------------
#### @MySQL Monitor
#### //------------------------------

<b>
flush privileges<br/>
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';<br/>
GRANT ALL PRIVILEGES ON \*.\* TO 'admin'@'localhost' WITH GRANT OPTION;<br/>
quit;
</b>

#### Reminders

1) execute the COMMANDS in Terminal Window (of Computer Server)
2) execute: <b>flush privileges</b> to execute next COMMANDS;<br/>
--> due to: IF NOT, <b>--skip-grant-tables</b> shall prevent their execution

