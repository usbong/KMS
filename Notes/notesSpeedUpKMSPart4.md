# Notes: Speed-up Knowledge Management System (KMS) Part 4
## 1) PROBLEM:
> Fatal error: Allowed memory size of 134217728 bytes exhausted (tried to allocate 20480 bytes) in ...

#### NOTES: 
1) PHP Hypertext Preprocessor (PHP) + CodeIgniter Framework<br/>
2) <b>TRANSACTIONS COUNT:</b> 93,737<br/>
3) (134217728 byte / 1) * (1 KB / 1000 byte) * (1 MB / 1000 KB) = `134.217728 MB` <br/>
--> 134217728 / 1000 / 1000 = `134.217728 MB` <br/>
--> <b>Additional Reference:</b> GOOGLE SEARCH ENGINE

## SOLUTION:
update: `php.ini` configuration file in XAMPP Control Settings<br/>
increase: `memory_limit` from `128M` to `256M`

> ; Maximum amount of memory a script may consume (128 MB)<br/>
> ; http://php.net/memory-limit<br/>
> memory_limit = 256M

### Reminder:
verify: executing SPEED-UP KMS Parts 1~3;

### Reference:
https://stackoverflow.com/questions/561066/fatal-error-allowed-memory-size-of-134217728-bytes-exhausted-codeigniter-xml/29797926#29797926;
last accessed: 20220712<br/>
--> answer by: Peter Mortensen, 20190724T2138;<br/>
--> edited by: Derick Fynn 20150422T1241;

