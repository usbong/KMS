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
