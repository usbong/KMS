# Notes: Speed-up Knowledge Management System (KMS) Part 13

## PROBLEM:

How to speed-up search using MySQL?

## ANSWER:

Transfer transactions.

### Steps to Transfer Transactions Using phpmyadmin | [video](https://www.youtube.com/watch?v=nmfBJFksyIM)

1) Go to "operations" 

2) "Copy table to (database.table)"

usbong_kms.transactiontest2021

3) Go to "transactionstest" table

4) Note the following:
START transaction_date: 01/04/2021
START transaction_id: 27639

5) Go to "Search"

transaction_date: 12/30/2021

6) Note the following:
END transaction_date: 01/04/2021
END transaction_id: 73989

7) Press "Go".

Reminder: noticeable processing time due to having a large transactions count

8) Go to "transactiontest"

9) Go to "SQL"

10) Enter and execute the following SQL command:

DELETE FROM `transactiontest` WHERE `transaction_id` >= 27639 and `transaction_id` <= 73989;

Reminder: "transactiontest"

43228 rows affected. (Query took 4.4000 seconds.) 

11) Enter and execute the following SQL command:
DELETE FROM `transactiontest2021` WHERE `transaction_id` > 73989;

Reminder: "transactiontest2021"

133674 rows affected. (Query took 21.1100 seconds.)

DONE!

# NEXT

## Remember to add the following:

`usbongKMSItemListTransaction<YEAR>OK.txt`
 
<b>Reference:</b> https://github.com/usbong/KMS/tree/master/MOSC/KMS

So that there will a .txt file for the transferred transaction year:

`usbongKMSItemListTransaction2020OK.txt`

`usbongKMSItemListTransaction2021OK.txt`

`usbongKMSItemListTransaction2022OK.txt`

## In order to generate this file:

`usbongKMSItemListTransaction2023OK.txt`

### controllers/Browse.php

<b>updateTotalQuantitySoldPerItem()</b>

<b>getTransactionsListFromFile()</b>

## Temporarily comment out:

		array_push($sFilenameArray, "C:\MOSC\KMS\\usbongKMSItemListTransaction2020OK.txt");	
		array_push($sFilenameArray, "C:\MOSC\KMS\\usbongKMSItemListTransaction2021OK.txt");	
		array_push($sFilenameArray, "C:\MOSC\KMS\\usbongKMSItemListTransaction2022OK.txt");	

### model/Browse_Model.php

<b>updateTotalQuantitySoldPerItem()</b>

## Comment out:

$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');

## Add: 

$this->db->join('transaction2023 as t2', 't1.item_id = t2.item_id', 'LEFT');

## Run the batch file:

`...xampp\htdocs\usbong_kms\kasangkapan\autoScreenCaptureReportUpdateTotalQuantitySoldPerItem.bat`

## Create the file: 

`usbongKMSItemListTransaction2023OK.txt`

## Put the relevant contents inside using https://github.com/usbong/KMS/tree/master/MOSC/KMS as reference.

### model/Browse_Model.php

<b>updateTotalQuantitySoldPerItem()</b>

## Uncomment out:

$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');

## Comment out: 

$this->db->join('transaction2023 as t2', 't1.item_id = t2.item_id', 'LEFT');

### controllers/Browse.php

<b>updateTotalQuantitySoldPerItem()</b>

<b>getTransactionsListFromFile()</b>

## Uncomment the following:

		array_push($sFilenameArray, "C:\MOSC\KMS\\usbongKMSItemListTransaction2020OK.txt");	
		array_push($sFilenameArray, "C:\MOSC\KMS\\usbongKMSItemListTransaction2021OK.txt");	
		array_push($sFilenameArray, "C:\MOSC\KMS\\usbongKMSItemListTransaction2022OK.txt");	

## Add:

		array_push($sFilenameArray, "C:\MOSC\KMS\\usbongKMSItemListTransaction2023OK.txt");	

DONE!
