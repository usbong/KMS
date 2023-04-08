# Notes: Speed-up Knowledge Management System (KMS) Part 10

MySQL + CodeIgniter (PHP)

## LIST of MySQL COMMANDS that cause DELAY for execution to finish

1) 	ORDER BY

> $this->db->order_by('t2.added_datetime_stamp', 'DESC');

2) JOIN

> $this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
      
TO-DO: -update: this

