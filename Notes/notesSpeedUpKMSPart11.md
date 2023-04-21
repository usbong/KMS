# Notes: Speed-up Knowledge Management System (KMS) Part 11

MySQL + CodeIgniter (PHP)

## WINDOWS Machine

1) update: XAMPP Control Panel -> Config -> my.ini

> \## You can set .._buffer_pool_size up to 50 - 80 %<br/>
> \## of RAM but beware of setting memory usage too high

> #edited by Mike, 20230420

> #innodb_buffer_pool_size = 16M

innodb_buffer_pool_size = 4G

> \## Set .._log_file_size to 25 % of buffer pool size

> #edited by Mike, 20230420

> #innodb_log_file_size = 5M

innodb_log_file_size = 1G

> #innodb_log_buffer_size = 8M

innodb_log_buffer_size = 256M

> innodb_flush_log_at_trx_commit = 1<br/>
> innodb_lock_wait_timeout = 50

2) restart mysql service via XAMPP Control Panel<br/>
--> where: restart : Stop, then Start<br/>

<img src="https://github.com/usbong/KMS/blob/master/Notes/res/xamppControlPanelMySQLRestartV20230421T0913.png" width="60%">


## OUTPUT

execution of [accessAndSaveDatabaseStorageInWindowsPCFromWindowsPC.bat](https://github.com/usbong/KMS/blob/master/Miscellaneous%20Commands/setOfCommandsToAutoTransferDatabaseStorageFromWindowsToWindowsServer/accessAndSaveDatabaseStorageInWindowsPCFromWindowsPC.bat)<br/>
--> SPEED-UP of this part: [autoImportDatabaseToMySQLDB...](autoImportDatabaseToMySQLDBWindowsMachine.bat);<br/> 
--> ELAPSED TIME: <b>2mins, instead of 5mins</b>

## REFERENCE

1) https://dba.stackexchange.com/questions/83125/mysql-any-way-to-import-a-huge-32-gb-sql-dump-faster;<br/>
--> last accessed: 20230420<br/>
--> answer by: RolandoMySQLDBA, 20141123T1504; edited by T.Todua, 20191223T1933
