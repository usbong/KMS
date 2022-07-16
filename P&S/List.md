# Problem & Solution List

## Problem#1) Report Patient Queue List Output: "... incompatible with sql_mode=only_full_group_by"

> Error Number: 1055
> Expression #3 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'usbong_kms.t2.transaction_id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by

### Answer:
> mysql > SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));

### Reference:
https://stackoverflow.com/questions/23921117/disable-only-full-group-by;<br/>
last accessed: 20220716<br/>
answer by: Eyo Okon Eyo, 20160316T1111<br/>
comment by: nawfal, 20160521T0347
