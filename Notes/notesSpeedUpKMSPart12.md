# Notes: Speed-up Knowledge Management System (KMS) Part 12

## 1) PROBLEM:

Duplicate, multiple patient ID's for the same patient

## 1) ANSWER:

SELECT \`patient_name\`, COUNT AS \`patient\`<br/>
FROM \`patient\`<br/>
GROUP BY \`patient_name\`<br/>
HAVING COUNT > 1

### Additional Notes

1) The MySQL COMMAND shows as OUTPUT the total count that the same patient name was used.

2) We shall need to update the MySQL COMMAND to count the patient names that are similar, but are not exactly the same.

## REFERENCE

1) https://stackoverflow.com/questions/5930475/how-do-i-write-a-sql-query-to-detect-duplicate-primary-keys; last accessed: 20230824

