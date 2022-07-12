# Notes: Speed-up Knowledge Management System (KMS) Part 4
## 1) PROBLEM:
> Fatal Error: Allowed Memory Size of 134217728 Bytes Exhausted (CodeIgniter + XML-RPC)

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

