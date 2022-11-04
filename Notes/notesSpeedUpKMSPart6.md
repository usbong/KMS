# Notes: Speed-up Knowledge Management System (KMS) Part 6

## 1) PROBLEM:
Noticeable DELAY to finish execution of Official Receipt Reports for the Month<br/>
--> where: Computer Server is the MAIN SERVER<br/>
--> where: MAIN SERVER receives additional requests, e.g. search Patient, search Item<br/>

### COMMAND to auto-generate Official Receipt Reports via Web Browser

1) usbong_kms/index.php/report/viewReceiptReport
2) usbong_kms/index.php/report/viewReceiptReportPAS

## SOLUTION:

execute: COMMAND using SECONDARY Computer Server<br/>
--> where: has the copy of the database

### REMINDER

1) COMMAND to COPY database from MAIN SERVER to SECONDARY SERVER<br/>

<b>./accessAndSaveDatabaseStorage.sh</b>

#### Reference
https://github.com/usbong/KMS/tree/master/Miscellaneous%20Commands/setOfCommandsToAutoTransferDatabaseStorageFromWindowsToLinuxServer;<br/>
last accessed: 20221104

