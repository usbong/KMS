# Notes: Speed-up Knowledge Management System (KMS) Part 10

MySQL + CodeIgniter (PHP)

## LIST of MySQL COMMANDS that cause DELAY for execution to finish

1) ORDER BY

> $this->db->order_by('t2.added_datetime_stamp', 'DESC');

2) JOIN

> $this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
      
TO-DO: -update: this

## Additional LIST of PARAMETERS that cause DELAY for execution to finish

1) total rows in TABLE

> $rowOutput = $query->result_array();

> echo "count: ".count($rowArray);

#### Example OUTPUT: 18198 rows

2) range of rows to verify

> $this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') >=","2020-04-06");

> $this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <=","2020-04-12");
