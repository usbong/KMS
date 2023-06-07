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
<br/>
add: the following <b>skip-grant-tables</b> text

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
GRANT ALL PRIVILEGES ON &ast;.&ast; TO 'admin'@'localhost' WITH GRANT OPTION;<br/>
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

### Answer (LINUX UBUNTU (LUBUNTU20.04LTS)):

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

### Answer (Windows7):

1) Open `C:\xampp\xampp-control.exe` -> Config -> PHP (php.ini)

<img src="https://github.com/usbong/KMS/blob/master/P%26S/res/xamppWin7PhpDotIniV20230203T1509.png" width="80%">

2) Edit to update the following to be <b>64M</b>

<img src="https://github.com/usbong/KMS/blob/master/P%26S/res/xamppWin7PhpDotIniEditFileV20230203T1510.png" width="50%">

> upload_max_filesize=<b>2M</b>

upload_max_filesize=<b>64M</b>

> post_max_size=<b>8M</b>

post_max_size=<b>64M</b>

### Reference:
https://stackoverflow.com/questions/38384111/xampp-how-to-increase-upload-max-filesize;<br/>
last accessed: 20230203<br/>
answer by: Tonny Gidraph, 20180823T1837


## Problem#6) Cannot create new database due to "No Privileges"


<img src="https://github.com/usbong/KMS/blob/master/P%26S/res/phpMyAdminNoPrivilegesErrorV20230103T1256.jpg" width="80%">

### Additional Note:

Entered as user, `root`, in Log in page;<br/>
--> `root` already has `Y` to signify `YES` on all privileges based on `mysql` DB 


### Answer (Part1):

<b>
sudo mysqld_safe --skip-grant-tables --skip-networking &<br/>
sudo mysql -uroot<br/>
</b>  

#### //------------------------------
#### @MySQL Monitor
#### //------------------------------

<b>
flush privileges;<br/>
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';<br/>
GRANT ALL PRIVILEGES ON &ast;.&ast; TO 'admin'@'localhost' WITH GRANT OPTION;<br/>
quit;
</b>

#### Reminders

1) execute the COMMANDS in Terminal Window (of Computer Server)
2) execute: <b>flush privileges</b> to execute next COMMANDS;<br/>
--> due to: IF NOT, <b>--skip-grant-tables</b> shall prevent their execution

### Answer (Part2):

Execute the following COMMANDS in Terminal Window:<br/> 
<br/>
<b>sudo vi /etc/mysql/mysql.conf.d/mysqld.cnf</b><br/>
<br/>
remove: the following <b>skip-grant-tables</b> text via the comment mark, "<b>#</b>"

> [mysqld]<br/>
> #skip-grant-tables

<b>sudo service mysql restart</b>

#### Reminder

1) mysql user `admin` should already have password, e.g. `admin`, to enter via [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/)



## Problem#7) Cannot enter http://localhost/phpmyadmin/ due to "Login without a password is forbidden..."

### Additional Note:

1) created mysql user `admin`

### Answer (Part1):

<b>
sudo mysqld_safe --skip-grant-tables --skip-networking &<br/>
sudo mysql -uroot<br/>
</b>  


#### //------------------------------
#### @MySQL Monitor
#### //------------------------------

<b>
flush privileges;<br/>
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';<br/>
GRANT ALL PRIVILEGES ON &ast;.&ast; TO 'admin'@'localhost' WITH GRANT OPTION;<br/>
</b>
  
### Answer (Part2):

#### //------------------------------
#### @MySQL Monitor
#### //------------------------------

<b>
SET PASSWORD FOR 'admin'@'localhost' = 'adminPassword';<br/>
quit;
</b>

#### Reminders

1) execute the COMMANDS in Terminal Window (of Computer Server)
2) execute: <b>flush privileges</b> to execute next COMMANDS;<br/>
--> due to: IF NOT, <b>--skip-grant-tables</b> shall prevent their execution


## Problem#8) "ERROR 2002 (HY000): Can't connect to local MySQL server through socket '/opt/lampp/var/mysql/mysql.sock' (2)"

> ./mysqladmin: connect to server at 'localhost' failed<br/>
> error: 'Can't connect to local MySQL server through socket '/opt/lampp/var/mysql/mysql.sock' (2)'<br/>
> Check that mysqld is running and that the socket: '/opt/lampp/var/mysql/mysql.sock' exists!<br/>
> Adding database: usbong_kms<br/>
> ERROR 2002 (HY000): Can't connect to local MySQL server through socket '/opt/lampp/var/mysql/mysql.sock' (2)<br/>
> ERROR 2002 (HY000): Can't connect to local MySQL server through socket '/opt/lampp/var/mysql/mysql.sock' (2)

### Additional Notes:

1) Executed: <b>sudo apt-get upgrade</b><br/>
--> current MYSQL version: 8

2) Linux Ubuntu (LTS 20.04)

### Answer:

1) Use: non-XAMPP (LAMPP) instructions;

[installWebServerInLinuxMachineNotViaXAMPP.sh](https://github.com/usbong/KMS/blob/master/Miscellaneous%20Commands/installWebServerInLinuxMachineNotViaXAMPP.sh)


## Problem#9) Which folder to put the `usbong_kms` folder? 

### Additional Notes:

1) Downloaded ZIP file: [KMS-master/usbong_kms](https://github.com/usbong/KMS)

2) Linux Ubuntu (LTS 20.04)

### Answer:

1) Put in `/var/www/html`<br/>
--> set `html` folder to have in Access Control, <b>"View and modify folder content"</b> for <b>Owner</b>, <b>Group</b>, <b>Other</b>;<br/>
--> COMMAND: <b>sudo chmod 777 `/html`</b>;<br/>
--> reminder: set permission based on use, e.g production, development; 


## Problem#10) Database Error: "Message: mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it."? 

<img src="https://github.com/usbong/KMS/blob/master/P%26S/res/xamppAutoStartUpDBErrorMySQLNotStartedV20230217T0848.png" width="80%">

### Additional Notes:

1) XAMPP auto-starts: Apache and MySQL;<br/>
--> adds: had attempted to quickly open FIREFOX BROWSER;<br/>
--> observed: LAN Messenger (NETWORK) ICON had not yet been displayed

### Answer:

1) Open XAMPP CONTROL PANEL  (xampp-control.exe);<br/>
--> Click "Start" button to start MySQL; 

<img src="https://github.com/usbong/KMS/blob/master/P%26S/res/xamppControlPanelStartMySQLToFixDBErrorV20230217T0857.png" width="80%">

### Additional Notes:

1) observed: PROBLEM#10 to have previously occurred;<br/>
--> where: SOLUTION quickly identified;<br/>
--> adds: however, repeated incidents cause writing of NOTES<br/>
--> on the ACTION to quickly solve problem

2) ERROR incident occurred again, 2023-05-02 (TUESDAY);<br/>
--> where: 2023-05-01 (MONDAY), LABOR DAY, HOLIDAY @CLINIC<br/>
--> ERROR incident occurred again, 2023-5-31 (WEDNESDAY),<br/>
--> where: last day of the Month of MAY

## Problem#11) Database Error: "You probably tried to upload a file that is too large. Please refer to documentation for a workaround for this limit." 

### Additional Notes:

.mysql DB File Size @<b> >60MB</b> of SQL code (computer instructions)

### Answer:

1) Upload the file to DB via TERMINAL COMMAND:

WINDOWS: [autoImportDatabaseToMySQLDBWindowsMachine.bat](https://github.com/usbong/KMS/blob/master/Miscellaneous%20Commands/setOfCommandsToAutoTransferDatabaseStorageFromWindowsToWindowsServer/autoImportDatabaseToMySQLDBWindowsMachine.bat)

> mysql -uroot usbong_kms < D:\MOSC\DB\%inputMySQLFile%

LINUX: [autoImportDatabaseToMySQLDBLinuxMachineNotViaXAMPP.sh](https://github.com/usbong/KMS/blob/master/Miscellaneous%20Commands/autoImportDatabaseToMySQLDBLinuxMachineNotViaXAMPP.sh)

> mysql -uroot usbong_kms < $inputMySQLFile

### Reference:

1) http://localhost/phpmyadmin/doc/html/faq.html#faq1-16

> 1.16 I cannot upload big dump files (memory, HTTP or timeout problems).

> If you have shell (command line) access, use MySQL to import the files directly. You can do this by issuing the “source” command from within MySQL:


## Problem#12) LibreOfficeCalc: Error saving the document... insufficient user rights.

<img src="https://github.com/usbong/KMS/blob/master/P%26S/res/usbongKMSLibreOfficeCalcInsufficientUserRights.png" width="50%">

### Answer:

1) Delete: .ods#

#### Example: 

> .~lock.moscReportForTheDay2023-06-07.ods#

