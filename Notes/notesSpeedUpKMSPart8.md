# Notes: Speed-up Knowledge Management System (KMS) Part 8

## 1) PROBLEM:
<b>Noticeable DELAY</b> to load web page for select <b>COMMANDS</b>;<br/>
--> Example <b>COMMAND</b>: `viewItemMedicineWithItemPurchasedHistory`<br/>
--> where: <b>Noticeable DELAY</b> >5seconds
 
## 1) ANSWER:

Execute the following COMMANDS in the MySQL,<br/>

### Step#1.1)

> SHOW VARIABLES LIKE 'query_cache_type' 

### OUTPUT#1.1:

Variable_name; Value<br/> 	
query_cache_type; OFF

### Step#1.2)

> SET GLOBAL query_cache_type = 1 

### OUTPUT#1.2:

Variable_name; Value<br/>
query_cache_type; ON

Done!

### OVERALL OUTPUT: NO Noticeable DELAY

<b>EXECUTION TIME</b> < 1second for select web pages<br/>
--> where: pages : have already been loaded into CACHE MEMORY

#### Reference: 
1) https://stackoverflow.com/questions/26571004/how-do-i-turn-on-query-cache-on-a-windows-xampp-server;
last accessed: 20230122

2) https://dev.mysql.com/doc/refman/5.6/en/query-cache-configuration.html;
last accessed: 20230122

### Additional Related Notes

1) verify: increasing query_cache_size (1048576; default; 1MB);

2) verify: deleting excess MySQL instructions, e.g. JOIN COMMANDS

