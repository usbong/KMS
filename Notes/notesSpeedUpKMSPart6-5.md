# Notes: Speed-up Knowledge Management System (KMS) Part 6.5

## 1) PROBLEM:

List of <b>INSERT</b> MySQL Commands does NOT EXECUTE<br/> 
--> This is after identifying a DUPLICATE transaction based on PRIMARY KEY<br/>
--> where: Example PRIMARY KEY : transaction identification (ID)<br/>

### Example:

<b>INSERT</b> INTO \`transaction\` VALUES (112703,16071,0,'10/01/2022',0,0.00,0,0.00,0.00,'IN-QUEUE; PAID',0.00,0.00,0.00,0,'','\'CONSULT\'','',0,0,0,'','','2022-10-01 08:43:50');

## SOLUTION:

add: <b>IGNORE</b> keyphrase<br/>

### Example:

INSERT <b>IGNORE</b> INTO \`transaction\` VALUES (112703,16071,0,'10/01/2022',0,0.00,0,0.00,0.00,'IN-QUEUE; PAID',0.00,0.00,0.00,0,'','\'CONSULT\'','',0,0,0,'','','2022-10-01 08:43:50');

### Reference:
https://stackoverflow.com/questions/2513174/avoid-duplicates-in-insert-into-select-query-in-sql-server;
last accessed: 20221102<br/>
answer by: Duncan, 20100325T0624; edited 20100325T0654
