# Notes: Speed-up Knowledge Management System (KMS) Part 10

MySQL + CodeIgniter (PHP)

## LIST of MySQL COMMANDS that cause DELAY for execution to finish

1) ORDER BY

> $this->db->order_by('t2.added_datetime_stamp', 'DESC');

2) JOIN

> $this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
      
## Additional LIST of PARAMETERS that cause DELAY for execution to finish

1) total rows in TABLE

> $rowOutput = $query->result_array();

> echo "count: ".count($rowArray);

#### Example OUTPUT: 18198 rows

2) range of rows to verify

> $this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') >=","2020-04-06");

> $this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <=","2020-04-12");

## ACTION: DIVIDE transaction table into multiple tables (containers)

### COMMANDS LIST

NOTE FORMAT

> SELECT * FROM transaction2020 WHERE STR_TO_DATE(transaction_date, '%m/%d/%Y') >= '2021-01-01';

> DELETE FROM transaction2020 WHERE STR_TO_DATE(transaction_date, '%m/%d/%Y') >= '2021-01-01';

> SELECT COUNT(*) from transaction2020;

OUTPUT: 24628

## --

> SELECT * FROM transaction WHERE STR_TO_DATE(transaction_date, '%m/%d/%Y') < '2021-01-01';

> DELETE FROM transaction20212023 WHERE STR_TO_DATE(transaction_date, '%m/%d/%Y') < '2021-01-01';

transaction2021~2023 X<br/>
transaction2021-2023 X<br/>
transaction20212023 O

> SELECT COUNT(*) from transaction20212023

OUTPUT: 98225

## --


> SELECT COUNT(*) from transaction

OUTPUT (TOTAL): 122853
