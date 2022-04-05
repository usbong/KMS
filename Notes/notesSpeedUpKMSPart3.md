# Notes: Speed-up Knowledge Management System (KMS) Part 3
## PROBLEM:
In MySQL Database File: <br/>

> HUGE LINE TRUNCATED: NO LINE WITH MORE THAN 500000 CHARACTERS

where: 1 LINE = 1 ROW 

### reminder: MAX; noticeably reached by 80677 total transactions

## SOLUTION:
Update input MySQL Database file for each VALUE in TABLE to have its own row<br/>
<br/>
<b>Example Automation Tool (Linux Machine):</b> [autoUpdateFormatInputMySQLDBFile](https://github.com/usbong/KMS/tree/master/DB/add-on%20software)
