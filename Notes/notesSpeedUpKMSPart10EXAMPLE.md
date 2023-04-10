# Notes: Speed-up Knowledge Management System (KMS) Part 10 EXAMPLE

MySQL + CodeIgniter (PHP); phpmyadmin

## ACTION: DIVIDE transaction table into multiple tables (containers)

1) COPY transaction -> transaction20230410T1223
2) COPY transaction -> transaction2020
3) COPY transaction -> transaction20212023

> SELECT COUNT(\*) from transaction2020;

OUTPUT: 126414

> SELECT COUNT(\*) from transactionv20230410t1223;

OUTPUT: 126414

> DELETE FROM transaction2020 WHERE STR_TO_DATE(transaction_date, '%m/%d/%Y') >= '2021-01-01';

> SELECT COUNT(\*) from transaction2020;

OUTPUT: 24629

## --

> SELECT COUNT(\*) from transaction20212023;

OUTPUT: 126414

> DELETE FROM transaction WHERE STR_TO_DATE(transaction_date, '%m/%d/%Y') < '2021-01-01';

--> X; foreign key contraints

> DELETE FROM transaction20212023 WHERE STR_TO_DATE(transaction_date, '%m/%d/%Y') < '2021-01-01';

> SELECT COUNT(\*) from transaction20212023;

OUTPUT: 101786

## --

1) rename: transaction -> transactionorigv20230410t1238

2) rename: transaction20212023 -> transaction
